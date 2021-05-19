<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InstitutoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CocheController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HorarioController;
use App\Notifications\MailNotification;
use App\Models\User;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now creat{{ e so }}mething great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('notify/{id}', function ($id) {
    User::find($id)->notify(new MailNotification);
    return back()->with('success', 'La notificación se ha enviado correctamente!');
});

Route::get('/register', [RegisterController::class, 'index'])->name('user.index');

Route::resource('usuario', UsuarioController::class);

Route::resource('instituto', InstitutoController::class);

Route::resource('horario', HorarioController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('coche', CocheController::class);
