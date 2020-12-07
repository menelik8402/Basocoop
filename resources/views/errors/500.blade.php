@extends('errors.error')

@section('content')
    <br><br><br><br>
    <div class="row justify-content-center">
        <div class="alert alert-danger col-sm-8 " id="alerta"  role="alert">
            Ha ocurrido un error , por favor contacte al administrador del sistema .<a href="/logout" >Haz clic aquí</a>
        </div>
    </div>
@endsection