@extends('layouts.app')

@section('content')


    <br><br>
    <div class="container">
        <section class="tabla">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title">{{$nombre}}</h1>
                </div>
                <div class="panel-body">
                    <table class="table  table-bordered" id="tabla">
                        <thead>
                        <th>Año</th>
                        <th class="pull-right">Opciones</th>
                        </thead>
                        <tbody>
                        @foreach($ano as $i => $a) 
                            <tr id="item_{{$a->id}}">
                                <td id="id_{{$a->id}}">{{$a->ano}}</td>

                                <td>
                                    <div class="dropdown show pull-right">
                                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-cog fa-lg"></i><i class="caret"></i>
                                        </a>

                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                         {{--   @if(  $privilegios->codigo_priv=='CM'&& $privilegios->accion_edit==true && $privilegios->id_user=@\Illuminate\Support\Facades\Auth::user()->id )
                                         --}}       <a class="dropdown-item" href="#" onclick="editar({{$a}},'{{$i}}')" >Editar</a>
                                           {{-- @endif
                                            @if(  $privilegios->codigo_priv=='CM'&& $privilegios->accion_elim==true && $privilegios->id_user=@\Illuminate\Support\Facades\Auth::user()->id )
                                           --}}     <a class="dropdown-item" href="#" onclick="eliminar({{$a->id}},'{{$a->ano}}')"  >Eliminar</a>
                                            {{--@endif
                                            @if(  $privilegios->codigo_priv=='CM'&& $privilegios->accion_inf==true && $privilegios->id_user=@\Illuminate\Support\Facades\Auth::user()->id )
                                            --}}    <a class="dropdown-item" href="#"  onclick="info({{$a}},'{{$i}}')" >Información</a>
                                           {{-- @endif--}}
                                        </div>
                                    </div>


                                  {{--  @if(  $privilegios->codigo_priv=='CM'&& $privilegios->accion_edit==true && $privilegios->id_user=@\Illuminate\Support\Facades\Auth::user()->id )

                                    <a href="#" onclick="editar({{$a}},'{{$i}}')" class="boton btn"><i class="fa fa-edit"></i>  Editar</a>
                                    @endif
                                    @if(  $privilegios->codigo_priv=='CM'&& $privilegios->accion_elim==true && $privilegios->id_user=@\Illuminate\Support\Facades\Auth::user()->id )

                                    <button onclick="eliminar({{$a->id}},'{{$a->ano}}')" class="boton btn"><i class="fa fa-eraser"></i>  Eliminar</button>
                                    @endif
                                    @if(  $privilegios->codigo_priv=='CM'&& $privilegios->accion_inf==true && $privilegios->id_user=@\Illuminate\Support\Facades\Auth::user()->id )

                                        <button onclick="info({{$a}},'{{$i}}')" class="boton btn"><i class="fa fa-info"></i>  Información</button>
                                    @endif--}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                </div>
                <div class="panel-footer">
                   {{-- <a data-toggle="modal" href="#myModal" class="btn btn-primary pull-right">Nuevo Proyecto</a>--}}
                    {{--@if(  $privilegios->codigo_priv=='CM'&& $privilegios->accion_add==true && $privilegios->id_user=@\Illuminate\Support\Facades\Auth::user()->id )

                  --}}
                {{--    @if($desabilitar_new==false)--}}
                    <a data-toggle="modal" data-target="#modal" href="#" class="btn-sm boton pull-right mt-1"><i class="fa fa-plus"></i> Nuevo

                    </a>
                        {{--@endif--}}
                </div>
            </div>
        </section>

    </div>

    <div class="modal fade " id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                   aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Premisa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="formulario-tab" data-toggle="tab" href="#formulario" role="tab"
                               aria-controls="contact" aria-selected="true">Condición material</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " id="legal-tab" data-toggle="tab" href="#legal-t" role="tab"
                               aria-controls="home" aria-selected="false">Condición legal</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="educ-tab" data-toggle="tab" href="#educ-t" role="tab"
                               aria-controls="profile" aria-selected="false">Condición educativa</a>
                        </li>

                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="formulario" role="tabpanel" aria-labelledby="home-tab">
                            <form class="form-horizontal form" id="insertar-form">

                                <br>
                                <div class="form-group row">
                                    <label for="0" class="col-sm-6 col-form-label">Año</label>
                                    <div class="col-sm-5">
                                       <select id="0" class="form-control">
                                            @for($a=2019;$a<=date("Y");$a++)


                                                    @if($ano_simple->contains($a)==false)
                                                    <option value="{{$a}}">{{$a}}</option>


                                                    @endif

                                            @endfor
                                        </select>

                                       {{-- <input type="number" id="0" name="0" value="{{date("Y")}}" class="form-control" readonly>--}}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="1" class="col-sm-6 col-form-label">Excedentes de la cooperativa</label>
                                    <div class="col-sm-5">
                                        <input type="number" min="0"  id="1" name="utilidades" value="0" step="any" class="form-control @if($errors->has('utilcoop')) border-danger @endif">
                                        <div id="utilidades" class="form-control-feedback text-danger"></div>
                                    </div>


                                </div>

                                <div class="form-group row">
                                    <label for="2" class="col-sm-6 col-form-label">% a utilizar para la Reseva Educativa</label>
                                    <div class="col-sm-5">
                                       {{-- <input type="number" min="0" max="10" id="2" value="0" class="form-control">--}}
                                        <select id="2" class="form-control">
                                            @for($a=0;$a<=15;$a++)
                                                <option value="{{$a}}">{{$a}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="3" class="col-sm-6 col-form-label">Reserva Educativa</label>
                                    <div class="col-sm-5">
                                        <input type="number" min="0" id="3" value="0" step="any" class="form-control" readonly>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="5" class="col-sm-6 col-form-label">Mercadeo</label>
                                    <div class="col-sm-5">
                                        <input type="number" min="0" id="5" name="mercadeo" value="0" step="any" class="form-control">
                                        <div id="mercadeo" class="form-control-feedback text-danger"></div>
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <label for="6" class="col-sm-6 col-form-label">Comité de género</label>
                                    <div class="col-sm-5">
                                        <input type="number" min="0" id="6" value="0" step="any"  name="cmte_genero"  class="form-control">
                                        <div id="cmte_genero" class="form-control-feedback text-danger" ></div>
                                    </div>


                                    <br>
                                </div>
                                <div class=" form-group row">
                                    <label for="4" class="col-sm-6 col-form-label">Otros ingresos</label>
                                    <div class="col-sm-5">
                                        <input type="number" min="0" id="4" value="0" name="otrosI" step="any" class="form-control @if($errors->has('otrosing')) border-danger @endif">
                                        <div id="otrosI" class="form-control-feedback text-danger" ></div>
                                    </div>

                                </div>
                                <div class=" form-group row">
                                    <label for="4" class="col-sm-6 col-form-label">Presupuesto total</label>
                                    <div class="col-sm-5">
                                        <input type="number"  id="total_presup" class="form-control" readonly >

                                    </div>

                                </div>

                            </form>
                        </div>
                        <div class="tab-pane fade " id="legal-t" role="tabpanel" aria-labelledby="home-tab">
                            <form>
                                <br>
                                <div class="form-group">

                                    <textarea class="form-control " id="legaltext"  name="legal"  rows="14">{{$ult_premisa->cond_legal}}</textarea>


                                </div>
                                <div id="educ" class="form-control-feedback text-danger" ></div>
                            </form>
                        </div>
                        <div class="tab-pane fade " id="educ-t" role="tabpanel" aria-labelledby="home-tab">
                            <form>
                                <br>
                                <div class="form-group">

                                    <textarea class="form-control " id="eductext" name="educ" rows="14">{{$ult_premisa->cond_educativa}}</textarea>

                                </div>
                                <div id="educ" class="form-control-feedback text-danger" ></div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="boton2 btn" id="cerrar4" data-dismiss="modal">Atrás</button>
                    <button type="button" class="boton btn" id="addCM" >Guardar</button>
                </div>
            </div>
        </div>
    </div>
    {{--//-----------------------------------------------------------------------}}

    <div class="modal fade " id="editarModal" tabindex="-1" role="dialog"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Editar condición material</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="formulario-tab" data-toggle="tab" href="#editformulario" role="tab"
                               aria-controls="contact" aria-selected="true">Condición material</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " id="legal-tab" data-toggle="tab" href="#editlegal" role="tab"
                               aria-controls="home" aria-selected="false">Condición legal</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="educ-tab" data-toggle="tab" href="#editeduc" role="tab"
                               aria-controls="profile" aria-selected="false">Condición educativa</a>
                        </li>

                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="editformulario" role="tabpanel" aria-labelledby="home-tab">
                            <form class="form-horizontal form" id="editar-form">
                                <input type="hidden" id="id" >
                                <br>
                                <div class="form-group row">
                                    <label for="0" class="col-sm-6 col-form-label">Año</label>
                                    <div class="col-sm-5">
                                        <input type="number" min="0" id="edit0" readonly class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="1" class="col-sm-6 col-form-label">Excedentes de la cooperativa</label>
                                    <div class="col-sm-5">
                                        <input type="number" min="0" id="edit1" name="utilidades" step="any" class="form-control">
                                    </div>
                                    <div id="utilidadesedit" class="form-control-feedback text-danger"></div>
                                </div>

                                {{--<div class="form-group row">
                                    <label for="2" class="col-sm-6 col-form-label">% a utilizar para la Reseva Educativa</label>
                                    <div class="col-sm-5">
                                        <input type="number" min="0" max="10" id="edit2" class="form-control">
                                    </div>
                                </div>--}}
                                <div class="form-group row">
                                    <label for="2" class="col-sm-6 col-form-label">% a utilizar para la Reseva Educativa</label>
                                    <div class="col-sm-5">
                                        {{-- <input type="number" min="0" max="10" id="2" value="0" class="form-control">--}}
                                        <select id="edit2" class="form-control">
                                            @for($a=0;$a<=15;$a++)
                                                <option value="{{$a}}">{{$a}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="3" class="col-sm-6 col-form-label">Reserva Educativa</label>
                                    <div class="col-sm-5">
                                        <input type="number" min="0" id="edit3"  class="form-control" readonly>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="5" class="col-sm-6 col-form-label">Mercadeo</label>
                                    <div class="col-sm-5">
                                        <input type="number" min="0" id="edit5" step="any" name="mercadeo" class="form-control">
                                        <div id="mercadeoedit" class="form-control-feedback text-danger"></div>
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <label for="6" class="col-sm-6 col-form-label">Comité de género</label>
                                    <div class="col-sm-5">
                                        <input type="number" min="0" id="edit6" name="cmte_genero"  step="any" class="form-control">
                                        <div id="cmte_generoedit" class="form-control-feedback text-danger" ></div>
                                    </div>

                                    <br>
                                </div>
                                <div class=" form-group row">
                                    <label for="4" class="col-sm-6 col-form-label">Otros ingresos</label>
                                    <div class="col-sm-5">
                                        <input type="number" min="0" id="edit4" name="otrosI" step="any"  class="form-control">
                                        <div id="otrosIedit" class="form-control-feedback text-danger" ></div>
                                    </div>

                                </div>

                                <div class=" form-group row">
                                    <label for="4" class="col-sm-6 col-form-label"> Presupuesto aprobado</label>
                                    <div class="col-sm-5">
                                        <input type="number" id="total_pre" name="total_pre" step="any" readonly class="form-control">

                                    </div>

                                </div>
                                <div class=" form-group row">
                                    <label for="4" class="col-sm-6 col-form-label"> Recursos Disponibles</label>
                                    <div class="col-sm-5">
                                        <input type="number" id="actual_pre" name="actual_pre" step="any" readonly class="form-control">

                                    </div>

                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade " id="editlegal" role="tabpanel" aria-labelledby="home-tab">
                            <form>
                                <br>
                                <div class="form-group">

                                    <textarea class="form-control " id="editlegaltext" name="legal" rows="14"></textarea>

                                </div>
                                <div id="legaledit" class="form-control-feedback text-danger" ></div>
                            </form>
                        </div>
                        <div class="tab-pane fade " id="editeduc" role="tabpanel" aria-labelledby="home-tab">
                            <form>
                                <br>
                                <div class="form-group">

                                    <textarea class="form-control" id="editeductext" name="educ" rows="14"></textarea>


                                </div>
                                <div id="educedit" class="form-control-feedback text-danger" ></div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="boton2 btn" id="cerrar3" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="boton btn" id="editCM" >Editar</button>
                </div>
            </div>
        </div>
    </div>


    {{--//-----------------------------------------------------------------------}}

    <div class="modal fade " id="deleteModal" tabindex="-1" role="dialog"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Eliminar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id_delete" >
                    <p> Desea eliminar las premisas del año <span id="anodelete"></span>  </p>

                </div>
                <div class="modal-footer">
                    <button type="button" class="boton2 btn" id="cerrar1" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="boton btn" id="deleteCM" data-dismiss="modal">Eliminar</button>
                </div>
            </div>
        </div>
    </div>
    {{----------------------------------------------------------------------------------------}}

    <div class="modal fade " id="infoModal" tabindex="-1" role="dialog"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Información</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="formulario-tab" data-toggle="tab" href="#infoformulario" role="tab"
                               aria-controls="contact" aria-selected="true">Condición material</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " id="legal-tab" data-toggle="tab" href="#infolegal" role="tab"
                               aria-controls="home" aria-selected="false">Condición legal</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="educ-tab" data-toggle="tab" href="#infoeduc" role="tab"
                               aria-controls="profile" aria-selected="false">Condición educativa</a>
                        </li>

                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="infoformulario" role="tabpanel" aria-labelledby="home-tab">
                            <form class="form-horizontal form">
                                <input type="hidden" id="id" >
                                <br>
                                <div class="form-group row">
                                    <label for="0" class="col-sm-6 col-form-label">Año</label>
                                    <div class="col-sm-5">
                                        <input type="number" min="0" id="info0" class="form-control" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="1" class="col-sm-6 col-form-label">Excedentes de la cooperativa</label>
                                    <div class="col-sm-5">
                                        <input type="number" min="0" id="info1" class="form-control" disabled>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="2" class="col-sm-6 col-form-label">% a utilizar para la Reseva Educativa</label>
                                    <div class="col-sm-5">
                                        <input type="number" min="0" id="info2" class="form-control" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="3" class="col-sm-6 col-form-label">Reserva Educativa</label>
                                    <div class="col-sm-5">
                                        <input type="number" min="0" id="info3" class="form-control" disabled>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="5" class="col-sm-6 col-form-label">Mercadeo</label>
                                    <div class="col-sm-5">
                                        <input type="number" min="0" id="info5" class="form-control" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="6" class="col-sm-6 col-form-label">Comité de género</label>
                                    <div class="col-sm-5">
                                        <input type="number" min="0" id="info6" class="form-control" disabled>
                                    </div>

                                </div>
                                <div class=" form-group row">
                                    <label for="4" class="col-sm-6 col-form-label">Otros ingresos</label>
                                    <div class="col-sm-5">
                                        <input type="number" min="0" id="info4" class="form-control" disabled>
                                    </div>
                                    <br>
                                </div>

                            </form>
                        </div>
                        <div class="tab-pane fade " id="infolegal" role="tabpanel" aria-labelledby="home-tab">
                            <form>
                                <br>
                                <div class="form-group">

                                    <textarea class="form-control"   id="infolegaltext" rows="14" disabled></textarea>


                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade " id="infoeduc" role="tabpanel" aria-labelledby="home-tab">
                            <form>
                                <br>
                                <div class="form-group">

                                    <textarea class="form-control " id="infoeductext" rows="14" disabled></textarea>


                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="boton2 btn" id="cerrar" data-dismiss="modal">Cerrar</button>

                </div>
            </div>
        </div>
    </div>

    {{-----------------------------------------------------------------------------------------------}}
    <script type="text/javascript">
        var tabla = $('#tabla');
        var tablaDT;

        var editar;
        var eliminar;
        var elim;
        var info;
        var sum_prog=0;
        $(document).ready(function () {
            tablaDT = tabla.DataTable();


//calculando el valor de la reserva educativa
            $('#2').click(function () {
                var porciento=$('#2').val();
                var utiledades=$('#1').val();
               /* //var aux = Math.round10();
                var aux =Math.round10(parseFloat(porciento*utiledades/100),-1); 
                alert('paso');   */
                $('#3').val(porciento*utiledades/100);

                $('#total_presup').val(parseFloat($('#3').val()) +parseFloat($('#4').val()) +parseFloat($('#5').val()) +parseFloat($('#6').val()));


            });

            $('#edit2').click(function () {
                var porciento=$('#edit2').val();
                var utiledades=$('#edit1').val();
                $('#edit3').val(porciento*utiledades/100);

                $('#total_pre').val(parseFloat($('#edit3').val()) +parseFloat($('#edit4').val()) +parseFloat($('#edit5').val()) +parseFloat($('#edit6').val()));

            });

            $('#addCM').click(function () {

                var ano = $('#0').val();
                var utilidades = $('#1').val();
                var porciento = $('#2').val();
                var fondo = $('#3').val();
                var otrosI = $('#4').val();
                var mercadeo = $('#5').val();
                var comiteG = $('#6').val();
                var legal = $('#legaltext').val();
                var educ = $('#eductext').val();

                $.ajax({
                    type: 'POST',
                    url: '/addCondMat',
                    data: {
                        _token: '{{ csrf_token() }}',
                        ano: ano,
                        utilidades: utilidades,
                        presupuesto_coop: porciento,
                        fondo_educacion: fondo,
                        otrosI: otrosI,
                        mercadeo: mercadeo,
                        cmte_genero: comiteG,
                        legal:legal,
                        educ:educ,
                    },

                    success: function (data) {
                        var id_ano = data.ano.id;
                        var ano = data.ano.ano;

                        location.reload();
                    },
                    error: function (jqXHR ) {

                        var arr=jQuery.parseJSON(jqXHR.responseText);

                        if(arr['errors']!=null) {
                            var claves =Object.keys(arr['errors']);

                            $("input").attr('class','form-control');
                            $("div[class='form-control-feedback text-danger']").hide();

                            for(var miclave=0; miclave< claves.length;miclave++)
                            {
                                for(var i=0;i<  arr['errors'][claves[miclave]].length;i++  )
                                {
                                    $('#'+claves[miclave]).show();

                                    $('#'+claves[miclave]).text(arr['errors'][claves[miclave]][i]);
                                }

                                $("input[name='"+claves[miclave]+"']").attr('class','form-control border-danger');


                            }

                        }



                    }
                });
            });


            editar=function (a,i) {

                $.ajax({
                    type: 'get',
                    url: '/buscacondmat/' + a.id,
                    data: {
                        _token: '{{ csrf_token() }}',

                    },

                    success: function (data) {
                         sum_prog=data.sum_prog;
                        ///
                        $("#id").val(a.id);
                        $('#edit0').val(a.ano);
                        $('#edit1').val(data.cm.utilidades);
                        $('#edit2').val(data.cm.presupuesto_coop);
                        $('#edit3').val(data.cm.fondo_educacion);
                        $('#edit4').val(data.cm.otros_ingresos);
                        $('#edit5').val(data.cm.mercadeo);
                        $('#edit6').val(data.cm.cmte_genero);
                        $('#editlegaltext').val(data.pre.cond_legal);
                        $('#editeductext').val(data.pre.cond_educativa);

                        $('#total_pre').val(parseFloat($('#edit3').val()) +parseFloat($('#edit4').val()) +parseFloat($('#edit5').val()) +parseFloat($('#edit6').val()));

                        $("#editarModal").modal('show');


                    }, error: function () {
                        alert('Ha ocurrido un error al cargar los datos. Contacte con el administrador del sistema.')
                    }
                });
               // alert('/DispPresup/' + a.ano + '/' + {!! $pre !!}[0].id_cooperativa);


                $.ajax({
                       type: 'GET',
                       url: '/DispPresup/' + a.id + '/' + {!! $pre !!}[0].id_cooperativa,
                       data: {
                           _token: '{{ csrf_token() }}',

                       },

                       success: function (data) {
                           var presup = data.presup;
                           $('#actual_pre').val(presup);
                           $('#actual_pre').attr('max', presup);
                           $('#actual_pre').attr('readonly', false)


                       }, error: function () {
                           alert('Error intentando buscar el presupuesto actual');
                       }
                   });



            }

            $('#editCM').click(function () {

                var id=$('#id').val();
                var ano = $('#edit0').val();
                var utilidades = $('#edit1').val();
                var porciento = $('#edit2').val();
                var fondo = $('#edit3').val();
                var otrosI = $('#edit4').val();
                var mercadeo = $('#edit5').val();
                var comiteG = $('#edit6').val();
                var legal = $('#editlegaltext').val();
                var educ = $('#editeductext').val();




                var sum_cm= (parseInt(utilidades) * parseInt(porciento)/100) + parseInt(fondo) + parseInt(otrosI) + parseInt(mercadeo) ;
           //  alert(sum_prog)
             //  alert(sum_cm)

               // if(parseInt(sum_prog) <= parseInt(sum_cm))
                {
                   // alert(sum_prog);
                    $.ajax({

                        type: 'POST',
                        url: '/editCondMat/' +id,
                        data: {
                            _token: '{{ csrf_token() }}',
                         //   id: id,
                            ano: ano,
                            utilidades: utilidades,
                            presupuesto_coop: porciento,
                            fondo_educacion: fondo,
                            otrosI: otrosI,
                            mercadeo: mercadeo,
                            cmte_genero: comiteG,
                            legal: legal,
                            educ: educ,
                        },

                        success: function (data) {
                            var id_ano = data.ano.id;
                            var ano = data.ano.ano;

                         //   $('input').val('');

                           location.reload()

//                            tablaDT.destroy();
//                            $('#item_' + id_ano).replaceWith(
//                                "<tr id='item_" + id_ano + "'>" +
//                                ' <td >' + ano + '</td>' +
//                                ' <td >' +
//                                '<button onclick="editar(' + id_ano + ')" class="boton btn"><i class="fa fa-edit"></i>  Editar</button> ' +
//
//
//                                '<button onclick="eliminar(' + id_ano + ',' + ano + ')" class="boton btn"><i class="fa fa-eraser"></i>  Eliminar</button>' +
//
//                                '<button onclick="info()" class="boton btn"><i class="fa fa-info"></i>  Información</button>' +
//                                '</td>' +
//
//                                '</tr>');
//
//                            tablaDT = tabla.DataTable();
//                            var defaultColor = $('#item_' + id_ano).css('color');
//                            $('#item_' + id_ano)
//                                .css('opacity', '0.20').css('color', 'orange').animate({opacity: 1}, 500).animate({opacity: 0.20}, 500).animate({opacity: 1}, 500)
//                                .animate({opacity: 0.20}, 500).animate({opacity: 1}, 500, function () {
//                                $('#item_' + id_ano).css('color', defaultColor);
//                            });
                           // setTimeout();

                        },
                        error: function (jqXHR ) {

                            var arr=jQuery.parseJSON(jqXHR.responseText);
                               // alert(jqXHR.responseText);
                            if(arr['errors']!=null) {
                                var claves =Object.keys(arr['errors']);
                                //console.log(claves);

                               $("input").attr('class','form-control');
                               $("div[class='form-control-feedback text-danger']").hide();

                                for(var miclave=0; miclave< claves.length;miclave++)
                                {
                                    for(var i=0;i<  arr['errors'][claves[miclave]].length;i++  )
                                    {
                                        $('#'+claves[miclave]+'edit').show();

                                        $('#'+claves[miclave]+'edit').text(arr['errors'][claves[miclave]][i]);
                                    }

                                    $("input[name='"+claves[miclave]+"']").attr('class','form-control border-danger');


                                }

                            }



                        }
                    });
                     //location.reload();
                }
               // else
                {
                   // alert('El presupuesto para este año no alcanza para los programas establecidos');
                }


            });




               $('input').focusout(function () {
                   $('#total_pre').val(parseFloat($('#edit3').val()) +parseFloat($('#edit4').val()) +parseFloat($('#edit5').val()) +parseFloat($('#edit6').val()));

                   $('#total_presup').val(parseFloat($('#3').val()) +parseFloat($('#4').val()) +parseFloat($('#5').val()) +parseFloat($('#6').val()));



               });





            eliminar=function (id,ano) {
                $("#id_delete").val(id);
                $("#anodelete").html(ano)
                $("#deleteModal").modal('show')

            }

            $('#deleteCM').click(function () {
                var id=$('#id_delete').val();


                $.ajax({
                    type: 'POST',
                    url: '/deleteCondMat',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id:id,

                    },

                    success: function (data) {
                        var id_ano = data.id;




                        var defaultColor = $('#item_'+id_ano).css('color');
                        $('#item_'+id_ano)
                            .css('opacity', '0.20').css('color', 'red').animate({opacity: 1}, 500).animate({opacity: 0.20}, 500).animate({opacity: 1}, 500)
                            .animate({opacity: 0.20}, 500).animate({opacity: 1}, 500, function () {
                            $('#item_'+id_ano).css('color', defaultColor);
                        });

                        elim=    function () {
                            tablaDT.destroy();

                            $('#item_' + id_ano ).remove();

                            tablaDT = tabla.DataTable();
                            };
                        setTimeout(elim,3000);

//

                    }, error: function () {
                        alert('error')
                    }
                });
                //location.reload();
            });

            info=function (a,i) {
    {{--$('#info0').val(a.ano)--}}
    {{--$('#info1').val({!! $cm !!}[i].utilidades)--}}
    {{--$('#info2').val({!! $cm !!}[i].presupuesto_coop)--}}
    {{--$('#info3').val({!! $cm !!}[i].fondo_educacion)--}}
    {{--$('#info4').val({!! $cm !!}[i].otros_ingresos)--}}
    {{--$('#info5').val({!! $cm !!}[i].mercadeo)--}}
    {{--$('#info6').val({!! $cm !!}[i].cmte_genero)--}}
    {{--$('#infolegaltext').val({!! $pre !!}[i].cond_legal)--}}
    {{--$('#infoeductext').val({!! $pre !!}[i].cond_educativa)--}}
    {{--alert({!! $pre !!}[i].cond_legal)--}}


       $.ajax({
        type: 'get',
        url: '/buscacondmat/' + a.id,
        data: {
            _token: '{{ csrf_token() }}',

        },

        success: function (data) {
            sum_prog=data.sum_prog;
            ///
            //$("#id").val(a.id);
            $('#info0').val(a.ano);
            $('#info1').val(data.cm.utilidades);
            $('#info2').val(data.cm.presupuesto_coop);
            $('#info3').val(data.cm.fondo_educacion);
            $('#info4').val(data.cm.otros_ingresos);
            $('#info5').val(data.cm.mercadeo);
            $('#info6').val(data.cm.cmte_genero);
            $('#infolegaltext').val(data.pre.cond_legal);
            $('#infoeductext').val(data.pre.cond_educativa);
            $("#infoModal").modal('show');

        }, error: function () {
            alert('error')
        }
    });

}


            $('#cerrar').click(function () {
    //location.reload();
});
            $('#cerrar1').click(function () {
               // location.reload();

            });
            $('#cerrar3').click(function () {

                //location.reload();
                $('#editar-form')[0].reset();
            });
            $('#cerrar4').click(function () {
                $('#insertar-form')[0].reset();

              //  location.reload();
            });

         /*   $(window).bind('beforeunload',function () {
                alert('dd')
               // return false;
            });*/

/*
            $('#formulario').close(function () {
                alert('ss');
            });*/

        });
    </script>
@endsection