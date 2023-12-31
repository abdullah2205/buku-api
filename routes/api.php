<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
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

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get('/buku', [BukuController::class, 'index']);

    Route::post('/buku/store', [BukuController::class, 'store']);

    Route::get('/buku/{id}', [BukuController::class, 'show']);

    Route::put('/buku/{id}', [BukuController::class, 'update']);

    Route::delete('/buku/{id}', [BukuController::class, 'destroy']);

    Route::post('/logout', [AuthController::class, 'logout']);
});
