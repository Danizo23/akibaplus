<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\SavingsAccount;
use App\Models\SavingsTransaction;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SavingsController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $savingsAccount = $user->savingsAccount()->with('transactions')->first();

        return view('customer.savings.index', compact('savingsAccount'));
    }

    public function deposit(Request $request)
    {
        $user = auth()->user();
        $savingsAccount = $user->savingsAccount;

        $rules = [
            'amount' => ['required', 'numeric', 'min:1'],
            'plan_months' => ['required', 'integer', Rule::in([6, 12])],
        ];

        if (!$savingsAccount) {
            // First time setup
            $rules['mobile_number'] = ['required', 'string', 'max:20'];
            $rules['provider'] = ['required', 'string', Rule::in(['tigo', 'voda', 'airtel', 'halotel'])];
            
            $validated = $request->validate($rules);

            $savingsAccount = $user->savingsAccount()->create([
                'balance' => 0,
                'period_months' => $validated['plan_months'],
                'mobile_number' => $validated['mobile_number'],
                'provider' => $validated['provider'],
            ]);
        } else {
            // Existing account: validate mobile number matches
            $rules['mobile_number'] = ['required', 'string', Rule::in([$savingsAccount->mobile_number])];
            
            $messages = [
                'mobile_number.in' => 'The mobile number provided does not match the registered savings number.',
            ];
            
            $validated = $request->validate($rules, $messages);
        }

        // Simulate mobile money transfer here...
        // For example, if it fails, we would return back()->withErrors(['message' => 'Transfer failed.']);
        // Assuming success:
        
        $amount = $validated['amount'];
        $planMonths = (int) $validated['plan_months'];
        $maturityDate = now()->addMonths($planMonths);
        
        $savingsAccount->transactions()->create([
            'amount' => $amount,
            'type' => 'deposit',
            'plan_months' => $planMonths,
            'maturity_date' => $maturityDate,
            'status' => 'active',
        ]);

        $savingsAccount->increment('balance', $amount);

        return redirect()->route('customer.savings.index')->with('success', 'Money deposited successfully to the ' . $planMonths . '-month plan. Amount added: ' . $amount);
    }

    public function withdrawal(Request $request)
    {
        $user = auth()->user();
        $savingsAccount = $user->savingsAccount()->with('transactions')->first();

        if (!$savingsAccount) {
            return redirect()->route('customer.savings.index')->with('error', 'No savings account found.');
        }

        // Get only real mature transactions
        $matureTransactions = $savingsAccount->getMatureTransactions();
        $totalMatureAmount = $matureTransactions->sum('amount');
        $totalPendingWithdrawal = $savingsAccount->getTotalPendingWithdrawal();
        $activeDeposits = $savingsAccount->getActiveDeposits();

        return view('customer.savings.withdrawal', compact(
            'savingsAccount',
            'matureTransactions',
            'totalMatureAmount',
            'totalPendingWithdrawal',
            'activeDeposits'
        ));
    }

    public function processWithdrawal(Request $request)
    {
        $user = auth()->user();
        $savingsAccount = $user->savingsAccount;

        if (!$savingsAccount) {
            return back()->withErrors(['message' => 'No savings account found.']);
        }

        $validated = $request->validate([
            'amount' => ['required', 'numeric', 'min:1'],
            'transaction_ids' => ['required', 'array', 'min:1'],
            'transaction_ids.*' => ['integer'],
        ]);

        $amount = $validated['amount'];
        $transactionIds = $validated['transaction_ids'];

        // Verify all selected transactions belong to this account and are mature
        $matureTransactions = $savingsAccount->getMatureTransactions();
        $matureIds = $matureTransactions->pluck('id')->toArray();

        foreach ($transactionIds as $transactionId) {
            if (!in_array($transactionId, $matureIds)) {
                return back()->withErrors(['message' => 'One or more selected transactions are not mature or don\'t belong to you.']);
            }
        }

        // Calculate total available from selected transactions
        $selectedTransactions = $matureTransactions->whereIn('id', $transactionIds);
        $totalAvailable = $selectedTransactions->sum('amount');

        if ($amount > $totalAvailable) {
            return back()->withErrors(['message' => 'Withdrawal amount exceeds available mature balance.']);
        }

        // Create withdrawal transaction record with pending status
        $savingsAccount->transactions()->create([
            'amount' => $amount,
            'type' => 'withdrawal',
            'plan_months' => 0,
            'maturity_date' => now(),
            'status' => 'pending',
        ]);

        // Mark selected transactions as partially or fully withdrawn
        $remainingAmount = $amount;
        foreach ($selectedTransactions as $transaction) {
            if ($remainingAmount <= 0) {
                break;
            }

            if ($transaction->amount <= $remainingAmount) {
                // Fully withdraw from this transaction
                $transaction->update(['status' => 'withdrawn']);
                $remainingAmount -= $transaction->amount;
            } else {
                // Partial withdrawal - we'll track this differently
                // For now, mark as withdrawn if amount matches
                if ($remainingAmount == $transaction->amount) {
                    $transaction->update(['status' => 'withdrawn']);
                    $remainingAmount = 0;
                }
            }
        }

        // Deduct from balance
        $savingsAccount->decrement('balance', $amount);

        return redirect()->route('customer.savings.index')->with('success', 'Withdrawal request of Tsh ' . number_format($amount, 2) . ' has been submitted. Please wait for confirmation.');
    }
}
