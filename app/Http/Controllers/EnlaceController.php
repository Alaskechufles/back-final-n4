<?php

namespace App\Http\Controllers;

use App\Models\Enlace;
use Illuminate\Http\Request;

class EnlaceController extends Controller
{
    public function index()
    {
        $enlaces = Enlace::all();


        return $enlaces;
    }
    public function create(Request $request)
    {
        $nuevoEnlace = new Enlace();
        $nuevoEnlace->pagina_id = NULL;
        $nuevoEnlace->rol_id = $request->rol_id;
        $nuevoEnlace->descripcion_enlace = $request->descripcion_enlace;
        $nuevoEnlace->usuariocreacion = now();
        $nuevoEnlace->usuariomodificacion = NULL;

        $nuevoEnlace->save();
        return redirect("http://localhost:5173/enlaces");
    }
}
