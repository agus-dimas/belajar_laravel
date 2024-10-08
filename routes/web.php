<?php


use App\Http\Controllers\biodataController;
use App\Http\Controllers\HobiController;
use App\Http\Controllers\ContohController;
use App\Http\Controllers\WilayahController;

// Route::get('/biodata', [biodataController::class, 'index']);
// Route::get('/biodata/create', [biodataController::class, 'create']);
// Route::get('/biodata/{id}', [biodataController::class, 'show']);
// Route::get('/biodata/{id}/edit', [biodataController::class, 'edit']);


Route::resource('biodatas', biodataController::class);
Route::resource('hobi', HobiController::class);
Route::get('wilayah', [WilayahController::class, 'getWilayah']);
Route::get('list-provinsi', [WilayahController::class, 'getProvinsis']);
Route::get('list-kabupaten/{provinsiId}', [WilayahController::class, 'getKabupatens']);
Route::get('/list-kecamatan/{kabupatenId}', [WilayahController::class, 'getKecamatans']);
Route::get('/list-desa/{kecamatanId}', [WilayahController::class, 'getDesas']);