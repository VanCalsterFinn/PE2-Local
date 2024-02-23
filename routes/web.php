<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('login');
});

Route::get("/dashboard", [DashboardController::class, 'index']);
Route::controller(InvoiceController::class)->group(function () {
    Route::get('/invoices', 'index');
    Route::get('/invoices/{id}/mail', 'sendMail');
    Route::get('/invoices/{id}/download', 'logout');
});
Route::get("/employees", [EmployeeController::class, 'index']);

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'index');
    Route::post('/login', 'authenticate');
    Route::get('/logout', 'logout');
});