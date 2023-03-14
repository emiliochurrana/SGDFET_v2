<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Defesa extends Model
{
    use HasFactory;

    public function estudante(){

        return $this->belongsTo('App\Models\Estudante');

    }

    public function docente(){

        return $this->belongsTo('App\Models\Docente');

    }
}
