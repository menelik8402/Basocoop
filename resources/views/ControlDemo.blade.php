@extends('layouts.app')



@section('content')
    <br><br>
    <div class="container">
        <div class="alert alert-success" id="alerta" style="display: none" role="alert">
            Se añadió correctamente.
        </div>
        <section class="tabla">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title">Gestión democrática de los miembros </h1>
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
{{--
                                    @if(in_array ($a->id,$comportamiento)&& $privilegios->codigo_priv=='GD'&& $privilegios->accion_edit==true && $privilegios->id_user=@\Illuminate\Support\Facades\Auth::user()->id )
                                    <a href="#" onclick="add({{$a->id}})" id="mod" name="{{$a->id}}" class="boton btn"><i class="fa fa-edit"></i>
                                        Modificar</a>

                                    --}}
{{--<button onclick="eliminar()" class="boton btn"><i class="fa fa-eraser"></i>  Eliminar</button>--}}{{--


                                    <a href="/InfoControl/{{$a->id}}" class="boton btn"><i class="fa fa-info"></i> Información</a>
                                        @elseif($privilegios->codigo_priv=='GD'&& $privilegios->accion_add==true && $privilegios->id_user=@\Illuminate\Support\Facades\Auth::user()->id and in_array ($a->id,$comportamiento)==false )
                                        <a href="#" onclick="add({{$a->id}})" id="anad" name="{{$a->id}}" class="boton btn"><i class="fa fa-edit"></i>
                                            Añadir  </a>

                                        --}}
{{--<button onclick="eliminar()" class="boton btn"><i class="fa fa-eraser"></i>  Eliminar</button>--}}{{--


                                        <a href="#" disabled="true"  class="boton btn"><i class="fa fa-info"></i> Información</a>
                                        @endif
--}}


                                        <div class="dropdown show pull-right">
                                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fa fa-cog fa-lg"></i><i class="caret"></i>
                                            </a>

                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                @if(in_array ($a->id,$comportamiento))
                                                    <a class="dropdown-item" href="#" onclick="add({{$a->id}})" id="mod" name="{{$a->id}}" >Editar</a>
                                                    <a class="dropdown-item" href="/InfoControl/{{$a->id}}"  >Información</a>

                                                {{--@elseif(  $privilegios->codigo_priv=='GD'&& $privilegios->accion_add==true && $privilegios->id_user=@\Illuminate\Support\Facades\Auth::user()->id and in_array ($a->id,$comportamiento)==false  )--}}

                                                @else
                                                    <a class="dropdown-item" href="#" onclick="add({{$a->id}})"  id="anad"  name="{{$a->id}}"  >Añadir</a>
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

