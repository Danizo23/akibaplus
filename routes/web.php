<?php

use App\Models\SavingsTransaction;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
});

Route::get('/welcome', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    // Customer Routes
    Route::middleware(['role:customer'])->prefix('customer')->name('customer.')->group(function () {
        Route::get('/dashboard', [\App\Http\Controllers\Customer\DashboardController::class, 'index'])->name('dashboard');

        Route::get('/savings', [\App\Http\Controllers\Customer\SavingsController::class, 'index'])->name('savings.index');
        Route::post('/savings/deposit', [\App\Http\Controllers\Customer\SavingsController::class, 'deposit'])->name('savings.deposit');
        Route::get('/savings/withdrawal', [\App\Http\Controllers\Customer\SavingsController::class, 'withdrawal'])->name('savings.withdrawal');
        Route::post('/savings/withdrawal', [\App\Http\Controllers\Customer\SavingsController::class, 'processWithdrawal'])->name('savings.withdraw');
    });

    // Staff Routes
    Route::middleware(['role:staff'])->prefix('staff')->name('staff.')->group(function () {
        Route::get('/dashboard', function () {
            $totalCustomers = User::where('role', 'customer')->count();
            $totalDeposits = SavingsTransaction::where('type', 'deposit')->sum('amount');

            $customerDepositTotals = User::where('role', 'customer')
                ->leftJoin('savings_accounts', 'users.id', '=', 'savings_accounts.user_id')
                ->leftJoin('savings_transactions', 'savings_accounts.id', '=', 'savings_transactions.savings_account_id')
                ->selectRaw('users.id, users.name, users.email, COALESCE(SUM(CASE WHEN savings_transactions.type = ? THEN savings_transactions.amount END), 0) as total_deposit', ['deposit'])
                ->groupBy('users.id', 'users.name', 'users.email')
                ->orderByDesc('total_deposit')
                ->get();

            return view('staff.dashboard', compact('totalCustomers', 'totalDeposits', 'customerDepositTotals'));
        })->name('dashboard');

        Route::resource('reports', \App\Http\Controllers\Staff\ReportController::class)->only(['create', 'store']);
    });

    // Programmer Routes
    Route::middleware(['role:programmer'])->prefix('programmer')->name('programmer.')->group(function () {
        Route::get('/dashboard', function () {
            return view('programmer.dashboard');
        })->name('dashboard');

        Route::resource('staff', \App\Http\Controllers\Programmer\StaffController::class)->only(['create', 'store']);
        Route::resource('reports', \App\Http\Controllers\Programmer\ReportController::class)->only(['index', 'show']);
    });
});
