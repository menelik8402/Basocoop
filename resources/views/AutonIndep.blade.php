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
                    <h1 class="panel-title">Autonomía e independencia</h1>
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
                                   {{-- @if(in_array ($a->id,$pe_ano)&& $privilegios->codigo_priv=='AI'&& $privilegios->accion_edit==true && $privilegios->id_user=@\Illuminate\Support\Facades\Auth::user()->id )
                                        <a href="#" onclick="añadir({{$a->id}})"   id="mod" name="{{$a->id}}" class="boton btn"><i class="fa fa-edit"></i>Modificar</a>

                                        --}}{{--<button onclick="eliminar()" class="boton btn"><i class="fa fa-eraser"></i>  Eliminar</button>--}}{{--

                                        <a href="/InfoAutonom/{{$a->id}}" class="boton btn"><i class="fa fa-info"></i> Información</a>

                                    @elseif( $privilegios->codigo_priv=='AI'&& $privilegios->accion_edit==true && $privilegios->id_user=@\Illuminate\Support\Facades\Auth::user()->id )

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
                                              {{--  @if(in_array ($a->id,$pe_ano) &&  $privilegios->codigo_priv=='AI'&& $privilegios->accion_edit==true && $privilegios->id_user=@\Illuminate\Support\Facades\Auth::user()->id )
                                               --}}
                                                @if(in_array ($a->id,$pe_ano))
                                                    <a class="dropdown-item" href="#" onclick="añadir({{$a->id}})" id="mod" name="{{$a->id}}" >Editar</a>
                                                    <a class="dropdown-item" href="/InfoAutonom/{{$a->id}}"  >Información</a>

                                                {{--@elseif(  $privilegios->codigo_priv=='AI'&& $privilegios->accion_add==true && $privilegios->id_user=@\Illuminate\Support\Facades\Auth::user()->id )--}}
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
                    <h5 class="modal-title" id="exampleModalLongTitle">Autonomía e independencia</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                    <form class="form-horizontal form">


                        <div class="form-group row ">
                            <label for="nom" class="col-sm-4 col-form-label">Capital propio</label>
                            <div class="col-sm-5">
                                <input type="number" min="0" id="capital_prop" name="capital_prop" class="form-control">
                                <div id="capital_propt" class="form-control-feedback text-danger" ></div>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label for="nom" class="col-sm-4 col-form-label">Capital externo</label>
                            <div class="col-sm-5">
                                <input type="number" min="0" id="capital_ext" name="capital_ext" class="form-control">
                                <div id="capital_extt" class="form-control-feedback text-danger" ></div>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label for="nom" class="col-sm-4 col-form-label">Acuerdos cumplidos con capital propio</label>
                            <div class="col-sm-5">
                                <input type="number" min="0" id="acu_cump_cap_prop" name="acu_cump_cap_prop" class="form-control">
                                <div id="acu_cump_cap_propt" class="form-control-feedback text-danger" ></div>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label for="nom" class="col-sm-4 col-form-label">Acuerdos cumplidos con capital externo</label>
                            <div class="col-sm-5">
                                <input type="number" min="0" id="acu_cump_cap_ext" name="acu_cump_cap_ext" class="form-control">
                                <div id="acu_cump_cap_extt" class="form-control-feedback text-danger" ></div>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label for="nom" class="col-sm-4 col-form-label">Acuerdos adoptados por iniciativa propia</label>
                            <div class="col-sm-5">
                                <input type="number" min="0" id="acu_cump_ini_prop" name="acu_cump_ini_prop" class="form-control">
                                <div id="acu_cump_ini_propt" class="form-control-feedback text-danger" ></div>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label for="nom" class="col-sm-4 col-form-label">Acuerdos adoptados por injerencia externa</label>
                            <div class="col-sm-5">
                                <input type="number" min="0" id="acu_cump_inj_ext" name="acu_cump_inj_ext" class="form-control">
                                <div id="acu_cump_inj_extt" class="form-control-feedback text-danger" ></div>
                            </div>
                        </div>

                    </form>


                </div>

                <div class="modal-footer">
                    <button type="button" class="boton2 btn" id="salir" data-dismiss="modal">Atrás</button>
                    <button type="button" class="btn boton" id="add" >Guardar</button>
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
        var id_aut;
        {{--var eliminar;--}}
        {{--var info;--}}
        {{--var a = {!! $ano !!};--}}
        {{--var editClick;--}}
        {{--var addClick;--}}
        {{--var delClick;--}}
        $(document).ready(function () {

            //validacion
            //se verifica que en cada envnto focus de salida de los input no stn vacios
    /*        $('input').focusout(function () {
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
                        url: '/VarIV/modAI/' + id_ano,
                        data: {
                            _token: '{{ csrf_token() }}',

                        },

                        success: function (data) {
                           $('#capital_prop').val(data.autind.capital_prop);
                           $('#capital_ext').val(data.autind.capital_ext);
                           $('#acu_cump_cap_prop').val(data.autind.acu_cump_cap_prop);
                           $('#acu_cump_cap_ext').val(data.autind.acu_cump_cap_ext);
                           $('#acu_cump_ini_prop').val(data.autind.acu_cump_ini_prop);
                           $('#acu_cump_inj_ext').val(data.autind.acu_cump_cap_ext);

                            id_aut = data.autind.id;
                            accion = true;


                        },
                        error: function () {
                            alert('Error al cargar los datos...')
                        }


                    });
                }
            });

            $('#add').click(function () {
//                    alert('llegooo');

                var capital_prop = $('#capital_prop').val();
                var  capital_ext = $('#capital_ext').val();
                var  acu_cump_cap_prop = $('#acu_cump_cap_prop').val();
                var  acu_cump_cap_ext = $('#acu_cump_cap_ext').val();
                var  acu_cump_ini_prop = $('#acu_cump_ini_prop').val();
                var  acu_cump_inj_ext = $('#acu_cump_inj_ext').val();
                var idAnno = $('#idAnno').val();




                var url_real;

                if(accion==true)
                    url_real='/VarIV/actAutIndp/' + id_aut;
                else
                    url_real='/VarIV/addAutIndp';


                $.ajax({
                    type: 'POST',
                    url: url_real,
                    data: {
                        _token: '{{ csrf_token() }}',
                               id_ano: idAnno,
                        capital_prop : capital_prop,
                         capital_ext : capital_ext,
                   acu_cump_cap_prop : acu_cump_cap_prop,
                    acu_cump_cap_ext : acu_cump_cap_ext,
                   acu_cump_ini_prop : acu_cump_ini_prop,
                    acu_cump_inj_ext : acu_cump_inj_ext


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