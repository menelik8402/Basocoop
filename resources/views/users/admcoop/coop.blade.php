@extends('users.admcoop.admin')

@section('content')


<br><br>


     <div class="row justify-content-center" >
         <div class="card">
             <div class="card-header">Cooperativa</div>
             <div class="card-body">

                     <div class="form-inline">

                         <div class="form-group ">
                             <label for="nombre" class="col-sm-2 offset-1">Nombre:</label>
                             <div class="col-sm-5">
                                 <input type="text" readonly id="nombre" name="nombre" value="{{$coop->nombre}}" class="form-control">
                             </div>
                         </div>
                         <div class="form-group row">
                             <label for="municipio" class="col-sm-2 offset-1 ">Municipio:</label>
                             <div class="col-sm-5">
                                 <input type="text" readonly id="municipio" name="municipio" value="{{$coop->municipio}}" class="form-control">
                             </div>
                         </div>
                         <div class="form-group row">
                             <label for="provincia" class="col-sm-2 offset-1">Departamento:</label>
                             <div class="col-sm-5">
                                 <input type="text" readonly id="provincia" name="provincia" value="{{$coop->provincia}}" class="form-control">
                             </div>
                         </div>
                     </div>

                             <div class="form-group">
                                 <label for="direccion" class="col-sm-2 ">Dirección:</label>
                                 <div class="col-sm-12">
                                     <textarea id="direccion" readonly name="direccion" cols="10" class="form-control">{{$coop->direccion}}</textarea>
                                 </div>
                             </div>




                     <div >
                         <div class="col-lg-offset-2 col-lg-10">
                             <a class="btn boton" href="{{url('/main')}}" >Aceptar</a>
                             <a class="btn boton" href="{{url('/cooperativa/editar')}}" >Editar </a>
                         </div>
                     </div>

             </div>
         </div>
     </div>




@endsection