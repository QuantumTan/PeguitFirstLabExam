<?php

use App\Http\Controllers\CharactersController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CharactersController::class, 'index'])->name('index');
Route::get('/create', [CharactersController::class, 'create'])->name('create');
Route::post('/store', [CharactersController::class, 'store'])->name('store');
Route::get('/edit/{id}', [CharactersController::class, 'edit'])->name('edit');
Route::put('/update/{id}', [CharactersController::class, 'update'])->name('update');
Route::delete('/destroy/{id}', [CharactersController::class, 'destroy'])->name('destroy');
