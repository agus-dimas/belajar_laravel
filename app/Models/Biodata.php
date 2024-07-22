<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    use HasFactory;
    protected $fillable = ['nik','nama','temp_lahir','tgl_lahir','kabupaten', 'kecamatan','desa', 'provinsi','gambar'];
}

