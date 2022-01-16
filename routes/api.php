<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Api\EmployeeDataController;
use \App\Http\Controllers\Api\EmployeeController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/employee/countries',[EmployeeDataController::class,'countries']);
Route::get('/employee/{country}/states',[EmployeeDataController::class,'states']);
Route::get('/employee/{state}/cities',[EmployeeDataController::class,'cities']);
Route::get('/employee/departments',[EmployeeDataController::class,'departments']);

Route::get('/employees',[EmployeeController::class,'index']);
Route::post('/employee',[EmployeeController::class,'store']);

