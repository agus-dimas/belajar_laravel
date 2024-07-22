<?php


use App\Http\Controllers\biodataController;

Route::get('/biodata', [biodataController::class, 'index']);
Route::post('/biodata/result', [biodataController::class, 'inputdata']);