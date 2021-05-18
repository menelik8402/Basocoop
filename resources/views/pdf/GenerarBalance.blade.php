
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
    <h1>Balance </h1>
    <hr>
    <div >
        <div class="container">

            <br>
            @if($indicadores=='ind')
            <div >

                    <h1 class="panel-title">Premisas</h1>




                     <h3>Condición Material de la cooperativa</h3>




                                        <table border="2" width="100%"  class="tabla3">

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

                                                <td><span class="text">{{$cond_mat->utilidades}}</span></td>
                                                <td><span class="text">{{$cond_mat->presupuesto_coop}}</span></td>
                                                <td>{{$cond_mat->fondo_educacion}}</td>
                                                <td>2266666</td>
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


                <br>

               
                    <div class="panel-heading">
                        <h1 class="panel-title">Variables</h1>
                    </div>



                    <div class="panel panel-default">
                        <div class="panel-heading"><h2>Membresia abierta y voluntaria</h2></div>
                        <div class="panel-body">

                            <section class="Tabla">
                                <div class="panel panel-default">

                                    <div class="panel-body">
                                        <div>
                                            <h3>Cantidad de Asociados</h3>

                                            @if($cantAsoc !=null)

                                                <table class="table  table-bordered table-sm table-hover tabla">
                                                    <thead class="thead-light">
                                                    <th >Género</th>
                                                    <th colspan="3">Año base : {{$cantAsoc_ant!=null ? $cantAsoc_ant->Ano->ano : 'No existe información' }} </th>
                                                    <th colspan="3">Año actual : {{$cantAsoc->Ano->ano}}</th>
                                                    <th>Variación</th>
                                                    {{--<th>%</th>--}}
                                                    </thead>
                                                    <tbody>   <tr>    </tr>
                                                    <tr >
                                                        <td></td>
                                                        <td><strong>Activos:</strong></td>
                                                        <td><strong>Inactivos:</strong></td>
                                                        <td><strong>%</strong></td>
                                                        <td><strong>Activos:</strong></td>
                                                        <td><strong>Inactivos:</strong></td>
                                                        <td><strong>%</strong></td>
                                                        <td>Cantidad Activos</td>
                                                    </tr>
                                                    <tr >
                                                        <td>Hombres</td>

                                                        <td>{{ $cantAsoc_ant!=null ? $cantAsoc_ant->hom_act : 0}}</td>
                                                        <td>{{ $cantAsoc_ant!=null ? $cantAsoc_ant->hom_inact : 0}}</td>
                                                        <td>{{ $cantAsoc_ant!=null ?  round(($cantAsoc_ant->hom_act + $cantAsoc_ant->hom_inact) * 100 /$total,2) : 0}}</td>
                                                        <td>{{ $cantAsoc!=null ? $cantAsoc->hom_act : 0}}</td>
                                                        <td>{{ $cantAsoc!=null ? $cantAsoc->hom_inact : 0}}</td>
                                                        <td>{{ $cantAsoc!=null ?  round(($cantAsoc->hom_act + $cantAsoc->hom_inact) * 100 /$total,2) : 0}}</td>
                                                        <td>{{$cantAsoc_ant!=null ? ( $cantAsoc->hom_act + $cantAsoc_ant->hom_act) : $cantAsoc->hom_act }}</td>
                                                    </tr>
                                                    <tr >
                                                        <td>Mujeres</td>

                                                        <td>{{ $cantAsoc_ant!=null ? $cantAsoc_ant->muj_act : 0}}</td>
                                                        <td>{{ $cantAsoc_ant!=null ? $cantAsoc_ant->muj_inact : 0}}</td>
                                                        <td>{{ $cantAsoc_ant!=null ?  round(($cantAsoc_ant->muj_act + $cantAsoc_ant->muj_inact) * 100 /$total,2) : 0}}</td>
                                                        <td>{{ $cantAsoc!=null ? $cantAsoc->muj_act : 0}}</td>
                                                        <td>{{ $cantAsoc!=null ? $cantAsoc->muj_inact : 0}}</td>
                                                        <td>{{ $cantAsoc!=null ?  round(($cantAsoc->muj_act + $cantAsoc->muj_inact) * 100 /$total,2) : 0}}</td>
                                                        <td>{{$cantAsoc_ant!=null ? ( $cantAsoc->muj_act + $cantAsoc_ant->muj_act) : $cantAsoc->muj_act }}</td>
                                                    </tr>
                                                    <tr >
                                                        <td>Total</td>

                                                        <td>{{ $cantAsoc_ant!=null ? $cantAsoc_ant->hom_act+$cantAsoc_ant->muj_act : 0}}</td>
                                                        <td>{{ $cantAsoc_ant!=null ? $cantAsoc_ant->hom_inact+$cantAsoc_ant->muj_inact : 0}}</td>
                                                        <td>{{ $cantAsoc_ant!=null ?  round((($cantAsoc_ant->hom_act + $cantAsoc_ant->hom_inact) * 100 /$total) + (($cantAsoc_ant->muj_act + $cantAsoc_ant->muj_inact) * 100 /$total),2) : 0}}</td>
                                                        <td>{{ $cantAsoc!=null ? $cantAsoc->hom_act+$cantAsoc->muj_act : 0}}</td>
                                                        <td>{{ $cantAsoc!=null ? $cantAsoc->hom_inact + $cantAsoc->muj_inact : 0}}</td>
                                                        <td>{{ $cantAsoc!=null ?  round((($cantAsoc->hom_act + $cantAsoc->hom_inact) * 100 /$total) + (($cantAsoc->muj_act + $cantAsoc->muj_inact) * 100 /$total),2) : 0}}</td>
                                                        <td>{{($cantAsoc_ant!=null ? ( $cantAsoc->muj_act + $cantAsoc_ant->muj_act) : $cantAsoc->muj_act) + ($cantAsoc_ant!=null ? ( $cantAsoc->hom_act + $cantAsoc_ant->hom_act) : $cantAsoc->hom_act) }}</td>
                                                    </tr>



                                                    </tbody>

                                                </table>
                                            @else
                                                <div class="alert alert-info" id="alerta"  role="alert">
                                                    No existe la variable Membresia abierta y voluntaria para el  año {{$ano->ano}} de la cooperativa "{{$nomb_coop->nombre}}".
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                            </section>


                            @if($incBaj!=null)
                                <section class="Tabla">
                                    <div class="panel panel-default">
                                        <div>
                                            <h3>Incorporaciones y Bajas de Asociados</h3>
                                            <table class="table  table-bordered table-sm table-hover tabla">
                                                <thead class="thead-light">
                                                <th>Afiliaciones</th>
                                                <th colspan="2">Año base : {{$incBaj_ant!=null ? $incBaj_ant->Ano->ano : 'No existe información' }} </th>
                                                <th colspan="2">Año actual : {{$incBaj->Ano->ano}}</th>
                                                <th>Variación</th>
                                                {{--<th>%</th>--}}
                                                </thead>
                                                <tbody>   <tr>    </tr>
                                                <tr >
                                                    <td></td>
                                                    <td><strong>Cantidad:</strong></td>
                                                    <td><strong>%</strong></td>
                                                    <td><strong>Cantidad:</strong></td>
                                                    <td><strong>%</strong></td>
                                                    <td><strong>Cantidad</strong></td>
                                                </tr>
                                                <tr >
                                                    <td>Incorporaciones</td>

                                                    <td>{{ $incBaj_ant!=null ? $incBaj_ant->incorporaciones : 0}}</td>
                                                    <td>{{ $incBaj_ant!=null ? round($incBaj_ant->incorporaciones * 100 /$total,2) : 0}}</td>
                                                    <td>{{$incBaj->incorporaciones}}</td>
                                                    <td>{{round($incBaj->incorporaciones * 100 /$total,2)}}</td>
                                                    <td>{{ $incBaj_ant!=null ? $incBaj->incorporaciones - $incBaj_ant->incorporaciones : $incBaj->incorporaciones- 0}}</td>
                                                </tr>

                                                <tr >
                                                    <td>Bajas</td>

                                                    <td>{{ $incBaj_ant!=null ? $incBaj_ant->bajas : 0}}</td>
                                                    <td>{{ $incBaj_ant!=null ? round($incBaj_ant->bajas * 100 /$total,2) : 0}}</td>
                                                    <td>{{$incBaj->bajas}}</td>
                                                    <td>{{round($incBaj->bajas * 100 /$total,2)}}</td>
                                                    <td>{{ $incBaj_ant!=null ? $incBaj->bajas - $incBaj_ant->bajas : $incBaj->bajas - 0}}</td>
                                                </tr>


                                                <tr >
                                                    <td>Expulsados</td>

                                                    <td>{{ $incBaj_ant!=null ? round($incBaj_ant->expulsados,2) : 0}}</td>
                                                    <td>{{ $incBaj_ant!=null ? round($incBaj_ant->expulsados * 100 /$total,2) : 0}}</td>
                                                    <td>{{$incBaj->expulsados}}</td>
                                                    <td>{{round($incBaj->expulsados * 100 /$total,2)}}</td>
                                                    <td>{{ $incBaj_ant!=null ? $incBaj->expulsados - $incBaj_ant->expulsados : $incBaj->expulsados - 0}}</td>
                                                </tr>





                                                </tbody>

                                            </table>
                                        </div>
                                    </div>

                                </section>
                            @else
                                <div class="alert alert-info" id="alerta"  role="alert">
                                    No existe la variable Incorporaciones y Bajas de Asociados para el  año {{$ano->ano}} de la cooperativa "{{$nomb_coop->nombre}}".
                                </div>
                            @endif


                            <section class="Tabla">
                                <div class="panel panel-default">
                                    <div>
                                        <h3>Composición según nivel educacional de los asociados</h3>
                                        @if($nivEscEmp!=null)

                                            <table class="table  table-bordered table-sm table-hover tabla">
                                                <thead class="thead-light">
                                                <th>Estado Civil</th>
                                                <th colspan="2">Año base : {{$nivEscEmp_ant!=null ? $nivEscEmp_ant->Ano->ano : 'No existe información' }} </th>
                                                <th colspan="2">Año actual : {{$nivEscEmp->Ano->ano}}</th>
                                                <th>Variación</th>
                                                {{--<th>%</th>--}}
                                                </thead>
                                                <tbody>   <tr>    </tr>
                                                <tr >
                                                    <td></td>
                                                    <td><strong>Cantidad:</strong></td>
                                                    <td><strong>%</strong></td>
                                                    <td><strong>Cantidad:</strong></td>
                                                    <td><strong>%</strong></td>
                                                    <td><strong>Cantidad</strong></td>
                                                </tr>
                                                <tr >
                                                    <td>Ninguno</td>

                                                    <td>{{ $nivEscEmp_ant!=null ? $nivEscEmp_ant->ninguno : 0}}</td>
                                                    <td>{{ $nivEscEmp_ant!=null ? round($nivEscEmp_ant->ninguno * 100 /$total,2) : 0}}</td>
                                                    <td>{{$nivEscEmp->ninguno}}</td>
                                                    <td>{{round($nivEscEmp->ninguno * 100 /$total,2)}}</td>
                                                    <td>{{ $nivEscEmp_ant!=null ? $nivEscEmp->ninguno - $nivEscEmp_ant->ninguno : $nivEscEmp->ninguno - 0}}</td>
                                                </tr>

                                                <tr >
                                                    <td>Básico</td>

                                                    <td>{{ $nivEscEmp_ant!=null ? $nivEscEmp_ant->basico : 0}}</td>
                                                    <td>{{ $nivEscEmp_ant!=null ? round($nivEscEmp_ant->basico * 100 /$total,2) : 0}}</td>
                                                    <td>{{$nivEscEmp->basico}}</td>
                                                    <td>{{round($nivEscEmp->basico * 100 /$total,2)}}</td>
                                                    <td>{{ $nivEscEmp_ant!=null ? $nivEscEmp->basico - $nivEscEmp_ant->basico : $nivEscEmp->basico - 0}}</td>
                                                </tr>
                                                <tr >
                                                    <td>Medio</td>

                                                    <td>{{ $nivEscEmp_ant!=null ? $nivEscEmp_ant->medio : 0}}</td>
                                                    <td>{{ $nivEscEmp_ant!=null ? $nivEscEmp_ant->medio * 100 /$total : 0}}</td>
                                                    <td>{{$nivEscEmp->medio}}</td>
                                                    <td>{{$nivEscEmp->medio * 100 /$total}}</td>
                                                    <td>{{ $nivEscEmp_ant!=null ? $nivEscEmp->medio - $nivEscEmp_ant->medio : $nivEscEmp->medio - 0}}</td>
                                                </tr>
                                                <tr >
                                                    <td>Superior</td>

                                                    <td>{{ $nivEscEmp_ant!=null ? $nivEscEmp_ant->universitario : 0}}</td>
                                                    <td>{{ $nivEscEmp_ant!=null ? $nivEscEmp_ant->universitario * 100 /$total : 0}}</td>
                                                    <td>{{$nivEscEmp->universitario}}</td>
                                                    <td>{{$nivEscEmp->universitario * 100 /$total}}</td>
                                                    <td>{{ $nivEscEmp_ant!=null ? $nivEscEmp->universitario - $nivEscEmp_ant->universitario : $nivEscEmp->universitario - 0}}</td>
                                                </tr>
                                                <tr >
                                                    <td>Postgrado</td>

                                                    <td>{{ $nivEscEmp_ant!=null ? $nivEscEmp_ant->postgrado : 0}}</td>
                                                    <td>{{ $nivEscEmp_ant!=null ? $nivEscEmp_ant->postgrado * 100 /$total : 0}}</td>
                                                    <td>{{$nivEscEmp->postgrado}}</td>
                                                    <td>{{$nivEscEmp->postgrado * 100 /$total}}</td>
                                                    <td>{{ $nivEscEmp_ant!=null ? $nivEscEmp->postgrado - $nivEscEmp_ant->postgrado : $nivEscEmp->postgrado - 0}}</td>
                                                </tr>

                                                <tr >
                                                    <td>Total</td>

                                                    <td>{{ $nivEscEmp_ant!=null ? $nivEscEmp_ant->postgrado + $nivEscEmp_ant->universitario + $nivEscEmp_ant->medio + $nivEscEmp_ant->basico  + $nivEscEmp_ant->ninguno : 0}}</td>
                                                    <td>{{ ($nivEscEmp_ant!=null ? $nivEscEmp_ant->postgrado * 100 /$total : 0) + ($nivEscEmp_ant!=null ? $nivEscEmp_ant->universitario * 100 /$total : 0) + ($nivEscEmp_ant!=null ? $nivEscEmp_ant->medio * 100 /$total : 0) + ($nivEscEmp_ant!=null ? $nivEscEmp_ant->basico * 100 /$total : 0) + ($nivEscEmp_ant!=null ? $nivEscEmp_ant->ninguno * 100 /$total : 0) }}</td>
                                                    <td>{{$nivEscEmp->postgrado +$nivEscEmp->basico +$nivEscEmp->universitario +$nivEscEmp->medio +$nivEscEmp->ninguno}}</td>
                                                    <td>{{($nivEscEmp->postgrado * 100 /$total) + ($nivEscEmp->basico * 100 /$total) + ($nivEscEmp->universitario * 100 /$total) + ($nivEscEmp->medio * 100 /$total) + ($nivEscEmp->ninguno * 100 /$total) }}</td>
                                                    <td>{{ ($nivEscEmp_ant!=null ? $nivEscEmp->postgrado - $nivEscEmp_ant->postgrado : $nivEscEmp->postgrado - 0) + ($nivEscEmp_ant!=null ? $nivEscEmp->universitario - $nivEscEmp_ant->universitario : $nivEscEmp->universitario - 0) + ($nivEscEmp_ant!=null ? $nivEscEmp->basico - $nivEscEmp_ant->basico : $nivEscEmp->basico - 0) + ($nivEscEmp_ant!=null ? $nivEscEmp->medio - $nivEscEmp_ant->medio : $nivEscEmp->medio - 0) + ($nivEscEmp_ant!=null ? $nivEscEmp->ninguno - $nivEscEmp_ant->ninguno : $nivEscEmp->ninguno - 0)  }}</td>
                                                </tr>








                                                </tbody>

                                            </table>
                                        @else
                                            <div class="alert alert-info" id="alerta"  role="alert">
                                                No existe la variable Composición según nivel educacional de los asociados para el  año {{$ano->ano}} de la cooperativa "{{$nomb_coop->nombre}}".
                                            </div>
                                        @endif
                                    </div>
                                </div>

                            </section>


                            <section class="Tabla">
                                <div class="panel panel-default">
                                    <div>
                                        <h3>Estado civil de los asociados</h3>

                                        @if($est_civil!=null)
                                            <table class="table  table-bordered table-sm table-hover tabla">
                                                <thead class="thead-light">
                                                <th>Estado Civil</th>
                                                <th colspan="2">Año base : {{$est_civil_ant!=null ? $est_civil_ant->Ano->ano : 'No existe información' }} </th>
                                                <th colspan="2">Año actual : {{$est_civil->Ano->ano}}</th>
                                                <th>Variación</th>
                                                {{--<th>%</th>--}}
                                                </thead>
                                                <tbody>   <tr>    </tr>
                                                <tr >
                                                    <td></td>
                                                    <td><strong>Cantidad:</strong></td>
                                                    <td><strong>%</strong></td>
                                                    <td><strong>Cantidad:</strong></td>
                                                    <td><strong>%</strong></td>
                                                    <td><strong>Cantidad</strong></td>
                                                </tr>
                                                <tr >
                                                    <td>Solteros</td>

                                                    <td>{{ $est_civil_ant!=null ? $est_civil_ant->soltero : 0}}</td>
                                                    <td>{{ $est_civil_ant!=null ? round($est_civil_ant->soltero * 100 /$total,2) : 0}}</td>
                                                    <td>{{$est_civil->soltero}}</td>
                                                    <td>{{round($est_civil->soltero * 100 /$total,2)}}</td>
                                                    <td>{{ $est_civil_ant!=null ? $est_civil->soltero - $est_civil_ant->soltero : $est_civil->soltero - 0}}</td>
                                                </tr>

                                                <tr >
                                                    <td>Casado </td>

                                                    <td>{{ $est_civil_ant!=null ? $est_civil_ant->casado : 0}}</td>
                                                    <td>{{ $est_civil_ant!=null ? round($est_civil_ant->casado * 100 /$total,2) : 0}}</td>
                                                    <td>{{$est_civil->casado}}</td>
                                                    <td>{{round($est_civil->casado * 100 /$total,2)}}</td>
                                                    <td>{{ $est_civil_ant!=null ? $est_civil->casado - $est_civil_ant->casado : $est_civil->casado - 0}}</td>
                                                </tr>


                                                <tr >
                                                    <td>Union Libre</td>

                                                    <td>{{ $est_civil_ant!=null ? $est_civil_ant->unionlibre : 0}}</td>
                                                    <td>{{ $est_civil_ant!=null ? $est_civil_ant->unionlibre * 100 /$total : 0}}</td>
                                                    <td>{{$est_civil->unionlibre}}</td>
                                                    <td>{{round($est_civil->unionlibre * 100 /$total,2)}}</td>
                                                    <td>{{ $est_civil_ant!=null ? $est_civil->unionlibre - $est_civil_ant->unionlibre : $est_civil->unionlibre - 0}}</td>
                                                </tr>
                                                <tr >
                                                    <td>Total</td>

                                                    <td>{{ $est_civil_ant!=null ? $est_civil_ant->casado + $est_civil_ant->soltero + $est_civil_ant->unionlibre : 0}}</td>
                                                    <td>{{ $est_civil_ant!=null ? round(($est_civil_ant->unionlibre * 100 /$total) + ($est_civil_ant->soltero * 100 /$total) + ($est_civil_ant->casado * 100 /$total),2) : 0}}</td>
                                                    <td>{{$est_civil->unionlibre + $est_civil->soltero + $est_civil->casado}}</td>
                                                    <td>{{round(($est_civil->unionlibre * 100 /$total) + ($est_civil->soltero * 100 /$total) + ($est_civil->casado * 100 /$total),2)}}</td>
                                                    <td>{{ ($est_civil_ant!=null ? $est_civil->unionlibre - $est_civil_ant->unionlibre : $est_civil->unionlibre - 0) + ($est_civil_ant!=null ? $est_civil->soltero - $est_civil_ant->soltero : $est_civil->soltero - 0) + ($est_civil_ant!=null ? $est_civil->casado - $est_civil_ant->casado : $est_civil->casado - 0)}}</td>
                                                </tr>






                                                </tbody>

                                            </table>
                                        @else
                                            <div class="alert alert-info" id="alerta"  role="alert">
                                                No existe la variableEstado civil de los asociados para el  año {{$ano->ano}} de la cooperativa "{{$nomb_coop->nombre}}".
                                            </div>
                                        @endif

                                    </div>
                                </div>

                            </section>


                            <section class="Tabla">
                                <div class="panel panel-default">
                                    <div>
                                        <h3>Composición por edades de los asociados</h3>

                                        @if($comp_edad_asoc!=null)
                                            <table class="table  table-bordered table-sm table-hover tabla">


                                                <thead class="thead-light">
                                                <th>Rangos de edad
                                                    (años)
                                                </th>
                                                <th colspan="2">Año base : {{$comp_edad_asoc_ant!=null ? $comp_edad_asoc_ant->Ano->ano : 'No existe información' }} </th>
                                                <th colspan="2">Año actual : {{$comp_edad_asoc->Ano->ano}}</th>
                                                <th>Variación</th>
                                                {{--<th>%</th>--}}
                                                </thead>
                                                <tbody>   <tr>    </tr>
                                                <tr >
                                                    <td></td>
                                                    <td><strong>Cantidad:</strong></td>
                                                    <td><strong>%</strong></td>
                                                    <td><strong>Cantidad:</strong></td>
                                                    <td><strong>%</strong></td>
                                                    <td><strong>Cantidad</strong></td>
                                                </tr>
                                                <tr >
                                                    <td>18-25</td>

                                                    <td>{{ $comp_edad_asoc_ant!=null ? $comp_edad_asoc_ant->edad_18_25 : 0}}</td>
                                                    <td>{{ $comp_edad_asoc_ant!=null ? round($comp_edad_asoc_ant->edad_18_25 * 100 /$total,2) : 0}}</td>
                                                    <td>{{$comp_edad_asoc->edad_18_25}}</td>
                                                    <td>{{round($comp_edad_asoc->edad_18_25 * 100 /$total,2)}}</td>
                                                    <td>{{ $est_civil_ant!=null ? $comp_edad_asoc->edad_18_25 - $comp_edad_asoc_ant->edad_18_25 : $comp_edad_asoc->edad_18_25 - 0}}</td>
                                                </tr>
                                                <tr >
                                                    <td>26-35</td>

                                                    <td>{{ $comp_edad_asoc_ant!=null ? $comp_edad_asoc_ant->edad_26_35 : 0}}</td>
                                                    <td>{{ $comp_edad_asoc_ant!=null ? round($comp_edad_asoc_ant->edad_26_35 * 100 /$total,2) : 0}}</td>
                                                    <td>{{$comp_edad_asoc->edad_26_35}}</td>
                                                    <td>{{round($comp_edad_asoc->edad_26_35 * 100 /$total,2)}}</td>
                                                    <td>{{ $est_civil_ant!=null ? $comp_edad_asoc->edad_26_35 - $comp_edad_asoc_ant->edad_26_35 : $comp_edad_asoc->edad_26_35 - 0}}</td>
                                                </tr>
                                                <tr >
                                                    <td>36-45</td>

                                                    <td>{{ $comp_edad_asoc_ant!=null ? $comp_edad_asoc_ant->edad_36_45 : 0}}</td>
                                                    <td>{{ $comp_edad_asoc_ant!=null ? round($comp_edad_asoc_ant->edad_36_45 * 100 /$total,2) : 0}}</td>
                                                    <td>{{$comp_edad_asoc->edad_36_45}}</td>
                                                    <td>{{round($comp_edad_asoc->edad_36_45 * 100 /$total,2)}}</td>
                                                    <td>{{ $est_civil_ant!=null ? $comp_edad_asoc->edad_36_45 - $comp_edad_asoc_ant->edad_36_45 : $comp_edad_asoc->edad_36_45 - 0}}</td>
                                                </tr>
                                                <tr >
                                                    <td>46-55</td>

                                                    <td>{{ $comp_edad_asoc_ant!=null ? $comp_edad_asoc_ant->edad_46_55 : 0}}</td>
                                                    <td>{{ $comp_edad_asoc_ant!=null ? round($comp_edad_asoc_ant->edad_46_55 * 100 /$total,2) : 0}}</td>
                                                    <td>{{$comp_edad_asoc->edad_46_55}}</td>
                                                    <td>{{round($comp_edad_asoc->edad_46_55 * 100 /$total,2)}}</td>
                                                    <td>{{ $est_civil_ant!=null ? $comp_edad_asoc->edad_46_55 - $comp_edad_asoc_ant->edad_46_55 : $comp_edad_asoc->edad_46_55 - 0}}</td>
                                                </tr>
                                                <tr >
                                                    <td>56-60</td>

                                                    <td>{{ $comp_edad_asoc_ant!=null ? $comp_edad_asoc_ant->edad_56_60 : 0}}</td>
                                                    <td>{{ $comp_edad_asoc_ant!=null ? round($comp_edad_asoc_ant->edad_56_60 * 100 /$total,2) : 0}}</td>
                                                    <td>{{$comp_edad_asoc->edad_56_60}}</td>
                                                    <td>{{round($comp_edad_asoc->edad_56_60 * 100 /$total,2)}}</td>
                                                    <td>{{ $est_civil_ant!=null ? $comp_edad_asoc->edad_56_60 - $comp_edad_asoc_ant->edad_56_60 : $comp_edad_asoc->edad_56_60 - 0}}</td>
                                                </tr>
                                                <tr >
                                                    <td>61-70</td>

                                                    <td>{{ $comp_edad_asoc_ant!=null ? $comp_edad_asoc_ant->edad_61_70 : 0}}</td>
                                                    <td>{{ $comp_edad_asoc_ant!=null ? round($comp_edad_asoc_ant->edad_61_70 * 100 /$total,2) : 0}}</td>
                                                    <td>{{$comp_edad_asoc->edad_61_70}}</td>
                                                    <td>{{round($comp_edad_asoc->edad_61_70 * 100 /$total,2)}}</td>
                                                    <td>{{ $est_civil_ant!=null ? $comp_edad_asoc->edad_61_70 - $comp_edad_asoc_ant->edad_61_70 : $comp_edad_asoc->edad_61_70 - 0}}</td>
                                                </tr>
                                                <tr >
                                                    <td>más 70</td>

                                                    <td>{{ $comp_edad_asoc_ant!=null ? $comp_edad_asoc_ant->mas70 : 0}}</td>
                                                    <td>{{ $comp_edad_asoc_ant!=null ? round($comp_edad_asoc_ant->mas70 * 100 /$total,2) : 0}}</td>
                                                    <td>{{$comp_edad_asoc->mas70}}</td>
                                                    <td>{{round($comp_edad_asoc->mas70 * 100 /$total,2)}}</td>
                                                    <td>{{ $est_civil_ant!=null ? $comp_edad_asoc->mas70 - $comp_edad_asoc_ant->mas70 : $comp_edad_asoc->mas70 - 0}}</td>
                                                </tr>

                                                <tr >
                                                    <td>Total</td>

                                                    <td>{{ $comp_edad_asoc_ant!=null ? $comp_edad_asoc_ant->mas70+ $comp_edad_asoc_ant->edad_18_25+ $comp_edad_asoc_ant->edad_26_35+ $comp_edad_asoc_ant->edad_36_45+ $comp_edad_asoc_ant->edad_46_55+ $comp_edad_asoc_ant->edad_56_60+ $comp_edad_asoc_ant->edad_61_70+ $comp_edad_asoc_ant->edad_mas70 : 0}}</td>
                                                    <td>{{ $comp_edad_asoc_ant!=null ? round(($comp_edad_asoc_ant->mas70* 100 /$total)+( $comp_edad_asoc_ant->edad_18_25* 100 /$total)+( $comp_edad_asoc_ant->edad_26_35* 100 /$total)+( $comp_edad_asoc_ant->edad_36_45* 100 /$total)+( $comp_edad_asoc_ant->edad_46_55* 100 /$total)+( $comp_edad_asoc_ant->edad_56_60* 100 /$total)+( $comp_edad_asoc_ant->edad_61_70* 100 /$total)+( $comp_edad_asoc_ant->edad_mas70 * 100 /$total),2) : 0}}</td>
                                                    <td>{{ $comp_edad_asoc!=null ? $comp_edad_asoc->mas70+ $comp_edad_asoc->edad_18_25+ $comp_edad_asoc->edad_26_35+ $comp_edad_asoc->edad_36_45+ $comp_edad_asoc->edad_46_55+ $comp_edad_asoc->edad_56_60+ $comp_edad_asoc->edad_61_70+ $comp_edad_asoc->edad_mas70 : 0}}</td>
                                                    <td>{{$comp_edad_asoc!=null ? round(($comp_edad_asoc->mas70* 100 /$total)+( $comp_edad_asoc->edad_18_25* 100 /$total)+( $comp_edad_asoc->edad_26_35* 100 /$total)+( $comp_edad_asoc->edad_36_45* 100 /$total)+( $comp_edad_asoc->edad_46_55* 100 /$total)+( $comp_edad_asoc->edad_56_60* 100 /$total)+( $comp_edad_asoc->edad_61_70* 100 /$total)+( $comp_edad_asoc->edad_mas70 * 100 /$total),2) : 0}}</td>
                                                    <td>{{ $est_civil_ant!=null ? $comp_edad_asoc->mas70+ $comp_edad_asoc->edad_18_25+ $comp_edad_asoc->edad_26_35+ $comp_edad_asoc->edad_36_45+ $comp_edad_asoc->edad_46_55+ $comp_edad_asoc->edad_56_60+ $comp_edad_asoc->edad_61_70+ $comp_edad_asoc->edad_mas70  - ($comp_edad_asoc_ant->mas70+ $comp_edad_asoc_ant->edad_18_25+ $comp_edad_asoc_ant->edad_26_35+ $comp_edad_asoc_ant->edad_36_45+ $comp_edad_asoc_ant->edad_46_55+ $comp_edad_asoc_ant->edad_56_60+ $comp_edad_asoc_ant->edad_61_70+ $comp_edad_asoc_ant->edad_mas70 ) : $comp_edad_asoc->mas70+ $comp_edad_asoc->edad_18_25+ $comp_edad_asoc->edad_26_35+ $comp_edad_asoc->edad_36_45+ $comp_edad_asoc->edad_46_55+ $comp_edad_asoc->edad_56_60+ $comp_edad_asoc->edad_61_70+ $comp_edad_asoc->edad_mas70}}</td>
                                                </tr>










                                                </tbody>

                                            </table>
                                        @else
                                            <div class="alert alert-info" id="alerta"  role="alert">
                                                No existe la variableComposición por edades de los asociados para el  año {{$ano->ano}} de la cooperativa "{{$nomb_coop->nombre}}".
                                            </div>
                                        @endif
                                    </div>
                                </div>

                            </section>


                            <section class="Tabla">
                                <div class="panel panel-default">
                                    <div>
                                        <h3>Tiempo de afiliación de los asociados</h3>
                                        @if($tiempo_afili!=null)
                                            <table class="table  table-bordered table-sm table-hover tabla">
                                                <thead class="thead-light">
                                                <th>Tiempo de afiliación (años)
                                                </th>
                                                <th colspan="2">Año base : {{$tiempo_afili_ant!=null ? $tiempo_afili_ant->Ano->ano : 'No existe información' }} </th>
                                                <th colspan="2">Año actual : {{$tiempo_afili->Ano->ano}}</th>
                                                <th>Variación</th>
                                                {{--<th>%</th>--}}
                                                </thead>
                                                <tbody>   <tr>    </tr>
                                                <tr >
                                                    <td></td>
                                                    <td><strong>Cantidad:</strong></td>
                                                    <td><strong>%</strong></td>
                                                    <td><strong>Cantidad:</strong></td>
                                                    <td><strong>%</strong></td>
                                                    <td><strong>Cantidad</strong></td>
                                                </tr>
                                                <tr >
                                                    <td>0-1</td>

                                                    <td>{{ $tiempo_afili_ant!=null ? $tiempo_afili_ant->time_0_1 : 0}}</td>
                                                    <td>{{ $tiempo_afili_ant!=null ? round($tiempo_afili_ant->time_0_1 * 100 /$total,2) : 0}}</td>
                                                    <td>{{$tiempo_afili->time_0_1}}</td>
                                                    <td>{{round($tiempo_afili->time_0_1 * 100 /$total,2)}}</td>
                                                    <td>{{ $est_civil_ant!=null ? $tiempo_afili->time_0_1 - $tiempo_afili_ant->time_0_1 : $tiempo_afili->time_0_1 - 0}}</td>
                                                </tr>
                                                <tr >
                                                    <td>1-2</td>

                                                    <td>{{ $tiempo_afili_ant!=null ? $tiempo_afili_ant->time_1_2 : 0}}</td>
                                                    <td>{{ $tiempo_afili_ant!=null ? round($tiempo_afili_ant->time_1_2 * 100 /$total,2) : 0}}</td>
                                                    <td>{{$tiempo_afili->time_1_2}}</td>
                                                    <td>{{round($tiempo_afili->time_1_2 * 100 /$total,2)}}</td>
                                                    <td>{{ $est_civil_ant!=null ? $tiempo_afili->time_1_2 - $tiempo_afili_ant->time_1_2 : $tiempo_afili->time_1_2 - 0}}</td>
                                                </tr>
                                                <tr >
                                                    <td>3-5</td>

                                                    <td>{{ $tiempo_afili_ant!=null ? $tiempo_afili_ant->time_3_5 : 0}}</td>
                                                    <td>{{ $tiempo_afili_ant!=null ? round($tiempo_afili_ant->time_3_5 * 100 /$total,2) : 0}}</td>
                                                    <td>{{$tiempo_afili->time_3_5}}</td>
                                                    <td>{{round($tiempo_afili->time_3_5 * 100 /$total,2)}}</td>
                                                    <td>{{ $est_civil_ant!=null ? $tiempo_afili->time_3_5 - $tiempo_afili_ant->time_3_5 : $tiempo_afili->time_3_5 - 0}}</td>
                                                </tr>
                                                <tr >
                                                    <td>5-10</td>

                                                    <td>{{ $tiempo_afili_ant!=null ? $tiempo_afili_ant->time_5_10 : 0}}</td>
                                                    <td>{{ $tiempo_afili_ant!=null ? round($tiempo_afili_ant->time_5_10 * 100 /$total,2) : 0}}</td>
                                                    <td>{{$tiempo_afili->time_5_10}}</td>
                                                    <td>{{round($tiempo_afili->time_5_10 * 100 /$total,2)}}</td>
                                                    <td>{{ $est_civil_ant!=null ? $tiempo_afili->time_5_10 - $tiempo_afili_ant->time_5_10 : $tiempo_afili->time_5_10 - 0}}</td>
                                                </tr>
                                                <tr >
                                                    <td>10-15</td>

                                                    <td>{{ $tiempo_afili_ant!=null ? $tiempo_afili_ant->time_10_15 : 0}}</td>
                                                    <td>{{ $tiempo_afili_ant!=null ? round($tiempo_afili_ant->time_10_15 * 100 /$total,2) : 0}}</td>
                                                    <td>{{$tiempo_afili->time_10_15}}</td>
                                                    <td>{{round($tiempo_afili->time_10_15 * 100 /$total,2)}}</td>
                                                    <td>{{ $est_civil_ant!=null ? $tiempo_afili->time_10_15 - $tiempo_afili_ant->time_10_15 : $tiempo_afili->time_10_15 - 0}}</td>
                                                </tr>
                                                <tr >
                                                    <td>15-20</td>

                                                    <td>{{ $tiempo_afili_ant!=null ? $tiempo_afili_ant->time_15_20 : 0}}</td>
                                                    <td>{{ $tiempo_afili_ant!=null ? round($tiempo_afili_ant->time_15_20 * 100 /$total,2) : 0}}</td>
                                                    <td>{{$tiempo_afili->time_15_20}}</td>
                                                    <td>{{round($tiempo_afili->time_15_20 * 100 /$total,2)}}</td>
                                                    <td>{{ $est_civil_ant!=null ? $tiempo_afili->time_15_20 - $tiempo_afili_ant->time_15_20 : $tiempo_afili->time_15_20 - 0}}</td>
                                                </tr>
                                                <tr >
                                                    <td>20-25</td>

                                                    <td>{{ $tiempo_afili_ant!=null ? $tiempo_afili_ant->time_20_25 : 0}}</td>
                                                    <td>{{ $tiempo_afili_ant!=null ? round($tiempo_afili_ant->time_20_25 * 100 /$total,2) : 0}}</td>
                                                    <td>{{$tiempo_afili->time_20_25}}</td>
                                                    <td>{{round($tiempo_afili->time_20_25 * 100 /$total,2)}}</td>
                                                    <td>{{ $est_civil_ant!=null ? $tiempo_afili->time_20_25 - $tiempo_afili_ant->time_20_25 : $tiempo_afili->time_20_25 - 0}}</td>
                                                </tr>
                                                <tr >
                                                    <td>25-30</td>

                                                    <td>{{ $tiempo_afili_ant!=null ? $tiempo_afili_ant->time_25_30 : 0}}</td>
                                                    <td>{{ $tiempo_afili_ant!=null ? round($tiempo_afili_ant->time_25_30 * 100 /$total,2) : 0}}</td>
                                                    <td>{{$tiempo_afili->time_25_30}}</td>
                                                    <td>{{round($tiempo_afili->time_25_30 * 100 /$total,2)}}</td>
                                                    <td>{{ $est_civil_ant!=null ? $tiempo_afili->time_25_30 - $tiempo_afili_ant->time_25_30 : $tiempo_afili->time_25_30 - 0}}</td>
                                                </tr>
                                                <tr >
                                                    <td>30-35</td>

                                                    <td>{{ $tiempo_afili_ant!=null ? $tiempo_afili_ant->time_30_35 : 0}}</td>
                                                    <td>{{ $tiempo_afili_ant!=null ? round($tiempo_afili_ant->time_30_35 * 100 /$total,2) : 0}}</td>
                                                    <td>{{$tiempo_afili->time_30_35}}</td>
                                                    <td>{{round($tiempo_afili->time_30_35 * 100 /$total,2)}}</td>
                                                    <td>{{ $est_civil_ant!=null ? $tiempo_afili->time_30_35 - $tiempo_afili_ant->time_30_35 : $tiempo_afili->time_30_35 - 0}}</td>
                                                </tr>
                                                <tr >
                                                    <td>35-40</td>

                                                    <td>{{ $tiempo_afili_ant!=null ? $tiempo_afili_ant->time_35_40 : 0}}</td>
                                                    <td>{{ $tiempo_afili_ant!=null ? round($tiempo_afili_ant->time_35_40 * 100 /$total,2) : 0}}</td>
                                                    <td>{{$tiempo_afili->time_35_40}}</td>
                                                    <td>{{round($tiempo_afili->time_35_40 * 100 /$total,2)}}</td>
                                                    <td>{{ $est_civil_ant!=null ? $tiempo_afili->time_35_40 - $tiempo_afili_ant->time_35_40 : $tiempo_afili->time_35_40 - 0}}</td>
                                                </tr>
                                                <tr >
                                                    <td>40-50</td>

                                                    <td>{{ $tiempo_afili_ant!=null ? $tiempo_afili_ant->time_40_48 : 0}}</td>
                                                    <td>{{ $tiempo_afili_ant!=null ? round($tiempo_afili_ant->time_40_48 * 100 /$total,2) : 0}}</td>
                                                    <td>{{$tiempo_afili->time_40_48}}</td>
                                                    <td>{{round($tiempo_afili->time_40_48 * 100 /$total,2)}}</td>
                                                    <td>{{ $est_civil_ant!=null ? $tiempo_afili->time_40_48 - $tiempo_afili_ant->time_40_48 : $tiempo_afili->time_40_48 - 0}}</td>
                                                </tr>
                                                <tr >
                                                    <td>Más de  50</td>

                                                    <td>{{ $tiempo_afili_ant!=null ? $tiempo_afili_ant->timemas50  : 0}}</td>
                                                    <td>{{ $tiempo_afili_ant!=null ? round($tiempo_afili_ant->timemas50 * 100 /$total,2) : 0}}</td>
                                                    <td>{{$tiempo_afili->timemas50}}</td>
                                                    <td>{{round($tiempo_afili->timemas50 * 100 /$total,2)}}</td>
                                                    <td>{{ $est_civil_ant!=null ? $tiempo_afili->timemas50 - $tiempo_afili_ant->timemas50 : $tiempo_afili->timemas50 - 0}}</td>
                                                </tr>
                                                <tr >
                                                    <td>Total</td>

                                                    <td>{{ $tiempo_afili_ant!=null ? $tiempo_afili_ant->timemas50+$tiempo_afili_ant->time_40_48+$tiempo_afili_ant->time_35_40+ $tiempo_afili_ant->time_30_35+ $tiempo_afili_ant->time_25_30+$tiempo_afili_ant->time_20_25+ $tiempo_afili_ant->time_15_20+$tiempo_afili_ant->time_10_15+$tiempo_afili_ant->time_5_10+$tiempo_afili_ant->time_3_5+$tiempo_afili_ant->time_1_2 : 0}}</td>
                                                    <td>{{ $tiempo_afili_ant!=null ? round(($tiempo_afili_ant->timemas50* 100 /$total)+($tiempo_afili_ant->time_40_48* 100 /$total)+($tiempo_afili_ant->time_35_40* 100 /$total)+( $tiempo_afili_ant->time_30_35* 100 /$total)+( $tiempo_afili_ant->time_25_30* 100 /$total)+($tiempo_afili_ant->time_20_25* 100 /$total)+( $tiempo_afili_ant->time_15_20* 100 /$total)+($tiempo_afili_ant->time_10_15* 100 /$total)+($tiempo_afili_ant->time_5_10* 100 /$total)+($tiempo_afili_ant->time_3_5* 100 /$total)+($tiempo_afili_ant->time_1_2* 100 /$total),2): 0}}</td>
                                                    <td>{{$tiempo_afili->timemas50+$tiempo_afili->time_40_48+$tiempo_afili->time_35_40+ $tiempo_afili->time_30_35+ $tiempo_afili->time_25_30+$tiempo_afili->time_20_25+ $tiempo_afili->time_15_20+$tiempo_afili->time_10_15+$tiempo_afili->time_5_10+$tiempo_afili->time_3_5+$tiempo_afili->time_1_2 }}</td>
                                                    <td>{{round(($tiempo_afili->timemas50* 100 /$total)+($tiempo_afili->time_40_48* 100 /$total)+($tiempo_afili->time_35_40* 100 /$total)+( $tiempo_afili->time_30_35* 100 /$total)+( $tiempo_afili->time_25_30* 100 /$total)+($tiempo_afili->time_20_25* 100 /$total)+( $tiempo_afili->time_15_20* 100 /$total)+($tiempo_afili->time_10_15* 100 /$total)+($tiempo_afili->time_5_10* 100 /$total)+($tiempo_afili->time_3_5* 100 /$total)+($tiempo_afili->time_1_2* 100 /$total),2)}}</td>
                                                    <td>{{ $est_civil_ant!=null ? ($tiempo_afili->timemas50+$tiempo_afili->time_40_48+$tiempo_afili->time_35_40+ $tiempo_afili->time_30_35+ $tiempo_afili->time_25_30+$tiempo_afili->time_20_25+ $tiempo_afili->time_15_20+$tiempo_afili->time_10_15+$tiempo_afili->time_5_10+$tiempo_afili->time_3_5+$tiempo_afili->time_1_2) -($tiempo_afili_ant->timemas50+$tiempo_afili_ant->time_40_48+$tiempo_afili_ant->time_35_40+ $tiempo_afili_ant->time_30_35+ $tiempo_afili_ant->time_25_30+$tiempo_afili_ant->time_20_25+ $tiempo_afili_ant->time_15_20+$tiempo_afili_ant->time_10_15+$tiempo_afili_ant->time_5_10+$tiempo_afili_ant->time_3_5+$tiempo_afili_ant->time_1_2) : $tiempo_afili->timemas50+$tiempo_afili->time_40_48+$tiempo_afili->time_35_40+ $tiempo_afili->time_30_35+ $tiempo_afili->time_25_30+$tiempo_afili->time_20_25+ $tiempo_afili->time_15_20+$tiempo_afili->time_10_15+$tiempo_afili->time_5_10+$tiempo_afili->time_3_5+$tiempo_afili->time_1_2 - 0}}</td>
                                                </tr>



                                                </tbody>

                                            </table>
                                        @else
                                            <div class="alert alert-info" id="alerta"  role="alert">
                                                No existe la variable Tiempo de afiliación de los asociados para el  año {{$ano->ano}} de la cooperativa "{{$nomb_coop->nombre}}".
                                            </div>
                                        @endif
                                    </div>
                                </div>

                            </section>



                            <section class="Tabla">
                                <div class="panel panel-default">

                                    <div class="panel-body">
                                        <div>
                                            <h3>Categoría ocupacional de asociados</h3>

                                            @if($cat_ocup_asoc!=null)
                                                <table class="table  table-bordered table-sm table-hover tabla">
                                                    <thead class="thead-light">
                                                    <th>Categoría ocupacional</th>
                                                    <th colspan="2">Año base : {{$cat_ocup_asoc_ant!=null ? $cat_ocup_asoc_ant->GetAno->ano : 'No existe información' }} </th>
                                                    <th colspan="2">Año actual : {{$cat_ocup_asoc->GetAno->ano}}</th>
                                                    <th>Variación</th>
                                                    {{--<th>%</th>--}}
                                                    </thead>
                                                    <tbody>   <tr>    </tr>
                                                    <tr >
                                                        <td></td>
                                                        <td><strong>Cantidad:</strong></td>
                                                        <td><strong>%</strong></td>
                                                        <td><strong>Cantidad:</strong></td>
                                                        <td><strong>%</strong></td>
                                                        <td><strong>Cantidad</strong></td>
                                                    </tr>
                                                    <tr >
                                                        <td>Empleados del sector público</td>

                                                        <td>{{ $cat_ocup_asoc_ant!=null ? $cat_ocup_asoc_ant->empsectpub : 0}}</td>
                                                        <td>{{ $cat_ocup_asoc_ant!=null ? round($cat_ocup_asoc_ant->empsectpub * 100 /$total,2) : 0}}</td>
                                                        <td>{{$cat_ocup_asoc->empsectpub}}</td>
                                                        <td>{{round($cat_ocup_asoc->empsectpub * 100 /$total,2)}}</td>
                                                        <td>{{ $cat_ocup_asoc_ant!=null ? $cat_ocup_asoc->empsectpub-$cat_ocup_asoc_ant->empsectpub : $cat_ocup_asoc->empsectpub-0}}</td>
                                                    </tr>

                                                    <tr >
                                                        <td>Empleados del sector privado</td>

                                                        <td>{{ $cat_ocup_asoc_ant!=null ? $cat_ocup_asoc_ant->empsectpri : 0}}</td>
                                                        <td>{{ $cat_ocup_asoc_ant!=null ? round($cat_ocup_asoc_ant->empsectpri * 100 /$total,2) : 0}}</td>
                                                        <td>{{$cat_ocup_asoc->empsectpri}}</td>
                                                        <td>{{round($cat_ocup_asoc->empsectpri * 100 /$total,2)}}</td>
                                                        <td>{{ $cat_ocup_asoc_ant!=null ? $cat_ocup_asoc->empsectpri-$cat_ocup_asoc_ant->empsectpri : $cat_ocup_asoc->empsectpri-0}}</td>
                                                    </tr>

                                                    <tr >
                                                        <td>Comerciantes</td>

                                                        <td>{{ $cat_ocup_asoc_ant!=null ? $cat_ocup_asoc_ant->comerc : 0}}</td>
                                                        <td>{{ $cat_ocup_asoc_ant!=null ? round($cat_ocup_asoc_ant->comerc * 100 /$total,2) : 0}}</td>
                                                        <td>{{$cat_ocup_asoc->comerc}}</td>
                                                        <td>{{round($cat_ocup_asoc->comerc * 100 /$total,2)}}</td>
                                                        <td>{{ $cat_ocup_asoc_ant!=null ? $cat_ocup_asoc->comerc-$cat_ocup_asoc_ant->comerc : $cat_ocup_asoc->comerc-0}}</td>
                                                    </tr>

                                                    <tr >
                                                        <td>Productores</td>

                                                        <td>{{ $cat_ocup_asoc_ant!=null ? $cat_ocup_asoc_ant->product : 0}}</td>
                                                        <td>{{ $cat_ocup_asoc_ant!=null ? round($cat_ocup_asoc_ant->product * 100 /$total,2) : 0}}</td>
                                                        <td>{{$cat_ocup_asoc->product}}</td>
                                                        <td>{{round($cat_ocup_asoc->product * 100 /$total,2)}}</td>
                                                        <td>{{ $cat_ocup_asoc_ant!=null ? $cat_ocup_asoc->product - $cat_ocup_asoc_ant->product : $cat_ocup_asoc->product - 0}}</td>
                                                    </tr>
                                                    <tr >
                                                        <td>Estudiantes</td>

                                                        <td>{{ $cat_ocup_asoc_ant!=null ? $cat_ocup_asoc_ant->estudiat : 0}}</td>
                                                        <td>{{ $cat_ocup_asoc_ant!=null ? round($cat_ocup_asoc_ant->estudiat * 100 /$total,2) : 0}}</td>
                                                        <td>{{$cat_ocup_asoc->estudiat}}</td>
                                                        <td>{{round($cat_ocup_asoc->estudiat * 100 /$total,2)}}</td>
                                                        <td>{{ $cat_ocup_asoc_ant!=null ? $cat_ocup_asoc->estudiat - $cat_ocup_asoc_ant->estudiat : $cat_ocup_asoc->estudiat - 0}}</td>
                                                    </tr>
                                                    <tr >
                                                        <td>Jubilados</td>

                                                        <td>{{ $cat_ocup_asoc_ant!=null ? $cat_ocup_asoc_ant->jubilado : 0}}</td>
                                                        <td>{{ $cat_ocup_asoc_ant!=null ? round($cat_ocup_asoc_ant->jubilado * 100 /$total,2) : 0}}</td>
                                                        <td>{{$cat_ocup_asoc->jubilado}}</td>
                                                        <td>{{round($cat_ocup_asoc->jubilado * 100 /$total,2)}}</td>
                                                        <td>{{ $cat_ocup_asoc_ant!=null ? $cat_ocup_asoc->jubilado - $cat_ocup_asoc_ant->jubilado : $cat_ocup_asoc->jubilado - 0}}</td>
                                                    </tr>

                                                    <tr >
                                                        <td>Profesionales independientes</td>

                                                        <td>{{ $cat_ocup_asoc_ant!=null ? $cat_ocup_asoc_ant->profind : 0}}</td>
                                                        <td>{{ $cat_ocup_asoc_ant!=null ? round($cat_ocup_asoc_ant->profind * 100 /$total,2) : 0}}</td>
                                                        <td>{{$cat_ocup_asoc->profind}}</td>
                                                        <td>{{round($cat_ocup_asoc->profind * 100 /$total,2)}}</td>
                                                        <td>{{ $cat_ocup_asoc_ant!=null ? $cat_ocup_asoc->profind - $cat_ocup_asoc_ant->profind : $cat_ocup_asoc->profind - 0}}</td>
                                                    </tr>

                                                    <tr >
                                                        <td>Otros</td>

                                                        <td>{{ $cat_ocup_asoc_ant!=null ? $cat_ocup_asoc_ant->otroscat : 0}}</td>
                                                        <td>{{ $cat_ocup_asoc_ant!=null ? round($cat_ocup_asoc_ant->otroscat * 100 /$total,2) : 0}}</td>
                                                        <td>{{$cat_ocup_asoc->otroscat}}</td>
                                                        <td>{{round($cat_ocup_asoc->otroscat * 100 /$total,2)}}</td>
                                                        <td>{{ $cat_ocup_asoc_ant!=null ? $cat_ocup_asoc->otroscat - $cat_ocup_asoc_ant->otroscat : $cat_ocup_asoc->otroscat - 0}}</td>
                                                    </tr>
                                                    <tr >
                                                        <td>Total</td>

                                                        <td>{{ $cat_ocup_asoc_ant!=null ? $cat_ocup_asoc_ant->estudiat+ $cat_ocup_asoc_ant->jubilado+$cat_ocup_asoc_ant->profind+ $cat_ocup_asoc_ant->product +$cat_ocup_asoc_ant->comerc +$cat_ocup_asoc_ant->empsectpub +$cat_ocup_asoc_ant->otroscat +$cat_ocup_asoc_ant->empsectpri  : 0}}</td>
                                                        <td>{{ $cat_ocup_asoc_ant!=null ? round(($cat_ocup_asoc_ant->estudiat* 100 /$total)+( $cat_ocup_asoc_ant->jubilado* 100 /$total)+($cat_ocup_asoc_ant->profind* 100 /$total)+( $cat_ocup_asoc_ant->product * 100 /$total)+($cat_ocup_asoc_ant->comerc * 100 /$total)+($cat_ocup_asoc_ant->empsectpub * 100 /$total)+($cat_ocup_asoc_ant->otroscat * 100 /$total)+($cat_ocup_asoc_ant->empsectpri* 100 /$total),2): 0}}</td>
                                                        <td>{{$cat_ocup_asoc->estudiat+ $cat_ocup_asoc->jubilado+$cat_ocup_asoc->profind+ $cat_ocup_asoc->product +$cat_ocup_asoc->comerc +$cat_ocup_asoc->empsectpub +$cat_ocup_asoc->otroscat +$cat_ocup_asoc->empsectpri }}</td>
                                                        <td>{{round(($cat_ocup_asoc->estudiat* 100 /$total)+( $cat_ocup_asoc->jubilado* 100 /$total)+($cat_ocup_asoc->profind* 100 /$total)+( $cat_ocup_asoc->product * 100 /$total)+($cat_ocup_asoc->comerc * 100 /$total)+($cat_ocup_asoc->empsectpub * 100 /$total)+($cat_ocup_asoc->otroscat * 100 /$total)+($cat_ocup_asoc->empsectpri* 100 /$total),2)}}</td>
                                                        <td>{{ $cat_ocup_asoc_ant!=null ? ($cat_ocup_asoc->estudiat+ $cat_ocup_asoc->jubilado+$cat_ocup_asoc->profind+ $cat_ocup_asoc->product +$cat_ocup_asoc->comerc +$cat_ocup_asoc->empsectpub +$cat_ocup_asoc->otroscat +$cat_ocup_asoc->empsectpri ) - ($cat_ocup_asoc_ant->estudiat+ $cat_ocup_asoc_ant->jubilado+$cat_ocup_asoc_ant->profind+ $cat_ocup_asoc_ant->product +$cat_ocup_asoc_ant->comerc +$cat_ocup_asoc_ant->empsectpub +$cat_ocup_asoc_ant->otroscat +$cat_ocup_asoc_ant->empsectpri) : ($cat_ocup_asoc->estudiat+ $cat_ocup_asoc->jubilado+$cat_ocup_asoc->profind+ $cat_ocup_asoc->product +$cat_ocup_asoc->comerc +$cat_ocup_asoc->empsectpub +$cat_ocup_asoc->otroscat +$cat_ocup_asoc->empsectpri ) - 0}}</td>
                                                    </tr>

                                                    </tbody>

                                                </table>
                                            @else
                                                <div class="alert alert-info" id="alerta"  role="alert">
                                                    No existe la variable Categoría ocupacional de asociados para el  año {{$ano->ano}} de la cooperativa "{{$nomb_coop->nombre}}".
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                            </section>


                            <section class="Tabla">
                                <div class="panel panel-default">

                                    <div class="panel-body">
                                        <div>
                                            <h3>Solicitudes de afiliación</h3>
                                            @if($soli_afili_asoc!=null)


                                                <table class="table  table-bordered table-sm table-hover tabla">
                                                    <thead class="thead-light">
                                                    <th>Afiliaciones</th>
                                                    <th colspan="2">Año base : {{$soli_afili_asoc_ant!=null ? $soli_afili_asoc_ant->Ano->ano : 'No existe información' }} </th>
                                                    <th colspan="2">Año actual : {{$soli_afili_asoc->Ano->ano}}</th>
                                                    <th>Variación</th>
                                                    {{--<th>%</th>--}}
                                                    </thead>
                                                    <tbody>   <tr>    </tr>
                                                    <tr >
                                                        <td></td>
                                                        <td><strong>Cantidad:</strong></td>
                                                        <td><strong>%</strong></td>
                                                        <td><strong>Cantidad:</strong></td>
                                                        <td><strong>%</strong></td>
                                                        <td><strong>Cantidad</strong></td>
                                                    </tr>
                                                    <tr >
                                                        <td>Realizadas</td>

                                                        <td>{{ $soli_afili_asoc_ant!=null ? $soli_afili_asoc_ant->realizada : 0}}</td>
                                                        <td>{{ $soli_afili_asoc_ant!=null ? round($soli_afili_asoc_ant->realizada * 100 /$total,2) : 0}}</td>
                                                        <td>{{$soli_afili_asoc->realizada}}</td>
                                                        <td>{{round($soli_afili_asoc->realizada * 100 /$total,2)}}</td>
                                                        <td>{{ $soli_afili_asoc_ant!=null ? $soli_afili_asoc->realizada - $soli_afili_asoc_ant->realizada : $soli_afili_asoc->empsectpub-0}}</td>
                                                    </tr>
                                                    <tr >
                                                        <td>Aprobadas</td>

                                                        <td>{{ $soli_afili_asoc_ant!=null ? $soli_afili_asoc_ant->aprobada : 0}}</td>
                                                        <td>{{ $soli_afili_asoc_ant!=null ? round($soli_afili_asoc_ant->aprobada * 100 /$total,2) : 0}}</td>
                                                        <td>{{$soli_afili_asoc->aprobada}}</td>
                                                        <td>{{round($cat_ocup_asoc->aprobada * 100 /$total,2)}}</td>
                                                        <td>{{ $soli_afili_asoc_ant!=null ? $soli_afili_asoc->aprobada - $soli_afili_asoc_ant->aprobada : $soli_afili_asoc->aprobada - 0}}</td>
                                                    </tr>
                                                    <tr >
                                                        <td>Rechazadas</td>

                                                        <td>{{ $soli_afili_asoc_ant!=null ? $soli_afili_asoc_ant->rechazada : 0}}</td>
                                                        <td>{{ $soli_afili_asoc_ant!=null ? round($soli_afili_asoc_ant->rechazada * 100 /$total,2) : 0}}</td>
                                                        <td>{{$soli_afili_asoc->rechazada}}</td>
                                                        <td>{{round($cat_ocup_asoc->rechazada * 100 /$total,2)}}</td>
                                                        <td>{{ $soli_afili_asoc_ant!=null ? $soli_afili_asoc->rechazada - $soli_afili_asoc_ant->rechazada : $soli_afili_asoc->rechazada - 0}}</td>
                                                    </tr>
                                                    <tr >
                                                        <td>Total</td>

                                                        <td>{{ $soli_afili_asoc_ant!=null ? $soli_afili_asoc_ant->rechazada + $soli_afili_asoc_ant->aprobada + $soli_afili_asoc_ant->realizada : 0}}</td>
                                                        <td>{{ $soli_afili_asoc_ant!=null ? round(($soli_afili_asoc_ant->rechazada * 100 /$total) + ($soli_afili_asoc_ant->aprobada * 100 /$total) + ($soli_afili_asoc_ant->realizada * 100 /$total),2) : 0}}</td>
                                                        <td>{{$soli_afili_asoc->rechazada + $soli_afili_asoc->aprobada + $soli_afili_asoc->realizada}}</td>
                                                        <td>{{round(($soli_afili_asoc->rechazada * 100 /$total) + ($soli_afili_asoc->aprobada * 100 /$total) + ($soli_afili_asoc->realizada * 100 /$total),2)}}</td>
                                                        <td>{{ $soli_afili_asoc_ant!=null ? ($soli_afili_asoc->rechazada + $soli_afili_asoc->aprobada + $soli_afili_asoc->realizada) - ($soli_afili_asoc_ant->rechazada + $soli_afili_asoc_ant->aprobada + $soli_afili_asoc_ant->realizada) : ($soli_afili_asoc->rechazada + $soli_afili_asoc->aprobada + $soli_afili_asoc->realizada) - 0}}</td>
                                                    </tr>


                                                    </tbody>

                                                </table>
                                            @else
                                                <div class="alert alert-info" id="alerta"  role="alert">
                                                    No existe la variable Solicitudes de afiliación para el  año {{$ano->ano}} de la cooperativa "{{$nomb_coop->nombre}}".
                                                </div>
                                            @endif


                                        </div>
                                    </div>

                                </div>
                            </section>



                            <section class="Tabla">
                                <div class="panel panel-default">

                                    <div class="panel-body">
                                        <div>
                                            <h3>Rotación de los asociados</h3>
                                            @if($rot_asoc!=null)


                                                <table class="table  table-bordered table-sm table-hover tabla">
                                                    <thead class="thead-light">
                                                    <th>Afiliaciones</th>
                                                    <th colspan="2">Año base : {{$rot_asoc_ant!=null ? $rot_asoc_ant->Ano->ano : 'No existe información' }} </th>
                                                    <th colspan="2">Año actual : {{$rot_asoc->Ano->ano}}</th>
                                                    <th>Variación</th>
                                                    {{--<th>%</th>--}}
                                                    </thead>
                                                    <tbody>   <tr>    </tr>
                                                    <tr >
                                                        <td></td>
                                                        <td><strong>Cantidad:</strong></td>
                                                        <td><strong>%</strong></td>
                                                        <td><strong>Cantidad:</strong></td>
                                                        <td><strong>%</strong></td>
                                                        <td><strong>Cantidad</strong></td>
                                                    </tr>
                                                    <tr >
                                                        <td>Ingresos</td>

                                                        <td>{{ $rot_asoc_ant!=null ? $rot_asoc_ant->ingreso : 0}}</td>
                                                        <td>{{ $rot_asoc_ant!=null ? round($rot_asoc_ant->ingreso * 100 /$total,2) : 0}}</td>
                                                        <td>{{$rot_asoc->ingreso}}</td>
                                                        <td>{{round($rot_asoc->ingreso * 100 /$total,2)}}</td>
                                                        <td>{{ $rot_asoc_ant!=null ? $rot_asoc->ingreso - $rot_asoc_ant->ingreso : $rot_asoc->ingreso - 0}}</td>
                                                    </tr>
                                                    <tr >
                                                        <td>Hombres</td>

                                                        <td>{{ $rot_asoc_ant!=null ? $rot_asoc_ant->hombres_ing : 0}}</td>
                                                        <td>{{ $rot_asoc_ant!=null ? round($rot_asoc_ant->hombres_ing * 100 /$total,2) : 0}}</td>
                                                        <td>{{$rot_asoc->hombres_ing}}</td>
                                                        <td>{{round($rot_asoc->hombres_ing * 100 /$total,2)}}</td>
                                                        <td>{{ $rot_asoc_ant!=null ? $rot_asoc->hombres_ing - $rot_asoc_ant->hombres_ing : $rot_asoc->hombres_ing - 0}}</td>
                                                    </tr>
                                                    <tr >
                                                        <td>Mujeres</td>

                                                        <td>{{ $rot_asoc_ant!=null ? $rot_asoc_ant->mujeres_ing : 0}}</td>
                                                        <td>{{ $rot_asoc_ant!=null ? round($rot_asoc_ant->mujeres_ing * 100 /$total,2) : 0}}</td>
                                                        <td>{{$rot_asoc->mujeres_ing}}</td>
                                                        <td>{{round($rot_asoc->mujeres_ing * 100 /$total,2)}}</td>
                                                        <td>{{ $rot_asoc_ant!=null ? $rot_asoc->mujeres_ing - $rot_asoc_ant->mujeres_ing : $rot_asoc->mujeres_ing - 0}}</td>
                                                    </tr>

                                                    <tr  >
                                                        <td>Retiros</td>

                                                        <td>{{ $rot_asoc_ant!=null ? $rot_asoc_ant->retiro : 0}}</td>
                                                        <td>{{ $rot_asoc_ant!=null ? round($rot_asoc_ant->retiro * 100 /$total,2) : 0}}</td>
                                                        <td>{{$rot_asoc->retiro}}</td>
                                                        <td>{{round($rot_asoc->retiro * 100 /$total,2)}}</td>
                                                        <td>{{ $rot_asoc_ant!=null ? $rot_asoc->retiro - $rot_asoc_ant->retiro : $rot_asoc->retiro - 0}}</td>
                                                    </tr>
                                                    <tr >
                                                        <td>Hombres</td>

                                                        <td>{{ $rot_asoc_ant!=null ? $rot_asoc_ant->hombres_ret : 0}}</td>
                                                        <td>{{ $rot_asoc_ant!=null ? round($rot_asoc_ant->hombres_ret * 100 /$total,2) : 0}}</td>
                                                        <td>{{$rot_asoc->hombres_ret}}</td>
                                                        <td>{{round($rot_asoc->hombres_ret * 100 /$total,2)}}</td>
                                                        <td>{{ $rot_asoc_ant!=null ? $rot_asoc->hombres_ret - $rot_asoc_ant->hombres_ret : $rot_asoc->hombres_ret - 0}}</td>
                                                    </tr>
                                                    <tr >
                                                        <td>Mujeres</td>

                                                        <td>{{ $rot_asoc_ant!=null ? $rot_asoc_ant->mujeres_ret : 0}}</td>
                                                        <td>{{ $rot_asoc_ant!=null ? $rot_asoc_ant->mujeres_ret * 100 /$total : 0}}</td>
                                                        <td>{{$rot_asoc->mujeres_ret}}</td>
                                                        <td>{{round($rot_asoc->mujeres_ret * 100 /$total,2)}}</td>
                                                        <td>{{ $rot_asoc_ant!=null ? $rot_asoc->mujeres_ret - $rot_asoc_ant->mujeres_ret : $rot_asoc->mujeres_ret - 0}}</td>
                                                    </tr>




                                                    </tbody>

                                                </table>
                                            @else
                                                <div class="alert alert-info" id="alerta"  role="alert">
                                                    No existe la variable Rotación de los asociados para el  año {{$ano->ano}} de la cooperativa "{{$nomb_coop->nombre}}".
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                            </section>


                            <section class="Tabla">
                                <div class="panel panel-default">

                                    <div class="panel-body">
                                        <div>
                                            <h3>Causas de los retiros de asociados</h3>
                                            @if($ret_asoc!=null)


                                                <table class="table  table-bordered table-sm table-hover tabla">
                                                    <thead class="thead-light">
                                                    <th>Causas</th>
                                                    <th colspan="2">Año base : {{$ret_asoc_ant!=null ? $ret_asoc_ant->Ano->ano : 'No existe información' }} </th>
                                                    <th colspan="2">Año actual : {{$ret_asoc->Ano->ano}}</th>
                                                    <th>Variación</th>
                                                    {{--<th>%</th>--}}
                                                    </thead>
                                                    <tbody>   <tr>    </tr>
                                                    <tr >
                                                        <td></td>
                                                        <td><strong>Cantidad:</strong></td>
                                                        <td><strong>%</strong></td>
                                                        <td><strong>Cantidad:</strong></td>
                                                        <td><strong>%</strong></td>
                                                        <td><strong>Cantidad</strong></td>
                                                    </tr>
                                                    <tr >
                                                        <td>Retiros voluntarios</td>

                                                        <td>{{ $ret_asoc_ant!=null ? $ret_asoc_ant->retvoluntario : 0}}</td>
                                                        <td>{{ $ret_asoc_ant!=null ? round($ret_asoc_ant->retvoluntario * 100 /$total,2) : 0}}</td>
                                                        <td>{{$ret_asoc->retvoluntario}}</td>
                                                        <td>{{round($ret_asoc->retvoluntario * 100 /$total,2)}}</td>
                                                        <td>{{ $ret_asoc_ant!=null ? $ret_asoc->retvoluntario - $ret_asoc_ant->retvoluntario : $ret_asoc->retvoluntario-0}}</td>
                                                    </tr>
                                                    <tr >
                                                        <td>Fallecimientos</td>

                                                        <td>{{ $ret_asoc_ant!=null ? $ret_asoc_ant->fallecimiento : 0}}</td>
                                                        <td>{{ $ret_asoc_ant!=null ? round($ret_asoc_ant->fallecimiento * 100 /$total,2) : 0}}</td>
                                                        <td>{{$ret_asoc->fallecimiento}}</td>
                                                        <td>{{round($ret_asoc->fallecimiento * 100 /$total,2)}}</td>
                                                        <td>{{ $ret_asoc_ant!=null ? $ret_asoc->fallecimiento - $ret_asoc_ant->fallecimiento : $ret_asoc->fallecimiento-0}}</td>
                                                    </tr>
                                                    <tr >
                                                        <td>Retiro voluntario</td>

                                                        <td>{{ $ret_asoc_ant!=null ? $ret_asoc_ant->sanciones : 0}}</td>
                                                        <td>{{ $ret_asoc_ant!=null ? round($ret_asoc_ant->sanciones * 100 /$total,2) : 0}}</td>
                                                        <td>{{$ret_asoc->sanciones}}</td>
                                                        <td>{{round($ret_asoc->sanciones * 100 /$total,2)}}</td>
                                                        <td>{{ $ret_asoc_ant!=null ? $ret_asoc->sanciones - $ret_asoc_ant->sanciones : $ret_asoc->sanciones - 0}}</td>
                                                    </tr>


                                                    </tbody>

                                                </table>
                                            @else
                                                <div class="alert alert-info" id="alerta"  role="alert">
                                                    No existe la variable Causas de los retiros de asociados para el  año {{$ano->ano}} de la cooperativa "{{$nomb_coop->nombre}}".
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                            </section>



                            <section class="Tabla">
                                <div class="panel panel-default">
                                    <div>
                                        <h3>Composición por género de los empleados</h3>
                                        @if($emp!=null)
                                            <table class="table  table-bordered table-sm table-hover tabla">
                                                <thead class="thead-light">
                                                <th>Género</th>
                                                <th colspan="2">Año base : {{$emp_ant!=null ? $emp_ant->Ano->ano : 'No existe información' }} </th>
                                                <th colspan="2">Año actual : {{$emp->Ano->ano}}</th>
                                                <th>Variación</th>
                                                {{--<th>%</th>--}}
                                                </thead>
                                                <tbody>   <tr>    </tr>
                                                <tr >
                                                    <td></td>
                                                    <td><strong>Cantidad:</strong></td>
                                                    <td><strong>%</strong></td>
                                                    <td><strong>Cantidad:</strong></td>
                                                    <td><strong>%</strong></td>
                                                    <td><strong>Cantidad</strong></td>
                                                </tr>
                                                <tr >
                                                    <td>Hombres</td>

                                                    <td>{{ $emp_ant!=null ? $emp_ant->hom_emp : 0}}</td>
                                                    <td>{{ $emp_ant!=null ? $emp_ant->hom_emp * 100 /$total : 0}}</td>
                                                    <td>{{$emp->hom_emp}}</td>
                                                    <td>{{$emp->hom_emp * 100 /$total}}</td>
                                                    <td>{{ $emp_ant!=null ? $emp->hom_emp - $emp_ant->hom_emp : $emp->hom_emp - 0}}</td>
                                                </tr>

                                                <tr >
                                                    <td>Mujeres</td>

                                                    <td>{{ $emp_ant!=null ? $emp_ant->muj_emp : 0}}</td>
                                                    <td>{{ $emp_ant!=null ? round($emp_ant->muj_emp * 100 /$total,2) : 0}}</td>
                                                    <td>{{$emp->muj_emp}}</td>
                                                    <td>{{round($emp->muj_emp * 100 /$total,2)}}</td>
                                                    <td>{{ $emp_ant!=null ? $emp->muj_emp - $emp_ant->muj_emp : $emp->muj_emp - 0}}</td>
                                                </tr>
                                                <tr >
                                                    <td>Total</td>

                                                    <td>{{ $emp_ant!=null ?  $emp_ant->muj_emp + $emp_ant->hom_emp : 0}}</td>
                                                    <td>{{ $emp_ant!=null ? round(($emp_ant->muj_emp * 100 /$total) + ($emp_ant->hom_emp * 100 /$total),2) : 0}}</td>
                                                    <td>{{$emp->muj_emp + $emp->hom_emp}}</td>
                                                    <td>{{round(($emp->muj_emp * 100 /$total) + ($emp->hom_emp * 100 /$total),2)}}</td>
                                                    <td>{{ $emp_ant!=null ? ($emp->muj_emp + $emp->hom_emp) - ( $emp_ant->muj_emp + $emp_ant->hom_emp) : ($emp->muj_emp + $emp->hom_emp) - 0}}</td>
                                                </tr>





                                                </tbody>

                                            </table>
                                        @else
                                            <div class="alert alert-info" id="alerta"  role="alert">
                                                No existe la variable Composición por género de los empleados para el  año {{$ano->ano}} de la cooperativa "{{$nomb_coop->nombre}}".
                                            </div>
                                        @endif
                                    </div>
                                </div>

                            </section>

                        </div>
                    </div>

                    <br>

                    <div class="panel panel-default">
                        <div class="panel-heading"><h2>Control Democrático de los Miembros</h2></div>
                        <div class="panel-body">

                            <section class="Tabla">
                                <div class="panel panel-default">
                                    <div>
                                        <h3>Comportamiento de las asambleas de asociados</h3>
                                        @if($compAsam!=null)
                                            <table class="table  table-bordered table-sm table-hover tabla">
                                                <thead class="thead-light">
                                                <th>Asambleas de asociados</th>
                                                <th colspan="2">Año base : {{$compAsam_ant!=null ? $compAsam_ant->Ano->ano : 'No existe información' }} </th>
                                                <th colspan="2">Año actual : {{$compAsam->Ano->ano}}</th>
                                                <th>Variación</th>
                                                {{--<th>%</th>--}}
                                                </thead>
                                                <tbody>   <tr>    </tr>
                                                <tr >
                                                    <td></td>
                                                    <td><strong>Cantidad:</strong></td>
                                                    <td><strong>%</strong></td>
                                                    <td><strong>Cantidad:</strong></td>
                                                    <td><strong>%</strong></td>
                                                    <td><strong>Cantidad</strong></td>
                                                </tr>
                                                <tr >
                                                    <td>Programadas</td>

                                                    <td>{{ $compAsam_ant!=null ? $compAsam_ant->convocadas : 0}}</td>
                                                    <td>{{ $compAsam_ant!=null ? round($compAsam_ant->convocadas * 100 /$totalcd,2) : 0}}</td>
                                                    <td>{{$compAsam->convocadas}}</td>
                                                    <td>{{round($compAsam->convocadas * 100 /$totalcd,2)}}</td>
                                                    <td>{{ $compAsam_ant!=null ? $compAsam->convocadas - $compAsam_ant->convocadas : $compAsam->convocadas - 0}}</td>
                                                </tr>
                                                <tr >
                                                    <td>Realizadas</td>

                                                    <td>{{ $compAsam_ant!=null ? $compAsam_ant->efectuadas : 0}}</td>
                                                    <td>{{ $compAsam_ant!=null ? round($compAsam_ant->efectuadas * 100 /$totalcd,2) : 0}}</td>
                                                    <td>{{$compAsam->efectuadas}}</td>
                                                    <td>{{round($compAsam->efectuadas * 100 /$totalcd,2)}}</td>
                                                    <td>{{ $compAsam_ant!=null ? $compAsam->efectuadas - $compAsam_ant->efectuadas : $compAsam->efectuadas - 0}}</td>
                                                </tr>
                                                <tr >
                                                    <td>Extraordinarias</td>

                                                    <td>{{ $compAsam_ant!=null ? $compAsam_ant->delegados : 0}}</td>
                                                    <td>{{ $compAsam_ant!=null ? round($compAsam_ant->delegados * 100 /$totalcd,2) : 0}}</td>
                                                    <td>{{$compAsam->delegados}}</td>
                                                    <td>{{round($compAsam->delegados * 100 /$totalcd,2)}}</td>
                                                    <td>{{ $compAsam_ant!=null ? $compAsam->delegados - $compAsam_ant->delegados : $compAsam->delegados - 0}}</td>
                                                </tr>
                                                <tr >
                                                    <td>totalcd</td>
                                                    <td>{{ $compAsam_ant!=null ? $compAsam_ant->convocadas +  $compAsam_ant->efectuadas +$compAsam_ant->delegados : 0}}</td>
                                                    <td>{{ $compAsam_ant!=null ? round(($compAsam_ant->convocadas * 100 /$totalcd) + ($compAsam_ant->efectuadas * 100 /$totalcd) + ($compAsam_ant->delegados * 100 /$totalcd),2) : 0}}</td>
                                                    <td>{{$compAsam->convocadas+$compAsam->efectuadas+$compAsam->delegados}}</td>
                                                    <td>{{ $compAsam!=null ? round(($compAsam->convocadas * 100 /$totalcd) + ($compAsam->efectuadas * 100 /$totalcd) + ($compAsam->delegados * 100 /$totalcd),2) : 0}}</td>
                                                    <td>{{ ($compAsam_ant!=null ? $compAsam->efectuadas - $compAsam_ant->efectuadas : $compAsam->efectuadas - 0) + ($compAsam_ant!=null ? $compAsam->convocadas - $compAsam_ant->convocadas : $compAsam->convocadas - 0) + ($compAsam_ant!=null ? $compAsam->delegados - $compAsam_ant->delegados : $compAsam->delegados - 0)}}</td>

                                                </tr>







                                                </tbody>

                                            </table>
                                        @else
                                            <div class="alert alert-info" id="alerta"  role="alert">
                                                No existe la variable Comportamiento de las asambleas de asociados para el  año {{$ano->ano}} de la cooperativa "{{$nomb_coop->nombre}}".
                                            </div>
                                        @endif
                                    </div>
                                </div>

                            </section>

                            <section class="Tabla">
                                <div class="panel panel-default">
                                    <div>
                                        <h3>Estado de cumplimiento de los acuerdos de las Asambleas Generales de Asociados</h3>
                                        @if($est_cump_asam!=null)
                                            <table class="table  table-bordered table-sm table-hover tabla">
                                                <thead class="thead-light">
                                                <th>Acuerdos</th>
                                                <th colspan="2">Año base : {{$est_cump_asam_ant!=null ? $est_cump_asam_ant->Ano->ano : 'No existe información' }} </th>
                                                <th colspan="2">Año actual : {{$est_cump_asam->Ano->ano}}</th>
                                                <th>Variación</th>
                                                {{--<th>%</th>--}}
                                                </thead>
                                                <tbody>   <tr>    </tr>
                                                <tr >
                                                    <td></td>
                                                    <td><strong>Cantidad:</strong></td>
                                                    <td><strong>%</strong></td>
                                                    <td><strong>Cantidad:</strong></td>
                                                    <td><strong>%</strong></td>
                                                    <td><strong>Cantidad</strong></td>
                                                </tr>
                                                <tr >
                                                    <td>Cumplidos</td>

                                                    <td>{{ $est_cump_asam_ant!=null ? $est_cump_asam_ant->cumplido : 0}}</td>
                                                    <td>{{ $est_cump_asam_ant!=null ? round($est_cump_asam_ant->cumplido * 100 /$totalcd ,2): 0}}</td>
                                                    <td>{{$est_cump_asam->cumplido}}</td>
                                                    <td>{{round($est_cump_asam->cumplido * 100 /$totalcd,2)}}</td>
                                                    <td>{{ $est_cump_asam_ant!=null ? $est_cump_asam->cumplido  - $est_cump_asam_ant->cumplido :$est_cump_asam->cumplido- 0}}</td>
                                                </tr>
                                                <tr >
                                                    <td>En proceso de cumplimiento</td>

                                                    <td>{{ $est_cump_asam_ant!=null ? $est_cump_asam_ant->proc_cump : 0}}</td>
                                                    <td>{{ $est_cump_asam_ant!=null ? round($est_cump_asam_ant->proc_cump * 100 /$totalcd,2) : 0}}</td>
                                                    <td>{{$est_cump_asam->proc_cump}}</td>
                                                    <td>{{round($est_cump_asam->proc_cump * 100 /$totalcd,2)}}</td>
                                                    <td>{{ $est_cump_asam_ant!=null ? $est_cump_asam->proc_cump  - $est_cump_asam_ant->proc_cump :$est_cump_asam->proc_cump - 0}}</td>
                                                </tr>
                                                <tr >
                                                    <td>totalcd</td>

                                                    <td>{{ $est_cump_asam_ant!=null ? $est_cump_asam_ant->proc_cump + $est_cump_asam_ant->cumplido  : 0}}</td>
                                                    <td>{{ $est_cump_asam_ant!=null ? round(( $est_cump_asam_ant->proc_cump * 100 /$totalcd) + ( $est_cump_asam_ant->cumplido * 100 /$totalcd),2) : 0}}</td>
                                                    <td>{{$est_cump_asam->proc_cump + $est_cump_asam->cumplido}}</td>
                                                    <td>{{round(($est_cump_asam->proc_cump * 100 /$totalcd) + ($est_cump_asam->cumplido * 100 /$totalcd),2)}}</td>
                                                    <td>{{ $est_cump_asam_ant!=null ?($est_cump_asam->proc_cump + $est_cump_asam->cumplido) - ($est_cump_asam_ant->proc_cump + $est_cump_asam_ant->cumplido) : ($est_cump_asam->proc_cump + $est_cump_asam->cumplido) - 0}}</td>
                                                </tr>








                                                </tbody>

                                            </table>
                                        @else
                                            <div class="alert alert-info" id="alerta"  role="alert">
                                                No existe la variable Estado de cumplimiento de los acuerdos de las Asambleas Generales de Asociados para el  año {{$ano->ano}} de la cooperativa "{{$nomb_coop->nombre}}".
                                            </div>
                                        @endif
                                    </div>
                                </div>

                            </section>


                            <section class="Tabla">
                                <div class="panel panel-default">
                                    <div>
                                        <h3>Participación de los asociados en Asambleas Generales de Asociados</h3>
                                        @if($part_asm_gen!=null)
                                            <table class="table  table-bordered table-sm table-hover tabla">
                                                <thead class="thead-light">
                                                <th>Acuerdos</th>
                                                <th colspan="2">Año base : {{$part_asm_gen_ant!=null ? $part_asm_gen_ant->Ano->ano : 'No existe información' }} </th>
                                                <th colspan="2">Año actual : {{$part_asm_gen->Ano->ano}}</th>
                                                <th>Variación</th>
                                                {{--<th>%</th>--}}
                                                </thead>
                                                <tbody>   <tr>    </tr>
                                                <tr >
                                                    <td></td>
                                                    <td><strong>Cantidad:</strong></td>
                                                    <td><strong>%</strong></td>
                                                    <td><strong>Cantidad:</strong></td>
                                                    <td><strong>%</strong></td>
                                                    <td><strong>Cantidad</strong></td>
                                                </tr>
                                                <tr >
                                                    <td>Socios convocados a asambleas</td>

                                                    <td>{{ $part_asm_gen_ant!=null ? $part_asm_gen_ant->soc_conv : 0}}</td>
                                                    <td>{{ $part_asm_gen_ant!=null ? round($part_asm_gen_ant->soc_conv * 100 /$totalcd,2) : 0}}</td>
                                                    <td>{{$part_asm_gen->soc_conv}}</td>
                                                    <td>{{round($part_asm_gen->soc_conv * 100 /$totalcd,2)}}</td>
                                                    <td>{{ $part_asm_gen_ant!=null ? $part_asm_gen->soc_conv  - $part_asm_gen_ant->soc_conv :$part_asm_gen->soc_conv- 0}}</td>
                                                </tr>
                                                <tr >
                                                    <td>Socios asistentes</td>

                                                    <td>{{ $part_asm_gen_ant!=null ? $part_asm_gen_ant->soc_asist : 0}}</td>
                                                    <td>{{ $part_asm_gen_ant!=null ? round($part_asm_gen_ant->soc_asist * 100 /$totalcd,2) : 0}}</td>
                                                    <td>{{$part_asm_gen->soc_asist}}</td>
                                                    <td>{{round($part_asm_gen->soc_asist * 100 /$totalcd,2)}}</td>
                                                    <td>{{ $part_asm_gen_ant!=null ? $part_asm_gen->soc_asist  - $part_asm_gen_ant->soc_asist :$part_asm_gen->soc_asist- 0}}</td>
                                                </tr>
                                                <tr >
                                                    <td>totalcd</td>

                                                    <td>{{ $part_asm_gen_ant!=null ? $part_asm_gen_ant->soc_asist + $part_asm_gen_ant->soc_conv : 0}}</td>
                                                    <td>{{ $part_asm_gen_ant!=null ? round(($part_asm_gen_ant->soc_asist * 100 /$totalcd) + ($part_asm_gen_ant->soc_conv * 100 /$totalcd),2)  : 0}}</td>
                                                    <td>{{$part_asm_gen->soc_asist + $part_asm_gen->soc_conv}}</td>
                                                    <td>{{round(($part_asm_gen->soc_asist * 100 /$totalcd) + ($part_asm_gen->soc_conv * 100 /$totalcd),2)}}</td>
                                                    <td>{{ $part_asm_gen_ant!=null ? ($part_asm_gen->soc_asist + $part_asm_gen->soc_conv)  - ($part_asm_gen_ant->soc_asist + $part_asm_gen_ant->soc_conv ) : ($part_asm_gen->soc_asist + $part_asm_gen->soc_conv) - 0}}</td>
                                                </tr>








                                                </tbody>

                                            </table>
                                        @else
                                            <div class="alert alert-info" id="alerta"  role="alert">
                                                No existe la variable Participación de los asociados en Asambleas Generales de Asociados para el  año {{$ano->ano}} de la cooperativa "{{$nomb_coop->nombre}}".
                                            </div>
                                        @endif
                                    </div>
                                </div>

                            </section>

                            <section class="Tabla">
                                <div class="panel panel-default">
                                    <div>
                                        <h3>Equidad de género en los niveles de dirección</h3>
                                        @if($equi_gen_niv_dir!=null)
                                            <table class="table  table-bordered table-sm table-hover tabla">
                                                <thead class="thead-light">
                                                <th>Sexo</th>
                                                <th colspan="2">Año base : {{$equi_gen_niv_dir_ant!=null ? $equi_gen_niv_dir_ant->Ano->ano : 'No existe información' }} </th>
                                                <th colspan="2">Año actual : {{$equi_gen_niv_dir->Ano->ano}}</th>
                                                <th>Variación</th>
                                                {{--<th>%</th>--}}
                                                </thead>
                                                <tbody>   <tr>    </tr>
                                                <tr >
                                                    <td></td>
                                                    <td><strong>Cantidad:</strong></td>
                                                    <td><strong>%</strong></td>
                                                    <td><strong>Cantidad:</strong></td>
                                                    <td><strong>%</strong></td>
                                                    <td><strong>Cantidad</strong></td>
                                                </tr>
                                                <tr >
                                                    <td>Hombres</td>

                                                    <td>{{ $equi_gen_niv_dir_ant!=null ? $equi_gen_niv_dir_ant->hombres : 0}}</td>
                                                    <td>{{ $equi_gen_niv_dir_ant!=null ? round( $equi_gen_niv_dir_ant->hombres * 100 /$totalcd,2) : 0}}</td>
                                                    <td>{{$equi_gen_niv_dir->hombres}}</td>
                                                    <td>{{round($equi_gen_niv_dir->hombres * 100 /$totalcd,2)}}</td>
                                                    <td>{{ $equi_gen_niv_dir_ant!=null ? $equi_gen_niv_dir->hombres  - $equi_gen_niv_dir_ant->hombres :$equi_gen_niv_dir->hombres - 0}}</td>
                                                </tr>
                                                <tr >
                                                    <td>Mujeres</td>

                                                    <td>{{ $equi_gen_niv_dir_ant!=null ? $equi_gen_niv_dir_ant->mujeres : 0}}</td>
                                                    <td>{{ $equi_gen_niv_dir_ant!=null ? round($equi_gen_niv_dir_ant->mujeres * 100 /$totalcd,2) : 0}}</td>
                                                    <td>{{$equi_gen_niv_dir->mujeres}}</td>
                                                    <td>{{round($equi_gen_niv_dir->mujeres * 100 /$totalcd,2)}}</td>
                                                    <td>{{ $equi_gen_niv_dir_ant!=null ? $equi_gen_niv_dir->mujeres  - $equi_gen_niv_dir_ant->mujeres : $equi_gen_niv_dir->mujeres - 0}}</td>
                                                </tr>
                                                <tr >
                                                    <td>totalcd</td>

                                                    <td>{{ $equi_gen_niv_dir_ant!=null ? $equi_gen_niv_dir_ant->hombres + $equi_gen_niv_dir_ant->mujeres : 0}}</td>
                                                    <td>{{ $equi_gen_niv_dir_ant!=null ? round(($equi_gen_niv_dir_ant->mujeres * 100 /$totalcd) + ($equi_gen_niv_dir_ant->hombres * 100 /$totalcd),2)  : 0}}</td>
                                                    <td>{{$equi_gen_niv_dir->mujeres + $equi_gen_niv_dir->hombres}}</td>
                                                    <td>{{round(($equi_gen_niv_dir->mujeres * 100 /$totalcd) + ($equi_gen_niv_dir->hombres * 100 /$totalcd),2)}}</td>
                                                    <td>{{ $equi_gen_niv_dir_ant!=null ? ($equi_gen_niv_dir->mujeres + $equi_gen_niv_dir->hombres)  - ($equi_gen_niv_dir_ant->hombres + $equi_gen_niv_dir_ant->mujeres) : ($equi_gen_niv_dir->mujeres + $equi_gen_niv_dir->hombres) - 0}}</td>
                                                </tr>








                                                </tbody>

                                            </table>
                                        @else
                                            <div class="alert alert-info" id="alerta"  role="alert">
                                                No existe la variable Equidad de género en los niveles de dirección para el  año {{$ano->ano}} de la cooperativa "{{$nomb_coop->nombre}}".
                                            </div>
                                        @endif
                                    </div>
                                </div>

                            </section>


                        </div>
                    </div>

                    <br>


                    <div class="panel panel-default">
                        <div class="panel-heading"><h2>Participación Económica de los Miembros</h2></div>
                        <div class="panel-body">

                            <section class="Tabla">
                                <div class="panel panel-default">
                                    <div>
                                        <h3>Distribución de los excedentes</h3>
                                        @if($distribucion_utilidades!=null)
                                            <table class="table  table-bordered table-sm table-hover tabla">
                                                <thead class="thead-light">
                                                <th>Distribución</th>
                                                <th colspan="2">Año base : {{$distribucion_utilidades_ant!=null ? $distribucion_utilidades_ant->Ano->ano : 'No existe información' }} </th>
                                                <th colspan="2">Año actual : {{$distribucion_utilidades->Ano->ano}}</th>
                                                <th>Variación</th>
                                                {{--<th>%</th>--}}
                                                </thead>
                                                <tbody>   <tr>    </tr>
                                                <tr >
                                                    <td></td>
                                                    <td><strong>Cantidad:</strong></td>
                                                    <td><strong>%</strong></td>
                                                    <td><strong>Cantidad:</strong></td>
                                                    <td><strong>%</strong></td>
                                                    <td><strong>Cantidad</strong></td>
                                                </tr>
                                                <tr >
                                                    <td>Excedentes</td>

                                                    <td>{{ $distribucion_utilidades_ant!=null ? $distribucion_utilidades_ant->excedente : 0}}</td>
                                                    <td>{{ $distribucion_utilidades_ant!=null ? round( $distribucion_utilidades_ant->excedente * 100 /$total_utl_ant,2) : 0}}</td>
                                                    <td>{{$distribucion_utilidades->excedente}}</td>
                                                    <td>{{round($distribucion_utilidades->excedente * 100 /$total_utl,2)}}</td>
                                                    <td>{{ $distribucion_utilidades_ant!=null ? $distribucion_utilidades->excedente  - $distribucion_utilidades_ant->excedente : $distribucion_utilidades->excedente - 0}}</td>
                                                </tr>
                                                <tr >
                                                    <td>Capitalización</td>

                                                    <td>{{ $distribucion_utilidades_ant!=null ? $distribucion_utilidades_ant->capitalizar_coop : 0}}</td>
                                                    <td>{{ $distribucion_utilidades_ant!=null ? round($distribucion_utilidades_ant->capitalizar_coop * 100 /$total_utl_ant,2) : 0}}</td>
                                                    <td>{{$distribucion_utilidades->capitalizar_coop}}</td>
                                                    <td>{{round($distribucion_utilidades->capitalizar_coop * 100 /$total_utl,2)}}</td>
                                                    <td>{{ $distribucion_utilidades_ant!=null ? $distribucion_utilidades->capitalizar_coop  - $distribucion_utilidades_ant->capitalizar_coop : $distribucion_utilidades->capitalizar_coop - 0}}</td>
                                                </tr>
                                                <tr >
                                                    <td>Distribución a asociados</td>

                                                    <td>{{ $distribucion_utilidades_ant!=null ? $distribucion_utilidades_ant->distribucion_socios : 0}}</td>
                                                    <td>{{ $distribucion_utilidades_ant!=null ? round($distribucion_utilidades_ant->distribucion_socios * 100 /$total_utl_ant,2) : 0}}</td>
                                                    <td>{{$distribucion_utilidades->distribucion_socios}}</td>
                                                    <td>{{ round($distribucion_utilidades->capitalizar_coop * 100 /$total_utl) }}</td>
                                                    <td>{{ $distribucion_utilidades_ant!=null ? $distribucion_utilidades->distribucion_socios  - $distribucion_utilidades_ant->distribucion_socios : $distribucion_utilidades->distribucion_socios - 0}}</td>
                                                </tr>
                                                <tr >
                                                    <td>Reservas</td>

                                                    <td>{{ $distribucion_utilidades_ant!=null ? $distribucion_utilidades_ant->reservas : 0}}</td>
                                                    <td>{{ $distribucion_utilidades_ant!=null ? round($distribucion_utilidades_ant->reservas * 100 /$total_utl_ant ,2): 0}}</td>
                                                    <td>{{$distribucion_utilidades->reservas}}</td>
                                                    <td>{{round($distribucion_utilidades->reservas * 100 /$total_utl,2)}}</td>
                                                    <td>{{ $distribucion_utilidades_ant!=null ? $distribucion_utilidades->reservas  - $distribucion_utilidades_ant->reservas : $distribucion_utilidades->reservas - 0}}</td>
                                                </tr>
                                                <tr >
                                                    <td>Capital social</td>

                                                    <td>{{ $distribucion_utilidades_ant!=null ? $distribucion_utilidades_ant->fondo_sociales : 0}}</td>
                                                    <td>{{ $distribucion_utilidades_ant!=null ? round($distribucion_utilidades_ant->fondo_sociales * 100 /$total_utl_ant,2) : 0}}</td>
                                                    <td>{{$distribucion_utilidades->fondo_sociales}}</td>
                                                    <td>{{round($distribucion_utilidades->fondo_sociales * 100 /$total_utl,2)}}</td>
                                                    <td>{{ $distribucion_utilidades_ant!=null ? $distribucion_utilidades->fondo_sociales  - $distribucion_utilidades_ant->fondo_sociales : $distribucion_utilidades->fondo_sociales - 0}}</td>
                                                </tr>
                                                <tr >
                                                    <td>Capital Percápita</td>

                                                    <td>{{ $distribucion_utilidades_ant!=null ? $distribucion_utilidades_ant->capital_per : 0}}</td>
                                                    <td>{{ $distribucion_utilidades_ant!=null ? round($distribucion_utilidades_ant->capital_per * 100 /$total_utl_ant,2) : 0}}</td>
                                                    <td>{{$distribucion_utilidades->capital_per}}</td>
                                                    <td>{{round($distribucion_utilidades->capital_per * 100 /$total_utl,2)}}</td>
                                                    <td>{{ $distribucion_utilidades_ant!=null ? $distribucion_utilidades->capital_per  - $distribucion_utilidades_ant->capital_per : $distribucion_utilidades->capital_per - 0}}</td>
                                                </tr>

                                                <tr >
                                                    <td>total_utl</td>

                                                    <td>{{ $distribucion_utilidades_ant!=null ? ($distribucion_utilidades_ant->capital_per + $distribucion_utilidades_ant->fondo_sociales + $distribucion_utilidades_ant->reservas + $distribucion_utilidades_ant->distribucion_socios + $distribucion_utilidades_ant->capitalizar_coop + $distribucion_utilidades_ant->excedente ) : 0}}</td>
                                                    <td>{{ $distribucion_utilidades_ant!=null ? round(($distribucion_utilidades_ant->capital_per * 100 /$total_utl_ant)+( $distribucion_utilidades_ant->fondo_sociales * 100 /$total_utl_ant)+( $distribucion_utilidades_ant->reservas * 100 /$total_utl_ant)+( $distribucion_utilidades_ant->distribucion_socios * 100 /$total_utl_ant)+( $distribucion_utilidades_ant->capitalizar_coop * 100 /$total_utl_ant)+( $distribucion_utilidades_ant->excedente* 100 /$total_utl_ant),2) : 0}}</td>
                                                    <td>{{($distribucion_utilidades->capital_per + $distribucion_utilidades->fondo_sociales + $distribucion_utilidades->reservas + $distribucion_utilidades->distribucion_socios + $distribucion_utilidades->capitalizar_coop + $distribucion_utilidades->excedente )}}</td>
                                                    <td>{{round(($distribucion_utilidades->capital_per * 100 /$total_utl)+( $distribucion_utilidades->fondo_sociales * 100 /$total_utl)+( $distribucion_utilidades->reservas * 100 /$total_utl)+( $distribucion_utilidades->distribucion_socios * 100 /$total_utl)+( $distribucion_utilidades->capitalizar_coop * 100 /$total_utl)+( $distribucion_utilidades->excedente* 100 /$total_utl),2)}}</td>
                                                    <td>{{ $distribucion_utilidades_ant!=null ? ($distribucion_utilidades->capital_per + $distribucion_utilidades->fondo_sociales + $distribucion_utilidades->reservas + $distribucion_utilidades->distribucion_socios + $distribucion_utilidades->capitalizar_coop + $distribucion_utilidades->excedente )  - ($distribucion_utilidades_ant->capital_per + $distribucion_utilidades_ant->fondo_sociales + $distribucion_utilidades_ant->reservas + $distribucion_utilidades_ant->distribucion_socios + $distribucion_utilidades_ant->capitalizar_coop + $distribucion_utilidades_ant->excedente ) : ($distribucion_utilidades->capital_per + $distribucion_utilidades->fondo_sociales + $distribucion_utilidades->reservas + $distribucion_utilidades->distribucion_socios + $distribucion_utilidades->capitalizar_coop + $distribucion_utilidades->excedente ) - 0}}</td>
                                                </tr>









                                                </tbody>

                                            </table>
                                        @else
                                            <div class="alert alert-info" id="alerta"  role="alert">
                                                No existe la variable Participación Económica de los Miembros para el  año {{$ano->ano}} de la cooperativa "{{$nomb_coop->nombre}}".
                                            </div>
                                        @endif
                                    </div>
                                </div>

                            </section>




                        </div>


                    </div>


                    <div class="panel panel-default">
                        <div class="panel-heading"><h2>Autonomia e independencia</h2></div>
                        <div class="panel-body">

                            <section class="Tabla">
                                <div class="panel panel-default">
                                    <div>
                                        <h3>Autonomia e independencia</h3>
                                        @if($autindp!=null)
                                            <table class="table  table-bordered table-sm table-hover tabla">
                                                <thead class="thead-light">
                                                <th>Aspectos</th>
                                                <th colspan="2">Año base : {{$autindp_ant!=null ? $autindp_ant->Ano->ano : 'No existe información' }} </th>
                                                <th colspan="2">Año actual : {{$autindp->Ano->ano}}</th>
                                                <th>Variación</th>
                                                {{--<th>%</th>--}}
                                                </thead>
                                                <tbody>   <tr>    </tr>
                                                <tr >
                                                    <td></td>
                                                    <td><strong>Cantidad:</strong></td>
                                                    <td><strong>%</strong></td>
                                                    <td><strong>Cantidad:</strong></td>
                                                    <td><strong>%</strong></td>
                                                    <td><strong>Cantidad</strong></td>
                                                </tr>
                                                <tr >
                                                    <td>Capital propio</td>

                                                    <td>{{ $autindp_ant!=null ? $autindp_ant->capital_prop : 0}}</td>
                                                    <td>{{ $autindp_ant!=null ? round($autindp_ant->capital_prop * 100 /$total_autind_ant ,2): 0}}</td>
                                                    <td>{{$autindp->capital_prop}}</td>
                                                    <td>{{round($autindp->capital_prop * 100 /$total_autind,2)}}</td>
                                                    <td>{{ $autindp_ant!=null ? $autindp->capital_prop  - $autindp_ant->capital_prop : $autindp->capital_prop - 0}}</td>
                                                </tr>
                                                <tr >
                                                    <td>Capital externo</td>

                                                    <td>{{ $autindp_ant!=null ? $autindp_ant->capital_ext : 0}}</td>
                                                    <td>{{ $autindp_ant!=null ? round($autindp_ant->capital_ext * 100 /$total_autind_ant,2) : 0}}</td>
                                                    <td>{{$autindp->capital_ext}}</td>
                                                    <td>{{round($autindp->capital_ext * 100 /$total_autind,2)}}</td>
                                                    <td>{{ $autindp_ant!=null ? $autindp->capital_ext  - $autindp_ant->capital_ext : $autindp->capital_ext - 0}}</td>
                                                </tr>

                                                <tr >
                                                    <td>Acuerdos cumplidos con capital propio</td>

                                                    <td>{{ $autindp_ant!=null ? $autindp_ant->acu_cump_cap_prop : 0}}</td>
                                                    <td>{{ $autindp_ant!=null ? round($autindp_ant->acu_cump_cap_prop * 100 /$total_autind_ant,2) : 0}}</td>
                                                    <td>{{$autindp->acu_cump_cap_prop}}</td>
                                                    <td>{{round($autindp->acu_cump_cap_prop * 100 /$total_autind,2)}}</td>
                                                    <td>{{ $autindp_ant!=null ? $autindp->acu_cump_cap_prop  - $autindp_ant->acu_cump_cap_prop : $autindp->acu_cump_cap_prop - 0}}</td>
                                                </tr>
                                                <tr >
                                                    <td>Acuerdos cumplidos con capital externo</td>

                                                    <td>{{ $autindp_ant!=null ? $autindp_ant->acu_cump_cap_ext : 0}}</td>
                                                    <td>{{ $autindp_ant!=null ? round($autindp_ant->acu_cump_cap_ext * 100 /$total_autind_ant,2) : 0}}</td>
                                                    <td>{{$autindp->acu_cump_cap_ext}}</td>
                                                    <td>{{round($autindp->acu_cump_cap_ext * 100 /$total_autind,2)}}</td>
                                                    <td>{{ $autindp_ant!=null ? $autindp->acu_cump_cap_ext  - $autindp_ant->acu_cump_cap_ext : $autindp->acu_cump_cap_ext - 0}}</td>
                                                </tr>
                                                <tr >
                                                    <td>Acuerdos adoptados por iniciativa propia</td>

                                                    <td>{{ $autindp_ant!=null ? $autindp_ant->acu_cump_ini_prop : 0}}</td>
                                                    <td>{{ $autindp_ant!=null ? round($autindp_ant->acu_cump_ini_prop * 100 /$total_autind_ant,2) : 0}}</td>
                                                    <td>{{$autindp->acu_cump_ini_prop}}</td>
                                                    <td>{{round($autindp->acu_cump_ini_prop * 100 /$total_autind,2)}}</td>
                                                    <td>{{ $autindp_ant!=null ? $autindp->acu_cump_ini_prop  - $autindp_ant->acu_cump_ini_prop : $autindp->acu_cump_ini_prop - 0}}</td>
                                                </tr>
                                                <tr >
                                                    <td>Acuerdos adoptados por injerencia externa</td>

                                                    <td>{{ $autindp_ant!=null ? $autindp_ant->acu_cump_inj_ext : 0}}</td>
                                                    <td>{{ $autindp_ant!=null ? round($autindp_ant->acu_cump_inj_ext * 100 /$total_autind_ant,2) : 0}}</td>
                                                    <td>{{$autindp->acu_cump_inj_ext}}</td>
                                                    <td>{{round($autindp->acu_cump_inj_ext * 100 /$total_autind,2)}}</td>
                                                    <td>{{ $autindp_ant!=null ? $autindp->acu_cump_inj_ext  - $autindp_ant->acu_cump_inj_ext : $autindp->acu_cump_inj_ext - 0}}</td>
                                                </tr>
                                                <tr >
                                                    <td>total_autind</td>

                                                    <td>{{ $autindp_ant!=null ? ($autindp_ant->capital_prop +  $autindp_ant->capital_ext  +  $autindp_ant->acu_cump_cap_prop  +  $autindp_ant->acu_cump_cap_ext +  $autindp_ant->acu_cump_ini_prop +  $autindp_ant->acu_cump_inj_ext) : 0}}</td>
                                                    <td>{{ $autindp_ant!=null ? round(($autindp_ant->capital_prop * 100 /$total_autind_ant)+(  $autindp_ant->capital_ext  * 100 /$total_autind_ant)+(  $autindp_ant->acu_cump_cap_prop  * 100 /$total_autind_ant)+(  $autindp_ant->acu_cump_cap_ext * 100 /$total_autind_ant)+(  $autindp_ant->acu_cump_ini_prop * 100 /$total_autind_ant)+(  $autindp_ant->acu_cump_inj_ext* 100 /$total_autind_ant),2) : 0}}</td>
                                                    <td>{{$autindp->capital_prop +  $autindp->capital_ext  +  $autindp->acu_cump_cap_prop  +  $autindp->acu_cump_cap_ext +  $autindp->acu_cump_ini_prop +  $autindp->acu_cump_inj_ext}}</td>
                                                    <td>{{round(($autindp->capital_prop * 100 /$total_autind)+(  $autindp->capital_ext  * 100 /$total_autind)+(  $autindp->acu_cump_cap_prop  * 100 /$total_autind)+(  $autindp->acu_cump_cap_ext * 100 /$total_autind)+(  $autindp->acu_cump_ini_prop * 100 /$total_autind)+(  $autindp->acu_cump_inj_ext* 100 /$total_autind),2)}}</td>
                                                    <td>{{ $autindp_ant!=null ? ($autindp->capital_prop +  $autindp->capital_ext  +  $autindp->acu_cump_cap_prop  +  $autindp->acu_cump_cap_ext +  $autindp->acu_cump_ini_prop +  $autindp->acu_cump_inj_ext) - ($autindp_ant->capital_prop +  $autindp_ant->capital_ext  +  $autindp_ant->acu_cump_cap_prop  +  $autindp_ant->acu_cump_cap_ext +  $autindp_ant->acu_cump_ini_prop +  $autindp_ant->acu_cump_inj_ext): ($autindp->capital_prop +  $autindp->capital_ext  +  $autindp->acu_cump_cap_prop  +  $autindp->acu_cump_cap_ext +  $autindp->acu_cump_ini_prop +  $autindp->acu_cump_inj_ext) - 0}}</td>
                                                </tr>







                                                </tbody>

                                            </table>
                                        @else
                                            <div class="alert alert-info" id="alerta"  role="alert">
                                                No existe la variable Autonomia e independencia para el  año {{$ano->ano}} de la cooperativa "{{$nomb_coop->nombre}}".
                                            </div>
                                        @endif
                                    </div>
                                </div>

                            </section>


                        </div>
                    </div>

                    <br>
                    <div class="panel panel-default">
                        <div class="panel-heading"><h2>Educación formación e Información</h2> </div>
                        <div class="panel-body">
                            <section class="Tabla">
                                <div>
                                    <h3>Educación formación e Información</h3>

                                    @if($educ_form_inf!=null)


                                        <table class="table  table-bordered table-sm table-hover tabla">
                                            <thead class="thead-light">
                                            <th >Conceptos</th>
                                            <th >Año base : {{$educ_form_inf_ant!=null ? $educ_form_inf_ant->Ano->ano : 'No existe información' }} </th>
                                            <th >Año actual : {{$educ_form_inf->Ano->ano}}</th>
                                            <th>Variación</th>
                                            {{--<th>%</th>--}}
                                            </thead>
                                            <tbody>   <tr>    </tr>
                                            <tr >
                                                <td></td>
                                                <td><strong>Cantidad:</strong></td>
                                                <td><strong>Cantidad:</strong></td>
                                                <td><strong>Cantidad:</strong></td>

                                            </tr>
                                            <tr >
                                                <td>Inversión realizada en el proceso de formación y capacitación</td>

                                                <td>{{ $educ_form_inf_ant!=null ? $educ_form_inf_ant->inv_proc_form_cap : 0}}</td>
                                                <td>{{ $educ_form_inf!=null ? $educ_form_inf->inv_proc_form_cap : 0}}</td>
                                                <td>{{$educ_form_inf_ant!=null ? ( $educ_form_inf->inv_proc_form_cap - $educ_form_inf_ant->inv_proc_form_cap) : $educ_form_inf->inv_proc_form_cap }}</td>
                                            </tr>
                                            <tr >
                                                <td>Inversión en educación, formación e información para jóvenes</td>

                                                <td>{{ $educ_form_inf_ant!=null ? $educ_form_inf_ant->inv_edu_form_inform_jov : 0}}</td>
                                                <td>{{ $educ_form_inf!=null ? $educ_form_inf->inv_edu_form_inform_jov : 0}}</td>
                                                <td>{{$educ_form_inf_ant!=null ? ( $educ_form_inf->inv_edu_form_inform_jov - $educ_form_inf_ant->inv_edu_form_inform_jov) : $educ_form_inf->inv_edu_form_inform_jov }}</td>
                                            </tr>
                                            <tr >
                                                <td>Inversión en educación, formación e información para mujeres</td>

                                                <td>{{ $educ_form_inf_ant!=null ? $educ_form_inf_ant->inv_edu_form_inform_muj : 0}}</td>
                                                <td>{{ $educ_form_inf!=null ? $educ_form_inf->inv_edu_form_inform_muj : 0}}</td>
                                                <td>{{$educ_form_inf_ant!=null ? ( $educ_form_inf->inv_edu_form_inform_muj - $educ_form_inf_ant->inv_edu_form_inform_muj) : $educ_form_inf->inv_edu_form_inform_muj }}</td>
                                            </tr>
                                            <tr >
                                                <td>Inversión en educación, formación e información para empleados</td>

                                                <td>{{ $educ_form_inf_ant!=null ? $educ_form_inf_ant->inv_edu_form_inform_emp : 0}}</td>
                                                <td>{{ $educ_form_inf!=null ? $educ_form_inf->inv_edu_form_inform_emp : 0}}</td>
                                                <td>{{$educ_form_inf_ant!=null ? ( $educ_form_inf->inv_edu_form_inform_emp - $educ_form_inf_ant->inv_edu_form_inform_emp) : $educ_form_inf->inv_edu_form_inform_emp }}</td>
                                            </tr>
                                            <tr >
                                                <td>Inversión en educación, formación e información para directivos</td>

                                                <td>{{ $educ_form_inf_ant!=null ? $educ_form_inf_ant->inv_edu_form_inform_direct : 0}}</td>
                                                <td>{{ $educ_form_inf!=null ? $educ_form_inf->inv_edu_form_inform_direct : 0}}</td>
                                                <td>{{$educ_form_inf_ant!=null ? ( $educ_form_inf->inv_edu_form_inform_direct - $educ_form_inf_ant->inv_edu_form_inform_direct) : $educ_form_inf->inv_edu_form_inform_direct }}</td>
                                            </tr>
                                            <tr >
                                                <td>Inversión en educación, formación e información para niños</td>

                                                <td>{{ $educ_form_inf_ant!=null ? $educ_form_inf_ant->inv_edu_form_inform_ninos : 0}}</td>
                                                <td>{{ $educ_form_inf!=null ? $educ_form_inf->inv_edu_form_inform_ninos : 0}}</td>
                                                <td>{{$educ_form_inf_ant!=null ? ( $educ_form_inf->inv_edu_form_inform_ninos - $educ_form_inf_ant->inv_edu_form_inform_ninos) : $educ_form_inf->inv_edu_form_inform_ninos }}</td>
                                            </tr>
                                            <tr >
                                                <td>Inversión en educación, formación e información para miembros de la comunidad</td>

                                                <td>{{ $educ_form_inf_ant!=null ? $educ_form_inf_ant->inv_edu_form_inform_comun : 0}}</td>
                                                <td>{{ $educ_form_inf!=null ? $educ_form_inf->inv_edu_form_inform_comun : 0}}</td>
                                                <td>{{$educ_form_inf_ant!=null ? ( $educ_form_inf->inv_edu_form_inform_comun - $educ_form_inf_ant->inv_edu_form_inform_comun) : $educ_form_inf->inv_edu_form_inform_comun }}</td>
                                            </tr>
                                            <tr >
                                                <td>Número de actividades en educación, formación e información</td>

                                                <td>{{ $educ_form_inf_ant!=null ? $educ_form_inf_ant->num_act_edu_form_inf : 0}}</td>
                                                <td>{{ $educ_form_inf!=null ? $educ_form_inf->num_act_edu_form_inf : 0}}</td>
                                                <td>{{$educ_form_inf_ant!=null ? ( $educ_form_inf->num_act_edu_form_inf - $educ_form_inf_ant->num_act_edu_form_inf) : $educ_form_inf->num_act_edu_form_inf }}</td>
                                            </tr>
                                            <tr >
                                                <td>Número de actividades en educación, formación e información para jóvenes</td>

                                                <td>{{ $educ_form_inf_ant!=null ? $educ_form_inf_ant->num_act_edu_form_inf_jov : 0}}</td>
                                                <td>{{ $educ_form_inf!=null ? $educ_form_inf->num_act_edu_form_inf_jov : 0}}</td>
                                                <td>{{$educ_form_inf_ant!=null ? ( $educ_form_inf->num_act_edu_form_inf_jov - $educ_form_inf_ant->num_act_edu_form_inf_jov) : $educ_form_inf->num_act_edu_form_inf_jov }}</td>
                                            </tr>
                                            <tr >
                                                <td>Número de actividades en educación, formación e información para mujeres</td>

                                                <td>{{ $educ_form_inf_ant!=null ? $educ_form_inf_ant->num_act_edu_form_inf_muj : 0}}</td>
                                                <td>{{ $educ_form_inf!=null ? $educ_form_inf->num_act_edu_form_inf_muj : 0}}</td>
                                                <td>{{$educ_form_inf_ant!=null ? ( $educ_form_inf->num_act_edu_form_inf_muj - $educ_form_inf_ant->num_act_edu_form_inf_muj) : $educ_form_inf->num_act_edu_form_inf_muj }}</td>
                                            </tr>
                                            <tr >
                                                <td>Número de actividades en educación, formación e información para asociados</td>

                                                <td>{{ $educ_form_inf_ant!=null ? $educ_form_inf_ant->num_act_edu_form_inf_asoc : 0}}</td>
                                                <td>{{ $educ_form_inf!=null ? $educ_form_inf->num_act_edu_form_inf_asoc : 0}}</td>
                                                <td>{{$educ_form_inf_ant!=null ? ( $educ_form_inf->num_act_edu_form_inf_asoc - $educ_form_inf_ant->num_act_edu_form_inf_asoc) : $educ_form_inf->num_act_edu_form_inf_asoc }}</td>
                                            </tr>
                                            <tr >
                                                <td>Número de actividades en educación, formación e información para empleados</td>

                                                <td>{{ $educ_form_inf_ant!=null ? $educ_form_inf_ant->num_act_edu_form_inf_emp : 0}}</td>
                                                <td>{{ $educ_form_inf!=null ? $educ_form_inf->num_act_edu_form_inf_emp : 0}}</td>
                                                <td>{{$educ_form_inf_ant!=null ? ( $educ_form_inf->num_act_edu_form_inf_emp - $educ_form_inf_ant->num_act_edu_form_inf_emp) : $educ_form_inf->num_act_edu_form_inf_emp }}</td>
                                            </tr>
                                            <tr >
                                                <td>Número de actividades en educación, formación e información para directivos</td>

                                                <td>{{ $educ_form_inf_ant!=null ? $educ_form_inf_ant->num_act_edu_form_inf_direct : 0}}</td>
                                                <td>{{ $educ_form_inf!=null ? $educ_form_inf->num_act_edu_form_inf_direct : 0}}</td>
                                                <td>{{$educ_form_inf_ant!=null ? ( $educ_form_inf->num_act_edu_form_inf_direct - $educ_form_inf_ant->num_act_edu_form_inf_direct) : $educ_form_inf->num_act_edu_form_inf_direct }}</td>
                                            </tr>
                                            <tr >
                                                <td>Inversión realizada en el proceso de formación y capacitación</td>

                                                <td>{{ $educ_form_inf_ant!=null ? $educ_form_inf_ant->inv_proc_form_cap : 0}}</td>
                                                <td>{{ $educ_form_inf!=null ? $educ_form_inf->inv_proc_form_cap : 0}}</td>
                                                <td>{{$educ_form_inf_ant!=null ? ( $educ_form_inf->inv_proc_form_cap - $educ_form_inf_ant->inv_proc_form_cap) : $educ_form_inf->inv_proc_form_cap }}</td>
                                            </tr>
                                            <tr >
                                                <td>Número de actividades en educación, formación e información para niños</td>

                                                <td>{{ $educ_form_inf_ant!=null ? $educ_form_inf_ant->num_act_edu_form_inf_ninos : 0}}</td>
                                                <td>{{ $educ_form_inf!=null ? $educ_form_inf->num_act_edu_form_inf_ninos : 0}}</td>
                                                <td>{{$educ_form_inf_ant!=null ? ( $educ_form_inf->num_act_edu_form_inf_ninos - $educ_form_inf_ant->num_act_edu_form_inf_ninos) : $educ_form_inf->num_act_edu_form_inf_ninos }}</td>
                                            </tr>
                                            <tr >
                                                <td>Inversión realizada en el proceso de formación y capacitación</td>

                                                <td>{{ $educ_form_inf_ant!=null ? $educ_form_inf_ant->inv_proc_form_cap : 0}}</td>
                                                <td>{{ $educ_form_inf!=null ? $educ_form_inf->inv_proc_form_cap : 0}}</td>
                                                <td>{{$educ_form_inf_ant!=null ? ( $educ_form_inf->inv_proc_form_cap - $educ_form_inf_ant->inv_proc_form_cap) : $educ_form_inf->inv_proc_form_cap }}</td>
                                            </tr>
                                            <tr >
                                                <td>Número de actividades en educación, formación e información para miembros de la comunidad</td>

                                                <td>{{ $educ_form_inf_ant!=null ? $educ_form_inf_ant->num_act_edu_form_inf_comun : 0}}</td>
                                                <td>{{ $educ_form_inf!=null ? $educ_form_inf->num_act_edu_form_inf_comun : 0}}</td>
                                                <td>{{$educ_form_inf_ant!=null ? ( $educ_form_inf->num_act_edu_form_inf_comun - $educ_form_inf_ant->num_act_edu_form_inf_comun) : $educ_form_inf->num_act_edu_form_inf_comun }}</td>
                                            </tr>
                                            <tr >
                                                <td>Cantidad de participantes en actividades de educación, formación e información</td>

                                                <td>{{ $educ_form_inf_ant!=null ? $educ_form_inf_ant->cant_part_act_educ_form_inform : 0}}</td>
                                                <td>{{ $educ_form_inf!=null ? $educ_form_inf->cant_part_act_educ_form_inform : 0}}</td>
                                                <td>{{$educ_form_inf_ant!=null ? ( $educ_form_inf->cant_part_act_educ_form_inform - $educ_form_inf_ant->cant_part_act_educ_form_inform) : $educ_form_inf->cant_part_act_educ_form_inform }}</td>
                                            </tr>
                                            <tr >
                                                <td>Cantidad de participantes en actividades de educación, formación e información para jóvenes</td>

                                                <td>{{ $educ_form_inf_ant!=null ? $educ_form_inf_ant->cant_part_act_educ_form_inform_jov : 0}}</td>
                                                <td>{{ $educ_form_inf!=null ? $educ_form_inf->cant_part_act_educ_form_inform_jov : 0}}</td>
                                                <td>{{$educ_form_inf_ant!=null ? ( $educ_form_inf->cant_part_act_educ_form_inform_jov - $educ_form_inf_ant->cant_part_act_educ_form_inform_jov) : $educ_form_inf->cant_part_act_educ_form_inform_jov }}</td>
                                            </tr>
                                            <tr >
                                                <td>Cantidad de participantes en actividades de educación, formación e información para mujeres</td>

                                                <td>{{ $educ_form_inf_ant!=null ? $educ_form_inf_ant->cant_part_act_educ_form_inform_muj : 0}}</td>
                                                <td>{{ $educ_form_inf!=null ? $educ_form_inf->cant_part_act_educ_form_inform_muj : 0}}</td>
                                                <td>{{$educ_form_inf_ant!=null ? ( $educ_form_inf->cant_part_act_educ_form_inform_muj - $educ_form_inf_ant->cant_part_act_educ_form_inform_muj) : $educ_form_inf->cant_part_act_educ_form_inform_muj }}</td>
                                            </tr>
                                            <tr >
                                                <td>Cantidad de participantes en actividades de educación, formación e información para asociados</td>

                                                <td>{{ $educ_form_inf_ant!=null ? $educ_form_inf_ant->cant_part_act_educ_form_inform_asoc : 0}}</td>
                                                <td>{{ $educ_form_inf!=null ? $educ_form_inf->cant_part_act_educ_form_inform_asoc : 0}}</td>
                                                <td>{{$educ_form_inf_ant!=null ? ( $educ_form_inf->cant_part_act_educ_form_inform_asoc - $educ_form_inf_ant->cant_part_act_educ_form_inform_asoc) : $educ_form_inf->cant_part_act_educ_form_inform_asoc }}</td>
                                            </tr>
                                            <tr >
                                                <td>Cantidad de participantes en actividades de educación, formación e información para empleados</td>

                                                <td>{{ $educ_form_inf_ant!=null ? $educ_form_inf_ant->cant_part_act_educ_form_inform_emp : 0}}</td>
                                                <td>{{ $educ_form_inf!=null ? $educ_form_inf->cant_part_act_educ_form_inform_emp : 0}}</td>
                                                <td>{{$educ_form_inf_ant!=null ? ( $educ_form_inf->cant_part_act_educ_form_inform_emp - $educ_form_inf_ant->cant_part_act_educ_form_inform_emp) : $educ_form_inf->cant_part_act_educ_form_inform_emp }}</td>
                                            </tr>
                                            <tr >
                                                <td>Cantidad de participantes en actividades de educación, formación e información para directivos</td>

                                                <td>{{ $educ_form_inf_ant!=null ? $educ_form_inf_ant->cant_part_act_educ_form_inform_direct : 0}}</td>
                                                <td>{{ $educ_form_inf!=null ? $educ_form_inf->cant_part_act_educ_form_inform_direct : 0}}</td>
                                                <td>{{$educ_form_inf_ant!=null ? ( $educ_form_inf->cant_part_act_educ_form_inform_direct - $educ_form_inf_ant->cant_part_act_educ_form_inform_direct) : $educ_form_inf->cant_part_act_educ_form_inform_direct }}</td>
                                            </tr>
                                            <tr >
                                                <td>Cantidad de participantes en actividades de educación, formación e información para niños</td>

                                                <td>{{ $educ_form_inf_ant!=null ? $educ_form_inf_ant->cant_part_act_educ_form_inform_ninos : 0}}</td>
                                                <td>{{ $educ_form_inf!=null ? $educ_form_inf->cant_part_act_educ_form_inform_ninos : 0}}</td>
                                                <td>{{$educ_form_inf_ant!=null ? ( $educ_form_inf->cant_part_act_educ_form_inform_ninos - $educ_form_inf_ant->cant_part_act_educ_form_inform_ninos) : $educ_form_inf->cant_part_act_educ_form_inform_ninos }}</td>
                                            </tr>
                                            <tr >
                                                <td>Cantidad de participantes en actividades de educación, formación e información para miembros de la comunidad</td>

                                                <td>{{ $educ_form_inf_ant!=null ? $educ_form_inf_ant->cant_part_act_educ_form_inform_comun : 0}}</td>
                                                <td>{{ $educ_form_inf!=null ? $educ_form_inf->cant_part_act_educ_form_inform_comun : 0}}</td>
                                                <td>{{$educ_form_inf_ant!=null ? ( $educ_form_inf->cant_part_act_educ_form_inform_comun - $educ_form_inf_ant->cant_part_act_educ_form_inform_comun) : $educ_form_inf->cant_part_act_educ_form_inform_comun }}</td>
                                            </tr>
                                            <tr >
                                                <td>Cantidad de participantes en actividades de educación, formación e información sobre la filosofía cooperativa</td>

                                                <td>{{ $educ_form_inf_ant!=null ? $educ_form_inf_ant->cant_part_act_educ_form_inform_fil_coop : 0}}</td>
                                                <td>{{ $educ_form_inf!=null ? $educ_form_inf->cant_part_act_educ_form_inform_fil_coop : 0}}</td>
                                                <td>{{$educ_form_inf_ant!=null ? ( $educ_form_inf->cant_part_act_educ_form_inform_fil_coop - $educ_form_inf_ant->cant_part_act_educ_form_inform_fil_coop) : $educ_form_inf->cant_part_act_educ_form_inform_fil_coop }}</td>
                                            </tr>
                                            <tr >
                                                <td>Cantidad de actividades para la formación de habilidades</td>

                                                <td>{{ $educ_form_inf_ant!=null ? $educ_form_inf_ant->cant_act_form_hab : 0}}</td>
                                                <td>{{ $educ_form_inf!=null ? $educ_form_inf->cant_act_form_hab : 0}}</td>
                                                <td>{{$educ_form_inf_ant!=null ? ( $educ_form_inf->cant_act_form_hab - $educ_form_inf_ant->cant_act_form_hab) : $educ_form_inf->cant_act_form_hab }}</td>
                                            </tr>
                                            <tr >
                                                <td>Cantidad de participantes en actividades para la formación de habilidades</td>

                                                <td>{{ $educ_form_inf_ant!=null ? $educ_form_inf_ant->cant_part_act_form_hab : 0}}</td>
                                                <td>{{ $educ_form_inf!=null ? $educ_form_inf->cant_part_act_form_hab : 0}}</td>
                                                <td>{{$educ_form_inf_ant!=null ? ( $educ_form_inf->cant_part_act_form_hab - $educ_form_inf_ant->cant_part_act_form_hab) : $educ_form_inf->cant_part_act_form_hab }}</td>
                                            </tr>













                                            </tbody>

                                        </table>
                                    @else
                                        <div class="alert alert-info" id="alerta"  role="alert">
                                            No existe la variable Educación formación e Información para el  año {{$ano->ano}} de la cooperativa "{{$nomb_coop->nombre}}".
                                        </div>
                                    @endif

                                </div>
                            </section>
                        </div>
                    </div>



                    <br>

                    <div class="panel panel-default">
                        <div class="panel-heading"><h2>Cooperación entre cooperativas</h2></div>
                        <div class="panel-body">
                            <section class="Tabla">
                                <div class="panel panel-default">
                                    <div>
                                        <h3>Cooperación entre cooperativas</h3>
                                        @if($opefin!=null)
                                            <table class="table  table-bordered table-sm table-hover tabla">
                                                <thead class="thead-light">
                                                <th>Operaciones financieras entre cooperativas</th>
                                                <th >Año base : {{$opefin_ant!=null ? $opefin_ant->Ano->ano : 'No existe información' }} </th>
                                                <th >Año actual : {{$opefin->Ano->ano}}</th>
                                                <th>Variación</th>
                                                {{--<th>%</th>--}}
                                                </thead>
                                                <tbody>   <tr>    </tr>
                                                <tr >
                                                    <td></td>
                                                    <td><strong>Cantidad:</strong></td>

                                                    <td><strong>Cantidad:</strong></td>

                                                    <td><strong>Cantidad</strong></td>
                                                </tr>
                                                <tr >
                                                    <td>Cantidad de operaciones de la Red Activa</td>

                                                    <td>{{ $opefin_ant!=null ? $opefin_ant->cant_oper_red_act : 0}}</td>

                                                    <td>{{$opefin->cant_oper_red_act}}</td>

                                                    <td>{{ $opefin_ant!=null ? $opefin->cant_oper_red_act  - $opefin_ant->cant_oper_red_act : $opefin->cant_oper_red_act - 0}}</td>
                                                </tr>

                                                <tr >
                                                    <td>Usuarios de la Red Activa</td>

                                                    <td>{{ $opefin_ant!=null ? $opefin_ant->usuario_red_act : 0}}</td>

                                                    <td>{{$opefin->usuario_red_act}}</td>

                                                    <td>{{ $opefin_ant!=null ? $opefin->usuario_red_act  - $opefin_ant->usuario_red_act : $opefin->usuario_red_act - 0}}</td>
                                                </tr>
                                                <tr >
                                                    <td>Punto de servicios de la Red Activa</td>

                                                    <td>{{ $opefin_ant!=null ? $opefin_ant->pto_serv_red_act : 0}}</td>

                                                    <td>{{$opefin->pto_serv_red_act}}</td>

                                                    <td>{{ $opefin_ant!=null ? $opefin->pto_serv_red_act  - $opefin_ant->pto_serv_red_act : $opefin->pto_serv_red_act - 0}}</td>
                                                </tr>
                                                <tr >
                                                    <td>Cantidad de operaciones de cajeros automáticos</td>

                                                    <td>{{ $opefin_ant!=null ? $opefin_ant->cant_oper_caj_aut : 0}}</td>

                                                    <td>{{$opefin->cant_oper_caj_aut}}</td>

                                                    <td>{{ $opefin_ant!=null ? $opefin->cant_oper_caj_aut  - $opefin_ant->cant_oper_caj_aut : $opefin->cant_oper_caj_aut - 0}}</td>
                                                </tr>
                                                <tr >
                                                    <td>Usuarios de cajeros automáticos</td>

                                                    <td>{{ $opefin_ant!=null ? $opefin_ant->usuario_caj_aut : 0}}</td>

                                                    <td>{{$opefin->usuario_caj_aut}}</td>

                                                    <td>{{ $opefin_ant!=null ? $opefin->usuario_caj_aut  - $opefin_ant->usuario_caj_aut : $opefin->usuario_caj_aut - 0}}</td>
                                                </tr>
                                                <tr >
                                                    <td>Punto de servicios de cajeros automáticos</td>

                                                    <td>{{ $opefin_ant!=null ? $opefin_ant->pto_serv_caj_aut : 0}}</td>

                                                    <td>{{$opefin->pto_serv_caj_aut}}</td>

                                                    <td>{{ $opefin_ant!=null ? $opefin->pto_serv_caj_aut  - $opefin_ant->pto_serv_caj_aut : $opefin->pto_serv_caj_aut - 0}}</td>
                                                </tr>




                                                </tbody>

                                            </table>
                                        @else
                                            <div class="alert alert-info" id="alerta"  role="alert">
                                                No existe la variable Cooperación entre cooperativas para el  año {{$ano->ano}} de la cooperativa "{{$nomb_coop->nombre}}".
                                            </div>
                                        @endif
                                    </div>
                                </div>

                            </section>

                            <section class="Tabla">
                                <div class="panel panel-default">
                                    <div>
                                        <h3>Integración cooperativa</h3>
                                        @if($intgra!=null)
                                            <table class="table  table-bordered table-sm table-hover tabla">
                                                <thead class="thead-light">
                                                <th>Integración cooperativa</th>
                                                <th >Año base : {{$intgra_ant!=null ? $intgra_ant->Ano->ano : 'No existe información' }} </th>
                                                <th >Año actual : {{$intgra->Ano->ano}}</th>
                                                <th>Variación</th>
                                                {{--<th>%</th>--}}
                                                </thead>
                                                <tbody>   <tr>    </tr>
                                                <tr >
                                                    <td></td>
                                                    <td><strong>Cantidad:</strong></td>

                                                    <td><strong>Cantidad:</strong></td>

                                                    <td><strong>Cantidad</strong></td>
                                                </tr>
                                                <tr >
                                                    <td>Cantidad de asociados que participan en asambleas de otras cooperativas</td>

                                                    <td>{{ $intgra_ant!=null ? $intgra_ant->cant_asoc_part_asamb_coop : 0}}</td>

                                                    <td>{{$intgra->cant_asoc_part_asamb_coop}}</td>

                                                    <td>{{ $intgra_ant!=null ? $intgra->cant_asoc_part_asamb_coop  - $intgra_ant->cant_asoc_part_asamb_coop : $intgra->cant_asoc_part_asamb_coop - 0}}</td>
                                                </tr>
                                                <tr >
                                                    <td>Cantidad de alianzas estratégicas institucionales</td>

                                                    <td>{{ $intgra_ant!=null ? $intgra_ant->cant_ali_est_inst : 0}}</td>

                                                    <td>{{$intgra->cant_ali_est_inst}}</td>

                                                    <td>{{ $intgra_ant!=null ? $intgra->cant_ali_est_inst  - $intgra_ant->cant_ali_est_inst : $intgra->cant_ali_est_inst - 0}}</td>
                                                </tr>
                                                <tr >
                                                    <td>Cantidad de alianzas estratégicas interinstitucionales</td>

                                                    <td>{{ $intgra_ant!=null ? $intgra_ant->cant_ali_est_interinst : 0}}</td>

                                                    <td>{{$intgra->cant_ali_est_interinst}}</td>

                                                    <td>{{ $intgra_ant!=null ? $intgra->cant_ali_est_interinst  - $intgra_ant->cant_ali_est_interinst : $intgra->cant_ali_est_interinst - 0}}</td>
                                                </tr>




                                                </tbody>

                                            </table>
                                        @else
                                            <div class="alert alert-info" id="alerta"  role="alert">
                                                No existe la variable Integración cooperativa para el  año {{$ano->ano}} de la cooperativa "{{$nomb_coop->nombre}}".
                                            </div>
                                        @endif
                                    </div>
                                </div>

                            </section>





                        </div>
                    </div>




                    <br>

                    <div class="panel panel-default">
                        <div class="panel-heading"><h2>Interés por la comunidad</h2> </div>
                        <div class="panel-body">

                            <section class="Tabla">
                                <div class="panel panel-default">

                                    <div class="panel-body">
                                        <div>
                                            <h3>Interés por la comunidad </h3>
                                            @if($intcom!=null)


                                                <table class="table  table-bordered table-sm table-hover tabla">
                                                    <thead class="thead-light">
                                                    <th >Conceptos</th>
                                                    <th >Año base : {{$intcom_ant!=null ? $intcom_ant->Ano->ano : 'No existe información' }} </th>
                                                    <th >Año actual : {{$intcom->Ano->ano}}</th>
                                                    <th>Variación</th>
                                                    {{--<th>%</th>--}}
                                                    </thead>
                                                    <tbody>   <tr>    </tr>
                                                    <tr >
                                                        <td></td>
                                                        <td><strong>Cantidad:</strong></td>
                                                        <td><strong>Cantidad:</strong></td>
                                                        <td><strong>Cantidad:</strong></td>

                                                    </tr>
                                                    <tr >
                                                        <td>Cantidad de actividades realizadas</td>

                                                        <td>{{ $intcom_ant!=null ? $intcom_ant->cant_act_real : 0}}</td>
                                                        <td>{{ $intcom!=null ? $intcom->cant_act_real : 0}}</td>
                                                        <td>{{$intcom_ant!=null ? ( $intcom->cant_act_real - $intcom_ant->cant_act_real) : $intcom->cant_act_real }}</td>
                                                    </tr>
                                                    <tr >
                                                        <td>Cantidad de participantes en las actividades desarrolladas en la comunidad</td>

                                                        <td>{{ $intcom_ant!=null ? $intcom_ant->cant_part_act_desr_com : 0}}</td>
                                                        <td>{{ $intcom!=null ? $intcom->cant_part_act_desr_com : 0}}</td>
                                                        <td>{{$intcom_ant!=null ? ( $intcom->cant_part_act_desr_com - $intcom_ant->cant_part_act_desr_com) : $intcom->cant_part_act_desr_com }}</td>
                                                    </tr>
                                                    <tr >
                                                        <td>Apoyo a instituciones comunitarias </td>

                                                        <td>{{ $intcom_ant!=null ? $intcom_ant->apoy_ints_comun : 0}}</td>
                                                        <td>{{ $intcom!=null ? $intcom->apoy_ints_comun : 0}}</td>
                                                        <td>{{$intcom_ant!=null ? ( $intcom->apoy_ints_comun - $intcom_ant->apoy_ints_comun) : $intcom->apoy_ints_comun }}</td>
                                                    </tr>











                                                    </tbody>

                                                </table>
                                            @else
                                                <div class="alert alert-info" id="alerta"  role="alert">
                                                    No existe la variable Interés por la comunidad para el  año {{$ano->ano}} de la cooperativa "{{$nomb_coop->nombre}}".
                                                </div>
                                            @endif

                                        </div>
                                    </div>


                                </div>
                            </section>
                        </div>
                    </div>
                @else
                @endif



















































                <br>




                    <div class="panel panel-default ">
                        <div class="panel-heading">
                            <h1 class="panel-title">Balance social cooperativo perteneciente al año {{$ano->ano}} de la cooperativa "{{$nomb_coop->nombre}}" </h1>
                        </div>
                        <div class="panel-body">

                                     <section class="Tabla">
                        @if($si_tiene_metas==false)

                            <div class="alert alert-danger" id="alerta"  role="alert">
                                El Programa "{{$nomb_prog}}" que pertenece al año {{$ano->ano}} no tiene metas por lo que no se puede emitir un balance para este año.
                                <a href="/balance/prog" class="pull-right">Continue</a>
                            </div>

                        @else
                            <table border="2" class="table  table-bordered table-sm  table-hover tabla" border="2">
                                <thead>
                                {{--<th class="col-sm-1">No.</th>
                                <th class="col-sm-1">Programas de desarrollo social</th>
                                <th class="col-sm-1">Presupuesto</th>

                                <th class="col-sm-1">Unidades Físicas Planificadas</th>
                                <th class="col-sm-1">Número de Beneficiarios Planificados</th>
                                <th class="col-sm-1">Unidades Fisicas Reales</th>
                                <th class="col-sm-1">Número de Beneficiarios Reales</th>
                                <th class="col-sm-1">% Cumplimiento UF</th>
                                <th class="col-sm-1">% Cumplimiento NB</th>
                                <th class="col-sm-1">Activo Social</th>
                                <th class="col-sm-1">Pasivo Social</th>
                                <th class="col-sm-1">Patrimonio Social</th>--}}

                                <th class="col-sm-1"><h6>No.</h6></th>
                                <th class="col-sm-1"><h6>  Programas de desarrollo social </h6></th>
                                <th class="col-sm-1"><h6>Presupuesto</h6></th>

                                <th class="col-sm-1"><h6>Unidades Físicas Planificadas</h6></th>
                                <th class="col-sm-1"><h6>Número de Beneficiarios Planificados</h6></th>
                                <th class="col-sm-1"><h6>Unidades Fisicas Reales</h6></th>
                                <th class="col-sm-1"><h6>Número de Beneficiarios Reales</h6></th>
                                <th class="col-sm-1"><h6>% Cumplimiento UF</h6></th>
                                <th class="col-sm-1"><h6>% Cumplimiento NB</h6></th>
                                <th class="col-sm-1"><h6>Activo Social</h6></th>
                                <th class="col-sm-1"><h6>Pasivo Social</h6></th>
                                <th class="col-sm-1"><h6>Patrimonio Social</h6></th>
                                </thead>
                                   <tbody>
                                            <tr>

                                            </tr>


                                @foreach($progs as $key => $prog)
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
                                            $sum_und_fis_real=$met->GetSeguimientos->sum('unid_fisicas_real')+$sum_und_fis_real;
                                            $sum_num_ben_real=$met->GetSeguimientos->sum('num_beneficiarios_real')+$sum_num_ben_real;
                                            ?>
                                        @endforeach
                                        <td>{{$sum_und_fis_real}}</td>
                                        <td>{{$sum_num_ben_real}}</td>
                                        <?php
                                        $sum_und_fis_satif=0;$sum_num_ben_satif=0;
                                        $sum_und_fis_satif=$sum_und_fis_real*100/$prog->Metas->sum('unid_fisicas_plan');
                                        $sum_num_ben_satif=$sum_num_ben_real*100/$prog->Metas->sum('beneficiarios_plan');

                                        $act_socil=$prog->Metas->sum('beneficiarios_plan')*100/$total_NB;

                                        $pat_social=round($sum_num_ben_satif,2)* $act_socil/100;/// patrimoniosocial

                                        $sum_und_fis_real=0;$sum_num_ben_real=0

                                        ?>

                                        <td>{{round($sum_und_fis_satif,2)}}</td>
                                        <td>{{round($sum_num_ben_satif,2)}}</td>
                                        @if(round($sum_num_ben_satif,2) > 100 )
                                            <td>{{round($pat_social,2)}} <small>ASA</small>    <br>{{round($prog->Metas->sum('beneficiarios_plan')*100/$total_NB,2)}} </td>
                                            <td>0</td>
                                            <td>{{round($pat_social,2)}}</td>
                                        @else

                                            <td>{{round($prog->Metas->sum('beneficiarios_plan')*100/$total_NB,2)}}</td>
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

                </section>
                        </div>
                    </div>

            </div>


        </div>
       </div>
    </body>
    </html>



