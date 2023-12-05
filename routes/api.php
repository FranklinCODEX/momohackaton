<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserAuthController;
use App\Http\Controllers\Api\InsuranceController;
use App\Http\Controllers\Api\TypeInsuranceController;

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

Route::middleware('auth:sanctum')->group(function(){
    Route::patch('/updateProfile', [UserAuthController::class, 'updateProfile']);
    Route::post('/createInsurance', [InsuranceController::class, 'createInsurance']);
    Route::apiResource('/typeInsurance', TypeInsuranceController::class);
});

Route::get('/allTypeInsurence', [InsuranceController::class, 'allTypeInsurance']);
Route::post('/register', [UserAuthController::class, 'register']);
Route::post('/login', [UserAuthController::class, 'login']);

