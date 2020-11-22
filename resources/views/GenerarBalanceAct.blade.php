@extends('layouts.app')
@section('content')
    <br><br>
    <div class="container">
        <a  class="btn-success pull-right" href="{{ route('balance_act.pdf',['id'=>$ano->id]) }}"> Descargar PDF</a>
        <br>
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


                                    <table class="table  table-bordered table-sm table-hover tabla">
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

                                    <table class="table  table-bordered table-sm  table-hover tabla">
                                        <div class="alert alert-info"> Actividades del programa {{$prog->nomb_prog}}</div>
                                        <thead class="table-secondary">
                                        <th class="col-sm-1">No.</th>
                                        <th class="col-sm-2">Actividad</th>
                                        <th class="col-sm-2">Presupuesto</th>

                                        {{--<th class="col-sm-2">Manifestación Numérica</th>--}}
                                        <th class="col-sm-2">Unidades Físicas Planificadas</th>
                                        <th class="col-sm-2">Número de Beneficiarios Planificados</th>
                                        <th class="col-sm-2">Unidades Fisicas Reales</th>
                                        <th class="col-sm-2">Número de Beneficiarios Reales</th>
                                        <th class="col-sm-2">% Cumplimiento UF</th>
                                        <th class="col-sm-2">% Cumplimiento NB</th>
                                        <th class="col-sm-2">Activo Social</th>
                                        <th class="col-sm-2">Pasivo Social</th>
                                        <th class="col-sm-2">Patrimonio Social</th>
                                        </thead>
                                        <tbody>
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
                                                    <td >{{round($met->GetSeguimientos->sum('num_beneficiarios_real')/$met->GetSeguimientos->sum('num_benef_planif')*100 * $met->GetSeguimientos->sum('num_benef_planif')*100/$total_NB/100,2)}} <small>ASA</small>{{round($met->GetSeguimientos->sum('num_benef_planif')*100/$total_NB,2)}}</td> </td>
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


@endsection