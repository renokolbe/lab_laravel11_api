<?php

namespace App\Models\Cliente;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasBinaryUuid;

class Cliente extends Model
{
    use HasBinaryUuid;

    protected $table = 'tb_crm_clientes';
    protected $primaryKey = 'id_cliente';
    public $incrementing = false; // BINARY(16), não autoincrementa
    protected $keyType = 'string'; // ou 'binary' dependendo do uso

    protected $fillable = [
        'id_tipo_pessoa', // Ex: '1' para Pessoa Jurídica, '2' para Pessoa Física
    ];

    public function pessoaJuridica()
    {
        return $this->hasOne(ClientePJ::class, 'fk_id_cliente');
    }
    // public function pessoaFisica()
    // {
    //     return $this->hasOne(ClientePF::class, 'id_cliente');
    // }
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->id_cliente)) {
                $model->id_cliente = DB::raw("UUID_TO_BIN(UUID(), 1)");
            }
        });
    }

}
