<?php

use App\Models\SavingsAccount;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('savings:withdraw-matured {plan=6} {--user=} {--dry-run}', function ($plan) {
    $plan = (int) $plan;
    if (!in_array($plan, [6, 12], true)) {
        return $this->error('Only 6 or 12 month plans are supported.');
    }

    $query = SavingsAccount::with(['transactions' => function ($query) use ($plan) {
        $query->where('type', 'deposit')
            ->where('plan_months', $plan)
            ->where('status', 'active')
            ->whereNotNull('maturity_date')
            ->where('maturity_date', '<=', now());
    }]);

    $userOption = $this->option('user');
    if ($userOption) {
        if (is_numeric($userOption)) {
            $query->where('user_id', (int) $userOption);
        } else {
            $query->whereHas('user', function ($userQuery) use ($userOption) {
                $userQuery->where('email', $userOption);
            });
        }
    }

    $accounts = $query->get();
    if ($accounts->isEmpty()) {
        return $this->comment("No matured {$plan}-month deposits found.");
    }

    $dryRun = $this->option('dry-run');
    $totalWithdrawn = 0;
    $accountCount = 0;

    foreach ($accounts as $account) {
        $matured = $account->transactions;
        if ($matured->isEmpty()) {
            continue;
        }

        $amount = $matured->sum('amount');
        if ($amount <= 0) {
            continue;
        }

        $accountCount++;
        $totalWithdrawn += $amount;

        $this->line("Account #{$account->id} user_id={$account->user_id} matured amount Tsh {$amount}");

        if ($dryRun) {
            continue;
        }

        DB::transaction(function () use ($account, $matured, $amount) {
            $account->transactions()->create([
                'amount' => $amount,
                'type' => 'withdrawal',
                'plan_months' => 0,
                'maturity_date' => now(),
                'status' => 'pending',
            ]);

            foreach ($matured as $transaction) {
                $transaction->update(['status' => 'withdrawn']);
            }

            $account->decrement('balance', $amount);
        });
    }

    $this->info("Processed {$accountCount} account(s), total withdrawn Tsh {$totalWithdrawn}.");
    if ($dryRun) {
        $this->comment('Dry run mode: no database changes were made.');
    }
})->describe('Withdraw all matured savings from a given plan at once');
