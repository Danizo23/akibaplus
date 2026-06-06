<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        
        // Load the savings account with ALL transactions (for calculations)
        $savingsAccount = $user->savingsAccount()->with('transactions')->first();

        // Use current balance and plan-specific transaction totals from ALL transactions
        $totalSaved = $savingsAccount ? $savingsAccount->balance : 0;
        $totalSixMonth = $savingsAccount ? $savingsAccount->transactions->where('plan_months', 6)->where('type', 'deposit')->where('status', '!=', 'withdrawn')->sum('amount') : 0;
        $totalTwelveMonth = $savingsAccount ? $savingsAccount->transactions->where('plan_months', 12)->where('type', 'deposit')->where('status', '!=', 'withdrawn')->sum('amount') : 0;
        $periodMonths = $savingsAccount ? $savingsAccount->period_months : null;
        
        // Get only recent transactions for display
        $transactions = $savingsAccount ? $savingsAccount->transactions->where('type', 'deposit')->sortByDesc('created_at')->take(5) : collect();

        return view('customer.dashboard', compact('savingsAccount', 'totalSaved', 'totalSixMonth', 'totalTwelveMonth', 'periodMonths', 'transactions'));
    }
}
