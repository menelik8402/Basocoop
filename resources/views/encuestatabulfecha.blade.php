
@extends('layouts.app')

@section('content')
    <br><br>
    <div class="row justify-content-center">
    <div class="col-sm-8 alert alert-success  " align="center" id="alerta"  role="alert">
        La tabulación de las encuenstas son realizadas en el periódo especificado por usted.
    </div>
    </div>
    <div class="row justify-content-center">
        <div class="card  ">
            <div class="card-header">   Seleccione las fechas  </div>
            <div class="card-body">
                <form method="get" action="/tabular">

                <table class="table ">
                    <thead>
                    {{-- <th>Fecha</th>


                     </thead>--}}
                    <tbody>
                    <tr>
                        <td>
                            Fecha inicial:
                        </td>

                        <td>
                            <input type="date" name="fecha" id="fecha" class="form-control @if($errors->has('fecha')) border-danger @endif">
                            @foreach($errors->get('fecha') as $error)
                                <div class="form-control-feedback text-danger">{{$error}}</div>
                            @endforeach

                        </td>
                        <td>
                            Fecha final:
                        </td>

                        <td>
                            <input type="date" name="fechafin" id="fechafin" class="form-control @if($errors->has('fechafin')) border-danger @endif">
                            @foreach($errors->get('fechafin') as $error)
                                <div class="form-control-feedback text-danger">{{$error}}</div>
                            @endforeach

                        </td>
                    </tr>
                    <tr>

                    <td colspan="4"><button class="btn boton pull-right " type="submit" href="#" ><i class="fa fa-check"></i> Aceptar</button>   </td>
                    </tr>
                    </tbody>


                </table>
                </form>

            </div>
        </div>

    </div>
@endsection