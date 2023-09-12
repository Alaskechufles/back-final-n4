<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
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

        $agregarBitacora = new Bitacora();
        $agregarBitacora->bitacora = "Se creó un nuevo rol con id: " . $nuevoRol->id;
        $agregarBitacora->bitacora_fecha = now();
        $agregarBitacora->bitacora_hora = now()->toTimeString();
        $agregarBitacora->save();


        return redirect("http://localhost:5173/roles/1");
    }
    public function inactive(Request $request)
    {
        $rolInactivar = Rol::find($request->id_inactivar);
        if ($rolInactivar->habilitado == 0) {
            $rolInactivar->habilitado = 1;
            $rolInactivar->usuariomodificacion = now();
            $agregarBitacora = new Bitacora();
            $agregarBitacora->bitacora = "Se activó el estado del rol con id: " . $rolInactivar->id;
            $agregarBitacora->bitacora_fecha = now();
            $agregarBitacora->bitacora_hora = now()->toTimeString();
            $agregarBitacora->save();
        } else {
            $rolInactivar->habilitado = 0;
            $rolInactivar->usuariomodificacion = now();
            $agregarBitacora = new Bitacora();
            $agregarBitacora->bitacora = "Se inactivó el estado del rol con id: " . $rolInactivar->id;
            $agregarBitacora->bitacora_fecha = now();
            $agregarBitacora->bitacora_hora = now()->toTimeString();
            $agregarBitacora->save();
        }
        $rolInactivar->save();
        return redirect("http://localhost:5173/roles/1");
    }
}
