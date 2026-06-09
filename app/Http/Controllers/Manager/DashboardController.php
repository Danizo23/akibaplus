<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\StaffReport;
use App\Models\User;

class DashboardController extends Controller
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
        $customers = User::where('role', User::ROLE_CUSTOMER)->get();
        $reportsCount = StaffReport::count();

        return view('manager.dashboard', compact('staff', 'customers', 'reportsCount'));
    }
}
