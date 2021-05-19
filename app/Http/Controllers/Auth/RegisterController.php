<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;//Modified
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Usuario;
use App\Models\Instituto;
use App\Mail\RegisterMail;
use Auth;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    /*{{  }}
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |{{  }}
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    public function index()
    {
        
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $esConductor = null;

        if ($data['conductor'] === 'siConductor') {
            $esConductor = 1;
        } else {
            $esConductor = 0;
        }

        $usuario = Usuario::create([
            'id' => $user->id,
            'nombre' => $user->name,
            'apellidos' => $data['apellidos'],
            'mail' => $user->email,
            'conductor' => $esConductor,
            'descripcion' => $data['descripcion'],
            'direccion' => $data['direccion'],
            'instituto_id' => $data['instituto_id'],
            'localidad' => $data['localidad'],
        ]);
        return $user;
        
    }

}
