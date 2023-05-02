<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Drcurso extends Model
{
    use HasFactory;

    protected $table = 'drcursos';

    protected $fillable = [

        'id_user',
        'foto',
        'curso',
        'curriculum'

    ];

    public function userDrcurso(): BelongsTo{

        return $this->belongsTo(User::class, 'id_user', 'id');
    }

}
