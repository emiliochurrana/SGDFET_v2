<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Noticia extends Model
{
    use HasFactory;

    protected $table = 'noticias';

    protected $fillable = [
        'foto',
        'titulo',
        'descricao',
        'data',
        'link'

    ];
    protected $guarded = [];


    public function drcursoNoticia(): BelongsToMany{

        return $this->belongsToMany(User::class);

    }
}
