@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a class="btn" href="{{url('usuarios')}}">USUARIOS</a>
                        <br>
                    <a class="btn" href="{{url('reservas')}}">RESERVAS</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
