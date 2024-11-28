<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Komentar extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'dibuat',
        'komen',
    ];
    public function commentUser(){
        return $this->belongsTo(User::class, 'user_id');
    }

}
