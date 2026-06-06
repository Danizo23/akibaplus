<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->isProgrammer()) {
            return redirect()->route('programmer.dashboard');
        } elseif ($user->isStaff()) {
            return redirect()->route('staff.dashboard');
        }

        return redirect()->route('customer.dashboard');
    }
}