<form class="form-horizontal" form id="form-id">
    <div class="modal fade " id="modalControl" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm"  role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Gestión democrática de los Miembros </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#nombre" role="tab"
                               aria-controls="contact" aria-selected="true">Asambleas Generales de Asoc.</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " id="home-tab" data-toggle="tab" href="#home" role="tab"
                               aria-controls="home" aria-selected="false">Equidad de género en los niveles de dirección</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="nombre" role="tabpanel" aria-labelledby="home-tab">

                                <br>
                                <div class="form-group row justify-content-center">
                                    <h4>Asambleas Generales de  Asociados</h4>

                                </div>
                                <br>

                                <div class="card  col-sm-12">
                                    <div class="card-header">Comportamiento de las Asambleas Generales de
                                        Asociados</div>
                                    <div class="card-body ">

                                            <table border="0">

                                                <tr class="mx-1">
                                                    <td class="col-sm-1"><label for="programada">Programadas</label></td>
                                                    <td class="col-sm-3"><input type="number" id="0"  min="0" name="convocadas" class="form-control" required>
                                                    <div class="form-control-feedback text-danger" id="convocadast"></div></td>

                                                    <td class="col-sm-1"> <label for="realizada" >Realizadas</label></td>
                                                    <td class="col-sm-3"> <input type="number" id="1" min="0" name="efectuadas" class="form-control">
                                                    <div class="form-control-feedback text-danger" id="efectuadast"></div></td>

                                                    <td class="col-sm-1"> <label for="2"  >Extraordinarias</label></td>
                                                    <td class="col-sm-3"><input type="number" id="2" min="0" name="delegados" class="form-control">
                                                    <div class="form-control-feedback text-danger" id="delegadost"></div></td>



                                                </tr>
                                            </table>







                                    </div>
                                </div>


                                <div class="card  col-sm-12 mt-2">
                                    <div class="card-header">Estado de cumplimiento de los acuerdos de las Asambleas Generales de Asociados</div>
                                    <div class="card-body ">

                                        <table border="0">

                                            <tr class="mx-1">
                                                <td class="col-sm-1"><label for="cumplido" >Cumplidos</label></td>
                                                <td class="col-sm-3"><input type="number" id="cumplido" name="cumplido" min="0" class="form-control">
                                                <div class="form-control-feedback text-danger" id="cumplidot"></div></td>

                                                <td class="col-sm-1"><label for="1"  >En proceso de cumplimiento</label></td>
                                                <td class="col-sm-3">  <input type="number" id="proc_cump" min="0" name="proc_cump" class="form-control">
                                                <div class="form-control-feedback text-danger" id="proc_cumpt"></div></td>

                                            </tr>
                                        </table>




                                    </div>
                                </div>

                                <div class="card  col-sm-12 mt-2">
                                    <div class="card-header">Participación de los asociados en Asambleas Generales de Asociados</div>
                                    <div class="card-body ">

                                        <table border="0">

                                            <tr class="mx-1">
                                                <td class="col-sm-1"><label for="soc_conv" >Asociados convocados</label></td>
                                                <td class="col-sm-3"> <input type="number" id="soc_conv" name="soc_conv" min="0" class="form-control">
                                                <div class="form-control-feedback text-danger" id="soc_convt"></div></td>

                                                <td class="col-sm-1"><label for="1" >Asociados asistentes</label></td>
                                                <td class="col-sm-3">  <input type="number" id="soc_asist" name="soc_asist" min="0" class="form-control">
                                                <div class="form-control-feedback text-danger" id="soc_asistt"></div></td>

                                            </tr>
                                        </table>






                                    </div>
                                </div>



                               {{-- <div class="form-group row ">
                                    <label for="uf" class="col-sm-4 col-form-label">Asistieron</label>
                                    <div class="col-sm-5">
                                        <input type="number" id="3" min="0" class="form-control">
                                    </div>
                                </div>--}}


                        </div>

                        {{--*******ESTOS SON LOS IMPUTS OCULTOS*********--}}
                        <input type="hidden" id="idAnno">

                        <div class="tab-pane fade " id="home" role="tabpanel" aria-labelledby="home-tab">


                                <div class="form-group row justify-content-center">
                                    <h4>Equidad de género en los niveles de dirección</h4>

                                </div>
                                <div class="card  col-sm-12 mt-2">
                                    <div class="card-header">Equidad de género en los niveles de dirección</div>
                                    <div class="card-body ">
                                        <div class="form-inline">
                                            <div class="form-inline">

                                                <table border="0">

                                                    <tr class="mx-1">
                                                        <td class="col-sm-1"> <label for="hombres" >Hombres</label></td>
                                                        <td class="col-sm-3"> <input type="number" id="hombres" name="hombres" min="0" class="form-control">
                                                            <div class="form-control-feedback text-danger" id="hombrest"></div></td>

                                                        <td class="col-sm-1"><label for="mujeres" >Mujeres</label></td>
                                                        <td class="col-sm-3">  <input type="number" id="mujeres" name="mujeres" min="0" class="form-control">
                                                            <div class="form-control-feedback text-danger" id="mujerest"></div></td>

                                                    </tr>
                                                </table>



                                                <div class="col-sm-2">


                                                </div>
                                            </div>
                                            <div class="form-inline">

                                                <div class="col-sm-2">


                                                </div>
                                            </div>

                                        </div>


                                    </div>
                                </div>
                                {{--<table class="table table-bordered">
                                    <thead>
                                    <th>Organos de Dirección</th>
                                    <th>Planificadas</th>
                                    <th>Realizadas</th>
                                    </thead>
                                    <tbody>
                                    <tr>

                                        <div class="form-group row ">
                                           <td>
                                                <label for="uf" class="col-sm-10 col-form-label">Consejo de Administración</label>
                                           </td>
                                            <td>
                                                <div class="col-sm-10">
                                                    <input type="number"  id="adm" min="0" class="form-control">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="col-sm-10">
                                                    <input type="number" id="adm_real" min="0" value="0" class="form-control">
                                                </div>
                                            </td>

                                        </div>

                                    </tr>
                                    <tr>
                                        <div class="form-group row ">
                                            <td>
                                                <label for="uf" class="col-sm-10 col-form-label">Consejo Directivo</label>
                                            </td>
                                            <td>
                                                <div class="col-sm-10">
                                                    <input type="number" id="dir" min="0" class="form-control">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="col-sm-10">
                                                    <input type="number" id="dir_real" min="0" value="0" class="form-control">
                                                </div>
                                            </td>
                                        </div>
                                    </tr>
                                    <tr>
                                        <div class="form-group row ">

                                            <td>
                                                <label for="uf" class="col-sm-10 col-form-label">Comité de Educación</label>
                                            </td>
                                            <td>
                                                <div class="col-sm-10">
                                                    <input type="number" id="edu" min="0" class="form-control">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="col-sm-10">
                                                    <input type="number" id="edu_real" min="0" value="0" class="form-control">
                                                </div>
                                            </td>
                                        </div>
                                    </tr>
                                    <tr>


                                        <div class="form-group row ">
                                            <td>
                                                <label for="uf" class="col-sm-10 col-form-label">Comité de Vigilancia</label>
                                            </td>
                                            <td>
                                                <div class="col-sm-10">
                                                    <input type="number" id="vig" min="0"  class="form-control">
                                                </div>

                                            </td>
                                            <td>
                                                <div class="col-sm-10">
                                                    <input type="number" id="vig_real" value="0" min="0" class="form-control">
                                                </div>

                                            </td>
                                        </div>
                                    </tr>
                                    <tr>


                                        <div class="form-group row ">
                                            <td>
                                                <label for="uf" class="col-sm-10 col-form-label">Comité de Crédito</label>
                                            </td>
                                            <td>
                                            <div class="col-sm-10">
                                                <input type="number" id="cre" min="0"  class="form-control">
                                            </div>

                                            </td>
                                            <td>
                                                <div class="col-sm-10">
                                                    <input type="number" id="cre_real" value="0" min="0" class="form-control">
                                                </div>

                                            </td>
                                        </div>
                                    </tr>
                                  </tbody>
                                </table>--}}

                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="boton2 btn" id="salir" data-dismiss="modal">Atrás</button>
                    <button id="guardar" type="button" class="boton btn" >Guardar</button>
                </div>
            </div>
        </div>
    </div>
