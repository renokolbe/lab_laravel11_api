<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoPessoa extends Model
{
    use HasFactory;

    protected $table = 'tb_rf_tipo_pessoa';

    protected $fillable = [
        'ds_tipo_pessoa',
        'ativo',
    ];
}
