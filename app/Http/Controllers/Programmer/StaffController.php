<?php

namespace App\Http\Controllers\Programmer;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class StaffController extends Controller
{
    public function index()
    {
        $staffRoles = [
            User::ROLE_FINANCE_OFFICER,
            User::ROLE_CUSTOMER_SUPPORT,
            User::ROLE_MANAGER,
            User::ROLE_PROGRAMMER,
        ];

        $staff = User::whereIn('role', $staffRoles)->get();

        return view('programmer.staff.index', compact('staff'));
    }

    public function create()
    {
        $roles = array_filter(User::ROLES, fn ($r) => $r !== User::ROLE_CUSTOMER);

        // human readable labels
        $roleOptions = [];
        foreach ($roles as $r) {
            $label = ucwords(str_replace('_', ' ', $r));
            $roleOptions[$r] = $label;
        }

        return view('programmer.staff.create', compact('roleOptions'));
    }

    public function store(Request $request)
    {
        $staffRoles = [
            User::ROLE_FINANCE_OFFICER,
            User::ROLE_CUSTOMER_SUPPORT,
            User::ROLE_PROGRAMMER,
            User::ROLE_MANAGER,
        ];

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', Password::defaults(), 'confirmed'],
            'role' => ['required', 'string', Rule::in($staffRoles)],
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'],
        ]);

        return redirect()->route('programmer.staff.index')->with('success', 'Staff member created successfully.');
    }

    public function destroy(User $staff)
    {
        if (! in_array($staff->role, [
            User::ROLE_FINANCE_OFFICER,
            User::ROLE_CUSTOMER_SUPPORT,
            User::ROLE_MANAGER,
            User::ROLE_PROGRAMMER,
        ], true)) {
            return back()->withErrors(['message' => 'User is not a staff member.']);
        }

        $staff->delete();

        return redirect()->route('programmer.staff.index')->with('success', 'Staff member deleted successfully.');
    }
}
