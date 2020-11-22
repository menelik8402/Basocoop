@extends('users.federativo.perfil')

@section('content')
    <div class="container">
        <section class="tabla">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title">Cooperativas</h1>
                </div>
                <div class="panel-body">
                    <table class="table  table-bordered justify-content-center" id="tabla">
                        <thead>
                        <th>No:</th>
                        <th class="justify-content-center">Nombre </th>
                        <th class="justify-content-center">Direccion </th>
                        <th class="justify-content-center">Municipio </th>
                        <th class="justify-content-center">Departamento </th>

                        </thead>
                        <tbody>
                        @foreach($coops as $coop)
                            <tr>
                                <td>{{$loop->index +1}}</td>
                                <td>{{$coop->nombre}}</td>
                                <td>{{$coop->direccion}}</td>
                                <td>{{$coop->municipio}}</td>
                                <td>{{$coop->provincia}}</td>
                                 </tr>
                        @endforeach
                        </tbody>

                    </table>


                </div>
                <div class="panel-footer">
                    {{--<a  href="/AddPrograma" class="btn boton pull-right">Nuevo Programa</a>--}}
                    {{--<a data-toggle="modal" data-target="#modal" href="#" class="btn btn-primary pull-right">Nuevo--}}
                    {{--Programa</a>--}}
                </div>
            </div>
        </section>

    </div>
    @endsection