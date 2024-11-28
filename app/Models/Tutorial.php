<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tutorial extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_buah',
        'id_obat',
        'creator',
        'photo_creator',
        'judul',
        'deskripsi',
        'video',
    ];

    public function tutorialObat(){
        return $this->hasMany(Obat::class, 'id');
    }
    public function tutorialBuah(){
        return $this->hasMany(Buah::class, 'id');
    }
}
