@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"> Editar Usuario</div>

                    <div class="card-body">
                        @if (session('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif

                        {!!  Form::model($usuario, array('route' => array('usuarios.update', $usuario->id), 'files' => true, 'method' => 'PUT'))!!}
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>Numero documento</label>
                            {!! Form::text('numero_documento',null,['class'=>'form-control','placeholder'=>'Numero documento']) !!}
                            @if ($errors->has('numero_documento'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('numero_documento') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Nombres</label>
                            {!! Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Nombre']) !!}
                            @if ($errors->has('nombre'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Apellidos</label>
                            {!! Form::text('apellidos',null,['class'=>'form-control','placeholder'=>'Nombre']) !!}
                            @if ($errors->has('apellidos'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('apellidos') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-block"> Editar usuario</button>
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('scripts')

@stop