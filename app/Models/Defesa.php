<?php

namespace App\Models;

use Faker\Provider\UserAgent;
use Illuminate\Database\Eloquent\Factories\BelongsToManyRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Defesa extends Model
{
    use HasFactory;

    protected $table = 'defesas';

    protected $fillable = [

        'id_estudante',
        'autor',
        'tema',
        'curso',
        'resumo',
        'foto',
        'nivel',
        'regime',
        'supervisor',
        'oponente',
        'presidente',
        'sala',
        'data',
        'hora',
        'monografia'

    ];

    public function estudanteDefesa(): BelongsTo{

        return $this->belongsTo(User::class, 'id_estudante', 'id');

    }

    public function docenteDefesa(): BelongsToMany{

        return $this->belongsToMany(User::class, 'defesa_docente', 'id_defesa', 'id_docente');

    }

    public function participanteDefesa(){
        return $this->belongsToMany(User::class, 'defesa_participantes', 'id_defesa', 'id_participante');
    }
    public function participant(){
        return $this->belongsToMany(DefesaParticipante::class, 'defesa_participantes', 'id_defesa', 'id_participante');
    }
}
