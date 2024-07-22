<?php


use App\Http\Controllers\biodataController;

Route::get('/biodata', [biodataController::class, 'index']);
Route::get('/biodata/{id}', [biodataController::class, 'show']);
Route::post('/biodata/result', [biodataController::class, 'inputdata']);
