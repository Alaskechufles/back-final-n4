<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{
    public function index()
    {
        $personas = Rol::all();


        return $personas;
    }
    public function create(Request $request)
    {
        $nuevoRol = new Rol();
        $nuevoRol->rol = $request->rol;
        $nuevoRol->usuariocreacion = now();
        $nuevoRol->usuariomodificacion = NULL;
        $nuevoRol->save();
        return redirect("http://localhost:5173/roles");
    }
}
