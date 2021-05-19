<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instituto extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nombre',
        'direccion',
    ];

    public $timestamps = false;
}
