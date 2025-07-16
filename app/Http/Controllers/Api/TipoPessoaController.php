<?php

namespace App\Http\Controllers\Api;

use App\Models\TipoPessoa;
use App\Http\Controllers\Controller;
use App\Http\Resources\TipoPessoaResource;
use Illuminate\Http\Request;

class TipoPessoaController extends Controller
{
    public function index()
    {
        $tiposPessoa = TipoPessoa::all();
        if ($tiposPessoa->isEmpty()) {
            return response()->json(['message' => 'No types of person found'], 200);
        }
        return TipoPessoaResource::collection($tiposPessoa);
    }
}
