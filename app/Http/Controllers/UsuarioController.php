<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
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
    public function update(Request $request, $id)
    {
        $personaEdit = Persona::find($id);
        $personaEdit->primer_nombre = $request->primer_nombre;
        $personaEdit->segundo_nombre = $request->segundo_nombre;
        $personaEdit->primer_apellido = $request->primer_apellido;
        $personaEdit->segundo_apellido = $request->segundo_apellido;
        $personaEdit->usuariomodificacion = now();

        $personaEdit->save();

        $usuarioEdit = Usuario::find($id);


        $usuarioEdit->usuario = $request->usuario;
        $usuarioEdit->clave = $request->primer_apellido;
        $usuarioEdit->usuariomodificacion = now();

        $usuarioEdit->save();

        $agregarBitacora = new Bitacora();
        $agregarBitacora->bitacora = "Se modificaron los datos de la persona con id: " . $personaEdit->id;
        $agregarBitacora->bitacora_fecha = now();
        $agregarBitacora->bitacora_hora = now()->toTimeString();
        $agregarBitacora->save();

        return redirect("http://localhost:5173/perfil/" . $id);
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

        $agregarBitacora = new Bitacora();
        $agregarBitacora->bitacora = "Se creo el usuario con id: " . $nuevoUsuario->id;
        $agregarBitacora->bitacora_fecha = now();
        $agregarBitacora->bitacora_hora = now()->toTimeString();
        $agregarBitacora->save();

        return redirect("http://localhost:5173/usuarios/1");
    }
    public function inactive(Request $request)
    {
        $usuarioInactivar = Usuario::find($request->id_inactivar);
        if ($usuarioInactivar->habilitado == 0) {
            $usuarioInactivar->habilitado = 1;
            $usuarioInactivar->usuariomodificacion = now();
            $agregarBitacora = new Bitacora();
            $agregarBitacora->bitacora = "Se activó el estado del usuario con id: " . $usuarioInactivar->id;
            $agregarBitacora->bitacora_fecha = now();
            $agregarBitacora->bitacora_hora = now()->toTimeString();
            $agregarBitacora->save();
        } else {
            $usuarioInactivar->habilitado = 0;
            $usuarioInactivar->usuariomodificacion = now();
            $agregarBitacora = new Bitacora();
            $agregarBitacora->bitacora = "Se inactivó el estado del usuario con id: " . $usuarioInactivar->id;
            $agregarBitacora->bitacora_fecha = now();
            $agregarBitacora->bitacora_hora = now()->toTimeString();
            $agregarBitacora->save();
        }
        $usuarioInactivar->save();
        return redirect("http://localhost:5173/usuarios/1");
    }
}
