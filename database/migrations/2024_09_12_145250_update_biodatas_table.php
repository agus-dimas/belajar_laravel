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
        Schema::table('biodatas', function (Blueprint $table) {
            $table->bigInteger('provinsi_id');
            $table->bigInteger('kabupaten_id');
            $table->bigInteger('kecamatan_id');
            $table->bigInteger('desa_id');
            $table->string('provinsi_name');
            $table->string('kabupaten_name');
            $table->string('kecamatan_name');
            $table->string('desa_name');

            $table->dropColumn('provinsi');
            $table->dropColumn('kabupaten');
            $table->dropColumn('kecamatan');
            $table->dropColumn('desa');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('biodatas', function (Blueprint $table) {
            $table->dropColumn('provinsi_id');
            $table->dropColumn('kabupaten_id');
            $table->dropColumn('kecamatan_id');
            $table->dropColumn('desa_id');
            $table->dropColumn('provinsi_name');
            $table->dropColumn('kabupaten_name');
            $table->dropColumn('kecamatan_name');
            $table->dropColumn('desa_name');


            $table->string('provinsi');
            $table->string('kabupaten');
            $table->string('kecamatan');
            $table->string('desa');

        });
    }
};
