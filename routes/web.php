<?php


use App\Http\Controllers\biodataController;
use App\Http\Controllers\ContohController;

// Route::get('/biodata', [biodataController::class, 'index']);
// Route::get('/biodata/create', [biodataController::class, 'create']);
// Route::get('/biodata/{id}', [biodataController::class, 'show']);
// Route::get('/biodata/{id}/edit', [biodataController::class, 'edit']);


Route::resource('biodatas', biodataController::class);

Route::resource('contohs', ContohController::class);
