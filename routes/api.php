<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/cadastrar', [UserController::class, 'store']);

Route::prefix('/user')->group(function (){
    Route::get('/', [UserController::class, 'index']);

    Route::get('/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    
    Route::put('/{user}', [UserController::class, 'update'])->name('users.update');

    Route::delete('/{user}', [UserController::class, 'destroy'])->name('users.destroy');
});
