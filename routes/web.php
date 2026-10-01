<?php

use App\Http\Controllers\{AuthorController, BookController, UserController};
use Illuminate\Support\Facades\Route;

Route::view('/test', 'test'); //animazione animate on scroll
Route::get('/', [BookController::class, 'index'])->name('books.index');
Route::get('/dettaglio-libro/{book}', [BookController::class, 'show'])->name('books.show');
Route::get('/crea', [BookController::class, 'create'])->name('books.create')->middleware('auth');
Route::post('/salva-libro', [BookController::class, 'store'])->name('books.store')->middleware('auth');

Route::get('/modifica-libro/{book}', [BookController::class, 'edit'])->name('books.edit')->middleware('auth');
Route::put('/aggiorna-libro/{book}', [BookController::class, 'update'])
    ->name('books.update')
    ->middleware('auth');

Route::delete('/elimina-libro/{book}', [BookController::class, 'destroy'])->name('books.destroy')->middleware('auth');

Route::resource('authors', AuthorController::class);

Route::get('/profilo', [UserController::class, 'index'])->name('users.index')->middleware('auth');
