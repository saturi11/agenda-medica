<?php

namespace App\Entities;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\softDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends Authenticatable{
    use softDeletes;
    use Notifiable;



    

    public $timestamp = true;
    protected $table = 'users';
    protected $fillable = ['name','cpf','email','password','phone','birth','status','permission'];
    protected $hidden = ['password', 'remember_token'];
}
