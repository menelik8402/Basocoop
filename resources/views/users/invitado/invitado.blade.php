@extends('users.invitado.admin')

@section('content')

    <br><br>


<div class="container">
    <form   action="/encuestastatic"  method="get" >
                        {{csrf_field()}}

<div class="row justify-content-center" >
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="panel-title"><h6> Seleccione su cooperativa para realizar la encuesta.</h6></div>
                            </div>
                            <div class="panel-body justify-content-center" align="center">

                                <select name="coop" class="form-control col-sm-6" >
                                    @foreach($coops as $coop)
                                        <option value="{{$coop->id}}">{{$coop->nombre}}</option>
                                    @endforeach
                                </select>
                                <button  type="submit"  class="btn boton mt-5 ">Aceptar</button>
                            </div>

                        </div>

</div>


                    </form>


</div>

@endsection