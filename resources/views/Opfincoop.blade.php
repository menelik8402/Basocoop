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
                    <h1 class="panel-title">Cooperación entre cooperativas</h1>
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
                                    {{--@if(in_array ($a->id,$pe_ano)&& $privilegios->codigo_priv=='CC'&& $privilegios->accion_edit==true && $privilegios->id_user=@\Illuminate\Support\Facades\Auth::user()->id )
                                        <a href="#" onclick="añadir({{$a->id}},{{$id_cooperativa}})"   id="mod" name="{{$a->id}}" class="boton btn"><i class="fa fa-edit"></i>Modificar</a>

                                        --}}{{--<button onclick="eliminar()" class="boton btn"><i class="fa fa-eraser"></i>  Eliminar</button>--}}{{--

                                        <a href="/InfoCoopCoop/{{$a->id}}" class="boton btn"><i class="fa fa-info"></i> Información</a>

                                    @elseif( $privilegios->codigo_priv=='CC'&& $privilegios->accion_edit==true && $privilegios->id_user=@\Illuminate\Support\Facades\Auth::user()->id && in_array ($a->id,$pe_ano)==false  )

                                        <a href="#" onclick="añadir({{$a->id}},{{$id_cooperativa}})"  id="anad"  class="boton btn"><i class="fa fa-edit"></i>Añadir</a>

                                        --}}{{--<button onclick="eliminar()" class="boton btn"><i class="fa fa-eraser"></i>  Eliminar</button>--}}{{--

                                        <a href="#" class="boton btn"><i class="fa fa-info"></i> Información</a>



                                    @endif
--}}
                                        <div class="dropdown show pull-right">
                                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fa fa-cog fa-lg"></i><i class="caret"></i>
                                            </a>

                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                              {{--  @if(in_array ($a->id,$pe_ano) &&  $privilegios->codigo_priv=='CC'&& $privilegios->accion_edit==true && $privilegios->id_user=@\Illuminate\Support\Facades\Auth::user()->id )
                                               --}}
                                                @if(in_array ($a->id,$pe_ano))
                                                <a class="dropdown-item" href="#" onclick="añadir({{$a->id}},{{$id_cooperativa}})"  id="mod" name="{{$a->id}}" >Editar</a>
                                                 <a class="dropdown-item" href="/InfoCoopCoop/{{$a->id}}"  >Información</a>

                                                {{--@elseif(  $privilegios->codigo_priv=='CC'&& $privilegios->accion_add==true && $privilegios->id_user=@\Illuminate\Support\Facades\Auth::user()->id && (in_array ($a->id,$pe_ano)==false) )--}}
                                                @else
                                                    <a class="dropdown-item" href="#" onclick="añadir({{$a->id}},{{$id_cooperativa}})" id="anad"  name="{{$a->id}}"  >Añadir</a>
                                                    <a class="dropdown-item" href="#"   >Información</a>

                                                @endif
                                            </div>
                                        </div>



                                </td>
                            </tr>
                        @endforeach
                        </tbody>


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
                    <h5 class="modal-title" id="exampleModalLongTitle">Operaciones financieras entre coopeativas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="opfinc-tab" data-toggle="tab" href="#opfinc" role="tab"
                               aria-controls="contact" aria-selected="true">Operaciones financieras entre cooperativas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " id="intcoop-tab" data-toggle="tab" href="#intcoop" role="tab"
                               aria-controls="contact" aria-selected="true">Integración cooperativa</a>
                        </li>

                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="opfinc" role="tabpanel" aria-labelledby="home-tab">
                            <br><br>
                            <form class="form-horizontal form">


                        <div class="form-group row ">
                            <label for="nom" class="col-sm-4 col-form-label">Cantidad de operaciones de la Red Activa</label>
                            <div class="col-sm-5">
                                <input type="number" min="0" id="cant_oper_red_act" name="cant_oper_red_act" class="form-control">
                                <div id="cant_oper_red_actt" class="form-control-feedback text-danger"></div>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label for="nom" class="col-sm-4 col-form-label">Usuarios de la Red Activa</label>
                            <div class="col-sm-5">
                                <input type="number" min="0" id="usuario_red_act" name="usuario_red_act" class="form-control">
                                <div id="usuario_red_actt" class="form-control-feedback text-danger"></div>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label for="nom" class="col-sm-4 col-form-label">Puntos de servicios de la Red Activa</label>
                            <div class="col-sm-5">
                                <input type="number" min="0" id="pto_serv_red_act" name="pto_serv_red_act" class="form-control">
                                <div id="pto_serv_red_actt" class="form-control-feedback text-danger"></div>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label for="nom" class="col-sm-4 col-form-label">Cantidad de operaciones de cajeros automáticos</label>
                            <div class="col-sm-5">
                                <input type="number" min="0" id="cant_oper_caj_aut" name="cant_oper_caj_aut" class="form-control">
                                <div id="cant_oper_caj_autt" class="form-control-feedback text-danger"></div>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label for="nom" class="col-sm-4 col-form-label">Usuarios de cajeros automáticos </label>
                            <div class="col-sm-5">
                                <input type="number" min="0" id="usuario_caj_aut" name="usuario_caj_aut" class="form-control">
                                <div id="usuario_caj_autt" class="form-control-feedback text-danger"></div>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label for="nom" class="col-sm-4 col-form-label">Punto de servicios de cajeros automáticos</label>
                            <div class="col-sm-5">
                                <input type="number" min="0" id="pto_serv_caj_aut" name="pto_serv_caj_aut" class="form-control">
                                <div id="pto_serv_caj_autt" class="form-control-feedback text-danger"></div>
                            </div>
                        </div>

                    </form>
                        </div>
                        <div class="tab-pane fade " id="intcoop" role="tabpanel" aria-labelledby="home-tab">
                            <br><br>
                            <form class="form-horizontal form">


                                <div class="form-group row ">
                                    <label for="nom" class="col-sm-4 col-form-label">Cantidad de asociados que participan en asambleas de otras cooperativas</label>
                                    <div class="col-sm-5">
                                        <input type="number" min="0" id="cant_asoc_part_asamb_coop" name="cant_asoc_part_asamb_coop" class="form-control">
                                        <div id="cant_asoc_part_asamb_coopt" class="form-control-feedback text-danger"></div>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label for="nom" class="col-sm-4 col-form-label">Cantidad de alianzas estratégicas institucionales</label>
                                    <div class="col-sm-5">
                                        <input type="number" min="0" id="cant_ali_est_inst" name="cant_ali_est_inst" class="form-control">
                                        <div id="cant_ali_est_instt" class="form-control-feedback text-danger"></div>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label for="nom" class="col-sm-4 col-form-label">Cantidad de alianzas estratégicas interinstitucionales</label>
                                    <div class="col-sm-5">
                                        <input type="number" min="0" id="cant_ali_est_interinst" name="cant_ali_est_interinst" class="form-control">
                                        <div id="cant_ali_est_interinstt" class="form-control-feedback text-danger"></div>

                                    </div>
                                </div>

                            </form>

                        </div>


                        </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="boton2 btn" id="salir" data-dismiss="modal">Atrás</button>
                    <button type="button" class="btn boton" id="add" >Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <input type="hidden" id="idAnno" >
    <input type="hidden" id="id_cooperativa" >





    <script>

        var tabla = $('#tabla');
        var tablaDT;
        var añadir ;
        var info;
        var editar;
        var accion=false;
        var id_cc;
        var id_ccint;
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

            }

