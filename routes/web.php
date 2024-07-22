<?php


use App\Http\Controllers\biodataController;

Route::get('/biodata', [biodataController::class, 'index']);
Route::get('/biodata/create', [biodataController::class, 'index']);
Route::get('/biodata/{id}', [biodataController::class, 'show']);
Route::get('/biodata/{id}/edit', [biodataController::class, 'edit']);
Route::post('/biodata/result', [biodataController::class, 'inputdata']);
