<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;


class Estudante extends Model
{
    use HasFactory;

    protected $table = 'estudantes';
    protected $fillable = [

        'id_user',
        'id_docente',    
        'num_estudante',
        'foto',
        'curso',
        'supervisor',
        'regime',
        'ano_ingresso'
    ];

    protected $grarded = [];

    public function userEstudante(): BelongsTo{
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function docenteEstudante(): BelongsTo{
        return $this->belongsTo(User::class, 'id_docente', 'id');
    }
}
