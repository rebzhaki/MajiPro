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
    return view('welcome');
});

Route::resource('customer','App\Http\Controllers\CustomerController');
Route::resource('role','App\Http\Controllers\RoleController');
Route::resource('tarrif','App\Http\Controllers\TarrifController');
Route::resource('tarrifItem','App\Http\Controllers\TarrifItemController');
Route::resource('consumption','App\Http\Controllers\ConsumptionController');
Route::resource('user','App\Http\Controllers\UserController');
Route::resource('bill','App\Http\Controllers\BillController');
Route::resource('payment','App\Http\Controllers\PaymentController');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', function () {
    // Only authenticated users may access this route...
})->middleware('auth');