<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;




Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index']);

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/employe',       [EmployeeController::class, 'index'])->name('employer');
    Route::post('/employe/store',[EmployeeController::class, 'store'])->name('employer.store');
    Route::get('/employe/view/{id}',[EmployeeController::class, 'show'])->name('employer.view');
    Route::get('/create-employe',[EmployeeController::class, 'create'])->name('employer.create');
    Route::get('/employe/edit/{id}',  [EmployeeController::class, 'edit'])->name('employer.edit');
    Route::post('/employe/update/{id}',  [EmployeeController::class, 'update'])->name('employer.update');
    Route::get('/employe/delete/{id}',  [EmployeeController::class, 'destroy'])->name('employer.destroy');
});

require __DIR__.'/auth.php';
