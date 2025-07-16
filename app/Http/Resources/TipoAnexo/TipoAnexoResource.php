<?php

namespace App\Http\Resources\TipoAnexo;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TipoAnexoResource extends JsonResource
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
            'id' => $this->id_tipo_anexo,
            'morango' => $this->ds_tipo_anexo,
        ];
    }
}
