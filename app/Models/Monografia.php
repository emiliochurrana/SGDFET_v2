<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Monografia extends Model
{
    use HasFactory;

    protected $table = 'monografias';

    protected $fillable = [
        'id_estudante',
        'autor',
        'tema',
        'foto',
        'curso',
        'resumo',
        'nivel',
        'supervisor',
        'ficheiro'
    ];

    public function estudanteMonografia(): BelongsTo{

        return $this->belongsTo(User::class, 'id_estudante', 'id');

    }

    public function downloadMonografia(){
        return $this->belongsToMany(User::class, 'monografia_downloads','id_monografia', 'id_user');
    }

}
