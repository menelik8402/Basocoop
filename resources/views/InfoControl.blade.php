@extends('layouts.app')


@section('content')
    <br><br>
    <div class="container">
        @if ($ano->id )
            <section class="Tabla">
                <div class="panel panel-default">
                    <div>
                        <h3>Comportamiento de las asambleas de asociados</h3>
                        <table class="table  table-bordered table-sm table-hover tabla">
                            <thead class="thead-light">
                            <th>Asambleas de asociados</th>
                            <th colspan="2">Año base : {{$compAsam_ant!=null ? $compAsam_ant->Ano->ano : 'No existe información' }} </th>
                            <th colspan="2">Año actual : {{$compAsam->Ano->ano}}</th>
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
                                <td>Progamadas</td>

                                <td>{{ $compAsam_ant!=null ? $compAsam_ant->convocadas : 0}}</td>
                                <td>{{ $compAsam_ant!=null ? round($compAsam_ant->convocadas * 100 /$total,2) : 0}}</td>
                                <td>{{$compAsam->convocadas}}</td>
                                <td>{{round($compAsam->convocadas * 100 /$total,2)}}</td>
                                <td>{{ $compAsam_ant!=null ? $compAsam->convocadas - $compAsam_ant->convocadas : $compAsam->convocadas - 0}}</td>
                            </tr>
                            <tr >
                                <td>Realizadas</td>

                                <td>{{ $compAsam_ant!=null ? $compAsam_ant->efectuadas : 0}}</td>
                                <td>{{ $compAsam_ant!=null ? round($compAsam_ant->efectuadas * 100 /$total,2) : 0}}</td>
                                <td>{{$compAsam->efectuadas}}</td>
                                <td>{{round($compAsam->efectuadas * 100 /$total,2)}}</td>
                                <td>{{ $compAsam_ant!=null ? $compAsam->efectuadas - $compAsam_ant->efectuadas : $compAsam->efectuadas - 0}}</td>
                            </tr>
                            <tr >
                                <td>Extraordinarias</td>

                                <td>{{ $compAsam_ant!=null ? $compAsam_ant->delegados : 0}}</td>
                                <td>{{ $compAsam_ant!=null ? round($compAsam_ant->delegados * 100 /$total,2) : 0}}</td>
                                <td>{{$compAsam->delegados}}</td>
                                <td>{{round($compAsam->delegados * 100 /$total,2)}}</td>
                                <td>{{ $compAsam_ant!=null ? $compAsam->delegados - $compAsam_ant->delegados : $compAsam->delegados - 0}}</td>
                            </tr>
                            <tr >
                                <td>Total</td>
                                <td>{{ $compAsam_ant!=null ? $compAsam_ant->convocadas +  $compAsam_ant->efectuadas +$compAsam_ant->delegados : 0}}</td>
                                <td>{{ $compAsam_ant!=null ? round(($compAsam_ant->convocadas * 100 /$total) + ($compAsam_ant->efectuadas * 100 /$total) + ($compAsam_ant->delegados * 100 /$total),2) : 0}}</td>
                                <td>{{$compAsam->convocadas+$compAsam->efectuadas+$compAsam->delegados}}</td>
                                <td>{{ $compAsam!=null ? round(($compAsam->convocadas * 100 /$total) + ($compAsam->efectuadas * 100 /$total) + ($compAsam->delegados * 100 /$total),2) : 0}}</td>
                                <td>{{ ($compAsam_ant!=null ? $compAsam->efectuadas - $compAsam_ant->efectuadas : $compAsam->efectuadas - 0) + ($compAsam_ant!=null ? $compAsam->convocadas - $compAsam_ant->convocadas : $compAsam->convocadas - 0) + ($compAsam_ant!=null ? $compAsam->delegados - $compAsam_ant->delegados : $compAsam->delegados - 0)}}</td>

                            </tr>







                            </tbody>

                        </table>
                    </div>
                </div>

            </section>

            <section class="Tabla">
                <div class="panel panel-default">
                    <div>
                        <h3>Estado de cumplimiento de los acuerdos de las Asambleas Generales de Asociados</h3>
                        <table class="table  table-bordered table-sm table-hover tabla">
                            <thead class="thead-light">
                            <th>Acuerdos</th>
                            <th colspan="2">Año base : {{$est_cump_asam_ant!=null ? $est_cump_asam_ant->Ano->ano : 'No existe información' }} </th>
                            <th colspan="2">Año actual : {{$est_cump_asam->Ano->ano}}</th>
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
                                <td>Cumplidos</td>

                                <td>{{ $est_cump_asam_ant!=null ? $est_cump_asam_ant->cumplido : 0}}</td>
                                <td>{{ $est_cump_asam_ant!=null ? round($est_cump_asam_ant->cumplido * 100 /$total ,2): 0}}</td>
                                <td>{{$est_cump_asam->cumplido}}</td>
                                <td>{{round($est_cump_asam->cumplido * 100 /$total,2)}}</td>
                                <td>{{ $est_cump_asam_ant!=null ? $est_cump_asam->cumplido  - $est_cump_asam_ant->cumplido :$est_cump_asam->cumplido- 0}}</td>
                            </tr>
                            <tr >
                                <td>En proceso de cumplimiento</td>

                                <td>{{ $est_cump_asam_ant!=null ? $est_cump_asam_ant->proc_cump : 0}}</td>
                                <td>{{ $est_cump_asam_ant!=null ? round($est_cump_asam_ant->proc_cump * 100 /$total,2) : 0}}</td>
                                <td>{{$est_cump_asam->proc_cump}}</td>
                                <td>{{round($est_cump_asam->proc_cump * 100 /$total,2)}}</td>
                                <td>{{ $est_cump_asam_ant!=null ? $est_cump_asam->proc_cump  - $est_cump_asam_ant->proc_cump :$est_cump_asam->proc_cump - 0}}</td>
                            </tr>
                            <tr >
                                <td>Total</td>

                                <td>{{ $est_cump_asam_ant!=null ? $est_cump_asam_ant->proc_cump + $est_cump_asam_ant->cumplido  : 0}}</td>
                                <td>{{ $est_cump_asam_ant!=null ? round(( $est_cump_asam_ant->proc_cump * 100 /$total) + ( $est_cump_asam_ant->cumplido * 100 /$total),2) : 0}}</td>
                                <td>{{$est_cump_asam->proc_cump + $est_cump_asam->cumplido}}</td>
                                <td>{{round(($est_cump_asam->proc_cump * 100 /$total) + ($est_cump_asam->cumplido * 100 /$total),2)}}</td>
                                <td>{{ $est_cump_asam_ant!=null ?($est_cump_asam->proc_cump + $est_cump_asam->cumplido) - ($est_cump_asam_ant->proc_cump + $est_cump_asam_ant->cumplido) : ($est_cump_asam->proc_cump + $est_cump_asam->cumplido) - 0}}</td>
                            </tr>








                            </tbody>

                        </table>
                    </div>
                </div>

            </section>


            <section class="Tabla">
                <div class="panel panel-default">
                    <div>
                        <h3>Participación de los asociados en Asambleas Generales de Asociados</h3>
                        <table class="table  table-bordered table-sm table-hover tabla">
                            <thead class="thead-light">
                            <th>Acuerdos</th>
                            <th colspan="2">Año base : {{$part_asm_gen_ant!=null ? $part_asm_gen_ant->Ano->ano : 'No existe información' }} </th>
                            <th colspan="2">Año actual : {{$part_asm_gen->Ano->ano}}</th>
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
                                <td>Socios convocados a asambleas</td>

                                <td>{{ $part_asm_gen_ant!=null ? $part_asm_gen_ant->soc_conv : 0}}</td>
                                <td>{{ $part_asm_gen_ant!=null ? round($part_asm_gen_ant->soc_conv * 100 /$total,2) : 0}}</td>
                                <td>{{$part_asm_gen->soc_conv}}</td>
                                <td>{{round($part_asm_gen->soc_conv * 100 /$total,2)}}</td>
                                <td>{{ $part_asm_gen_ant!=null ? $part_asm_gen->soc_conv  - $part_asm_gen_ant->soc_conv :$part_asm_gen->soc_conv- 0}}</td>
                            </tr>
                            <tr >
                                <td>Socios asistentes</td>

                                <td>{{ $part_asm_gen_ant!=null ? $part_asm_gen_ant->soc_asist : 0}}</td>
                                <td>{{ $part_asm_gen_ant!=null ? round($part_asm_gen_ant->soc_asist * 100 /$total,2) : 0}}</td>
                                <td>{{$part_asm_gen->soc_asist}}</td>
                                <td>{{round($part_asm_gen->soc_asist * 100 /$total,2)}}</td>
                                <td>{{ $part_asm_gen_ant!=null ? $part_asm_gen->soc_asist  - $part_asm_gen_ant->soc_asist :$part_asm_gen->soc_asist- 0}}</td>
                            </tr>
                            <tr >
                                <td>Total</td>

                                <td>{{ $part_asm_gen_ant!=null ? $part_asm_gen_ant->soc_asist + $part_asm_gen_ant->soc_conv : 0}}</td>
                                <td>{{ $part_asm_gen_ant!=null ? round(($part_asm_gen_ant->soc_asist * 100 /$total) + ($part_asm_gen_ant->soc_conv * 100 /$total),2)  : 0}}</td>
                                <td>{{$part_asm_gen->soc_asist + $part_asm_gen->soc_conv}}</td>
                                <td>{{round(($part_asm_gen->soc_asist * 100 /$total) + ($part_asm_gen->soc_conv * 100 /$total),2)}}</td>
                                <td>{{ $part_asm_gen_ant!=null ? ($part_asm_gen->soc_asist + $part_asm_gen->soc_conv)  - ($part_asm_gen_ant->soc_asist + $part_asm_gen_ant->soc_conv ) : ($part_asm_gen->soc_asist + $part_asm_gen->soc_conv) - 0}}</td>
                            </tr>








                            </tbody>

                        </table>
                    </div>
                </div>

            </section>

            <section class="Tabla">
                <div class="panel panel-default">
                    <div>
                        <h3>Equidad de género en los niveles de dirección</h3>
                        <table class="table  table-bordered table-sm table-hover tabla">
                            <thead class="thead-light">
                            <th>Sexo</th>
                            <th colspan="2">Año base : {{$equi_gen_niv_dir_ant!=null ? $equi_gen_niv_dir_ant->Ano->ano : 'No existe información' }} </th>
                            <th colspan="2">Año actual : {{$equi_gen_niv_dir->Ano->ano}}</th>
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
                                <td>Hombres</td>

                                <td>{{ $equi_gen_niv_dir_ant!=null ? $equi_gen_niv_dir_ant->hombres : 0}}</td>
                                <td>{{ $equi_gen_niv_dir_ant!=null ? round( $equi_gen_niv_dir_ant->hombres * 100 /$total,2) : 0}}</td>
                                <td>{{$equi_gen_niv_dir->hombres}}</td>
                                <td>{{round($equi_gen_niv_dir->hombres * 100 /$total,2)}}</td>
                                <td>{{ $equi_gen_niv_dir_ant!=null ? $equi_gen_niv_dir->hombres  - $equi_gen_niv_dir_ant->hombres :$equi_gen_niv_dir->hombres - 0}}</td>
                            </tr>
                            <tr >
                                <td>Mujeres</td>

                                <td>{{ $equi_gen_niv_dir_ant!=null ? $equi_gen_niv_dir_ant->mujeres : 0}}</td>
                                <td>{{ $equi_gen_niv_dir_ant!=null ? round($equi_gen_niv_dir_ant->mujeres * 100 /$total,2) : 0}}</td>
                                <td>{{$equi_gen_niv_dir->mujeres}}</td>
                                <td>{{round($equi_gen_niv_dir->mujeres * 100 /$total,2)}}</td>
                                <td>{{ $equi_gen_niv_dir_ant!=null ? $equi_gen_niv_dir->mujeres  - $equi_gen_niv_dir_ant->mujeres : $equi_gen_niv_dir->mujeres - 0}}</td>
                            </tr>
                            <tr >
                                <td>Total</td>

                                <td>{{ $equi_gen_niv_dir_ant!=null ? $equi_gen_niv_dir_ant->hombres + $equi_gen_niv_dir_ant->mujeres : 0}}</td>
                                <td>{{ $equi_gen_niv_dir_ant!=null ? round(($equi_gen_niv_dir_ant->mujeres * 100 /$total) + ($equi_gen_niv_dir_ant->hombres * 100 /$total),2)  : 0}}</td>
                                <td>{{$equi_gen_niv_dir->mujeres + $equi_gen_niv_dir->hombres}}</td>
                                <td>{{round(($equi_gen_niv_dir->mujeres * 100 /$total) + ($equi_gen_niv_dir->hombres * 100 /$total),2)}}</td>
                                <td>{{ $equi_gen_niv_dir_ant!=null ? ($equi_gen_niv_dir->mujeres + $equi_gen_niv_dir->hombres)  - ($equi_gen_niv_dir_ant->hombres + $equi_gen_niv_dir_ant->mujeres) : ($equi_gen_niv_dir->mujeres + $equi_gen_niv_dir->hombres) - 0}}</td>
                            </tr>








                            </tbody>

                        </table>
                    </div>
                </div>

            </section>



    @else

        @endif
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