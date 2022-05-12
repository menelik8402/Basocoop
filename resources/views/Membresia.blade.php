@extends('layouts.app')

@section('content')
    <br><br>

    <div class="container">
        <div class="alert alert-success" id="alerta" style="display: none" role="alert">
            Se añadió correctamente
        </div>

        <section class="tabla">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title">Membresía abierta y voluntaria</h1>
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


                               {{--     @if(in_array ($a->id,$cant_asoc) && $privilegios->codigo_priv=='AD'&& $privilegios->accion_edit==true && $privilegios->id_user=@\Illuminate\Support\Facades\Auth::user()->id )
                                        <a href="#" onclick="añadir({{$a->id}})" id="mod" name="{{$a->id}}" class="boton btn"><i class="fa fa-edit"></i>
                                            Modificar</a>

                                        --}}{{--<button onclick="eliminar()" class="boton btn"><i class="fa fa-eraser"></i>  Eliminar</button>--}}{{--

                                        <a href="/InfoMemb/{{$a->id}}" class="boton btn"><i class="fa fa-info"></i> Información</a>

                                    @elseif($privilegios->codigo_priv=='AD'&& $privilegios->accion_add==true && $privilegios->id_user=@\Illuminate\Support\Facades\Auth::user()->id and in_array ($a->id,$cant_asoc)==false)
                                        <a href="#" onclick="añadir({{$a->id}})" id="anad"  name="{{$a->id}}" class="boton btn"><i class="fa fa-edit"></i>
                                            Añadir</a>

                                        --}}{{--<button onclick="eliminar()" class="boton btn"><i class="fa fa-eraser"></i>  Eliminar</button>--}}{{--

                                        <a href="#" class="boton btn" disabled="false"><i class="fa fa-info"></i>  Información
                                        </a>
                                    @endif
--}}


                                        <div class="dropdown show pull-right">
                                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fa fa-cog fa-lg"></i><i class="caret"></i>
                                            </a>

                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                @if(in_array ($a->id,$cant_asoc) /*&&  $privilegios->codigo_priv=='AD'&& $privilegios->accion_edit==true && $privilegios->id_user=@\Illuminate\Support\Facades\Auth::user()->id*/ )
                                                    <a class="dropdown-item" href="#" onclick="añadir({{$a->id}})" id="mod" name="{{$a->id}}" >Editar</a>
                                                    <a class="dropdown-item" href="/InfoMemb/{{$a->id}}"  >Información</a>

                                               {{--@elseif(  $privilegios->codigo_priv=='AD'&& $privilegios->accion_add==true && $privilegios->id_user=@\Illuminate\Support\Facades\Auth::user()->id )--}}
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


