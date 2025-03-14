<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\EleitoresService;
use App\Http\Requests\CadastroEleitoresRequest;

class EleitoresController extends Controller
{

    protected $eleitoresService;

    public function __construct(EleitoresService $eleitoresService)
    {
        $this->eleitoresService = $eleitoresService;
    }

    public function cadastrarEleitor(CadastroEleitoresRequest $request, $idPadrinho)
    {
        return $this->eleitoresService->cadastrarEleitor($request, $idPadrinho);
    }

    public function buscarEleitores($idPadrinho)
    {
        return $this->eleitoresService->buscarEleitores($idPadrinho);
    }

}
