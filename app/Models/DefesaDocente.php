<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DefesaDocente extends Model
{
    use HasFactory;

    protected $table = 'defesa_docente';

    protected $fillable = [
        'id_defesa', 
        'id_oponente',
        'id_presidente',
    ];
}
