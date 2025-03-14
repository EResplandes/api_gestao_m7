<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enderecos extends Model
{

    protected $table = 'enderecos';

    protected $fillable = [
        'usuarioId',
        'logradouro',
        'numero',
        'complemento',
        'bairro',
        'cidade',
        'estado',
        'cep',
    ];

}