<form class="form-horizontal form" id="form-membrresia">

    <div class="modal fade " id="modalMemb" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered  modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Membresía abierta y voluntaria </h5>
                    <button type="button" class="close" data-dismiss="modal" id="cerrar" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#nombre" role="tab"
                               aria-controls="contact" aria-selected="true">Comp gen de los asoc</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " id="home-tab" data-toggle="tab" href="#home" role="tab"
                               aria-controls="home" aria-selected="false">Incorp. y baj de asoc.</a>
                        </li>
                        {{-- <li class="nav-item">
                             <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                aria-controls="profile" aria-selected="false">Niv Educ de Asoc</a>
                         </li>--}}
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#lala" role="tab"
                               aria-controls="contact" aria-selected="false">Nivel educ de asoc</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="categoria-tab" data-toggle="tab" href="#categoria" role="tab"
                               aria-controls="contact" aria-selected="false">Categorias y solicitudes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="empleados-tab" data-toggle="tab" href="#empleados" role="tab"
                               aria-controls="contact" aria-selected="false">Composición general de los empleados</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="nombre" role="tabpanel" aria-labelledby="home-tab">

                                <br>
                                <div class="form-group row justify-content-center">
                                    <h4>Composición general de los asociados</h4>

                                </div>


                                <div class="form-group row ">

                                    <div  id="total_asoct" class="form-control-feedback text-danger" >   </div>
                                    <div  id="total_est_civilt" class="form-control-feedback text-danger" >   </div>
                                    <div  id="total_comp_edadt" class="form-control-feedback text-danger" >   </div>
                                    <BR>
                                    <div class="card mx-4 mt-1  col-sm-11">
                                        <div class="card-header">Cantidad de asociados </div>
                                        <div class="card-body ">
                                            <div class="form-inline">

                                               <table border="0">

                                                   <tr class="mx-1">
                                                       <td class="col-sm-1"> <label for="hombres" >Hombres:</label></td>
                                                       <td class="col-sm-3"><input type="number" id="0" min="0" name="hombres" class="form-control"   required>
                                                       <div class="form-control-feedback text-danger" id="hombrest"></div></td>

                                                       <td class="col-sm-1"><label for="mujeres" >Mujeres: </label></td>
                                                       <td class="col-sm-3"> <input type="number" id="1" min="0" name="mujeres" class="form-control" required>
                                                       <div class="form-control-feedback text-danger" id="mujerest"></div></td>



                                                   </tr>
                                                   <tr class="mx-1">
                                                       <td class="col-sm-1"><label for="hom_act" >Hombres activos:</label></td>
                                                       <td class="col-sm-3"><input type="number" id="hom_act" min="0" name="hom_act" class="form-control" required>
                                                       <div class="form-control-feedback text-danger" id="hom_actt"></div></td>

                                                       <td class="col-sm-1"> <label for="muj_act" > Mujeres activos:</label></td>
                                                       <td class="col-sm-3"><input type="number" id="muj_act" min="0" name="muj_act" class="form-control" required>
                                                       <div class="form-control-feedback text-danger" id="muj_actt"></div></td>

                                                   </tr>

                                                   <tr class="mx-1">
                                                       <td class="col-sm-1"> <label for="hom_inact" >Hombres inactivos:</label></td>
                                                       <td class="col-sm-3"><input type="number" id="hom_inact" min="0" name="hom_inact" class="form-control" required>
                                                       <div class="form-control-feedback text-danger" id="hom_inactt"></div></td>



                                                       <td class="col-sm-1"> <label for="muj_inact" > Mujeres inactivos:</label></td>
                                                       <td class="col-sm-3"> <input type="number" id="muj_inact" min="0" name="muj_inact" class="form-control" required>
                                                       <div class="form-control-feedback text-danger" id="muj_inactt"></div></td>


                                                   </tr>

                                               </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card mx-4 mt-1 col-sm-11 ">
                                        <div class="card-header justify-content-center">Estado civil de los asociados</div>
                                        <div class="card-body  ">
                                            <div class="form-inline mx-1 ">
                                                <table border="0">
                                                    <tr>

                                                        <td> <label for="soltero" >Solteros </label></td>
                                                        <td><input type="number" id="soltero" min="0" name="soltero" class="form-control col-sm-6" required>
                                                        <div class="form-control-feedback text-danger" id="solterot"></div></td>

                                                        <td><label for="casado" >Casados </label></td>
                                                        <td><input type="number" id="casado" min="0" name="casado" class="form-control col-sm-6" required>
                                                        <div class="form-control-feedback text-danger" id="casadot"></div></td>

                                                        <td><label for="unionlibre">Unión libre </label></td>
                                                        <td><input type="number" id="unionlibre" min="0" name="unionlibre" class="form-control col-sm-6" required>
                                                            <div class="form-control-feedback text-danger" id="unionlibret"></div></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="card mx-4 mt-1 col-sm-11">
                                        <div class="card-header justify-content-center">Composición por edad de los asociados</div>
                                        <div class="card-body  ">
                                            {{-- <div class="form-inline">--}}
                                            <table border="0">
                                                <tr>
                                                    <td class="col-sm-1" > <label for="edad_18_25"  >18-25</label></td>
                                                    <td class="col-sm-3"> <input type="number" id="edad_18_25" min="0" name="edad_18_25" min="0"  class="form-control  " required>
                                                        <div class="form-control-feedback text-danger" id="edad_18_25t"></div></td>

                                                    <td class="col-sm-1"> <label for="edad_26_35" >26-35 </label></td>
                                                    <td class="col-sm-3"><input type="number" id="edad_26_35" min="0"  name="edad_26_35"  class="form-control " required>
                                                        <div class="form-control-feedback text-danger" id="edad_26_35t"></div></td>

                                                    <td class="col-sm-1"><label for="edad_36_45" >36-45</label></td>
                                                    <td class="col-sm-3"><input type="number" id="edad_36_45" min="0"   name="edad_36_45"  class="form-control  " required>
                                                        <div class="form-control-feedback text-danger" id="edad_36_45t"></div></td>
                                                </tr>
                                                {{-- </div>

                                                 <div class="form-inline ">

     --}}
                                                <tr  class="mx-2">
                                                    <td class="col-sm-1"><label for="edad_46_55" >46-55</label></td>
                                                    <td class="col-sm-3"><input type="number" id="edad_46_55" min="0"   name="edad_46_55" class="form-control" required>
                                                        <div class="form-control-feedback text-danger" id="edad_46_55t"></div></td>

                                                    <td class="col-sm-1"><label for="edad_56_60" >56-60 </label></td>
                                                    <td class="col-sm-3"><input type="number" id="edad_56_60" min="0"  name="edad_56_60"  class="form-control" required>
                                                        <div class="form-control-feedback text-danger" id="edad_56_60t"></div></td>

                                                    <td class="col-sm-1"><label for="edad_61_70" >61-70</label></td>
                                                    <td class="col-sm-3"><input type="number" id="edad_61_70" min="0" name="edad_61_70"  class="form-control" required>
                                                        <div class="form-control-feedback text-danger" id="edad_61_70t"></div></td>

                                                </tr>
                                                {{--   </div>

                                                   <div class="form-inline mt-2">--}}


                                                <tr  class="mx-1">

                                                    <td class="col-sm-1 " align="center" ><label for="mas70" class="control-label">Más de 70 </label></td>

                                                    <td class="col-sm-3" ><input type="number" id="mas70" min="0" name="mas70" class="form-control" required>
                                                        <div class="form-control-feedback text-danger" id="mas70t"></div></td>
                                                </tr>
                                                {{-- </div>



                                             </div>--}}
                                            </table>

                                        </div>
                                    </div>

                                    <div class="card mx-4 mt-1 col-sm-11 ">
                                        <div class="card-header  ">Tiempo  de afiliación de los asociados</div>
                                        <div class="card-body  ">
                                            <table>
                                                <tr class="mx-1">
                                                    <td class="col-sm-1"><label for="0_1" >0-1</label></td>
                                                    <td class="col-sm-3"><input type="number" id="0_1" min="0" name="time_0_1"  class="form-control" required>
                                                        <div class="form-control-feedback text-danger" id="time_0_1t"></div></td>

                                                    <td class="col-sm-1"><label for="1_2" class="control-label">1-2</label></td>
                                                    <td class="col-sm-3"><input type="number" id="1_2" min="0"   name="time_1_2"  class="form-control " required>
                                                        <div class="form-control-feedback text-danger" id="time_1_2t"></div></td>

                                                    <td class="col-sm-1"><label for="3_5" class="control-label">3-5</label></td>
                                                    <td class="col-sm-3"><input type="number" id="3_5" min="0"   name="time_3_5" class="form-control " required>
                                                        <div class="form-control-feedback text-danger" id="time_3_5t"></div></td>
                                                </tr>

                                                <tr class="mx-1">
                                                    <td class="col-sm-1"><label for="5_10" class="control-label">5-10 </label></td>
                                                    <td class="col-sm-3"> <input type="number" id="5_10" min="0"  name="time_5_10" class="form-control" required>
                                                        <div class="form-control-feedback text-danger" id="time_5_10t"></div></td>

                                                    <td class="col-sm-1"> <label for="10_15" class="control-label">10-15</label></td>
                                                    <td class="col-sm-3"><input type="number" id="10_15" min="0" name="time_10_15"  class="form-control " required>
                                                        <div class="form-control-feedback text-danger" id="time_10_15t"></div></td>

                                                    <td class="col-sm-1"> <label for="15_20" class="control-label ">15-20</label></td>
                                                    <td class="col-sm-3"> <input type="number" id="15_20" min="0"  name="time_15_20" class="form-control" required>
                                                        <div class="form-control-feedback text-danger" id="time_15_20t"></div></td>

                                                </tr>

                                                <tr class="mx-1">
                                                    <td class="col-sm-1"><label for="20_25" class="control-label">20-25 </label></td>
                                                    <td class="col-sm-3" ><input type="number" id="20_25" min="0" name="time_20_25" class="form-control" required>
                                                        <div class="form-control-feedback text-danger" id="time_20_25t"></div></td>

                                                    <td class="col-sm-1"><label for="25_30" class="control-label">25-30 </label></td>
                                                    <td class="col-sm-3"> <input type="number" id="25_30" min="0" name="time_25_30" class="form-control" required>
                                                        <div class="form-control-feedback text-danger" id="time_25_30t"></div></td>

                                                    <td class="col-sm-1"> <label for="30_35" class="control-label">30-35</label></td>
                                                    <td class="col-sm-3"><input type="number" id="30_35" min="0"  name="time_30_35" class="form-control" required>
                                                        <div class="form-control-feedback text-danger" id="time_30_35t"></div></td>


                                                </tr>

                                                <tr class="mx-1">
                                                    <td class="col-sm-1"><label for="35_40" class="control-label">35-40 </label></td>
                                                    <td class="col-sm-3"> <input type="number" id="35_40" min="0" name="time_35_40" class="form-control" required>
                                                        <div class="form-control-feedback text-danger" id="time_35_40t"></div></td>

                                                    <td class="col-sm-1"><label for="40_48" class="control-label">40-50 </label></td>
                                                    <td class="col-sm-3"><input type="number" id="40_48" min="0" name="time_40_48" class="form-control" required>
                                                        <div class="form-control-feedback text-danger" id="time_40_48t"></div></td>

                                                    <td class="col-sm-1"><label for="mas50" class="control-label ">más 50 </label></td>
                                                    <td class="col-sm-3"><input type="number" id="mas50" min="0"  name="timemas50"  class="form-control" required>
                                                        <div class="form-control-feedback text-danger" id="timemas50t"></div></td>


                                                </tr>










                                            </table>
                                        </div>

                                    </div>



                                </div>

                                {{--*******ESTOS SON LOS IMPUTS OCULTOS*********--}}
                                <input type="hidden" id="idAnno">
                                <input type="hidden" id="2" value="Membresia">




                        </div>
                        <div class="tab-pane fade " id="home" role="tabpanel" aria-labelledby="home-tab">

                                <br>
                                <div class="form-group row justify-content-center">
                                    <h4>Incorporaciones y bajas de asociados</h4>

                                </div>

                                <div class="form-group row ">
                                    <br>
                                    <label for="uf" class="col-sm-4 col-form-label">Incorporaciones</label>
                                    <div class="col-sm-5">
                                        <input type="number" id="inc" min="0" name="incorporaciones" class="form-control" required>
                                        <div class="form-control-feedback text-danger" id="incorporacionest"></div>
                                    </div>
                                </div>


                                <div class="form-group row ">
                                    <label for="uf" class="col-sm-4 col-form-label">Bajas</label>
                                    <div class="col-sm-5">
                                        <input type="number" id="exp" min="0" class="form-control" name="bajas" required>
                                        <div class="form-control-feedback text-danger" id="bajast"></div>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label for="uf" class="col-sm-4 col-form-label">Bajas voluntarias</label>
                                    <div class="col-sm-5">
                                        <input type="number" id="vol" min="0" class="form-control" name="voluntarias" required>
                                        <div class="form-control-feedback text-danger" id="voluntariast"></div>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                   {{-- <label for="uf" class="col-sm-4 col-form-label">Total Bajas</label>--}}
                                    <div class="col-sm-5">
                                        <input type="hidden" id="baj" min="0" class="form-control" name="expulsados" readonly >
                                        <div class="form-control-feedback text-danger" id="expulsadost"></div>
                                    </div>
                                </div>

                        </div>



                        <div class="tab-pane fade" id="lala" role="tabpanel" aria-labelledby="contact-tab">

                                <br>
                                <div class="form-group row justify-content-center">
                                    <h4>Nivel educacional de asociados</h4>

                                </div>
                                <div class="form-group row ">
                                    <br>
                                    <label for="uf" class="col-sm-4 col-form-label">Ninguno</label>
                                    <div class="col-sm-5">
                                        <input type="number" id="ning"  min="0" name="ninguno"  class="form-control" required >
                                        <div class="form-control-feedback text-danger" id="ningunot"></div>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label for="uf" class="col-sm-4 col-form-label">Básico</label>
                                    <div class="col-sm-5">
                                        <input type="number" id="bas1"  min="0" name="basico1" class="form-control" required >
                                        <div class="form-control-feedback text-danger" id="basico1t"></div>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label for="uf" class="col-sm-4 col-form-label">Medio</label>
                                    <div class="col-sm-5">
                                        <input type="number" id="med1" min="0" name="medio1" class="form-control" required >
                                        <div class="form-control-feedback text-danger" id="medio1t"></div>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label for="uf" class="col-sm-4 col-form-label">Superior</label>
                                    <div class="col-sm-5">
                                        <input type="number" id="univ1" min="0" name="universitario1" class="form-control" required >
                                        <div class="form-control-feedback text-danger" id="universitario1t"></div>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label for="uf" class="col-sm-4 col-form-label">Posgrado</label>
                                    <div class="col-sm-5">
                                        <input type="number" id="postgrado1" min="0" name="postgrado1" class="form-control" required >
                                        <div class="form-control-feedback text-danger" id="postgrado1t"></div>
                                    </div>

                                </div>



                        </div>

                        <div class="tab-pane fade" id="categoria" role="tabpanel" aria-labelledby="categoria-tab">

                                <br>
                                <div class="form-group row justify-content-center">
                                    <h4>Rotacion y categoria ocupacional de los asociados</h4>

                                </div>

                                <div class="form-group row ">


                                    <BR>
                                    <div class="card mx-4 mt-1 col-sm-11">
                                        <div class="card-header">Causas de los retiros de los asociados </div>
                                        <div class="card-body ">

                                                <table border="0">
                                                    <tr class="mx-1">
                                                        <td class="col-sm-1"><label for="retvoluntario" >Retiro voluntario:</label></td>
                                                        <td class="col-sm-3"><input type="number" id="retvoluntario" min="0" name="retvoluntario" class="form-control" required>
                                                        <div class="form-control-feedback text-danger" id="retvoluntariot"></div></td>

                                                        <td class="col-sm-1"><label for="fallecimiento">Fallecimiento:</label></td>
                                                        <td class="col-sm-3"><input type="number" id="fallecimiento" min="0" name="fallecimiento" class="form-control " required>
                                                        <div class="form-control-feedback text-danger" id="fallecimientot"></div></td>

                                                    </tr>
                                                    <tr class="mx-1">
                                                        <td class="col-sm-1"> <label for="sanciones" >Sanciones:</label></td>
                                                        <td class="col-sm-3"><input type="number" id="sanciones" min="0" name="sanciones" class="form-control" required>
                                                        <div class="form-control-feedback text-danger" id="sancionest"></div></td>

                                                        <td class="col-sm-1"><label for="otrosret" >Otros: </label></td>
                                                        <td class="col-sm-3"><input type="number" id="otrosret" min="0" name="otrosret" class="form-control" required>
                                                        <div class="form-control-feedback text-danger" id="otrosrett"></div></td>
                                                    </tr>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="card mx-4 mt-1 col-sm-11 ">
                                        <div class="card-header justify-content-center">Solicitudes de afiliación de los asociados</div>
                                        <div class="card-body  ">

                                            <table >

                                                <tr class="mx-1">
                                                    <td class="col-sm-1"><label for="realizada" >Realizadas </label></td>
                                                    <td class="col-sm-3"><input type="number" id="realizada" min="0" name="realizada" class="form-control" required>
                                                        <div class="form-control-feedback text-danger" id="realizadat"></div></td>

                                                    <td class="col-sm-1"><label for="aprobada" >Aprobadas </label></td>
                                                    <td class="col-sm-3"><input type="number" id="aprobada" min="0" name="aprobada" class="form-control" required>
                                                        <div class="form-control-feedback text-danger" id="aprobadat"></div></td>

                                                    <td class="col-sm-1"><label for="rechazada" >Rechazadas </label></td>
                                                    <td class="col-sm-3"><input type="number" id="rechazada" min="0" name="rechazada" class="form-control" required>
                                                        <div class="form-control-feedback text-danger" id="rechazadat"></div></td>
                                                </tr>
                                            </table>

                                        </div>
                                    </div>


                                    <div class="card mx-4 mt-1 col-sm-11">
                                        <div class="card-header justify-content-center">Rotación de los asociados</div>
                                        <div class="card-body  ">
                                            <table >
                                                <tr class="mx-1">
                                                    <td class="col-sm-1"><label for="ingreso" >Ingresos:</label></td>
                                                    <td class="col-sm-3"><input type="number" id="ingreso" min="0" name="ingreso" min="0"  class="form-control" required>
                                                        <div class="form-control-feedback text-danger" id="ingresot"></div></td>

                                                    <td class="col-sm-1"><label for="hombres_ing" >Hombres:</label></td>
                                                    <td class="col-sm-3"> <input type="number" id="hombres_ing" min="0"  name="hombres_ing"  class="form-control" required>
                                                        <div class="form-control-feedback text-danger" id="hombres_ingt"></div></td>

                                                    <td class="col-sm-1"><label for="mujeres_ing" >Mujeres:</label></td>
                                                    <td class="col-sm-3"> <input type="number" id="mujeres_ing" min="0"   name="mujeres_ing"  class="form-control" required>
                                                        <div class="form-control-feedback text-danger" id="mujeres_ingt"></div></td>

                                                </tr>
                                                <tr class="mx-1">
                                                    <td class="col-sm-1"><label for="retiro" >Retiros:</label></td>
                                                    <td class="col-sm-3"><input type="number" id="retiro" min="0" name="retiro" min="0"  class="form-control" required>
                                                        <div class="form-control-feedback text-danger" id="retirot"></div></td>

                                                    <td class="col-sm-1"><label for="hombres_ret" class="control-label mx-1">Hombres:</label></td>
                                                    <td class="col-sm-3"><input type="number" id="hombres_ret" min="0"  name="hombres_ret"  class="form-control" required>
                                                        <div class="form-control-feedback text-danger" id="hombres_rett"></div></td>

                                                    <td class="col-sm-1"><label for="mujeres_ret" >Mujeres:</label></td>
                                                    <td class="col-sm-3"><input type="number" id="mujeres_ret" min="0"   name="mujeres_ret"  class="form-control" required>
                                                        <div class="form-control-feedback text-danger" id="mujeres_rett"></div></td>
                                                </tr>


                                            </table>

                                        </div>
                                    </div>

                                    <div class="card mx-4 mt-1 col-sm-11 ">
                                        <div class="card-header  ">Categoría ocupacional de los asociados</div>
                                        <div class="card-body  ">
                                            <table >
                                                <tr class="mx-1">
                                                    <td class="col-sm-1" ><label for="empsp" >Empleados del sector público:</label></td>
                                                    <td class="col-sm-3"><input type="number" id="empsectpub" min="0" name="empsectpub" class="form-control" required>
                                                        <div class="form-control-feedback text-danger" id="hom_act"></div></td>

                                                    <td class="col-sm-1"><label for="comerc" >Comerciantes:</label></td>
                                                    <td class="col-sm-3"><input type="number" id="comerc" min="0"   name="comerc" class="form-control" required>
                                                        <div class="form-control-feedback text-danger" id="empsectpubt"></div></td>
                                                    </tr>


                                                    <tr class="mx-1">
                                                        <td class="col-sm-1" ><label for="empspr" >Empleados del sector privado:</label></td>
                                                        <td class="col-sm-3"><input type="number" id="empsectpri" min="0"   name="empsectpri"  class="form-control  required">
                                                            <div class="form-control-feedback text-danger" id="empsectprit"></div></td>

                                                    <td class="col-sm-1"> <label for="product" >Productores: </label></td>
                                                    <td class="col-sm-3"><input type="number" id="product" min="0"  name="product" class="form-control" required>
                                                        <div class="form-control-feedback text-danger" id="productt"></div></td>

                                                    <td class="col-sm-1"><label for="estudiat" >Estudiantes:</label></td>
                                                    <td class="col-sm-3"><input type="number" id="estudiat" min="0" name="estudiat"  class="form-control" required>
                                                        <div class="form-control-feedback text-danger" id="estudiatt"></div></td>

                                                </tr>
                                                <tr class="mx-1">

                                                    <td class="col-sm-1"><label for="profind" >Profesionales independientes: </label></td>
                                                    <td class="col-sm-3"><input type="number" id="profind" min="0" name="profind" class="form-control" required>
                                                    <div class="form-control-feedback text-danger" id="profindt"></div></td>

                                                    <td class="col-sm-1"><label for="jubilado" >Jubilados:</label></td>
                                                    <td class="col-sm-3"><input type="number" id="jubilado" min="0"  name="jubilado" class="form-control" required>
                                                    <div class="form-control-feedback text-danger" id="jubiladot"></div></td>

                                                    <td class="col-sm-1"><label for="otroscat" >Otros:</label></td>
                                                    <td class="col-sm-3"><input type="number" id="otroscat" min="0" name="otroscat" class="form-control" required>
                                                    <div class="form-control-feedback text-danger" id="otroscatt"></div></td>

                                                </tr>

                                            </table>


                                            </div>



                                        </div>

                                    </div>



                                </div>

                                {{--*******ESTOS SON LOS IMPUTS OCULTOS*********--}}
                                <input type="hidden" id="idAnno">
                                <input type="hidden" id="2" value="Membresia">








                        <div class="tab-pane fade" id="empleados" role="tabpanel" aria-labelledby="empleados">

                                <br>
                                <div class="form-group row justify-content-center">
                                    <h4>Composición general de los empelados</h4>


                                    <div class="card  col-sm-11">
                                        <div class="card-header">Cantidad de empleados </div>
                                        <div class="card-body ">
                                            <div class="form-inline">

                                                <label for="hom_emp" class="control-label mx-1">Hombres:</label>

                                                <input type="number" id="hom_emp" min="0" name="hom_emp" class="form-control col-sm-2" required>
                                                <div class="form-control-feedback text-danger" id="hom_empt"></div>

                                            </div>

                                            <div class="form-inline mt-1">
                                                <label for="muj" class="control-label mx-2">Mujeres: </label>

                                                <input type="number" id="muj_emp" min="0" name="muj_emp" class="form-control col-sm-2" required>
                                                <div class="form-control-feedback text-danger" id="muj_empt"></div>

                                            </div>
                                        </div>
                                    </div>

                                </div>




                            {{--*******ESTOS SON LOS IMPUTS OCULTOS*********--}}
                            <input type="hidden" id="idAnno">
                            <input type="hidden" id="2" value="Membresia">




                        </div>

                </div>



                    </div>




                <div class="modal-footer">
                    <button type="button" class="boton2 btn" data-dismiss="modal" id="salir">Atrás</button>
                    <button id="AddMemb" type="button" class="btn boton">Guardar</button>
                </div>
            </div>
        </div>
    </div>

