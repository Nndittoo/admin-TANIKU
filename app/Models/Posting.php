<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Posting extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'deskripsi',
        'dibuat',
        'gambar_postingan',
        'like',
    ];
    public function postingUser(){
        return $this->belongsTo(User::class, 'id_user');
    }

}
