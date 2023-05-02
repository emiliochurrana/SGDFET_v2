<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Galeria extends Model
{
    use HasFactory;
    protected $table = 'galerias';

    protected $fillable = [
        'foto',
        'titulo',
        'data',
        'descricao'
    ];

    protected $guarded = [];


    public function drcursoGaleria(): BelongsToMany{

        return $this->belongsToMany(User::class);

    }
}
