<?php

use App\Http\Controllers\Api\v1\AnneeAcademiqueController;
use App\Http\Controllers\Api\v1\AuthController;
use App\Http\Controllers\Api\v1\EtudiantController;
use App\Http\Controllers\Api\v1\FormationController;
use App\Http\Controllers\Api\v1\InscriptionController;
use App\Http\Controllers\Api\v1\NiveauController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    
    Route::apiResource('annee-academique', AnneeAcademiqueController::class);
    Route::apiResource('niveau', NiveauController::class);
    Route::apiResource('formation', FormationController::class);
    Route::apiResource('etudiant', EtudiantController::class);
    Route::apiResource('inscription', InscriptionController::class);
});



Route::prefix('auth')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
});