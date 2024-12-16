<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kilo extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_buah',
        'id_pajak',
        'nama_pemilik',
        'hp',
        'jam_buka',
        'nama_kilo',
        'poto_kilo',
    ];

    public function kiloBuah(){
        return $this->hasMany(Buah::class, 'id');
    }

    public function kiloPajak(){
        return $this->hasMany(Pajak::class, 'id');
    }
    
    public function kiloPajak1(){
    return $this->belongsTo(Pajak::class, 'id_pajak');
}
}
