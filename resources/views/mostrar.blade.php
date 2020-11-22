@extends('layouts.app')



@section('content')
    <br><br>
    <div class="container">
        <section class="tabla">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title">Encuestas</h1>
                </div>
                <div class="panel-body">
                    <table class="table  table-bordered" id="tabla">
                        <thead>
                        <th>Nombre de la Encuesta</th>
                        <th class="pull-right">Opciones</th>
                        </thead>
                        <tbody>
                        @foreach($enc as $p)
                            <tr>
                                <td>{{$p->nombre}}</td>

                                <td>
                                    <button onclick="editar({{$p}})" class="boton btn"><i class="fa fa-edit"></i> Completar</button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection


