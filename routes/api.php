<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('api')->prefix('v1')->group(function () {
    Route::get('employees/{employee}', [\App\Employee\Employees\Application\Http\Controllers\EmployeeController::class, 'show'])->name('employee-show');
    Route::put('employees', [\App\Employee\Employees\Application\Http\Controllers\EmployeeController::class, 'store'])->name('employee-store');
    Route::post('employees/{employee}', [\App\Employee\Employees\Application\Http\Controllers\EmployeeController::class, 'update'])->name('employee-update');
    Route::delete('employees/{employee}', [\App\Employee\Employees\Application\Http\Controllers\EmployeeController::class, 'delete'])->name('employee-delete');
});
