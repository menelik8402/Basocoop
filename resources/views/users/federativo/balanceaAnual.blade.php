@extends('users.federativo.perfil')
@section('content')

    <section class="tabla">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1 class="panel-title">Balances Cooperativos de todas las Cooperativas</h1>
            </div>
            <div class="panel-body">
                <form action="/balance/federativo/total" method="get">

                    <div class="form-inline justify-content-center ">

                        <label  class=" mx-3 pull-left">Año :</label>
                        <div CLASS="@if($errors->has('ano')) border-danger @endif">
                            <select id="ano" name="ano"  class="form-control">
                                <option value="0">-------SELECCIONE-------</option>
                                 @foreach($annos as $ano)
                                     <option value="{{$ano->id}}">{{$ano->ano}}</option>
                                 @endforeach
                            </select>
                            @foreach($errors->get('ano') as $error)
                                <div class="form-control-feedback text-danger">{{$error}}</div>
                            @endforeach
                        </div>
                        <button type="submit"  class="btn btn-primary mx-2">  Aceptar</button>
                        {{-- <button href="#"  class="btn btn-success mx-3">  Imprimir</button>
                         <button href="#"  class="btn btn-success  mx-2">  Descargar PDF</button>
 --}}


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

@endsection