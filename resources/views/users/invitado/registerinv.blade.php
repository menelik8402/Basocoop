@extends('users.invitado.admin')

@section('content')

    <br><br>
<div class="row justify-content-center ">
    <div class="col-xs-8 col-xs-offset-3">
        <div class="panel panel-danger">
            <div class="panel-heading"> <div class="panel-title" style="text-align: center">Registrar Usuario</div></div>
            <div class="panel-body ">


                <form action="/Nuevo/Usuario" method="post" class="form-horizontal" >
                    {{csrf_field()}}
                    <br>
                <div class="form-group @if($errors->has('name')) border-danger @endif">
                    <label for="name"  class="control-label col-xs-2" >Nombre y Apellidos</label>
                    <div class="col-xs-6 ">
                        <input type="text"  id="name" name="name" class="form-control @if($errors->has('name')) border-danger @endif">
                    </div>
                    @foreach($errors->get('name') as $error)
                        <div class="form-control-feedback text-danger">{{$error}}</div>
                    @endforeach

                </div>
                <div class="form-group @if($errors->has('name')) border-danger @endif">
                    <label for="ci"  class="control-label col-xs-2" >DUI</label>
                    <div class="col-xs-6 ">
                        <input type="text"  id="ci" name="ci" maxlength="11" class="form-control">
                    </div>
                    @foreach($errors->get('ci') as $error)
                        <div class="form-control-feedback text-danger">{{$error}}</div>
                    @endforeach
                </div>
                <div class="form-group ">
                    <label for="email" class="control-label col-xs-2" >Email</label>
                    <div class="col-xs-6  @if($errors->has('email')) border-danger @endif">
                        <input type="email"  id="email" name="email" class="form-control">
                    </div>
                    @foreach($errors->get('email') as $error)
                        <div class="form-control-feedback text-danger">{{$error}}</div>
                    @endforeach
                </div>
                <div class="form-group  ">
                    <label for="login" class="control-label col-xs-2" >Login</label>
                    <div class="col-xs-6  @if($errors->has('login')) border-danger @endif">
                        <input type="text"  id="login" name='login' class="form-control">

                    </div>
                    @foreach($errors->get('login') as $error)
                        <div class="form-control-feedback text-danger">{{$error}}</div>
                    @endforeach
                </div>
                <div class="form-group ">
                    <label for="password" class="control-label col-xs-2" >Clave</label>
                    <div class="col-xs-6 @if($errors->has('password')) border-danger @endif ">
                        <input type="password"  id="password" name='password' class="form-control">

                    </div>
                    @foreach($errors->get('password') as $error)
                        <div class="form-control-feedback text-danger">{{$error}}</div>
                    @endforeach
                </div>
                <div class="form-group  ">
                    <label for="password_confir" class="control-label col-xs-2" > Confirmación Clave</label>
                    <div class="col-xs-6 @if($errors->has('password_confir')) border-danger @endif">
                        <input type="password"  id="password_confir" name='password_confir' class="form-control">

                    </div>
                    @foreach($errors->get('password_confir') as $error)
                        <div class="form-control-feedback text-danger">{{$error}}</div>
                    @endforeach
                </div>


                <div class="form-group ">
                    <label for="id_rol" class="control-label col-xs-2" >Seleccione un Rol</label>
                    <div class="col-xs-6  @if($errors->has('id_rol')) border-danger @endif ">
                        <select id="id_rol" name="id_rol" class="form-control" readonly="true" value="Invitado">
                            @foreach($roles as $rol)
                                @if($rol->nomb_rol=='Invitado')
                                <option value="{{$rol->id}}" selected>{{$rol->nomb_rol}}</option>
                               {{-- @else
                                    <option value="{{$rol->id}}" >{{$rol->nomb_rol}}</option>--}}
                                @endif
                            @endforeach
                        </select>
                    </div>
                    @foreach($errors->get('id_rol') as $error)
                        <div class="form-control-feedback text-danger">{{$error}}</div>
                    @endforeach
                </div>
                <div class="form-group ">
                    <label for="nom"  class="control-label col-xs-2">Seleccione la Institución</label>
                    <div class="col-xs-6  @if($errors->has('id_coop')) border-danger @endif">
                        <select id="id_coop" name="id_coop"  class="form-control">
                            <option value="0" selected="selected">----------SELECCIONE----------</option>
                            @foreach($coops as $coop)
                                <option value="{{$coop->id}}">{{$coop->nombre}}</option>
                            @endforeach
                        </select>

                    </div>
                    @foreach($errors->get('id_coop') as $error)
                        <div class="form-control-feedback text-danger">{{$error}}</div>
                    @endforeach
                </div>

                <div class="form-group row">
                    {{--  <input name="password" id="password" type="hidden" value="{{bcrypt('admin.,30')}}">--}}
                    <input name="primeravez" id="primeravez" type="hidden" value="{{'S'}}">
                    {{-- <input name="logueado" id="logueado" type="hidden" >--}}
                    <input name="fecha_act_psw" id="fecha_act_psw" type="hidden" value="{{date('Ymd')}}">
                </div>


                <div class="form-group row">
                    <button class="boton"  type="submit" id="invitado">Aceptar       </button>

                </div>

            </form>
            </div>
        </div>
    </div>
</div>



    @endsection