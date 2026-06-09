<?php

namespace App\Http\Controllers\Programmer;

use App\Http\Controllers\Controller;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $staffCount = User::whereIn('role', ['finance_officer', 'customer_support', 'manager', 'programmer'])->count();
        $customerCount = User::where('role', 'customer')->count();

        return view('programmer.dashboard', compact('staffCount', 'customerCount'));
    }
}
