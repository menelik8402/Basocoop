@extends('layouts.app')

@section('content')


    <br><br>
   {{-- @if(count($errors)>0)
        <div class="alert alert-danger alert-dismissable fade show" role="alert" >
            <button type="button" class="close" datadismiss="alert">&times;</button>
            <ul>
                @foreach($errors->all() as $item => $error)
                    <li>{{$error}}</li>

                @endforeach
            </ul>
        </div>
    @endif--}}

    <div class="row justify-content-center" >
        <div class="card">
            <div class="card-header"><strong style="align-content: center ">  Cambiar contraseña </strong></div>
            <div class="card-body">

               <form action="/cambiar/clave/segura" method="post">
                   {{csrf_field()}}
                   <div class="form-group  ">
                       <label for="clave" >Clave actual :</label>

                       <input type="password"  id="clave" name="clave"  class="form-control @if($errors->has('clave')) border-danger @endif ">
                       @foreach($errors->get('clave') as $error)
                           <div class="form-control-feedback text-danger">{{$error}}</div>
                       @endforeach

                   </div>
                    <div class="form-group ">
                        <label for="clavenv" >Nueva clave :</label>

                            <input type="password"  id="clavenv" name="clavenv"  class="form-control @if($errors->has('clavenv')) border-danger @endif ">
                            @foreach($errors->get('clavenv') as $error)
                                <div class="form-control-feedback  text-danger">{{$error}}</div>
                            @endforeach

                    </div>
                    <div class="form-group ">
                        <label for="claveconfir" >Confirma Nueva clave :</label>

                            <input type="password"  id="claveconfir" name="claveconfir"  class="form-control @if($errors->has('claveconfir'))  border-danger @endif">
                        @foreach($errors->get('claveconfir') as $error)
                            <div class="form-control-feedback text-danger">{{$error}}</div>
                        @endforeach

                    </div>






                <div >
                    <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn boton col-lg-12" type="submit">Aceptar</button>

                    </div>
                </div>
               </form>
            </div>
        </div>
    </div>




@endsection