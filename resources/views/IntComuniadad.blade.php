@extends('layouts.app')


@section('content')
    <br><br>

    <div class="alert alert-success" id="alerta" style="display: none" role="alert">
        Se añadió correctamente
    </div>
    <div class="container">
        <section class="tabla">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title">Interés por la Cooperativa</h1>
                </div>
                <div class="panel-body">
                    <table class="table  table-bordered" id="tabla">
                        <thead>
                        <th>Años</th>
                        <th class="pull-right">Opciones</th>
                        </thead>
                        <tbody>
                        @foreach($ano as $i => $a)
                            <tr id="item_{{$a->id}}">
                                <td id="id_{{$a->id}}">{{$a->ano}}</td>

                                <td>
                                   {{-- @if(in_array ($a->id,$pe_ano)&& $privilegios->codigo_priv=='IC'&& $privilegios->accion_edit==true && $privilegios->id_user=@\Illuminate\Support\Facades\Auth::user()->id )
                                        <a href="#" onclick="añadir({{$a->id}})"   id="mod" name="{{$a->id}}" class="boton btn"><i class="fa fa-edit"></i>Modificar</a>

                                        --}}{{--<button onclick="eliminar()" class="boton btn"><i class="fa fa-eraser"></i>  Eliminar</button>--}}{{--

                                        <a href="/InfoIntCom/{{$a->id}}" class="boton btn"><i class="fa fa-info"></i> Información</a>

                                    @elseif( $privilegios->codigo_priv=='IC'&& $privilegios->accion_edit==true && $privilegios->id_user=@\Illuminate\Support\Facades\Auth::user()->id && in_array ($a->id,$pe_ano)==false)

                                        <a href="#" onclick="añadir({{$a->id}})"  id="anad"  class="boton btn"><i class="fa fa-edit"></i>Añadir</a>

                                        --}}{{--<button onclick="eliminar()" class="boton btn"><i class="fa fa-eraser"></i>  Eliminar</button>--}}{{--

                                        <a href="#" class="boton btn"><i class="fa fa-info"></i> Información</a>



                                    @endif
--}}



                                        <div class="dropdown show pull-right">
                                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fa fa-cog fa-lg"></i><i class="caret"></i>
                                            </a>

                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                {{--@if(in_array ($a->id,$pe_ano) &&  $privilegios->codigo_priv=='IC'&& $privilegios->accion_edit==true && $privilegios->id_user=@\Illuminate\Support\Facades\Auth::user()->id )--}}
                                                @if(in_array ($a->id,$pe_ano))
                                                    <a class="dropdown-item" href="#" onclick="añadir({{$a->id}})" id="mod" name="{{$a->id}}" >Editar</a>
                                                    <a class="dropdown-item" href="/InfoIntCom/{{$a->id}}"  >Información</a>

                                                {{--@elseif(  $privilegios->codigo_priv=='IC'&& $privilegios->accion_add==true && $privilegios->id_user=@\Illuminate\Support\Facades\Auth::user()->id && (in_array ($a->id,$pe_ano)==false) )--}}
                                                @else
                                                    <a class="dropdown-item" href="#" onclick="añadir({{$a->id}})"  id="anad"  name="{{$a->id}}"  >Añadir</a>
                                                    <a class="dropdown-item" href="#"   >Información</a>
                                                @endif

                                            </div>
                                        </div>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <input type="hidden" id="id_cooperativa" value="{{$id_cooperativa}}">
                    </table>
                </div>
                <div class="panel-footer">
                    {{--<a  href="/AddPrograma" class="btn boton pull-right">Nuevo Programa</a>--}}
                    {{--<a data-toggle="modal" data-target="#modal" href="#" class="btn btn-primary pull-right">Nuevo--}}
                    {{--Programa</a>--}}
                </div>
            </div>
        </section>

    </div>

    <div class="modal fade " id="modalPE" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Interés por la comunidad</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">


                            <br><br>
                            <form class="form-horizontal form">


                                <div class="form-group row ">
                                    <label for="nom" class="col-sm-4 col-form-label">Cantidad de actividades realizadas</label>
                                    <div class="col-sm-5">
                                        <input type="number" min="0" id="cant_act_real" name="cant_act_real" class="form-control">
                                        <div id="cant_act_realt" class="form-control-feedback text-danger" ></div>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label for="nom" class="col-sm-4 col-form-label">Cantidad de participantes en las actividades desarrolladas en la comunidad</label>
                                    <div class="col-sm-5">
                                        <input type="number" min="0" id="cant_part_act_desr_com" name="cant_part_act_desr_com" class="form-control">
                                        <div id="cant_part_act_desr_comt" class="form-control-feedback text-danger" ></div>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label for="nom" class="col-sm-4 col-form-label">Apoyo a instituciones comunitarias </label>
                                    <div class="col-sm-5">
                                        <input type="number" min="0" id="apoy_ints_comun" name="apoy_ints_comun" class="form-control">
                                        <div id="apoy_ints_comunt" class="form-control-feedback text-danger" ></div>
                                    </div>
                                </div>


                            </form>

                </div>

                <div class="modal-footer">
                    <button type="button" class="boton2 btn" id="salir" data-dismiss="modal">Atrás</button>
                    <button type="button" class="btn boton" id="add">Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <input type="hidden" id="idAnno" >





    <script>

        var tabla = $('#tabla');
        var tablaDT;
        var añadir ;
        var info;
        var editar;
        var accion=false;
        var id_com;

        {{--var eliminar;--}}
        {{--var info;--}}
        {{--var a = {!! $ano !!};--}}
        {{--var editClick;--}}
        {{--var addClick;--}}
        {{--var delClick;--}}
        $(document).ready(function () {

            //validacion
            //se verifica que en cada envnto focus de salida de los input no stn vacios
          /*  $('input').focusout(function () {
                // alert('cambio')


                if($(this).attr('type')=='number'){
                    if($(this).val().trim() ===''){

                        alert('campo requrido');
                    }

                }/!*
                 if($(this).attr('type')=='text'){
                 if($(this).val().trim()===''){
                 alert('campo requrido')
                 }
                 }*!/

            });

            //
            $('input').keypress(function(event) {

                if($(this).attr('type')!=key(event,'number')) {
                    // alert('nos numb');
                    console.log('nob');
                }


            });

            function key(event,tipo) {
                //lista de teclas para los numeros
                array = new Array(48,49,50,51,52,53,54,55,56,57);

                if(tipo=='number'){

                    for(i=0;i<array.length;i++) {
                        if (event.which == array[i]) {
                            return 'number'
                            //event.preventDefault();
                        }


                    }

                }

            }*/


            $('#salir').click(function () {

                $('input').val('');
            });


            tablaDT = tabla.DataTable();


            añadir= function (a) {
                $('#idAnno').val(a);
                $('#modalPE').modal('show');
            }

            $('a').click(function () {

                if ($(this).attr('id') == 'mod') {


                    var id_ano = parseInt($(this).attr('name'));
                    //alert(id_ano);

                    $.ajax({
                        type: 'GET',
                        url: '/VarVII/modCom/' + id_ano,
                        data: {
                            _token: '{{ csrf_token() }}',

                        },

                        success: function (data) {


                            $('#cant_act_real').val(data.comunidad.cant_act_real);
                            $('#cant_part_act_desr_com').val(data.comunidad.cant_part_act_desr_com);
                            $('#apoy_ints_comun').val(data.comunidad.apoy_ints_comun);

                            id_com = data.comunidad.id;

                            accion = true;


                        },
                        error: function () {
                            alert('Error en la conexión con la base de datos')
                        }


                    });
                }
            });

            $('#add').click(function () {
//                    alert('llegooo');

                var  cant_act_real =$('#cant_act_real').val();
                var cant_part_act_desr_com = $('#cant_part_act_desr_com').val();
                var apoy_ints_comun = $('#apoy_ints_comun').val();

                var idAnno = $('#idAnno').val();
                var id_cooperativa=$('#id_cooperativa').val();




                var url_real;

                if(accion==true)
                    url_real='/VarVII/actCom/' + id_com ;
                else
                    url_real='/VarVII/addCom';


                $.ajax({
                    type: 'POST',
                    url: url_real,
                    data: {
                        _token: '{{ csrf_token() }}',
                        id_ano: idAnno,
                        id_cooperativa : id_cooperativa,
                        cant_act_real : cant_act_real,
                        cant_part_act_desr_com   : cant_part_act_desr_com,
                        apoy_ints_comun :  apoy_ints_comun,


                    },
                    success: function (data) {
                        $('#alerta').fadeIn(1000);
                        $('#alerta').fadeOut(5000);
                        location.reload();

                    }, error: function (jqXHR) {
                        var arr=jQuery.parseJSON(jqXHR.responseText);

                        if(arr['errors']!=null) {
                            var claves =Object.keys(arr['errors']);
                            //console.log(claves);

                            $("input").attr('class','form-control');
                            $("div[class='form-control-feedback text-danger']").hide();

                            for(var miclave=0; miclave< claves.length;miclave++)
                            {
                                for(var i=0;i<  arr['errors'][claves[miclave]].length;i++  )
                                {
                                    $('#'+claves[miclave]+'t').show();

                                    // $('#'+claves[miclave]+'edit').text(arr['errors'][claves[miclave]][i]);
                                    $('#'+claves[miclave]+'t').text(arr['errors'][claves[miclave]][i]);
                                }

                                $("input[name='"+claves[miclave]+"']").attr('class','form-control border-danger');


                            }

                        }
                    }
                });
            });

            info=function (a,i) {

                $("#infoPE").modal('show');
            }
            $('#salir').click(function () {
                location.reload();
            });


        });
    </script>
@endsection