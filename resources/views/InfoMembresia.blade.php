


    @extends('layouts.app')



@section('content')
    <br><br>
    <div class="container">
        @if ($ano->id)

            <section class="Tabla">
                <div class="panel panel-default">

                    <div class="panel-body">
                        <div>
                            <h3>Cantidad de Asociados</h3>


                            <table class="table  table-bordered table-sm table-hover tabla">
                                <thead class="thead-light">
                                <th >Género</th>
                                <th colspan="3">Año base : {{$cantAsoc_ant!=null ? $cantAsoc_ant->Ano->ano : 'No existe información' }} </th>
                                <th colspan="3">Año actual : {{$cantAsoc->Ano->ano}}</th>
                                <th>Variación</th>
                                {{--<th>%</th>--}}
                                </thead>
                                <tbody>
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
                                    <td>{{ $cantAsoc_ant!=null ?  ($cantAsoc_ant->hom_act + $cantAsoc_ant->hom_inact) * 100 /$total : 0}}</td>
                                    <td>{{ $cantAsoc!=null ? $cantAsoc->hom_act : 0}}</td>
                                    <td>{{ $cantAsoc!=null ? $cantAsoc->hom_inact : 0}}</td>
                                    <td>{{ $cantAsoc!=null ?  ($cantAsoc->hom_act + $cantAsoc->hom_inact) * 100 /$total : 0}}</td>
                                    <td>{{$cantAsoc_ant!=null ? ( $cantAsoc->hom_act + $cantAsoc_ant->hom_act) : $cantAsoc->hom_act }}</td>
                                </tr>
                                <tr >
                                    <td>Mujeres</td>

                                    <td>{{ $cantAsoc_ant!=null ? $cantAsoc_ant->muj_act : 0}}</td>
                                    <td>{{ $cantAsoc_ant!=null ? $cantAsoc_ant->muj_inact : 0}}</td>
                                    <td>{{ $cantAsoc_ant!=null ?  ($cantAsoc_ant->muj_act + $cantAsoc_ant->muj_inact) * 100 /$total : 0}}</td>
                                    <td>{{ $cantAsoc!=null ? $cantAsoc->muj_act : 0}}</td>
                                    <td>{{ $cantAsoc!=null ? $cantAsoc->muj_inact : 0}}</td>
                                    <td>{{ $cantAsoc!=null ?  ($cantAsoc->muj_act + $cantAsoc->muj_inact) * 100 /$total : 0}}</td>
                                    <td>{{$cantAsoc_ant!=null ? ( $cantAsoc->muj_act + $cantAsoc_ant->muj_act) : $cantAsoc->muj_act }}</td>
                                </tr>
                                <tr >
                                    <td>Total</td>

                                    <td>{{ $cantAsoc_ant!=null ? $cantAsoc_ant->hom_act+$cantAsoc_ant->muj_act : 0}}</td>
                                    <td>{{ $cantAsoc_ant!=null ? $cantAsoc_ant->hom_inact+$cantAsoc_ant->muj_inact : 0}}</td>
                                    <td>{{ $cantAsoc_ant!=null ?  (($cantAsoc_ant->hom_act + $cantAsoc_ant->hom_inact) * 100 /$total) + (($cantAsoc_ant->muj_act + $cantAsoc_ant->muj_inact) * 100 /$total) : 0}}</td>
                                    <td>{{ $cantAsoc!=null ? $cantAsoc->hom_act+$cantAsoc->muj_act : 0}}</td>
                                    <td>{{ $cantAsoc!=null ? $cantAsoc->hom_inact + $cantAsoc->muj_inact : 0}}</td>
                                    <td>{{ $cantAsoc!=null ?  (($cantAsoc->hom_act + $cantAsoc->hom_inact) * 100 /$total) + (($cantAsoc->muj_act + $cantAsoc->muj_inact) * 100 /$total) : 0}}</td>
                                    <td>{{($cantAsoc_ant!=null ? ( $cantAsoc->muj_act + $cantAsoc_ant->muj_act) : $cantAsoc->muj_act) + ($cantAsoc_ant!=null ? ( $cantAsoc->hom_act + $cantAsoc_ant->hom_act) : $cantAsoc->hom_act) }}</td>
                                </tr>



                                </tbody>

                            </table>
                        </div>
                    </div>

                </div>
            </section>

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
                                <td>Incorporaciones</td>

                                <td>{{ $incBaj_ant!=null ? $incBaj_ant->incorporaciones : 0}}</td>
                                <td>{{ $incBaj_ant!=null ? $incBaj_ant->incorporaciones * 100 /$total : 0}}</td>
                                <td>{{$incBaj->incorporaciones}}</td>
                                <td>{{$incBaj->incorporaciones * 100 /$total}}</td>
                                <td>{{ $incBaj_ant!=null ? $incBaj->incorporaciones - $incBaj_ant->incorporaciones : $incBaj->incorporaciones- 0}}</td>
                            </tr>

                            <tr >
                                <td>Bajas</td>

                                <td>{{ $incBaj_ant!=null ? $incBaj_ant->bajas : 0}}</td>
                                <td>{{ $incBaj_ant!=null ? $incBaj_ant->bajas * 100 /$total : 0}}</td>
                                <td>{{$incBaj->bajas}}</td>
                                <td>{{$incBaj->bajas * 100 /$total}}</td>
                                <td>{{ $incBaj_ant!=null ? $incBaj->bajas - $incBaj_ant->bajas : $incBaj->bajas - 0}}</td>
                            </tr>


                            <tr >
                                <td>Expulsados</td>

                                <td>{{ $incBaj_ant!=null ? $incBaj_ant->expulsados : 0}}</td>
                                <td>{{ $incBaj_ant!=null ? $incBaj_ant->expulsados * 100 /$total : 0}}</td>
                                <td>{{$incBaj->expulsados}}</td>
                                <td>{{$incBaj->expulsados * 100 /$total}}</td>
                                <td>{{ $incBaj_ant!=null ? $incBaj->expulsados - $incBaj_ant->expulsados : $incBaj->expulsados - 0}}</td>
                            </tr>





                            </tbody>

                        </table>
                    </div>
                </div>

            </section>



            <section class="Tabla">
                <div class="panel panel-default">
                    <div>
                        <h3>Composición según nivel educacional de los asociados</h3>
                        <table class="table  table-bordered table-sm table-hover tabla">
                            <thead class="thead-light">
                            <th>Estado Civil</th>
                            <th colspan="2">Año base : {{$nivEscEmp_ant!=null ? $nivEscEmp_ant->Ano->ano : 'No existe información' }} </th>
                            <th colspan="2">Año actual : {{$nivEscEmp->Ano->ano}}</th>
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
                                <td>Ninguno</td>

                                <td>{{ $nivEscEmp_ant!=null ? $nivEscEmp_ant->ninguno : 0}}</td>
                                <td>{{ $nivEscEmp_ant!=null ? $nivEscEmp_ant->ninguno * 100 /$total : 0}}</td>
                                <td>{{$nivEscEmp->ninguno}}</td>
                                <td>{{$nivEscEmp->ninguno * 100 /$total}}</td>
                                <td>{{ $nivEscEmp_ant!=null ? $nivEscEmp->ninguno - $nivEscEmp_ant->ninguno : $nivEscEmp->ninguno - 0}}</td>
                            </tr>

                            <tr >
                                <td>Básico</td>

                                <td>{{ $nivEscEmp_ant!=null ? $nivEscEmp_ant->basico : 0}}</td>
                                <td>{{ $nivEscEmp_ant!=null ? $nivEscEmp_ant->basico * 100 /$total : 0}}</td>
                                <td>{{$nivEscEmp->basico}}</td>
                                <td>{{$nivEscEmp->basico * 100 /$total}}</td>
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
                    </div>
                </div>

            </section>


            <section class="Tabla">
                <div class="panel panel-default">
                    <div>
                        <h3>Estado civil de los asociados</h3>
                        <table class="table  table-bordered table-sm table-hover tabla">
                            <thead class="thead-light">
                            <th>Estado Civil</th>
                            <th colspan="2">Año base : {{$incBaj_ant!=null ? $incBaj_ant->Ano->ano : 'No existe información' }} </th>
                            <th colspan="2">Año actual : {{$incBaj->Ano->ano}}</th>
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
                                <td>Solteros</td>

                                <td>{{ $est_civil_ant!=null ? $est_civil_ant->soltero : 0}}</td>
                                <td>{{ $est_civil_ant!=null ? $est_civil_ant->soltero * 100 /$total : 0}}</td>
                                <td>{{$est_civil->soltero}}</td>
                                <td>{{$est_civil->soltero * 100 /$total}}</td>
                                <td>{{ $est_civil_ant!=null ? $est_civil->soltero - $est_civil_ant->soltero : $est_civil->soltero - 0}}</td>
                            </tr>

                            <tr >
                                <td>Casado </td>

                                <td>{{ $est_civil_ant!=null ? $est_civil_ant->casado : 0}}</td>
                                <td>{{ $est_civil_ant!=null ? $est_civil_ant->casado * 100 /$total : 0}}</td>
                                <td>{{$est_civil->casado}}</td>
                                <td>{{$est_civil->casado * 100 /$total}}</td>
                                <td>{{ $est_civil_ant!=null ? $est_civil->casado - $est_civil_ant->casado : $est_civil->casado - 0}}</td>
                            </tr>


                            <tr >
                                <td>Union Libre</td>

                                <td>{{ $est_civil_ant!=null ? $est_civil_ant->unionlibre : 0}}</td>
                                <td>{{ $est_civil_ant!=null ? $est_civil_ant->unionlibre * 100 /$total : 0}}</td>
                                <td>{{$est_civil->unionlibre}}</td>
                                <td>{{$est_civil->unionlibre * 100 /$total}}</td>
                                <td>{{ $est_civil_ant!=null ? $est_civil->unionlibre - $est_civil_ant->unionlibre : $est_civil->unionlibre - 0}}</td>
                            </tr>
                            <tr >
                                <td>Total</td>

                                <td>{{ $est_civil_ant!=null ? $est_civil_ant->casado + $est_civil_ant->soltero + $est_civil_ant->unionlibre : 0}}</td>
                                <td>{{ $est_civil_ant!=null ? ($est_civil_ant->unionlibre * 100 /$total) + ($est_civil_ant->soltero * 100 /$total) + ($est_civil_ant->casado * 100 /$total) : 0}}</td>
                                <td>{{$est_civil->unionlibre + $est_civil->soltero + $est_civil->casado}}</td>
                                <td>{{($est_civil->unionlibre * 100 /$total) + ($est_civil->soltero * 100 /$total) + ($est_civil->casado * 100 /$total)}}</td>
                                <td>{{ ($est_civil_ant!=null ? $est_civil->unionlibre - $est_civil_ant->unionlibre : $est_civil->unionlibre - 0) + ($est_civil_ant!=null ? $est_civil->soltero - $est_civil_ant->soltero : $est_civil->soltero - 0) + ($est_civil_ant!=null ? $est_civil->casado - $est_civil_ant->casado : $est_civil->casado - 0)}}</td>
                            </tr>






                            </tbody>

                        </table>
                    </div>
                </div>

            </section>


            <section class="Tabla">
                <div class="panel panel-default">
                    <div>
                        <h3>Composición por edades de los asociados</h3>
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
                                <td>18-25</td>

                                <td>{{ $comp_edad_asoc_ant!=null ? $comp_edad_asoc_ant->edad_18_25 : 0}}</td>
                                <td>{{ $comp_edad_asoc_ant!=null ? $comp_edad_asoc_ant->edad_18_25 * 100 /$total : 0}}</td>
                                <td>{{$comp_edad_asoc->edad_18_25}}</td>
                                <td>{{$comp_edad_asoc->edad_18_25 * 100 /$total}}</td>
                                <td>{{ $est_civil_ant!=null ? $comp_edad_asoc->edad_18_25 - $comp_edad_asoc_ant->edad_18_25 : $comp_edad_asoc->edad_18_25 - 0}}</td>
                            </tr>
                            <tr >
                                <td>26-35</td>

                                <td>{{ $comp_edad_asoc_ant!=null ? $comp_edad_asoc_ant->edad_26_35 : 0}}</td>
                                <td>{{ $comp_edad_asoc_ant!=null ? $comp_edad_asoc_ant->edad_26_35 * 100 /$total : 0}}</td>
                                <td>{{$comp_edad_asoc->edad_26_35}}</td>
                                <td>{{$comp_edad_asoc->edad_26_35 * 100 /$total}}</td>
                                <td>{{ $est_civil_ant!=null ? $comp_edad_asoc->edad_26_35 - $comp_edad_asoc_ant->edad_26_35 : $comp_edad_asoc->edad_26_35 - 0}}</td>
                            </tr>
                            <tr >
                                <td>36-45</td>

                                <td>{{ $comp_edad_asoc_ant!=null ? $comp_edad_asoc_ant->edad_36_45 : 0}}</td>
                                <td>{{ $comp_edad_asoc_ant!=null ? $comp_edad_asoc_ant->edad_36_45 * 100 /$total : 0}}</td>
                                <td>{{$comp_edad_asoc->edad_36_45}}</td>
                                <td>{{$comp_edad_asoc->edad_36_45 * 100 /$total}}</td>
                                <td>{{ $est_civil_ant!=null ? $comp_edad_asoc->edad_36_45 - $comp_edad_asoc_ant->edad_36_45 : $comp_edad_asoc->edad_36_45 - 0}}</td>
                            </tr>
                            <tr >
                                <td>46-55</td>

                                <td>{{ $comp_edad_asoc_ant!=null ? $comp_edad_asoc_ant->edad_46_55 : 0}}</td>
                                <td>{{ $comp_edad_asoc_ant!=null ? $comp_edad_asoc_ant->edad_46_55 * 100 /$total : 0}}</td>
                                <td>{{$comp_edad_asoc->edad_46_55}}</td>
                                <td>{{$comp_edad_asoc->edad_46_55 * 100 /$total}}</td>
                                <td>{{ $est_civil_ant!=null ? $comp_edad_asoc->edad_46_55 - $comp_edad_asoc_ant->edad_46_55 : $comp_edad_asoc->edad_46_55 - 0}}</td>
                            </tr>
                            <tr >
                                <td>56-60</td>

                                <td>{{ $comp_edad_asoc_ant!=null ? $comp_edad_asoc_ant->edad_56_60 : 0}}</td>
                                <td>{{ $comp_edad_asoc_ant!=null ? $comp_edad_asoc_ant->edad_56_60 * 100 /$total : 0}}</td>
                                <td>{{$comp_edad_asoc->edad_56_60}}</td>
                                <td>{{$comp_edad_asoc->edad_56_60 * 100 /$total}}</td>
                                <td>{{ $est_civil_ant!=null ? $comp_edad_asoc->edad_56_60 - $comp_edad_asoc_ant->edad_56_60 : $comp_edad_asoc->edad_56_60 - 0}}</td>
                            </tr>
                            <tr >
                                <td>61-70</td>

                                <td>{{ $comp_edad_asoc_ant!=null ? $comp_edad_asoc_ant->edad_61_70 : 0}}</td>
                                <td>{{ $comp_edad_asoc_ant!=null ? $comp_edad_asoc_ant->edad_61_70 * 100 /$total : 0}}</td>
                                <td>{{$comp_edad_asoc->edad_61_70}}</td>
                                <td>{{$comp_edad_asoc->edad_61_70 * 100 /$total}}</td>
                                <td>{{ $est_civil_ant!=null ? $comp_edad_asoc->edad_61_70 - $comp_edad_asoc_ant->edad_61_70 : $comp_edad_asoc->edad_61_70 - 0}}</td>
                            </tr>
                            <tr >
                                <td>más 70</td>

                                <td>{{ $comp_edad_asoc_ant!=null ? $comp_edad_asoc_ant->mas70 : 0}}</td>
                                <td>{{ $comp_edad_asoc_ant!=null ? $comp_edad_asoc_ant->mas70 * 100 /$total : 0}}</td>
                                <td>{{$comp_edad_asoc->mas70}}</td>
                                <td>{{$comp_edad_asoc->mas70 * 100 /$total}}</td>
                                <td>{{ $est_civil_ant!=null ? $comp_edad_asoc->mas70 - $comp_edad_asoc_ant->mas70 : $comp_edad_asoc->mas70 - 0}}</td>
                            </tr>

                            <tr >
                                <td>Total</td>

                                <td>{{ $comp_edad_asoc_ant!=null ? $comp_edad_asoc_ant->mas70+ $comp_edad_asoc_ant->edad_18_25+ $comp_edad_asoc_ant->edad_26_35+ $comp_edad_asoc_ant->edad_36_45+ $comp_edad_asoc_ant->edad_46_55+ $comp_edad_asoc_ant->edad_56_60+ $comp_edad_asoc_ant->edad_61_70+ $comp_edad_asoc_ant->edad_mas70 : 0}}</td>
                                <td>{{ $comp_edad_asoc_ant!=null ? ($comp_edad_asoc_ant->mas70* 100 /$total)+( $comp_edad_asoc_ant->edad_18_25* 100 /$total)+( $comp_edad_asoc_ant->edad_26_35* 100 /$total)+( $comp_edad_asoc_ant->edad_36_45* 100 /$total)+( $comp_edad_asoc_ant->edad_46_55* 100 /$total)+( $comp_edad_asoc_ant->edad_56_60* 100 /$total)+( $comp_edad_asoc_ant->edad_61_70* 100 /$total)+( $comp_edad_asoc_ant->edad_mas70 * 100 /$total) : 0}}</td>
                                <td>{{ $comp_edad_asoc!=null ? $comp_edad_asoc->mas70+ $comp_edad_asoc->edad_18_25+ $comp_edad_asoc->edad_26_35+ $comp_edad_asoc->edad_36_45+ $comp_edad_asoc->edad_46_55+ $comp_edad_asoc->edad_56_60+ $comp_edad_asoc->edad_61_70+ $comp_edad_asoc->edad_mas70 : 0}}</td>
                                <td>{{$comp_edad_asoc!=null ? ($comp_edad_asoc->mas70* 100 /$total)+( $comp_edad_asoc->edad_18_25* 100 /$total)+( $comp_edad_asoc->edad_26_35* 100 /$total)+( $comp_edad_asoc->edad_36_45* 100 /$total)+( $comp_edad_asoc->edad_46_55* 100 /$total)+( $comp_edad_asoc->edad_56_60* 100 /$total)+( $comp_edad_asoc->edad_61_70* 100 /$total)+( $comp_edad_asoc->edad_mas70 * 100 /$total) : 0}}</td>
                                <td>{{ $est_civil_ant!=null ? $comp_edad_asoc->mas70+ $comp_edad_asoc->edad_18_25+ $comp_edad_asoc->edad_26_35+ $comp_edad_asoc->edad_36_45+ $comp_edad_asoc->edad_46_55+ $comp_edad_asoc->edad_56_60+ $comp_edad_asoc->edad_61_70+ $comp_edad_asoc->edad_mas70  - ($comp_edad_asoc_ant->mas70+ $comp_edad_asoc_ant->edad_18_25+ $comp_edad_asoc_ant->edad_26_35+ $comp_edad_asoc_ant->edad_36_45+ $comp_edad_asoc_ant->edad_46_55+ $comp_edad_asoc_ant->edad_56_60+ $comp_edad_asoc_ant->edad_61_70+ $comp_edad_asoc_ant->edad_mas70 ) : $comp_edad_asoc->mas70+ $comp_edad_asoc->edad_18_25+ $comp_edad_asoc->edad_26_35+ $comp_edad_asoc->edad_36_45+ $comp_edad_asoc->edad_46_55+ $comp_edad_asoc->edad_56_60+ $comp_edad_asoc->edad_61_70+ $comp_edad_asoc->edad_mas70}}</td>
                            </tr>










                            </tbody>

                        </table>
                    </div>
                </div>

            </section>


            <section class="Tabla">
                <div class="panel panel-default">
                    <div>
                        <h3>Tiempo de afiliación de los asociados</h3>
                        <table class="table  table-bordered table-sm table-hover tabla">
                            <thead class="thead-light">
                            <th>Tiempo de afiliación (años)
                            </th>
                            <th colspan="2">Año base : {{$tiempo_afili_ant!=null ? $tiempo_afili_ant->Ano->ano : 'No existe información' }} </th>
                            <th colspan="2">Año actual : {{$tiempo_afili->Ano->ano}}</th>
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
                                <td>0-1</td>

                                <td>{{ $tiempo_afili_ant!=null ? $tiempo_afili_ant->time_0_1 : 0}}</td>
                                <td>{{ $tiempo_afili_ant!=null ? $tiempo_afili_ant->time_0_1 * 100 /$total : 0}}</td>
                                <td>{{$tiempo_afili->time_0_1}}</td>
                                <td>{{$tiempo_afili->time_0_1 * 100 /$total}}</td>
                                <td>{{ $est_civil_ant!=null ? $tiempo_afili->time_0_1 - $tiempo_afili_ant->time_0_1 : $tiempo_afili->time_0_1 - 0}}</td>
                            </tr>
                            <tr >
                                <td>1-2</td>

                                <td>{{ $tiempo_afili_ant!=null ? $tiempo_afili_ant->time_1_2 : 0}}</td>
                                <td>{{ $tiempo_afili_ant!=null ? $tiempo_afili_ant->time_1_2 * 100 /$total : 0}}</td>
                                <td>{{$tiempo_afili->time_1_2}}</td>
                                <td>{{$tiempo_afili->time_1_2 * 100 /$total}}</td>
                                <td>{{ $est_civil_ant!=null ? $tiempo_afili->time_1_2 - $tiempo_afili_ant->time_1_2 : $tiempo_afili->time_1_2 - 0}}</td>
                            </tr>
                            <tr >
                                <td>3-5</td>

                                <td>{{ $tiempo_afili_ant!=null ? $tiempo_afili_ant->time_3_5 : 0}}</td>
                                <td>{{ $tiempo_afili_ant!=null ? $tiempo_afili_ant->time_3_5 * 100 /$total : 0}}</td>
                                <td>{{$tiempo_afili->time_3_5}}</td>
                                <td>{{$tiempo_afili->time_3_5 * 100 /$total}}</td>
                                <td>{{ $est_civil_ant!=null ? $tiempo_afili->time_3_5 - $tiempo_afili_ant->time_3_5 : $tiempo_afili->time_3_5 - 0}}</td>
                            </tr>
                            <tr >
                                <td>5-10</td>

                                <td>{{ $tiempo_afili_ant!=null ? $tiempo_afili_ant->time_5_10 : 0}}</td>
                                <td>{{ $tiempo_afili_ant!=null ? $tiempo_afili_ant->time_5_10 * 100 /$total : 0}}</td>
                                <td>{{$tiempo_afili->time_5_10}}</td>
                                <td>{{$tiempo_afili->time_5_10 * 100 /$total}}</td>
                                <td>{{ $est_civil_ant!=null ? $tiempo_afili->time_5_10 - $tiempo_afili_ant->time_5_10 : $tiempo_afili->time_5_10 - 0}}</td>
                            </tr>
                            <tr >
                                <td>10-15</td>

                                <td>{{ $tiempo_afili_ant!=null ? $tiempo_afili_ant->time_10_15 : 0}}</td>
                                <td>{{ $tiempo_afili_ant!=null ? $tiempo_afili_ant->time_10_15 * 100 /$total : 0}}</td>
                                <td>{{$tiempo_afili->time_10_15}}</td>
                                <td>{{$tiempo_afili->time_10_15 * 100 /$total}}</td>
                                <td>{{ $est_civil_ant!=null ? $tiempo_afili->time_10_15 - $tiempo_afili_ant->time_10_15 : $tiempo_afili->time_10_15 - 0}}</td>
                            </tr>
                            <tr >
                                <td>15-20</td>

                                <td>{{ $tiempo_afili_ant!=null ? $tiempo_afili_ant->time_15_20 : 0}}</td>
                                <td>{{ $tiempo_afili_ant!=null ? $tiempo_afili_ant->time_15_20 * 100 /$total : 0}}</td>
                                <td>{{$tiempo_afili->time_15_20}}</td>
                                <td>{{$tiempo_afili->time_15_20 * 100 /$total}}</td>
                                <td>{{ $est_civil_ant!=null ? $tiempo_afili->time_15_20 - $tiempo_afili_ant->time_15_20 : $tiempo_afili->time_15_20 - 0}}</td>
                            </tr>
                            <tr >
                                <td>20-25</td>

                                <td>{{ $tiempo_afili_ant!=null ? $tiempo_afili_ant->time_20_25 : 0}}</td>
                                <td>{{ $tiempo_afili_ant!=null ? $tiempo_afili_ant->time_20_25 * 100 /$total : 0}}</td>
                                <td>{{$tiempo_afili->time_20_25}}</td>
                                <td>{{$tiempo_afili->time_20_25 * 100 /$total}}</td>
                                <td>{{ $est_civil_ant!=null ? $tiempo_afili->time_20_25 - $tiempo_afili_ant->time_20_25 : $tiempo_afili->time_20_25 - 0}}</td>
                            </tr>
                            <tr >
                                <td>25-30</td>

                                <td>{{ $tiempo_afili_ant!=null ? $tiempo_afili_ant->time_25_30 : 0}}</td>
                                <td>{{ $tiempo_afili_ant!=null ? $tiempo_afili_ant->time_25_30 * 100 /$total : 0}}</td>
                                <td>{{$tiempo_afili->time_25_30}}</td>
                                <td>{{$tiempo_afili->time_25_30 * 100 /$total}}</td>
                                <td>{{ $est_civil_ant!=null ? $tiempo_afili->time_25_30 - $tiempo_afili_ant->time_25_30 : $tiempo_afili->time_25_30 - 0}}</td>
                            </tr>
                            <tr >
                                <td>30-35</td>

                                <td>{{ $tiempo_afili_ant!=null ? $tiempo_afili_ant->time_30_35 : 0}}</td>
                                <td>{{ $tiempo_afili_ant!=null ? $tiempo_afili_ant->time_30_35 * 100 /$total : 0}}</td>
                                <td>{{$tiempo_afili->time_30_35}}</td>
                                <td>{{$tiempo_afili->time_30_35 * 100 /$total}}</td>
                                <td>{{ $est_civil_ant!=null ? $tiempo_afili->time_30_35 - $tiempo_afili_ant->time_30_35 : $tiempo_afili->time_30_35 - 0}}</td>
                            </tr>
                            <tr >
                                <td>35-40</td>

                                <td>{{ $tiempo_afili_ant!=null ? $tiempo_afili_ant->time_35_40 : 0}}</td>
                                <td>{{ $tiempo_afili_ant!=null ? $tiempo_afili_ant->time_35_40 * 100 /$total : 0}}</td>
                                <td>{{$tiempo_afili->time_35_40}}</td>
                                <td>{{$tiempo_afili->time_35_40 * 100 /$total}}</td>
                                <td>{{ $est_civil_ant!=null ? $tiempo_afili->time_35_40 - $tiempo_afili_ant->time_35_40 : $tiempo_afili->time_35_40 - 0}}</td>
                            </tr>
                            <tr >
                                <td>40-50</td>

                                <td>{{ $tiempo_afili_ant!=null ? $tiempo_afili_ant->time_40_48 : 0}}</td>
                                <td>{{ $tiempo_afili_ant!=null ? $tiempo_afili_ant->time_40_48 * 100 /$total : 0}}</td>
                                <td>{{$tiempo_afili->time_40_48}}</td>
                                <td>{{$tiempo_afili->time_40_48 * 100 /$total}}</td>
                                <td>{{ $est_civil_ant!=null ? $tiempo_afili->time_40_48 - $tiempo_afili_ant->time_40_48 : $tiempo_afili->time_40_48 - 0}}</td>
                            </tr>
                            <tr >
                                <td>Más de  50</td>

                                <td>{{ $tiempo_afili_ant!=null ? $tiempo_afili_ant->timemas50  : 0}}</td>
                                <td>{{ $tiempo_afili_ant!=null ? $tiempo_afili_ant->timemas50 * 100 /$total : 0}}</td>
                                <td>{{$tiempo_afili->timemas50}}</td>
                                <td>{{$tiempo_afili->timemas50 * 100 /$total}}</td>
                                <td>{{ $est_civil_ant!=null ? $tiempo_afili->timemas50 - $tiempo_afili_ant->timemas50 : $tiempo_afili->timemas50 - 0}}</td>
                            </tr>
                            <tr >
                                <td>Total</td>

                                <td>{{ $tiempo_afili_ant!=null ? $tiempo_afili_ant->timemas50+$tiempo_afili_ant->time_40_48+$tiempo_afili_ant->time_35_40+ $tiempo_afili_ant->time_30_35+ $tiempo_afili_ant->time_25_30+$tiempo_afili_ant->time_20_25+ $tiempo_afili_ant->time_15_20+$tiempo_afili_ant->time_10_15+$tiempo_afili_ant->time_5_10+$tiempo_afili_ant->time_3_5+$tiempo_afili_ant->time_1_2 : 0}}</td>
                                <td>{{ $tiempo_afili_ant!=null ? ($tiempo_afili_ant->timemas50* 100 /$total)+($tiempo_afili_ant->time_40_48* 100 /$total)+($tiempo_afili_ant->time_35_40* 100 /$total)+( $tiempo_afili_ant->time_30_35* 100 /$total)+( $tiempo_afili_ant->time_25_30* 100 /$total)+($tiempo_afili_ant->time_20_25* 100 /$total)+( $tiempo_afili_ant->time_15_20* 100 /$total)+($tiempo_afili_ant->time_10_15* 100 /$total)+($tiempo_afili_ant->time_5_10* 100 /$total)+($tiempo_afili_ant->time_3_5* 100 /$total)+($tiempo_afili_ant->time_1_2* 100 /$total): 0}}</td>
                                <td>{{$tiempo_afili->timemas50+$tiempo_afili->time_40_48+$tiempo_afili->time_35_40+ $tiempo_afili->time_30_35+ $tiempo_afili->time_25_30+$tiempo_afili->time_20_25+ $tiempo_afili->time_15_20+$tiempo_afili->time_10_15+$tiempo_afili->time_5_10+$tiempo_afili->time_3_5+$tiempo_afili->time_1_2 }}</td>
                                <td>{{($tiempo_afili->timemas50* 100 /$total)+($tiempo_afili->time_40_48* 100 /$total)+($tiempo_afili->time_35_40* 100 /$total)+( $tiempo_afili->time_30_35* 100 /$total)+( $tiempo_afili->time_25_30* 100 /$total)+($tiempo_afili->time_20_25* 100 /$total)+( $tiempo_afili->time_15_20* 100 /$total)+($tiempo_afili->time_10_15* 100 /$total)+($tiempo_afili->time_5_10* 100 /$total)+($tiempo_afili->time_3_5* 100 /$total)+($tiempo_afili->time_1_2* 100 /$total)}}</td>
                                <td>{{ $est_civil_ant!=null ? ($tiempo_afili->timemas50+$tiempo_afili->time_40_48+$tiempo_afili->time_35_40+ $tiempo_afili->time_30_35+ $tiempo_afili->time_25_30+$tiempo_afili->time_20_25+ $tiempo_afili->time_15_20+$tiempo_afili->time_10_15+$tiempo_afili->time_5_10+$tiempo_afili->time_3_5+$tiempo_afili->time_1_2) -($tiempo_afili_ant->timemas50+$tiempo_afili_ant->time_40_48+$tiempo_afili_ant->time_35_40+ $tiempo_afili_ant->time_30_35+ $tiempo_afili_ant->time_25_30+$tiempo_afili_ant->time_20_25+ $tiempo_afili_ant->time_15_20+$tiempo_afili_ant->time_10_15+$tiempo_afili_ant->time_5_10+$tiempo_afili_ant->time_3_5+$tiempo_afili_ant->time_1_2) : $tiempo_afili->timemas50+$tiempo_afili->time_40_48+$tiempo_afili->time_35_40+ $tiempo_afili->time_30_35+ $tiempo_afili->time_25_30+$tiempo_afili->time_20_25+ $tiempo_afili->time_15_20+$tiempo_afili->time_10_15+$tiempo_afili->time_5_10+$tiempo_afili->time_3_5+$tiempo_afili->time_1_2 - 0}}</td>
                            </tr>



                            </tbody>

                        </table>
                    </div>
                </div>

            </section>



            <section class="Tabla">
                <div class="panel panel-default">

                    <div class="panel-body">
                        <div>
                            <h3>Categoría ocupacional de asociados</h3>


                            <table class="table  table-bordered table-sm table-hover tabla">
                                <thead class="thead-light">
                                <th>Categoría ocupacional</th>
                                <th colspan="2">Año base : {{$cat_ocup_asoc_ant!=null ? $cat_ocup_asoc_ant->GetAno->ano : 'No existe información' }} </th>
                                <th colspan="2">Año actual : {{$cat_ocup_asoc->GetAno->ano}}</th>
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
                                    <td>Empleados del sector público</td>

                                    <td>{{ $cat_ocup_asoc_ant!=null ? $cat_ocup_asoc_ant->empsectpub : 0}}</td>
                                    <td>{{ $cat_ocup_asoc_ant!=null ? $cat_ocup_asoc_ant->empsectpub * 100 /$total : 0}}</td>
                                    <td>{{$cat_ocup_asoc->empsectpub}}</td>
                                    <td>{{$cat_ocup_asoc->empsectpub * 100 /$total}}</td>
                                    <td>{{ $cat_ocup_asoc_ant!=null ? $cat_ocup_asoc->empsectpub-$cat_ocup_asoc_ant->empsectpub : $cat_ocup_asoc->empsectpub-0}}</td>
                                </tr>

                                <tr >
                                    <td>Empleados del sector privado</td>

                                    <td>{{ $cat_ocup_asoc_ant!=null ? $cat_ocup_asoc_ant->empsectpri : 0}}</td>
                                    <td>{{ $cat_ocup_asoc_ant!=null ? $cat_ocup_asoc_ant->empsectpri * 100 /$total : 0}}</td>
                                    <td>{{$cat_ocup_asoc->empsectpri}}</td>
                                    <td>{{$cat_ocup_asoc->empsectpri * 100 /$total}}</td>
                                    <td>{{ $cat_ocup_asoc_ant!=null ? $cat_ocup_asoc->empsectpri-$cat_ocup_asoc_ant->empsectpri : $cat_ocup_asoc->empsectpri-0}}</td>
                                </tr>

                                <tr >
                                    <td>Comerciantes</td>

                                    <td>{{ $cat_ocup_asoc_ant!=null ? $cat_ocup_asoc_ant->comerc : 0}}</td>
                                    <td>{{ $cat_ocup_asoc_ant!=null ? $cat_ocup_asoc_ant->comerc * 100 /$total : 0}}</td>
                                    <td>{{$cat_ocup_asoc->comerc}}</td>
                                    <td>{{$cat_ocup_asoc->comerc * 100 /$total}}</td>
                                    <td>{{ $cat_ocup_asoc_ant!=null ? $cat_ocup_asoc->comerc-$cat_ocup_asoc_ant->comerc : $cat_ocup_asoc->comerc-0}}</td>
                                </tr>

                                <tr >
                                    <td>Productores</td>

                                    <td>{{ $cat_ocup_asoc_ant!=null ? $cat_ocup_asoc_ant->product : 0}}</td>
                                    <td>{{ $cat_ocup_asoc_ant!=null ? $cat_ocup_asoc_ant->product * 100 /$total : 0}}</td>
                                    <td>{{$cat_ocup_asoc->product}}</td>
                                    <td>{{$cat_ocup_asoc->product * 100 /$total}}</td>
                                    <td>{{ $cat_ocup_asoc_ant!=null ? $cat_ocup_asoc->product - $cat_ocup_asoc_ant->product : $cat_ocup_asoc->product - 0}}</td>
                                </tr>
                                <tr >
                                    <td>Estudiantes</td>

                                    <td>{{ $cat_ocup_asoc_ant!=null ? $cat_ocup_asoc_ant->estudiat : 0}}</td>
                                    <td>{{ $cat_ocup_asoc_ant!=null ? $cat_ocup_asoc_ant->estudiat * 100 /$total : 0}}</td>
                                    <td>{{$cat_ocup_asoc->estudiat}}</td>
                                    <td>{{$cat_ocup_asoc->estudiat * 100 /$total}}</td>
                                    <td>{{ $cat_ocup_asoc_ant!=null ? $cat_ocup_asoc->estudiat - $cat_ocup_asoc_ant->estudiat : $cat_ocup_asoc->estudiat - 0}}</td>
                                </tr>
                                <tr >
                                    <td>Jubilados</td>

                                    <td>{{ $cat_ocup_asoc_ant!=null ? $cat_ocup_asoc_ant->jubilado : 0}}</td>
                                    <td>{{ $cat_ocup_asoc_ant!=null ? $cat_ocup_asoc_ant->jubilado * 100 /$total : 0}}</td>
                                    <td>{{$cat_ocup_asoc->jubilado}}</td>
                                    <td>{{$cat_ocup_asoc->jubilado * 100 /$total}}</td>
                                    <td>{{ $cat_ocup_asoc_ant!=null ? $cat_ocup_asoc->jubilado - $cat_ocup_asoc_ant->jubilado : $cat_ocup_asoc->jubilado - 0}}</td>
                                </tr>

                                <tr >
                                    <td>Profesionales independientes</td>

                                    <td>{{ $cat_ocup_asoc_ant!=null ? $cat_ocup_asoc_ant->profind : 0}}</td>
                                    <td>{{ $cat_ocup_asoc_ant!=null ? $cat_ocup_asoc_ant->profind * 100 /$total : 0}}</td>
                                    <td>{{$cat_ocup_asoc->profind}}</td>
                                    <td>{{$cat_ocup_asoc->profind * 100 /$total}}</td>
                                    <td>{{ $cat_ocup_asoc_ant!=null ? $cat_ocup_asoc->profind - $cat_ocup_asoc_ant->profind : $cat_ocup_asoc->profind - 0}}</td>
                                </tr>

                                <tr >
                                    <td>Otros</td>

                                    <td>{{ $cat_ocup_asoc_ant!=null ? $cat_ocup_asoc_ant->otroscat : 0}}</td>
                                    <td>{{ $cat_ocup_asoc_ant!=null ? $cat_ocup_asoc_ant->otroscat * 100 /$total : 0}}</td>
                                    <td>{{$cat_ocup_asoc->otroscat}}</td>
                                    <td>{{$cat_ocup_asoc->otroscat * 100 /$total}}</td>
                                    <td>{{ $cat_ocup_asoc_ant!=null ? $cat_ocup_asoc->otroscat - $cat_ocup_asoc_ant->otroscat : $cat_ocup_asoc->otroscat - 0}}</td>
                                </tr>
                                <tr >
                                    <td>Total</td>

                                    <td>{{ $cat_ocup_asoc_ant!=null ? $cat_ocup_asoc_ant->estudiat+ $cat_ocup_asoc_ant->jubilado+$cat_ocup_asoc_ant->profind+ $cat_ocup_asoc_ant->product +$cat_ocup_asoc_ant->comerc +$cat_ocup_asoc_ant->empsectpub +$cat_ocup_asoc_ant->otroscat +$cat_ocup_asoc_ant->empsectpri  : 0}}</td>
                                    <td>{{ $cat_ocup_asoc_ant!=null ? ($cat_ocup_asoc_ant->estudiat* 100 /$total)+( $cat_ocup_asoc_ant->jubilado* 100 /$total)+($cat_ocup_asoc_ant->profind* 100 /$total)+( $cat_ocup_asoc_ant->product * 100 /$total)+($cat_ocup_asoc_ant->comerc * 100 /$total)+($cat_ocup_asoc_ant->empsectpub * 100 /$total)+($cat_ocup_asoc_ant->otroscat * 100 /$total)+($cat_ocup_asoc_ant->empsectpri* 100 /$total): 0}}</td>
                                    <td>{{$cat_ocup_asoc->estudiat+ $cat_ocup_asoc->jubilado+$cat_ocup_asoc->profind+ $cat_ocup_asoc->product +$cat_ocup_asoc->comerc +$cat_ocup_asoc->empsectpub +$cat_ocup_asoc->otroscat +$cat_ocup_asoc->empsectpri }}</td>
                                    <td>{{($cat_ocup_asoc->estudiat* 100 /$total)+( $cat_ocup_asoc->jubilado* 100 /$total)+($cat_ocup_asoc->profind* 100 /$total)+( $cat_ocup_asoc->product * 100 /$total)+($cat_ocup_asoc->comerc * 100 /$total)+($cat_ocup_asoc->empsectpub * 100 /$total)+($cat_ocup_asoc->otroscat * 100 /$total)+($cat_ocup_asoc->empsectpri* 100 /$total)}}</td>
                                    <td>{{ $cat_ocup_asoc_ant!=null ? ($cat_ocup_asoc->estudiat+ $cat_ocup_asoc->jubilado+$cat_ocup_asoc->profind+ $cat_ocup_asoc->product +$cat_ocup_asoc->comerc +$cat_ocup_asoc->empsectpub +$cat_ocup_asoc->otroscat +$cat_ocup_asoc->empsectpri ) - ($cat_ocup_asoc_ant->estudiat+ $cat_ocup_asoc_ant->jubilado+$cat_ocup_asoc_ant->profind+ $cat_ocup_asoc_ant->product +$cat_ocup_asoc_ant->comerc +$cat_ocup_asoc_ant->empsectpub +$cat_ocup_asoc_ant->otroscat +$cat_ocup_asoc_ant->empsectpri) : ($cat_ocup_asoc->estudiat+ $cat_ocup_asoc->jubilado+$cat_ocup_asoc->profind+ $cat_ocup_asoc->product +$cat_ocup_asoc->comerc +$cat_ocup_asoc->empsectpub +$cat_ocup_asoc->otroscat +$cat_ocup_asoc->empsectpri ) - 0}}</td>
                                </tr>

                                </tbody>

                            </table>
                        </div>
                    </div>

                </div>
            </section>


            <section class="Tabla">
                <div class="panel panel-default">

                    <div class="panel-body">
                        <div>
                            <h3>Solicitudes de afiliación</h3>


                            <table class="table  table-bordered table-sm table-hover tabla">
                                <thead class="thead-light">
                                <th>Afiliaciones</th>
                                <th colspan="2">Año base : {{$soli_afili_asoc_ant!=null ? $soli_afili_asoc_ant->Ano->ano : 'No existe información' }} </th>
                                <th colspan="2">Año actual : {{$soli_afili_asoc->Ano->ano}}</th>
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
                                    <td>Realizadas</td>

                                    <td>{{ $soli_afili_asoc_ant!=null ? $soli_afili_asoc_ant->realizada : 0}}</td>
                                    <td>{{ $soli_afili_asoc_ant!=null ? $soli_afili_asoc_ant->realizada * 100 /$total : 0}}</td>
                                    <td>{{$soli_afili_asoc->realizada}}</td>
                                    <td>{{$soli_afili_asoc->realizada * 100 /$total}}</td>
                                    <td>{{ $soli_afili_asoc_ant!=null ? $soli_afili_asoc->realizada - $soli_afili_asoc_ant->realizada : $soli_afili_asoc->empsectpub-0}}</td>
                                </tr>
                                <tr >
                                    <td>Aprobadas</td>

                                    <td>{{ $soli_afili_asoc_ant!=null ? $soli_afili_asoc_ant->aprobada : 0}}</td>
                                    <td>{{ $soli_afili_asoc_ant!=null ? $soli_afili_asoc_ant->aprobada * 100 /$total : 0}}</td>
                                    <td>{{$soli_afili_asoc->aprobada}}</td>
                                    <td>{{$cat_ocup_asoc->aprobada * 100 /$total}}</td>
                                    <td>{{ $soli_afili_asoc_ant!=null ? $soli_afili_asoc->aprobada - $soli_afili_asoc_ant->aprobada : $soli_afili_asoc->aprobada - 0}}</td>
                                </tr>
                                <tr >
                                    <td>Rechazadas</td>

                                    <td>{{ $soli_afili_asoc_ant!=null ? $soli_afili_asoc_ant->rechazada : 0}}</td>
                                    <td>{{ $soli_afili_asoc_ant!=null ? $soli_afili_asoc_ant->rechazada * 100 /$total : 0}}</td>
                                    <td>{{$soli_afili_asoc->rechazada}}</td>
                                    <td>{{$cat_ocup_asoc->rechazada * 100 /$total}}</td>
                                    <td>{{ $soli_afili_asoc_ant!=null ? $soli_afili_asoc->rechazada - $soli_afili_asoc_ant->rechazada : $soli_afili_asoc->rechazada - 0}}</td>
                                </tr>
                                <tr >
                                    <td>Total</td>

                                    <td>{{ $soli_afili_asoc_ant!=null ? $soli_afili_asoc_ant->rechazada + $soli_afili_asoc_ant->aprobada + $soli_afili_asoc_ant->realizada : 0}}</td>
                                    <td>{{ $soli_afili_asoc_ant!=null ? ($soli_afili_asoc_ant->rechazada * 100 /$total) + ($soli_afili_asoc_ant->aprobada * 100 /$total) + ($soli_afili_asoc_ant->realizada * 100 /$total) : 0}}</td>
                                    <td>{{$soli_afili_asoc->rechazada + $soli_afili_asoc->aprobada + $soli_afili_asoc->realizada}}</td>
                                    <td>{{($soli_afili_asoc->rechazada * 100 /$total) + ($soli_afili_asoc->aprobada * 100 /$total) + ($soli_afili_asoc->realizada * 100 /$total)}}</td>
                                    <td>{{ $soli_afili_asoc_ant!=null ? ($soli_afili_asoc->rechazada + $soli_afili_asoc->aprobada + $soli_afili_asoc->realizada) - ($soli_afili_asoc_ant->rechazada + $soli_afili_asoc_ant->aprobada + $soli_afili_asoc_ant->realizada) : ($soli_afili_asoc->rechazada + $soli_afili_asoc->aprobada + $soli_afili_asoc->realizada) - 0}}</td>
                                </tr>


                                </tbody>

                            </table>
                        </div>
                    </div>

                </div>
            </section>

            <section class="Tabla">
                <div class="panel panel-default">

                    <div class="panel-body">
                        <div>
                            <h3>Rotación de los asociados</h3>


                            <table class="table  table-bordered table-sm table-hover tabla">
                                <thead class="thead-light">
                                <th>Afiliaciones</th>
                                <th colspan="2">Año base : {{$rot_asoc_ant!=null ? $rot_asoc_ant->Ano->ano : 'No existe información' }} </th>
                                <th colspan="2">Año actual : {{$rot_asoc->Ano->ano}}</th>
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
                                    <td>Ingresos</td>

                                    <td>{{ $rot_asoc_ant!=null ? $rot_asoc_ant->ingreso : 0}}</td>
                                    <td>{{ $rot_asoc_ant!=null ? $rot_asoc_ant->ingreso * 100 /$total : 0}}</td>
                                    <td>{{$rot_asoc->ingreso}}</td>
                                    <td>{{$rot_asoc->ingreso * 100 /$total}}</td>
                                    <td>{{ $rot_asoc_ant!=null ? $rot_asoc->ingreso - $rot_asoc_ant->ingreso : $rot_asoc->ingreso - 0}}</td>
                                </tr>
                                <tr >
                                    <td>Hombres</td>

                                    <td>{{ $rot_asoc_ant!=null ? $rot_asoc_ant->hombres_ing : 0}}</td>
                                    <td>{{ $rot_asoc_ant!=null ? $rot_asoc_ant->hombres_ing * 100 /$total : 0}}</td>
                                    <td>{{$rot_asoc->hombres_ing}}</td>
                                    <td>{{$rot_asoc->hombres_ing * 100 /$total}}</td>
                                    <td>{{ $rot_asoc_ant!=null ? $rot_asoc->hombres_ing - $rot_asoc_ant->hombres_ing : $rot_asoc->hombres_ing - 0}}</td>
                                </tr>
                                <tr >
                                    <td>Mujeres</td>

                                    <td>{{ $rot_asoc_ant!=null ? $rot_asoc_ant->mujeres_ing : 0}}</td>
                                    <td>{{ $rot_asoc_ant!=null ? $rot_asoc_ant->mujeres_ing * 100 /$total : 0}}</td>
                                    <td>{{$rot_asoc->mujeres_ing}}</td>
                                    <td>{{$rot_asoc->mujeres_ing * 100 /$total}}</td>
                                    <td>{{ $rot_asoc_ant!=null ? $rot_asoc->mujeres_ing - $rot_asoc_ant->mujeres_ing : $rot_asoc->mujeres_ing - 0}}</td>
                                </tr>

                                <tr  >
                                    <td>Retiros</td>

                                    <td>{{ $rot_asoc_ant!=null ? $rot_asoc_ant->retiro : 0}}</td>
                                    <td>{{ $rot_asoc_ant!=null ? $rot_asoc_ant->retiro * 100 /$total : 0}}</td>
                                    <td>{{$rot_asoc->retiro}}</td>
                                    <td>{{$rot_asoc->retiro * 100 /$total}}</td>
                                    <td>{{ $rot_asoc_ant!=null ? $rot_asoc->retiro - $rot_asoc_ant->retiro : $rot_asoc->retiro - 0}}</td>
                                </tr>
                                <tr >
                                    <td>Hombres</td>

                                    <td>{{ $rot_asoc_ant!=null ? $rot_asoc_ant->hombres_ret : 0}}</td>
                                    <td>{{ $rot_asoc_ant!=null ? $rot_asoc_ant->hombres_ret * 100 /$total : 0}}</td>
                                    <td>{{$rot_asoc->hombres_ret}}</td>
                                    <td>{{$rot_asoc->hombres_ret * 100 /$total}}</td>
                                    <td>{{ $rot_asoc_ant!=null ? $rot_asoc->hombres_ret - $rot_asoc_ant->hombres_ret : $rot_asoc->hombres_ret - 0}}</td>
                                </tr>
                                <tr >
                                    <td>Mujeres</td>

                                    <td>{{ $rot_asoc_ant!=null ? $rot_asoc_ant->mujeres_ret : 0}}</td>
                                    <td>{{ $rot_asoc_ant!=null ? $rot_asoc_ant->mujeres_ret * 100 /$total : 0}}</td>
                                    <td>{{$rot_asoc->mujeres_ret}}</td>
                                    <td>{{$rot_asoc->mujeres_ret * 100 /$total}}</td>
                                    <td>{{ $rot_asoc_ant!=null ? $rot_asoc->mujeres_ret - $rot_asoc_ant->mujeres_ret : $rot_asoc->mujeres_ret - 0}}</td>
                                </tr>




                                </tbody>

                            </table>
                        </div>
                    </div>

                </div>
            </section>


            <section class="Tabla">
                <div class="panel panel-default">

                    <div class="panel-body">
                        <div>
                            <h3>Causas de los retiros de asociados</h3>


                            <table class="table  table-bordered table-sm table-hover tabla">
                                <thead class="thead-light">
                                <th>Causas</th>
                                <th colspan="2">Año base : {{$ret_asoc_ant!=null ? $ret_asoc_ant->Ano->ano : 'No existe información' }} </th>
                                <th colspan="2">Año actual : {{$ret_asoc->Ano->ano}}</th>
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
                                    <td>Retiros voluntarios</td>

                                    <td>{{ $ret_asoc_ant!=null ? $ret_asoc_ant->retvoluntario : 0}}</td>
                                    <td>{{ $ret_asoc_ant!=null ? $ret_asoc_ant->retvoluntario * 100 /$total : 0}}</td>
                                    <td>{{$ret_asoc->retvoluntario}}</td>
                                    <td>{{$ret_asoc->retvoluntario * 100 /$total}}</td>
                                    <td>{{ $ret_asoc_ant!=null ? $ret_asoc->retvoluntario - $ret_asoc_ant->retvoluntario : $ret_asoc->retvoluntario-0}}</td>
                                </tr>
                                <tr >
                                    <td>Fallecimientos</td>

                                    <td>{{ $ret_asoc_ant!=null ? $ret_asoc_ant->fallecimiento : 0}}</td>
                                    <td>{{ $ret_asoc_ant!=null ? $ret_asoc_ant->fallecimiento * 100 /$total : 0}}</td>
                                    <td>{{$ret_asoc->fallecimiento}}</td>
                                    <td>{{$ret_asoc->fallecimiento * 100 /$total}}</td>
                                    <td>{{ $ret_asoc_ant!=null ? $ret_asoc->fallecimiento - $ret_asoc_ant->fallecimiento : $ret_asoc->fallecimiento-0}}</td>
                                </tr>
                                <tr >
                                    <td>Retiro voluntario</td>

                                    <td>{{ $ret_asoc_ant!=null ? $ret_asoc_ant->sanciones : 0}}</td>
                                    <td>{{ $ret_asoc_ant!=null ? $ret_asoc_ant->sanciones * 100 /$total : 0}}</td>
                                    <td>{{$ret_asoc->sanciones}}</td>
                                    <td>{{$ret_asoc->sanciones * 100 /$total}}</td>
                                    <td>{{ $ret_asoc_ant!=null ? $ret_asoc->sanciones - $ret_asoc_ant->sanciones : $ret_asoc->sanciones - 0}}</td>
                                </tr>


                                </tbody>

                            </table>
                        </div>
                    </div>

                </div>
            </section>



            <section class="Tabla">
                <div class="panel panel-default">
                    <div>
                        <h3>Composición por género de los empleados</h3>
                        <table class="table  table-bordered table-sm table-hover tabla">
                            <thead class="thead-light">
                            <th>Género</th>
                            <th colspan="2">Año base : {{$emp_ant!=null ? $emp_ant->Ano->ano : 'No existe información' }} </th>
                            <th colspan="2">Año actual : {{$emp->Ano->ano}}</th>
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

                                <td>{{ $emp_ant!=null ? $emp_ant->hom_emp : 0}}</td>
                                <td>{{ $emp_ant!=null ? $emp_ant->hom_emp * 100 /$total : 0}}</td>
                                <td>{{$emp->hom_emp}}</td>
                                <td>{{$emp->hom_emp * 100 /$total}}</td>
                                <td>{{ $emp_ant!=null ? $emp->hom_emp - $emp_ant->hom_emp : $emp->hom_emp - 0}}</td>
                            </tr>

                            <tr >
                                <td>Mujeres</td>

                                <td>{{ $emp_ant!=null ? $emp_ant->muj_emp : 0}}</td>
                                <td>{{ $emp_ant!=null ? $emp_ant->muj_emp * 100 /$total : 0}}</td>
                                <td>{{$emp->muj_emp}}</td>
                                <td>{{$emp->muj_emp * 100 /$total}}</td>
                                <td>{{ $emp_ant!=null ? $emp->muj_emp - $emp_ant->muj_emp : $emp->muj_emp - 0}}</td>
                            </tr>
                            <tr >
                                <td>Total</td>

                                <td>{{ $emp_ant!=null ?  $emp_ant->muj_emp + $emp_ant->hom_emp : 0}}</td>
                                <td>{{ $emp_ant!=null ? ($emp_ant->muj_emp * 100 /$total) + ($emp_ant->hom_emp * 100 /$total) : 0}}</td>
                                <td>{{$emp->muj_emp + $emp->hom_emp}}</td>
                                <td>{{($emp->muj_emp * 100 /$total) + ($emp->hom_emp * 100 /$total)}}</td>
                                <td>{{ $emp_ant!=null ? ($emp->muj_emp + $emp->hom_emp) - ( $emp_ant->muj_emp + $emp_ant->hom_emp) : ($emp->muj_emp + $emp->hom_emp) - 0}}</td>
                            </tr>





                            </tbody>

                        </table>
                    </div>
                </div>

            </section>
            {{-- <section class="Tabla">
                          <div class="panel panel-default">
                              <div>
                                  <h3>Composición según nivel educacional de los asociados</h3>
                                  <table class="table  table-bordered table-sm table-hover tabla">
                                      <thead class="thead-light">
                                      <th>Nivel educacional</th>
                                      <th colspan="2">Año base : {{$nivEscAsoc_ant!=null ? $nivEscAsoc_ant->Ano->ano : 'No existe información' }} </th>
                                      <th colspan="2">Año actual : {{$nivEscAsoc->Ano->ano}}</th>
                                      <th>Variación</th>
                                      --}}{{--<th>%</th>--}}{{--
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
                                          <td>Incorporaciones</td>

                                          <td>{{ $incBaj_ant!=null ? $incBaj_ant->incorporaciones : 0}}</td>
                                          <td>{{ $incBaj_ant!=null ? $incBaj_ant->incorporaciones * 100 /$total : 0}}</td>
                                          <td>{{$incBaj->incorporaciones}}</td>
                                          <td>{{$incBaj->incorporaciones * 100 /$total}}</td>
                                          <td>{{ $incBaj_ant!=null ? $incBaj->incorporaciones - $incBaj_ant->incorporaciones : $incBaj->incorporaciones- 0}}</td>
                                      </tr>

                                      <tr >
                                          <td>Bajas</td>

                                          <td>{{ $incBaj_ant!=null ? $incBaj_ant->bajas : 0}}</td>
                                          <td>{{ $incBaj_ant!=null ? $incBaj_ant->bajas * 100 /$total : 0}}</td>
                                          <td>{{$incBaj->bajas}}</td>
                                          <td>{{$incBaj->bajas * 100 /$total}}</td>
                                          <td>{{ $incBaj_ant!=null ? $incBaj->bajas - $incBaj_ant->bajas : $incBaj->bajas - 0}}</td>
                                      </tr>


                                      <tr >
                                          <td>Expulsados</td>

                                          <td>{{ $incBaj_ant!=null ? $incBaj_ant->expulsados : 0}}</td>
                                          <td>{{ $incBaj_ant!=null ? $incBaj_ant->expulsados * 100 /$total : 0}}</td>
                                          <td>{{$incBaj->expulsados}}</td>
                                          <td>{{$incBaj->expulsados * 100 /$total}}</td>
                                          <td>{{ $incBaj_ant!=null ? $incBaj->expulsados - $incBaj_ant->expulsados : $incBaj->expulsados - 0}}</td>
                                      </tr>





                                      </tbody>

                                  </table>
                              </div>
                          </div>

                      </section>--}}

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