@extends('layouts.app')



@section('content')
    <br><br>
    <div class="container">
        <section class="tabla">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title"> Actividades del Programa:  "<strong>{{$proy->nomb_prog}}</strong>"</h1>
                </div>
                <div class="panel-body">
                    <table class="table  table-bordered" id="tabla">
                        <thead>
                        <th>Responsable</th>
                        <th>Actividad</th>
                        <th class="pull-right">Opciones</th>
                        </thead>
                        <tbody>
                        @foreach($metas as $m)
                            <tr id="item_{{$m->id}}">
                                <td id="id_{{$m->id}}">{{$m->responsable}}</td>
                                <td>{{$m->desc_unid_fisicas}}</td>

                                <td>
                                    {{--@if(  $privilegios->codigo_priv=='AA'&& $privilegios->accion_edit==true && $privilegios->id_user=@\Illuminate\Support\Facades\Auth::user()->id )

                                    <a href="/EditMeta/{{$m->id}}" class="boton btn"><i class="fa fa-edit"></i>  Editar</a>

                                     @endif

                                    @if(  $privilegios->codigo_priv=='AA'&& $privilegios->accion_elim==true && $privilegios->id_user=@\Illuminate\Support\Facades\Auth::user()->id )

                                    <button onclick="eliminar({{$m->id}})"class="boton btn"><i class="fa fa-eraser"></i>  Eliminar</button>
                                    @endif--}}
                                    {{--<button onclick="info({{$m->id}})" class="boton btn"><i class="fa fa-info"></i>  Información</button>--}}



                                        <div class="dropdown show pull-right">
                                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fa fa-cog fa-lg"></i><i class="caret"></i>
                                            </a>

                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                               {{-- @if(  $privilegios->codigo_priv=='AA'&& $privilegios->accion_edit==true && $privilegios->id_user=@\Illuminate\Support\Facades\Auth::user()->id )--}}
                                                    <a class="dropdown-item" href="/EditMeta/{{$m->id}}" id="mod"  >Editar</a>

                                               {{-- @endif--}}
                                                {{--@if(  $privilegios->codigo_priv=='AA'&& $privilegios->accion_elim==true && $privilegios->id_user=@\Illuminate\Support\Facades\Auth::user()->id )--}}
                                                    <a class="dropdown-item" href="#" onclick="eliminar({{$m->id}})"  id="anad"  >Eliminar</a>

                                                {{--@endif--}}

                                            </div>
                                        </div>


                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                </div>
                <div class="panel-footer">
                    {{--@if(  $privilegios->codigo_priv=='AA'&& $privilegios->accion_add==true && $privilegios->id_user=@\Illuminate\Support\Facades\Auth::user()->id )--}}
                    <a  href="/AddMeta/{{$proy->id}}" class="btn boton float-right">Añadir Actividad</a>
                   {{-- @endif--}}
                    <a type="button" class="boton2 btn float-right mr-2" href="/proyectos">Atrás</a>
                </div>
            </div>
        </section>

    </div>






    <section>
        <div class="modal fade" id="Eliminar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <form action="{{route('EliminarM')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h1 class="modal-title">Eliminar</h1>
                        </div>
                        <div class="modal-body">
                            <label for="Titulo">Está seguro de que quiere eliminar esta Actividad</label>

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

    {{--<section>--}}

        {{--<form  >--}}

            {{--<div class="modal fade" id="info" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">--}}
            {{----}}
            {{--<div class="container card">--}}
                {{--<div class="card-body">--}}
                    {{--<h3>Metas</h3>--}}

                    {{--<div class="form-group row ">--}}
                        {{--<label for="resp" class="col-sm-4 col-form-label">Responsable</label>--}}
                        {{--<div class="col-sm-5">--}}
                            {{--<input name="id" type="hidden" value="{{$metas->id}}" id="idPrograma" class="form-control">--}}
                            {{--<input name="responsable"  value="{{$metas->responsable}} " type="text" id="resp" class="form-control">--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="form-group row ">--}}
                        {{--<label for="pre" class="col-sm-4 col-form-label">Presupuesto</label>--}}
                        {{--<div class="col-sm-3">--}}
                            {{--<input name="presupuesto"  value="{{$metas->presupuesto}}" type="number" id="pre" class="form-control">--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="form-group row ">--}}
                        {{--<label for="uniF" class="col-sm-4 col-form-label">Descripción de Unidades Físicas</label>--}}
                        {{--<div class="col-sm-5">--}}
                            {{--<input name="descUnidadesFisicas"  value="{{$metas->desc_unid_fisicas}}" type="text" id="uniF" class="form-control">--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="form-group row ">--}}
                        {{--<label for="mn1" class="col-sm-4 col-form-label">Manifestaciones Numéricas</label>--}}
                        {{--<div class="col-sm-3">--}}
                            {{--<input name="manifNum" value="{{$metas->manif_num}}" type="number" id="mn1" class="form-control">--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="form-group row ">--}}
                        {{--<label for="uniFi" class="col-sm-4 col-form-label">Plan de Unidades Físicas</label>--}}
                        {{--<div class="col-sm-3">--}}
                            {{--<input name="planUF" value="{{$metas->unid_fisicas_plan}}"  type="number" id="uniFi" class="form-control">--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="form-group row ">--}}
                        {{--<label for="benp" class="col-sm-4 col-form-label">Beneficiarios del Plan</label>--}}
                        {{--<div class="col-sm-3">--}}
                            {{--<input name="beneficiosPlan" value="{{$metas->beneficiarios_plan}}" type="number" id="benp" class="form-control">--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="form-group row ">--}}
                        {{--<label for="uniFr" class="col-sm-4 col-form-label">Unidades Físicas Reales</label>--}}
                        {{--<div class="col-sm-3">--}}
                            {{--<input name="unidFisicasReales" value="{{$metas->unid_fisicas_real}}" type="number" id="uniFr" class="form-control">--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="form-group row ">--}}
                        {{--<label for="benr" class="col-sm-4 col-form-label">Beneficiarios Reales</label>--}}
                        {{--<div class="col-sm-3">--}}
                            {{--<input name="benefReales" value="{{$metas->beneficiarios_real}}" type="number" id="benr" class="form-control">--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="form-group row ">--}}
                        {{--<label for="uniFs" class="col-sm-4 col-form-label">Unidades Físicas Satif.</label>--}}
                        {{--<div class="col-sm-3">--}}
                            {{--<input name="ufSatif" value="{{$metas->unid_fisicas_satif}}" type="number" id="uniFs" class="form-control">--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="form-group row ">--}}
                        {{--<label for="bens" class="col-sm-4 col-form-label">Beneficiarios Satif.</label>--}}
                        {{--<div class="col-sm-3">--}}
                            {{--<input name="benSatif" value="{{$metas->beneficiarios_satif}}" type="number" id="bens" class="form-control">--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="form-group row ">--}}
                        {{--<label for="fecha" class="col-sm-4 col-form-label">Fecha de Cumplimiento</label>--}}
                        {{--<div class="col-sm-3">--}}
                            {{--<input name="fechaCumplimiento" value="{{$metas->fecha_cumplimiento}}" type="text" id="fecha" class="form-control">--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}

            {{--</div>--}}
            {{--<br><br>--}}
            {{--<div class="container">--}}
                {{--<button type="submit" class="btn boton float-right">Editar</button>--}}
                {{--<a type="button" class="btn btn-secondary float-right mr-2" href="/Meta/{{$metas->id_programa}}">Atrás</a>--}}

            {{--</div>--}}

        {{--</form>--}}
        {{----}}
    {{--</section>--}}

    <script>

        var tabla = $('#tabla');
        var tablaDT;

        var eliminar;
        var info;

        var editClick;
        var addClick;
        var delClick;
        $(document).ready(function () {
            tablaDT = tabla.DataTable();

            eliminar= function (id) {
                $('#eliminar').val(id)
                $('#Eliminar').modal('show')
            }

            info= function (id) {

                $('#info').modal('show')
            }

            if($(this).attr('type')=='number'){
                if($(this).val().trim() ===''){

                    alert('campo requrido');
                }

            }




        });
    </script>
@endsection