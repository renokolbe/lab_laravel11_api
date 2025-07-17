<?php

namespace App\Http\Resources\Cliente;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Cliente\ClientePJResource;

class ClienteResource extends JsonResource
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
            'id' => $this->uuid,
            'tipo_pessoa' => $this->id_tipo_pessoa,
            'pessoa_juridica' => new ClientePJResource($this->whenLoaded('pessoaJuridica')),
        ];
    }
}
