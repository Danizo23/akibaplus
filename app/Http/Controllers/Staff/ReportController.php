<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\StaffReport;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function create(Request $request)
    {
        $reportDate = $request->query('report_date', today()->toDateString());

        $newCustomers = User::where('role', 'customer')
            ->whereDate('users.created_at', $reportDate)
            ->leftJoin('savings_accounts', 'users.id', '=', 'savings_accounts.user_id')
            ->leftJoin('savings_transactions', 'savings_accounts.id', '=', 'savings_transactions.savings_account_id')
            ->select('users.id', 'users.name', 'users.email', DB::raw('COALESCE(SUM(CASE WHEN savings_transactions.type = "deposit" THEN savings_transactions.amount END), 0) as deposit_total'))
            ->groupBy('users.id', 'users.name', 'users.email')
            ->orderByDesc('deposit_total')
            ->get();

        $newCustomersCount = $newCustomers->count();
        $newCustomersTotalDeposit = $newCustomers->sum('deposit_total');

        return view('staff.reports.create', compact('reportDate', 'newCustomers', 'newCustomersCount', 'newCustomersTotalDeposit'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'report_date' => ['required', 'date'],
            'work_summary' => ['required', 'string', 'max:2000'],
        ]);

        $newCustomers = User::where('role', 'customer')
            ->whereDate('users.created_at', $validated['report_date'])
            ->leftJoin('savings_accounts', 'users.id', '=', 'savings_accounts.user_id')
            ->leftJoin('savings_transactions', 'savings_accounts.id', '=', 'savings_transactions.savings_account_id')
            ->select('users.id', 'users.name', 'users.email', DB::raw('COALESCE(SUM(CASE WHEN savings_transactions.type = "deposit" THEN savings_transactions.amount END), 0) as deposit_total'))
            ->groupBy('users.id', 'users.name', 'users.email')
            ->orderByDesc('deposit_total')
            ->get();

        StaffReport::create([
            'staff_id' => Auth::id(),
            'report_date' => $validated['report_date'],
            'work_summary' => $validated['work_summary'],
            'customer_snapshot' => $newCustomers->map(function ($customer) {
                return [
                    'id' => $customer->id,
                    'name' => $customer->name,
                    'email' => $customer->email,
                    'deposit_total' => (float) $customer->deposit_total,
                ];
            })->toArray(),
            'new_customers_count' => $newCustomers->count(),
            'new_customers_total_deposit' => $newCustomers->sum('deposit_total'),
            'status' => 'pending',
        ]);

        return redirect()->route('staff.reports.create', ['report_date' => $validated['report_date']])
            ->with('success', 'Report successfully submitted to the programmer.');
    }
}
