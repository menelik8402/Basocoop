<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Document</title>


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
    <br><br>
    <div class="container">

        <br>
        <div >
        {{--    <div class="panel-heading">
                <h1 class="panel-title">Premisas</h1>
            </div>


            <div class="panel panel-default">
                <div class="panel-title pull-left"> Condición Material de la cooperativa</div>


                <div class="panel-body">
                    <section class="Tabla">
                        <div class="panel panel-default">

                            <div class="panel-body">
                                <div>


                                    <table border="2" class="table  table-bordered table-sm table-hover tabla">
                                        <thead class="thead-light">
                                        <th>Utilidades</th>
                                        <th>% de las utilidades</th>
                                        <th>Fondo de  Educación</th>
                                        <th>Mercadeo</th>
                                        <th>Comité de Género</th>
                                        <th>Otros Ingresos</th>
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

                                    <div class="panel-title pull-left"> Condición Legal</div>
                                    <div class="form-group">
                                        <textarea class="form-control" readonly>{{$premisa->cond_legal}} </textarea>
                                    </div>
                                    <div class="panel-title pull-left"> Condición Educativa</div>
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


                    {{--      @if($si_tiene_metas==false)

                        <div class="alert alert-danger" id="alerta"  role="alert">
                            La actividad "{{$nomb_met}}" que pertenece al programa {{$nomb_prog}} del  año {{$ano->ano}} no tiene seguimientos  por lo que no se puede emitir un balance para esta actividad.
                            <a href="/balance/seg/act" class="pull-right">Continue</a>
                        </div>

                    @else --}}

                        <div class="panel-body">

                            <div class="row justify-content-center">


                                @foreach($progs as $key => $prog)

                                    <div class="alert alert-info">  Información sobre el programa "{{$prog->nomb_prog}}"  </div>
                                    <table class="table  table-bordered table-sm  table-hover tabla" border="2">

                                        <thead class="table-secondary">
                                        <th class="col-sm-1">No.</th>
                                        <th class="col-sm-2"><h6>Seguimiento</h6></th>
                                        <th class="col-sm-2"><h6>Presupuesto</h6></th>
                                        {{--<th class="col-sm-2">Manifestación Numérica</th>--}}
                                        <th class="col-sm-2"><h6>Unidades Físicas Planificadas</h6></th>
                                        <th class="col-sm-2"><h6>Número de Beneficiarios Planificados</h6></th>
                                        <th class="col-sm-2">Presup Real</th>
                                        <th class="col-sm-2"><h6>Unidades Fisicas Reales</h6></th>
                                        <th class="col-sm-2"><h6>Número de Beneficiarios Reales</h6></th>
                                        <th class="col-sm-2"><h6>% Cumplimiento UF</h6></th>
                                        <th class="col-sm-2"><h6>% Cumplimiento NB</h6></th>
                                        <th class="col-sm-2"><h6>Activo Social</h6></th>
                                        <th class="col-sm-2"><h6>Pasivo Social</h6></th>
                                        <th class="col-sm-2"><h6>Patrimonio Socialv</th>
                                        </thead>
                                        <tbody>
                                        <tr>


                                        </tr>
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
                 {{--   @endif --}}



                </div>
            </section>


</div>
    </div>
</html>