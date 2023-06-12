<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitante extends Model
{
    use HasFactory;

    protected $table = 'visitantes';

    protected $fillable = [
        'id_user',
        'foto'
    ];

    public function userVisitante(){
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
