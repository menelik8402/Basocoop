@extends('layouts.app')

@section('content')
    <br><br>
    <div class="container">
        <section class="tabla">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title">Programas de Desarrollo Social</h1>
                    <div class="alert alert-info" id="alerta1" style="display: none" role="alert">
                    
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table  table-bordered" id="tabla">
                        <thead>
                        <th>Año</th>
                        <th>Nombre</th>
                        <th class="pull-right">Opciones</th>
                        </thead>
                        <tbody>
                        @foreach($proy as $i =>$p)

                            <tr id="item_{{$p->id}}">
                                <td id="id_{{$p->id}}"> {{$p->Ano->ano}} </td>
                                <td id="id_{{$p->id}}">{{$p->nomb_prog}}</td>

                                <td>
                                  {{--  @if(  $privilegios->codigo_priv=='GP'&& $privilegios->accion_edit==true && $privilegios->id_user=@\Illuminate\Support\Facades\Auth::user()->id )
                                    <a href="/EditPrograma/{{$p->id}}" class="boton btn"><i class="fa fa-edit"></i>
                                        Editar</a>
                                    @endif

                                        @if(  $privilegios->codigo_priv=='GP'&& $privilegios->accion_elim==true && $privilegios->id_user=@\Illuminate\Support\Facades\Auth::user()->id )

                                        <button onclick="eliminar({{$p->id}})" class="boton btn"><i
                                                class="fa fa-eraser"></i> Eliminar</button>
                                        @endif
                                        @if(  $privilegios->codigo_priv=='GP'&& $privilegios->accion_info==true && $privilegios->id_user=@\Illuminate\Support\Facades\Auth::user()->id )

                                        <button onclick="info('{{$i}}')" class="boton btn"><i class="fa fa-info"></i>
                                        Información
                                    </button>
                                        @endif
                                        @if(  $privilegios->codigo_priv=='GP'&& $privilegios->accion_add==true && $privilegios->id_user=@\Illuminate\Support\Facades\Auth::user()->id )

                                        <a href="/Meta/{{$p->id}}" class="boton btn"><i class="fa fa-check"></i> Actividades</a>
                                            @endif
--}}
                                    <div class="dropdown show pull-right">
                                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-cog fa-lg"></i><i class="caret"></i>
                                        </a>

                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        {{--    @if(  $privilegios->codigo_priv=='GP'&& $privilegios->accion_edit==true && $privilegios->id_user=@\Illuminate\Support\Facades\Auth::user()->id )--}}

                                                <a class="dropdown-item" href="/EditPrograma/{{$p->id}}" id="mod"  >Editar</a>
                                              {{-- @endif
                                                @if(  $privilegios->codigo_priv=='GP'&& $privilegios->accion_elim==true && $privilegios->id_user=@\Illuminate\Support\Facades\Auth::user()->id )--}}
                                                <a class="dropdown-item" onclick="eliminar({{$p->id}})"   id="anad"    >Eliminar</a>
                                               {{-- @endif
                                                @if(  $privilegios->codigo_priv=='GP'&& $privilegios->accion_info==true && $privilegios->id_user=@\Illuminate\Support\Facades\Auth::user()->id )
                                             --}}   <a class="dropdown-item" href="#"  onclick="info('{{$i}}')"  >Información</a>
                                                  {{--  @endif--}}
                                             {{--@if(  $privilegios->codigo_priv=='GP'&& $privilegios->accion_add==true && $privilegios->id_user=@\Illuminate\Support\Facades\Auth::user()->id )
--}}
                                                    <a class="dropdown-item" href="/Meta/{{$p->id}}" > Actividades</a>
                                                {{--@endif--}}



                                        </div>
                                    </div>


                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                </div>
                <br>
                <div class="panel-footer">
                  {{--  @if(  $privilegios->codigo_priv=='GP'&& $privilegios->accion_add==true && $privilegios->id_user=@\Illuminate\Support\Facades\Auth::user()->id )
--}}
                    <a href="/AddPrograma" class="btn boton pull-right">Nuevo Programa</a>
                   {{-- @endif--}}
                </div>
            </div>
        </section>

    </div>




    <div class="modal fade " id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Nuevo Programa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#nombre" role="tab"
                               aria-controls="contact" aria-selected="true">General</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " id="home-tab" data-toggle="tab" href="#home" role="tab"
                               aria-controls="home" aria-selected="false">Condiciòn Legal</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                               aria-controls="profile" aria-selected="false">Condiciòn Educativa</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                               aria-controls="contact" aria-selected="false">Condiciòn material</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="nombre" role="tabpanel" aria-labelledby="home-tab">
                            <form>
                                <br>
                                <div class="form-group row">
                                    <label for="exampleFormControlSelect1" class="col-sm-4 col-form-label">Año</label>
                                    <div class="col-sm-3">
                                        <select id="ano" class="form-control" id="exampleFormControlSelect1">
                                            @foreach($ano as $a)
                                                <option value="{{$a->id}}">{{$a->ano}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row ">
                                    <label for="nom" class="col-sm-4 col-form-label">Nombre</label>
                                    <div class="col-sm-5">
                                        <input type="text" id="nom" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label for="uf" class="col-sm-4 col-form-label">Unidades Físicas</label>
                                    <div class="col-sm-5">
                                        <input type="text" id="uf" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label for="mn" class="col-sm-4 col-form-label">Manifestaciones Numéricas</label>
                                    <div class="col-sm-3">
                                        <input type="number" id="mn" class="form-control">
                                    </div>
                                </div>


                            </form>
                        </div>
                        <div class="tab-pane fade " id="home" role="tabpanel" aria-labelledby="home-tab">
                            <form>
                                <br>
                                <div class="form-group">

                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>


                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <form>
                                <br>
                                <div class="form-group">

                                    <textarea class="form-control" id="exampleFormControlTextarea2" rows="3"></textarea>


                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <form>
                                <br>
                                <div class="form-group row">
                                    <label for="2" class="col-sm-4 col-form-label">Presupuesto del Proyecto</label>
                                    <div class="col-sm-3">
                                        <input type="number" id="presupuesto" class="form-control">
                                    </div>
                                </div>
                                {{--<div class="form-group col-12">--}}
                                {{--<label  for="1">Utilidades de la Cooperativa</label>--}}
                                {{--<input type="number" id="1" class="form-control mx-sm-1 float-right">--}}
                                {{--</div>--}}

                                {{--<div class="form-group col-12">--}}
                                {{--<label  for="3">Fondo de Educación</label>--}}
                                {{--<input type="number" id="3" class="form-control mx-sm-1 float-right">--}}
                                {{--</div>--}}
                                {{--<div class="form-group col-12">--}}
                                {{--<label  for="4">Otros Ingresos</label>--}}
                                {{--<input type="number" id="4" class="form-control mx-sm-1 float-right">--}}
                                {{--</div>--}}
                                {{--<div class="form-group col-12">--}}
                                {{--<label  for="5">Mercadeo</label>--}}
                                {{--<input type="number" id="5" class="form-control mx-sm-1 float-right ">--}}
                                {{--</div>--}}
                                {{--<div class="form-group col-12">--}}
                                {{--<label  for="6">Comité de género</label>--}}
                                {{--<input type="number" id="6" class="form-control mx-sm-1 float-right">--}}
                                {{--<br>--}}
                                {{--</div>--}}
                            </form>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="boton2 btn" data-dismiss="modal">Close</button>
                    <button id="AddProyecto" type="button" class="btn boton" data-dismiss="modal">Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <section>
        <div class="modal fade" id="Eliminar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <form action="{{route('Eliminar')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="modal-dialog  modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h1 class="modal-title">Eliminar</h1>
                        </div>
                        <div class="modal-body">
                            <label for="Titulo">Está seguro de que quiere eliminar este programa</label>

                            <input type="hidden" id="eliminar" name="eliminar">
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

    <section>
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
                        <div class="container">
                            <form action="">
                                <div class="form-group row ">
                                    <label class="col-sm-4 col-form-label">Año</label>
                                    <div class="col-sm-5">


                                        <input type="text" id="info0" class="form-control" disabled>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label for="nom" class="col-sm-4 col-form-label">Nombre</label>
                                    <div class="col-sm-5">
                                        <input name="id" hidden id="nomid" class="form-control">

                                        <input type="text" id="info1" class="form-control" disabled>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label for="obj" class="col-sm-4 col-form-label">Objetivo</label>
                                    <div class="col-sm-5">
                                        <input type="text" id="info2" class="form-control" disabled>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label for="met" class="col-sm-4 col-form-label">Metodología</label>
                                    <div class="col-sm-5">
                                        <input type="text" id="info3" class="form-control" disabled>
                                    </div>
                                </div>

                                <div class="form-group row ">
                                    <label for="pres" class="col-sm-4 col-form-label">Presupuesto</label>
                                    <div class="col-sm-3">
                                        <input type="number" id="info4" class="form-control" disabled>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="boton2 btn" data-dismiss="modal">Cerrar</button>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>

        var tabla = $('#tabla');
        var tablaDT;

        var eliminar;
        var info;
        var a = {!! $ano !!};
        var editClick;
        var addClick;
        var delClick;
        $(document).ready(function () {
            tablaDT = tabla.DataTable();

            eliminar = function (id) {
                $('#eliminar').val(id);
                $('#Eliminar').modal('show');
            }


            info = function (i) {
// alert(a[1].id);
                for (f = 0; f < a.length; f++) {
                    if (({!! $proy !!}[i].id_ano) == a[f].id) {
                        $('#info0').val(a[f].ano);
                    }
                }

                {{--$('#info0').val({!! $proy !!}[i].id_ano);--}}
                $('#info1').val({!! $proy !!}[i].nomb_prog);
                $('#info2').val({!! $proy !!}[i].objetivo);
                $('#info3').val({!! $proy !!}[i].metodologia);
                $('#info4').val({!! $proy !!}[i].presupuesto_prog);

                $('#infoModal').modal('show');
            }



            {{--$('#AddProyecto').click(function (e) {--}}
            {{--e.preventDefault();--}}
            {{--var ano = $('#ano').val();--}}
            {{--var nombre = $('#nom').val();--}}
            {{--var uf = $('#uf').val();--}}
            {{--var mn = $('#mn').val();--}}
            {{--var CondLegal = $('#exampleFormControlTextarea1').val();--}}
            {{--var CondEducativa = $('#exampleFormControlTextarea2').val();--}}
            {{--var CondMaterial = $('#presupuesto').val();--}}

            {{--$.ajax({--}}
            {{--type: 'Post',--}}
            {{--url: 'AddProyecto',--}}
            {{--data: {--}}
            {{--ano: ano,--}}
            {{--nombre: nombre,--}}
            {{--uf: uf,--}}
            {{--mn: mn,--}}
            {{--CondLegal: CondLegal,--}}
            {{--CondEducativa: CondEducativa,--}}
            {{--CondMaterial: CondMaterial,--}}
            {{--_token: '{{csrf_token()}}'--}}
            {{--},--}}
            {{--success: function (data) {--}}
            {{--var nombre = data.proy.nombre;--}}
            {{--var id = data.proy.id;--}}

            {{--tablaDT.destroy();--}}

            {{--tabla.append('<tr id="item_' + id + '">' +--}}

            {{--' <td >' + nombre + '</td>' +--}}
            {{--' <td >' +--}}
            {{--'<button onclick="editar()" class="btn btn-warning btn-sm">Editar</button>' +--}}

            {{--'<button onclick="eliminar()" class="btn btn-danger btn-sm">Eliminar</button>' +--}}

            {{--'<button onclick="info()" class="btn btn-default btn-sm">Información</button>' +--}}
            {{--'</td>' +--}}
            {{--//                          drop +--}}
            {{--'</tr>');--}}

            {{--tablaDT = tabla.DataTable();--}}
            {{--}, error: function () {--}}
            {{--alert('error')--}}
            {{--}--}}
            {{--})--}}
            {{--})--}}



            var fecha=new Date();

         
       

                    $.ajax({
                                type: 'GET',
                                url: '/DispPresup/' + {!! $ano !!}[0].id + '/' + {!! $proy !!}[0].id_cooperativa,
                                data: {
                                    _token: '{{ csrf_token() }}',

                                },

                                success: function (data) {
                                    var presup = data.presup;
                                     if({!! $ano !!}[0].ano==fecha.getFullYear() ){
                                            if(presup>0){
                                                
                                               //alert("Usted posee un presupuesto que asciende a "+presup +" que pertenece al año "+fecha.getFullYear());
                                                        $('#alerta1').text('Usted posee un presupuesto que asciende a '+presup +' que pertenece al año '+fecha.getFullYear());
                                                        $('#alerta1').fadeIn(1000);
                                            }
                                            else
                                            {
                                                $('#alerta1').text("Usted ha consumido todo el presupuesto para el año "+ fecha.getFullYear());
                                                $('#alerta1').fadeIn(1000);
                                            }
                                     }
                                     else
                                     {
                                               $('#alerta1').text("Usted no tiene presupuesto asignado para el año actual");
                                                $('#alerta1').fadeIn(1000);
                                     }    


                                }, error: function () {
                                    alert('Error intentando buscar el presupuesto actual');
                                }
                            });



        });
       
   

    </script>
@endsection