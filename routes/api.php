<?php

use App\Http\Controllers\{
    SaborController,
    UserController
};
use Illuminate\Support\Facades\Route;

Route::post('/cadastrar', [UserController::class, 'store']);

Route::prefix('/user')->group(function (){
    Route::get('/', [UserController::class, 'index']);
    Route::put('/atualizar/{id}', [UserController::class, 'update']);
    Route::delete('/deletar/{id}', [UserController::class, 'destroy']);
    Route::get('/visualizar/{id}', [UserController::class, 'show']);
});

Route::prefix('/sabor')->group(function (){
    Route::post('/', [SaborController::class, 'store']);
    Route::get('/', [SaborController::class, 'index']);
    Route::put('/atualizar/{id}', [SaborController::class, 'update']);
    Route::delete('/deletar/{id}', [SaborController::class, 'destroy']);
    Route::get('/visualizar/{id}', [SaborController::class, 'show']);
});
