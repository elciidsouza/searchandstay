<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::middleware('auth')->group(function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    //Books routes
    Route::get('/books/index', [App\Http\Controllers\BooksController::class, 'index'])->name('books.index');
    Route::get('/books/create', [App\Http\Controllers\BooksController::class, 'create'])->name('books.create');
    Route::get('/books/edit/{id}', [App\Http\Controllers\BooksController::class, 'edit'])->name('books.edit');

    //Stores routes
    Route::get('/stores/index', [App\Http\Controllers\StoresController::class, 'index'])->name('stores.index');
    Route::get('/stores/create', [App\Http\Controllers\StoresController::class, 'create'])->name('stores.create');
    Route::get('/stores/edit/{id}', [App\Http\Controllers\StoresController::class, 'edit'])->name('stores.edit');

    // Demais rotas
});
