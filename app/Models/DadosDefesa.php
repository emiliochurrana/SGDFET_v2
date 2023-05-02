<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class DadosDefesa extends Model
{
    use HasFactory;

    protected $table = 'dadosdefesas';

    protected $fillable = [
        'name',
        'bi',
        'declaracao_nota',
        'monografia',
        'curriculum',
        'i_estudante'

    ];

    public function userDado(): BelongsTo{

        return $this->belongsTo(User::class, 'id_estudante', 'id');

    }
}
