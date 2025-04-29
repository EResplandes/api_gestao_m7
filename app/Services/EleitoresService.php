<?php

namespace App\Services;

use Illuminate\Http\Response;
use App\Repositories\EleitoresRepositories;

class EleitoresService
{

    protected $eleitoresRepositories;

    public function __construct(EleitoresRepositories $eleitoresRepositories)
    {
        $this->eleitoresRepositories = $eleitoresRepositories;
    }

    public function cadastrarEleitor($request)
    {
        try {

            $validaPadrinho = $this->eleitoresRepositories->validaPadrinho($request->padrinho_id);

            if (!$validaPadrinho) {
                return response()->json([
                    'message' => 'Padrinho não encontrado',
                    'status' => Response::HTTP_BAD_REQUEST,
                ], Response::HTTP_BAD_REQUEST);
            }

            $cadastrarEleitor = $this->eleitoresRepositories->cadastrarEleitor($request, $request->padrinho_id);

            dd($cadastrarEleitor);

            if ($cadastrarEleitor) {
                return response()->json([
                    'message' => 'Eleitor cadastrado com sucesso',
                    'status' => Response::HTTP_CREATED,
                ], Response::HTTP_CREATED);
            } else {
                return response()->json([
                    'message' => 'Ocorreu algum problema, entre em contato com o Administrador!',
                    'status' => Response::HTTP_BAD_REQUEST,
                ], Response::HTTP_CREATED);
            }
        } catch (\Throwable $th) {
            throw $th;

            return response()->json([
                'message' => 'Ocorreu algum problema, entre em contato com o Administrador!',
                'status' => Response::HTTP_BAD_REQUEST,
            ], Response::HTTP_CREATED);
        }
    }

    public function buscarEleitores($idPadrinho)
    {

        try {

            $validaPadrinho = $this->eleitoresRepositories->validaPadrinho($idPadrinho);

            if (!$validaPadrinho) {
                return response()->json([
                    'message' => 'Padrinho não encontrado',
                    'status' => Response::HTTP_BAD_REQUEST,
                ], Response::HTTP_BAD_REQUEST);
            }

            $buscarEleitores = $this->eleitoresRepositories->buscarEleitores($idPadrinho);

            if ($buscarEleitores) {
                return response()->json([
                    'message' => 'Eleitores encontrados com sucesso',
                    'status' => Response::HTTP_CREATED,
                    'eleitores' => $buscarEleitores
                ], Response::HTTP_CREATED);
            } else {
                return response()->json([
                    'message' => 'Ocorreu algum problema, entre em contato com o Administrador!',
                    'status' => Response::HTTP_BAD_REQUEST,
                ], Response::HTTP_CREATED);
            }
        } catch (\Throwable $th) {
            throw $th;

            return response()->json([
                'message' => 'Ocorreu algum problema, entre em contato com o Administrador!',
                'status' => Response::HTTP_BAD_REQUEST,
            ], Response::HTTP_CREATED);
        }
    }
}
