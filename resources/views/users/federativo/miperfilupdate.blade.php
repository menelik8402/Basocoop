@extends('users.federativo.perfil')

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
            <div class="card-header">Mi Perfil</div>
            <div class="card-body">


                <form role="form" action="/miperfil/update" method="post">
                    {{csrf_field()}}
                    <div class="form-inline">


                        <div class="form-group ">
                            <label for="name">Name :</label>
                            <div class="col-sm-10">
                                <input type="text"  id="name" name="name" value="{{$user->name}}" class="form-control">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="email" >Email :</label>
                            <div class="col-sm-10">
                                <input type="email"  id="email" name="email" value="{{$user->email}}" class="form-control">
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="email" >Carnet :</label>
                            <div class="col-sm-10">
                                <input type="text"  id="ci" name="ci" value="{{$user->ci}}" class="form-control">
                            </div>
                        </div>
                    </div>



                    <div class="form-inline">
                        <div class="form-group ">
                            <label for="login">Login :</label>
                            <div class="col-sm-10">
                                <input type="text"  id="login" name="login" placeholder="El cambio del login tendra efecto cuando vuelva a ingresar al sistema." value="{{$user->login}}" class="form-control">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="created_at" >Fecha creación :</label>
                            <div class="col-sm-10">
                                <input type="text" readonly id="created_at" name="created_at" value="{{$user->created_at}}" class="form-control">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="updated_at" >Fecha Act:</label>
                            <div class="col-sm-10 mx-0">
                                <input type="text" readonly id="updated_at" name="updated_at" value="{{$user->updated_at}}" class="form-control">
                            </div>
                        </div>
                    </div>



                <br><br>
                <div >
                    <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn boton" type="submit" >Aceptar</button>

                    </div>
                </div>
                </form>

            </div>
        </div>
    </div>




@endsection