<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FuncionCargo;

class FuncionCargoController extends Controller
{
    public function index()
    {
        return FuncionCargo::all();
    }
}
