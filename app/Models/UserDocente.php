<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDocente extends Model
{
    use HasFactory;

    protected $table = 'user_docente';

    protected $fillable = ['id_user', 'id_docente'];
}
