<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComentarioEstudante extends Model
{
    use HasFactory;

    protected $table = 'comentario_estudante';

    protected $fillable = ['id_comentario', 'id_estudante'];
}
