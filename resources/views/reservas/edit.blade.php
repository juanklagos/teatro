@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Editar Reserva</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        Usuario reserva: {{$reserva->usuario->nombre}} {{$reserva->usuario->apellidos}}<br>
                            {!!  Form::model($reserva, array('route' => array('reservas.update', $reserva->id), 'files' => true, 'method' => 'PUT'))!!}
                            {{csrf_field()}}
                        <input name="idUsuario" hidden value="{{$reserva->usuario->id}}">
                        <div class="form-group">
                            <label>Fecha</label>
                            {!! Form::date('fecha_reserva',null,['class'=>'form-control','placeholder'=>'Fecha de reserva']) !!}
                        </div>
                        <div class="form-group">
                            <label>Butaca Fila-Columna</label> <a href="javascript:void(0);"  class="float-right add_button">Agregar otra butaca</a>
                            <div class="field_wrapper" id="field_wrapper">
                                @foreach($reserva->reserva_detalle as $reserva_detalle)
                                    <div>
                                        <div class="input-group">
                                            <select class="custom-select" id="inputGroupSelect04" name="butaca[]">
                                                <option selected>{{$reserva_detalle->butaca}}</option>
                                                <option>A1</option>
                                                <option>A2</option>
                                                <option>A3</option>
                                                <option>A4</option>
                                                <option>A5</option>
                                                <option>A6</option>
                                                <option>A7</option>
                                                <option>A8</option>
                                                <option>A9</option>
                                                <option>A10</option>
                                                <option>B1</option>
                                                <option>B2</option>
                                                <option>B3</option>
                                                <option>B4</option>
                                                <option>B5</option>
                                                <option>B6</option>
                                                <option>B7</option>
                                                <option>B8</option>
                                                <option>B9</option>
                                                <option>B10</option>
                                                <option>C1</option>
                                                <option>C2</option>
                                                <option>C3</option>
                                                <option>C4</option>
                                                <option>C5</option>
                                                <option>C6</option>
                                                <option>C7</option>
                                                <option>C8</option>
                                                <option>C9</option>
                                                <option>C10</option>
                                                <option>D1</option>
                                                <option>D2</option>
                                                <option>D3</option>
                                                <option>D4</option>
                                                <option>D5</option>
                                                <option>D6</option>
                                                <option>D7</option>
                                                <option>D8</option>
                                                <option>D9</option>
                                                <option>D10</option>
                                                <option>E1</option>
                                                <option>E2</option>
                                                <option>E3</option>
                                                <option>E4</option>
                                                <option>E5</option>
                                                <option>E6</option>
                                                <option>E7</option>
                                                <option>E8</option>
                                                <option>E9</option>
                                                <option>E10</option>
                                            </select>
                                            <div class="input-group-append remove_button">
                                              <a href="javascript:void(0);" class="btn btn-outline-secondary " type="button">Quitar</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <button type="submit">Crear reserva</button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('scripts')
    <script>
        $(document).ready(function(){
            var maxField = 10;
            var addButton = $('.add_button');
            var wrapper = $('.field_wrapper');
            var fieldHTML = '<div> \n' +
                '                                        <div class="input-group ">\n' +
                '                                            <select class="custom-select" id="inputGroupSelect04" name="butaca[]">\n' +
                '                                                <option>A1</option>\n' +
                '                                                <option>A2</option>\n' +
                '                                                <option>A3</option>\n' +
                '                                                <option>A4</option>\n' +
                '                                                <option>A5</option>\n' +
                '                                                <option>A6</option>\n' +
                '                                                <option>A7</option>\n' +
                '                                                <option>A8</option>\n' +
                '                                                <option>A9</option>\n' +
                '                                                <option>A10</option>\n' +
                '                                                <option>B1</option>\n' +
                '                                                <option>B2</option>\n' +
                '                                                <option>B3</option>\n' +
                '                                                <option>B4</option>\n' +
                '                                                <option>B5</option>\n' +
                '                                                <option>B6</option>\n' +
                '                                                <option>B7</option>\n' +
                '                                                <option>B8</option>\n' +
                '                                                <option>B9</option>\n' +
                '                                                <option>B10</option>\n' +
                '                                                <option>C1</option>\n' +
                '                                                <option>C2</option>\n' +
                '                                                <option>C3</option>\n' +
                '                                                <option>C4</option>\n' +
                '                                                <option>C5</option>\n' +
                '                                                <option>C6</option>\n' +
                '                                                <option>C7</option>\n' +
                '                                                <option>C8</option>\n' +
                '                                                <option>C9</option>\n' +
                '                                                <option>C10</option>\n' +
                '                                                <option>D1</option>\n' +
                '                                                <option>D2</option>\n' +
                '                                                <option>D3</option>\n' +
                '                                                <option>D4</option>\n' +
                '                                                <option>D5</option>\n' +
                '                                                <option>D6</option>\n' +
                '                                                <option>D7</option>\n' +
                '                                                <option>D8</option>\n' +
                '                                                <option>D9</option>\n' +
                '                                                <option>D10</option>\n' +
                '                                                <option>E1</option>\n' +
                '                                                <option>E2</option>\n' +
                '                                                <option>E3</option>\n' +
                '                                                <option>E4</option>\n' +
                '                                                <option>E5</option>\n' +
                '                                                <option>E6</option>\n' +
                '                                                <option>E7</option>\n' +
                '                                                <option>E8</option>\n' +
                '                                                <option>E9</option>\n' +
                '                                                <option>E10</option>\n' +
                '                                            </select>\n' +
                '                                            <div class="input-group-append remove_button">\n' +
                '                                                <a href="javascript:void(0);" class="btn btn-outline-secondary " type="button">Quitar</a>\n' +
                '                                            </div>\n' +
                '                                        </div>\n' +
                '                                    </div>';
            var x = 1;
            $(addButton).click(function(){
                if(x < maxField){
                    x++;
                    $(wrapper).append(fieldHTML);
                }
            });
            $(wrapper).on('click', '.remove_button', function(e){
                e.preventDefault();
               var di = $(".remove_button a").length;
                if (di == 1){
                    alert('Debe haber por lo menos una butaca');
                }else {
                    $(this).parent('div').remove();
                    x--;
                }

            });
        });
    </script>
@stop