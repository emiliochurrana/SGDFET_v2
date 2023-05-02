<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Docente extends Model
{
    use HasFactory;

    protected $table = 'docentes';

    protected $fillable = [ 

        'foto',
        'curso',
        'curriculum', 
        'id_drcurso',
        'id_user'
       
    ];
    protected $grarded = [];

    public function drcursoDocente(): BelongsTo{
        return $this->belongsTo(User::class, 'id_drcurso', 'id');
    }
    
    public function userDocente(): BelongsTo{

        return $this->belongsTo(User::class, 'id_user', 'id');
    }

  
  
}
