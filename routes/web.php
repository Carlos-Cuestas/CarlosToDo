<?php

use App\Http\Controllers\ToDOController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/',[ToDoController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/create',[ToDoController::class, 'create'])->middleware(['auth', 'verified'])->name('create');
Route::post('/store',[ToDoController::class, 'store'])->middleware(['auth', 'verified'])->name('store');
Route::post('/seelist',[ToDoController::class, 'seelist'])->middleware(['auth', 'verified'])->name('seelist');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
