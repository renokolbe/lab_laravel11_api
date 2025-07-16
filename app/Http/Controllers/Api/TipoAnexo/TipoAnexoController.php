<?php

namespace App\Http\Controllers\Api\TipoAnexo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TipoAnexo\TipoAnexo;
use App\Http\Resources\TipoAnexo\TipoAnexoResource;

class TipoAnexoController extends Controller
{
    public function index()
    {
        $lista = TipoAnexo::all();
        if ($lista->isEmpty()) {
            return response()->json(['message' => 'No attachment types found'], 200);
        }
        return TipoAnexoResource::collection($lista);
    }

}
