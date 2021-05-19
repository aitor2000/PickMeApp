<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Notifications\NewTestNotification;
use Illuminate\Notifications\Notifiable;

class Coche extends Model
{
    use HasFactory;
    use Notifiable;

    protected $fillable = [
        'matricula',
        'marca',
        'modelo',
        'color',
        'plazas',
    ];

    protected $primaryKey = 'matricula';

    public $incrementing = false;

    public $timestamps = false;

    
}
