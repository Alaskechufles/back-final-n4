<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()
    {
        $personas = Usuario::all();


        return $personas;
    }
    public function indexByID($id)
    {
        $persona = Usuario::find($id);
        $persona->persona;
        return $persona;
    }
    public function create(Request $request)
    {
        $nuevaPersona = new Persona();
        $nuevaPersona->primer_nombre = $request->primer_nombre;
        $nuevaPersona->segundo_nombre = $request->segundo_nombre;
        $nuevaPersona->primer_apellido = $request->primer_apellido;
        $nuevaPersona->segundo_apellido = $request->segundo_apellido;
        $nuevaPersona->usuariocreacion = now();
        $nuevaPersona->usuariomodificacion = NULL;
        $nuevaPersona->save();

        $nuevoUsuario = new Usuario();
        $nuevoUsuario->persona_id = $nuevaPersona->id;
        $nuevoUsuario->rol_id = 1;
        $nuevoUsuario->usuario = $request->usuario;
        $nuevoUsuario->clave = $request->primer_apellido;
        $nuevoUsuario->habilitado = 1;
        $nuevoUsuario->fecha = $request->fecha;
        $nuevoUsuario->usuariocreacion = now();
        $nuevoUsuario->usuariomodificacion = NULL;
        $nuevoUsuario->save();

        return redirect("http://localhost:5173/usuarios");
    }
    public function inactive(Request $request)
    {
        $usuarioInactivar = Usuario::find($request->id_inactivar);
        if ($usuarioInactivar->habilitado == 0) {
            $usuarioInactivar->habilitado = 1;
        } else {
            $usuarioInactivar->habilitado = 0;
        }
        $usuarioInactivar->save();
        return redirect("http://localhost:5173/usuarios");
    }
}
