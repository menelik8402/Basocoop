@extends('users.federativo.perfil')
@section('content')
    <div class="container">
        <section class="tabla">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title">Educación Formación e Información</h1>
                </div>
                <div class="panel-body">
                    <form action="/InfoEfiFed" method="get">
                        <div class="form-inline ">
                            <label  class=" pull-left">Cooperativa :</label>
                            <div CLASS=" @if($errors->has('coop')) border-danger @endif">
                                <select id="coop" name="coop" disabled class="form-control">
                                    <option value="0">-------SELECCIONE-------</option>
                                    @foreach($coops as $coop)
                                        <option value="{{$coop->id}}">{{$coop->nombre}}</option>
                                    @endforeach
                                </select>
                                @foreach($errors->get('coop') as $error)
                                    <div class="form-control-feedback text-danger">{{$error}}</div>
                                @endforeach

                            </div>
                            {{-- </div>

                             <div class="form-group row ">--}}
                            <label  class=" mx-3 pull-left">Año :</label>
                            <div CLASS="@if($errors->has('ano')) border-danger @endif">
                                <select id="ano" name="ano"  disabled class="form-control">
                                    <option value="0">-------SELECCIONE-------</option>
                                    {{-- @foreach($annos as $ano)
                                         <option value="{{$ano->id}}">{{$ano->ano}}</option>
                                     @endforeach--}}
                                </select>
                                @foreach($errors->get('ano') as $error)
                                    <div class="form-control-feedback text-danger">{{$error}}</div>
                                @endforeach
                            </div>
                            <button href="#"  class="btn btn-primary mx-2">  Aceptar</button>

                        </div>

                    </form>







                </div>
                <div class="panel-footer">
                    {{--<a  href="/AddPrograma" class="btn boton pull-right">Nuevo Programa</a>--}}
                    {{--<a data-toggle="modal" data-target="#modal" href="#" class="btn btn-primary pull-right">Nuevo--}}
                    {{--Programa</a>--}}
                </div>

            </div>

        </section>
    </div>



    <script type="text/javascript">
        var tabla = $('#tabla');
        var tablaDT;

        var cargar=false;

        $(document).ready(function () {
            $('#coop').prop('disabled', false);

            $('#coop').change(function () {

                var coop= $('#coop').val();


                if(coop!=0) {
                    $.ajax({
                        type: 'get',
                        url: '/coop/indicad/' + coop+ '/EFI',
                        data: {
                            _token: '{{ csrf_token() }}',

                        },

                        success: function (data) {
                            $('#ano').prop('disabled', false);
                            if(cargar==false) {
                                for ($i = 0; $i < data.lista_anos.length; $i++) {


                                    $('#ano').append("<option value='" + data.lista_anos[$i].id + "'>" + data.lista_anos[$i].ano + "</option>");
                                }
                                cargar=true;
                            }



                        }, error: function () {
                            alert('Error cargando los datos')
                        }
                    });
                }
                else{
                    alert('No ha seleccionado la cooperativa correcta');
                }

            });


            $('#ano').change(function () {

                if($('#coop').val()==0){
                    alert('Seleccione un valor para el año correctamente');
                }


            });







        });
    </script>
@endsection