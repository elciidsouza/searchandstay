<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Books route
Route::get('/books', [App\Http\Controllers\Api\BooksController::class, 'index'])->name('api.books.index');
Route::get('/books/find/{id}', [App\Http\Controllers\Api\BooksController::class, 'find'])->name('api.books.index');
Route::post('/books/store', [App\Http\Controllers\Api\BooksController::class, 'store'])->name('api.books.store');
Route::put('/books/update', [App\Http\Controllers\Api\BooksController::class, 'update'])->name('api.books.update');
Route::delete('/books/delete/{id}', [App\Http\Controllers\Api\BooksController::class, 'delete'])->name('api.books.delete');

//Stores route
Route::get('/stores', [App\Http\Controllers\Api\StoresController::class, 'index'])->name('api.stores.index');
Route::get('/stores/find/{id}', [App\Http\Controllers\Api\StoresController::class, 'find'])->name('api.stores.index');
Route::post('/stores/store', [App\Http\Controllers\Api\StoresController::class, 'store'])->name('api.stores.store');
Route::put('/stores/update', [App\Http\Controllers\Api\StoresController::class, 'update'])->name('api.stores.update');
Route::delete('/stores/delete/{id}', [App\Http\Controllers\Api\StoresController::class, 'delete'])->name('api.stores.delete');
