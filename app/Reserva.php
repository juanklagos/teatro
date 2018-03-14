<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $table = 'reserva';
    protected $fillable = [
        'usuario_id',
        'numero_personas',
        'fecha_reserva'
    ];

    public function usuario(){
        return $this->belongsTo(Usuarios::class,'usuario_id','id');
    }
    public function reserva_detalle(){
        return $this->hasMany(Reserva_detalle::class,'reserva_id','id');
    }
}
