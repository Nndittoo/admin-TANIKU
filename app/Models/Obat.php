<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Obat extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_jenis',
        'nama_obat',
        'photo_obat',
        'deskripsi',
    ];

    public function obatJenis(){
        return $this->belongsTo(JenisObat::class, 'id_jenis');
    }

    public function fungsiObat(){
        return $this->belongsToMany(FungsiObat::class, 'id_obat');
    }

    public function fungsiObat1(){
    return $this->hasMany(FungsiObat::class, 'id_obat');
}
    public function tutorialObat(){
        return $this->belongsToMany(Tutorial::class, 'id_obat');
    }
}
