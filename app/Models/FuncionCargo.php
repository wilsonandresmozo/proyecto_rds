<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FuncionCargo extends Model
{
    use HasFactory;

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