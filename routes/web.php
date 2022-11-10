<?php

use App\Http\Controllers\Controller; 
use App\Http\Controllers\EmployeesController; 
use Illuminate\Support\Facades\Route;

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

Route::get('/',[Controller::class,'view']);
Route::post('/',[Controller::class,'check']);

Route::get('employees',[Controller::class,'main']);




Route::get('employees',[EmployeesController::class,'view']); 

Route::get('addemp',[EmployeesController::class,'add']);
Route::post('addemp',[EmployeesController::class,'store']);

Route::get('employees/delete/{id}',[EmployeesController::class,'delete']);

Route::get('employees/edit/{id}',[EmployeesController::class,'edit']);
Route::post('employees/update/{id}',[EmployeesController::class,'update']);

