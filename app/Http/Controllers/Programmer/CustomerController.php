<?php

namespace App\Http\Controllers\Programmer;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = User::where('role', User::ROLE_CUSTOMER)
            ->with('savingsAccount.transactions')
            ->get();

        return view('programmer.customers.index', compact('customers'));
    }

    public function show(User $user)
    {
        abort_unless($user->hasRole(User::ROLE_CUSTOMER), 404);

        $savingsAccount = $user->savingsAccount()->with('transactions')->first();
        $totalDeposits = $savingsAccount ? $savingsAccount->transactions()->where('type', 'deposit')->sum('amount') : 0;

        return view('programmer.customers.show', compact('user', 'savingsAccount', 'totalDeposits'));
    }
}
