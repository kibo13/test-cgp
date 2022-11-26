<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Api\ClientController;
use App\Http\Controllers\Api\CompanyController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {
    Route::post('login', [ AuthController::class, 'login' ]);
});

Route::group(['middleware' => 'jwt.auth'], function ($router) {
    Route::get('/companies', [ CompanyController::class, 'getCompanies' ]);
    Route::get('/companies/{client_id}', [ CompanyController::class, 'getCompaniesByClientId' ]);
    Route::get('/clients/{company_id}', [ ClientController::class, 'getClients' ]);
});
