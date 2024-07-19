<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('biodatas',function (Blueprint $table) {
            $table->id();
            $table->integer('nik');
            $table->string('nama');
            $table->string('temp_lahir');
            $table->string('tgl_lahir');
            $table->string('kabupaten');
            $table->string('kecamatan');
            $table->string('desa');
            $table->string('provinsi');
            $table->string('gambar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biodatas');
    }
};
