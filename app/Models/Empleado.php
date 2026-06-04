<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Empleado extends Model
{
    public function cargo(): BelongsTo
    {
        return $this->belongsTo(Cargo::class);
    }
}
