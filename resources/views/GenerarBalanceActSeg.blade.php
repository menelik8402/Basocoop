@extends('layouts.app')
@section('content')
    <br><br>

    <div class="container">
        <a  class="btn-success pull-right" href="{{ route('balance_actseg.pdf',['id'=>$ano->id]) }}"> Descargar PDF</a>
        <br>
     {{--   <div >
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


                                    <table class="table  table-bordered table-sm table-hover tabla">
                                        <thead class="thead-light">
                                        <th>Excedentes</th>
                                        <th>% de las utilidades</th>
                                        <th>Fondo de  educación</th>
                                        <th>Mercadeo</th>
                                        <th>Comité de género</th>
                                        <th>Otros ingresos</th>
                                        </thead>
                                        <tbody>
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

                                    <div class="panel-title pull-left"> Condición Legal</div>
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
            </div>--}}

            <br>
            <section class="tabla">

                <div class="panel panel-default ">
                    <div class="panel-heading">
                        <h1 class="panel-title">Balance social cooperativo por seguimientos de actividades perteneciente al año {{$ano->ano}} " {{$nomb_coop->nombre}}"</h1>
                    </div>


               {{--     @if($si_tiene_metas==false)

                        <div class="alert alert-danger" id="alerta"  role="alert">
                            La actividad "{{$nomb_met}}" que pertenece al programa {{$nomb_prog}} del  año {{$ano->ano}} no tiene seguimientos  por lo que no se puede emitir un balance para esta actividad.
                            <a href="/balance/seg/act" class="pull-right">Continue</a>
                        </div>

                    @else --}}

                        <div class="panel-body">

                            <div class="row justify-content-center">

                           
                                @foreach($progs as $key => $prog)
                                <?php       $contador=1;   ?>

                                       <div class="alert alert-info" role="alert">  
                                       Información sobre el programa "{{$prog->nomb_prog}}"  

                                       
                                       </div>


                                        <table class="table  table-bordered table-sm  table-hover tabla">

                                        <thead class="thead-light">
                                        <th class="col-sm-1">No.</th>
                                        <th class="col-sm-2">Seguimiento</th>
                                        <th class="col-sm-2">Presupuesto aprobado</th>
                                        {{--<th class="col-sm-2">Manifestación Numérica</th>--}}
                                        <th class="col-sm-2">Unidades Físicas Planificadas</th>
                                        <th class="col-sm-2">Número de Beneficiarios Planificados</th>
                                        <th class="col-sm-2">Presup Real</th>
                                        <th class="col-sm-2">Unidades Fisicas Reales</th>
                                        <th class="col-sm-2">Número de Beneficiarios Reales</th>
                                        <th class="col-sm-2">% Cumplimiento UF</th>
                                        <th class="col-sm-2">% Cumplimiento NB</th>
                                        <th class="col-sm-2">Activo Social</th>
                                        <th class="col-sm-2">Pasivo Social</th>
                                        <th class="col-sm-2">Patrimonio Social</th>
                                        </thead>
                                        <tbody>
                                        @foreach($prog->Metas as $kil => $met)

                                        <?php

                                            $total_NB=$met->GetSeguimientos->sum('num_benef_planif');

                                            
                                           
                                        ?>
                                        <tr >
                                            <td colspan="13" align="center" style="background-color:gray">
                                            <FONT color="WHITE">  Información sobre la actividad <strong> {{$met->desc_unid_fisicas}} </strong> tiene un presupuesto asignado de <strong> ${{$met->presupuesto}}</strong>.</FONT>
                                            </td>
                                        </tr>

                                          @foreach($met->GetSeguimientos as $seg => $seguimiento)
                                             @if($seguimiento->num_benef_planif >0 )
                                                    <tr>
                                                       {{-- <td>{{$contador++}}</td>--}}
                                                       <td>{{$seg+1}}</td>
                                                        <td>{{$seguimiento->descripcion}}</td>
                                                        <td>{{$seguimiento->presup_con}}</td>
                                                        {{--  <td>{{$met->manif_num}}</td>--}}
                                                        <td>{{$seguimiento->unid_fisicas_planif}}</td>

                                                        <td>{{$seguimiento->num_benef_planif}}</td>

                                                        <td>{{$seguimiento->presup_real}}</td>

                                                        <td>{{$seguimiento->unid_fisicas_real}}</td>

                                                        <td>{{$seguimiento->num_beneficiarios_real}}</td>

                                                        <td>{{round(($seguimiento->unid_fisicas_real/$seguimiento->unid_fisicas_planif),2)*100}}</td>
                                                        <td>{{round($seguimiento->num_beneficiarios_real/$seguimiento->num_benef_planif,2)*100}}</td>

                                                        @if((round($seguimiento->num_beneficiarios_real/$seguimiento->num_benef_planif,2)*100)> 100 )
                                                            <td>{{round($met->GetSeguimientos->sum('num_beneficiarios_real')/$met->GetSeguimientos->sum('num_benef_planif')*100 * $met->GetSeguimientos->sum('num_benef_planif')*100/$total_NB/100,2)}} <small>ASA</small> <br>  {{round($seguimiento->num_benef_planif*100/$total_NB,2)}}</td>
                                                            <td>0</td>
                                                            <td>{{round($met->GetSeguimientos->sum('num_beneficiarios_real')/$met->GetSeguimientos->sum('num_benef_planif')*100 * $met->GetSeguimientos->sum('num_benef_planif')*100/$total_NB/100,2)}}</td>

                                                        @else
                                                            <td>{{round($seguimiento->num_benef_planif*100/$total_NB,2)}}</td>
                                                            <td>{{round($seguimiento->num_benef_planif*100/$total_NB - $seguimiento->num_beneficiarios_real/$seguimiento->num_benef_planif*100 * $seguimiento->num_benef_planif*100/$total_NB/100,2) }}</td>
                                                            <td>{{round($seguimiento->num_beneficiarios_real/$seguimiento->num_benef_planif*100 * $seguimiento->num_benef_planif*100/$total_NB/100,2)}}</td>
                                                        @endif
                                                        
                                                    </tr>
                                                @else
                                                <tr>
                                                        <td>{{$seg+1}}</td>
                                                        <td>{{$seguimiento->descripcion}}</td>
                                                        <td>{{$seguimiento->presup_con}}</td>
                                                        {{--  <td>{{$met->manif_num}}</td>--}}
                                                        <td>{{$seguimiento->unid_fisicas_planif}}</td>

                                                        <td>{{$seguimiento->num_benef_planif}}</td>

                                                        <td>{{$seguimiento->presup_real}}</td>

                                                        <td>{{$seguimiento->unid_fisicas_real}}</td>

                                                        <td>{{$seguimiento->num_beneficiarios_real}}</td>

                                                        <td>{{round(($seguimiento->unid_fisicas_real/$seguimiento->unid_fisicas_planif),2)*100}}</td>
                                                        <td>0</td>

                                                        
                                                        
                                                            <td>{{round($seguimiento->num_benef_planif*100/$total_NB,2)}}</td>
                                                            <td>{{round($seguimiento->num_benef_planif*100/$total_NB ,2) }}</td>
                                                            <td>0</td>
                                                       
                                                        
                                                    </tr>
                                                @endif       
                                            @endforeach

                                                <tr>
                                                      
                                                <FONT color="WHITE"> <td colspan="2" style="background-color:black"> Totales</td></FONT>
                                                       {{-- <td>{{$seguimiento->descripcion}}</td>--}}
                                                        <td>{{$met->GetSeguimientos->sum('presup_con')}}</td>
                                                        {{--  <td>{{$met->manif_num}}</td>--}}
                                                        <td>{{$met->GetSeguimientos->sum('unid_fisicas_planif')}}</td>

                                                        <td>{{$met->GetSeguimientos->sum('num_benef_planif')}}</td>

                                                        <td>{{$met->GetSeguimientos->sum('presup_real')}}</td>

                                                        <td>{{$met->GetSeguimientos->sum('unid_fisicas_real')}}</td>

                                                        <td>{{$met->GetSeguimientos->sum('num_beneficiarios_real')}}</td>
                                                        <td colspan="5" style="background-color:black"> </td>
                                                     {{--    <td>{{round(($seguimiento->unid_fisicas_real/$seguimiento->unid_fisicas_planif),2)*100}}</td>
                                                        <td>{{round($seguimiento->num_beneficiarios_real/$seguimiento->num_benef_planif,2)*100}}</td>

                                                       @if((round($seguimiento->num_beneficiarios_real/$seguimiento->num_benef_planif,2)*100)> 100 )
                                                            <td>{{round($met->GetSeguimientos->sum('num_beneficiarios_real')/$met->GetSeguimientos->sum('num_benef_planif')*100 * $met->GetSeguimientos->sum('num_benef_planif')*100/$total_NB/100,2)}} <small>ASA</small> <br>  {{round($seguimiento->num_benef_planif*100/$total_NB,2)}}</td>
                                                            <td>0</td>
                                                            <td>{{round($met->GetSeguimientos->sum('num_beneficiarios_real')/$met->GetSeguimientos->sum('num_benef_planif')*100 * $met->GetSeguimientos->sum('num_benef_planif')*100/$total_NB/100,2)}}</td>

                                                        @else
                                                            <td>{{round($seguimiento->num_benef_planif*100/$total_NB,2)}}</td>
                                                            <td>{{round($seguimiento->num_benef_planif*100/$total_NB - $seguimiento->num_beneficiarios_real/$seguimiento->num_benef_planif*100 * $seguimiento->num_benef_planif*100/$total_NB/100,2) }}</td>
                                                            <td>{{round($seguimiento->num_beneficiarios_real/$seguimiento->num_benef_planif*100 * $seguimiento->num_benef_planif*100/$total_NB/100,2)}}</td>
                                                        @endif--}}
                                                        
                                                    </tr>

                                            <? $total_NB=0 ?>
                                        @endforeach



                                        </tbody>

                                    </table>



                                @endforeach



                            </div>
                        </div>
                  {{--  @endif--}}



                </div>
            </section>


@endsection