<?php

namespace App\Http\Controllers\Programmer;

use App\Http\Controllers\Controller;
use App\Models\StaffReport;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $reports = StaffReport::with('staff')
            ->orderByDesc('created_at')
            ->get();

        return view('programmer.reports.index', compact('reports'));
    }

    public function show(StaffReport $report)
    {
        return view('programmer.reports.show', compact('report'));
    }
}
