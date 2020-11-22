@extends('layouts.app')


@section('content')

    <div class="container">
        <section class="Tabla">
            <div class="panel panel-default">

                <div class="panel-body">
                    <div>
                        <h3>Interés por la comunidad </h3>


                        <table class="table  table-bordered table-sm table-hover tabla">
                            <thead class="thead-light">
                            <th >Conceptos</th>
                            <th >Año base : {{$intcom_ant!=null ? $intcom_ant->Ano->ano : 'No existe información' }} </th>
                            <th >Año actual : {{$intcom->Ano->ano}}</th>
                            <th>Variación</th>
                            {{--<th>%</th>--}}
                            </thead>
                            <tbody>
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
                    </div>
                </div>

            </div>
        </section>
    </div>


    @endsection