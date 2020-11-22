@extends('layouts.app')


@section('content')


    <div class="alert alert-success" id="alerta" style="display: none" role="alert">
        Se añadió correctamente
    </div>
    {{--@if(count($errors)>0)
        <div class="alert alert-danger alert-dismissable fade show" role="alert" >
            <button type="button" class="close" datadismiss="alert">&times;</button>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif--}}
    <form action="/VarV/addEFI/" method="post">
        {{csrf_field()}}
        <section class="Tabla">
        <div class="panel panel-default col-sm-11 ">
            <div class="panel-title justify-content-center">
                <h3>Educación, formación e información</h3>
            </div>
                <table class="table  table-bordered table-sm table-hover tabla">
                    {{--  <thead class="thead-light">
                   -- <th>Estado Civil</th>
                      <th colspan="2">Año base : {{$nivEscEmp_ant!=null ? $nivEscEmp_ant->Ano->ano : 'No existe información' }} </th>
                      <th colspan="2">Año actual : {{$nivEscEmp->Ano->ano}}</th>
                      <th>Variación</th>--}}
                    {{--<th>%</th>
                    </thead>--}}

                    <tbody>
                    <tr>

                        <div class="form-group row ">
                            <td>
                                <label for="uf" class=" col-form-label">Inversión realizada en el proceso de educación, formación e información </label>
                            </td>
                            <td>
                                <div class="col-sm-12 @if($errors->has('inv_proc_form_cap')) border-danger @endif">
                                    <input type="number"  id="inv_proc_form_cap" name="inv_proc_form_cap" min="0" value="0" class="form-control ">
                                    @foreach($errors->get('inv_proc_form_cap') as $error)
                                        <div class="form-control-feedback text-danger">{{$error}}</div>
                                    @endforeach
                                </div>
                            </td>
                            <td>
                                <label for="uf" class=" col-form-label">Inversión en educación, formación e información para jóvenes</label>
                            </td>
                            <td>
                                <div class="col-sm-12">
                                    <input type="number" name="inv_edu_form_inform_jov" min="0" value="0" class="form-control">
                                    @foreach($errors->get('inv_edu_form_inform_jov') as $error)
                                        <div class="form-control-feedback text-danger">{{$error}}</div>
                                    @endforeach
                                </div>
                            </td
                            >
                        </div>
                    </tr>
                    <tr>
                        <div class="form-group row">

                            <td>
                                <label for="uf" class=" col-form-label">Inversión en educación, formación e información para mujeres</label>
                            </td>
                            <td>
                                <div class="col-sm-12">
                                    <input type="number" name="inv_edu_form_inform_muj" min="0" value="0" class="form-control">
                                </div>
                            </td>
                            <td>
                                <label for="uf" class=" col-form-label">Inversión en educación, formación e información para empleados</label>
                            </td>
                            <td>
                                <div class="col-sm-12">
                                    <input type="number" name="inv_edu_form_inform_emp" min="0" value="0" class="form-control">
                                </div>
                            </td>

                        </div>

                    </tr>
                    <tr>

                        <div class="form-group row ">
                            <td>
                                <label for="uf" class=" col-form-label">Inversión en educación, formación e información para directivos</label>
                            </td>
                            <td>
                                <div class="col-sm-12">
                                    <input type="number"  name="inv_edu_form_inform_direct" min="0" value="0" class="form-control">
                                </div>
                            </td>
                            <td>
                                <label for="uf" class=" col-form-label">Inversión en educación, formación e información para niños</label>
                            </td>
                            <td>
                                <div class="col-sm-12">
                                    <input type="number" name="inv_edu_form_inform_ninos" min="0" value="0" class="form-control">
                                </div>
                            </td>
                        </div>
                    </tr>
                    <tr>
                        <div class="form-group row">
                            <td>
                                <label for="uf" class=" col-form-label">Inversión en educación, formación e información para miembros de la comunidad</label>
                            </td>
                            <td>
                                <div class="col-sm-12">
                                    <input type="number" name="inv_edu_form_inform_comun" min="0" value="0" class="form-control">
                                </div>
                            </td>
                            <td>
                                <label for="uf" class=" col-form-label">Número de actividades en educación, formación e información</label>
                            </td>
                            <td>
                                <div class="col-sm-12">
                                    <input type="number" name="num_act_edu_form_inf" min="0" value="0" class="form-control">
                                </div>
                            </td>

                        </div>

                    </tr>
                    <tr>

                        <div class="form-group row ">
                            <td>
                                <label for="uf" class=" col-form-label">Número de actividades en educación, formación e información para jóvenes</label>
                            </td>
                            <td>
                                <div class="col-sm-12">
                                    <input type="number"  name="num_act_edu_form_inf_jov" min="0" value="0" class="form-control">
                                </div>
                            </td>
                            <td>
                                <label for="uf" class=" col-form-label">Número de actividades en educación, formación e información para mujeres</label>
                            </td>
                            <td>
                                <div class="col-sm-12">
                                    <input type="number" name="num_act_edu_form_inf_muj" min="0" value="0" class="form-control">
                                </div>
                            </td>
                        </div>
                    </tr>
                    <tr>
                        <div class="form-group row">
                            <td>
                                <label for="uf" class=" col-form-label">Número de actividades en educación, formación e información para asociados</label>
                            </td>
                            <td>
                                <div class="col-sm-12">
                                    <input type="number" name="num_act_edu_form_inf_asoc" min="0" value="0" class="form-control">
                                </div>
                            </td>
                            <td>
                                <label for="uf" class=" col-form-label">Número de actividades en educación, formación e información para empleados</label>
                            </td>
                            <td>
                                <div class="col-sm-12">
                                    <input type="number" name="num_act_edu_form_inf_emp" min="0" value="0" class="form-control">
                                </div>
                            </td>

                        </div>

                    </tr>
                    <tr>

                        <div class="form-group row ">
                            <td>
                                <label for="uf" class=" col-form-label">Número de actividades en educación, formación e información para directivos</label>
                            </td>
                            <td>
                                <div class="col-sm-12">
                                    <input type="number"  name="num_act_edu_form_inf_direct" min="0" value="0" class="form-control">
                                </div>
                            </td>
                            <td>
                                <label for="uf" class=" col-form-label">Número de actividades en educación, formación e información para niños</label>
                            </td>
                            <td>
                                <div class="col-sm-12">
                                    <input type="number" name="num_act_edu_form_inf_ninos" min="0" value="0" class="form-control">
                                </div>
                            </td>
                        </div>
                    </tr>
                    <tr>
                        <div class="form-group row">
                            <td>
                                <label for="uf" class=" col-form-label">Número de actividades en educación, formación e información para miembros de la comunidad</label>
                            </td>
                            <td>
                                <div class="col-sm-12">
                                    <input type="number" name="num_act_edu_form_inf_comun" min="0" value="0" class="form-control">
                                </div>
                            </td>
                            <td>
                                <label for="uf" class=" col-form-label">Cantidad de participantes en actividades de educación, formación e información</label>
                            </td>
                            <td>
                                <div class="col-sm-12">
                                    <input type="number" name="cant_part_act_educ_form_inform" min="0" value="0" class="form-control">
                                </div>
                            </td>

                        </div>

                    </tr>
                    <tr>

                        <div class="form-group row ">
                            <td>
                                <label for="uf" class=" col-form-label">Cantidad de participantes en actividades de educación, formación e información para jóvenes</label>
                            </td>
                            <td>
                                <div class="col-sm-12">
                                    <input type="number"  name="cant_part_act_educ_form_inform_jov" min="0" value="0" class="form-control">
                                </div>
                            </td>
                            <td>
                                <label for="uf" class=" col-form-label">Cantidad de participantes en actividades de educación, formación e información para mujeres</label>
                            </td>
                            <td>
                                <div class="col-sm-12">
                                    <input type="number" name="cant_part_act_educ_form_inform_muj" min="0" value="0" class="form-control">
                                </div>
                            </td>
                        </div>
                    </tr>
                    <tr>
                        <div class="form-group row">
                            <td>
                                <label for="uf" class=" col-form-label">Cantidad de participantes en actividades de educación, formación e información para asociados</label>
                            </td>
                            <td>
                                <div class="col-sm-12">
                                    <input type="number" name="cant_part_act_educ_form_inform_asoc" min="0" value="0" class="form-control">
                                </div>
                            </td>
                            <td>
                                <label for="uf" class=" col-form-label">Cantidad de participantes en actividades de educación, formación e información para empleados</label>
                            </td>
                            <td>
                                <div class="col-sm-12">
                                    <input type="number" name="cant_part_act_educ_form_inform_emp" min="0" value="0" class="form-control">
                                </div>
                            </td>

                        </div>

                    </tr>
                    <tr>

                        <div class="form-group row ">
                            <td>
                                <label for="uf" class=" col-form-label">Cantidad de participantes en actividades de educación, formación e información para directivos</label>
                            </td>
                            <td>
                                <div class="col-sm-12">
                                    <input type="number"  name="cant_part_act_educ_form_inform_direct" min="0" value="0" class="form-control">
                                </div>
                            </td>
                            <td>
                                <label for="uf" class=" col-form-label">Cantidad de participantes en actividades de educación, formación e información para niños</label>
                            </td>
                            <td>
                                <div class="col-sm-12">
                                    <input type="number" name="cant_part_act_educ_form_inform_ninos" min="0" value="0" class="form-control">
                                </div>
                            </td>
                        </div>
                    </tr>
                    <tr>
                        <div class="form-group row">
                            <td>
                                <label for="uf" class=" col-form-label">Cantidad de participantes en actividades de educación, formación e información para miembros de la comunidad</label>
                            </td>
                            <td>
                                <div class="col-sm-12">
                                    <input type="number" name="cant_part_act_educ_form_inform_comun" min="0" value="0" class="form-control">
                                </div>
                            </td>
                            <td>
                                <label for="uf" class=" col-form-label">Cantidad de participantes en actividades de educación, formación e información sobre la filosofía cooperativa</label>
                            </td>
                            <td>
                                <div class="col-sm-12">
                                    <input type="number" name="cant_part_act_educ_form_inform_fil_coop" min="0" value="0" class="form-control">
                                </div>
                            </td>

                        </div>

                    </tr>
                    <tr>

                        <div class="form-group row ">
                            <td>
                                <label for="uf" class=" col-form-label">Cantidad de actividades para la formación de habilidades</label>
                            </td>
                            <td>
                                <div class="col-sm-12">
                                    <input type="number"  name="cant_act_form_hab" min="0" value="0" class="form-control">
                                </div>
                            </td>
                            <td>
                                <label for="uf" class=" col-form-label">Cantidad de participantes en actividades para la formación de habilidades</label>
                            </td>
                            <td>
                                <div class="col-sm-12">
                                    <input type="number" name="cant_part_act_form_hab" min="0" value="0" class="form-control">
                                </div>
                            </td>


                        </div>

                    </tr>
                    <input type="hidden" id="id_ano" name="id_ano" value="{{$idano}}" >
                    <input type="hidden" id="id_cooperativa" name="id_cooperativa" value="{{$idcoop}}" >

                    </tbody>


                </table>
            <button type="submit" id="aceptar"  class="btn boton pull-right">Aceptar</button>
            </div>
        </div>

    </section>


    </form>











@endsection