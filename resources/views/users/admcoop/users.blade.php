@extends('users.admcoop.admin')

@section('content')

       <br><br>

       <div class="alert alert-success" id="alerta" style="display: none" role="alert">
           !!!Se añadió correctamente el usuario!!!.
       </div>
       <div class="alert alert-success" id="alerta1" style="display: none" role="alert">
           !!!Se actualizó correctamente el usuario!!!.
       </div>
       <div class="alert alert-success" id="eliminar" style="display: none" role="alert">
           !!!Se eliminó correctamente!!!.
       </div>
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
    <div class="container">
        <section class="tabla">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title">Gestión de usuarios de la Cooperativa <strong>{{$coop->nombre}}</strong></h1>
                </div>
                <div class="panel-body">
                    <table class="table  table-bordered" id="tabla">
                        <thead>
                        <th>Nombre y Apellidos</th>
                        <th>CI</th>

                        <th>Email</th>
                        <th>Usuario</th>
                        <th>Rol del Usuario</th>
                        <th>Fecha de creado</th>
                       {{-- <th>Accesos</th>--}}
                        <th class="pull-right">Opciones</th>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->ci}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->login}}</td>
                                <td>{{$user->Rol->nomb_rol}}</td>
                                <td>{{$user->created_at}}</td>
                                {{--<td class="justify-content-center"><a href="/accesos/privilegios/{{$user->id}}"  id="acceso" class="boton btn col-sm-12 ">Privilegios</a></td>--}}

                                {{--<td> <a href="#" onclick="editar({{$user->id}})"  id="edit"  class="boton btn pull-left"><i class="fa fa-edit"></i>+</a>  | <a href="#" onclick="eliminar({{$user->id}})"  id="elim"   class="boton btn pull-right"><i class="fa  fa-eraser"></i>-</a></td>--}}

                                <td>
                              <div class="dropdown show pull-right">
                                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-cog fa-lg"></i><i class="caret"></i>
                                    </a>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">


                                            <a class="dropdown-item" href="#"   onclick="editar({{$user->id}})" id="edit" >Editar</a>
                                        <a class="dropdown-item"  href="#"  onclick="eliminar({{$user->id}})"  id="elim"  >Eliminar</a>



                                       </div>
                                </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                    <a href="#" onclick="añadir()"  id="anad"  class="boton btn pull-right"><i class="fa fa-edit"></i>Nuevo</a>

                </div>

            </div>
        </section>

    </div>

    <div class="modal fade " id="modalPE" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title justify-content-center" id="exampleModalLongTitle">Nuevo Usuario </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

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
                    <form class="form-horizontal form" id="formuser">

                        <div class="form-group row ">
                            <label for="nom" class="col-sm-4 col-form-label">Nombre y Apellidos</label>
                            <div class="col-sm-5">
                                <input type="text"  id="name" name="name" class="form-control">
                                <div class="form-control-feedback text-danger" id="namet"></div>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label for="nom" class="col-sm-4 col-form-label">DUI</label>
                            <div class="col-sm-5">
                                <input type="text"  id="ci" name="ci" class="form-control">
                                <div class="form-control-feedback text-danger"  id="cit"></div>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label for="nom" class="col-sm-4 col-form-label">Email</label>
                            <div class="col-sm-5">
                                <input type="email"  id="email" name="email" class="form-control">
                                <div class="form-control-feedback text-danger" id="emailt"></div>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label for="nom" class="col-sm-4 col-form-label">Usuario</label>
                            <div class="col-sm-5">
                                <input type="text"  id="login" name='login' class="form-control">
                                <div class="form-control-feedback text-danger" id="logint"></div>

                            </div>
                        </div>
                        <div class="form-group row ">
                            <label for="nom" class="col-sm-4 col-form-label">Contraseña</label>
                            <div class="col-sm-5">
                                <input type="password"  id="password" name='password' class="form-control">
                                <div class="form-control-feedback text-danger" id="passwordt"></div>

                            </div>
                        </div>
                        <div class="form-group row ">
                            <label for="nom" class="col-sm-4 col-form-label"> Confirmar Contraseña</label>
                            <div class="col-sm-5">
                                <input type="password"  id="password_confir" name='password_confir' class="form-control">
                                <div class="form-control-feedback text-danger" id="password_confirt"></div>

                            </div>
                        </div>


                        <div class="form-group row ">
                            <label for="nom" class="col-sm-4 col-form-label">Seleccione un Rol</label>
                            <div class="col-sm-5">
                               <select id="id_rol" name="id_rol" class="form-control">
                                   <option value="0">----------SELECCIONE----------</option>
                                   @foreach($roles as $rol)
                                       @if($rol->nomb_rol!='Administador' && $rol->nomb_rol!='Usuario Federativo' )
                                           <option value="{{$rol->id}}">{{$rol->nomb_rol}}</option>
                                       @endif
                                   @endforeach
                                   <div class="form-control-feedback text-danger" id="id_rolt"></div>

                               </select>

                            </div>
                        </div>
                        <input type="hidden" name="id_coop" id="id_coop" value="{{ $id_coop}}">
                       {{-- <div class="form-group row ">
                            <label for="nom" class="col-sm-4 col-form-label">Seleccione la Cooperativa</label>
                            <div class="col-sm-5">
                                <select id="id_coop" name="id_coop" class="form-control">
                                    <option value="0">----------SELECCIONE----------</option>
                                    @foreach($coops as $coop)
                                        <option value="{{$coop->id}}">{{$coop->nombre}}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>--}}

                        <div class="form-group row">
                          {{--  <input name="password" id="password" type="hidden" value="{{bcrypt('admin.,30')}}">--}}
                            <input name="primeravez" id="primeravez" type="hidden" value="{{'S'}}">
                           {{-- <input name="logueado" id="logueado" type="hidden" >--}}
                            <input name="fecha_act_psw" id="fecha_act_psw" type="hidden" value="{{date('Ymd')}}">
                        </div>




                    </form>


                </div>

                <div class="modal-footer">
                    <button type="button" class="boton2 btn" id="salir" data-dismiss="modal">Atrás</button>
                    <button type="button" class="btn boton" id="add" >Guardar</button>
                </div>
            </div>
        </div>
    </div>

       <div class="modal fade " id="modal_edit_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
           <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
               <div class="modal-content">
                   <div class="modal-header">
                       <h5 class="modal-title justify-content-center" id="exampleModalLongTitle">Editar Usuario </h5>
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                       </button>
                   </div>
                   <div class="modal-body">

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
                       <form class="form-horizontal form">

                           <div class="form-group row ">
                               <label for="nom" class="col-sm-4 col-form-label">Nombre y Apellidos</label>
                               <div class="col-sm-5">
                                   <input type="text"  id="name1" name="name1" class="form-control">
                                   <div class="form-control-feedback text-danger" id="name1t"></div>
                               </div>
                           </div>
                           <div class="form-group row ">
                               <label for="nom" class="col-sm-4 col-form-label">DUI</label>
                               <div class="col-sm-5">
                                   <input type="text"  id="ci1" name="ci" class="form-control">
                                   <div class="form-control-feedback text-danger" id="cita"></div>
                               </div>
                           </div>
                           <div class="form-group row ">
                               <label for="nom" class="col-sm-4 col-form-label">Email</label>
                               <div class="col-sm-5">
                                   <input type="email"  id="email1" name="email1" class="form-control">
                                   <div class="form-control-feedback text-danger" id="email1t"></div>
                               </div>
                           </div>
                           <div class="form-group row ">
                               <label for="nom" class="col-sm-4 col-form-label">Usuario</label>
                               <div class="col-sm-5">
                                   <input type="text"  id="login1" name='login' class="form-control">
                                   <div class="form-control-feedback text-danger" id="loginta"></div>

                               </div>
                           </div>
                           <div class="form-group row ">
                               <label for="nom" class="col-sm-4 col-form-label">Contraseña</label>
                               <div class="col-sm-5">
                                   <input type="password"  id="password1" name='password1' class="form-control">
                                   <div class="form-control-feedback text-danger" id="password1t"></div>

                               </div>
                           </div>
                           <div class="form-group row ">
                               <label for="nom" class="col-sm-4 col-form-label"> Confirmar Contraseña</label>
                               <div class="col-sm-5">
                                   <input type="password"  id="password_confir1" name='password_confir1' class="form-control">
                                   <div class="form-control-feedback text-danger" id="password_confir1t"></div>

                               </div>
                           </div>

                           <div class="form-group row ">
                               <label for="nom" class="col-sm-4 col-form-label">Seleccione un Rol</label>
                               <div class="col-sm-5">
                                   <select id="id_rol1" name="id_rol1" class="form-control">
                                       <option value="0">----------SELECCIONE----------</option>
                                       @foreach($roles as $rol)
                                           @if($rol->nomb_rol!='Administador' && $rol->nomb_rol!='Usuario Federativo' )
                                               <option value="{{$rol->id}}">{{$rol->nomb_rol}}</option>
                                           @endif
                                       @endforeach
                                       <div class="form-control-feedback text-danger" id="id_rol1t"></div>
                                   </select>

                               </div>
                           </div>
                           <input type="hidden" name="id_coop1" id="id_coop1" value="{{ $id_coop}}">
                           {{--<div class="form-group row ">
                               <label for="nom" class="col-sm-4 col-form-label">Seleccione la Cooperativa</label>
                               <div class="col-sm-5">
                                   <select id="id_coop1" name="id_coop1" class="form-control">
                                       <option value="0">----------SELECCIONE----------</option>
                                       @foreach($coops as $coop)

                                           <option value="{{$coop->id}}">{{$coop->nombre}}</option>

                                       @endforeach
                                   </select>

                               </div>
                           </div>--}}

                           <div class="form-group row">
                               <input name="id1" type="hidden" id="id1">
                              {{-- <input name="password1" id="password1" type="hidden" value="{{bcrypt('admin.,30')}}">--}}
                               <input name="primeravez1" id="primeravez1" type="hidden" value="{{'S'}}">
                               {{-- <input name="logueado" id="logueado" type="hidden" >--}}
                               <input name="fecha_act_psw1" id="fecha_act_psw1" type="hidden" value="{{date('Ymd')}}">
                           </div>




                       </form>


                   </div>

                   <div class="modal-footer">
                       <button type="button" class="boton2 btn" id="salir1" data-dismiss="modal">Atrás</button>
                       <button type="button" class="btn boton" id="edit1">Guardar</button>
                   </div>
               </div>
           </div>
       </div>



       <div class="modal fade " id="deleteModal" tabindex="-1" role="dialog"
            aria-hidden="true">
           <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
               <div class="modal-content">
                   <div class="modal-header">
                       <h5 class="modal-title" id="exampleModalLongTitle">Eliminar</h5>
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                       </button>
                   </div>
                   <div class="modal-body">
                       <input type="hidden" id="id_delete" >
                       <p> Desea eliminar este Usuario <span id="anodelete"></span>  </p>

                   </div>
                   <div class="modal-footer">
                       <button type="button" class="boton2 btn" id="cerrar1" data-dismiss="modal">Cerrar</button>
                       <button type="button" class="boton btn" id="deleteUser" data-dismiss="modal">Eliminar</button>
                   </div>
               </div>
           </div>
       </div>









    <script>

        var tabla = $('#tabla');
        var tablaDT;
        var añadir ;
        var info;
        var editar;
        var id_delete;

        $(document).ready(function () {


            //
            tablaDT = tabla.DataTable();
            var accion=false;
            var id_pe;

            añadir= function () {

                $('#modalPE').modal('show');
            }

            editar=function(id){

                $.ajax({
                    type: 'GET',
                    url: '/get/user/' + id ,
                    data: {
                        _token: '{{ csrf_token() }}',

                    },
                    success: function (data) {
                        //  alert('llegooo');
                        //location.reload();
                        $('#id1').val(data.user.id);
                         $('#name1').val(data.user.name);
                         $('#ci1').val(data.user.ci);
                         $('#email1').val(data.user.email);
                         $('#login1').val(data.user.login);
                         $('#id_rol1').val(data.user.id_rol);
                        $('#id_coop1').val(data.user.id_coop);
                        // $('#password').val();
                         $('#primeravez1').val(data.user.primeravez);
                        // var logueado = $('#logueado').val();
                         $('#fecha_act_psw1').val(data.user.fecha_act_psw);



                    }, error: function () {
                        alert('Error cargando los datos')
                    }
                });

                $('#modal_edit_user').modal('show');
            }


            //Editando un usuairo
            $('#edit1').click(function () {

//                   alert('llegooo');
                var id = $('#id1').val();
                var name = $('#name1').val();
                var ci= $('#ci1').val();
                var email = $('#email1').val();
                var login = $('#login1').val();
                var id_rol = $('#id_rol1').val();
                var id_coop = $('#id_coop1').val();
                var password = $('#password1').val();
                var password_confir = $('#password_confir1').val();
                var primeravez = $('#primeravez1').val();
                // var logueado = $('#logueado').val();
                var fecha_act_psw = $('#fecha_act_psw1').val();

                var url_real='/Edit/User/' + id ;


                if(id_coop==0)
                    id_coop=null;



                $.ajax({
                    type: 'POST',
                    url: url_real,
                    data: {
                        _token: '{{ csrf_token() }}',
                        //  id_ano: idAnno,
                        id1:id,
                        name1 : name,
                        ci : ci,
                        email1: email,
                        login : login,
                        id_rol1 : id_rol,
                        id_coop1:id_coop,
                        password1 : password,
                        password_confir1:password_confir,
                        primeravez1 : primeravez,
                        // logueado :logueado,
                        fecha_act_psw1 :fecha_act_psw


                    },
                    success: function (data) {

                       /* $('#idform')[0].reset();*/

                        $('#alerta1').fadeIn(1000);
                        $('#alerta1').fadeOut(5000);

                        location.reload();

                    }, error: function (jqXHR) {
                        var arr=jQuery.parseJSON(jqXHR.responseText);

                        if(arr['errors']!=null) {
                            var claves =Object.keys(arr['errors']);
                            //console.log(claves);

                            $("input").attr('class','form-control');
                            $("div[class='form-control-feedback text-danger']").hide();

                            for(var miclave=0; miclave< claves.length;miclave++)
                            {
                                for(var i=0;i<  arr['errors'][claves[miclave]].length;i++  )
                                {
                                    $('#'+claves[miclave]+'t').show();

                                    // $('#'+claves[miclave]+'edit').text(arr['errors'][claves[miclave]][i]);
                                    $('#'+claves[miclave]+'t').text(arr['errors'][claves[miclave]][i]);

                                    $('#'+claves[miclave]+'ta').text(arr['errors'][claves[miclave]][i]);




                                }

                                $("input[name='"+claves[miclave]+"']").attr('class','form-control border-danger');


                            }

                        }
                    }
                });
            });

            //Adiconando un usuario

            $('#add').click(function () {
//                   alert('llegooo');
                var name = $('#name').val();
                var ci= $('#ci').val();
                var email = $('#email').val();
                var login = $('#login').val();
                var id_rol = $('#id_rol').val();
                var id_coop = $('#id_coop').val();
                var password = $('#password').val();
                var password_confir = $('#password_confir').val();
                var primeravez = $('#primeravez').val();
               // var logueado = $('#logueado').val();
                var fecha_act_psw = $('#fecha_act_psw').val();

                var url_real='/Nuevo/Usuario' ;

                     if(id_coop==0)
                         id_coop=null;



                $.ajax({
                    type: 'POST',
                    url: url_real,
                    data: {
                        _token: '{{ csrf_token() }}',
                      //  id_ano: idAnno,
                         name : name,
                         ci : ci,
                         email: email,
                         login : login,
                         id_rol : id_rol,
                         id_coop:id_coop,
                         password : password,
                         password_confir:password_confir,
                         primeravez : primeravez,
                        // logueado :logueado,
                         fecha_act_psw :fecha_act_psw


            },

                    success: function (data) {
                      //  alert('llegooo');
                        //location.reload();
                        $('#formuser')[0].reset();
                        $('#alerta').fadeIn(1000);
                        $('#alerta').fadeOut(5000);


                    }, error: function (jqXHR) {
                        var arr=jQuery.parseJSON(jqXHR.responseText);

                        if(arr['errors']!=null) {
                            var claves =Object.keys(arr['errors']);
                            //console.log(claves);

                            $("input").attr('class','form-control');
                            $("div[class='form-control-feedback text-danger']").hide();

                            for(var miclave=0; miclave< claves.length;miclave++)
                            {
                                for(var i=0;i<  arr['errors'][claves[miclave]].length;i++  )
                                {
                                    $('#'+claves[miclave]+'t').show();

                                    // $('#'+claves[miclave]+'edit').text(arr['errors'][claves[miclave]][i]);
                                    $('#'+claves[miclave]+'t').text(arr['errors'][claves[miclave]][i]);
                                }

                                $("input[name='"+claves[miclave]+"']").attr('class','form-control border-danger');


                            }

                        }
                    }
                });
            });


            //eiminar un Usuario
           eliminar=function (id) {
               id_delete=id;
               $('#deleteModal').modal('show');
           }
            $('#deleteUser').click(function () {
                var url_real='/Delete/User/' + id_delete ;


                $.ajax({
                    type: 'POST',
                    url: url_real,
                    data: {
                        _token: '{{ csrf_token() }}',
                        //  id_ano: idAnno,
                        /*name : name,
                        ci : ci,
                        email: email,
                        login : login,
                        id_rol : id_rol,
                        password : password,
                        primeravez : primeravez,
                        // logueado :logueado,
                        fecha_act_psw :fecha_act_psw*/


                    },
                    success: function (data) {
                        //  alert('llegooo');
                        //location.reload();
                        location.reload();
                          $('#eliminar').fadeIn(1000);
                         $('#eliminar').fadeOut(5000);


                    }, error: function () {
                        alert('Error al eliminar este Usuario');
                    }
                });

            });
       /* $('#id_rol').change(function () {
           //alert( $('#id_coop option:selected').text());
           if($('#id_rol option:selected').text()!='Administador Cooperativo'){
               $('#id_coop').prop('disabled',true);
               $('#id_coop').val(0);
           }else
           {
               $('#id_coop').val(0);
               $('#id_coop').prop('disabled',false);
           }

        });

            $('#id_rol1').change(function () {
                //alert( $('#id_coop option:selected').text());
                if($('#id_rol1 option:selected').text()!='Administador Cooperativo'){
                    $('#id_coop1').prop('disabled',true);
                    $('#id_coop1').val(0);
                }else
                {
                    $('#id_coop1').val(0);
                    $('#id_coop1').prop('disabled',false);
                }

            });
*/
            $('#salir1').click(function () {
                location.reload();
            });
            $('#salir').click(function () {
                location.reload();
            });
        });
    </script>

@endsection