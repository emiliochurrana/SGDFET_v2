<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    use HasFactory;

    public function defesa(){

        return $this->hasMany('App\Models\Defesa');

    }

    public function estudante(){
        return $this->hasMany('App\Models\Estudante');
    }
}
