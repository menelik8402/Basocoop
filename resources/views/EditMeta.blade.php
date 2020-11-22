@extends('layouts.app')



@section('content')

    @if($mensaje_error!='Si')
        <div class="alert alert-success" id="alerta"  role="alert">
           {{$mensaje_error}}
        </div>
        @endif
    <br><br><br>
    <form action="/meta/edit" method="post">
        {{csrf_field()}}

        <div class="container card">
            @if(count($errors)>0)
                <div class="alert alert-danger alert-dismissable fade show" role="alert" >
                    <button type="button" class="close" datadismiss="alert">&times;</button>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card-body">
                <h3>Actividad</h3>
                <div class="form-group row ">
                    <label for="uniF" class="col-sm-4 col-form-label">Descripción de Actividad</label>
                    <div class="col-sm-5">
                        <input name="descUnidadesFisicas"  value="{{$metas->desc_unid_fisicas}}" type="text" id="uniF" class="form-control">
                    </div>
                </div>
                <div class="form-group row ">
                    <label for="pre" class="col-sm-4 col-form-label">Presupuesto</label>
                    <div class="col-sm-3">
                        <input name="presupuesto"  value="{{$metas->presupuesto}}"  type="number" id="pre" class="form-control">
                    </div>
                </div>

                <div class="form-group row ">
                    <label for="resp" class="col-sm-4 col-form-label">Responsable</label>
                    <div class="col-sm-5">
                        <input name="id" type="hidden" value="{{$metas->id}}" id="idPrograma" class="form-control">
                        <input name="responsable"  value="{{$metas->responsable}} " type="text" id="resp" class="form-control">
                    </div>
                </div>

                <input name="manifNum"  hidden value="{{$metas->manif_num}}" value="0" type="number" id="mn1" class="form-control">
                {{--<div class="form-group row ">--}}
                    {{--<label for="mn1" class="col-sm-4 col-form-label">Manifestaciones Numéricas</label>--}}
                    {{--<div class="col-sm-3">--}}
                       {{----}}
                    {{--</div>--}}
                {{--</div>--}}
                <div class="form-group row ">
                    <label for="uniFi" class="col-sm-4 col-form-label">Unidades Fisicas Planificadas</label>
                    <div class="col-sm-3">
                        <input name="planUF" value="{{$metas->unid_fisicas_plan}}"  type="number" id="uniFi" class="form-control">
                    </div>
                </div>
                <div class="form-group row ">
                    <label for="benp" class="col-sm-4 col-form-label">Número de Beneficiarios Planificados</label>
                    <div class="col-sm-3">
                        <input name="beneficiosPlan" value="{{$metas->beneficiarios_plan}}" type="number" id="benp" class="form-control">
                    </div>
                </div>
                <input name="fechaCumplimiento" hidden value="{{$metas->fecha_cumplimiento}}" type="text" id="fecha" class="form-control">
                {{--<div class="form-group row ">--}}
                    {{--<label for="fecha" class="col-sm-4 col-form-label">Fecha de Cumplimiento</label>--}}
                    {{--<div class="col-sm-3">--}}
                       {{----}}
                    {{--</div>--}}
                {{--</div>--}}

            </div>

        </div>
        <br><br>
        <div class="container">
            <button type="submit" id="editar"  class="btn boton float-right">Editar</button>
            <a type="button" class="boton2 btn float-right mr-2" href="/Meta/{{$metas->id_programa}}">Atrás</a>

        </div>

    </form>


    <script>

        var tabla = $('#tabla');
        var tablaDT;
        var añadir;


        // estas variables son paa modificar una membresia aqui se guardan los id



        $(document).ready(function () {
           // tablaDT = tabla.DataTable();



            //se verifica que en cada envnto focus de salida de los input no stn vacios
            $('input').focusout(function () {
                // alert('cambio')


                if($(this).attr('type')=='number'){
                    if($(this).val().trim() ===''){

                        alert('campo requerido');
                    }

                }

            })

            //
         /*   $('input').keypress(function(event) {

                if($(this).attr('type')!=key(event,'number')){
                    alert('Numero requerido');

                }


            })*/

            function key(event,tipo) {
                //lista de teclas para los numeros
                array = new Array(48,49,50,51,52,53,54,55,56,57);

                if(tipo=='number'){

                    for(i=0;i<array.length;i++) {
                        if (event.which == array[i]) {
                            return 'number'
                            //event.preventDefault();
                        }


                    }

                }

            }




        });
    </script>


@endsection