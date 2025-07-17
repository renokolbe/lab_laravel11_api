<?php

namespace App\Traits;

use Illuminate\Support\Facades\DB;

trait HasBinaryUuid
{
    /**
     * Atribui UUID otimizado automaticamente na criação
     */
    public static function bootHasBinaryUuid()
    {
        static::creating(function ($model) {
            $key = $model->getKeyName();

            if (empty($model->$key)) {
                $model->$key = DB::raw("UUID_TO_BIN(UUID(), 1)");
            }
        });
    }

    /**
     * Accessor para obter UUID legível
     */
    public function getUuidAttribute()
    {
        $keyName = $this->getKeyName();
        $value = $this->getRawOriginal($keyName);

        // Se ainda for uma expressão (ex: DB::raw), não tenta converter
        if ($value instanceof \Illuminate\Database\Query\Expression) {
            return null;
        }

        if (empty($value)) {
            return null;
        }

        return DB::selectOne("SELECT BIN_TO_UUID(?, 1) AS uuid", [$value])->uuid ?? null;
    }
    /**
     * Mutator para definir UUID legível (converte para binário)
     */
    public function setUuidAttribute($value)
    {
        $this->{$this->getKeyName()} = DB::raw("UUID_TO_BIN('$value', 1)");
    }

    /**
     * Busca um modelo pelo UUID legível
     */
    public static function findByUuid($uuid)
    {
        $keyName = static::make()->getKeyName();

        return static::whereRaw("$keyName = UUID_TO_BIN(?, 1)", [$uuid])->first();
    }
}