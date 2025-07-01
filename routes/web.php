<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CustomerController;




Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index']);

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/employe',              [EmployeeController::class, 'index'])  ->name('employer');
    Route::post('/employe/store',       [EmployeeController::class, 'store'])  ->name('employer.store');
    Route::get('/employe/view/{id}',    [EmployeeController::class, 'show'])   ->name('employer.view');
    Route::get('/create-employe',       [EmployeeController::class, 'create']) ->name('employer.create');
    Route::get('/employe/edit/{id}',    [EmployeeController::class, 'edit'])   ->name('employer.edit');
    Route::post('/employe/update/{id}', [EmployeeController::class, 'update']) ->name('employer.update');
    Route::get('/employe/delete/{id}',  [EmployeeController::class, 'destroy'])->name('employer.destroy');

    Route::get('/customer',             [CustomerController::class, 'index'])  ->name('customer.index');
    Route::post('/customer/store',      [CustomerController::class, 'store'])  ->name('customer.store');
    Route::get('/customer/view/{id}',   [CustomerController::class, 'show'])   ->name('customer.view');
    Route::get('/create-customer',      [CustomerController::class, 'create']) ->name('customer.create');
    Route::get('/customer/edit/{id}',   [CustomerController::class, 'edit'])   ->name('customer.edit');
    Route::post('/customer/update/{id}',[CustomerController::class, 'update']) ->name('customer.update');
    Route::post('/customer/delete/{id}',[CustomerController::class, 'destroy'])->name('customer.destroy');
});

require __DIR__.'/auth.php';
