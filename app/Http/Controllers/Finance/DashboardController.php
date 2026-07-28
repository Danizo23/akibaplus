<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use App\Models\SavingsAccount;
use App\Models\SavingsTransaction;
use App\Models\User;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    public function index()
    {

       
       

        $totalUsers = User::count();
        $totalSavingsAccounts = SavingsAccount::count();
        $totalSavingsTransactions = SavingsTransaction::count();

        return view('finance.dashboard', compact('totalUsers', 'totalSavingsAccounts', 'totalSavingsTransactions'));
    }
}