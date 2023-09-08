<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\Usuario;
use Illuminate\Http\Request;

class PersonaController extends Controller
{

    public function create(Request $request)
    {
        $nuevaPersona = new Persona();
        $nuevaPersona->primer_nombre = NULL;
        $nuevaPersona->segundo_nombre = NULL;
        $nuevaPersona->primer_apellido = NULL;
        $nuevaPersona->segundo_apellido = NULL;
        $nuevaPersona->usuariocreacion = now();
        $nuevaPersona->usuariomodificacion = NULL;
        $nuevaPersona->save();

        $nuevoUsuario = new Usuario();
        $nuevoUsuario->persona_id = $nuevaPersona->id;
        $nuevoUsuario->rol_id = 1;
        $nuevoUsuario->usuario = $request->usuario;
        $nuevoUsuario->clave = $request->clave;
        $nuevoUsuario->habilitado = 1;
        $nuevoUsuario->fecha = now();
        $nuevoUsuario->usuariocreacion = now();
        $nuevoUsuario->usuariomodificacion = NULL;
        $nuevoUsuario->save();

        return redirect("http://localhost:5173/");
    }
    private $idUsauario;
    public function login(Request $request)
    {
        $usuarioEntrante = Usuario::where('usuario', $request->usuario)->first();

        if ($request->clave === $usuarioEntrante->clave) {

            $idUsuario = $usuarioEntrante->id;
            $this->verificar($idUsuario);

            /* return var_dump(session("idUsuarioLogeado")); */
            return redirect("api/verificar");
        }
        return redirect("http://localhost:5173/");
    }

    public function verificar($idUsuario)
    {

        return $idUsuario;
    }

    public function user($id)
    {
        $persona = Persona::find($id);
        $persona->Persona;

        return $persona;
    }
}
