<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use App\Models\Persona;
use App\Models\Usuario;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    public function index()
    {

        $personas = Persona::all();
        return $personas;
    }
    public function indexByID($id)
    {
        $persona = Persona::find($id);
        $persona->usuarios;
        return $persona;
    }
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
        $nuevoUsuario->fecha = NULL;
        $nuevoUsuario->usuariocreacion = now();
        $nuevoUsuario->usuariomodificacion = NULL;
        $nuevoUsuario->save();

        return redirect("http://localhost:5173/usuarios/1");
    }
    private $idUsuario;
    public function login(Request $request)
    {
        $usuarioEntrante = Usuario::where('usuario', $request->usuario)->first();

        if ($request->clave === $usuarioEntrante->clave) {
            $agregarBitacora = new Bitacora();
            $agregarBitacora->bitacora = "Inició sesion el usuario con id: " . $usuarioEntrante->id;
            $agregarBitacora->bitacora_fecha = now();
            $agregarBitacora->bitacora_hora = now()->toTimeString();
            $agregarBitacora->save();

            return redirect("http://localhost:5173/perfil/" . $usuarioEntrante->id);
        }
        return redirect("http://localhost:5173/");
    }

    public function verificar()
    {
        $id = $this->idUsuario;
        return session()->all();
    }

    public function user($id)
    {
        $persona = Persona::find($id);
        $persona->Persona;

        return $persona;
    }
}
