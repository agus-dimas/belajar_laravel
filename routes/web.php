<?php


use App\Http\Controllers\biodataController;
use App\Http\Controllers\ContohController;

Route::get('/biodata', [biodataController::class, 'index']);
Route::get('/biodata/create', [biodataController::class, 'index']);
Route::get('/biodata/{id}', [biodataController::class, 'show']);
Route::get('/biodata/{id}/edit', [biodataController::class, 'edit']);
Route::post('/biodata/result', [biodataController::class, 'inputdata']);

// Route::get('/anggota', [biodataController::class, 'index']);
// membuat landing page atau menu utama pada /anggota yang menjadi index



Route::resource('contohs', ContohController::class);
