@extends('layouts.app')


@section('content')
    <br><br>
    <div class="container">


        <section class="Tabla">
            <div class="panel panel-default">
                <div>
                    <h3>Autonomia e Independencia</h3>
                    <table class="table  table-bordered table-sm table-hover tabla">
                        <thead class="thead-light">
                        <th>Aspectos</th>
                        <th colspan="2">Año base : {{$autindp_ant!=null ? $autindp_ant->Ano->ano : 'No existe información' }} </th>
                        <th colspan="2">Año actual : {{$autindp->Ano->ano}}</th>
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
                            <td>Capital propio</td>

                            <td>{{ $autindp_ant!=null ? $autindp_ant->capital_prop : 0}}</td>
                            <td>{{ $autindp_ant!=null ? round($autindp_ant->capital_prop * 100 /$total_ant ,2): 0}}</td>
                            <td>{{$autindp->capital_prop}}</td>
                            <td>{{round($autindp->capital_prop * 100 /$total,2)}}</td>
                            <td>{{ $autindp_ant!=null ? $autindp->capital_prop  - $autindp_ant->capital_prop : $autindp->capital_prop - 0}}</td>
                        </tr>
                        <tr >
                            <td>Capital externo</td>

                            <td>{{ $autindp_ant!=null ? $autindp_ant->capital_ext : 0}}</td>
                            <td>{{ $autindp_ant!=null ? round($autindp_ant->capital_ext * 100 /$total_ant,2) : 0}}</td>
                            <td>{{$autindp->capital_ext}}</td>
                            <td>{{round($autindp->capital_ext * 100 /$total,2)}}</td>
                            <td>{{ $autindp_ant!=null ? $autindp->capital_ext  - $autindp_ant->capital_ext : $autindp->capital_ext - 0}}</td>
                        </tr>

                        <tr >
                            <td>Acuerdos cumplidos con capital propio</td>

                            <td>{{ $autindp_ant!=null ? $autindp_ant->acu_cump_cap_prop : 0}}</td>
                            <td>{{ $autindp_ant!=null ? round($autindp_ant->acu_cump_cap_prop * 100 /$total_ant,2) : 0}}</td>
                            <td>{{$autindp->acu_cump_cap_prop}}</td>
                            <td>{{round($autindp->acu_cump_cap_prop * 100 /$total,2)}}</td>
                            <td>{{ $autindp_ant!=null ? $autindp->acu_cump_cap_prop  - $autindp_ant->acu_cump_cap_prop : $autindp->acu_cump_cap_prop - 0}}</td>
                        </tr>
                        <tr >
                            <td>Acuerdos cumplidos con capital externo</td>

                            <td>{{ $autindp_ant!=null ? $autindp_ant->acu_cump_cap_ext : 0}}</td>
                            <td>{{ $autindp_ant!=null ? round($autindp_ant->acu_cump_cap_ext * 100 /$total_ant,2) : 0}}</td>
                            <td>{{$autindp->acu_cump_cap_ext}}</td>
                            <td>{{round($autindp->acu_cump_cap_ext * 100 /$total,2)}}</td>
                            <td>{{ $autindp_ant!=null ? $autindp->acu_cump_cap_ext  - $autindp_ant->acu_cump_cap_ext : $autindp->acu_cump_cap_ext - 0}}</td>
                        </tr>
                        <tr >
                            <td>Acuerdos adoptados por iniciativa propia</td>

                            <td>{{ $autindp_ant!=null ? $autindp_ant->acu_cump_ini_prop : 0}}</td>
                            <td>{{ $autindp_ant!=null ? round($autindp_ant->acu_cump_ini_prop * 100 /$total_ant,2) : 0}}</td>
                            <td>{{$autindp->acu_cump_ini_prop}}</td>
                            <td>{{round($autindp->acu_cump_ini_prop * 100 /$total,2)}}</td>
                            <td>{{ $autindp_ant!=null ? $autindp->acu_cump_ini_prop  - $autindp_ant->acu_cump_ini_prop : $autindp->acu_cump_ini_prop - 0}}</td>
                        </tr>
                        <tr >
                            <td>Acuerdos adoptados por injerencia externa</td>

                            <td>{{ $autindp_ant!=null ? $autindp_ant->acu_cump_inj_ext : 0}}</td>
                            <td>{{ $autindp_ant!=null ? round($autindp_ant->acu_cump_inj_ext * 100 /$total_ant,2) : 0}}</td>
                            <td>{{$autindp->acu_cump_inj_ext}}</td>
                            <td>{{round($autindp->acu_cump_inj_ext * 100 /$total,2)}}</td>
                            <td>{{ $autindp_ant!=null ? $autindp->acu_cump_inj_ext  - $autindp_ant->acu_cump_inj_ext : $autindp->acu_cump_inj_ext - 0}}</td>
                        </tr>
                        <tr >
                            <td>Total</td>

                            <td>{{ $autindp_ant!=null ? ($autindp_ant->capital_prop +  $autindp_ant->capital_ext  +  $autindp_ant->acu_cump_cap_prop  +  $autindp_ant->acu_cump_cap_ext +  $autindp_ant->acu_cump_ini_prop +  $autindp_ant->acu_cump_inj_ext) : 0}}</td>
                            <td>{{ $autindp_ant!=null ? round(($autindp_ant->capital_prop * 100 /$total_ant)+(  $autindp_ant->capital_ext  * 100 /$total_ant)+(  $autindp_ant->acu_cump_cap_prop  * 100 /$total_ant)+(  $autindp_ant->acu_cump_cap_ext * 100 /$total_ant)+(  $autindp_ant->acu_cump_ini_prop * 100 /$total_ant)+(  $autindp_ant->acu_cump_inj_ext* 100 /$total_ant),2) : 0}}</td>
                            <td>{{$autindp->capital_prop +  $autindp->capital_ext  +  $autindp->acu_cump_cap_prop  +  $autindp->acu_cump_cap_ext +  $autindp->acu_cump_ini_prop +  $autindp->acu_cump_inj_ext}}</td>
                            <td>{{round(($autindp->capital_prop * 100 /$total)+(  $autindp->capital_ext  * 100 /$total)+(  $autindp->acu_cump_cap_prop  * 100 /$total)+(  $autindp->acu_cump_cap_ext * 100 /$total)+(  $autindp->acu_cump_ini_prop * 100 /$total)+(  $autindp->acu_cump_inj_ext* 100 /$total),2)}}</td>
                            <td>{{ $autindp_ant!=null ? ($autindp->capital_prop +  $autindp->capital_ext  +  $autindp->acu_cump_cap_prop  +  $autindp->acu_cump_cap_ext +  $autindp->acu_cump_ini_prop +  $autindp->acu_cump_inj_ext) - ($autindp_ant->capital_prop +  $autindp_ant->capital_ext  +  $autindp_ant->acu_cump_cap_prop  +  $autindp_ant->acu_cump_cap_ext +  $autindp_ant->acu_cump_ini_prop +  $autindp_ant->acu_cump_inj_ext): ($autindp->capital_prop +  $autindp->capital_ext  +  $autindp->acu_cump_cap_prop  +  $autindp->acu_cump_cap_ext +  $autindp->acu_cump_ini_prop +  $autindp->acu_cump_inj_ext) - 0}}</td>
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