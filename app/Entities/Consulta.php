<?php

namespace App\Entities;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\softDeletes;

/**
 * Class Consulta.
 *
 * @package namespace App\Entities;
 */
class Consulta extends Authenticatable
{
    use softDeletes;
    use Notifiable;





    public $timestamp = true;
    protected $table = 'consultas';
    protected $fillable = ['id_medico','id_paciente','date'];

    public function owner(){
        return $this->belongsTo(User::class);
    }
    public function paciente(){
        return $this->belongsTo(Paciente::class);
    }

}
