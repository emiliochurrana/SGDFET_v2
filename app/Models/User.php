<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\hasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     * 
     */
    protected $table = 'users';
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
        'is_active',
        'is_estudante',
        'is_docente',
        'is_admin',
        'is_drcurso'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $grarded = [];
   
    public function estudanteUser(): HasOne{
        return $this->hasOne(Estudante::class, 'id_user','id');
    }


    public function docenteUser(): HasOne{
           
        return $this->hasOne(Docente::class, 'id_user', 'id');
    }

    public function drcursoUser(): HasOne{
           
        return $this->hasOne(Drcurso::class,  'id_user', 'id');
    }


    public function dadoUser(): HasOne{

        return $this->hasOne(DadosDefesa::class, 'id_estudante', 'id');
    }

    public function estudanteDocente(): HasMany{

        return $this->hasMany(Estudante::class, 'id_docente', 'id');

    }

    public function defesaEstdante(): HasOne{

        return $this->hasOne(Defesa::class, 'id_estudante', 'id');

    }

    public function monografiaEstudante(): HasOne{

        return $this->hasOne(Monografia::class, 'id_estudante', 'id');

    }
    public function comentarioEstudante(): HasMany{
        return $this->hasMany(Comentario::class, 'id_estudante', 'id');
    }
    public function docenteDrcurso(): HasMany{
        return $this->hasMany(Docente::class, 'id_drcurso', 'id');
    }

    public function defesaDocente(): BelongsToMany{

        return $this->belongsToMany(Defesa::class);

    }

    public function galeriaDrcurso(): BelongsToMany{

        return $this->belongsToMany(Galeria::class);

    }

    public function noticiaDrcurso(): BelongsToMany{

        return $this->belongsToMany(Noticia::class, 'drcurso_noticia', 'id_drcurso', 'id_noticia');

    }
    public function defesaParticipante(){
        return $this->belongsToMany(Defesa::class);
    }

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
