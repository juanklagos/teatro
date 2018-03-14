<?php

namespace App\Http\Controllers;

use App\Reserva;
use App\Reserva_detalle;
use App\Usuarios;
use Illuminate\Http\Request;

class ReservasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservas = Reserva::with('usuario')->with('reserva_detalle')->get();
        return view('reservas.index',compact('reservas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $usuario = Usuarios::find($id);
        return view('reservas.create',compact('usuario'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $numero_personas = count($request->butaca);
        $reserva = new Reserva();
        $reserva->usuario_id = $request->idUsuario;
        $reserva->fecha_reserva = $request->fecha_reserva;
        $reserva->numero_personas = $numero_personas;
        $reserva->save();

        foreach ($request->butaca as $butaca)
        {
           $reserva_detalle = new Reserva_detalle();
           $reserva_detalle->reserva_id = $reserva->id;
           $reserva_detalle->butaca = $butaca;
           $reserva_detalle->save();
        }
        $log_text = fopen(realpath( '.' )."/log/log_reservas.txt", "a+");
        fwrite($log_text, "\n reserva creada ".$reserva->id. "\n");
        fclose($log_text);

        return redirect('reservas')->with('message','reserva creada');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reserva = Reserva::find($id);
        return view('reservas.edit',compact('reserva'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $numero_personas = count($request->butaca);
        $reserva = Reserva::find($id);
        $reserva->usuario_id = $request->idUsuario;
        $reserva->fecha_reserva = $request->fecha_reserva;
        $reserva->numero_personas = $numero_personas;
        $reserva->save();

        $reserva_detalle_delete = Reserva_detalle::where('reserva_id','=',$id)->delete();

        foreach ($request->butaca as $butaca)
        {
            $reserva_detalle = new Reserva_detalle();
            $reserva_detalle->reserva_id = $reserva->id;
            $reserva_detalle->butaca = $butaca;
            $reserva_detalle->save();
        }
        return redirect('reservas')->with('message','reserva creada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reserva = Reserva::destroy($id);
        return redirect('reservas')->with('message','Reserva elimniada correctamente');
    }
}
