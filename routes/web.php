<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;




Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index']);

    Route::get('/employe',       [EmployeeController::class, 'index'])->name('employer');
    Route::get('/create-employe',[EmployeeController::class, 'create'])->name('employer.create');
    Route::get('/edit-employe',  [EmployeeController::class, 'edit'])->name('employer.edit');
});

require __DIR__.'/auth.php';
