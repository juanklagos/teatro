@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Reservas</div>
                    <div class="card-body">
                        @if (session('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif
                            <div class="row">
                                <div class="col-md-6"></div>
                                <div class="col-md-6">
                                    <a href="{{url('usuarios')}}" class="btn btn-block btn-primary">
                                        Ir a usuario para crear reserva
                                    </a>
                                </div>
                            </div>
<br>
                            <table id="example" class="display" style="width:100%">
                                <thead>
                                <tr>
                                    <th>Fecha reserva</th>
                                    <th>Usuario</th>
                                    <th>Personas</th>
                                    <th>Butacas</th>
                                    <th>Opciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($reservas as $reserva)
                                        <tr>
                                            <td>{{$reserva->fecha_reserva}}</td>
                                            <td>{{$reserva->usuario->nombre}} {{$reserva->usuario->apellidos}}</td>
                                            <td>{{$reserva->numero_personas}}</td>
                                            <td>
                                                @foreach($reserva->reserva_detalle as $reserva_detalle)
                                                {{$reserva_detalle->butaca}} -
                                                @endforeach
                                            </td>
                                            <td class="center">
                                                <div class="dropdown">
                                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Opciones
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        {!! link_to_route('reservas.edit', $title = 'Editar', $parameters = $reserva->id, $attributes = ['class'=>'dropdown-item']) !!}
                                                        {!!Form::open(['route'=>['reservas.destroy',$reserva->id],'method'=>'DELETE'])!!}
                                                        {!! Form::submit('Eliminar',['class'=>'dropdown-item']) !!}
                                                        {!! Form::close() !!}
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('scripts')
    <script>
        $(document).ready(function () {
            $('#example').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.13/i18n/Spanish.json"
                }
            });
        });
    </script>
@stop