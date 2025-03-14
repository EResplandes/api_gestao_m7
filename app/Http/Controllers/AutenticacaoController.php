<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AutenticacaoService;
use App\Http\Requests\FormularioLoginRequest;

class AutenticacaoController extends Controller
{
    
    protected $autenticacaoService;

    public function __construct(AutenticacaoService $autenticacaoService)
    {
        $this->autenticacaoService = $autenticacaoService;
    }

    public function login(FormularioLoginRequest $request)
    {
        return $this->autenticacaoService->login($request);
    }

}
