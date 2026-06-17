<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cargo extends Model
{
    use HasFactory;

    public function empleados(): HasMany
    {
        return $this->hasMany(Empleado::class);
    }

    public function funcionesCargo(): HasMany
    {
        return $this->hasMany(FuncionCargo::class);
    }
    protected $fillable = [
        'nombre_cargo',
        'descripcion'
    ];
}
