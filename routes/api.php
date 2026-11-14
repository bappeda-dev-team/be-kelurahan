<?php

// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\StandartPelayananController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// berita
Route::get('/berita', [BeritaController::class, 'index']);
Route::get('/berita/{id}', [BeritaController::class, 'show']);
Route::post('/berita', [BeritaController::class, 'create']);
Route::put('/berita/{id}', [BeritaController::class, 'update']);
Route::delete('/berita/{id}', [BeritaController::class, 'destroy']);

// standar pelayanan
Route::get('/standart-pelayanan', [StandartPelayananController::class, 'index']);
Route::get('/standart-pelayanan/{id}', [StandartPelayananController::class, 'show']);
Route::post('/standart-pelayanan', [StandartPelayananController::class, 'create']);
Route::put('/standart-pelayanan/{id}', [StandartPelayananController::class, 'update']);
Route::delete('/standart-pelayanan/{id}', [StandartPelayananController::class, 'destroy']);
