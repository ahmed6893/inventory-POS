<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SuppliersController;
use App\Http\Controllers\SalaryController;



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

    Route::get('/supplier',             [SuppliersController::class, 'index'])  ->name('supplier.index');
    Route::post('/supplier/store',      [SuppliersController::class, 'store'])  ->name('supplier.store');
    Route::get('/supplier/view/{id}',   [SuppliersController::class, 'show'])   ->name('supplier.view');
    Route::get('/create-supplier',      [SuppliersController::class, 'create']) ->name('supplier.create');
    Route::get('/supplier/edit/{id}',   [SuppliersController::class, 'edit'])   ->name('supplier.edit');
    Route::post('/supplier/update/{id}',[SuppliersController::class, 'update']) ->name('supplier.update');
    Route::post('/supplier/delete/{id}',[SuppliersController::class, 'destroy'])->name('supplier.destroy');

    Route::get('/salary',             [SalaryController::class, 'index'])  ->name('salary.index');
    Route::post('/salary/store',      [SalaryController::class, 'store'])  ->name('salary.store');
    Route::get('/create-salary',      [SalaryController::class, 'create']) ->name('salary.create');
    Route::get('/salary/edit/{id}',   [SalaryController::class, 'edit'])   ->name('salary.edit');
    Route::post('/salary/update/{id}',[SalaryController::class, 'update']) ->name('salary.update');
    Route::post('/salary/delete/{id}',[SalaryController::class, 'destroy'])->name('salary.destroy');
});

require __DIR__.'/auth.php';
