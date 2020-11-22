@extends('layouts.app')
{{--{{dd($metas)}}--}}


@section('content')
    <br><br><br>
    <form action="/proyectos/edit" method="post">
        {{csrf_field()}}

            <div class="container card">
                @if(count($errors)>0)
                    <div class="alert alert-danger alert-dismissable fade show" role="alert" >
                        <button type="button" class="close" datadismiss="alert">&times;</button>
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            <div class="card-body">
                <h3>General</h3>

                <div class="form-group row">
                    <label for="exampleFormControlSelect1" class="col-sm-4 col-form-label">Año</label>
                    <div class="col-sm-3">
                        <select name="anno" id="ano" class="form-control" readonly>
                           {{-- @foreach($ano as $a)--}}
                                <option value="{{$proy->Ano->id}}">{{$proy->Ano->ano}}</option>
                         {{--   @endforeach--}}

                        </select>
                       {{-- <input type="text" id="ano" name="anno" value="{{$proy->Ano->ano}}"  readonly class="form-control">--}}
                    </div>
                </div>

                {{--<div class="form-group row ">--}}
                {{--<label for="anno" class="col-sm-4 col-form-label">Año</label>--}}
                {{--<div class="col-sm-5">--}}
                {{--<input name="anno" type="text" id="nom" class="form-control">--}}
                {{--</div>--}}
                {{--</div>--}}




                <div class="form-group row ">
                    <label for="nom" class="col-sm-4 col-form-label">Nombre</label>
                    <div class="col-sm-5">
                        <input name="id" value="{{$proy->id}}" hidden id="nom" class="form-control">

                        <input name="nombre" value="{{$proy->nomb_prog}}" type="text" id="nom" class="form-control">
                    </div>
                </div>
                <div class="form-group row ">
                    <label for="obj" class="col-sm-4 col-form-label">Objetivo</label>
                    <div class="col-sm-5">
                        <input name="objetivo"  value="{{$proy->objetivo}}" type="text" id="obj" class="form-control">
                    </div>
                </div>
                <div class="form-group row ">
                    <label for="met" class="col-sm-4 col-form-label">Metodología</label>
                    <div class="col-sm-5">
                        <input name="metodologia"  value="{{$proy->metodologia}}" type="text" id="met" class="form-control">
                    </div>
                </div>

                <div class="form-group row ">
                    <label for="pres" class="col-sm-4 col-form-label">Presupuesto</label>
                    <div class="col-sm-3">
                        <input name="presupuestoP"  value="{{$proy->presupuesto_prog}}" type="number" id="pres" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <br><br>

        <br><br>
        <div class="container">
            <button type="submit" class="btn boton float-right">Editar</button>
            <a type="button" class="boton2 btn float-right mr-2" href="/proyectos">Atrás</a>

        </div>

    </form>


@endsection