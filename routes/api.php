<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CompanyController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {
    Route::post('login', [ AuthController::class, 'login' ]);
    Route::post('logout', [ AuthController::class, 'logout' ]);
    Route::post('refresh', [ AuthController::class, 'refresh' ]);
    Route::post('me', [ AuthController::class, 'me' ]);
});

Route::group(['middleware' => 'jwt.auth'], function ($router) {
    Route::get('/companies', [ CompanyController::class, 'getCompanies' ]);
    Route::get('/companies/{client_id}', [ CompanyController::class, 'getCompaniesByClientId' ]);
    Route::get('/clients/{company_id}', [ ClientController::class, 'getClients' ]);
});
