<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Biodata;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Carbon\Carbon;

class BiodataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 20; $i++) {
            Biodata::create([
            'nik' => rand(10000000, 99999999),
            'id_hobi' => rand(1,2),
            'nama' => Str::random(10),
            'temp_lahir' => 'Jakarta',
            'tgl_lahir' => '1990-01-01',
            'provinsi_name' => 'BALI',
            'kabupaten_name' => 'TABANAN',
            'kecamatan_name' => 'KERAMBITAN',
            'desa_name' => 'PENARUKAN',
            'gambar' => 'path/to/default/image.jpg',
       ]);
     }
    }
}
