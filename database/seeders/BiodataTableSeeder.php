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
            'nama' => Str::random(10),
            'temp_lahir' => 'Jakarta',
            'tgl_lahir' => '1990-01-01',
            'kabupaten' => 'Kabupaten',
            'kecamatan' => 'Kecamatan',
            'desa' => 'Desa',
            'provinsi' => 'Provinsi',
            'gambar' => 'path/to/default/image.jpg',
       ]);
     }
    }
}
