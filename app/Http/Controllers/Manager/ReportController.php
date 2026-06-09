<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\StaffReport;

class ReportController extends Controller
{
    public function index()
    {
        $reports = StaffReport::with('staff')
            ->orderByDesc('created_at')
            ->get();

        return view('manager.reports.index', compact('reports'));
    }

    public function show(StaffReport $report)
    {
        return view('manager.reports.show', compact('report'));
    }
}
