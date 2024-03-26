<?php

use App\Http\Controllers\API\PacienteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::prefix('paciente')->group(function(){
    Route::get('/',[PacienteController::class, 'index']);
    Route::post('/',[PacienteController::class, 'create']);
    Route::delete('/{id}',[PacienteController::class, 'delete']);
    Route::put('/{id}',[PacienteController::class, 'update']);
});


