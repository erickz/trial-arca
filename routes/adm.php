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

Route::middleware('auth')->prefix('adm')->group(function(){
    Route::get('companies', [App\Http\Controllers\Adm\CompanyController::class, 'index'])->name('adm.companies.index');
    // Route::get('/{companyName}', [App\Http\Controllers\CompanyController::class, 'details'])->name('companies.details');
});