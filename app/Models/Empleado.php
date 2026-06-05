<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Empleado extends Model
{
    protected $fillable = [
        'nombres',
        'apellidos',
        'fecha_nacimiento',
        'fecha_ingreso',
        'salario',
        'estado',
        'cargo_id'
    ];
    
    public function cargo(): BelongsTo
    {
        return $this->belongsTo(Cargo::class);
    }

}
