@extends('layouts.app')


@section('content')
    <br><br>

    <div class="alert alert-success" id="alerta" style="display: none" role="alert">
        Se añadió correctamente
    </div>
   {{-- @if(count($errors)>0)
        <div class="alert alert-danger alert-dismissable fade show" role="alert" >
            <button type="button" class="close" datadismiss="alert">&times;</button>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif--}}
    <form action="/VarV/actEFI/{{$efi->id}}" method="post">
        {{csrf_field()}}
        <section class="Tabla">
            <div class="panel panel-default col-sm-12 ">
                <div class="panel-title justify-content-center">
                    <h3>Educación formación e Informaón</h3>
                </div>
                <table class="table  table-bordered table-sm  tabla" >
                    <thead class="thead-light">
                    {{-- <th>Estado Civil</th>
                     <th colspan="2">Año base : {{$nivEscEmp_ant!=null ? $nivEscEmp_ant->Ano->ano : 'No existe información' }} </th>
                     <th colspan="2">Año actual : {{$nivEscEmp->Ano->ano}}</th>
                     <th>Variación</th>--}}
                    {{--<th>%</th>--}}
                    </thead>

                    <tbody>
                    <tr>

                        <div class="form-group row ">
                            <td>
                                <label for="uf" class=" col-form-label">Inversión realizada en el proceso de educación, formación e información </label>
                            </td>
                            <td>
                                <div class="col-sm-12 @if($errors->has('inv_proc_form_cap')) border-danger @endif">
                                    <input type="number"  id="inv_proc_form_cap" name="inv_proc_form_cap" min="0" value={{$efi->inv_proc_form_cap}} class="form-control">
                                    @foreach($errors->get('inv_proc_form_cap') as $error)
                                        <div class="form-control-feedback text-danger">{{$error}}</div>
                                    @endforeach

                                </div>
                            </td>
                            <td>
                                <label for="uf" class=" col-form-label">Inversión en educación, formación e información para jóvenes</label>
                            </td>
                            <td>
                                <div class="col-sm-12 @if($errors->has('inv_edu_form_inform_jov')) border-danger @endif">
                                    <input type="number" name="inv_edu_form_inform_jov" min="0"  value={{$efi->inv_edu_form_inform_jov}}  class="form-control">

                                    @foreach($errors->get('inv_edu_form_inform_jov') as $error)
                                        <div class="form-control-feedback text-danger">{{$error}}</div>
                                    @endforeach
                                </div>
                            </td>
                        </div>
                    </tr>
                    <tr>
                        <div class="form-group row">


                            <td>
                                <label for="uf" class=" col-form-label">Inversión en educación, formación e información para mujeres</label>
                            </td>
                            <td>
                                <div class="col-sm-12 @if($errors->has('inv_edu_form_inform_muj')) border-danger @endif">
                                    <input type="number" name="inv_edu_form_inform_muj" min="0"  value={{$efi->inv_edu_form_inform_muj}} class="form-control">

                                    @foreach($errors->get('inv_edu_form_inform_muj') as $error)
                                        <div class="form-control-feedback text-danger">{{$error}}</div>
                                    @endforeach
                                </div>
                            </td>
                            <td>
                                <label for="uf" class=" col-form-label">Inversión en educación, formación e información para empleados</label>
                            </td>
                            <td>
                                <div class="col-sm-12 @if($errors->has('inv_edu_form_inform_emp')) border-danger @endif">
                                    <input type="number" name="inv_edu_form_inform_emp" min="0"  value={{$efi->inv_edu_form_inform_emp}} class="form-control">

                                    @foreach($errors->get('inv_edu_form_inform_emp') as $error)
                                        <div class="form-control-feedback text-danger">{{$error}}</div>
                                    @endforeach
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
                                <div class="col-sm-12  @if($errors->has('inv_edu_form_inform_direct')) border-danger @endif">
                                    <input type="number"  name="inv_edu_form_inform_direct" min="0" value={{$efi->inv_edu_form_inform_direct}} class="form-control">

                                    @foreach($errors->get('inv_edu_form_inform_direct') as $error)
                                        <div class="form-control-feedback text-danger">{{$error}}</div>
                                    @endforeach
                                </div>
                            </td>
                            <td>
                                <label for="uf" class=" col-form-label">Inversión en educación, formación e información para niños</label>
                            </td>
                            <td>
                                <div class="col-sm-12  @if($errors->has('inv_edu_form_inform_ninos')) border-danger @endif">
                                    <input type="number" name="inv_edu_form_inform_ninos" min="0"  value={{$efi->inv_edu_form_inform_ninos}} class="form-control">

                                    @foreach($errors->get('inv_edu_form_inform_ninos') as $error)
                                        <div class="form-control-feedback text-danger">{{$error}}</div>
                                    @endforeach
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
                                <div class="col-sm-12 @if($errors->has('inv_edu_form_inform_comun')) border-danger @endif">
                                    <input type="number" name="inv_edu_form_inform_comun" min="0"  value={{$efi->inv_edu_form_inform_comun}} class="form-control">

                                    @foreach($errors->get('inv_edu_form_inform_comun') as $error)
                                        <div class="form-control-feedback text-danger">{{$error}}</div>
                                    @endforeach
                                </div>
                            </td>
                            <td>
                                <label for="uf" class=" col-form-label">Número de actividades en educación, formación e información</label>
                            </td>
                            <td>
                                <div class="col-sm-12 @if($errors->has('num_act_edu_form_inf')) border-danger @endif">
                                    <input type="number" name="num_act_edu_form_inf" min="0"   value={{$efi->num_act_edu_form_inf}} class="form-control">

                                    @foreach($errors->get('num_act_edu_form_inf') as $error)
                                        <div class="form-control-feedback text-danger">{{$error}}</div>
                                    @endforeach
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
                                <div class="col-sm-12 @if($errors->has('num_act_edu_form_inf_jov')) border-danger @endif">
                                    <input type="number"  name="num_act_edu_form_inf_jov" min="0" value={{$efi->num_act_edu_form_inf_jov}} class="form-control">

                                    @foreach($errors->get('num_act_edu_form_inf_jov') as $error)
                                        <div class="form-control-feedback text-danger">{{$error}}</div>
                                    @endforeach
                                </div>
                            </td>
                            <td>
                                <label for="uf" class=" col-form-label">Número de actividades en educación, formación e información para mujeres</label>
                            </td>
                            <td>
                                <div class="col-sm-12 @if($errors->has('num_act_edu_form_inf_muj')) border-danger @endif">
                                    <input type="number" name="num_act_edu_form_inf_muj" min="0"   value={{$efi->num_act_edu_form_inf_muj}}  class="form-control">

                                    @foreach($errors->get('num_act_edu_form_inf_muj') as $error)
                                        <div class="form-control-feedback text-danger">{{$error}}</div>
                                    @endforeach
                                </div>
                            </td>
                        </div>
                    <tr>
                        <div class="form-group">
                            <td>
                                <label for="uf" class=" col-form-label">Número de actividades en educación, formación e información para asociados</label>
                            </td>
                            <td>
                                <div class="col-sm-12 @if($errors->has('num_act_edu_form_inf_asoc')) border-danger @endif">
                                    <input type="number" name="num_act_edu_form_inf_asoc" min="0"  value={{$efi->num_act_edu_form_inf_asoc}} class="form-control">

                                    @foreach($errors->get('num_act_edu_form_inf_asoc') as $error)
                                        <div class="form-control-feedback text-danger">{{$error}}</div>
                                    @endforeach
                                </div>
                            </td>
                            <td>
                                <label for="uf" class=" col-form-label">Número de actividades en educación, formación e información para empleados</label>
                            </td>
                            <td>
                                <div class="col-sm-12 @if($errors->has('num_act_edu_form_inf_emp')) border-danger @endif">
                                    <input type="number" name="num_act_edu_form_inf_emp" min="0"  value={{$efi->num_act_edu_form_inf_emp}}  class="form-control">

                                    @foreach($errors->get('num_act_edu_form_inf_emp') as $error)
                                        <div class="form-control-feedback text-danger">{{$error}}</div>
                                    @endforeach
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
                                <div class="col-sm-12 @if($errors->has('num_act_edu_form_inf_direct')) border-danger @endif">
                                    <input type="number"  name="num_act_edu_form_inf_direct" min="0"  value={{$efi->num_act_edu_form_inf_direct}} class="form-control">

                                    @foreach($errors->get('num_act_edu_form_inf_direct') as $error)
                                        <div class="form-control-feedback text-danger">{{$error}}</div>
                                    @endforeach
                                </div>
                            </td>
                            <td>
                                <label for="uf" class=" col-form-label">Número de actividades en educación, formación e información para niños</label>
                            </td>
                            <td>
                                <div class="col-sm-12 @if($errors->has('num_act_edu_form_inf_ninos')) border-danger @endif">
                                    <input type="number" name="num_act_edu_form_inf_ninos" min="0"  value={{$efi->num_act_edu_form_inf_ninos}} class="form-control">

                                    @foreach($errors->get('num_act_edu_form_inf_ninos') as $error)
                                        <div class="form-control-feedback text-danger">{{$error}}</div>
                                    @endforeach
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
                                <div class="col-sm-12 @if($errors->has('num_act_edu_form_inf_comun')) border-danger @endif">
                                    <input type="number" name="num_act_edu_form_inf_comun" min="0" value={{$efi->num_act_edu_form_inf_comun}}  class="form-control">

                                    @foreach($errors->get('num_act_edu_form_inf_comun') as $error)
                                        <div class="form-control-feedback text-danger">{{$error}}</div>
                                    @endforeach
                                </div>
                            </td>
                            <td>
                                <label for="uf" class=" col-form-label">Cantidad de participantes en actividades de educación, formación e información</label>
                            </td>
                            <td>
                                <div class="col-sm-12 @if($errors->has('cant_part_act_educ_form_inform')) border-danger @endif">
                                    <input type="number" name="cant_part_act_educ_form_inform" min="0"  value={{$efi->cant_part_act_educ_form_inform}}  class="form-control">

                                    @foreach($errors->get('cant_part_act_educ_form_inform') as $error)
                                        <div class="form-control-feedback text-danger">{{$error}}</div>
                                    @endforeach
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
                                <div class="col-sm-12 @if($errors->has('cant_part_act_educ_form_inform_jov')) border-danger @endif">
                                    <input type="number"  name="cant_part_act_educ_form_inform_jov" min="0" value={{$efi->cant_part_act_educ_form_inform_jov}} class="form-control">

                                    @foreach($errors->get('cant_part_act_educ_form_inform_jov') as $error)
                                        <div class="form-control-feedback text-danger">{{$error}}</div>
                                    @endforeach
                                </div>
                            </td>
                            <td>
                                <label for="uf" class=" col-form-label">Cantidad de participantes en actividades de educación, formación e información para mujeres</label>
                            </td>
                            <td>
                                <div class="col-sm-12 @if($errors->has('cant_part_act_educ_form_inform_muj')) border-danger @endif">
                                    <input type="number" name="cant_part_act_educ_form_inform_muj" min="0"  value={{$efi->cant_part_act_educ_form_inform_muj}} class="form-control">


                                    @foreach($errors->get('cant_part_act_educ_form_inform_muj') as $error)
                                        <div class="form-control-feedback text-danger">{{$error}}</div>
                                    @endforeach
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
                                <div class="col-sm-12 @if($errors->has('cant_part_act_educ_form_inform_asoc')) border-danger @endif">
                                    <input type="number" name="cant_part_act_educ_form_inform_asoc" min="0"   value={{$efi->cant_part_act_educ_form_inform_asoc}} class="form-control">

                                    @foreach($errors->get('cant_part_act_educ_form_inform_asoc') as $error)
                                        <div class="form-control-feedback text-danger">{{$error}}</div>
                                    @endforeach
                                </div>
                            </td>
                            <td>
                                <label for="uf" class=" col-form-label">Cantidad de participantes en actividades de educación, formación e información para empleados</label>
                            </td>
                            <td>
                                <div class="col-sm-12 @if($errors->has('cant_part_act_educ_form_inform_emp')) border-danger @endif">
                                    <input type="number" name="cant_part_act_educ_form_inform_emp" min="0"  value={{$efi->cant_part_act_educ_form_inform_emp}}  class="form-control">

                                    @foreach($errors->get('cant_part_act_educ_form_inform_emp') as $error)
                                        <div class="form-control-feedback text-danger">{{$error}}</div>
                                    @endforeach
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
                                <div class="col-sm-12 @if($errors->has('cant_part_act_educ_form_inform_direct')) border-danger @endif">
                                    <input type="number"  name="cant_part_act_educ_form_inform_direct" value={{$efi->cant_part_act_educ_form_inform_direct}}  min="0" class="form-control">

                                    @foreach($errors->get('cant_part_act_educ_form_inform_direct') as $error)
                                        <div class="form-control-feedback text-danger">{{$error}}</div>
                                    @endforeach

                                </div>
                            </td>
                            <td>
                                <label for="uf" class=" col-form-label">Cantidad de participantes en actividades de educación, formación e información para niños</label>
                            </td>
                            <td>
                                <div class="col-sm-12 @if($errors->has('cant_part_act_educ_form_inform_ninos')) border-danger @endif">
                                    <input type="number" name="cant_part_act_educ_form_inform_ninos" min="0" value={{$efi->cant_part_act_educ_form_inform_ninos}}  class="form-control">

                                    @foreach($errors->get('cant_part_act_educ_form_inform_ninos') as $error)
                                        <div class="form-control-feedback text-danger">{{$error}}</div>
                                    @endforeach
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
                                <div class="col-sm-12 @if($errors->has('cant_part_act_educ_form_inform_comun')) border-danger @endif">
                                    <input type="number" name="cant_part_act_educ_form_inform_comun" min="0" value={{$efi->cant_part_act_educ_form_inform_comun}} class="form-control">

                                    @foreach($errors->get('cant_part_act_educ_form_inform_comun') as $error)
                                        <div class="form-control-feedback text-danger">{{$error}}</div>
                                    @endforeach
                                </div>
                            </td>
                            <td>
                                <label for="uf" class=" col-form-label">Cantidad de participantes en actividades de educación, formación e información sobre la filosofía cooperativa</label>
                            </td>
                            <td>
                                <div class="col-sm-12 @if($errors->has('cant_part_act_educ_form_inform_fil_coop')) border-danger @endif">
                                    <input type="number" name="cant_part_act_educ_form_inform_fil_coop" min="0" value={{$efi->cant_part_act_educ_form_inform_fil_coop}}  class="form-control">

                                    @foreach($errors->get('cant_part_act_educ_form_inform_fil_coop') as $error)
                                        <div class="form-control-feedback text-danger">{{$error}}</div>
                                    @endforeach

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
                                <div class="col-sm-12 @if($errors->has('cant_act_form_hab')) border-danger @endif">
                                    <input type="number"  name="cant_act_form_hab" min="0"  value={{$efi->cant_act_form_hab}}  class="form-control">

                                    @foreach($errors->get('cant_act_form_hab') as $error)
                                        <div class="form-control-feedback text-danger">{{$error}}</div>
                                    @endforeach
                                </div>
                            </td>
                            <td>
                                <label for="uf" class=" col-form-label">Cantidad de participantes en actividades para la formación de habilidades</label>
                            </td>
                            <td>
                                <div class="col-sm-12 @if($errors->has('cant_part_act_form_hab')) border-danger @endif">
                                    <input type="number" name="cant_part_act_form_hab" min="0" value={{$efi->cant_part_act_form_hab}}  class="form-control">

                                    @foreach($errors->get('cant_part_act_form_hab') as $error)
                                        <div class="form-control-feedback text-danger">{{$error}}</div>
                                    @endforeach
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