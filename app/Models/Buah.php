<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Buah extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_buah',
        'poto_buah',
        'deskripsi',
        'updated_at',
        'created_at',
    ];

    public function tutorialBuah(){
        return $this->belongsToMany(Tutorial::class, 'id_buah');
    }
    public function kiloBuah(){
        return $this->belongsToMany(Kilo::class, 'id_buah');
    }
}
