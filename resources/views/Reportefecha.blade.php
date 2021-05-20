@extends('layouts.app')

@section('content')
    <br><br>
<div class="container">
    <section class="tabla">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1 class="panel-title">Reporte por programas  <strong>{{$cooperativa->nombre}}</strong> </h1>
            </div>
            <div class="panel-body">
                <table class="table   table-sm table-hover tabla" id="tabla">
                 
                 @foreach($seguimientos as $k => $seg)    
               
                  @if($nombreporgrama!=$seg->GetMeta->Programa->nomb_prog)
                  <thead  class="thead-light">
                            
                            </thead>
                  <tr><td colspan="10" align="center">
                  <div class="alert alert-info id="alerta"  role="alert">
                     Datos de programa {{$seg->GetMeta->Programa->nomb_prog}} con un presupuesto aprobado {{$seg->GetMeta->Programa->presupuesto_prog}}
                    </div>
                 
                 </td></tr>
                        <thead  class="thead-light">
                            <th>No</th>
                        
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
                           <?php  $nombreporgrama=$seg->GetMeta->Programa->nomb_prog ;
                                $descunid_fisicas='vacio';
                                $resposable ='vacio';
                                $cont=1;
                             
                           ?>
                            
                        @else
                        @endif
                             <tbody>           
                        
                                <tr>
                               {{-- <td>{{$k }}</td>--}}
                               <td>{{$cont++ }}</td>
                                    <td> {{  $descunid_fisicas!=$seg->GetMeta->desc_unid_fisicas ?  $descunid_fisicas=$seg->GetMeta->desc_unid_fisicas : "Se mantiene"  }}    </td>

                                    <td>{{ $resposable!= $seg->GetMeta->responsable ?  $resposable= $seg->GetMeta->responsable : "Se mantiene" }}</td>
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