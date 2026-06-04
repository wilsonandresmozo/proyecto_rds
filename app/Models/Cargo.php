<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cargo extends Model
{
    public function empleados(): HasMany
    {
        return $this->hasMany(Empleado::class);
    }

    public function funcionesCargo(): HasMany
    {
        return $this->hasMany(FuncionCargo::class);
    }
}
