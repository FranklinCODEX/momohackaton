<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TypeInsuranceController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['admin-access'])->group(function(){
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::resource('/typeInsurance', TypeInsuranceController::class);
});
Route::get('/login', [AdminController::class, 'login'])->name('login');
Route::post('/connect', [AdminController::class, 'connect'])->name('connect');
Route::post('/logout', [AdminController::class, 'logout'])->name('logout');