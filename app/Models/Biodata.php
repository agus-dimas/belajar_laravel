<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    use HasFactory;
    protected $fillable = [
    'id_hobi', 'nik','nama','temp_lahir','tgl_lahir',
    'kabupaten', 'kecamatan','desa', 'provinsi','gambar'
    ];

    public function hobis()
    {
        return $this->belongsTo(Hobi::class, 'id_hobi');
    }

}

