<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\EleitoresService;

class EleitoresController extends Controller
{
    
    protected $eleitoresService;

    public function __construct(EleitoresService $eleitoresService)
    {
        $this->eleitoresService = $eleitoresService;
    }

}
