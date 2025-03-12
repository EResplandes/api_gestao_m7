<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatusUsuario extends Model
{
    
    protected $table = 'status_usuarios';

    protected $fillable = [
        'status'
    ];

}
