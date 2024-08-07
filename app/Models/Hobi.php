<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hobi extends Model
{
    use HasFactory;
    protected $fillable = ['nama_hobi','deskripsi'];  

    public function biodatas(): HasMany
    {
        return $this->hasMany(Biodata::class, 'id_hobi');
    }
}
