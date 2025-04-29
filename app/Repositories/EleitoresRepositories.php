<?php

namespace App\Repositories;

use Illuminate\Http\Response;
use App\Models\User;
use App\Models\Enderecos;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class EleitoresRepositories
{

    public function cadastrarEleitor($request, $idPadrinho)
    {

        DB::beginTransaction();

        try {

            $gabinetePadrinho = User::where('id', $idPadrinho)->pluck('gabinete_id')->first();

            $dadosEleitor = [
                'nome' => $request->nome,
                'sobrenome' => Crypt::encrypt($request->sobrenome),
                'telefone' => Crypt::encrypt(preg_replace('/\D/', '', $request->telefone)),
                // 'telefone_secundario' => Crypt::encrypt($request->telefone_secundario),
                'celular' => Crypt::encrypt($request->celular),
                'idade' => $request->idade,
                'email' => Crypt::encrypt($request->email),
                // 'is_whatsapp' => $request->is_whatsapp,
                'sexo' => $request->sexo,
                // 'data_nascimento' => Crypt::encrypt($request->data_nascimento),
                'cpf' => Crypt::encrypt(preg_replace('/\D/', '', $request->cpf)),
                'titulo_eleitor' => Crypt::encrypt($request->titulo_eleitor),
                'padrinho_id' => $idPadrinho,
                'gabinete_id' => $gabinetePadrinho,
                'status_id' => 1, // Aguardando aceitação de termos de compromisso
                'password' => bcrypt($request->cpf),
                'tipo_usuario_id' => 5
            ];

            $eleitor = User::create($dadosEleitor);

            $dadosEndereco = [
                'logradouro' => Crypt::encrypt($request->logradouro),
                'bairro' => Crypt::encrypt($request->bairro),
                'cidade' => Crypt::encrypt($request->cidade),
                'estado' => Crypt::encrypt($request->estado),
                'numero' => Crypt::encrypt($request->numero),
                'complemento' => Crypt::encrypt($request->complemento),
                'cep' => Crypt::encrypt($request->cep),
                'usuario_id' => $eleitor->id
            ];

            $endereco = Enderecos::create($dadosEndereco);

            DB::commit();
            return true;
        } catch (\Throwable $th) {
            DB::rollBack();
            return false;
        }
    }

    public function validaPadrinho($idPadrinho)
    {

        $validaPadrinho = User::where('id', $idPadrinho)->first();

        if (!$validaPadrinho) {
            return false;
        } else {
            return true;
        }
    }

    public function buscarEleitores($idPadrinho)
    {
        $gabinetePadrinho = User::where('id', $idPadrinho)->pluck('gabinete_id')->first();

        $buscarEleitores = User::where('padrinho_id', $idPadrinho)
            ->where('gabinete_id', $gabinetePadrinho)
            ->get();

        return $buscarEleitores;
    }
}
