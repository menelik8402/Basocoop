@extends('layouts.app')


@section('content')
    <br><br>
    <div class="container">
        <section class="Tabla">
            <div class="panel panel-default">

                <div class="panel-body">
                    <div>
                        <h3>Educación formación e Información</h3>


                        <table class="table  table-bordered table-sm table-hover tabla">
                            <thead class="thead-light">
                            <th >Conceptos</th>
                            <th >Año base : {{$educ_form_inf_ant!=null ? $educ_form_inf_ant->Ano->ano : 'No existe información' }} </th>
                            <th >Año actual : {{$educ_form_inf->Ano->ano}}</th>
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
                        <a href="/VarV" class="boton btn pull-right">atrás</a>
                    </div>
                </div>

            </div>
        </section>
    </div>
    @endsection
