<?php

namespace App\Entities;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\softDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Paciente extends Authenticatable
{
    use softDeletes;
    use Notifiable;





    public $timestamp = true;
    protected $table = 'pacientes';
    protected $fillable = ['name','cpf','email','phone',];

}
