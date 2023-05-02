<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Comentario extends Model
{
    use HasFactory;

    protected $table = 'comentarios';

    protected $fillable = [
        'id_estudante',
        'name',
        'email',
        'mensagem'
    ];

    public function estudanteComentario(): BelongsTo{

        return $this->belongsTo(Estudante::class, 'id_estudante', 'id');
    }
}
