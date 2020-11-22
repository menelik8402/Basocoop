@extends('users.federativo.perfil')

@section('content')


    <br><br>


    <div class="row justify-content-center" >
        <div class="card">
            <div class="card-header">Mi Perfil</div>
            <div class="card-body">


<form role="form">

                <div class="form-inline">


                    <div class="form-horizontal ">
                        <label for="name" class="control-label pull-left">Name :</label>
                        <div class="col-sm-10">
                            <input type="text" readonly id="name" name="name" value="{{$user->name}}" class="form-control">
                        </div>
                    </div>
                    <div class="form-horizontal ">
                        <label for="email"  class="control-label pull-left">Email :</label>
                        <div class="col-sm-10">
                            <input type="email" readonly id="email" name="email" value="{{$user->email}}" class="form-control">
                        </div>
                    </div>

                    <div class="form-horizontal ">
                        <label for="email" class="control-label pull-left" >Carnet :</label>
                        <div class="col-sm-10">
                            <input type="text" readonly id="ci" name="ci" value="{{$user->ci}}" class="form-control">
                        </div>
                    </div>
                </div>



    <div class="form-inline">
                    <div class="form-horizontal ">
                        <label for="login" class="control-label pull-left">Login :</label>
                        <div class="col-sm-10">
                            <input type="text" readonly id="login" name="login" value="{{$user->login}}" class="form-control">
                        </div>
                    </div>
                    <div class="form-horizontal ">
                        <label for="created_at" class="control-label pull-left">Fecha creación :</label>
                        <div class="col-sm-10">
                            <input type="text" readonly id="created_at" name="created_at" value="{{$user->created_at}}" class="form-control">
                        </div>
                    </div>
                    <div class="form-horizontal ">
                        <label for="updated_at"  class="control-label pull-left">Fecha Act:</label>
                        <div class="col-sm-10 mx-0">
                            <input type="text" readonly id="updated_at" name="updated_at" value="{{$user->updated_at}}" class="form-control">
                        </div>
                    </div>
</div>

                </form>


                <br><br>
                <div >
                    <div class="col-lg-offset-2 col-lg-10">
                        <a class="btn boton" href="{{url('/main')}}" >Aceptar</a>
                        <a class="btn boton" href="{{url('/userpefil/editar')}}" >Editar </a>
                    </div>
                </div>

            </div>
        </div>
    </div>




@endsection