</form>

    <script>

        var tabla = $('#tabla');
        var tablaDT;

        var add;

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

            })

            //
            $('input').keypress(function(event) {

                if($(this).attr('type')!=key(event,'number')){
                    // alert('nos numb');
                    console.log('nob');
                }


            })



            function key(event,tipo) {
                //lista de teclas para los numeros
                array = new Array(48,49,50,51,52,53,54,55,56,57,27);

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

            //validar que los convocados sean mayor o igual que los efctuados
            $('#1').focusout(function () {
                if (parseInt($('#0').val())< parseInt($('#1').val()))
                {
                    alert('Error en la valor del campo Programadas no puede ser menor que el valor del campo Realizadas');
                    $('#1').val(0);
                    $('#0').val(0)
                }

            })

            //validar que los delegados sean mayor o igual que los efctuados
           /* $('#2').focusout(function () {
                if (parseInt($('#2').val())< parseInt($('#3').val()))
                {
                    alert('Error en la valor del campo delegados no puede ser menor que el valor del campo Asistieron');
                    $('#2').val(0);
                    $('#3').val(0)
                }

            })*/

                    //validando que las planificadas sean menor o igual que realizadas

            $('#adm_real').change(function () {
                //if(parseInt($('#adm_real').val())>parseInt($('#adm').val())){
                    //alert('te fuuistes porel');
                $('#adm_real').attr('max',parseInt($('#adm').val()));


            });
            tablaDT = tabla.DataTable();
            var accion=false;
            var $caa;
            var $part;
            var $eq;
            var $est;
            //var $crd;
            $('a').click(function (){


                    if($(this).attr('id')=='mod') {
                        var id_ano = parseInt($(this).attr('name'));
                        $.ajax({
                            type: 'GET',
                            url: '/controlDemo/'+ id_ano,
                            data: {
                                _token: '{{ csrf_token() }}',

                            },
                            success: function (data) {
                                $('#0').val(data.caa.convocadas);
                                $('#1').val(data.caa.efectuadas);
                                $('#2').val(data.caa.delegados);


                                //Participacion socio

                                $('#soc_conv').val(data.part.soc_conv);
                                $('#soc_asist').val(data.part.soc_asist);

                                //estado de cumplimiento
                                $('#cumplido').val(data.est.cumplido);
                                $('#proc_cump').val(data.est.proc_cump);

                                //equidad
                                $('#hombres').val(data.eq.hombres);
                                $('#mujeres').val(data.eq.mujeres);





                                /* $('#3').val(data.caa.asistieron);*/
/*
                                $('#adm').val(data.crd.consejo_administracion);
                                $('#adm_real').val(data.crd.consejo_administracion_real);
                                $('#dir').val(data.crd.consejo_directivo);
                                $('#dir_real').val(data.crd.consejo_directivo_real);
                                $('#edu').val(data.crd.comite_educacion);
                                $('#edu_real').val(data.crd.comite_educacion_real);
                                $('#vig').val(data.crd.comite_vigilancia);
                                $('#vig_real').val(data.crd.comite_vigilancia_real);
                                $('#cre').val(data.crd.comite_credito);
                                $('#cre_real').val(data.crd.comite_credito_real);*/


                                    $caa=data.caa.id;
                                    $est=data.est.id;
                                    $part=data.part.id;
                                    $eq=data.eq.id;
                                   // $crd=data.crd.id;

                                accion=true;


                            },
                            error: function () {
                                alert('Error al cargar los datos...')
                            }
                        });


                     }


                });




            add = function (a) {
                $('#form-id')[0].reset();
                $('#idAnno').val(a);
                $('#modalControl').modal('show');
            }

            $('#salir').click(function () {

                $('input').val('');
            });



            $('#guardar').click(function () {

                var Convocadas = $('#0').val();
                var Efectuadas = $('#1').val();
                var Delegados = $('#2').val();
               /* var Asistieron = $('#3').val();*/
                var idAnno = $('#idAnno').val();

                //Participacion socio
                var soc_conv = $('#soc_conv').val();
                var soc_asist= $('#soc_asist').val();

                //estado de cumplimiento
                var cumplido = $('#cumplido').val();
                var proc_cump= $('#proc_cump').val();

                //equidad
                var hombres = $('#hombres').val();
                var mujeres = $('#mujeres').val();

                /*var ConsejoAdmin = $('#adm').val();
                var ConsejoDirec = $('#dir').val();
                var ComiteEdu = $('#edu').val();
                var ComiteVigi = $('#vig').val();
                var ComiteCred = $('#cre').val();

                var ConsejoAdmin_real = $('#adm_real').val();
                var ConsejoDirec_real = $('#dir_real').val();
                var ComiteEdu_real = $('#edu_real').val();
                var ComiteVigi_real = $('#vig_real').val();
                var ComiteCred_real = $('#cre_real').val();
*/
                var url_real;

                if(accion==true) {

                    url_real = '/actControldemo/' + $caa + '/' + $est + '/' + $part + '/' + $eq ;
                    //alert(url_real);

                }

                else
                    url_real='/addControl';



                $.ajax({
                    type: 'POST',
                    url: url_real,
                    data: {
                        _token: '{{ csrf_token() }}',
                        id_ano: idAnno,
                        convocadas: Convocadas,
                        efectuadas: Efectuadas,
                        delegados: Delegados,
                        //Participacion socio
                        soc_conv : soc_conv,
                        soc_asist: soc_asist,

                        //estado de cumplimiento
                        cumplido : cumplido,
                        proc_cump: proc_cump,

                        //equidad
                        hombres : hombres,
                        mujeres : mujeres,


                       /* asistieron: Asistieron,*/

                       /* consejo_administracion: ConsejoAdmin,
                        consejo_directivo: ConsejoDirec,
                        comite_educacion: ComiteEdu,
                        comite_vigilancia: ComiteVigi,
                        comite_credito: ComiteCred,

                        consejo_administracion_real: ConsejoAdmin_real,
                        consejo_directivo_real: ConsejoDirec_real,
                        comite_educacion_real: ComiteEdu_real,
                        comite_vigilancia_real: ComiteVigi_real,
                        comite_credito_real: ComiteCred_real,*/

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

            $('#salir').click(function () {
                location.reload();

            });

        });

    </script>
@endsection