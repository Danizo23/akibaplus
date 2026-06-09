<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\SavingsAccount;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = User::where('role', User::ROLE_CUSTOMER)
            ->with('savingsAccount.transactions')
            ->get();

        return view('manager.customers.index', compact('customers'));
    }

    public function show(User $user)
    {
        abort_unless($user->hasRole(User::ROLE_CUSTOMER), 404);

        $savingsAccount = $user->savingsAccount()->with('transactions')->first();
        $totalDeposits = $savingsAccount ? $savingsAccount->transactions()->where('type', 'deposit')->sum('amount') : 0;

        return view('manager.customers.show', compact('user', 'savingsAccount', 'totalDeposits'));
    }

    public function update(Request $request, User $user)
    {
        abort_unless($user->hasRole(User::ROLE_CUSTOMER), 404);

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
        ]);

        $user->update($validated);

        return redirect()->route('manager.customers.show', $user)->with('success', 'Customer details updated successfully.');
    }
}
