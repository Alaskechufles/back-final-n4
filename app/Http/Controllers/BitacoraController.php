<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use App\Models\Pagina;
use Illuminate\Http\Request;

class BitacoraController extends Controller
{
    public function index()
    {
        $bitacoras = Bitacora::all();
        return $bitacoras;
    }
}
