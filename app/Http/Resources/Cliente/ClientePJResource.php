<?php

namespace App\Http\Resources\Cliente;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClientePJResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        //return parent::toArray($request);
        return [
            'id' => $this->id_dados_juridica,
            'inscricao_estadual' => $this->id_inscricao_estadual,
            'inscricao_municipal' => $this->id_inscricao_municipal,
            'cnpj_cpf' => $this->nu_cnpj_cpf,
            'razao_social' => $this->ds_nome_razao_social,
            'nome_fantasia' => $this->ds_nome_fantasia,
            'site_url' => $this->ds_site_url,
            'tipo_moeda' => $this->id_tipo_moeda,
            'record_type_name' => $this->ds_record_type_name,
        ];
    }
}
