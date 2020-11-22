{{--@extends('layouts.app')--}}
        <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Balance</title>
    <head>
        <title>Balance </title>
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
<h1>Balance social por cooperativas </h1>
<hr>
<div >
    <div class="container">

    <br><br>
    <div class="container">

        <br>
        <div>
            @foreach($cooperativas as $coperativa )

<BR><BR>
                <div class="panel-heading">
                    <h1 class="panel-title justify-content-center"><h1 >Resultados de la Cooperativa {{$coperativa->nombre}}</h1></h1>
                </div>

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
                                        <th>Fondo de  Educación</th>
                                        <th>Mercadeo</th>
                                        <th>Comité de Género</th>
                                        <th>Otros Ingresos</th>
                                        </thead>
                                        <tbody>
                                        <tr>

                                        </tr>
                                        <tr>
                                            <td>{{$coleccion['cond_mat'.$coperativa->id]->utilidades}}</td>
                                            <td>{{$coleccion['cond_mat'.$coperativa->id]->presupuesto_coop}}</td>
                                            <td>{{$coleccion['cond_mat'.$coperativa->id]->fondo_educacion}}</td>
                                            <td>{{$coleccion['cond_mat'.$coperativa->id]->mercadeo}}</td>
                                            <td>{{$coleccion['cond_mat'.$coperativa->id]->cmte_genero}}</td>
                                            <td>{{$coleccion['cond_mat'.$coperativa->id]->otros_ingresos}}</td>
                                        </tr>

                                        </tbody>

                                    </table>

                                    <div class="panel-title pull-left"> Condición Legal</div>
                                    <div class="form-group">
                                        <textarea class="form-control" readonly>{{$coleccion['pre'.$coperativa->id]->cond_legal}} </textarea>
                                    </div>
                                    <div class="panel-title pull-left"> Condición Educativa</div>
                                    <div class="form-group">
                                        <textarea class="form-control" readonly>{{$coleccion['pre'.$coperativa->id]->cond_educativa}} </textarea>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </section>
                </div>
            </div>

            <br>






            <section class="Tabla">

                <div class="panel panel-default ">
                    <div class="panel-heading">
                        <h1 class="panel-title">Balance Social Cooperativo perteneciente al año {{$coleccion['ano'.$coperativa->id]->ano}} de la cooperativa "{{$coperativa->nombre}}" </h1>
                    </div>


                    @if($coleccion['si_tiene_metas'.$coperativa->id]==false)

                        <div class="alert alert-danger" id="alerta"  role="alert">
                            El Programa "{{$nomb_prog}}" que pertenece al año {{$ano->ano}} no tiene metas por lo que no se puede emitir un balance para este año.
                            <a href="/balance/prog" class="pull-right">Continue</a>
                        </div>

                    @else
                        <table class="table  table-bordered table-sm  table-hover tabla">
                            <thead>
                            <th class="col-sm-1">No.</th>
                            <th class="col-sm-2">Programas de desarrollo social</th>
                            <th class="col-sm-2">Presupuesto</th>
                            {{--<th class="col-sm-2">Unidades Físicas</th>--}}
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

                            @foreach( $coleccion['progs'.$coperativa->id] as $key => $prog)
                                <tr>
                                    <td>{{$key +1}}</td>
                                    <td>{{$prog->nomb_prog}}</td>
                                    <td>{{$prog->presupuesto_prog}}</td>
                                    {{--<td>unidade</td>--}}
                                    {{--<td>{{$prog->Metas->sum('manif_num')}}</td>--}}
                                    <td>{{$prog->Metas->sum('unid_fisicas_plan')}}</td>

                                    <td>{{$prog->Metas->sum('beneficiarios_plan')}}</td>
                                    @foreach($prog->Metas as $met)
                                        {{--<input type="hidden" value="{{$sum_und_fis_real=$met->GetSeguimientos->sum('unid_fisicas_real')+$sum_und_fis_real}}">--}}
                                        {{--<input type="hidden" value=" {{$sum_num_ben_real=$met->GetSeguimientos->sum('num_beneficiarios_real')+$sum_num_ben_real}}">--}}
                                        {{----}}
                                        <?php
                                        $coleccion['sum_und_fis_real'.$coperativa->id]=$met->GetSeguimientos->sum('unid_fisicas_real')+$coleccion['sum_und_fis_real'.$coperativa->id];
                                        $coleccion['sum_num_ben_real'.$coperativa->id]=$met->GetSeguimientos->sum('num_beneficiarios_real')+$coleccion['sum_num_ben_real'.$coperativa->id];
                                        ?>
                                    @endforeach
                                    <td>{{$coleccion['sum_und_fis_real'.$coperativa->id]}}</td>
                                    <td>{{$coleccion['sum_num_ben_real'.$coperativa->id]}}</td>
                                    <?php
                                    $sum_und_fis_satif=0;$sum_num_ben_satif=0;
                                    $sum_und_fis_satif=$coleccion['sum_und_fis_real'.$coperativa->id]*100/$prog->Metas->sum('unid_fisicas_plan');
                                    $sum_num_ben_satif=$coleccion['sum_num_ben_real'.$coperativa->id]*100/$prog->Metas->sum('beneficiarios_plan');

                                    $act_socil=$prog->Metas->sum('beneficiarios_plan')*100/$coleccion['total_NB'.$coperativa->id];

                                    $pat_social=round($sum_num_ben_satif,2)* $act_socil/100;/// patrimoniosocial

                                    $sum_und_fis_real=0;$sum_num_ben_real=0

                                    ?>

                                    <td>{{round($sum_und_fis_satif,2)}}</td>
                                    <td>{{round($sum_num_ben_satif,2)}}</td>
                                    @if(round($sum_num_ben_satif,2) > 100 )
                                        <td>{{round($pat_social,2)}} <small>ASA</small><br>{{round($prog->Metas->sum('beneficiarios_plan')*100/$coleccion['total_NB'.$coperativa->id],2)}} </td>
                                        <td>0</td>
                                        <td>{{round($pat_social,2)}}</td>
                                    @else

                                        <td>{{round($prog->Metas->sum('beneficiarios_plan')*100/$coleccion['total_NB'.$coperativa->id],2)}}</td>
                                        <td>{{round($act_socil-$pat_social,2)}}</td>
                                        <td>{{round($pat_social,2)}}</td>
                                    @endif
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                        {{--</div>--}}
                        {{--</div>--}}
                    @endif


                </div>
            </section>

            @endforeach
        </div>

    </div>


</div>
</div>
</body>
</html>





