<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FuncionCargo extends Model
{
    protected $table = 'funciones_cargo';

    protected $fillable = [
        'descripcion_funcion',
        'estado',
        'cargo_id'
    ];

    public function cargo(): BelongsTo
    {
        return $this->belongsTo(Cargo::class);
    }
}                                 