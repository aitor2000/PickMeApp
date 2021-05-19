<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Notifications\NewTestNotification;
use Illuminate\Notifications\Notifiable;

class Horario extends Model
{
    use HasFactory;
    use Notifiable;

    protected $fillable = [
        'id_usuario',
        'dia_semana',
        'hora_enter',
        'hora_exit',
    ];

    public $timestamps = false;
}
