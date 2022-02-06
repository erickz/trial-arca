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

Route::get('', [App\Http\Controllers\CompanyController::class, 'index'])->name('companies.index');
Route::get('/{companyName}', [App\Http\Controllers\CompanyController::class, 'details'])->name('companies.details');

Route::get('adm/login', [App\Http\Controllers\LoginController::class, 'index'])->name('login');
Route::post('adm/login', [App\Http\Controllers\LoginController::class, 'doLogin'])->name('login.doLogin');
Route::get('adm/logout', [App\Http\Controllers\LoginController::class, 'doLogout'])->name('login.doLogout');