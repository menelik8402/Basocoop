@extends('layouts.app')

@section('content')
    @if($nombre=='no')
        <div class="col-5 m-lg-5">
            <form action="/logincoop" class="form-control" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="nombre">Entre el nombre de la cooperativa</label>
                    <input name="nombre" type="text">
                </div>
                <div align="center">
                    <button type="submit" class="btn btn-success">Aceptar</button>
                </div>
            </form>
        </div>
    @else
        <div class="container " id="inicio">
            <div class="justify-content-center" >
                <h1 id="nomcoop" class="display-4 "align="center"  >{{$nombre->nombre}}</h1>

            </div>
        </div>

        {{--<p>{{$nombre->nombre}}</p>--}}
    @endif
@endsection
