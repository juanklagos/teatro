@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"> Crear Usuarios</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                            {!! Form::open(['route'=>'usuarios.store','method'=>'POST']) !!}
                            @csrf
                            <div class="form-group">
                                <label>Numero documento</label>
                                <input name="numero_documento" class="form-control{{ $errors->has('numero_documento') ? ' is-invalid' : '' }}" value="{{old('numero_documento')}}" required>
                                @if ($errors->has('numero_documento'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('numero_documento') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Nombres</label>
                                <input name="nombre" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" value="{{old('nombre')}}" required>
                                @if ($errors->has('nombre'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Apellidos</label>
                                <input name="apellidos" class="form-control{{ $errors->has('apellidos') ? ' is-invalid' : '' }}" value="{{old('apellidos')}}" required>
                                @if ($errors->has('apellidos'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('apellidos') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-block"> Crear usuario</button>
                            {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('scripts')

@stop