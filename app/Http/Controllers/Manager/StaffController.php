<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StaffController extends Controller
{
    public function index()
    {
        $staffRoles = [
            User::ROLE_FINANCE_OFFICER,
            User::ROLE_CUSTOMER_SUPPORT,
            User::ROLE_PROGRAMMER,
            User::ROLE_MANAGER,
        ];

        $staff = User::whereIn('role', $staffRoles)->get();
        return view('manager.staff.index', compact('staff'));
    }

    public function edit(User $user)
    {
        abort_unless($user->hasRole([
            User::ROLE_FINANCE_OFFICER,
            User::ROLE_CUSTOMER_SUPPORT,
            User::ROLE_PROGRAMMER,
            User::ROLE_MANAGER,
        ]), 404);

        $staffRoles = [
            User::ROLE_FINANCE_OFFICER,
            User::ROLE_CUSTOMER_SUPPORT,
            User::ROLE_PROGRAMMER,
            User::ROLE_MANAGER,
        ];

        $roleOptions = [];
        foreach ($staffRoles as $r) {
            $label = ucwords(str_replace('_', ' ', $r));
            $roleOptions[$r] = $label;
        }

        return view('manager.staff.edit', compact('user', 'roleOptions'));
    }

    public function update(Request $request, User $user)
    {
        abort_unless($user->hasRole([
            User::ROLE_FINANCE_OFFICER,
            User::ROLE_CUSTOMER_SUPPORT,
            User::ROLE_PROGRAMMER,
            User::ROLE_MANAGER,
        ]), 404);

        $staffRoles = [
            User::ROLE_FINANCE_OFFICER,
            User::ROLE_CUSTOMER_SUPPORT,
            User::ROLE_PROGRAMMER,
            User::ROLE_MANAGER,
        ];

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'role' => ['required', 'string', Rule::in($staffRoles)],
        ]);

        $user->update($validated);

        return redirect()->route('manager.staff.index')->with('success', 'Staff details updated successfully.');
    }

    public function destroy(User $user)
    {
        abort_unless($user->hasRole([
            User::ROLE_FINANCE_OFFICER,
            User::ROLE_CUSTOMER_SUPPORT,
            User::ROLE_PROGRAMMER,
            User::ROLE_MANAGER,
        ]), 404);

        if ($user->id === auth()->id()) {
            return back()->withErrors(['message' => 'You cannot delete yourself.']);
        }

        $user->delete();

        return redirect()->route('manager.staff.index')->with('success', 'Staff member deleted successfully.');
    }
}
