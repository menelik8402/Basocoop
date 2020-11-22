@extends('layouts.app')


@section('content')
    <br><br>
    <div class="container">


        <section class="Tabla">
            <div class="panel panel-default">
                <div>
                    <h3>Distribución de los excedentes</h3>
                    <table class="table  table-bordered table-sm table-hover tabla">
                        <thead class="thead-light">
                        <th>Distribución</th>
                        <th colspan="2">Año base : {{$distribucion_utilidades_ant!=null ? $distribucion_utilidades_ant->Ano->ano : 'No existe información' }} </th>
                        <th colspan="2">Año actual : {{$distribucion_utilidades->Ano->ano}}</th>
                        <th>Variación</th>
                        {{--<th>%</th>--}}
                        </thead>
                        <tbody>
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
                            <td>{{ $distribucion_utilidades_ant!=null ? round( $distribucion_utilidades_ant->excedente * 100 /$total_ant,2) : 0}}</td>
                            <td>{{$distribucion_utilidades->excedente}}</td>
                            <td>{{round($distribucion_utilidades->excedente * 100 /$total,2)}}</td>
                            <td>{{ $distribucion_utilidades_ant!=null ? $distribucion_utilidades->excedente  - $distribucion_utilidades_ant->excedente : $distribucion_utilidades->excedente - 0}}</td>
                        </tr>
                        <tr >
                            <td>Capitalización</td>

                            <td>{{ $distribucion_utilidades_ant!=null ? $distribucion_utilidades_ant->capitalizar_coop : 0}}</td>
                            <td>{{ $distribucion_utilidades_ant!=null ? round($distribucion_utilidades_ant->capitalizar_coop * 100 /$total_ant,2) : 0}}</td>
                            <td>{{$distribucion_utilidades->capitalizar_coop}}</td>
                            <td>{{round($distribucion_utilidades->capitalizar_coop * 100 /$total,2)}}</td>
                            <td>{{ $distribucion_utilidades_ant!=null ? $distribucion_utilidades->capitalizar_coop  - $distribucion_utilidades_ant->capitalizar_coop : $distribucion_utilidades->capitalizar_coop - 0}}</td>
                        </tr>
                        <tr >
                            <td>Distribución a asociados</td>

                            <td>{{ $distribucion_utilidades_ant!=null ? $distribucion_utilidades_ant->distribucion_socios : 0}}</td>
                            <td>{{ $distribucion_utilidades_ant!=null ? round($distribucion_utilidades_ant->distribucion_socios * 100 /$total_ant,2) : 0}}</td>
                            <td>{{$distribucion_utilidades->distribucion_socios}}</td>
                            <td>{{ round($distribucion_utilidades->capitalizar_coop * 100 /$total) }}</td>
                            <td>{{ $distribucion_utilidades_ant!=null ? $distribucion_utilidades->distribucion_socios  - $distribucion_utilidades_ant->distribucion_socios : $distribucion_utilidades->distribucion_socios - 0}}</td>
                        </tr>
                        <tr >
                            <td>Reservas</td>

                            <td>{{ $distribucion_utilidades_ant!=null ? $distribucion_utilidades_ant->reservas : 0}}</td>
                            <td>{{ $distribucion_utilidades_ant!=null ? round($distribucion_utilidades_ant->reservas * 100 /$total_ant ,2): 0}}</td>
                            <td>{{$distribucion_utilidades->reservas}}</td>
                            <td>{{round($distribucion_utilidades->reservas * 100 /$total,2)}}</td>
                            <td>{{ $distribucion_utilidades_ant!=null ? $distribucion_utilidades->reservas  - $distribucion_utilidades_ant->reservas : $distribucion_utilidades->reservas - 0}}</td>
                        </tr>
                        <tr >
                            <td>Capital social</td>

                            <td>{{ $distribucion_utilidades_ant!=null ? $distribucion_utilidades_ant->fondo_sociales : 0}}</td>
                            <td>{{ $distribucion_utilidades_ant!=null ? round($distribucion_utilidades_ant->fondo_sociales * 100 /$total_ant,2) : 0}}</td>
                            <td>{{$distribucion_utilidades->fondo_sociales}}</td>
                            <td>{{round($distribucion_utilidades->fondo_sociales * 100 /$total,2)}}</td>
                            <td>{{ $distribucion_utilidades_ant!=null ? $distribucion_utilidades->fondo_sociales  - $distribucion_utilidades_ant->fondo_sociales : $distribucion_utilidades->fondo_sociales - 0}}</td>
                        </tr>
                        <tr >
                            <td>Capital Percápita</td>

                            <td>{{ $distribucion_utilidades_ant!=null ? $distribucion_utilidades_ant->capital_per : 0}}</td>
                            <td>{{ $distribucion_utilidades_ant!=null ? round($distribucion_utilidades_ant->capital_per * 100 /$total_ant,2) : 0}}</td>
                            <td>{{$distribucion_utilidades->capital_per}}</td>
                            <td>{{round($distribucion_utilidades->capital_per * 100 /$total,2)}}</td>
                            <td>{{ $distribucion_utilidades_ant!=null ? $distribucion_utilidades->capital_per  - $distribucion_utilidades_ant->capital_per : $distribucion_utilidades->capital_per - 0}}</td>
                        </tr>

                        <tr >
                            <td>Total</td>

                            <td>{{ $distribucion_utilidades_ant!=null ? ($distribucion_utilidades_ant->capital_per + $distribucion_utilidades_ant->fondo_sociales + $distribucion_utilidades_ant->reservas + $distribucion_utilidades_ant->distribucion_socios + $distribucion_utilidades_ant->capitalizar_coop + $distribucion_utilidades_ant->excedente ) : 0}}</td>
                            <td>{{ $distribucion_utilidades_ant!=null ? round(($distribucion_utilidades_ant->capital_per * 100 /$total_ant)+( $distribucion_utilidades_ant->fondo_sociales * 100 /$total_ant)+( $distribucion_utilidades_ant->reservas * 100 /$total_ant)+( $distribucion_utilidades_ant->distribucion_socios * 100 /$total_ant)+( $distribucion_utilidades_ant->capitalizar_coop * 100 /$total_ant)+( $distribucion_utilidades_ant->excedente* 100 /$total_ant),2) : 0}}</td>
                            <td>{{($distribucion_utilidades->capital_per + $distribucion_utilidades->fondo_sociales + $distribucion_utilidades->reservas + $distribucion_utilidades->distribucion_socios + $distribucion_utilidades->capitalizar_coop + $distribucion_utilidades->excedente )}}</td>
                            <td>{{round(($distribucion_utilidades->capital_per * 100 /$total)+( $distribucion_utilidades->fondo_sociales * 100 /$total)+( $distribucion_utilidades->reservas * 100 /$total)+( $distribucion_utilidades->distribucion_socios * 100 /$total)+( $distribucion_utilidades->capitalizar_coop * 100 /$total)+( $distribucion_utilidades->excedente* 100 /$total),2)}}</td>
                            <td>{{ $distribucion_utilidades_ant!=null ? ($distribucion_utilidades->capital_per + $distribucion_utilidades->fondo_sociales + $distribucion_utilidades->reservas + $distribucion_utilidades->distribucion_socios + $distribucion_utilidades->capitalizar_coop + $distribucion_utilidades->excedente )  - ($distribucion_utilidades_ant->capital_per + $distribucion_utilidades_ant->fondo_sociales + $distribucion_utilidades_ant->reservas + $distribucion_utilidades_ant->distribucion_socios + $distribucion_utilidades_ant->capitalizar_coop + $distribucion_utilidades_ant->excedente ) : ($distribucion_utilidades->capital_per + $distribucion_utilidades->fondo_sociales + $distribucion_utilidades->reservas + $distribucion_utilidades->distribucion_socios + $distribucion_utilidades->capitalizar_coop + $distribucion_utilidades->excedente ) - 0}}</td>
                        </tr>









                        </tbody>

                    </table>
                </div>
            </div>

        </section>





    </div>

    <script>
        var tabla = $('.tabla');
        var tablaDT;

        var añadir;
        {{--var info;--}}
        {{--var a = {!! $ano !!};--}}
        {{--var editClick;--}}
        {{--var addClick;--}}
        {{--var delClick;--}}
        $(document).ready(function () {
            // tablaDT = tabla.DataTable();

        });

    </script>

@endsection