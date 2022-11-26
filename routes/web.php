<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes([
    'login'    => true,
    'reset'    => false,
    'confirm'  => false,
    'verify'   => false,
    'register' => false,
]);

Route::group([
    'middleware' => 'auth',
    'as'         => 'admin.'
], function () {
    Route::get('/', [ HomeController::class, 'index' ])->name('home');
    Route::resource('companies', CompanyController::class);
    Route::resource('clients', ClientController::class);
});
