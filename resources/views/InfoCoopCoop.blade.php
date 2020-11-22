@extends('layouts.app')


@section('content')
    <br><br>

    <div class="container">


        <section class="Tabla">
            <div class="panel panel-default">
                <div>
                    <h3>Cooperación entre cooperativas</h3>
                    <table class="table  table-bordered table-sm table-hover tabla">
                        <thead class="thead-light">
                        <th>Operaciones financieras entre cooperativas</th>
                        <th >Año base : {{$opefin_ant!=null ? $opefin_ant->Ano->ano : 'No existe información' }} </th>
                        <th >Año actual : {{$opefin->Ano->ano}}</th>
                        <th>Variación</th>
                        {{--<th>%</th>--}}
                        </thead>
                        <tbody>
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
                </div>
            </div>

        </section>

        <section class="Tabla">
            <div class="panel panel-default">
                <div>
                    <h3>Integración cooperativa</h3>
                    <table class="table  table-bordered table-sm table-hover tabla">
                        <thead class="thead-light">
                        <th>Integración cooperativa</th>
                        <th >Año base : {{$intgra_ant!=null ? $intgra_ant->Ano->ano : 'No existe información' }} </th>
                        <th >Año actual : {{$intgra->Ano->ano}}</th>
                        <th>Variación</th>
                        {{--<th>%</th>--}}
                        </thead>
                        <tbody>
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
                </div>
            </div>

        </section>





    </div>
@endsection
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