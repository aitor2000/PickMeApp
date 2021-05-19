<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/*use App\Notifications\NewTestNotification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Notification;*/
use App\Models\Coche;
use App\Models\Conductor;
use App\Http\Controllers\ConductorController;
use Auth;
use Illuminate\Support\Facades\DB;
class CocheController extends Controller

{
   // use Notifiable;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coches = Coche::all();
        $conductores = Conductor::all();
        return view("coche", compact("coches", "conductores"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $coche = new Coche;
        $title = __("Añade tu coche");
        $textButton = __("Añadir");
        $icono = __('<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
        class="bi bi-plus" viewBox="0 0 16 16">
        <path
            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
        </svg>');
        $iconoAtras = __('<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
        class="bi bi-arrow-90deg-left" viewBox="0 0 16 16">
        <path fill-rule="evenodd"
            d="M1.146 4.854a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H12.5A2.5 2.5 0 0 1 15 6.5v8a.5.5 0 0 1-1 0v-8A1.5 1.5 0 0 0 12.5 5H2.707l3.147 3.146a.5.5 0 1 1-.708.708l-4-4z" />
        </svg>');
        $route = route("coche.store");
        //$coche->notify(new NewTestNotification("Nuevo coche añadido correctamente"));
        //Notification::send($coche, new NewTestNotification("Nuevo Coche Aádido"));
        return view("coche.create", compact("iconoAtras", "icono", "coche", "title", "textButton", "route"));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "marca" => "required",
            "modelo" => "required",
            "matricula" => "required",
            "color" => "required",
            "plazas" => "required"
        ]);

        $matriculaCoche = $request['matricula'];
        $matriculaCoche = str_replace(' ', '', $matriculaCoche);

        Coche::create([
            'marca' => $request['marca'],
            'modelo' => $request['modelo'],
            'matricula' => $matriculaCoche,
            'color' => $request['color'],
            'plazas' => $request['plazas']
        ]);

        Conductor::create([
            'id_usuario' => Auth::id(),
            'matricula' => $matriculaCoche
        ]);
        
        return redirect(route("coche.index"))
            ->with("success", __("El vehículo se ha añadido correctamente."));
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
    public function edit(Coche $coche)
    {
        if (DB::table('conductors')->where('id_usuario',auth()->user()->id)->value('matricula') != $coche->matricula) {
            return redirect()->back();
        }else {
            $update = true;
            $title = __("Editar coche");
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
            $route = route("coche.update", ["coche" => $coche]);
            return view("coche.edit", compact("icono", "iconoAtras", "coche", "update", "title", "textButton", "route"));   
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coche $coche)
    {
        $this->validate($request, [
            "marca" => "required",
            "modelo" => "required",
            "matricula" => "required",
            "color" => "required",
            "plazas" => "required"
        ]);
        $coche->update($request->all());
        
        return back()
            ->with("success", __("El vehiculo se ha actualizado correctamente."));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coche $coche)
    {
        $coche->delete();
        return back()->with("success", __("El vehículo se ha eliminado correctamente."));
    }
}
