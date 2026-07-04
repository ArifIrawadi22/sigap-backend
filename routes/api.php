<?php

use App\Http\Controllers\LaporanController;
use Illuminate\Support\Facades\Route;

Route::get('/laporan', [LaporanController::class, 'index']);
Route::post('/laporan', [LaporanController::class, 'store']);
Route::get('/laporan/{id}', [LaporanController::class, 'show']);
Route::put('/laporan/{id}/status', [LaporanController::class, 'updateStatus']);
Route::post('/laporan/{id}/upvote', [LaporanController::class, 'upvote']);
