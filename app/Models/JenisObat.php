<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JenisObat extends Model
{
    use HasFactory;
    protected $fillable = [
        'jenis',
    ];

    public function obatJenis(){
        return $this->belongsToMany(Obat::class, 'id_jenis');
    }
}
