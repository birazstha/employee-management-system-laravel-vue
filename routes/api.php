<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Api\EmployeeDataController;
use \App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\CountryController;

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

Route::get('/employees/countries',[EmployeeDataController::class,'countries']);
Route::get('/employees/{country}/states',[EmployeeDataController::class,'states']);
Route::get('/employees/{state}/cities',[EmployeeDataController::class,'cities']);
Route::get('/employees/departments',[EmployeeDataController::class,'departments']);

//Route::get('/employees',[EmployeeController::class,'index']);
//Route::post('/employee',[EmployeeController::class,'store']);
//Route::delete('/employee/{employee}',[EmployeeController::class,'destroy']);

Route::apiResource('employees',EmployeeController::class);
Route::apiResource('countries',CountryController::class);

