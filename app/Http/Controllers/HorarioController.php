<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Horario;
use Auth;
use App\Notifications\NewTestNotification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Notification;
class HorarioController extends Controller
{
    use Notifiable;
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
        $userId = Auth::id();
        $horarios = Horario::where('id_usuario',$userId)->get();
        return view("horario", compact("horarios"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $horario = new Horario;
        $title = __("Añade tu horario");
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
        $route = route("horario.store");
        return view("horario.create", compact("icono", "iconoAtras", "horario", "title", "textButton", "route"));
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
            "dia_semana" => "required",
            "hora_enter" => "required",
            "hora_exit" => "required"
        ]);

        Horario::create([
            'id_usuario' => Auth::id(),
            'dia_semana' => $request['dia_semana'],
            'hora_enter' => $request['hora_enter'],
            'hora_exit' => $request['hora_exit'],
        ]);

        return redirect(route("horario.index"))
            ->with("success", __('El horario se ha añadido con éxito.'));
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
    public function edit(Horario $horario)
    {
        if ($horario->id_usuario != auth()->id()) {
            return redirect()->back();
        }else {
            $update = true;
            $title = __("Editar horario");
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
            $route = route("horario.update", ["horario" => $horario]);
            return view("horario.edit", compact("icono", "iconoAtras", "horario", "update", "title", "textButton", "route"));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Horario $horario)
    {
        $this->validate($request, [
            "dia_semana" => "required",
            "hora_enter" => "required",
            "hora_exit" => "required"
        ]);
        $horario->update($request->all());

        return back()
            ->with("success", __("El horario se ha actualizado correctamente."));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Horario $horario)
    {
        $horario->delete();
        return back()->with("success", __("El horario ha sido eliminado correctamente."));
    }
}
