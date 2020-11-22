@extends('layouts.app')
@section('content')
    <br><br>


    <div class="row justify-content-center">
        <div class="card  ">
            <div class="card-header">   Balance social cooperativo por seguimientos de actividades </div>
            <div class="card-body">
                <table class="table  {{--table-bordered --}}table-sm table-hover tabla">
                    <thead>
                    <th>Años</th>
                    <th>Balance</th>
                    </thead>
                    <tbody>
                    @foreach($anos as $ano)
                        <tr>
                            <td>{{$ano->ano}} </td>
                            <td><a class="btn boton " href="/seg/{{$ano->id}}"><i class="fa fa-check"></i> Generar Balance</a>   </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>




    <script>

        var tabla = $('#tabla');
        var tablaDT;



        $(document).ready(function () {
            tablaDT = tabla.DataTable();





        });
    </script>





@endsection