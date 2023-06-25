<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('login');
});
Route::get('/register', function () {
    return view('register');
});
Route::post("login", "app\AuthController@login")->name('login.do');
Route::post("register", "app\AuthController@register")->name('register.do');

Route::prefix('app')->group(function() {
    Route::group(['middleware' => ['auth']], function() {

        // Dashboard HOME
        Route::get('/home', 'app\AuthController@home')->name('app.home');

        // Usuários
        Route::prefix('books')->group(function() {
            Route::get('/', 'app\BookStoreController@index')->name('books.index');
            Route::get('/create', 'app\BookStoreController@create')->name('books.create');
            Route::post('/store', 'app\BookStoreController@store')->name('books.store');
            Route::get('/edit/{id}', 'app\BookStoreController@edit')->name('books.edit');
            Route::put('/update/{id}', 'app\BookStoreController@update')->name('books.update');
            Route::delete('/destroy/{id}', 'app\BookStoreController@destroy')->name('books.destroy');
        });
    });


    // logout
    Route::get('/logout', 'app\AuthController@logout')->name('app.logout');
});
