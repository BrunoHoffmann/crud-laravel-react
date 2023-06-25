<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::post("login", "AuthController@login")->name('login.do');
Route::post("register", "AuthController@register")->name('register.do');

Route::prefix('app')->group(function() {
    Route::group(['middleware' => ['auth']], function() {

        // Dashboard HOME
        Route::get('/dashboard', 'AuthController@home')->name('books.index');

        // Usuários
        Route::prefix('books')->group(function() {
            Route::get('/create', 'BookStoreController@create')->name('books.create');
            Route::post('/store', 'BookStoreController@store')->name('books.store');
            Route::get('/edit/{id}', 'BookStoreController@edit')->name('books.edit');
            Route::put('/update/{id}', 'BookStoreController@update')->name('books.update');
            Route::delete('/destroy/{id}', 'BookStoreController@destroy')->name('books.destroy');
        });
    });


    // logout
    Route::get('/logout', 'AuthController@logout')->name('app.logout');
});
