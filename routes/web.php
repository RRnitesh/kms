<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


// Route::controller(AdminHomeController::class)->group(function(){


//     Route::get('/admin', 'index')->name('dashboard');

//     // Route::get('/login', 'login')->name('auth.login');
// });

Route::get('/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');


Route::prefix('users')->controller(UserController::class)->group(function(){
     
    Route::get('/', 'index')->name('users.index');
    
    Route::get('/show/{id}', 'show')->name('users.show');

    // Create - Form
    Route::get('/create', 'create')->name('users.create');

    // Store - Handle create submission
    Route::post('/store', 'store')->name('users.store');

    // // Edit - Form
    Route::get('/edit/{id}', 'edit')->name('users.edit');

    // // Update - Handle edit submission
    Route::put('/update/{id}', 'update')->name('users.update');
    

    // // Delete
    Route::delete('/delete/{id}', 'delete')->name('users.delete');

    // Route::get('/admin', 'admin');
});



