<?php

namespace App\Services;

use Illuminate\Http\Response;
use App\Repositories\AutenticacaoRepositories;
use Illuminate\Support\Facades\Auth;

class AutenticacaoService
{

    protected $autenticacaoRepositories;

    public function __construct(AutenticacaoRepositories $autenticacaoRepositories)
    {
        $this->autenticacaoRepositories = $autenticacaoRepositories;
    }

    public function login($request)
    {
        try {

            $validate = $this->autenticacaoRepositories->verificaUsuarioAtivo($request->email);

            $credenciais = $request->only(['email', 'senha']);
            if (Auth::attempt(['email' => $credenciais['email'], 'password' => $credenciais['senha']]) && $validate) {
                $user = Auth::user();
                return response()->json([
                    'message' => 'Login efetuado com sucesso',
                    'token' => bcrypt($user->createToken('auth_token')->plainTextToken),
                ]);
            } else {

                if ($validate) {
                    return response()->json(['message' => 'Credenciais inválidas'], 401);
                } else {
                    return response()->json(['message' => 'Usuário inativo'], 401);
                }
            }
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }
}
