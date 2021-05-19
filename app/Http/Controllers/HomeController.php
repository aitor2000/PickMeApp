<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coche;
use App\Models\Conductor;
use App\Models\Horario;
use App\Models\Usuario;
use App\Models\Instituto;
use App\Http\Controllers\CocheController;
use App\Http\Controllers\ConductorController;
use App\Http\Controllers\HorarioController;

class HomeController extends Controller
{
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $usuarios = Usuario::all();
        $horarios = Horario::all();
        $coches = Coche::all();
        $conductores = Conductor::all();
        $institutos = Instituto::all();

        return view('home', compact("usuarios", "horarios", "coches", "conductores", "institutos"));
    }
}
