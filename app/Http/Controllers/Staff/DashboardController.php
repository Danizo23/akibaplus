<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\SavingsTransaction;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $totalCustomers = User::where('role', 'customer')->count();
        $totalDeposits = SavingsTransaction::where('type', 'deposit')->sum('amount');

        $customerDepositTotals = User::where('role', 'customer')
            ->leftJoin('savings_accounts', 'users.id', '=', 'savings_accounts.user_id')
            ->leftJoin('savings_transactions', 'savings_accounts.id', '=', 'savings_transactions.savings_account_id')
            ->selectRaw('users.id, users.name, users.email, COALESCE(SUM(CASE WHEN savings_transactions.type = ? THEN savings_transactions.amount END), 0) as total_deposit', ['deposit'])
            ->groupBy('users.id', 'users.name', 'users.email')
            ->orderByDesc('total_deposit')
            ->get();

        return view('staff.dashboard', compact('user', 'totalCustomers', 'totalDeposits', 'customerDepositTotals'));
    }
}
