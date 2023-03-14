<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudante extends Model
{
    use HasFactory;

    protected $fillable = [

        'num_estudante',
        'regime',
        'ano_ingresso',
        'supervisor',
        'curso',
        'is_estudante',

    ];

    public function user(){

        return $this->hasMany('App\Models\User');
    }

    public function curso(){
      return $this->belongsTo('App\Models\Curso');  
    }

    public function docente(){
        return $this->belongsTo('App\Models\Docente');
    }

}