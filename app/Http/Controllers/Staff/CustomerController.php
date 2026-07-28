<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = User::where('role', User::ROLE_CUSTOMER)
            ->with('savingsAccount.transactions')
            ->get()
            ->map(function (User $customer) {
                $transactions = $customer->savingsAccount?->transactions ?? collect();
                $depositTransactions = $transactions->where('type', 'deposit');

                $customer->total_deposits = $depositTransactions->sum('amount');
                $customer->withdrawable_amount = $depositTransactions
                    ->where('status', 'active')
                    ->filter(fn ($transaction) => $transaction->isMatured())
                    ->sum('amount');

                $nextDeposit = $depositTransactions
                    ->where('status', 'active')
                    ->filter(fn ($transaction) => !$transaction->isMatured())
                    ->sortBy('maturity_date')
                    ->first();

                $customer->next_withdrawal_date = $nextDeposit?->getMaturityDateFormatted();

                return $customer;
            });

        return view('staff.customers.index', compact('customers'));
    }

    public function show(User $user)
    {
        abort_unless($user->hasRole(User::ROLE_CUSTOMER), 404);

        $savingsAccount = $user->savingsAccount()->with('transactions')->first();
        $totalDeposits = $savingsAccount ? $savingsAccount->transactions()->where('type', 'deposit')->sum('amount') : 0;
        $depositTransactions = $savingsAccount ? $savingsAccount->transactions()->where('type', 'deposit')->orderByDesc('created_at')->get() : collect();
        $withdrawals = $savingsAccount ? $savingsAccount->transactions()->where('type', 'withdrawal')->orderByDesc('created_at')->get() : collect();

        return view('staff.customers.show', compact('user', 'savingsAccount', 'totalDeposits', 'depositTransactions', 'withdrawals'));
    }
}
