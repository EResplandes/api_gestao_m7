<?php

namespace App\Repositories;

use Illuminate\Http\Response;
use App\Models\User;

class AutenticacaoRepositories
{

    public function verificaUsuarioAtivo($email)
    {
        $user = User::where('email', $email)->first();
        if ($user->status == 3) {
            return false;
        } else {
            return true;
        }
    }

}
