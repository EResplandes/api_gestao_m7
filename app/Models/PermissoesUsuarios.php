<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PermissoesUsuarios extends Model
{

    protected $table = 'permissoes_usuarios';

    protected $fillable = [
        'permissaoID',
        'usuarioId'
    ];
}
