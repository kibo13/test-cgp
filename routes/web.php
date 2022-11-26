<?php

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
});
