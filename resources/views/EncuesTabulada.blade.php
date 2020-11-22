@extends('layouts.app')


@section('content')
    <br><br>

            <div class="panel">
                <div class="panel-heading "><h1 align="center" >Resultados de las Encuestas</h1></div>
                <div class="panel-body">



                        <div class="row justify-content-center">
                                <div class="card ">
                                    <div class="card-header">   <h3>Cantidad de encuestados</h3>  </div>
                                    <div class="card-body">



                                        <table class="table  table-bordered table-sm table-hover tabla">
                                            <thead class="thead-light">
                                            <th>Encuestados</th>
                                            <th>Cantidad</th>
                                            <th>%</th>
                                            </thead>
                                            <tbody>

                                            <tr>
                                                <td>Hombres</td>
                                                <td>{{$hombres}}</td>
                                                <td>{{$hombres * 100/ ($hombres + $mujeres)}}</td>


                                            </tr>
                                            <tr>
                                                <td>Mujeres</td>
                                                <td>{{$mujeres}}</td>
                                                <td>{{$mujeres * 100/($hombres + $mujeres)}}</td>

                                            </tr>



                                                <td>Total</td>


                                                <td>{{$hombres + $mujeres}}</td>
                                                <td>{{($hombres + $mujeres)*100/($hombres + $mujeres)}}</td>

                                            </tr>


                                            </tbody>

                                        </table>
                                    </div>
                                </div>







                            <div class="row justify-content-center">
                                <div class="card ">
                                    <div class="card-header">   <h3>Estatus</h3>  </div>
                                    <div class="card-body">



                                        <table class="table  table-bordered table-sm table-hover tabla">
                                            <thead class="thead-light">
                                            <th>Encuestados</th>
                                            <th>Cantidad</th>
                                            <th>%</th>
                                            </thead>
                                            <tbody>


                                            <tr>
                                                <td>Asociados</td>
                                                <td>{{$cant_asoc}}</td>
                                                <td>{{$cant_asoc * 100/($hombres + $mujeres)}}</td>

                                            </tr>
                                            <tr>
                                                <td>Empleados</td>
                                                <td>{{$cant_emp}}</td>
                                                <td>{{round($cant_emp * 100/($hombres + $mujeres),2)}}</td>

                                            </tr>
                                            <tr>
                                                <td>Directivos</td>
                                                <td>{{$cant_direct}}</td>
                                                <td>{{round($cant_direct * 100/($hombres + $mujeres),2)}}</td>

                                            </tr>
                                            <tr>
                                                <td>No asociados</td>
                                                <td>{{$cant_noasoc}}</td>
                                                <td>{{round($cant_noasoc * 100/($hombres + $mujeres),2)}}</td>

                                            </tr>
                                            <tr>

                                                <td>Total</td>


                                                <td>{{$hombres + $mujeres}}</td>
                                                <td>{{round(($hombres + $mujeres)*100/($hombres + $mujeres),2)}}</td>

                                            </tr>


                                            </tbody>

                                        </table>
                                    </div>
                                </div>





                            <div class="card pull-left mx-1">
                                <div class="card-header">   <h3>Rangos de Edad</h3>  </div>
                                <div class="card-body">



                                    <table class="table  table-bordered table-sm table-hover tabla">
                                        <thead class="thead-light">
                                        <th>Rango</th>
                                        <th>18-25</th>
                                        <th>26-35</th>
                                        <th>36-45</th>
                                        <th>46-55</th>
                                        <th>56-60</th>
                                        <th>61-70</th>
                                        <th>70 o más</th>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>Totales</td>
                                            <td>{{$rang_18_25}}</td>
                                            <td>{{$rang_26_35}}</td>
                                            <td>{{$rang_36_45}}</td>
                                            <td>{{$rang_46_55}}</td>
                                            <td>{{$rang_56_60}}</td>
                                            <td>{{$rang_61_70}}</td>
                                            <td>{{$rang_70mas}}</td>



                                        </tr>
                                        <tr>
                                            <td>Porciento</td>
                                            <td>{{round($rang_18_25 * 100/ $total,2)}}</td>
                                            <td>{{round($rang_26_35 * 100/ $total,2)}}</td>
                                            <td>{{round($rang_36_45 * 100/ $total,2) }}</td>
                                            <td>{{round($rang_46_55 * 100/ $total,2) }}</td>
                                            <td>{{round($rang_56_60 * 100/ $total,2)}}</td>
                                            <td>{{round($rang_61_70 * 100/ $total,2)}}</td>
                                            <td>{{round($rang_70mas * 100/ $total,2) }}</td>



                                        </tr>



                                        </tbody>

                                    </table>
                                </div>
                            </div>

                            <div class="card pull-left mx-1">
                                <div class="card-header">   <h3>Nivel Escolaridad</h3>  </div>
                                <div class="card-body">



                                    <table class="table  table-bordered table-sm table-hover tabla">
                                        <thead class="thead-light">
                                        <th>Nivel=></th>
                                        <th>Ninguno</th>
                                        <th>Básico</th>
                                        <th>Medio</th>
                                        <th>Superior</th>
                                        <th>PostGrado</th>

                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>Totales</td>
                                            <td>{{$ninguno}}</td>
                                            <td>{{$basico}}</td>
                                            <td>{{$medio}}</td>
                                            <td>{{$superior}}</td>
                                            <td>{{$postgrado}}</td>




                                        </tr>
                                        <tr>
                                            <td>Porciento</td>
                                            <td>{{round($ninguno * 100/ $total,2)}}</td>
                                            <td>{{round($basico * 100/ $total,2)}}</td>
                                            <td>{{round($medio * 100/ $total,2) }}</td>
                                            <td>{{round($superior * 100/ $total,2) }}</td>
                                            <td>{{round($postgrado * 100/ $total,2)}}</td>




                                        </tr>



                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    <br>


                    <div class="row justify-content-center">
                        <div class="card  mt-1 mx-1">
                            <div class="card-header">   <h3>Tipo de Vivienda</h3>  </div>
                            <div class="card-body">
                                <table class="table  table-bordered table-sm table-hover tabla">
                                    <thead class="thead-light">
                                    <th>Tipos =></th>
                                    <th>Propia</th>

                                    <th>Alquilada</th>
                                    <th>Financiada </th>
                                    <th>Otras </th>


                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Totales</td>
                                        <td>{{$tipo_viv_pro}}</td>

                                        <td>{{$tipo_viv_alq}}</td>
                                        <td>{{$tipo_viv_financ}}</td>
                                        <td>{{$tipo_viv_otra}}</td>

                                    </tr>
                                    <tr>
                                        <td>Porciento</td>
                                        <td>{{round($tipo_viv_pro * 100/ ($hombres + $mujeres),2)}}</td>

                                        <td>{{round($tipo_viv_alq * 100/ ($hombres + $mujeres),2)}}</td>
                                        <td>{{round($tipo_viv_financ * 100/ ($hombres + $mujeres),2)}}</td>
                                        <td>{{round($tipo_viv_otra * 100/ ($hombres + $mujeres),2)}}</td>
                                    </tr>



                                    </tbody>

                                </table>
                            </div>
                        </div>
                        <div class="card  mt-1">
                                    <div class="card-header">   <h3>Cursos de Capacitacion</h3>  </div>
                                    <div class="card-body">
                                <table class="table  table-bordered table-sm table-hover tabla">
                                    <thead class="thead-light">
                                    <th>Cursos =></th>
                                    <th>Emprendedurismo </th>
                                    <th>Filosofía Cooperativa </th>
                                    <th>Educación financiera</th>
                                    <th>Educación ambiental</th>
                                    <th>Inteligencia Emocional </th>
                                    <th>Fundamentos legales del cooperativismo </th>
                                    <th>Adulto mayor</th>
                                    <th>Oficios </th>

                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Totales</td>
                                        <td>{{$capa_emprend}}</td>
                                        <td>{{$capa_filos_coop}}</td>
                                        <td>{{$capa_edu_financ}}</td>
                                        <td>{{$capa_edu_ambient}}</td>
                                        <td>{{$capa_intel_emoc}}</td>
                                        <td>{{$capa_fundam_legal}}</td>
                                        <td>{{$capa_adult_mayor}}</td>
                                        <td>{{$capa_oficio}}</td>

                                    </tr>
                                    <tr>
                                        <td>Porciento</td>
                                        <td>{{round($capa_emprend * 100/ ($hombres + $mujeres),2)}}</td>
                                        <td>{{round($capa_filos_coop * 100/ ($hombres + $mujeres),2)}}</td>
                                        <td>{{round($capa_edu_financ * 100/ ($hombres + $mujeres),2)}}</td>
                                        <td>{{round($capa_edu_ambient * 100/ ($hombres + $mujeres),2)}}</td>
                                        <td>{{round($capa_intel_emoc * 100/ ($hombres + $mujeres),2)}}</td>
                                        <td>{{round($capa_fundam_legal * 100/ ($hombres + $mujeres),2)}}</td>
                                        <td>{{round($capa_adult_mayor * 100/ ($hombres + $mujeres),2)}}</td>
                                        <td>{{round($capa_oficio * 100/ ($hombres + $mujeres),2)}}</td>


                                    </tr>



                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                    <br>

                    <div  class="row">
                        <div class="card  mt-1">
                            <div class="card-header">   <h3>Actividades Socioculturales en la cooperativa</h3>  </div>
                            <div class="card-body">
                                <table class="table  table-bordered table-sm table-hover tabla">
                                    <thead class="thead-light">
                                    <th>Actividades Socioculturales =></th>
                                    <th>Fiesta del niño  </th>
                                    <th>Día del Padre  </th>
                                    <th>Día de la Madre </th>
                                    <th>Día Internacional de la Mujer </th>
                                    <th>Adulto Mayor </th>
                                    <th>Encuentros de asociados </th>
                                    <th>Festivales </th>


                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Totales</td>
                                        <td>{{$act_soc_fiest_nino}}</td>
                                        <td>{{$act_soc_dia_pad}}</td>
                                        <td>{{$act_soc_dia_mad}}</td>
                                        <td>{{$act_soc_dia_int_muj}}</td>
                                        <td>{{$act_soc_adult_mayor}}</td>
                                        <td>{{$act_soc_enc_asoc}}</td>
                                        <td>{{$act_soc_festiv}}</td>

                                    </tr>
                                    <tr>
                                        <td>Porciento</td>
                                        <td>{{round($act_soc_fiest_nino * 100/ ($hombres + $mujeres),2)}}</td>
                                        <td>{{round($act_soc_dia_pad * 100/ ($hombres + $mujeres),2)}}</td>
                                        <td>{{round($act_soc_dia_mad * 100/ ($hombres + $mujeres),2)}}</td>
                                        <td>{{round($act_soc_dia_int_muj * 100/ ($hombres + $mujeres),2)}}</td>
                                        <td>{{round($act_soc_adult_mayor * 100/ ($hombres + $mujeres),2)}}</td>
                                        <td>{{round($act_soc_enc_asoc * 100/ ($hombres + $mujeres),2)}}</td>
                                        <td>{{round($act_soc_festiv * 100/ ($hombres + $mujeres),2)}}</td>


                                    </tr>



                                    </tbody>

                                </table>
                            </div>
                        </div>


                    </div>
                    <BR>

                    <div class="row justify-content-center">
                        <div class="card justify-content-center mt-1">
                            <div class="card-header">   <h3>Necesidades en las Viviendas</h3>  </div>
                            <div class="card-body">



                                <table class="table  table-bordered table-sm table-hover tabla">
                                    <thead class="thead-light">
                                    <th>Tipo =></th>
                                    <th>Construccion Total</th>
                                    <th>Reparacion Total</th>
                                    <th>Reparacion Media</th>
                                    <th>Reparacion Ligera</th>

                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Totales</td>
                                        <td>{{$conttotal}}</td>
                                        <td>{{$reptotal}}</td>
                                        <td>{{$repmedia}}</td>
                                        <td>{{$repligera}}</td>



                                    </tr>
                                    <tr>
                                        <td>Porciento</td>
                                        <td>{{round($conttotal * 100/ $total_casas_prob,2)}}</td>
                                        <td>{{round($reptotal * 100/ $total_casas_prob,2)}}</td>
                                        <td>{{round($repmedia * 100/ $total_casas_prob,2) }}</td>
                                        <td>{{round($repligera * 100/ $total_casas_prob,2) }}</td>



                                    </tr>



                                    </tbody>

                                </table>
                            </div>
                        </div>

                        <div class="card justify-content-center mx-1 mt-1">
                            <div class="card-header">   <h3>Autos</h3>  </div>
                            <div class="card-body">



                                <table class="table  table-bordered table-sm table-hover tabla">
                                    <thead class="thead-light">
                                    <th>Detalles =></th>
                                    <th>Auto</th>

                                    <th>Reparacion de auto</th>


                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Totales</td>
                                        <td>{{$auto}}</td>
                                        <td>{{$repauto}}</td>





                                    </tr>
                                    <tr>
                                        <td>Porciento</td>
                                        <td>{{round($auto * 100/ ($hombres + $mujeres),2)}}</td>
                                        <td>{{round($repauto * 100/ ($hombres + $mujeres),2)}}</td>





                                    </tr>



                                    </tbody>

                                </table>
                            </div>
                        </div>

                        <div class="card justify-content-center mx-1 mt-1">
                            <div class="card-header">   <h3>Recreacion </h3>  </div>
                            <div class="card-body">



                                <table class="table  table-bordered table-sm table-hover tabla">
                                    <thead class="thead-light">
                                    <th>Detalles =></th>
                                    <th>Buena</th>
                                    <th>Mala</th>
                                    <th>Regular</th>


                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Totales</td>
                                        <td>{{$buena}}</td>
                                        <td>{{$mala}}</td>
                                        <td>{{$regular}}</td>




                                    </tr>
                                    <tr>
                                        <td>Porciento</td>
                                        <td>{{round($buena * 100/ ($hombres + $mujeres),2)}}</td>
                                        <td>{{round($mala * 100/ ($hombres + $mujeres),2)}}</td>
                                        <td>{{round($regular * 100/ ($hombres + $mujeres),2) }}</td>




                                    </tr>



                                    </tbody>

                                </table>
                            </div>
                        </div>





                    </div>



                    <div class="row justify-content-center">
                        <div class="card justify-content-center mt-1">
                            <div class="card-header">   <h3>Otros datos obtenidos en las encuestas</h3>  </div>
                            <div class="card-body">



                                <table class="table  table-bordered table-sm table-hover tabla">
                                    <thead class="thead-light">
                                    <th>Detalle =></th>
                                    <th>Necesidad de Vivienda</th>
                                    <th>Seguro de Vida</th>
                                    <th>Seguro de Vehiculo</th>
                                    <th>Pers Enferm</th>
                                    <th>Tiene Niños</th>
                                    <th>Ayuda Niños</th>
                                    <th>Acceso a /n Serv.Fun</th>
                                    <th>Ayuda Serv.Fun</th>
                                    {{--<th>Part act sociale</th>--}}
                                    <th>Reforestación</th>
                                    <th>Cajero Automático</th>
                                    <th>Lineas Credito</th>
                                    <th>Necesidad de cajero Aut</th>



                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>SI</td>
                                        <td>{{$necesida_viv_si}}</td>
                                        <td>{{$seguro_vida_si}}</td>
                                        <td>{{$seguro_vehic_si}}</td>
                                        <td>{{$per_enfermas_si}}</td>
                                        <td>{{$ninos_si}}</td>
                                        <td>{{$ninos_ayu_si}}</td>
                                        <td>{{$serv_funerarios_si}}</td>
                                        <td>{{$ayuda_serv_fun_si}}</td>
                                        {{--<td>{{$part_act_soc_si}}</td>--}}
                                        <td>{{$act_reforest_si}}</td>
                                        <td>{{$caj_aut_si}}</td>
                                        <td>{{$linea_cred_si}}</td>
                                        <td>{{$nec_caj_aut_si}}</td>


                                    </tr>
                                    <tr>
                                        <td>NO</td>
                                        <td>{{$necesida_viv_no}}</td>
                                        <td>{{$seguro_vida_no}}</td>
                                        <td>{{$seguro_vehic_si}}</td>
                                        <td>{{$per_enfermas_no}}</td>
                                        <td>{{$ninos_no}}</td>
                                        <td>{{$ninos_ayu_no}}</td>
                                        <td>{{$serv_funerarios_no}}</td>
                                        <td>{{$ayuda_serv_fun_no}}</td>
                                       {{-- <td>{{$part_act_soc_no}}</td>--}}

                                        <td>{{$act_reforest_no}}</td>
                                        <td>{{$caj_aut_si}}</td>
                                        <td>{{$linea_cred_no}}</td>
                                        <td>{{$nec_caj_aut_no}}</td>

                                    </tr>

                                    <tr>
                                        <td>% Positivo </td>
                                        <td>{{round($necesida_viv_si*100/($necesida_viv_no+$necesida_viv_si),2)}}</td>
                                        <td>{{round($seguro_vida_si*100/($seguro_vida_si+$seguro_vida_no),2)}}</td>
                                        <td>{{round($seguro_vehic_si*100/($seguro_vehic_no+$seguro_vehic_si),2)}}</td>
                                        <td>{{round($per_enfermas_si*100/($per_enfermas_si+$per_enfermas_no),2)}}</td>
                                        <td>{{round($ninos_si*100/($ninos_no+$ninos_si),2)}}</td>
                                        <td>{{round($ninos_ayu_si*100/($ninos_ayu_no+$ninos_ayu_si),2)}}</td>
                                        <td>{{round($serv_funerarios_si*100/($serv_funerarios_no+$serv_funerarios_si),2)}}</td>
                                        <td>{{round($ayuda_serv_fun_si*100/($ayuda_serv_fun_no+$ayuda_serv_fun_si),2)}}</td>
                                      {{--  <td>{{$part_act_soc_si*100/($part_act_soc_no+$part_act_soc_si)}}</td>--}}

                                        <td>{{round($act_reforest_si*100/($act_reforest_no+$act_reforest_si),2)}}</td>
                                        <td>{{round($caj_aut_si*100/($caj_aut_no+$caj_aut_si),2)}}</td>
                                        <td>{{round($linea_cred_si*100/($linea_cred_no+$linea_cred_si),2)}}</td>
                                        <td>{{round($nec_caj_aut_si*100/($nec_caj_aut_no+$nec_caj_aut_si),2)}}</td>

                                    </tr>
                                    <tr>
                                        <td>% Negativo </td>
                                        <td>{{round($necesida_viv_no*100/($necesida_viv_no+$necesida_viv_si),2)}}</td>
                                        <td>{{round($seguro_vida_no*100/($seguro_vida_si+$seguro_vida_no),2)}}</td>
                                        <td>{{round($seguro_vehic_no*100/($seguro_vehic_si+$seguro_vehic_no),2)}}</td>
                                        <td>{{round($per_enfermas_no*100/($per_enfermas_si+$per_enfermas_no),2)}}</td>
                                        <td>{{round($ninos_no*100/($ninos_no+$ninos_si),2)}}</td>
                                        <td>{{round($ninos_ayu_no*100/($ninos_ayu_no+$ninos_ayu_si),2)}}</td>
                                        <td>{{round($serv_funerarios_no*100/($serv_funerarios_no+$serv_funerarios_si),2)}}</td>
                                        <td>{{round($ayuda_serv_fun_no*100/($ayuda_serv_fun_no+$ayuda_serv_fun_si),2)}}</td>
                                       {{-- <td>{{$part_act_soc_no*100/($part_act_soc_no+$part_act_soc_si)}}</td>--}}

                                        <td>{{round($act_reforest_no*100/($act_reforest_no+$act_reforest_si),2)}}</td>
                                        <td>{{round($caj_aut_no*100/($caj_aut_no+$caj_aut_si),2)}}</td>
                                        <td>{{round($linea_cred_no*100/($linea_cred_no+$linea_cred_si),2)}}</td>
                                        <td>{{round($nec_caj_aut_no*100/($nec_caj_aut_no+$nec_caj_aut_si),2)}}</td>

                                    </tr>



                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center">

                        <div class="card justify-content-center mt-3">
                            <div class="card-header">   <h3>Otros datos obtenidos en las encuestas</h3>  </div>

                            <div class="card-body">
                                <table class="table  table-bordered table-sm table-hover tabla" >
                                    <thead class="thead-light">
                                    <th class="col-sm-6">Cursos</th>
                                    <th class="col-sm-6">Actividades</th>


                                    </thead>
                                    <tbody>


                                    <tr>
                                        <td> <textarea class="form-control" rows="3" cols="100" readonly>{{'Otras opiniones sobre los cursos en las encuestas son: '.$curos_op}}</textarea>  </td>

                                        <td> <textarea class="form-control" rows="3" cols="100" readonly>{{'Otras actividades recreativas de la cooperativa son : '.$actividades}}</textarea>  </td>
                                    </tr>
                                    <th class="col-sm-6" >Seguro</th>
                                    <th class="col-sm-6" >Tipos de enfermedad</th>
                                    <tr>
                                        <td> <textarea class="form-control" rows="3" cols="100" readonly>{{'Algunos motivos por los que los encuestados no estan asegurados : '.$inseguro}}</textarea>  </td>
                                        <td> <textarea class="form-control" rows="3" cols="100" readonly>{{'Enfermedades expesadas por los encuestados : '.$tipo_enferm}}</textarea>  </td>
                                    </tr>
                                    <th class="col-sm-6" >Apoyo</th>
                                    <th class="col-sm-6" >Ayudar Niños</th>

                                    <tr>
                                        <td> <textarea class="form-control" rows="3" cols="100" readonly>{{'Apoyos planteados por los encuestados : '.$apoyo}}</textarea>  </td>
                                        <td> <textarea class="form-control" rows="3" cols="100" readonly>{{'Ideas de como ayudar a los niños : '.$ayuda_ninos_si}}</textarea>  </td>
                                    </tr>
                                    <thead class="thead-light">
                                    <th class="col-sm-6" >Serv. Fúnebres</th>
                                    <th class="col-sm-6" >Nec. Sociales</th>



                                    </thead>

                                    <tr>
                                        <td> <textarea class="form-control" rows="3" cols="100" readonly>{{'Formas en las que se ha accedido a los servicios funebres: '.$arg_serv_fun}}</textarea>  </td>

                                        <td> <textarea class="form-control" rows="3" cols="100" readonly>{{'Algunos Oficios planteados por los encuestados : '.$capa_ofic_cual}}</textarea>  </td>
                                    </tr>
                                    <th class="col-sm-6" >Acciones</th>
                                    <th class="col-sm-6" >Participacion</th>
                                    <tr>
                                        <td> <textarea class="form-control" rows="3"  cols="100" readonly>{{'Sugerencias de los enccuestados sobre otros festivales : '.$act_soc_festiv_cuales}}</textarea>  </td>
                                        <td> <textarea class="form-control" rows="3" cols="100" readonly>{{'Participacion en las actividades : '.$part_act_sociales}}</textarea>  </td>
                                    </tr>
                                    <th class="col-sm-6" >Niños y Jovenes</th>
                                    <th class="col-sm-6" >Actividades en función del medio ambiente</th>
                                    <tr>
                                        <td> <textarea class="form-control" rows="3" cols="100" readonly>{{'Actividades en funcios de los niños y jovenes : '.$act_coop_jov_nin}}</textarea>  </td>
                                        <td> <textarea class="form-control" rows="3" cols="100" readonly>{{'Otras actividades planteadas en las encuestas : '.$otras_act_des_med_am}}</textarea>  </td>
                                    </tr>

                                    <th class="col-sm-6" >Seguro de vihiculos</th>
                                    <th class="col-sm-6" >Reforestación</th>
                                    <tr>
                                    <td> <textarea class="form-control" rows="3" cols="100" readonly>{{'Causas por las cuales los encuestados no tienen seguro de vehículo : '.$seguro_vehic_neg}}</textarea>  </td>
                                        <td> <textarea class="form-control" rows="3" cols="100" readonly>{{'Propuestas de lugares para hacer uso de la reforestación : '.$act_reforest_donde}}</textarea>  </td>
                                    </tr>

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>

                </div>


            </div>


    @endsection