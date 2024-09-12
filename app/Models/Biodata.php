<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_hobi',
        'nik',
        'nama',
        'temp_lahir',
        'tgl_lahir',
        'gambar',
        'provinsi_name',
        'kabupaten_name',
        'kecamatan_name',
        'desa_name',
        'provinsi_id',
        'kabupaten_id',
        'kecamatan_id',
        'desa_id',
    ];

    public function hobis()
    {
        return $this->belongsTo(Hobi::class, 'id_hobi');
    }
}