</form>

    <script>

        var tabla = $('#tabla');
        var tablaDT;
        var añadir;
        var accion=false; ///esta vaiable es paara controla cuando se va a insertar o cuando se va a modificar por defecto en false se va a insertar

        // estas variables son paa modificar una membresia aqui se guardan los id
        var $id_ca;
        var $id_ib;
        //var $id_nea;
        var $id_nee;
        var $id_eca;
        var $id_cea;
        var $id_taa;
        var $id_rasoc;
        var $id_sol;
        var $id_rot;
        var $id_catopa;
        var $id_emp;


        $(document).ready(function () {
            tablaDT = tabla.DataTable();

            añadir= function (a) {
                $('#form-membrresia')[0].reset();
                $('#idAnno').val(a);
                $('#modalMemb').modal('show');

            }

            $('#vol').focus(function () {
                // alert('cambio')
                var suma=$('#vol').val();
                var suma1= $('#exp').val();
                var total=parseInt($('#vol').val())+parseInt($('#exp').val());
                $('#baj').val(total)
            })
            $('#exp').focus(function () {
                // alert('cambio')
                var suma=$('#vol').val();
                var suma1= $('#exp').val();
                var total=parseInt($('#vol').val())+parseInt($('#exp').val());
                $('#baj').val(total)
            })


            $('#baj').focus(function () {
                // alert('cambio')
                var suma=$('#vol').val();
                var suma1= $('#exp').val();
                var total=parseInt($('#vol').val())+parseInt($('#exp').val());
                $('#baj').val(total)
            })




            /* cargar todo lo referente a modificacion de lo membresia */
            $('a').click(function (){


                if($(this).attr('id')=='mod'){
                    //buscar los datos de ese ano modificado

                    var id_ano = parseInt($(this).attr('name'));

                    $.ajax({
                        type: 'GET',
                        url: '/modMembresia/'+ id_ano,
                        data: {
                            _token: '{{ csrf_token() }}',

                        },

                        success: function (data) {

                            //poner los datos en las cajas de texto
                            $('#0').val(data.ca.hombres);
                            $('#1').val(data.ca.mujeres);
                            $('#hom_act').val(data.ca.hom_act);
                            $('#hom_inact').val(data.ca.hom_inact);
                            $('#muj_act').val(data.ca.muj_act);
                            $('#muj_inact').val(data.ca.muj_inact);

                            $('#soltero').val(data.eca.soltero);
                            $('#casado').val(data.eca.casado);
                            $('#unionlibre').val(data.eca.unionlibre);

                            $('#edad_18_25').val(data.cea.edad_18_25);
                            $('#edad_26_35').val(data.cea.edad_26_35);
                            $('#edad_36_45').val(data.cea.edad_36_45);
                            $('#edad_46_55').val(data.cea.edad_46_55);
                            $('#edad_56_60').val(data.cea.edad_56_60);
                            $('#edad_61_70').val(data.cea.edad_61_70);
                            /* $('#66_75').val(data.cea.edad_66_75);*/
                            $('#mas70').val(data.cea.mas70);

                            $('#0_1').val(data.taa.time_0_1);
                            $('#1_2').val(data.taa.time_1_2);
                            $('#3_5').val(data.taa.time_3_5);
                            $('#5_10').val(data.taa.time_5_10);
                            $('#10_15').val(data.taa.time_10_15);
                            $('#15_20').val(data.taa.time_15_20);
                            $('#20_25').val(data.taa.time_20_25);
                            $('#25_30').val(data.taa.time_25_30);
                            $('#30_35').val(data.taa.time_30_35);
                            $('#35_40').val(data.taa.time_35_40);
                            $('#40_48').val(data.taa.time_40_48);
                            $('#mas50').val(data.taa.timemas50);




                            $('#vol').val(data.ib.voluntarias);
                            $('#exp').val(data.ib.expulsados);
                            $('#baj').val(data.ib.bajas);
                            $('#inc').val(data.ib.incorporaciones);

                            /*  $('#primario').val(data.nea.primario);
                             $('#secundario').val(data.nea.secundario);
                             $('#tecnico').val(data.nea.tecnico);
                             $('#universitario').val(data.nea.universitario);
                             $('#postgrado').val(data.nea.postgrado);
                             $('#maestria').val(data.nea.maestria);*/

                            ///Nivel de los asociados
                            $('#ning').val(data.nee.ninguno);
                            $('#bas1').val(data.nee.basico);
                            $('#med1').val(data.nee.medio);
                            $('#univ1').val(data.nee.universitario);
                            $('#postgrado1').val(data.nee.postgrado);

                            //Retiros de los asociados
                            $('#retvoluntario').val(data.rasoc.retvoluntario);
                            $('#fallecimiento').val(data.rasoc.fallecimiento);
                            $('#sanciones').val(data.rasoc.sanciones);
                            $('#otrosret').val(data.rasoc.otrosret);

                            //solicitudes afilicaion de los asociados

                            $('#realizada').val(data.sol.realizada);
                            $('#aprobada').val(data.sol.aprobada);
                            $('#rechazada').val(data.sol.rechazada);

                            //rotaciones de asociados
                            $('#ingreso').val(data.rot.ingreso);
                            $('#hombres_ing').val(data.rot.hombres_ing);
                            $('#mujeres_ing').val(data.rot.mujeres_ing);
                            $('#retiro').val(data.rot.retiro);
                            $('#hombres_ret').val(data.rot.hombres_ret);
                            $('#mujeres_ret').val(data.rot.mujeres_ret);

                            //categoria ocupacional asociado
                            $('#empsectpub').val(data.catopa.empsectpub);
                            $('#empsectpri').val(data.catopa.empsectpri);
                            $('#comerc').val(data.catopa.comerc);
                            $('#product').val(data.catopa.product);
                            $('#estudiat').val(data.catopa.estudiat);
                            $('#jubilado').val(data.catopa.jubilado);
                            $('#profind').val(data.catopa.profind);
                            $('#otroscat').val(data.catopa.otroscat);

                            //empleados
                            $('#hom_emp').val(data.emp.hom_emp);
                            $('#muj_emp').val(data.emp.muj_emp);





                            $id_ca=data.ca.id;
                            $id_ib=data.ib.id;
                            //  $id_nea=data.nea.id;
                            $id_nee=data.nee.id;
                            $id_eca=data.eca.id;
                            $id_cea=data.cea.id;
                            $id_taa=data.taa.id;
                            $id_rasoc=data.rasoc.id;
                            $id_sol=data.sol.id;
                            $id_rot=data.rot.id;
                            $id_catopa=data.catopa.id;
                            $id_emp=data.emp.id;


                            accion=true;


                        }, error: function () {
                            alert('Error al cargar los datos...')
                        }


                    });

                }


            });


            //guardando la membresia
            $('#AddMemb').click(function () {

                var hombres    = $('#0').val();
                var mujeres    = $('#1').val();
                var hom_act    = $('#hom_act').val();
                var hom_inact  = $('#hom_inact').val();
                var muj_act    = $('#muj_act').val();
                var muj_inact  = $('#muj_inact').val();

                var tipoPrinc = $('#2').val();
                var idAnno = $('#idAnno').val();

                var total_asoc=parseInt(hombres) + parseInt(mujeres);

                //estado civil
                var soltero = $('#soltero').val();
                var casado =  $('#casado').val();
                var unionlibre =   $('#unionlibre').val();

                var total_est_civil = parseInt(soltero) + parseInt(casado) +parseInt(unionlibre);



                //composicion por edad de los asociados
                var edad_18_25 = $('#edad_18_25').val();
                var edad_26_35 = $('#edad_26_35').val();
                var edad_36_45 = $('#edad_36_45').val();
                var edad_46_55 = $('#edad_46_55').val();
                var edad_56_60 = $('#edad_56_60').val();
                var edad_61_70 = $('#edad_61_70').val();
                var mas70 = $('#mas70').val();


                var total_comp_edad=parseInt(edad_18_25) + parseInt(edad_26_35) + parseInt(edad_36_45) + parseInt(edad_46_55) + parseInt(edad_56_60) +parseInt(edad_61_70)+ parseInt(mas70);

                //tiempo de afiliacion de asociados
                var time_0_1 = $('#0_1').val();

                var time_1_2 = $('#1_2').val();
                var time_3_5 = $('#3_5').val();
                var time_5_10 = $('#5_10').val();
                var time_10_15 = $('#10_15').val();
                var time_15_20 = $('#15_20').val();
                var time_20_25 = $('#20_25').val();
                var time_25_30 = $('#25_30').val();
                var time_30_35 = $('#30_35').val();
                var time_35_40 = $('#35_40').val();
                var time_40_48 = $('#40_48').val();
                var time_mas50 = $('#mas50').val();

                var total_tiempo_afili= parseInt(time_40_48)+parseInt(time_35_40)+parseInt(time_30_35)+parseInt(time_25_30)+parseInt(time_20_25)+parseInt(time_15_20)+parseInt(time_10_15)+parseInt(time_5_10)+parseInt(time_3_5)+parseInt(time_1_2)+parseInt(time_mas50)+parseInt(time_0_1);



                var incorporaciones = $('#inc').val();
                var voluntarias = $('#vol').val();
                var expulsados = $('#exp').val();
                var bajas =parseInt($('#vol').val())+parseInt($('#exp').val());

//                var ninguno1 = $('#ning1').val();
//                var basico = $('#bas').val();
//                var medio = $('#med').val();
//                var univ = $('#univ').val();

                /* var primario = $('#primario').val();
                 var secundario = $('#secundario').val();
                 var tecnico = $('#tecnico').val();
                 var universitario = $('#universitario').val();
                 var postgrado = $('#postgrado').val();
                 var maestria = $('#maestria').val();

                 var total_niv_edu_asoc= parseInt(primario)+parseInt(secundario)+parseInt(tecnico)+parseInt(universitario)+parseInt(postgrado)+parseInt(maestria);
                 */

                var ninguno = $('#ning').val();
                var basico1 = $('#bas1').val();
                var medio1 = $('#med1').val();
                var univ1 = $('#univ1').val();
                var postgrado1=$('#postgrado1').val();


                //categoria ocupacional


                var empsectpub=$('#empsectpub').val();
                var empsectpri=$('#empsectpri').val();
                var comerc=$('#comerc').val();
                var product=$('#product').val();
                var estudiat=$('#estudiat').val();
                var jubilado=$('#jubilado').val();
                var profind=$('#profind').val();
                var otroscat=$('#otroscat').val();




                //rotaciones de asociados

                var ingreso=$('#ingreso').val();
                var hombres_ing=$('#hombres_ing').val();
                var mujeres_ing=$('#mujeres_ing').val();
                var retiro=$('#retiro').val();
                var hombres_ret=$('#hombres_ret').val();
                var mujeres_ret=$('#mujeres_ret').val();


                //retiro asociados

                var retvoluntario=$('#retvoluntario').val();
                var fallecimiento=$('#fallecimiento').val();
                var sanciones=$('#sanciones').val();
                var otrosret=$('#otrosret').val();



                //solicitudes de afiliados

                var realizada=$('#realizada').val();
                var aprobada=$('#aprobada').val();
                var rechazada=$('#rechazada').val();

                //Empleados
                var hom_emp=$('#hom_emp').val();
                var muj_emp=$('#muj_emp').val();




                var url_real;

                if(accion==true)

                    url_real= '/actMembresia/'+ $id_ca + '/' + $id_ib + '/' + $id_nee + '/' + $id_eca +'/'+ $id_cea +'/' + $id_taa  +'/' + $id_rasoc +'/' + $id_sol +'/' + $id_rot +'/' + $id_catopa +'/'+ $id_emp;

                else
                    url_real = '/addMembresia';



                //validando todos los totalespara el principio de membresia
                // alert(total_est_civil);
                //if(total_asoc!=total_comp_edad )
                {
                   // alert('La cantidad de asociados no se corresponde con la cantidad de asociados por composicion de edad. !!!Revise!!!')
                }
               // else
                    {
                   // if(total_asoc!=total_est_civil)
                    {
                      //  alert('La cantidad de asociados de la cooperativa no se corresponde con el estado civil de los asociados')
                    }
                   // else
                        {
                       // if(total_asoc!= total_tiempo_afili)
                        {
                           // alert('El total de los asociados en la cooperativa no se corresponde con el total de asociados afiliados.')
                        }
                       // else
                        {
                            // if(total_asoc!=total_niv_edu_asoc)
                            {
                                // alert('El total de los asociados con nivel educacional no se corresponde con la cantidad de asociados.')
                            }/*else*/ {
                                $.ajax({
                                    type: 'POST',

                                    url: url_real,   ///actMembresia/{id_asoc}/{id_ib}/{id_nea}/{id_nee
                                    data: {
                                        _token: '{{ csrf_token() }}',


                                        total_asoc:total_asoc,
                                        total_asoc1:total_asoc,
                                        total_asoc2:total_asoc,
                                        total_est_civil:total_est_civil,
                                        total_comp_edad:total_comp_edad,
                                        total_tiempo_afili:total_tiempo_afili,



                                        id_ano: idAnno,
                                        hombres: hombres,
                                        mujeres: mujeres,
                                        hom_act: hom_act,
                                        hom_inact:hom_inact,
                                        muj_act:muj_act,
                                        muj_inact:muj_inact,

                                        ////
                                        hom_act_inact:parseInt(hom_act) + parseInt(hom_inact),
                                        muj_act_inact: parseInt(muj_act)+ parseInt(muj_inact),

                                        soltero : soltero,
                                        casado : casado,
                                        unionlibre : unionlibre,

                                        edad_18_25 : edad_18_25,
                                        edad_26_35 : edad_26_35,
                                        edad_36_45 : edad_36_45,
                                        edad_46_55 : edad_46_55,
                                        edad_56_60 : edad_56_60,
                                        edad_61_70 : edad_61_70,
                                        mas70  : mas70,


                                        time_0_1:time_0_1,
                                        timemas50:time_mas50,
                                        time_1_2:time_1_2,
                                        time_3_5:time_3_5,
                                        time_5_10:time_5_10,
                                        time_10_15:time_10_15,
                                        time_15_20:time_15_20,
                                        time_20_25:time_20_25,
                                        time_25_30:time_25_30,
                                        time_30_35:time_30_35,
                                        time_35_40:time_35_40,
                                        time_40_48:time_40_48,


                                        incorporaciones: incorporaciones,
                                        bajas: bajas,
                                        voluntarias: voluntarias,
                                        expulsados: expulsados,


                                        /*
                                         primario : primario,
                                         secundario : secundario,
                                         tecnico : tecnico,
                                         universitario : universitario,
                                         postgrado : postgrado,
                                         maestria : maestria,*/

                                        ninguno: ninguno,
                                        basico1: basico1,
                                        medio1: medio1,
                                        universitario1: univ1,
                                        postgrado1:postgrado1,

                                        //categoria ocupacional


                                        empsectpub:empsectpub,
                                        empsectpri:empsectpri,
                                        comerc:comerc,
                                        product:product,
                                        estudiat:estudiat,
                                        jubilado:jubilado,
                                        profind:profind,
                                        otroscat:otroscat,



                                        //rotaciones de asociados

                                        ingreso:ingreso,
                                        hombres_ing:hombres_ing,
                                        mujeres_ing:mujeres_ing,
                                        retiro:retiro,
                                        hombres_ret:hombres_ret,
                                        mujeres_ret:mujeres_ret,


                                        //retiro asociados

                                        retvoluntario:retvoluntario,
                                        fallecimiento:fallecimiento,
                                        sanciones:sanciones,
                                        otrosret:otrosret,



                                        //solicitudes de afiliados

                                        realizada:realizada,
                                        aprobada:aprobada,
                                        rechazada:rechazada,


                                        //Empleados
                                        hom_emp:hom_emp,
                                        muj_emp:muj_emp,
                                    },

                                    success: function (data) {
                                        location.reload();
                                        $('#alerta').fadeIn(1000);
                                        $('#alerta').fadeOut(5000);


//

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
                            }
                        }

                    }
                }


            });


            $('#salir').click(function () {
                location.reload();
            });
            $('#cerrar').click(function () {
                location.reload();
            });



        });




        //se verifica que en cada envnto focus de salida de los input no stn vacios
       /* $('input').focusout(function () {
            // alert('cambio')


            if($(this).attr('type')=='number'){
                if($(this).val().trim() ===''){

                    alert('campo requrido');
                }

            }

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
    </script>
@endsection