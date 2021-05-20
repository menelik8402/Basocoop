@extends('layouts.app')

@section('content')
    <br><br>

    <div class="container">
        <section class="tabla">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title">Encuesta</h1>
                </div>
                <div class="panel-body">



                    @if(count($errors)>0)
                        <div class="alert alert-danger" role="alert">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                        <div class="alert alert-success" id="alerta1" style="display: none" role="alert">
                            No hay encuestas disponibles, por favor realice una encuesta.
                        </div>


                        <form  action="/insertar/encuesta" method="post" role="form">
                            {{csrf_field()}}
                            <p >
                                <h2 >
                                La presente encuesta tiene como propósito determinar las necesidades sociales reales de nuestros
                                asociados, directivos, empleados, sus familias y los miembros de la comunidad, así como valorar su
                                conocimiento sobre la Responsabilidad Social.
                            </h2>
                            </p>


                            <input type="hidden" name="id_cooperativa" value="{{$id_cooperativa}}">



                                                    <div class="form-horizontal     ">
                                                        <div>
                                                            <label class="control-label">Usted es:</label>
                                                            <div class="form-inline @if($errors->has('tipo')) border-danger @endif">
                                                                <label class="mx-1">
                                                                    <input type="radio" name="tipo" class="mx-1" {{ old('tipo')=='A' ? 'checked' : ''}}  value="A">
                                                                     Asociado
                                                                </label>
                                                                <br>
                                                                <label>
                                                                    <input type="radio" name="tipo" class="mx-1"  {{ old('tipo')=='E' ? 'checked' : ''}}  value="E">
                                                                    Empleado
                                                                </label>
                                                                <br>
                                                                <label>
                                                                    <input type="radio" name="tipo" class="mx-1"  {{ old('tipo')=='D' ? 'checked' : ''}}  value="D">
                                                                    Directivo
                                                                </label>
                                                                <label>
                                                                    <input type="radio" name="tipo" class="mx-1"  {{ old('tipo')=='D' ? 'checked' : ''}}  value="N">
                                                                    No asociado
                                                                </label>
                                                                @foreach($errors->get('tipo') as $error)
                                                                    <div class="form-control-feedback text-danger">{{$error}}</div>
                                                                @endforeach

                                                            </div>
                                                        </div>

                                                    </div>

                                                                <div class="form-horizontal  ">
                                                                    <div>
                                                                        <label class="control-label">Sexo:</label>
                                                                        <div class="form-inline @if($errors->has('sexo')) border-danger @endif">
                                                                                    <label class="mx-1">
                                                                                    <input type="radio" name="sexo" class="mx-1" {{ old('sexo')=='M' ? 'checked' : ''}}  value="M">
                                                                                    Masculino
                                                                                </label>
                                                                                    <br>
                                                                                <label>
                                                                                    <input type="radio" name="sexo" class="mx-1"  {{ old('sexo')=='F' ? 'checked' : ''}}  value="F">
                                                                                    Femenino
                                                                                </label>
                                                                            @foreach($errors->get('sexo') as $error)
                                                                                <div class="form-control-feedback text-danger">{{$error}}</div>
                                                                            @endforeach
                                                                        </div>
                                                                    </div>

                                                                </div>



                                                                                 <div class="form-horizontal mt-2">
                                                                                     <label class="control-label"> Rango de edad:</label>
                                                                                     <div class="form-inline @if($errors->has('rango')) border-danger @endif">
                                                                                         <span class="form-control mx-1">
                                                                                             <input type="radio" name="rango" class="form-control mx-2" {{ old('rango')=='18-25' ? 'checked' : ''}} value="18-25">18-25
                                                                                         </span>

                                                                                         <span class="form-control mx-1">
                                                                                             <input type="radio" name="rango" class="form-control mx-2" {{ old('rango')=='26-35' ? 'checked' : ''}} value="26-35">26-35
                                                                                         </span>

                                                                                         <span class="form-control mx-1">
                                                                                             <input type="radio" name="rango" class="form-control mx-2" {{ old('rango')=='36-45' ? 'checked' : ''}} value="36-45">36-45
                                                                                         </span>

                                                                                         <span class="form-control mx-1">
                                                                                             <input type="radio" name="rango" class="form-control mx-2" {{ old('rango')=='46-55' ? 'checked' : ''}} value="46-55">46-55
                                                                                         </span>

                                                                                         <span class="form-control mx-1">
                                                                                             <input type="radio" name="rango" class="form-control mx-2" {{ old('rango')=='56-60' ? 'checked' : ''}} value="56-60">56-60
                                                                                         </span>
                                                                                         <span class="form-control mx-1">
                                                                                             <input type="radio" name="rango" class="form-control mx-2" {{ old('rango')=='61-70' ? 'checked' : ''}} value="61-70">61-70
                                                                                         </span>

                                                                                         <span class="form-control mx-1">
                                                                                             <input type="radio" name="rango" class="form-control mx-2" {{ old('rango')=='70mas' ? 'checked' : ''}} value="70mas">70 o más
                                                                                         </span>

                                                                                         @foreach($errors->get('rango') as $error)
                                                                                             <div class="form-control-feedback text-danger">{{$error}}</div>
                                                                                         @endforeach


                                                                                     </div>

                                                                                 </div>




                                                                                <div class="form-horizontal mt-2">
                                                                                        <label class="control-label"> Nivel de escolaridad:</label>

                                                                                    <div class="form-inline @if($errors->has('nivel_esc')) border-danger @endif">
                                                                                         <span class="form-control mx-1">
                                                                                             <input type="radio" name="nivel_esc" class="form-control mx-2" {{ old('nivel_esc')=='Ninguno' ? 'checked' : ''}} value="Ninguno">Ninguno
                                                                                         </span>

                                                                                            <span class="form-control mx-1">
                                                                                             <input type="radio" name="nivel_esc" class="form-control mx-2" {{ old('nivel_esc')=='Basico' ? 'checked' : ''}} value="Basico">Básico
                                                                                         </span>

                                                                                        <span class="form-control mx-1">
                                                                                             <input type="radio" name="nivel_esc" class="form-control mx-2" {{ old('nivel_esc')=='Medio' ? 'checked' : ''}} value="Medio">Medio
                                                                                         </span>

                                                                                        <span class="form-control mx-1">
                                                                                             <input type="radio" name="nivel_esc" class="form-control mx-2" {{ old('nivel_esc')=='Superior' ? 'checked' : ''}} value="Superior">Superior
                                                                                         </span>

                                                                                        <span class="form-control mx-1">
                                                                                             <input type="radio" name="nivel_esc" class="form-control mx-2" {{ old('nivel_esc')=='Postgrado' ? 'checked' : ''}} value="Postgrado">Posgrado
                                                                                         </span>

                                                                                        @foreach($errors->get('nivel_esc') as $error)
                                                                                            <div class="form-control-feedback text-danger">{{$error}}</div>
                                                                                        @endforeach

                                                                                        </div>
                                                                                </div>

                                                                                <div class="form-horizontal mt-3 @if($errors->has('cantidad')) border-danger @endif">
                                                                                    <label class="control-label mt-3 ">¿Cuántas personas conviven con usted? </label>
                                                                                    <div class="form-inline">

                                                                                    <input type="number" class="form-control col-sm-1 mx-1" width="20" min="0"  value="{{old('cantidad')}}" name="cantidad">
                                                                                    </div>
                                                                                    @foreach($errors->get('cantidad') as $error)
                                                                                        <div class="form-control-feedback text-danger">{{$error}}</div>
                                                                                    @endforeach
                                                                                </div>


                                                                                    <div class="form-horizontal">


                                                                                        <label class="control-label mx-2 mt-3">Su vivienda es:</label>
                                                                                    </div>

                                                                                    <div class="form-inline @if($errors->has('vivienda')) border-danger @endif">
                                                                                    <span class="form-control mt-2 mx-1">
                                                                                        <input type="radio" name="vivienda"  class="form-control mx-1 "  {{ old('vivienda')=='Propia' ? 'checked' : ''}} value="Propia">
                                                                                        Propia
                                                                                    </span>


                                                                                    <span class="form-control mt-2 mx-1">
                                                                                        <input type="radio" name="vivienda"  class=" form-control mx-1 "   {{ old('vivienda')=='Alquilada' ? 'checked' : ''}}  value="Alquilada">
                                                                                        Alquilada
                                                                                    </span>
                                                                                        <span class="form-control mt-2 mx-1">
                                                                                        <input type="radio" name="vivienda"  class="form-control mx-1 "  {{ old('vivienda')=='Financiada' ? 'checked' : ''}} value="Financiada">
                                                                                        Financiada
                                                                                    </span>
                                                                                        </span>
                                                                                        <span class="form-control mt-2 mx-1">
                                                                                        <input type="radio" name="vivienda"  class="form-control mx-1 "  {{ old('vivienda')=='Otra' ? 'checked' : ''}} value="Otra">
                                                                                        Otra
                                                                                    </span>
                                                                                        @foreach($errors->get('vivienda') as $error)
                                                                                            <div class="form-control-feedback text-danger">{{$error}}</div>
                                                                                        @endforeach

                                                                                    </div>

                                                                                    <div class="form-horizontal">
                                                                                         <label class="control-label mt-3 mx-1"  >¿Usted tiene necesidad de vivienda? </label>
                                                                                    </div>
                                                                                    <div class="form-inline @if($errors->has('neces_vivienda')) border-danger @endif">
                                                                                            <span class="form-control mx-1">
                                                                                                <input type="radio" name="neces_vivienda"  {{ old('neces_vivienda')=='S' ? 'checked' : ''}}   value="S">
                                                                                                Si
                                                                                            </span>

                                                                                            <span class="form-control">
                                                                                                <input type="radio" name="neces_vivienda"   {{ old('neces_vivienda')=='N' ? 'checked' : ''}}  value="N">
                                                                                                No
                                                                                            </span>
                                                                                        @foreach($errors->get('neces_vivienda') as $error)
                                                                                            <div class="form-control-feedback text-danger">{{$error}}</div>
                                                                                        @endforeach
                                                                                    </div>




                                                                                <div class="form-horizontal mt-2">

                                                                                        <label class="control-label">Su vivienda necesita:</label>
                                                                                        <div class="form-inline @if($errors->has('vivienda_necesita')) border-danger @endif">
                                                                                            <span class=" form-control mx-2">
                                                                                                <input type="radio" name="vivienda_necesita" class="mx-1"   {{ old('vivienda_necesita')=='Construccion Total' ? 'checked' : ''}}  value="Construccion Total">
                                                                                                Construcción Total
                                                                                            </span>

                                                                                            <span class=" form-control mx-2">
                                                                                                <input type="radio" name="vivienda_necesita" class="mx-1"   {{ old('vivienda_necesita')=='Reparacion Total' ? 'checked' : ''}} value="Reparacion Total">
                                                                                                Reparación Total
                                                                                            </span>

                                                                                            <span class="form-control mx-2">
                                                                                                <input type="radio" name="vivienda_necesita"  class="mx-1"  {{ old('vivienda_necesita')=='Reparacion Media' ? 'checked' : ''}}   value="Reparacion Media">
                                                                                                Reparación Media
                                                                                            </span>

                                                                                            <span class="form-control mx-2">
                                                                                                <input type="radio" name="vivienda_necesita" class="mx-1"  {{ old('vivienda_necesita')=='Reparacion Ligera' ? 'checked' : ''}}  value="Reparacion Ligera">
                                                                                                Reparación Ligera
                                                                                            </span>
                                                                                            @foreach($errors->get('vivienda_necesita') as $error)
                                                                                                <div class="form-control-feedback text-danger">{{$error}}</div>
                                                                                            @endforeach
                                                                                        </div>

                                                                                </div>
                                                                        <br>
                                                                                <div class="form-horizontal mt-2">
                                                                                    <label class="control-label">Tiene necesidad de capacitación, señale que tipo de curso:</label>
                                                                                    <div class="form-inline">
                                                                                        <span class="form-control mx-2">
                                                                                             <input type="checkbox" name="capa_emprend" class="mx-1"   {{ old('capa_emprend')=='Emprendedurismo ' ? 'checked' : ''}} value="Emprendedurismo ">
                                                                                           Emprendedurismo
                                                                                        </span>

                                                                                        <span class="form-control mx-2">
                                                                                             <input type="checkbox" name="capa_filos_coop" class="mx-1"   {{ old('capa_filos_coop')=='Filosofía cooperativa' ? 'checked' : ''}} value="Filosofía Cooperativa">
                                                                                            Filosofía Cooperativa
                                                                                        </span>

                                                                                        <span class="form-control mx-2">
                                                                                             <input type="checkbox" name="capa_edu_financ" class="mx-1"   {{ old('capa_edu_financ')=='Educación financiera' ? 'checked' : ''}} value="Educación financiera">
                                                                                            Educación financiera
                                                                                        </span>

                                                                                        <span class="form-control mx-2">
                                                                                             <input type="checkbox" name="capa_edu_ambient" class="mx-1"   {{ old('capa_edu_ambient')=='Educación ambiental' ? 'checked' : ''}} value="Educación ambiental">
                                                                                            Educación ambiental
                                                                                        </span>

                                                                                        <span class="form-control mx-2">
                                                                                             <input type="checkbox" name="capa_intel_emoc" class="mx-1"   {{ old('capa_intel_emoc')=='Inteligencia emocional' ? 'checked' : ''}} value="Inteligencia emocional">
                                                                                            Inteligencia emocional
                                                                                        </span>

                                                                                        <span class="form-control mx-2 mt-1">
                                                                                             <input type="checkbox" name="capa_fundam_legal" class="mx-1"   {{ old('capa_fundam_legal')=='Fundamentos' ? 'checked' : ''}} value="Fundamentos">
                                                                                            Fundamentos legales del cooperativismo
                                                                                        </span>

                                                                                        <span class="form-control mx-2 mt-1">
                                                                                             <input type="checkbox" name="capa_adult_mayor" class="mx-1"   {{ old('capa_adult_mayor')=='Adulto' ? 'checked' : ''}} value="Adulto">
                                                                                            Temas relacionados con el adulto mayor
                                                                                        </span>
                                                                                        <span class="form-control mx-2">
                                                                                             <input type="checkbox" name="capa_oficio" id="capa_oficio" class="mx-1"   {{ old('capa_oficio')=='Oficios' ? 'checked' : ''}} value="Oficios">
                                                                                           Oficios
                                                                                        </span>





                                                                                    </div>


                                                                                        <div class="form-group">
                                                                                            <label class="control-label mt-2">En caso de seleccionar oficios especifique cuáles </label>
                                                                                         <span class="form-group mx-2 @if($errors->has('capa_ofic_cual')) border-danger @endif">
                                                                                            <textarea name="capa_ofic_cual" id="capa_ofic_cual" class="form-control mx-1" cols="115" rows="2"  readonly  placeholder="Especifique los oficios" >{{old('capa_ofic_cual')}}</textarea>

                                                                                        </span>
                                                                                            @foreach($errors->get('capa_ofic_cual') as $error)
                                                                                                <div class="form-control-feedback text-danger">{{$error}}</div>
                                                                                            @endforeach

                                                                                        </div>


                                                                                        <label class="control-label mt-2">Especifique si prefiere la inclusión de otros cursos:</label>

                                                                                        <div class="form-group @if($errors->has('otroscursos')) border-danger @endif">


                                                                                            <textarea cols="50" rows="2" class="form-control mx-2"  placeholder="Especifique otros cursos" id="otroscursos"  name="otroscursos">{{old('cursos')}}</textarea>


                                                                                        </div>
                                                                                    @foreach($errors->get('otroscursos') as $error)
                                                                                        <div class="form-control-feedback text-danger">{{$error}}</div>
                                                                                    @endforeach


                                                                                </div>


                                                                            <br>
                            <div class="form-inline mx-1 @if($errors->has('tiene_auto')) border-danger @endif">
                                <label class="control-label mt-2" >Tiene auto:</label>
                                <span class=" form-control mx-1">
                                    <input type="radio" name="tiene_auto"  class="form-control mx-1" {{ old('tiene_auto')=='S' ? 'checked' : ''}} value="S">
                                    Si
                                </span>

                                <span class="form-control mx-1">
                                    <input type="radio" name="tiene_auto" class="form-control mx-1" {{ old('tiene_auto')=='N' ? 'checked' : ''}}  value="N">
                                    No
                                </span>
                                @foreach($errors->get('tiene_auto') as $error)
                                    <div class="form-control-feedback text-danger">{{$error}}</div>
                                @endforeach
                            </div>
                            <br>


                            <div class="form-inline mx-1 @if($errors->has('rep_auto')) border-danger @endif">


                                <label class="control-label" >Necesita reparar su auto:</label>
                                <span class="form-control mx-1" >
                                    <input type="radio" name="rep_auto"   class="form-control mx-1"  {{ old('rep_auto')=='S' ? 'checked' : ''}}  value="S">
                                    Si
                                </span>

                                <span class="form-control mx-1" >
                                    <input type="radio" name="rep_auto"  class="form-control mx-1" {{ old('rep_auto')=='N' ? 'checked' : ''}} value="N" >
                                    No
                                </span>
                                @foreach($errors->get('rep_auto') as $error)
                                    <div class="form-control-feedback text-danger">{{$error}}</div>
                                @endforeach
                            </div>






                                <div class="form-horizontal mx-1 mt-2">
                                    <label class=" control-label mx-1 mt-3 ">¿Cómo usted considera la recreación en la cooperativa? </label>
                                      <div class="form-inline @if($errors->has('recreacion')) border-danger @endif ">
                                        <span class=" form-control mx-1" >
                                            <input type="radio" name="recreacion" class="form-control mx-1"  {{ old('recreacion')=='Buena' ? 'checked' : ''}}  value="Buena">
                                            Buena
                                        </span>
                                          <span class=" form-control mx-1">
                                            <input type="radio" name="recreacion"  class=" form-control mx-1"    {{ old('recreacion')=='Regular' ? 'checked' : ''}}  value="Regular">
                                            Regular
                                        </span>

                                        <span class=" form-control mx-1">
                                            <input type="radio" name="recreacion"  class=" form-control mx-1"  {{ old('recreacion')=='Mala' ? 'checked' : ''}} value="Mala">
                                            Mala
                                        </span>

                                          @foreach($errors->get('recreacion') as $error)
                                              <div class="form-control-feedback text-danger">{{$error}}</div>
                                          @endforeach


                                      </div>

                                </div>





                                <div class="form-horizontal mt-2">
                                    <label  class="mt-1">¿Qué actividades socioculturales considera deben realizarse en la cooperativa?</label>
                                    <div class="form-inline">
                                                                                        <span class="form-control mx-2">
                                                                                             <input type="checkbox" name="act_soc_fiest_nino" class="mx-1"   {{ old('act_soc_fiest_nino')=='Fiesta del niño' ? 'checked' : ''}} value="Fiesta">
                                                                                           Fiesta del niño
                                                                                        </span>

                                        <span class="form-control mx-2">
                                                                                             <input type="checkbox" name="act_soc_dia_pad" class="mx-1"   {{ old('act_soc_dia_pad')=='Padre' ? 'checked' : ''}} value="Padre">
                                                                                            Día del Padre
                                                                                        </span>

                                        <span class="form-control mx-2">
                                                                                             <input type="checkbox" name="act_soc_dia_mad" class="mx-1"   {{ old('act_soc_dia_mad')=='Madre' ? 'checked' : ''}} value="Madre">
                                                                                            Día de la Madre
                                                                                        </span>

                                        <span class="form-control mx-2">
                                                                                             <input type="checkbox" name="act_soc_dia_int_muj" class="mx-1"   {{ old('act_soc_dia_int_muj')=='Mujer' ? 'checked' : ''}} value="Mujer">
                                                                                           Día Internacional de la Mujer
                                                                                        </span>

                                        <span class="form-control mx-2">
                                                                                             <input type="checkbox" name="act_soc_adult_mayor" class="mx-1"   {{ old('act_soc_adult_mayor')=='AdultoMay' ? 'checked' : ''}} value="AdultoMay">
                                                                                           Adulto Mayor
                                                                                        </span>

                                        <span class="form-control mx-2 mt-1">
                                                                                             <input type="checkbox" name="act_soc_enc_asoc" class="mx-1"   {{ old('act_soc_enc_asoc')=='EncAsoc' ? 'checked' : ''}} value="EncAsoc">
                                                                                            Encuentros de asociados
                                                                                        </span>

                                        <span class="form-control mx-2 mt-1">
                                                                                             <input type="checkbox" name="act_soc_festiv" id="act_soc_festiv" class="mx-1"   {{ old('act_soc_festiv')=='Festival' ? 'checked' : ''}} value="Festival">
                                                                                            Festivales
                                                                                        </span>

                                    </div>

                                    <div class="form-group">
                                        <label class="control-label mt-2">En caso de seleccionar festivales especifique cuáles festivales prefiere </label>
                                        <span class="form-group mx-2 @if($errors->has('act_soc_festiv_cuales')) border-danger @endif">
                                                                                            <textarea name="act_soc_festiv_cuales"  id="act_soc_festiv_cuales" class="form-control mx-1" cols="115"  rows="2" readonly placeholder="Especifique algún festival" >{{old('act_soc_festiv_cuales')}}</textarea>
                                                                                        </span>
                                        @foreach($errors->get('act_soc_festiv_cuales') as $error)
                                            <div class="form-control-feedback text-danger">{{$error}}</div>
                                        @endforeach
                                    </div>


                                    <label class="control-label mt-2">Mencione otras actividades socioculturales que usted considere deban realizarse en la cooperativa.</label>
                                    <div class="form-group">

                                        <textarea cols="115" rows="2" class="form-control mx-2" id="actividades"   name="actividades">{{old('actividades')}}</textarea>


                                    </div>






                            </div>


                            <div class="form-horizontal mt-2">

                                <div class="form-inline @if($errors->has('segdevida')) border-danger @endif  ">
                                    <label>¿Tiene usted seguro de vida? </label>
                                    <span class="form-control ">
                                        <input type="radio" name="segdevida" id="segdevida" class=" form-control mx-1" {{ old('segdevida')=='S' ? 'checked' : ''}}  value="S">
                                        Si
                                    </span>

                                    <span class="form-control mx-1">
                                        <input type="radio" name="segdevida"  id="segdevida1" class=" form-control mx-1" {{ old('segdevida')=='N' ? 'checked' : ''}} value="N">
                                        No
                                    </span>
                                    @foreach($errors->get('segdevida') as $error)
                                        <div class="form-control-feedback text-danger">{{$error}}</div>
                                    @endforeach
                                </div>

                                <div class="form-horizontal mt-1">
                                    <label class="control-label mt-3">
                                        En caso de que su respuesta sea negativa explique por qué no tiene seguro de vida:
                                    </label>

                                    <textarea cols="115" rows="2" class="form-control @if($errors->has('seguro_vida_no')) border-danger @endif "     name="seguro_vida_no"  id="seguro_vida_no">{{old('seguro_vida_no')}}</textarea>
                                    @foreach($errors->get('seguro_vida_no') as $error)
                                        <div class="form-control-feedback text-danger">{{$error}}</div>
                                    @endforeach
                                </div>




                                <div class="form-inline mt-3 @if($errors->has('seguro_vehic')) border-danger @endif ">
                                    <label class="control-label"> ¿Tiene usted seguro de vehículo?</label>
                                    <span class="form-control">
                                        <input type="radio" name="seguro_vehic" id="seguro_vehic"  class="form-control mx-1" {{ old('seguro_vehic')=='S' ? 'checked' : ''}}   value="S">
                                        Si
                                    </span>

                                    <span class="form-control mx-1">
                                        <input type="radio" name="seguro_vehic"  id="seguro_vehic1"  class="form-control mx-1" {{ old('seguro_vehic')=='N' ? 'checked' : ''}} value="N">
                                        No
                                    </span>
                                    @foreach($errors->get('seguro_vehic') as $error)
                                        <div class="form-control-feedback text-danger">{{$error}}</div>
                                    @endforeach
                                </div>
                                <div class="form-horizontal mt-1">
                                    <label class="control-label mt-1" >
                                        En caso de que su respuesta sea negativa explique por qué no tiene seguro de vehículo:
                                    </label>
                                    <textarea cols="115" rows="2" class="form-control"   name="seguro_vehic_no" id="seguro_vehic_no" >{{old('seguro_vehic_no')}}</textarea>
                                </div>



                            </div>

                            <div class="form-horizontal mt-2">

                                    <label class="control-label">¿Convive usted con persona(s) enferma(s) o incapacitadas(s)?</label>
                                    <div class="form-inline @if($errors->has('per_enfer')) border-danger @endif">
                                        <span class="form-control mt-1 mx-1" >
                                            <input type="radio" name="per_enfer" class="form-control mx-1" id="per_enfer" {{ old('per_enfer')=='S' ? 'checked' : ''}}  value="S">
                                            Si
                                        </span>


                                        <span class="form-control mt-1" >
                                            <input type="radio"  name="per_enfer" id="per_enfer1" class="form-control mx-1"  {{ old('per_enfer')=='N' ? 'checked' : ''}}  value="N">
                                            No
                                        </span>
                                        @foreach($errors->get('per_enfer') as $error)
                                            <div class="form-control-feedback text-danger">{{$error}}</div>
                                        @endforeach

                                </div>
                            </div>

                            <div class="form-horizontal @if($errors->has('enfer_padece')) border-danger @endif">
                                <label   > Especifique la enfermedad que padece(n)</label>

                                <textarea cols="115" rows="2" placeholder="Especifique la enfermedad que padece"  class="form-control"  name="enfer_padece" value="  " id="enfer_padece"> {{old('enfer_padece')}}</textarea>
                                @foreach($errors->get('enfer_padece') as $error)
                                    <div class="form-control-feedback text-danger">{{$error}}</div>
                                @endforeach
                            </div>

                            <div class="form-horizontal @if($errors->has('enfer_padece_apoyo')) border-danger @endif">
                                <label class="control-label" > Necesita algún tipo  apoyo:</label>

                                <textarea cols="115" rows="2" placeholder="Especifique que tipo de apoyo necesita"  class="form-control" name="enfer_padece_apoyo" id="enfer_padece_apoyo">{{old('enfer_padece_apoyo')}}</textarea>
                                @foreach($errors->get('enfer_padece_apoyo') as $error)
                                    <div class="form-control-feedback text-danger">{{$error}}</div>
                                @endforeach
                            </div>

                            <div class="form-horizontal @if($errors->has('ninos_menores')) border-danger @endif ">

                                    <label class="control-label">¿Usted tiene niños menores? </label>
                                <div class="form-inline">
                                    <span class="form-control" >
                                        <input type="radio" name="ninos_menores" class="form-control" {{ old('ninos_menores')=='S' ? 'checked' : ''}}   value="S">
                                        Si
                                    </span>

                                    <span class="form-control mx-1">
                                        <input type="radio"  name="ninos_menores" class="form-control" {{ old('ninos_menores')=='N' ? 'checked' : ''}}    value="N">
                                        No
                                    </span>
                                    @foreach($errors->get('ninos_menores') as $error)
                                        <div class="form-control-feedback text-danger">{{$error}}</div>
                                    @endforeach
                                </div>
                            </div>


                                <div class="form-horizontal ">

                                    <label>¿Considera usted que la cooperativa pudiera brindar algún tipo de ayuda en el cuidado de  los niños?</label>
                                    <div class="form-inline @if($errors->has('ninos_cuidados')) border-danger @endif">
                                        <span class="form-control mx-1"  >
                                            <input type="radio" name="ninos_cuidados" class="form-control" id="ninos_cuidados" {{ old('ninos_cuidados')=='S' ? 'checked' : ''}}   value="S">
                                            Si
                                        </span >
                                        <br>
                                        <span class="form-control mx-1" >
                                            <input type="radio"  name="ninos_cuidados" class="form-control" id="ninos_cuidados1" {{ old('ninos_cuidados')=='N' ? 'checked' : ''}}  value="N">
                                            No
                                        </span>
                                        @foreach($errors->get('ninos_cuidados') as $error)
                                            <div class="form-control-feedback text-danger">{{$error}}</div>
                                        @endforeach
                                    </div>

                                  <div class="form-horizontal @if($errors->has('cuidados')) border-danger @endif ">
                                    <label class="control-label" > Mecione qué cuidados pudiera la cooperativa brindar en favor de los niños:</label>

                                    <textarea cols="115" rows="2" placeholder="Mencione algunos cuidados" class="form-control"  name="cuidados" id="cuidados">{{old('cuidados')}}</textarea>
                                      @foreach($errors->get('cuidados') as $error)
                                          <div class="form-control-feedback text-danger">{{$error}}</div>
                                      @endforeach
                                  </div>



                                        <div class="form-horizontal">
                                            <label class="control-label">¿Usted ha necesitado acceder a los servicios funerarios?  </label>
                                            <div class="form-inline @if($errors->has('serv_funeb')) border-danger @endif ">
                                            <span class="form-control mx-1" >
                                                <input type="radio" name="serv_funeb" class="form-control" id="serv_funeb" {{ old('serv_funeb')=='S' ? 'checked' : ''}}  value="S">
                                                Si
                                            </span>

                                            <span class="form-control mx-1" >
                                                <input type="radio"  name="serv_funeb" class="form-control" id="serv_funeb1" {{ old('serv_funeb')=='N' ? 'checked' : ''}}  value="N">
                                                No
                                            </span>
                                                @foreach($errors->get('serv_funeb') as $error)
                                                    <div class="form-control-feedback text-danger">{{$error}}</div>
                                                @endforeach
                                            </div>
                                        </div>

                                        <div class="form-horizontal">
                                            <label class="control-label">Considera que la cooperativa debería ayudar en este sentido:  </label>
                                            <div class="form-inline  @if($errors->has('serv_funb_ayu')) border-danger @endif ">
                                                <span class="form-control mx-1" >
                                                    <input type="radio" name="serv_funb_ayu" class="form-control" {{ old('serv_funb_ayu')=='S' ? 'checked' : ''}}  value="S">
                                                    Si
                                                </span>

                                                <span class="form-control mx-1" >
                                                    <input type="radio"  name="serv_funb_ayu" class="form-control" {{ old('serv_funb_ayu')=='N' ? 'checked' : ''}}   value="N">
                                                    No
                                                </span>
                                                @foreach($errors->get('serv_funb_ayu') as $error)
                                                    <div class="form-control-feedback text-danger">{{$error}}</div>
                                                @endforeach
                                            </div>
                                        </div>


                                    <div class="form-horizontal @if($errors->has('serv_funb_ayu')) border-danger @endif">

                                    <label  > ¿De que forma ha accedido a estos servicios?</label>

                                    <textarea cols="115" rows="2"  class="form-control" readonly id="serv_funb_argum" name="serv_funb_argum" >{{old('serv_funb_argum')}}</textarea>
                                        @foreach($errors->get('serv_funb_argum') as $error)
                                            <div class="form-control-feedback text-danger">{{$error}}</div>
                                        @endforeach
                                    </div>

                                    <div class="form-horizontal mt-2 @if($errors->has('part_act_sociales')) border-danger @endif  ">
                                        <label class="control-label" >¿En qué actividades usted cree que debería participar la cooperativa?</label>
                                        <textarea cols="115" rows="2" placeholder="Actividades sociales de la cooperativa " name="part_act_sociales" id="part_act_sociales" class="form-control">{{old('part_act_sociales')}}</textarea>
                                        @foreach($errors->get('part_act_sociales') as $error)
                                            <div class="form-control-feedback text-danger">{{$error}}</div>
                                        @endforeach
                                    </div>

                                    <div class="form-horizontal mt-2 @if($errors->has('act_coop_jov_nin')) border-danger   @endif ">
                                        <label class="control-label" >¿Qué actividades pudiera realizar la cooperativa en función de los niños y jóvenes? </label>
                                        <textarea cols="115" rows="2"  name="act_coop_jov_nin"  id="act_coop_jov_nin" class="form-control">{{old('act_coop_jov_nin')}}</textarea>
                                        @foreach($errors->get('act_coop_jov_nin') as $error)
                                            <div class="form-control-feedback text-danger">{{$error}}</div>
                                        @endforeach
                                    </div>


                                        <div class="form-horizontal">
                                            <label class="control-label">Las líneas de crédito que ofrece su cooperativa se corresponden con las necesidades sociales reales de sus asociados,
                                                directivos, empleados, sus familias y los miembros de la
                                                comunidad donde se encuentra insertada.</label>
                                              <div class="form-inline @if($errors->has('linea_cred')) border-danger   @endif">
                                                <span class="form-control mx-1" >
                                                    <input type="radio" name="linea_cred" id="act_coop" class="form-control" {{ old('linea_cred')=='S' ? 'checked' : ''}}   value="S">
                                                    Si
                                                </span>

                                                  <span class="form-control mx-1" >
                                                    <input type="radio"  name="linea_cred" id="act_coop1" class="form-control" {{ old('linea_cred')=='N' ? 'checked' : ''}}   value="N">
                                                    No
                                                  </span>
                                                  @foreach($errors->get('linea_cred') as $error)
                                                      <div class="form-control-feedback text-danger">{{$error}}</div>
                                                  @endforeach
                                              </div>

                                        </div>
                                    <div class="form-horizontal  @if($errors->has('otras_act_des_med_am')) border-danger   @endif">

                                    <label class="control-label"  >¿Qué actividades en función del desarrollo medioambiental puede desarrollar la cooperativa?</label>

                                    <textarea cols="115" rows="2"   class="form-control" name="otras_act_des_med_am" id="otras_act_des_med_am">{{old('otras_act_des_med_am')}}</textarea>
                                        @foreach($errors->get('otras_act_des_med_am') as $error)
                                            <div class="form-control-feedback text-danger">{{$error}}</div>
                                        @endforeach
                                    </div>

                                    <div class="form-horizontal">
                                        <label  class="control-label" > ¿Considera que es necesario realizar alguna actividad de reforestación? </label>
                                        <div class="form-inline @if($errors->has('otras_act_des_med_am')) border-danger   @endif ">
                                                    <span class="form-control mx-1">
                                                        <input type="radio" name="act_reforest" class="form-control" {{ old('act_reforest')=='S' ? 'checked' : ''}}   value="S">
                                                        Si
                                                    </span>


                                            <span  class="form-control mx-1">
                                                        <input type="radio" name="act_reforest" class="form-control" {{ old('act_reforest')=='N' ? 'checked' : ''}}  value="N">
                                                        No
                                                    </span>
                                            @foreach($errors->get('act_reforest') as $error)
                                                <div class="form-control-feedback text-danger">{{$error}}</div>
                                            @endforeach
                                        </div>

                                    </div>

                                    <div class="form-horizontal mt-3 @if($errors->has('act_reforest_donde')) border-danger   @endif ">
                                        <label class="control-label" >¿Dónde considera que es necesario realizar alguna actividad de reforestación? </label>
                                        <textarea cols="115" rows="2" name="act_reforest_donde" id="act_reforest_donde" class="form-control">{{old('act_reforest_donde')}}</textarea>
                                      {{--  @foreach($errors->get('act_reforest_donde') as $error)
                                            <div class="form-control-feedback text-danger">{{$error}}</div>
                                        @endforeach--}}
                                    </div>



                                        <div class="form-horizontal">
                                            <label class="control-label" >¿Cuenta su cooperativa con el servicio de cajero automático?</label>
                                            <div class="form-inline @if($errors->has('caj_aut')) border-danger   @endif">
                                                    <span class="form-control mx-1">
                                                        <input type="radio" name="caj_aut" class="form-control"  {{ old('caj_aut')=='S' ? 'checked' : ''}} value="S">
                                                        Si
                                                    </span>


                                                    <span class="form-control mx-1">
                                                        <input type="radio" name="caj_aut" class="form-control"  {{ old('caj_aut')=='N' ? 'checked' : ''}}  value="N">
                                                        No
                                                    </span>
                                                @foreach($errors->get('caj_aut') as $error)
                                                    <div class="form-control-feedback text-danger">{{$error}}</div>
                                                @endforeach
                                            </div>

                                        </div>


                                        <div class="form-horizontal ">
                                            <label class="control-label">  ¿Considera necesario implementar este servicio?
                                            </label>
                                            <div class="form-inline  @if($errors->has('nec_caj_aut')) border-danger   @endif">
                                                <span class="form-control mx-1" >
                                                    <input type="radio" name="nec_caj_aut" class="form-control" {{ old('nec_caj_aut')=='S' ? 'checked' : ''}}   value="S">
                                                    Si
                                                </span>


                                                <span class="form-control mx-1">
                                                    <input type="radio" name="nec_caj_aut" class="form-control" {{ old('nec_caj_aut')=='N' ? 'checked' : ''}}  value="N">
                                                    No
                                                </span>
                                                @foreach($errors->get('nec_caj_aut') as $error)
                                                    <div class="form-control-feedback text-danger">{{$error}}</div>
                                                @endforeach
                                            </div>

                                        </div>
                                </div>







                            <button type="submit" class="btn boton pull-right mt-4">Aceptar encuesta</button>

                        </form>

















                </div>
                <div class="panel-footer">
                    <br>

                    {{--<a data-toggle="modal" data-target="#modal" href="#" class="btn btn-primary pull-right">Nuevo--}}
                    {{--Proyecto</a>--}}
                </div>
            </div>
        </section>

    </div>





    <script type="text/javascript">

        var tabla = $('#tabla');
        var tablaDT;
        var eliminar;
        var editClick;
        var addClick;
        var delClick;
        var editar;
        var info;

        $(document).ready(function () {
            tablaDT = tabla.DataTable();


     /*   $('#capa_ofic_cual').val('Ninguno');
        $('#otroscursos').val('Ninguno');
        $('#act_soc_festiv_cuales').val('NInguno');
        $('#actividades').val('NInguno');
            $('#seguro_vida_no').val('NInguno');
            $('#seguro_vehic_no').val('NInguno');
            $('#enfer_padece_apoyo').val('NInguno');
            $('#enfer_padece').val('NInguno');
            $('#part_act_sociales').val('NInguno');
            $('#act_coop_jov_nin').val('NInguno');
            $('#otras_act_des_med_am').val('NInguno');
            $('#act_reforest_donde').val('NInguno');
            $('#cuidados').val('NInguno');
            $('#serv_funb_argum').val('NInguno');
*/

            //validando
          /*  if({!! $encuesta=='No' !!}){
                $('#alerta1').fadeIn(1000);
                $('#alerta1').fadeOut(5000);
            }*/






            //validando cuando se seelecciona oficios
               $('#capa_oficio').click(function () {
                   if($('#capa_oficio').prop('checked')) {


                       $('#capa_ofic_cual').prop('readonly',false);
                       $('#capa_ofic_cual').val(' ')

                   }
                   else {

                       $('#capa_ofic_cual').prop('readonly',true);

                       $('#capa_ofic_cual').val(' ')
                   }
               });


            $('#act_soc_festiv').click(function () {
                if($('#act_soc_festiv').prop('checked')) {


                    $('#act_soc_festiv_cuales').prop('readonly',false);
                    $('#act_soc_festiv_cuales').val(' ')

                }
                else {

                    $('#act_soc_festiv_cuales').prop('readonly',true);

                    $('#act_soc_festiv_cuales').val(' ')
                }
            });



        ///validando los seguros de vida
            $('#segdevida').click(function () {

                if($('#segdevida').attr('value')=='N')
                {
                    $('#seguro_vida_no').prop('readonly',false);
                    $('#seguro_vida_no').val(' ')



                }
                else {
                    $('#seguro_vida_no').prop('readonly',true);
                    $('#seguro_vida_no').val('  ')
                }
            });

            $('#segdevida1').click(function () {

                if($('#segdevida1').attr('value')=='N')
                {
                    $('#seguro_vida_no').attr('readonly',false);
                    $('#seguro_vida_no').val(' ');

                }


            });


            ///validando los seguros de saludo
            $('#seguro_vehic').click(function () {

                if($("input[name='seguro_vehic' ]").attr('value')=='S')
                {


                    $('#seguro_vehic_no').attr('readonly',true);
                    $('#seguro_vehic_no').val('  ');

                }
                else
                {
                    alert('ee')
                    $('#seguro_vehic_no').attr('readonly',false);
                    $('#seguro_vehic_no').val(' ');

                }
            });
            $('#seguro_vehic1').click(function () {

                if($('#seguro_vehic1').attr('value')=='N')
                {


                    $('#seguro_vehic_no').attr('readonly',false);
                    $('#seguro_vehic_no').val(' ');

                }
                else
                {
                    alert('ee')
                    $('#seguro_vehic_no').attr('readonly',false);
                    $('#seguro_vehic_no').val(' ');

                }
            });


            ////conviviencia con personas enfermas

            $('#per_enfer').click(function () {
                //alert($('#per_enfer').attr('value'))

                if($('#per_enfer').attr('value')=='S')
                {

                    $('#enfer_padece').attr('readonly',false);
                    $('#enfer_padece').val(' ');

                    $('#enfer_padece_apoyo').attr('readonly',false);
                    $('#enfer_padece_apoyo').val(' ');

                }
            });

            $('#per_enfer1').click(function () {

                if($('#per_enfer1').attr('value')=='N')
                {

                    $('#enfer_padece').attr('readonly',true);
                    $('#enfer_padece').val(' ');
                    $('#enfer_padece_apoyo').attr('readonly',true);
                    $('#enfer_padece_apoyo').val(' ');

                }
            });

            /////cuidados de ninos menores

            //ninos_cuidados

            $('#ninos_cuidados').click(function () {

                if($('#ninos_cuidados').attr('value')=='S')
                {

                    $('#cuidados').attr('readonly',false);
                    $('#cuidados').val('');

                }
            });


            $('#ninos_cuidados1').click(function () {

                if($('#ninos_cuidados1').attr('value')=='N')
                {

                    $('#cuidados').attr('readonly',true);
                    $('#cuidados').val(' ');

                }
            });

            ///servicios funebre serv_funeb

            $('#serv_funeb').click(function () {

                if($('#serv_funeb').attr('value')=='S')
                {

                    $('#serv_funb_argum').attr('readonly',false);
                    $('#serv_funb_argum').val('');

                }
            });


            $('#serv_funeb1').click(function () {

                if($('#serv_funeb1').attr('value')=='N')
                {

                    $('#serv_funb_argum').attr('readonly',true);
                    $('#serv_funb_argum').val(' ');

                }
            });

            ///actividades con la familia
            //act_coop
            $('#act_coop').click(function () {

                if($('#act_coop').attr('value')=='S')
                {

                    $('#act_coop_text').attr('readonly',false);
                    $('#act_coop_text').val('');

                }
            });

           /* $('#capa_oficio').click(function () {
                if($('#capa_oficio').checkbox().checked==true)
                    alert('yes')
                else
                    alert()
            });*/


            $('#act_coop1').click(function () {

                if($('#act_coop1').attr('value')=='N')
                {

                    $('#act_coop_text').attr('readonly',true);
                    $('#act_coop_text').val('');

                }
            });









        });


    </script>
@endsection