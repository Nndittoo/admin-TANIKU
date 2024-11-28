<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FungsiObat extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_obat',
        'poto_fungsi',
        'fungsi'
    ];

    public function fungsiObat(){
        return $this->hasMany(Obat::class, 'id');
    }
}
