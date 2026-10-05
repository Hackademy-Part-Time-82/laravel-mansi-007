<?php

use App\Http\Controllers\{AuthorController, BookController, UserController, CategoryController};
use App\Models\Category;
use Illuminate\Support\Facades\Route;

Route::view('/test', 'test'); //animazione animate on scroll
Route::get('/', [BookController::class, 'index'])->name('books.index');

Route::get('/crea', [BookController::class, 'create'])->name('books.create')->middleware('auth');
Route::post('/salva-libro', [BookController::class, 'store'])->name('books.store')->middleware('auth');

Route::get('/modifica-libro/{book}', [BookController::class, 'edit'])->name('books.edit')->middleware('auth');
Route::put('/aggiorna-libro/{book}', [BookController::class, 'update'])
    ->name('books.update')
    ->middleware('auth');

Route::delete('/elimina-libro/{book}', [BookController::class, 'destroy'])->name('books.destroy')->middleware('auth');
Route::get('/dettaglio-libro/{book}', [BookController::class, 'show'])->name('books.show');
//Resource COntroller
Route::resource('authors', AuthorController::class);

//---
Route::get('/categorie', [CategoryController::class, 'index'])->name('categories.index');

Route::get('/categorie/crea', [CategoryController::class, 'create'])->name('categories.create')->middleware('auth');
Route::post('/categorie/salva', [CategoryController::class, 'store'])->name('categories.store')->middleware('auth');

Route::get('/categorie/modifica/{category}', [CategoryController::class, 'edit'])->name('categories.edit')->middleware('auth');
Route::put('/categorie/aggiorna/{category}', [CategoryController::class, 'update'])
    ->name('categories.update')
    ->middleware('auth');

Route::delete('/categorie/elimina/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy')->middleware('auth');
Route::get('/categorie/dettaglio/{category}', [CategoryController::class, 'show'])->name('categories.show');

Route::get('/profilo', [UserController::class, 'index'])->name('users.index')->middleware('auth');
