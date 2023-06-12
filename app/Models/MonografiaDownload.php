<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonografiaDownload extends Model
{
    use HasFactory;

    protected $table = 'monografia_downloads';

    protected $fillable = [
        'id_monografia',
        'id_user'

    ];
}
