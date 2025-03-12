<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gabinetes extends Model
{
    
    protected $table = 'gabinetes';

    protected $fillable = [
        'partido',
        'gabinete',
        'responsavel',
        'telefone',
        'email',
    ];

}
