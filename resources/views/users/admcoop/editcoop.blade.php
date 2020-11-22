@extends('users.admcoop.admin')

@section('content')


    <br><br>

    @if(count($errors)>0)
        <div class="alert alert-danger alert-dismissable fade show" role="alert" >
            <button type="button" class="close" datadismiss="alert">&times;</button>
            <ul>
                @foreach($errors->all() as $item => $error)
                    <li>{{$error}}</li>

                @endforeach
            </ul>
        </div>
    @endif
    <div class="row justify-content-center" >

        <div class="card">
            <div class="card-header">Cooperativa</div>
            <div class="card-body">
                <form action="/cooperativa/update" method="post">
                    {{csrf_field()}}
                <div class="form-inline">

                    <div class="form-group row">
                        <label for="nombre" class="col-sm-2 offset-1 ">Nombre :</label>
                        <div class="col-sm-5">
                            <input type="text" id="nombre" name="nombre"  value="{{$coop->nombre}}"  class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="municipio" class="col-sm-2 offset-1 ">Municipio :</label>
                        <div class="col-sm-5">
                            <input type="text" id="municipio" name="municipio" value="{{$coop->municipio}}" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="provincia" class="col-sm-2 offset-1">Provincia :</label>
                        <div class="col-sm-5">
                            <input type="text" id="provincia" name="provincia" value="{{$coop->provincia}}" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="direccion" class="col-sm-2 ">Dirección :</label>
                    <div class="col-sm-12">
                        <textarea id="direccion" name="direccion" cols="10" class="form-control">{{$coop->direccion}}</textarea>
                    </div>
                </div>




                <div >
                    <div class="container">
                        <button class="btn boton float-right" type="submit" >Aceptar</button>

                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>




@endsection