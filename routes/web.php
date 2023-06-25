<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::post("login", "App\Http\Controllers\AuthController@login")->name('login.do');
Route::post("register", "App\Http\Controllers\AuthController@register")->name('register.do');

Route::prefix('app')->group(function() {
    Route::group(['middleware' => ['auth']], function() {

        // Dashboard HOME
        Route::get('/dashboard', 'App\Http\Controllers\AuthController@home')->name('books.index');

        // Usuários
        Route::prefix('books')->group(function() {
            Route::get('/create', 'App\Http\Controllers\BookStoreController@create')->name('books.create');
            Route::post('/store', 'App\Http\Controllers\BookStoreController@store')->name('books.store');
            Route::get('/edit/{id}', 'App\Http\Controllers\BookStoreController@edit')->name('books.edit');
            Route::put('/update/{id}', 'App\Http\Controllers\BookStoreController@update')->name('books.update');
            Route::delete('/destroy/{id}', 'App\Http\Controllers\BookStoreController@destroy')->name('books.destroy');
        });
    });


    // logout
    Route::get('/logout', 'App\Http\Controllers\AuthController@logout')->name('app.logout');
});
