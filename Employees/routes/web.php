<?php

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

Route::get('/', function () {
    $employee = EmployeeController::all();
    return view('welcome', $employee)->middelware(['auth']);
});

Route::resource('/', 'EmployeeController')->middleware(['auth']);

Route::resource('/employees', 'EmployeeController')->middleware(['auth']);


require __DIR__.'/auth.php';


