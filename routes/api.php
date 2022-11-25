<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\CompanyController;
use Illuminate\Support\Facades\Route;

Route::get('/companies', [ CompanyController::class, 'getCompanies' ]);
Route::get('/companies/{client_id}', [ CompanyController::class, 'getCompaniesByClientId' ]);
Route::get('/clients/{company_id}', [ ClientController::class, 'getClients' ]);
