@extends('errors.error')

@section('content')
    <br><br><br><br>
  <div class="row justify-content-center">
    <div class="alert alert-danger col-sm-8 " id="alerta"  role="alert">
        Usted no tiene los accesos establecidos corretamente, por favor contacte con el administrador de la cooperativa.<a href="/logout" >Haz clic aquí</a>
    </div>
  </div>
    @endsection