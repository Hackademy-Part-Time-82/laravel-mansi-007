<?php

use App\Http\Controllers\{BookController, UserController};
use Illuminate\Support\Facades\Route;

Route::get('/', [BookController::class, 'index'])->name('books.index');
Route::get('/dettaglio-libro/{book}', [BookController::class, 'show'])->name('books.show');
Route::get('/crea', [BookController::class, 'create'])->name('books.create')->middleware('auth');
Route::post('/salva-libro', [BookController::class, 'store'])->name('books.store');

Route::get('/profilo', [UserController::class, 'index'])->name('users.index');
