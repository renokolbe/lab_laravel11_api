<?php

namespace App\Http\Controllers\Api\Cliente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cliente\Cliente;
use App\Models\Cliente\ClientePJ;
use App\Http\Resources\Cliente\ClienteResource;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
    /**
     * Exemplo de método para listar clientes
     */
    public function index()
    {
        $clientes = Cliente::with('pessoaJuridica')->get();
        if ($clientes->isEmpty()) {
            return response()->json(['message' => 'Nenhum cliente encontrado'], 200);
        }
        return ClienteResource::collection($clientes);
    }
    /**
     * Exemplo de método para mostrar um cliente específico
     */
    public function show($uuid)
    {
        $cliente = Cliente::findByUuid($uuid);
        if (!$cliente) {
            return response()->json(['message' => 'Cliente não encontrado'], 404);
        }
        $cliente->load('pessoaJuridica');
        return response()->json($cliente);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_tipo_pessoa' => 'required|integer|in:1,2', // 1 para Pessoa Jurídica, 2 para Pessoa Física
            'pessoa_juridica.id_inscricao_estadual' => 'nullable|string|max:20',
            'pessoa_juridica.id_inscricao_municipal' => 'nullable|string|max:20',
            'pessoa_juridica.nu_cnpj_cpf' => 'required|string|max:14',
            'pessoa_juridica.ds_nome_razao_social' => 'required|string|max:255',
            'pessoa_juridica.ds_nome_fantasia' => 'nullable|string|max:255',
            'pessoa_juridica.ds_site_url' => 'nullable|url|max:255',
            'pessoa_juridica.id_tipo_moeda' => 'nullable|integer',
            'pessoa_juridica.ds_record_type_name' => 'nullable|string|max:50',
        ]);

        $cliente = Cliente::create([
            'id_tipo_pessoa' => $request->id_tipo_pessoa,
        ]);

        if ($request->id_tipo_pessoa == 1 && isset($request->pessoa_juridica)) {

            $clienteReal = Cliente::where('id_tipo_pessoa', $request->id_tipo_pessoa)->latest('created_at')->first();
            $uuidBinario = $clienteReal->id_cliente; // Aqui já está no formato binário

            if ($uuidBinario != null) {
                $clientePJ = new ClientePJ([
                    'id_inscricao_estadual' => $request->pessoa_juridica['id_inscricao_estadual'] ?? null,
                    'id_inscricao_municipal' => $request->pessoa_juridica['id_inscricao_municipal'] ?? null,
                    'nu_cnpj_cpf' => $request->pessoa_juridica['nu_cnpj_cpf'],
                    'ds_nome_razao_social' => $request->pessoa_juridica['ds_nome_razao_social'],
                    'ds_nome_fantasia' => $request->pessoa_juridica['ds_nome_fantasia'] ?? null,
                    'ds_site_url' => $request->pessoa_juridica['ds_site_url'] ?? null,
                    'id_tipo_moeda' => $request->pessoa_juridica['id_tipo_moeda'] ?? null,
                    'ds_record_type_name' => $request->pessoa_juridica['ds_record_type_name'] ?? null,
                    'ativo' => true,
                ]);

                $clientePJ->fk_id_cliente = $uuidBinario;

                $clientePJ->save();
            }else{
                return response()->json(['message' => 'Erro ao gerar UUID para Cliente'], 500);
            }

        }
        
        return response()->json($cliente, 201);
        //return ClienteResource::collection($cliente);
    }

}
