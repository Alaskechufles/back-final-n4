<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use App\Models\Pagina;
use Illuminate\Http\Request;

class PaginaController extends Controller
{
    public function index()
    {
        $bitacoras = Pagina::all();
        return $bitacoras;
    }
    public function create(Request $request)
    {
        $nuevaPagina = new Pagina();
        $nuevaPagina->url = $request->url;
        $nuevaPagina->nombre_pagina = $request->nombre_pagina;
        $nuevaPagina->descripcion = $request->descripcion;
        $nuevaPagina->usuariocreacion = now();
        $nuevaPagina->usuariomodificacion = NULL;
        $nuevaPagina->save();
        $agregarBitacora = new Bitacora();
        $agregarBitacora->bitacora = "Se creó una nueva pagina con id: " . $nuevaPagina->id;
        $agregarBitacora->bitacora_fecha = now();
        $agregarBitacora->bitacora_hora = now()->toTimeString();
        $agregarBitacora->save();

        return redirect("http://localhost:5173/paginas/1");
    }
}
