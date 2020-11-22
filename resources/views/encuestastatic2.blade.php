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




                    <form  action="/insertar/encuesta2" method="post" role="form">
                        {{csrf_field()}}
                        <p >
                        <h2 >
                            La presente encuesta tiene como propósito determinar las necesidades sociales reales de nuestros asociados, empleados y directivos, sus familias y los miembros de la comunidad, así como valorar su conocimiento sobre la Responsabilidad Social.
                        </h2>
                        </p>


                        <div class="form-inline">
                            <div class="form-control">
                                <label>Participa su familia en las actividades organizadas por la cooperativa</label>

                                <label class="pull-left" >
                                    <input type="radio" name="act_coop"    value="S">
                                    Si
                                </label>
                                    <br>
                                <label class="pull-left">
                                    <input type="radio"  name="act_coop"    value="N">
                                    No
                                </label>

                            </div>
                        </div>
                            <label  > Mencione alugnas de esas actividades:</label>

                            <textarea cols="30" rows="4" placeholder="Especifique en que actividades participa.." class="form-control" name="act_coop_text"></textarea>




                        <hr>

                        <div class="form-inline">
                            <div class="form-control">
                                <label   > <p> Se presentan  en las asambleas <p> los resultados económicos de la cooperativa. </p>  </label>
                                <label class="pull-left">
                                    <input type="radio" name="result_econ"  checked  value="S">
                                    Si
                                </label>
                                <br>

                                <label class="pull-left">
                                    <input type="radio" name="result_econ"   value="N">
                                    No
                                </label>

                            </div>

                            <div class="form-control mx-3">
                                <label  > Se presentan los resultados de la gestión social de la cooperativa.  </label>
                                <label class="pull-left">
                                    <input type="radio" name="pres_result_gestsoc" checked  value="S">
                                    Si
                                </label>
                                <br>

                                <label class="pull-left">
                                    <input type="radio" name="pres_result_gestsoc"   value="N">
                                    No
                                </label>

                            </div>
                        </div>

                        <div class="form-inline">
                            <div class="form-control mt-3">
                                <label  for="cantidad">  Las líneas de crédito que ofrece su cooperativa se
                                    corresponden con las necesidades sociales reales de sus socios,
                                    empleados y directivos, sus familias y los miembros de la comunidad donde se encuentra insertada.
                                </label>
                                <div class="form-inline">
                                <label  >
                                    <input type="radio" name="linea_cred"  checked  value="S">
                                    Si
                                </label>
                                    <br>

                                <label class="mx-5">
                                    <input type="radio" name="linea_cred"    value="N">
                                    No
                                </label>
                            </div>

                            </div>

                        </div>

                        <hr>

                        <div class="form-horizontal ">
                            <label for="nece_soc" >A su juicio cuáles pudieran constituir necesidades sociales reales de la comunidad donde se encuentra insertada la cooperativa.</label>
                            <textarea cols="30" rows="4" placeholder="Necesidades sociales de la cooperativa " name="nece_soc" class="form-control"></textarea>

                        </div>
                        <div class="form-horizontal mt-2">
                            <label for="nece_soc_acc" >Acciones a desarrollar para lograr las nesecidades sociales </label>
                            <textarea cols="30" rows="4" placeholder="Diga las acciones para lograr las necesidades sociales de la cooperativa.. " name="nece_soc_acc" class="form-control"></textarea>
                        </div>
                        <div class="form-horizontal mt-2">
                            <label for="act_nin_jov" >Qué actividades pudiera realizar la cooperativa en función de los niños y jóvenes </label>
                            <textarea cols="35" rows="4" placeholder="Actividades que puede realizar la cooperativa en funcion de niños y jovenes... " name="act_nin_jov" class="form-control"></textarea>
                        </div>



                        <hr>

                            <div class="form-horizontal">
                                <label>Otros servicios  que usted considera, debería prestar la cooperativa</label>
                                <textarea cols="30" rows="4" placeholder="Necesidades sociales de la cooperativa " name="otroserv_coop" class="form-control"></textarea>

                            </div>
                            <br>

                            <div class="form-horizontal">
                                <label  > Manifieste cualquier otra idea que considere importante para el desarrollo de la  cooperativa</label>
                                <textarea cols="30" rows="4" placeholder="Actividades que puede realizar la cooperativa en funcion de niños y jovenes... " name="otra_idea_coop" class="form-control"></textarea>
                            </div>






                        <button type="submit" class="btn boton pull-right mt-2">Aceptar Encuesta</button>





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



        });


    </script>
@endsection