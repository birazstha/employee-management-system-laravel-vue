<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Backend\UserController;
use \App\Http\Controllers\Backend\CountryController;
use \App\Http\Controllers\Backend\StateController;
use \App\Http\Controllers\Backend\CityController;
use \App\Http\Controllers\Backend\DepartmentController;
use \App\Http\Controllers\Api\EmployeeDataController;



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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('user/{user}/change-password', [UserController::class, 'changePassword'])->name('user.changepassword');
Route::resource('user',UserController::class);
Route::resource('country',CountryController::class);
Route::resource('state',StateController::class);
Route::resource('city',CityController::class);
Route::resource('department',DepartmentController::class);

//Route::get('{any}',function (){
//   return view('employee.index');
//})->where('any','.*');

Route::prefix('employee/')->group(function(){
    Route::get('create',function (){
        return view('employee.index');
    });

    Route::get('',function (){
        return view('employee.index');
    });

    Route::get('edit/{id}',function (){
        return view('employee.index');
    });
});

Route::prefix('country/')->group(function(){
    Route::get('create',function (){
        return view('employee.index');
    });

    Route::get('',function (){
        return view('employee.index');
    });

    Route::get('edit/{id}',function (){
        return view('employee.index');
    });
});





