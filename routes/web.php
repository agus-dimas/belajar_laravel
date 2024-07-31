<?php


use App\Http\Controllers\biodataController;
use App\Http\Controllers\ContohController;

Route::get('/biodata', [biodataController::class, 'index']);
Route::get('/biodata/create', [biodataController::class, 'create']);
Route::get('/biodata/{id}', [biodataController::class, 'show']);
Route::get('/biodata/{id}/edit', [biodataController::class, 'edit']);
Route::post('/biodata/result', [biodataController::class, 'inputdata']);

Route::resource('contohs', ContohController::class);
