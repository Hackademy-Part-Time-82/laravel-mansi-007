<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BookController::class, 'index'])->name('books.index');

Route::get('/crea', [BookController::class, 'create'])->name('books.create');
Route::post('/salva-libro', [BookController::class, 'store'])->name('books.store');
