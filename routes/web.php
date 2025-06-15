<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Knowledge\KnowledgeController;
use App\Http\Controllers\site\HomeController;
use App\Http\Controllers\site\SubTopicController;
use App\Http\Controllers\site\TopicController;
use App\Http\Controllers\site\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/session-data', function () {
    return session()->all();
});

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/home/login',[HomeController::class, 'login'])->name('login');


Route::prefix('home')->name('home.') ->controller(HomeController::class)->group(function () {     
        Route::get('/about', 'about')->name('about');  
        Route::get('/register', 'register')->name('register'); 
});

Route::prefix('auth')->name('auth.')->controller(AuthController::class)->group(function () {
    Route::post('/login', 'login')->name('login');
    Route::post('/logout', 'logout')->name('logout');
});


// Route::prefix('dashboard/')->controller(AdminController::class)->group(function () {
//     Route::get('', 'index')->name('admin.dashboard');
// });
Route::prefix('dashboard/')->middleware(['auth', 'permission:dashboard.view'])
    ->controller(AdminController::class)->group(function () {
    Route::get('', 'index')->name('admin.dashboard');
});

Route::prefix('knowledge/')->controller(KnowledgeController::class)->group(function () {

    Route::get('create', 'create')->name('knowledge.create');

    Route::post('create', 'store')->name('knowledge.store');
});


Route::prefix('subtopic/')->controller(SubTopicController::class)->group(function () {

    Route::get('', 'index')->name('subtopic.index');

    Route::get('create')->name('subtopic.create');

    Route::get('edit/{id}')->name('subtopic.edit');

    Route::delete('delete')->name('subtopic.destroy');
});


Route::prefix('topic')->controller(TopicController::class)->group(function () {

    Route::get('/', 'index')->name('topic.index');

    Route::get('/create', 'create')->name('topic.create');

    Route::post('/create', 'store')->name('topic.store');

    Route::get('edit/{id}', 'edit')->name('topic.edit');

    Route::delete('delete/{id}', 'delete')->name('topic.destroy');

    Route::get('/show/{id}', 'show')->name('topic.show');

    Route::put('/update/{id}', 'update')->name('topic.update');

    Route::get('/active-topic', 'activeTopic')->name('topic.active');

    Route::get('/get-sub-topic', 'getSubtopic')->name('topic.getSubTopic');

    // Route::get('/get-trash-data', 'getTrashDataByUserIdAndFileId')->name('topic.trashData');
});


Route::prefix('users')->controller(UserController::class)->group(function () {

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


    Route::delete('/delete-image/{id}', 'deleteImage')->name('users.deleteImage');
    Route::delete('/delete/{id}', 'delete')->name('users.delete');


    Route::get('/download/{id}', 'downloadImage')->name('users.download');

    Route::get('/get-trash-data', 'getTrashDataByUserIdAndFileId')->name('users.trashData');

    Route::post('/store-topic', 'storeTopic')->name('users.topic');
});
