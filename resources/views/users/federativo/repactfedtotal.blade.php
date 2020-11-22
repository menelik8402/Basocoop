@extends('users.federativo.perfil')

@section('content')
    <br><br>
    @foreach($cooperativas as $cooper)
    <div class="container">
        <section class="tabla">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title">Reporte de Programas por fecha de la cooperativa <strong>{{$cooper->nombre}}</strong></h1>
                </div>
                <div class="panel-body">
                    <table class="table  table-bordered" id="tabla">
                        <thead>
                        <th>No</th>
                        <th>Programa</th>
                        <th>Actividad</th>
                        <th>Responsable</th>
                        <th>Fecha</th>
                        </thead>
                        <tbody>
                        @foreach($cooper->Programas as $prog)
                            @foreach($prog->Metas as $k => $meta)

                                <tr>
                                    <td>{{$k +1 }}</td>
                                    <td>{{$meta->desc_unid_fisicas}}</td>
                                    <td>{{$meta->responsable}}</td>
                                    <td>{{$prog->nomb_prog}}</td>
                                    <td>{{$meta->created_at}}</td>


                                </tr>
                            @endforeach
                        @endforeach
                        </tbody>

                    </table>
                </div>

            </div>
        </section>
    </div>
        <br><br>

    @endforeach

@endsection