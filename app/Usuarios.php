<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    protected $table = 'usuarios';
    protected $fillable = [
        'nombres',
        'numero_documento',
        'apellidos'
    ];

    public function reserva(){
        return $this->hasMany(Reserva::class,'usuario_id','id');
    }
}
