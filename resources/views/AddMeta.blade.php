@extends('layouts.app')



@section('content')

    <br><br><br>
    <form action="/metas/create" method="post">
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
                        <input name="descUnidadesFisicas" type="text" id="uniF" class="form-control">
                    </div>
                </div>
                <div class="form-group row ">
                    <label for="pre" class="col-sm-4 col-form-label">Presupuesto</label>
                    <div class="col-sm-3">
                        <input name="presupuesto" type="number" id="pre" min="0" step="any" value="{{$presup_disp}}" max="{{$presup_disp}}" class="form-control">
                    </div>
                </div>
                <div class="form-group row ">
                    <label for="resp" class="col-sm-4 col-form-label">Responsable</label>
                    <div class="col-sm-5">
                        <input name="idProg" type="hidden" value="{{$proy->id}}" id="idPrograma" class="form-control">
                        <input name="responsable" type="text" id="resp" class="form-control">
                    </div>
                </div>
                <input name="manifNum" hidden type="number" min="0" id="mn1" class="form-control">


                <div class="form-group row ">
                    <label for="uniFi" class="col-sm-4 col-form-label">Unidades Físicas Planificadas</label>
                    <div class="col-sm-3">
                        <input name="planUF" type="number"  min="0" id="uniFi" class="form-control">
                    </div>
                </div>
                <div class="form-group row ">
                    <label for="benp" class="col-sm-4 col-form-label">Número de Beneficiarios Planificados</label>
                    <div class="col-sm-3">
                        <input name="beneficiosPlan" type="number" min="0" id="benp" class="form-control">
                    </div>
                </div>
                <input name="fechaCumplimiento" hidden type="date" id="fecha" class="form-control">
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
            <button type="submit" class="btn boton float-right">Guardar</button>
            <a type="button" class="boton2 btn float-right mr-2" href="/proyectos">Atrás</a>

        </div>

    </form>

    <script>

        var tabla = $('#tabla');
        var tablaDT;


        $(document).ready(function () {


            if($(this).attr('type')=='number'){
                if($(this).val().trim() ===''){

                    alert('campo requrido');
                }

            }







        });
    </script>

@endsection