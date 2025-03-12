<?php

use App\Http\Controllers\EleitoresController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('cadastro-amigo')->group(function () {

    Route::controller(EleitoresController::class)->group(function () {
        Route::post('/cadastrar/{idIndicador}', 'cadastrarEleitor');
    });

});
