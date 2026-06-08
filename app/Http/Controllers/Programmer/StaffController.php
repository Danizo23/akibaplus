<?php

namespace App\Http\Controllers\Programmer;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class StaffController extends Controller
{
    public function index()
    {
        $staff = User::where('role', 'staff')->get();
        return view('programmer.staff.index', compact('staff'));
    }

    public function create()
    {
        return view('programmer.staff.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', Password::defaults(), 'confirmed'],
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'staff',
        ]);

        return redirect()->route('programmer.staff.index')->with('success', 'Staff member created successfully.');
    }

    public function destroy(User $staff)
    {
        if ($staff->role !== 'staff') {
            return back()->withErrors(['message' => 'User is not a staff member.']);
        }

        $staff->delete();

        return redirect()->route('programmer.staff.index')->with('success', 'Staff member deleted successfully.');
    }
}
