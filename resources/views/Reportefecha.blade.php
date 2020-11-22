@extends('layouts.app')

@section('content')
    <br><br>
<div class="container">
    <section class="tabla">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1 class="panel-title">Reporte de seguimientos por fecha de la cooperativa <strong>{{$cooperativa->nombre}}</strong></h1>
            </div>
            <div class="panel-body">
                <table class="table  table-bordered" id="tabla">
                    <thead>
                    <th>No</th>
                    <th>Programa</th>
                    <th>Presup. prog</th>
                    <th>Actividad</th>
                    <th>Responsable</th>
                    <th>Presup. act</th>
                    <th>Seguimiento</th>
                    <th>Presup. seg plan</th>
                    <th>NBF</th>
                    <th>Presup. seg real</th>
                    <th>NBR</th>
                    <th>Fecha real</th>
                    </thead>
                    <tbody>
                                {{$cont=1}}
                    @foreach($seguimientos->sortByDesc('fecha_real') as $k => $seg)
                        <tr>
                        <td>{{$cont++ }}</td>
                            <td>{{$seg->GetMeta->Programa->nomb_prog}}</td>
                            <td>{{$seg->GetMeta->Programa->presupuesto_prog}}</td>
                            <td>{{$seg->GetMeta->desc_unid_fisicas}}</td>
                            <td>{{$seg->GetMeta->responsable}}</td>
                            <td>{{$seg->GetMeta->presupuesto}}</td>

                            <td>{{$seg->descripcion}}</td>
                            <td>{{$seg->presup_con}}</td>
                            <td>{{$seg->num_benef_planif}}</td>
                            <td>{{$seg->presup_real}}</td>
                            <td>{{$seg->num_beneficiarios_real}}</td>
                            <td>{{$seg->fecha_real}}</td>




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