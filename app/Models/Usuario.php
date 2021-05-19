<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nombre',
        'apellidos',
        'mail',
        'conductor',
        'descripcion',
        'direccion',
        'instituto_id',
        'localidad',
    ];

    public $timestamps = false;
}
