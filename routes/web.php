<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::controller(HomeController::class)->group(function(){

    Route::get('/', 'index')->name('pages.index');

    Route::get('/admin', 'admin')->name('dashboard');

    Route::get('/login', 'login')->name('auth.login');
});


Route::prefix('users')->controller(UserController::class)->group(function(){
     
    Route::get('/', 'index')->name('users.index');
    
    Route::get('/show/{id}', 'show')->name('users.show');

    // Route::get('')

});



