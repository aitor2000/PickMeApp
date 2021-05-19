<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\User;
use Auth;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::id();
        $usuarios = Usuario::where('id',$userId)->get();
        return view("usuario", compact("usuarios"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        if ($usuario->id != auth()->id()) {
            return redirect()->back();
        }else {
            $update = true;
            $title = __("Editar usuario");
            $textButton = __("Actualizar");
            $icono = __('<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/>
            <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/>
            </svg>');
            $iconoAtras = __('<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
            class="bi bi-arrow-90deg-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd"
                d="M1.146 4.854a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H12.5A2.5 2.5 0 0 1 15 6.5v8a.5.5 0 0 1-1 0v-8A1.5 1.5 0 0 0 12.5 5H2.707l3.147 3.146a.5.5 0 1 1-.708.708l-4-4z" />
            </svg>');
            $route = route("usuario.update", ["usuario" => $usuario]);
            return view("usuario.edit", compact("icono", "iconoAtras", "usuario", "update", "title", "textButton", "route"));
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {

        $esConductor = 0;
        $respuestaConductor = $request['conductor'];
        if ($respuestaConductor === 'siConductor') {
            $esConductor = 1;
        }
        Usuario::where('id', $usuario->id)
            ->update([
                'nombre' => $request['name'],
                'apellidos' => $request['apellidos'],
                'mail' => $request['email'],
                'conductor' => $esConductor,
                'descripcion' => $request['descripcion'],
                'direccion' => $request['direccion'],
                'localidad' => $request['localidad'],
                'instituto_id' => $request['instituto_id'],
            ]);
        User::where('id', $usuario->id)
            ->update([
                'name' => $request['name'],
                'email' => $request['email'],
            ]);

        return back()
            ->with("success", __("Tu usuario se ha actualizado correctamente."));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
