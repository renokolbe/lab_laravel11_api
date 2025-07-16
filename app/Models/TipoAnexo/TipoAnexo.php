<?php

namespace App\Models\TipoAnexo;

use Illuminate\Database\Eloquent\Model;

class TipoAnexo extends Model
{
    protected $table = 'tb_rf_tp_anexo';

    protected $primaryKey = 'id_tipo_anexo';

    protected $fillable = [
        'ds_tipo_anexo',
    ];


}
