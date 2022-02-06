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
    Route::get('companies/create', [App\Http\Controllers\Adm\CompanyController::class, 'create'])->name('adm.companies.create');
    Route::post('companies/create', [App\Http\Controllers\Adm\CompanyController::class, 'store'])->name('adm.companies.store');
    Route::get('companies/edit/{id}', [App\Http\Controllers\Adm\CompanyController::class, 'edit'])->name('adm.companies.edit');
    Route::put('companies/edit/{id}', [App\Http\Controllers\Adm\CompanyController::class, 'update'])->name('adm.companies.update');
    // Route::get('/{companyName}', [App\Http\Controllers\CompanyController::class, 'details'])->name('companies.details');
});