@extends('layouts.app')



@section('content')
    <br><br>
    <div class="container">
        <section class="tabla">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title">Encuestas</h1>
                </div>
                <div class="panel-body">
                    <table class="table  table-bordered" id="tabla">
                        <thead>
                        <th>Nombre de la Encuesta</th>
                        <th class="pull-right">Opciones</th>
                        </thead>
                        <tbody>
                        @foreach($encuesta as $i=>$p)
                            <tr id="item_{{$p->id}}">
                                <td id="nombre_{{$p->id}}">{{$p->nombre}}</td>

                                <td>
                                    <button onclick="editar({{$p}},'{{$i}}')" class="boton "><i class="fa fa-edit"></i>  Editar</button>

                                    <button onclick="eliminar({{$p->id}})" class="boton btn-sm "><i class="fa fa-eraser"></i>  Eliminar</button>

                                    <button onclick="info({{$p}},'{{$i}}')"class="boton btn-sm "><i class="fa fa-info"></i>  Información</button>

                                     <a href="/preguntas/{{$p->id}}" class="boton btn-sm "><i class="fa fa-plus"></i>  Añadir Pregunta</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                </div>
                <div class="panel-footer">
                    <br>
                    <a data-toggle="modal" data-target="#modal" href="#" class="boton btn pull-right"><i class="fa fa-plus"></i>  Nueva Encuesta</a>
                    {{--<a data-toggle="modal" data-target="#modal" href="#" class="btn btn-primary pull-right">Nuevo--}}
                        {{--Proyecto</a>--}}
                </div>
            </div>
        </section>

    </div>

    <div class="modal fade " id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Nueva Encuesta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                    <form class="form-horizontal form">

                        <div class="form-group row">
                            <label for="0" class="col-sm-6 col-form-label">Nombre</label>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control " id="nomb_text" rows="3" ></textarea>
                        </div>

                    </form>


                </div>

                <div class="modal-footer">
                    <button type="button" class="boton2 btn" data-dismiss="modal">Atrás</button>
                    <button type="button" class="boton btn" id="addencuesta" data-dismiss="modal">Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade " id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Editar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                    <form class="form-horizontal form">

                        <div class="form-group row">
                            <input type="hidden" id="id">
                            <label for="0" class="col-sm-6 col-form-label" >Nombre</label>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" id="edit" rows="1"></textarea>
                        </div>
                    </form>


                </div>

                <div class="modal-footer">
                    <button type="button" class="boton2 btn" data-dismiss="modal">Atrás</button>
                    <button type="button" class="boton btn" id="editencuesta" data-dismiss="modal">Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade " id="infomodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Informacion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                    <form class="form-horizontal form">

                        <div class="form-group row">
                            <input type="hidden" id="id">
                            <label for="0" class="col-sm-6 col-form-label" >Nombre</label>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" id="info" rows="1" disabled></textarea>
                        </div>
                    </form>


                </div>

                <div class="modal-footer">
                    <button type="button" class="boton2 btn" data-dismiss="modal">Atrás</button>
                    {{--<button type="button" class="btn btn-primary" id="infoencuesta" data-dismiss="modal">Guardar</button>--}}
                </div>
            </div>
        </div>
    </div>

    <section>
        <div class="modal fade" id="Eliminare" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <form action="{{route('Eliminar3')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title">Eliminar</h1>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                        </div>
                        <div class="modal-body">
                            <label for="Titulo">Esta seguro de que quiere eliminar este programa</label>

                            <input type="hidden" id="eliminar" name="eliminar">
                        </div>
                        <div class="modal-footer">
                            <button type="submit"  class="boton btn">Si</button>
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
        var editClick;
        var addClick;
        var delClick;
        var editar;
        var info;
        var enc = {!! $encuesta !!} ;
        $(document).ready(function () {
            tablaDT = tabla.DataTable();


            info = function (p, i) {
//       alert(enc[i]);
                $("#id").val(p.id);
                $('#info').val(enc[i].nombre);
                $("#infomodal").modal('show');
            }

            eliminar = function (id) {
                $('#eliminar').val(id);
                $('#Eliminare').modal('show');
            }
            editar = function (p, i) {
//       alert(enc[i]);

                $("#id").val(p.id);
                $('#edit').val(enc[i].nombre);
                $("#editmodal").modal('show');
            }
            $('#editencuesta').click(function () {
                var id = $('#id').val();
                var nombre = $('#edit').val();


                $.ajax({
                    type: 'POST',
                    url: '/editencuesta',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: id,
                        nombre: nombre,

                    },

                    success: function (data) {
                        var id_encuesta = data.encuesta.id;
                        var nombre = data.encuesta.nombre;


// a
                        tablaDT.destroy();
                        $('#item_' + id_encuesta).replaceWith(
                            "<tr id='item_" + id_encuesta + "'>" +
                            ' <td >' + nombre + '</td>' +
                            ' <td >' +
                            '<button onclick="editar(' + id_encuesta + ')" class="boton btn"><i class="fa fa-edit"></i>  Editar</button> ' +




                            '<button onclick="eliminar(' + id_encuesta + ',' + nombre + ')" class="boton btn"><i class="fa fa-eraser"></i>  Eliminar</button>' +

                            '<button onclick="info()" class="boton btn"><i class="fa fa-info"></i>  Información</button>' +
//                            '<button onclick="info()" class="boton btn"><i class="fa fa-info"></i>   Añadir Pregunta</button>'
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

            $('#addencuesta').click(function (e) {
                e.preventDefault();
//                var ano = $('#ano').val();
                var nombre = $('#nomb_text').val();
//                var uf = $('#uf').val();
//                var mn = $('#mn').val();
//                var CondLegal = $('#exampleFormControlTextarea1').val();
//                var CondEducativa = $('#exampleFormControlTextarea2').val();
//                var CondMaterial = $('#presupuesto').val();





                $.ajax({
                    type: 'Post',
                    url: 'AddEncuesta',
                    data: {
//                        ano: ano,
                        nombre: nombre,
//                        uf: uf,
//                        mn: mn,
//                        CondLegal: CondLegal,
//                        CondEducativa: CondEducativa,
//                        CondMaterial: CondMaterial,
                        _token: '{{csrf_token()}}'
                    },
                    success: function (data) {
                        var nombre = data.enc.nombre;
                        var id = data.enc.id;

                        tablaDT.destroy();

                        tabla.append('<tr id="item_' + id + '">' +

                            ' <td >' + nombre + '</td>' +
                            ' <td >' +
                            '<button onclick="editar()" class="boton"><i class="fa fa-edit"></i>  Editar</button>' +

                            '<button onclick="eliminar()" class="boton"><i class="fa fa-eraser"></i>  Eliminar</button>' +

                            '<button onclick="info()" class="boton"><i class="fa fa-info"></i>  Informacion</button>' +
                            '</td>' +
                            //                          drop +
                            '</tr>');

                        tablaDT = tabla.DataTable();


                    }, error: function () {
                        alert('error')
                    }
                });
            });

        });


    </script>
@endsection