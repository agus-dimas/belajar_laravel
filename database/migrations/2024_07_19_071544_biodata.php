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
            $table->foreignId('id_hobi')->constrained('hobis')->onUpdate('cascade');
            $table->bigInteger('nik');
            $table->string('nama');
            $table->string('temp_lahir');
            $table->string('tgl_lahir');
            $table->string('kabupaten_name');
            $table->string('kecamatan_name');
            $table->string('desa_name');
            $table->string('provinsi_name');
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
