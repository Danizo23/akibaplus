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

    // Staff Routes (Finance Officer + Customer Support)
    Route::middleware(['role:finance_officer|customer_support'])->prefix('staff')->name('staff.')->group(function () {
        Route::get('/dashboard', [\App\Http\Controllers\Staff\DashboardController::class, 'index'])->name('dashboard');
        Route::resource('reports', \App\Http\Controllers\Staff\ReportController::class)->only(['create', 'store']);
    });

    // Programmer Routes
    Route::middleware(['role:programmer'])->prefix('programmer')->name('programmer.')->group(function () {
        Route::get('/dashboard', [\App\Http\Controllers\Programmer\DashboardController::class, 'index'])->name('dashboard');
        Route::get('/customers', [\App\Http\Controllers\Programmer\CustomerController::class, 'index'])->name('customers.index');
        Route::get('/customers/{user}', [\App\Http\Controllers\Programmer\CustomerController::class, 'show'])->name('customers.show');
        Route::get('/features', [\App\Http\Controllers\Programmer\FeatureController::class, 'index'])->name('features.index');

        Route::resource('staff', \App\Http\Controllers\Programmer\StaffController::class)->only(['index', 'create', 'store', 'destroy']);
        Route::resource('reports', \App\Http\Controllers\Programmer\ReportController::class)->only(['index', 'show']);
    });

    // Manager Routes
    Route::middleware(['role:manager'])->prefix('manager')->name('manager.')->group(function () {
        Route::get('/dashboard', [\App\Http\Controllers\Manager\DashboardController::class, 'index'])->name('dashboard');
        Route::get('/staff', [\App\Http\Controllers\Manager\StaffController::class, 'index'])->name('staff.index');
        Route::get('/staff/{user}/edit', [\App\Http\Controllers\Manager\StaffController::class, 'edit'])->name('staff.edit');
        Route::patch('/staff/{user}', [\App\Http\Controllers\Manager\StaffController::class, 'update'])->name('staff.update');
        Route::delete('/staff/{user}', [\App\Http\Controllers\Manager\StaffController::class, 'destroy'])->name('staff.destroy');

        Route::get('/customers', [\App\Http\Controllers\Manager\CustomerController::class, 'index'])->name('customers.index');
        Route::get('/customers/{user}', [\App\Http\Controllers\Manager\CustomerController::class, 'show'])->name('customers.show');
        Route::patch('/customers/{user}', [\App\Http\Controllers\Manager\CustomerController::class, 'update'])->name('customers.update');

        Route::get('/reports', [\App\Http\Controllers\Manager\ReportController::class, 'index'])->name('reports.index');
        Route::get('/reports/{report}', [\App\Http\Controllers\Manager\ReportController::class, 'show'])->name('reports.show');
    });
});
