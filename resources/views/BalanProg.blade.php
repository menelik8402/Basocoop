@extends('layouts.app')
@section('content')
    <br><br>





            <div class="row justify-content-center">
                <div class="card  ">
                    <div class="card-header">   Balance social cooperativo por programas sociales  </div>
                    <div class="card-body">
                        <table class="table  {{--table-bordered--}} table-sm table-hover tabla">
                       <thead>
                        <th>Años</th>
                        {{--<th>Indicadores</th>--}}
                       <th>Balance</th>
                       </thead>
                      <tbody>
                            @foreach($anos as $ano)
                                <tr>
                                    <td>{{$ano->ano}} </td>
                                    {{--<td>--}}
                                        {{--<span class="form-control"><a href="#">Indicadores del año : {{$ano->ano}}</a></span>--}}
                                    {{--</td>--}}
                                    @if($ind==null)
                                    <td><a class="btn boton " href="/generar/{{$ano->id}}"><i class="fa fa-check"></i> Generar Balance</a>   </td>
                                    @else
                                        <td><a class="btn boton " href="/generar/{{$ano->id}}/{{$id_coop}}/{{$ind}}"><i class="fa fa-check"></i> Generar Balance</a>   </td>
                                    @endif
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