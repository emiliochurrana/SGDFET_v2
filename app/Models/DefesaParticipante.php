<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DefesaParticipante extends Model
{
    use HasFactory;

    protected $table = 'defesa_participante';

    protected $fillable = ['id_defesa', 'id_participante'];
}
