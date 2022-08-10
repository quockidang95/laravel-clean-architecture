<?php

use Illuminate\Support\Facades\Route;
use App\Domain\Users\Http\Controllers\UserController;


Route::post('/', [UserController::class, 'store'])->name('store');
Route::get('/{user}', [UserController::class, 'show'])->name('show');
Route::get('/', [UserController::class, 'index'])->name('index');
Route::delete('/{user}', [UserController::class, 'delete'])->name('delete');