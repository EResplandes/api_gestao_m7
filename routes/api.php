<?php

use App\Http\Controllers\AutenticacaoController;
use App\Http\Controllers\EleitoresController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('cadastro-amigo')->group(function () {

    Route::controller(EleitoresController::class)->group(function () {
        Route::post('/cadastrar/{idIndicador}', 'cadastrarEleitor');
        Route::get('/buscar-eleitores/{idPadrinho}', 'buscarEleitores')->middleware(['auth:sanctum', 'throttle:10,1']);
    });
});

Route::prefix('autenticacao')->group(function () {
    Route::controller(AutenticacaoController::class)->group(function () {
        Route::post('/login', 'login')->middleware('throttle:10,1')->name('login');
    })->middleware('cors');

    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/verifica-token', function (Request $request) {
            return response()->json(['message' => 'Token Valido']);
        });
    });

});
