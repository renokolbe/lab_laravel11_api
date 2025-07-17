<?php

namespace App\Models\Cliente;

use Illuminate\Database\Eloquent\Model;

class ClientePJ extends Model
{
    protected $table = 'tb_crm_clientes_dados_juridica';
    protected $primaryKey = 'id_dados_juridica';
    public $incrementing = true; // BINARY(16), não autoincrementa
    protected $keyType = 'int';
    
    protected $fillable = [
        'fk_id_cliente',
        'id_inscricao_estadual',
        'id_inscricao_municipal',
        'nu_cnpj_cpf',
        'ds_nome_razao_social',
        'ds_nome_fantasia',
        'ds_site_url',
        'id_tipo_moeda',
        'ds_record_type_name',
        'ativo',
        // outros campos específicos de Pessoa Jurídica
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'fk_id_cliente', 'id_cliente');
    }
}
