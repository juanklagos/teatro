<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserva_detalle extends Model
{
    protected $table = 'reserva_detalle';
    protected $fillable = [
        'reserva_id',
        'fila_letra',
        'columna_numero'
    ];

    public function reserva(){
        return $this->belongsTo(Reserva::class,'reserva_id','id');
    }
}
