<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\SiswaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/beranda', [AuthController::class, 'homeGuest']);

Route::middleware('check.token')->group(function(){
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('/beranda', [AuthController::class, 'homeLogin']);

    Route::resource('siswa', SiswaController::class);

    // Route::get('/siswa', [SiswaController::class, 'index']);
    // Route::get('/siswa/{id}', [SiswaController::class, 'show']);
    // Route::post('/siswa', [SiswaController::class, 'store']);
    // Route::put('/siswa/{id}', [SiswaController::class, 'update']);
    // Route::delete('/siswa/{id}', [SiswaController::class, 'destroy']);
});
