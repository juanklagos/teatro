@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Usuarios</div>

                    <div class="card-body">
                        @if (session('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-6"></div>
                            <div class="col-md-6">
                                <a href="{{url('usuario/create')}}" class="btn btn-block btn-primary">
                                    Crear usuario
                                </a>
                            </div>
                        </div>
                        <br>
                        <table id="example" class="display" style="width:100%">
                            <thead>
                            <tr>
                                <th>Identificación</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Opciones</th>
                                <th>Crear reserva</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($usuarios as $usuario)
                                <tr>
                                    <td>{{$usuario->numero_documento}}</td>
                                    <td>{{$usuario->nombre}}</td>
                                    <td>{{$usuario->apellidos}}</td>
                                    <td class="center">
                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                               Opciones
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                {!! link_to_route('usuarios.edit', $title = 'Editar', $parameters = $usuario->id, $attributes = ['class'=>'dropdown-item']) !!}
                                                {!!Form::open(['route'=>['usuarios.destroy',$usuario->id],'method'=>'DELETE'])!!}
                                                {!! Form::submit('Eliminar',['class'=>'dropdown-item']) !!}
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{url('reserva/create/'.$usuario->id)}}">Crear reserva</a>
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