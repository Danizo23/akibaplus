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
        } elseif ($user->isManager()) {
            return redirect()->route('manager.dashboard');
        } 
        elseif ($user->isFinanceOfficer()) {
        return redirect()->route('finance.dashboard');
        }
        elseif ($user->isStaff()) {
            return redirect()->route('staff.dashboard');
        } elseif ($user->isCustomer()) {
            return redirect()->route('customer.dashboard');
        }

        // Kama user hana role yoyote inayoeleweka
        abort(403, 'Unauthorized access.');
    }
}