*/
            $('#salir').click(function () {

                $('input').val('');
            });


            tablaDT = tabla.DataTable();


            añadir= function (a,c) {

                $('#idAnno').val(a);
                $('#id_cooperativa').val(c);
                $('#modalPE').modal('show');
            }

            $('a').click(function () {

                if ($(this).attr('id') == 'mod') {


                    var id_ano = parseInt($(this).attr('name'));
                    //alert(id_ano);

                    $.ajax({
                        type: 'GET',
                        url: '/VarVI/modCC/' + id_ano,
                        data: {
                            _token: '{{ csrf_token() }}',

                        },

                        success: function (data) {
                            $('#cant_oper_red_act').val(data.opefin.cant_oper_red_act);
                            $('#usuario_red_act').val(data.opefin.usuario_red_act);
                            $('#pto_serv_red_act').val(data.opefin.pto_serv_red_act);
                            $('#cant_oper_caj_aut').val(data.opefin.cant_oper_caj_aut);
                            $('#usuario_caj_aut').val(data.opefin.usuario_caj_aut);
                            $('#pto_serv_caj_aut').val(data.opefin.pto_serv_caj_aut);

                            $('#cant_asoc_part_asamb_coop').val(data.intercoop.cant_asoc_part_asamb_coop);
                            $('#cant_ali_est_inst').val(data.intercoop.cant_ali_est_inst);
                            $('#cant_ali_est_interinst').val(data.intercoop.cant_ali_est_interinst);

                            id_cc = data.opefin.id;
                            id_ccint = data.intercoop.id
                            accion = true;


                        },
                        error: function () {
                            alert('Error de conexión.')
                        }


                    });
                }
            });

            $('#add').click(function () {
//                    alert('llegooo');

                var cant_oper_red_act =$('#cant_oper_red_act').val();
                var usuario_red_act =$('#usuario_red_act').val();
                var pto_serv_red_act  =$('#pto_serv_red_act').val();
                var cant_oper_caj_aut =$('#cant_oper_caj_aut').val();
                var usuario_caj_aut   =$('#usuario_caj_aut').val();
                var pto_serv_caj_aut  =$('#pto_serv_caj_aut').val();

                var  cant_asoc_part_asamb_coop =$('#cant_asoc_part_asamb_coop').val();
                var cant_ali_est_inst = $('#cant_ali_est_inst').val();
                var cant_ali_est_interinst = $('#cant_ali_est_interinst').val();

                var idAnno = $('#idAnno').val();
                var id_cooperativa=$('#id_cooperativa').val();




                var url_real;

                if(accion==true)
                    url_real='/VarVI/actOpF/' + id_cc + '/' + id_ccint;
                else
                    url_real='/VarVI/addOpF';


                $.ajax({
                    type: 'POST',
                    url: url_real,
                    data: {
                        _token: '{{ csrf_token() }}',
                        id_ano: idAnno,
                        id_cooperativa : id_cooperativa,
                        cant_oper_red_act : cant_oper_red_act,
                        usuario_red_act   : usuario_red_act,
                         pto_serv_red_act :  pto_serv_red_act,
                        cant_oper_caj_aut :  cant_oper_caj_aut,
                        usuario_caj_aut   :  usuario_caj_aut,
                         pto_serv_caj_aut :  pto_serv_caj_aut,

                        cant_asoc_part_asamb_coop :cant_asoc_part_asamb_coop,
                        cant_ali_est_inst : cant_ali_est_inst,
                        cant_ali_est_interinst : cant_ali_est_interinst,


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