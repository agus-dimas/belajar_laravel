<?php


use App\Http\Controllers\biodataController;
use App\Http\Controllers\ContohController;

// Route::get('/biodata', [biodataController::class, 'index']);
// Route::get('/biodata/create', [biodataController::class, 'create']);
// Route::get('/biodata/{id}', [biodataController::class, 'show']);
// Route::get('/biodata/{id}/edit', [biodataController::class, 'edit']);


Route::resource('biodatum', biodataController::class);

Route::post('/biodatum/result', [biodataController::class, 'inputdata']);
Route::get('/biodatum/{id}', [biodataController::class, 'show'])->name('biodata.show'); // untuk melihat data anggota
Route::put('/biodatum/{id}', [biodataController::class, 'update'])->name('biodata.update'); //  update data anggota

Route::resource('contohs', ContohController::class);
