@extends('layouts.app')



@section('content')
    <br><br><br>

    <form action="/proyectos/create" method="post">
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
                <h3>Nuevo Programa</h3>

                <div class="form-group row">
                    <label for="exampleFormControlSelect1" class="col-sm-4 col-form-label">Año</label>
                    <div class="col-sm-3">
                        <select name="anno" id="ano" class="form-control" id="exampleFormControlSelect1">
                            <option value="0">********SELECCIONE********</option>
                            @foreach($ano as $a)
                                <option value="{{$a->id}}">{{$a->ano}}</option>
                            @endforeach

                        </select>
                    </div>
                </div>

                <input name="idcoop" id="idcoop" type="hidden" value="{{$id_coop}}">

                <div class="form-group row ">
                    <label for="nom" class="col-sm-4 col-form-label">Nombre</label>
                    <div class="col-sm-5">
                        <input name="nombre" type="text" id="nom" class="form-control">
                    </div>
                </div>
                <div class="form-group row ">
                    <label for="obj" class="col-sm-4 col-form-label">Objetivo</label>
                    <div class="col-sm-5">
                        <input name="objetivo" type="text" id="obj" class="form-control">
                    </div>
                </div>
                <div class="form-group row ">
                    <label for="met" class="col-sm-4 col-form-label">Metodología</label>
                    <div class="col-sm-5">
                        <input name="metodologia" type="text" id="met" class="form-control">
                    </div>
                </div>

                <div class="form-group row ">
                    <label for="pres" class="col-sm-4 col-form-label">Presupuesto</label>
                    <div class="col-sm-3">
                        <input name="presupuestoP" type="number" step="any" id="pres" min="0"   readonly="true" class="form-control">
                    </div>
                </div>
            </div>
        </div>


        <br><br>
        <div class="container">
            <button type="submit" class="btn boton float-right">Guardar</button>
            <a type="button" class="boton2 btn float-right mr-2" href="/proyectos">Atrás</a>

        </div>

    </form>




    {{-----------------------------------------------------------------------------------------------}}
    <script type="text/javascript">

        $(document).ready(function () {

            $("#ano").change(function (){

               var idano=$("#ano").val();
               var idcoop=$('#idcoop').val();
               //alert('/DispPresup/' + idano + '/'+idcoop);

               if(idano!=0) {

                   //hacer la peticion ajax para obtener el presupuesto

                   $.ajax({
                       type: 'GET',
                       url: '/DispPresup/' + idano + '/'+idcoop,
                       data: {
                           _token: '{{ csrf_token() }}',

                       },

                       success: function (data) {
                           var presup = data.presup;
                           $('#pres').val(presup);
                           $('#pres').attr('max', presup);
                           $('#pres').attr('readonly', false)


                       }, error: function () {
                           alert('Error en la conexión.')
                       }
                   });
               }
               else
               {
                   alert('No ha seleccionado el año correctamente');
               }


            });



        });


    </script>


@endsection