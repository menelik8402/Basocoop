@extends('layouts.app')




@section('content')
    <br><br>
    {{--<div class="container">--}}
    {{--<div class="alert alert-success" id="alerta" style="display: none" role="alert">--}}
    {{--Se modific correctamente--}}
    {{--</div>--}}

    <div class="container">
        <section class="tabla">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title">Preguntas</h1>
                </div>
                <div class="panel-body">
                    <table class="table  table-bordered" id="tabla">
                        <thead>
                        <th>Nombre de la Pregunta</th>
                        <th>Opciones</th>
                        </thead>
                        <tbody>
                        @foreach($pregunta as $p)
                            <tr>
                                <td>{{$p->pregunta}}</td>

                                <td>
                                    <button onclick="editar({{$p->pregunta}},{{$p->tipo}})" class="boton btn"><i class="fa fa-edit"></i>
                                        Editar
                                    </button>

                                    <button onclick="eliminar({{$p->id}})" class="boton btn"><i
                                                class="fa fa-eraser"></i> Eliminar
                                    </button>

                                    {{--<button onclick="info()" class="boton"><i class="fa fa-info"></i>  Información</button>--}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                </div>
                <div class="panel-footer">
                    <a data-toggle="modal" data-target="#modal" href="#" class="boton btn float-right"><i
                                class="fa fa-plus"></i> Nueva Pregunta</a>
                    {{--<a data-toggle="modal" data-target="#modal" href="#" class="btn btn-primary pull-right">Nuevo--}}
                    {{--Proyecto</a>--}}
                </div>
            </div>
        </section>

        <div class="modal fade " id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Nueva Pregunta</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">


                        <form class="form-horizontal form">

                            <div class="form-group row">
                                <label for="0" class="col-sm-6 col-form-label">Pregunta</label>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control " id="pregunta" rows="1"></textarea>
                            </div>
                            <select class="form-control col-sm-4" id="tipo">
                                <option value="1">Si o No</option>
                                <option value="2">Número</option>
                                <option value="4">Opinión</option>
                                <option value="5">Estado</option>
                                <option value="6">Capacitación</option>
                                <option value="7" onclick="rango">Rango</option>
                            </select>
                        </form>


                    </div>

                    <div class="modal-footer">
                        <button type="button" class="boton2 btn" data-dismiss="modal">Atras</button>
                        <button type="button" class="boton btn" id="addpreguntas" data-dismiss="modal">Guardar
                        </button>
                    </div>
                </div>
            </div>
        </div>


    </div>
    </div>
    <div class="modal fade " id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Editar Pregunta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                    <form class="form-horizontal form">

                        <div class="form-group row">
                            <label for="0" class="col-sm-6 col-form-label">Pregunta</label>
                            <input type="hidden" id="id_pregunta">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control " id="edit" rows="1"></textarea>
                        </div>
                    </form>
                    <label for="0" class="col-sm-6 col-form-label">Tipo de Pregunta</label>
                    <select class="form-control col-sm-4" id="rango">
                        <option value="1">Si o No</option>
                        <option value="2">Número</option>
                        <option value="3">Opinión</option>
                        <option value="4">Estado</option>
                        <option value="5">Capacitación</option>
                        <option value="6">Rango</option>
                    </select>

                </div>

                <div class="modal-footer">
                    <button type="button" class="boton2 btn" data-dismiss="modal">Atras</button>
                    <button type="button" class="boton btn" id="editpreguntas" data-dismiss="modal">Guardar</button>
                </div>
            </div>
        </div>
    </div>


    <section>
        <div class="modal fade" id="eliminarPreg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <form action="{{route('Eliminar4')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title">Eliminar</h1>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;
                            </button>

                        </div>
                        <div class="modal-body">
                            <label for="Titulo">Esta seguro de que quiere eliminar este programa</label>

                            <input type="hidden" id="eliminarpreg" name="eliminarpreg">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="boton btn">Si</button>
                            <button type="button" class="boton btn" data-dismiss="modal">No</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <script type="text/javascript">

        var tabla = $('#tabla');
        var tablaDT;
        var eliminar;
        var editar;
        var info;
        var rango;
        {{--var pregunta = {!! $pregunta !!} ;--}}

        $(document).ready(function () {
            tablaDT = tabla.DataTable();


            eliminar = function (id) {

                $('#eliminarpreg').val(id);
                $('#eliminarPreg').modal('show');
            }

            $('#addpreguntas').click(function (e) {
                e.preventDefault();
                var pregunta = $('#pregunta').val();
                var tipo = $('#tipo').val();
//


                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: '/addPreg/{{$enc->id}}',
                    data: {

                        pregunta: pregunta,
                        tipo: tipo,

                        _token: '{{csrf_token()}}'
                    },

                    success: function (data) {
//                      $('#alerta').fadeIn(1000);
//                      $('#alerta').fadeOut(5000);


                        tablaDT.destroy();

                        tabla.append('<tr id="item_' + data.e.id + '">' + ' <td >' +data.e.pregunta + '</td>' + ' <td >' + '<button onclick="editar()" class="boton btn"><i class="fa fa-edit"></i>  Editar</button>' +

                            '<button onclick="eliminar()" class="boton btn"><i class="fa fa-eraser"></i>Eliminar</button>' +

//                                '<button onclick="info()" class="boton"><i class="fa fa-info"></i>  Informacion</button>' +
                            '</td>' +
//                                                      drop +
                            '</tr>');

                        tablaDT = tabla.DataTable();
                        var defaultColor = $('#item_' + data.e.id).css('color');
                        $('#item_' + data.id)
                            .css('opacity', '0.20').css('color', 'orange').animate({opacity: 1}, 500).animate({opacity: 0.20}, 500).animate({opacity: 1}, 500)
                            .animate({opacity: 0.20}, 500).animate({opacity: 1}, 500, function () {
                            $('#item_' + id).css('color', defaultColor);
                        });

                    },
                    error: function () {
                        alert('error')
                    }
                });
            });

            {{--info=function (p,i) {--}}
                    {{--//       alert(enc[i]);--}}
                    {{--$("#id").val(p.id);--}}
                    {{--$('#info').val(enc[i].nombre);--}}
                    {{--$("#infomodal").modal('show');--}}
                    {{--}--}}

                    {{--eliminar= function (id) {--}}
                    {{--$('#eliminar').val(id);--}}
                    {{--$('#Eliminare').modal('show');--}}
                    {{--}--}}




                    {{--Recuerda q esto no recarga --}}
                editar = function (p) {
//                   alert(p.pregunta);

                $("#id_pregunta").val(p.id);
                $('#edit').val(p.pregunta);
                $("#editmodal").modal('show');
            }


            $('#editpreguntas').click(function () {
                var id = $('#id_pregunta').val();
                var nombre = $('#edit').val();
                var tipo = $('#rango').val();


                $.ajax({
                    type: 'POST',
                    url: '/editpreg',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: id,
                        pregunta: nombre,
                        tipo: tipo,

                    },

                    success: function (data) {
                        var id_encuesta = data.id;
                        var nombre = data.pregunta;


// a
                        tablaDT.destroy();
                        $('#item_' + id_encuesta).replaceWith(
                            "<tr id='item_" + id_encuesta + "'>" +
                            ' <td >' + nombre + '</td>' +
                            ' <td >' +
                            '<button onclick="editar(' + data + ')" class="boton btn"><i class="fa fa-edit"></i>  Editar</button> ' +


                            '<button onclick="eliminar(' + id_encuesta + ',' + nombre + ')" class="boton btn"><i class="fa fa-eraser"></i>  Eliminar</button>' +

                            '<button onclick="info()" class="boton btn"><i class="fa fa-info"></i>  Informacion</button>' +
                            '</td>' +

                            '</tr>');

                        tablaDT = tabla.DataTable();
                        var defaultColor = $('#item_' + id_encuesta).css('color');
                        $('#item_' + id_encuesta)
                            .css('opacity', '0.20').css('color', 'orange').animate({opacity: 1}, 500).animate({opacity: 0.20}, 500).animate({opacity: 1}, 500)
                            .animate({opacity: 0.20}, 500).animate({opacity: 1}, 500, function () {
                            $('#item_' + id_encuesta).css('color', defaultColor);
                        });
//

                    }, error: function () {
                        alert('error')
                    }
                });
            });


        });


    </script>
@endsection


