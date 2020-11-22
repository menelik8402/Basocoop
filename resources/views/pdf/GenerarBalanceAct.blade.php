<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <head>

        <style type="text/css">
            body{
                font-size: 16px;
                font-family: "Arial";
            }
            table{
                border-collapse: collapse;
            }
            td{
                padding: 6px 5px;
                font-size: 15px;
            }
            .h1{
                font-size: 21px;
                font-weight: bold;
            }
            .h2{
                font-size: 18px;
                font-weight: bold;
            }
            .tabla1{
                margin-bottom: 20px;
            }
            .tabla2 {
                margin-bottom: 20px;
            }
            .tabla3{
                margin-top: 15px;
            }
            .tabla3 td{
                border: 1px solid #000;
            }
            .tabla3 .cancelado{
                border-left: 0;
                border-right: 0;
                border-bottom: 0;
                border-top: 1px dotted #000;
                width: 200px;
            }
            .emisor{
                color: red;
            }
            .linea{
                border-bottom: 1px dotted #000;
            }
            .border{
                border: 1px solid #000;
            }
            .fondo{
                background-color: #dfdfdf;
            }
            .fisico{
                color: #fff;
            }
            .fisico td{
                color: #fff;
            }
            .fisico .border{
                border: 1px solid #fff;
            }
            .fisico .tabla3 td{
                border: 1px solid #fff;
            }
            .fisico .linea{
                border-bottom: 1px dotted #fff;
            }
            .fisico .emisor{
                color: #fff;
            }
            .fisico .tabla3 .cancelado{
                border-top: 1px dotted #fff;
            }
            .fisico .text{
                color: #000;
            }
            .fisico .fondo{
                background-color: #fff;
            }

        </style>
    </head>
    <body>
    <div class="container">


        <div >
            <div class="panel-heading">
                <h1 class="panel-title">Premisas</h1>
            </div>


            <div class="panel panel-default">
                <div class="panel-title pull-left"> Condición Material de la cooperativa</div>


                <div class="panel-body">
                    <section class="Tabla">
                        <div class="panel panel-default">

                            <div class="panel-body">
                                <div>


                                    <table class="table  table-bordered table-sm table-hover tabla" border="2">
                                        <thead class="thead-light">
                                        <th>Utilidades</th>
                                        <th>% de las utilidades</th>
                                        <th>Fondo de  educación</th>
                                        <th>Mercadeo</th>
                                        <th>Comité de género</th>
                                        <th>Otros ingresos</th>
                                        </thead>
                                        <tbody>
                                        <tr>

                                        </tr>
                                        <tr>
                                            <td>{{$cond_mat->utilidades}}</td>
                                            <td>{{$cond_mat->presupuesto_coop}}</td>
                                            <td>{{$cond_mat->fondo_educacion}}</td>
                                            <td>{{$cond_mat->mercadeo}}</td>
                                            <td>{{$cond_mat->cmte_genero}}</td>
                                            <td>{{$cond_mat->otros_ingresos}}</td>
                                        </tr>

                                        </tbody>

                                    </table>

                                    <div class="panel-title pull-left"> Condición legal</div>
                                    <div class="form-group">
                                        <textarea class="form-control" readonly>{{$premisa->cond_legal}} </textarea>
                                    </div>
                                    <div class="panel-title pull-left"> Condición educativa</div>
                                    <div class="form-group">
                                        <textarea class="form-control" readonly>{{$premisa->cond_educativa}} </textarea>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </section>
                </div>
            </div>

            <br>
            <section class="tabla">

                <div class="panel panel-default ">
                    <div class="panel-heading">
                        <h1 class="panel-title">Balance social cooperativo por actividades perteneciente al año {{$ano->ano}} " {{$nomb_coop->nombre}}"</h1>
                    </div>


                    @if($si_tiene_metas==false)

                        <div class="alert alert-danger" id="alerta"  role="alert">
                            La actividad "{{$nomb_met}}" que pertenece al programa {{$nomb_prog}} del  año {{$ano->ano}} no tiene seguimientos  por lo que no se puede emitir un balance para esta actividad.
                            <a href="/balance/act/prog" class="pull-right">Continue</a>
                        </div>

                    @else

                        <div class="panel-body">

                            <div class="row justify-content-center">



                                @foreach($progs as $key => $prog)

                                    <table class="table  table-bordered table-sm  table-hover tabla" border="2">
                                        <div class="alert alert-info"> Actividades del programa {{$prog->nomb_prog}}</div>
                                        <thead class="table-secondary">
                                        <th class="col-sm-1">No.</th>
                                        <th class="col-sm-2">Actividad</th>
                                        <th class="col-sm-2">Presupuesto</th>

                                        {{--<th class="col-sm-2">Manifestación Numérica</th>--}}
                                        <th class="col-sm-2"><h6>Unidades Físicas Planificadas</h6></th>
                                        <th class="col-sm-2"><h6>Número de Beneficiarios Planificados</h6></th>
                                        <th class="col-sm-2"><h6>Unidades Fisicas Reales</h6></th>
                                        <th class="col-sm-2"><h6>Número de Beneficiarios Reales</h6></th>
                                        <th class="col-sm-2"><h6>% Cumplimiento UF</h6></th>
                                        <th class="col-sm-2"><h6>% Cumplimiento NB</h6></th>
                                        <th class="col-sm-2"><h6>Activo Socia</h6>l</th>
                                        <th class="col-sm-2"><h6>Pasivo Social</h6></th>
                                        <th class="col-sm-2"><h6>Patrimonio Social</h6></th>
                                        </thead>
                                        <tbody>
                                        <tr>

                                        </tr>
                                        <?php
                                        foreach($prog->Metas as $met){
                                            $total_NB=$met->GetSeguimientos->sum('num_benef_planif')+$total_NB;
                                        }


                                        ?>
                                        @foreach($prog->Metas as $kil => $met)
                                            <tr>
                                                <td>{{$kil +1}}</td>
                                                <td>{{$met->desc_unid_fisicas}}</td>
                                                <td>{{$met->presupuesto}}</td>
                                                {{--  <td>{{$met->manif_num}}</td>--}}
                                                <td>{{$met->GetSeguimientos->sum('unid_fisicas_planif')}}</td>

                                                <td>{{$met->GetSeguimientos->sum('num_benef_planif')}}</td>

                                                <td>{{$met->GetSeguimientos->sum('unid_fisicas_real')}}</td>

                                                <td>{{$met->GetSeguimientos->sum('num_beneficiarios_real')}}</td>

                                                <td>{{round($met->GetSeguimientos->sum('unid_fisicas_real')/$met->GetSeguimientos->sum('unid_fisicas_planif'),2)*100}}</td>
                                                <td>{{round($met->GetSeguimientos->sum('num_beneficiarios_real')/$met->GetSeguimientos->sum('num_benef_planif'),2)*100}}</td>

                                                @if((round($met->GetSeguimientos->sum('num_beneficiarios_real')/$met->GetSeguimientos->sum('num_benef_planif'),2)*100)> 100 )
                                                    <td ><td>{{round($met->GetSeguimientos->sum('num_beneficiarios_real')/$met->GetSeguimientos->sum('num_benef_planif')*100 * $met->GetSeguimientos->sum('num_benef_planif')*100/$total_NB/100,2)}} <small>ASA</small>
                                                        <br>{{round($met->GetSeguimientos->sum('num_benef_planif')*100/$total_NB,2)}} </td>
                                                    <td>0</td>
                                                    <td>{{round($met->GetSeguimientos->sum('num_beneficiarios_real')/$met->GetSeguimientos->sum('num_benef_planif')*100 * $met->GetSeguimientos->sum('num_benef_planif')*100/$total_NB/100,2)}}</td>

                                                @else
                                                    <td>{{round($met->GetSeguimientos->sum('num_benef_planif')*100/$total_NB,2)}}</td>
                                                    <td>{{round($met->GetSeguimientos->sum('num_benef_planif')*100/$total_NB - $met->GetSeguimientos->sum('num_beneficiarios_real')/$met->GetSeguimientos->sum('num_benef_planif')*100 * $met->GetSeguimientos->sum('num_benef_planif')*100/$total_NB/100,2) }}</td>
                                                    <td>{{round($met->GetSeguimientos->sum('num_beneficiarios_real')/$met->GetSeguimientos->sum('num_benef_planif')*100 * $met->GetSeguimientos->sum('num_benef_planif')*100/$total_NB/100,2)}}</td>
                                                @endif

                                            </tr>
                                        @endforeach
                                        <? $total_NB=0 ?>
                                        </tbody>
                                    </table>
                                @endforeach



                            </div>
                        </div>
                    @endif



                </div>
            </section>
          {{--  <div >
                <div class="panel-heading">
                    <h1 class="panel-title">Indicadores</h1>
                </div>
            @if ($ano->id)
                <section class="Tabla">
                    <div class="panel panel-default">

                        <div class="panel-body">
                            <div>
                                <h3>Cantidad de Asociados</h3>


                                <table class="table  table-bordered table-sm table-hover tabla">
                                    <thead class="thead-light">
                                    <th>Número de asociados</th>
                                    <th>{{$ano->ano}}</th>
                                    <th>%</th>
                                    --}}{{--<th>-</th>--}}{{--
                                    --}}{{--<th>%</th>--}}{{--
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Total</td>
                                        <td>{{$cantAsoc->mujeres + $cantAsoc->hombres}}</td>
                                        <td>{{($cantAsoc->mujeres + $cantAsoc->hombres)*100/($cantAsoc->mujeres + $cantAsoc->hombres)}}</td>
                                        --}}{{--<td>-</td>--}}{{--
                                        --}}{{--<td>-</td>--}}{{--
                                    </tr>
                                    <tr>
                                        <td>Hombres</td>
                                        <td>{{$cantAsoc->hombres}}</td>
                                        <td>{{ $cantAsoc->hombres*100/($cantAsoc->mujeres + $cantAsoc->hombres)}}</td>
                                        --}}{{--<td>-</td>--}}{{--
                                        --}}{{--<td>-</td>--}}{{--
                                    </tr>
                                    <tr>
                                        <td>Mujeres</td>
                                        <td>{{$cantAsoc->mujeres}}</td>
                                        <td>{{$cantAsoc->mujeres * 100 /($cantAsoc->mujeres + $cantAsoc->hombres)}}</td>
                                        --}}{{--<td>-</td>--}}{{--
                                        --}}{{--<td>-</td>--}}{{--
                                    </tr>


                                    </tbody>

                                </table>
                            </div>
                        </div>

                    </div>
                </section>

                <section class="Tabla">
                    <div class="panel panel-default">
                        <div>
                            <h3>Incorporaciones y Bajas de Asociados</h3>
                            <table class="table  table-bordered table-sm table-hover tabla">
                                <thead class="thead-light">
                                <th>Nivel</th>
                                <th>{{$ano->ano}}</th>
                                <th>-</th>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Incorporaciones</td>
                                    <td>{{$incBaj->incorporaciones}}</td>

                                    <td>-</td>
                                </tr>
                                <tr>
                                    <td>Bajas</td>
                                    <td>{{$incBaj->bajas}}</td>

                                    <td>-</td>
                                </tr>
                                <tr>
                                    <td>Voluntarias</td>
                                    <td>{{$incBaj->voluntarias}}</td>

                                    <td>-</td>
                                </tr>
                                <tr>
                                    <td>Expulsados</td>
                                    <td>{{$incBaj->expulsados}}</td>

                                    <td>-</td>
                                </tr>
                                </tbody>

                            </table>
                        </div>
                    </div>

                </section>

                <section class="Tabla">
                    <div class="panel panel-default">
                        <div>
                            <h3>Nivel Educacional de Asociados</h3>
                            <table class="table  table-bordered table-sm table-hover tabla">
                                <thead class="thead-light">
                                <th>Nivel</th>
                                <th>No. de Socios</th>
                                <th>%</th>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Primario</td>
                                    <td>{{$nivEscAsoc->primario}}</td>

                                    <td>{{($nivEscAsoc->primario*100)/($nivEscAsoc->primario+
                               $nivEscAsoc->secundario+
                                $nivEscAsoc->tecnico+
                                $nivEscAsoc->universitario+$nivEscAsoc->postgrado+$nivEscAsoc->maestria)}}</td>
                                </tr>
                                <tr>
                                    <td>Secundario</td>
                                    <td>{{$nivEscAsoc->secundario}}</td>

                                    <td>{{($nivEscAsoc->secundario*100)/($nivEscAsoc->primario+
                               $nivEscAsoc->secundario+
                                $nivEscAsoc->tecnico+
                                $nivEscAsoc->universitario+$nivEscAsoc->postgrado+$nivEscAsoc->maestria)}}</td>
                                </tr>
                                <tr>
                                    <td>Técnico</td>
                                    <td>{{$nivEscAsoc->tecnico}}</td>

                                    <td>{{($nivEscAsoc->tecnico*100)/($nivEscAsoc->primario+
                               $nivEscAsoc->secundario+
                                $nivEscAsoc->tecnico+
                                $nivEscAsoc->universitario+$nivEscAsoc->postgrado+$nivEscAsoc->maestria)}}</td>
                                </tr>
                                <tr>
                                    <td>Universitario</td>
                                    <td>{{$nivEscAsoc->universitario}}</td>

                                    <td>{{($nivEscAsoc->universitario*100)/($nivEscAsoc->primario+
                               $nivEscAsoc->secundario+
                                $nivEscAsoc->tecnico+
                                $nivEscAsoc->universitario+$nivEscAsoc->postgrado+$nivEscAsoc->maestria)}}</td>
                                </tr>
                                <tr>
                                    <td>Post Grado</td>
                                    <td>{{$nivEscAsoc->postgrado}}</td>

                                    <td>{{($nivEscAsoc->postgrado*100)/($nivEscAsoc->primario+
                               $nivEscAsoc->secundario+
                                $nivEscAsoc->tecnico+
                                $nivEscAsoc->universitario+$nivEscAsoc->postgrado+$nivEscAsoc->maestria)}}</td>
                                </tr>
                                <tr>
                                    <td>Maestria</td>
                                    <td>{{$nivEscAsoc->maestria}}</td>

                                    <td>{{($nivEscAsoc->maestria*100)/($nivEscAsoc->primario+
                               $nivEscAsoc->secundario+
                                $nivEscAsoc->tecnico+
                                $nivEscAsoc->universitario+$nivEscAsoc->postgrado+$nivEscAsoc->maestria)}}</td>
                                </tr>

                                </tbody>

                            </table>
                        </div>
                    </div>

                </section>

                <section class="Tabla">
                    <div class="panel panel-default">
                        <div>
                            <h3>Nivel Educacional de los Empleados</h3>
                            <table class="table  table-bordered table-sm table-hover tabla">
                                <thead class="thead-light">
                                <th>Nivel</th>
                                <th>No. de Empleados</th>
                                <th>%</th>
                                </thead>
                                <tbody>

                                <tr>
                                    <td>Ninguno</td>
                                    <td>{{$nivEscEmp->ninguno}}</td>

                                    <td>{{($nivEscEmp->ninguno*100)/($nivEscEmp->ninguno +
                                  $nivEscEmp->básico +
                                  $nivEscEmp->medio +
                                  $nivEscEmp->universitario)}}</td>
                                </tr>
                                <tr>
                                    <td>Básico</td>
                                    <td>{{$nivEscEmp->básico}}</td>

                                    <td>{{($nivEscEmp->básico*100)/($nivEscEmp->ninguno +
                                  $nivEscEmp->básico +
                                  $nivEscEmp->medio +
                                  $nivEscEmp->universitario)}}</td>
                                </tr>
                                <tr>
                                    <td>Medio</td>
                                    <td>{{$nivEscEmp->medio}}</td>

                                    <td>{{($nivEscEmp->medio*100)/($nivEscEmp->ninguno +
                                  $nivEscEmp->básico +
                                  $nivEscEmp->medio +
                                  $nivEscEmp->universitario)}}</td>
                                </tr>
                                <tr>
                                    <td>Universitario</td>
                                    <td>{{$nivEscEmp->universitario}}</td>

                                    <td>{{($nivEscEmp->universitario*100)/($nivEscEmp->ninguno +
                                  $nivEscEmp->básico +
                                  $nivEscEmp->medio +
                                  $nivEscEmp->universitario)}}</td>
                                </tr>
                                <tr>
                                    <td>Total</td>
                                    <td>{{$nivEscEmp->ninguno +
                                  $nivEscEmp->básico +
                                  $nivEscEmp->medio +
                                  $nivEscEmp->universitario
                            }}</td>

                                    <td>100</td>
                                </tr>

                                </tbody>

                            </table>
                        </div>
                    </div>


                </section>


                <section class="Tabla">
                    <div class="panel panel-default">

                        <div class="panel-body">
                            <div>
                                <h3>Estado civil de los  Asociados</h3>


                                <table class="table  table-bordered table-sm table-hover tabla">
                                    <thead class="thead-light">
                                    <th>Estado civil</th>
                                    <th>{{$ano->ano}}</th>
                                    <th>%</th>
                                    --}}{{--<th>-</th>--}}{{--
                                    --}}{{--<th>%</th>--}}{{--
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Total</td>
                                        <td>{{$cantAsoc->mujeres + $cantAsoc->hombres}}</td>
                                        <td>{{($cantAsoc->mujeres + $cantAsoc->hombres)*100/($cantAsoc->mujeres + $cantAsoc->hombres)}}</td>
                                        --}}{{--<td>-</td>--}}{{--
                                        --}}{{--<td>-</td>--}}{{--
                                    </tr>
                                    <tr>
                                        <td>Casados</td>
                                        <td>{{$est_civil->casado}}</td>
                                        <td>{{$est_civil->casado * 100 /($cantAsoc->mujeres + $cantAsoc->hombres)}}</td>
                                        --}}{{--<td>-</td>--}}{{--
                                        --}}{{--<td>-</td>--}}{{--
                                    </tr>
                                    <tr>
                                        <td>Solteros</td>
                                        <td>{{$est_civil->soltero}}</td>
                                        <td>{{$est_civil->soltero * 100 /($cantAsoc->mujeres + $cantAsoc->hombres)}}</td>
                                        --}}{{--<td>-</td>--}}{{--
                                        --}}{{--<td>-</td>--}}{{--
                                    </tr>
                                    <tr>
                                        <td>Union libre</td>
                                        <td>{{$est_civil->unionlibre}}</td>
                                        <td>{{$est_civil->unionlibre * 100 /($cantAsoc->mujeres + $cantAsoc->hombres)}}</td>
                                        --}}{{--<td>-</td>--}}{{--
                                        --}}{{--<td>-</td>--}}{{--
                                    </tr>


                                    </tbody>

                                </table>
                            </div>
                        </div>

                    </div>
                </section>



                <section class="Tabla">
                    <div class="panel panel-default">

                        <div class="panel-body">
                            <div>
                                <h3>Composición por edad</h3>


                                <table class="table  table-bordered table-sm table-hover tabla">
                                    <thead class="thead-light">
                                    <th>Rangos</th>
                                    <th>{{$ano->ano}}</th>
                                    <th>%</th>
                                    --}}{{--<th>-</th>--}}{{--
                                    --}}{{--<th>%</th>--}}{{--
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Total</td>
                                        <td>{{$cantAsoc->mujeres + $cantAsoc->hombres}}</td>
                                        <td>{{($cantAsoc->mujeres + $cantAsoc->hombres)*100/($cantAsoc->mujeres + $cantAsoc->hombres)}}</td>
                                        --}}{{--<td>-</td>--}}{{--
                                        --}}{{--<td>-</td>--}}{{--
                                    </tr>
                                    <tr>
                                        <td>Edad 0-5</td>
                                        <td>{{$comp_edad_asoc->edad_0_5}}</td>
                                        <td>{{$comp_edad_asoc->edad_0_5 * 100 /($cantAsoc->mujeres + $cantAsoc->hombres)}}</td>
                                        --}}{{--<td>-</td>--}}{{--
                                        --}}{{--<td>-</td>--}}{{--
                                    </tr>
                                    <tr>
                                        <td>Edad 6-15</td>
                                        <td>{{$comp_edad_asoc->edad_6_15}}</td>
                                        <td>{{$comp_edad_asoc->edad_6_15 * 100 /($cantAsoc->mujeres + $cantAsoc->hombres)}}</td>
                                        --}}{{--<td>-</td>--}}{{--
                                        --}}{{--<td>-</td>--}}{{--
                                    </tr>
                                    <tr>
                                        <td>Edad 16-20</td>
                                        <td>{{$comp_edad_asoc->edad_16_20}}</td>
                                        <td>{{$comp_edad_asoc->edad_16_20 * 100 /($cantAsoc->mujeres + $cantAsoc->hombres)}}</td>
                                        --}}{{--<td>-</td>--}}{{--
                                        --}}{{--<td>-</td>--}}{{--
                                    </tr>
                                    <tr>
                                        <td>Edad 21-40</td>
                                        <td>{{$comp_edad_asoc->edad_21_40}}</td>
                                        <td>{{$comp_edad_asoc->edad_21_40 * 100 /($cantAsoc->mujeres + $cantAsoc->hombres)}}</td>
                                        --}}{{--<td>-</td>--}}{{--
                                        --}}{{--<td>-</td>--}}{{--
                                    </tr>

                                    <tr>
                                        <td>Edad 41-60</td>
                                        <td>{{$comp_edad_asoc->edad_41_60}}</td>
                                        <td>{{$comp_edad_asoc->edad_41_60 * 100 /($cantAsoc->mujeres + $cantAsoc->hombres)}}</td>
                                        --}}{{--<td>-</td>--}}{{--
                                        --}}{{--<td>-</td>--}}{{--
                                    </tr>

                                    <tr>
                                        <td>Edad 61-65</td>
                                        <td>{{$comp_edad_asoc->edad_61_65}}</td>
                                        <td>{{$comp_edad_asoc->edad_61_65 * 100 /($cantAsoc->mujeres + $cantAsoc->hombres)}}</td>
                                        --}}{{--<td>-</td>--}}{{--
                                        --}}{{--<td>-</td>--}}{{--
                                    </tr>

                                    <tr>
                                        <td>Edad 66-75</td>
                                        <td>{{$comp_edad_asoc->edad_66_75}}</td>
                                        <td>{{$comp_edad_asoc->edad_66_75 * 100 /($cantAsoc->mujeres + $cantAsoc->hombres)}}</td>
                                        --}}{{--<td>-</td>--}}{{--
                                        --}}{{--<td>-</td>--}}{{--
                                    </tr>

                                    <tr>
                                        <td>Más de 75</td>
                                        <td>{{$comp_edad_asoc->mas75}}</td>
                                        <td>{{$comp_edad_asoc->mas75 * 100 /($cantAsoc->mujeres + $cantAsoc->hombres)}}</td>
                                        --}}{{--<td>-</td>--}}{{--
                                        --}}{{--<td>-</td>--}}{{--
                                    </tr>



                                    </tbody>

                                </table>
                            </div>
                        </div>

                    </div>
                </section>



                <section class="Tabla">
                    <div class="panel panel-default">

                        <div class="panel-body">
                            <div>
                                <h3>Tiempo de Afiliación de los Encuestados</h3>


                                <table class="table  table-bordered table-sm table-hover tabla">
                                    <thead class="thead-light">
                                    <th>Rangos</th>
                                    <th>{{$ano->ano}}</th>
                                    <th>%</th>
                                    --}}{{--<th>-</th>--}}{{--
                                    --}}{{--<th>%</th>--}}{{--
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Total</td>
                                        <td>{{$cantAsoc->mujeres + $cantAsoc->hombres}}</td>
                                        <td>{{($cantAsoc->mujeres + $cantAsoc->hombres)*100/($cantAsoc->mujeres + $cantAsoc->hombres)}}</td>
                                        --}}{{--<td>-</td>--}}{{--
                                        --}}{{--<td>-</td>--}}{{--
                                    </tr>
                                    <tr>
                                        <td>0 a 1 años</td>
                                        <td>{{$tiempo_afili->time_0_1}}</td>
                                        <td>{{$tiempo_afili->time_0_1 * 100 /($cantAsoc->mujeres + $cantAsoc->hombres)}}</td>
                                        --}}{{--<td>-</td>--}}{{--
                                        --}}{{--<td>-</td>--}}{{--
                                    </tr>
                                    <tr>
                                        <td>1 a 2 años</td>
                                        <td>{{$tiempo_afili->time_1_2}}</td>
                                        <td>{{$tiempo_afili->time_1_2 * 100 /($cantAsoc->mujeres + $cantAsoc->hombres)}}</td>
                                        --}}{{--<td>-</td>--}}{{--
                                        --}}{{--<td>-</td>--}}{{--
                                    </tr>
                                    <tr>
                                        <td>2 a 3 años</td>
                                        <td>{{$tiempo_afili->time_2_3}}</td>
                                        <td>{{$tiempo_afili->time_2_3 * 100 /($cantAsoc->mujeres + $cantAsoc->hombres)}}</td>
                                        --}}{{--<td>-</td>--}}{{--
                                        --}}{{--<td>-</td>--}}{{--
                                    </tr>
                                    <tr>
                                        <td>3 a 5  años</td>
                                        <td>{{$tiempo_afili->time_3_5}}</td>
                                        <td>{{$tiempo_afili->time_3_5 * 100 /($cantAsoc->mujeres + $cantAsoc->hombres)}}</td>
                                        --}}{{--<td>-</td>--}}{{--
                                        --}}{{--<td>-</td>--}}{{--
                                    </tr>

                                    <tr>
                                        <td>5 a 10  años</td>
                                        <td>{{$tiempo_afili->time_5_10}}</td>
                                        <td>{{$tiempo_afili->time_5_10 * 100 /($cantAsoc->mujeres + $cantAsoc->hombres)}}</td>
                                        --}}{{--<td>-</td>--}}{{--
                                        --}}{{--<td>-</td>--}}{{--
                                    </tr>

                                    <tr>
                                        <td>10 a 15  años</td>
                                        <td>{{$tiempo_afili->time_10_15}}</td>
                                        <td>{{$tiempo_afili->time_10_15 * 100 /($cantAsoc->mujeres + $cantAsoc->hombres)}}</td>
                                        --}}{{--<td>-</td>--}}{{--
                                        --}}{{--<td>-</td>--}}{{--
                                    </tr>

                                    <tr>
                                        <td>15 a 20 años</td>
                                        <td>{{$tiempo_afili->time_15_20}}</td>
                                        <td>{{$tiempo_afili->time_15_20 * 100 /($cantAsoc->mujeres + $cantAsoc->hombres)}}</td>
                                        --}}{{--<td>-</td>--}}{{--
                                        --}}{{--<td>-</td>--}}{{--
                                    </tr>

                                    <tr>
                                        <td>20 a 25 años</td>
                                        <td>{{$tiempo_afili->time_20_25}}</td>
                                        <td>{{$tiempo_afili->time_20_25 * 100 /($cantAsoc->mujeres + $cantAsoc->hombres)}}</td>
                                        --}}{{--<td>-</td>--}}{{--
                                        --}}{{--<td>-</td>--}}{{--
                                    </tr>

                                    <tr>
                                        <td>25 a 30 años</td>
                                        <td>{{$tiempo_afili->time_25_30}}</td>
                                        <td>{{$tiempo_afili->time_25_30 * 100 /($cantAsoc->mujeres + $cantAsoc->hombres)}}</td>
                                        --}}{{--<td>-</td>--}}{{--
                                        --}}{{--<td>-</td>--}}{{--
                                    </tr>
                                    <tr>
                                        <td>30 a 35 años</td>
                                        <td>{{$tiempo_afili->time_30_35}}</td>
                                        <td>{{$tiempo_afili->time_30_35 * 100 /($cantAsoc->mujeres + $cantAsoc->hombres)}}</td>
                                        --}}{{--<td>-</td>--}}{{--
                                        --}}{{--<td>-</td>--}}{{--
                                    </tr>
                                    <tr>
                                        <td>35 a 40 años</td>
                                        <td>{{$tiempo_afili->time_35_40}}</td>
                                        <td>{{$tiempo_afili->time_35_40 * 100 /($cantAsoc->mujeres + $cantAsoc->hombres)}}</td>
                                        --}}{{--<td>-</td>--}}{{--
                                        --}}{{--<td>-</td>--}}{{--
                                    </tr>
                                    <tr>
                                        <td>40 a 48 años</td>
                                        <td>{{$tiempo_afili->time_40_48}}</td>
                                        <td>{{$tiempo_afili->time_40_48 * 100 /($cantAsoc->mujeres + $cantAsoc->hombres)}}</td>
                                        --}}{{--<td>-</td>--}}{{--
                                        --}}{{--<td>-</td>--}}{{--
                                    </tr>



                                    </tbody>

                                </table>
                            </div>
                        </div>

                    </div>
                </section>

            @else


                <section class="Tabla">
                    <div class="panel panel-default">

                        <div class="panel-body">
                            <div>
                                <h3>Cantidad de Asociados</h3>

                                <table class="table  table-bordered table-sm table-hover tabla">
                                    <thead class="thead-light">
                                    <th>Número de asociados</th>
                                    <th>{{$ano->ano}}</th>
                                    <th>%</th>
                                    <th>{{$ano->ano - 1}}</th>
                                    <th>%</th>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Total</td>
                                        <td>{{$cantAsoc->mujeres + $cantAsoc->hombres}}</td>
                                        <td>100</td>
                                        <td>{{$cantAsocAnt->mujeres + $cantAsocAnt->hombres}}</td>
                                        <td>100</td>
                                    </tr>
                                    <tr>
                                        <td>Hombres</td>
                                        <td>{{$cantAsoc->hombres}}</td>
                                        <td>{{($cantAsoc->hombres*100)/($cantAsoc->mujeres + $cantAsoc->hombres)}}</td>
                                        <td>{{$cantAsocAnt->hombres}}</td>
                                        <td>{{($cantAsocAnt->hombres*100)/($cantAsocAnt->mujeres + $cantAsocAnt->hombres)}}</td>
                                    </tr>
                                    <tr>
                                        <td>Mujeres</td>
                                        <td>{{$cantAsoc->mujeres}}</td>
                                        <td>{{($cantAsoc->mujeres*100)/($cantAsoc->mujeres + $cantAsoc->hombres)}}</td>
                                        <td>{{$cantAsocAnt->mujeres}}</td>
                                        <td>{{($cantAsocAnt->mujeres*100)/($cantAsocAnt->mujeres + $cantAsocAnt->hombres)}}</td>
                                    </tr>

                                    </tbody>
                                </table>

                            </div>
                        </div>

                    </div>
                </section>

                <section class="Tabla">
                    <div class="panel panel-default">
                        <div>
                            <h3>Incorporaciones y Bajas de Asociados</h3>
                            <table class="table  table-bordered table-sm table-hover tabla">
                                <thead class="thead-light">
                                <th>Nivel</th>
                                <th>{{$ano->ano}}</th>
                                <th>{{$ano->ano - 1}}</th>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Incorporaciones</td>
                                    <td>{{$incBaj->incorporaciones}}</td>

                                    <td>{{$incBajAnt->incorporaciones}}</td>
                                </tr>
                                <tr>
                                    <td>Bajas</td>
                                    <td>{{$incBaj->bajas}}</td>

                                    <td>{{$incBajAnt->bajas}}</td>
                                </tr>
                                <tr>
                                    <td>Voluntarias</td>
                                    <td>{{$incBaj->voluntarias}}</td>

                                    <td>{{$incBajAnt->voluntarias}}</td>
                                </tr>
                                <tr>
                                    <td>Expulsados</td>
                                    <td>{{$incBaj->expulsados}}</td>

                                    <td>{{$incBajAnt->expulsados}}</td>
                                </tr>
                                </tbody>

                            </table>
                        </div>
                    </div>




                </section>

                <section class="Tabla">
                    <div class="panel panel-default">
                        <div>
                            <h3>Nivel Educacional de Asociados</h3>
                            <table class="table  table-bordered table-sm table-hover tabla">
                                <thead class="thead-light">
                                <th>Nivel</th>
                                <th>No. de Socios</th>
                                <th>%</th>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Ninguno</td>
                                    <td>{{$nivEscAsoc->ninguno}}</td>

                                    <td>{{($nivEscAsoc->ninguno*100)/($nivEscAsoc->ninguno+
                                $nivEscAsoc->básico+
                                $nivEscAsoc->medio+
                                $nivEscAsoc->universitario
                                )}}</td>
                                </tr>
                                <tr>
                                    <td>Básico</td>
                                    <td>{{$nivEscAsoc->básico}}</td>

                                    <td>{{($nivEscAsoc->básico*100)/($nivEscAsoc->ninguno+
                                $nivEscAsoc->básico+
                                $nivEscAsoc->medio+
                                $nivEscAsoc->universitario
                                )}}</td>
                                </tr>
                                <tr>
                                    <td>Medio</td>
                                    <td>{{$nivEscAsoc->medio}}</td>

                                    <td>{{($nivEscAsoc->medio*100)/($nivEscAsoc->ninguno+
                                $nivEscAsoc->básico+
                                $nivEscAsoc->medio+
                                $nivEscAsoc->universitario
                                )}}</td>
                                </tr>
                                <tr>
                                    <td>Universitario</td>
                                    <td>{{$nivEscAsoc->universitario}}</td>

                                    <td>{{($nivEscAsoc->universitario*100)/($nivEscAsoc->ninguno+
                                $nivEscAsoc->básico+
                                $nivEscAsoc->medio+
                                $nivEscAsoc->universitario
                                )}}</td>
                                </tr>

                                </tbody>

                            </table>
                        </div>
                    </div>




                </section>

                <section class="Tabla">
                    <div class="panel panel-default">
                        <div>
                            <h3>Nivel Educacional de los Empleados</h3>
                            <table class="table  table-bordered table-sm table-hover tabla">
                                <thead class="thead-light">
                                <th>Nivel</th>
                                <th>No. de Empleados</th>
                                <th>%</th>
                                </thead>
                                <tbody>

                                <tr>
                                    <td>Ninguno</td>
                                    <td>{{$nivEscEmp->ninguno}}</td>

                                    <td>{{($nivEscEmp->ninguno*100)/($nivEscEmp->ninguno +
                                  $nivEscEmp->básico +
                                  $nivEscEmp->medio +
                                  $nivEscEmp->universitario
                            )}}</td>
                                </tr>
                                <tr>
                                    <td>Básico</td>
                                    <td>{{$nivEscEmp->básico}}</td>

                                    <td>{{($nivEscEmp->básico*100)/($nivEscEmp->ninguno +
                                  $nivEscEmp->básico +
                                  $nivEscEmp->medio +
                                  $nivEscEmp->universitario
                            )}}</td>
                                </tr>
                                <tr>
                                    <td>Medio</td>
                                    <td>{{$nivEscEmp->medio}}</td>

                                    <td>{{($nivEscEmp->medio*100)/($nivEscEmp->ninguno +
                                  $nivEscEmp->básico +
                                  $nivEscEmp->medio +
                                  $nivEscEmp->universitario
                            )}}</td>
                                </tr>
                                <tr>
                                    <td>Universitario</td>
                                    <td>{{$nivEscEmp->universitario}}</td>

                                    <td>{{($nivEscEmp->universitario*100)/($nivEscEmp->ninguno +
                                  $nivEscEmp->básico +
                                  $nivEscEmp->medio +
                                  $nivEscEmp->universitario
                            )}}</td>
                                </tr>
                                <tr>
                                    <td>Total</td>
                                    <td>{{$nivEscEmp->ninguno +
                                  $nivEscEmp->básico +
                                  $nivEscEmp->medio +
                                  $nivEscEmp->universitario
                            }}</td>

                                    <td>100</td>
                                </tr>

                                </tbody>

                            </table>
                        </div>
                    </div>

                    <div class="panel-footer">
                        --}}{{--<a  href="/AddPrograma" class="btn boton pull-right">Nuevo Programa</a>--}}{{--
                        --}}{{--<a data-toggle="modal" data-target="#modal" href="#" class="btn btn-primary pull-right">Nuevo--}}{{--
                        --}}{{--Programa</a>--}}{{--
                    </div>


                </section>


            @endif


        </div>--}}


    </div>


    </div>
</body>
</html>