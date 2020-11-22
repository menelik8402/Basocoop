@extends('users.admin.admin')

@section('content')

       <br><br>

    <div class="alert alert-success" id="alerta" style="display: none" role="alert">
        !!!Se añadió correctamente la cooperativa!!!.
    </div>
       <div class="alert alert-success" id="alerta1" style="display: none" role="alert">
           !!!Se actualizó correctamente la cooperativa!!!.
       </div>
       <div class="alert alert-success" id="eliminar" style="display: none" role="alert">
           !!!Se eliminó correctamente la cooperativa!!!.
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
                    <h1 class="panel-title">Gestión de Cooperativas</h1>
                </div>
                <div class="panel-body">
                    <table class="table  table-bordered" id="tabla">
                        <thead>
                        <th>Nombre</th>
                        <th>Dirección</th>

                        <th>Municipio</th>
                        <th>Departamento</th>
                        <th class="pull-right">Opciones</th>
                        </thead>
                        <tbody>
                        @foreach($cooperativas as $cooperativa)
                            <tr>
                                <td>{{$cooperativa->nombre}}</td>
                                <td>{{$cooperativa->direccion}}</td>
                                <td>{{$cooperativa->municipio}}</td>
                                <td>{{$cooperativa->provincia}}</td>
                                {{-- <td> <a href="#" onclick="editar({{$cooperativa->id}})"  id="edit"  class="boton btn pull-left"><i class="fa fa-edit"></i>+</a>|<a href="#" onclick="eliminar({{$cooperativa->id}})"  id="elim"   class="boton btn pull-right"><i class="fa  fa-eraser"></i>-</a></td>--}}
                                <td>
                                    <div class="dropdown show pull-right">
                                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-cog fa-lg"></i><i class="caret"></i>
                                        </a>

                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                                            <a class="dropdown-item" href="#" onclick="editar({{$cooperativa->id}})" id="edit"   >Editar</a>



                                            <a class="dropdown-item" href="#" onclick="eliminar({{$cooperativa->id}})"  id="elim"  >Eliminar</a>


                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                    <a href="#" onclick="añadir()"  id="anad"  class="boton btn pull-right"><i class="fa fa-edit"></i>Nuevo</a>

                </div>
                <div class="panel-footer">
                    {{--<a  href="/AddPrograma" class="btn boton pull-right">Nuevo Programa</a>--}}
                    {{--<a data-toggle="modal" data-target="#modal" href="#" class="btn btn-primary pull-right">Nuevo--}}
                    {{--Programa</a>--}}
                </div>
            </div>
        </section>

    </div>

    <div class="modal fade " id="modalPE" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title justify-content-center" id="exampleModalLongTitle">Nueva Cooperativa </h5>
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
                            <label for="nom" class="col-sm-4 col-form-label">Nombre</label>
                            <div class="col-sm-5">
                                <input type="text"  id="nombre" name="nombre" class="form-control">
                                <div class="form-control-feedback text-danger" id="nombret"></div>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label for="nom" class="col-sm-4 col-form-label">Municipio</label>
                            <div class="col-sm-5">
                                <input type="text"  id="municipio" name="municipio" class="form-control">
                                <div class="form-control-feedback text-danger" id="municipiot"></div>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label for="nom" class="col-sm-4 col-form-label">Departamento</label>
                            <div class="col-sm-5">
                                <input type="text"  id="provincia" name="provincia" class="form-control">
                                <div class="form-control-feedback text-danger" id="provinciat"></div>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label for="nom" class="col-sm-4 col-form-label">Dirección</label>
                            <div class="col-sm-5">
                                <input type="text"  id="direccion" name='direccion' class="form-control">
                                <div class="form-control-feedback text-danger" id="direcciont"></div>

                            </div>
                        </div>

                        <div class="form-group row ">
                            <label for="nom" class="col-sm-4 col-form-label">Seleccione la Federación</label>
                            <div class="col-sm-5">
                                <select id="federacion" name="federacion" class="form-control">

                                    @foreach($federaciones as $federacion)

                                            <option value="{{$federacion->id}}">{{$federacion->descrip}}</option>

                                    @endforeach
                                </select>

                            </div>
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


       <div class="modal fade " id="modal_edit_coop" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
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
                           <form class="form-horizontal form" id="formuser1">
                                <input type="hidden" id="id1" name="id1">
                               <div class="form-group row ">
                                   <label for="nom" class="col-sm-4 col-form-label">Nombre</label>
                                   <div class="col-sm-5">
                                       <input type="text"  id="nombre1" name="nombre1" class="form-control">
                                       <div class="form-control-feedback text-danger" id="nombre1t"></div>
                                   </div>
                               </div>
                               <div class="form-group row ">
                                   <label for="nom" class="col-sm-4 col-form-label">Municipio</label>
                                   <div class="col-sm-5">
                                       <input type="text"  id="municipio1" name="municipio1" class="form-control">
                                       <div class="form-control-feedback text-danger" id="municipio1t"></div>
                                   </div>
                               </div>
                               <div class="form-group row ">
                                   <label for="nom" class="col-sm-4 col-form-label">Departamento</label>
                                   <div class="col-sm-5">
                                       <input type="text"  id="provincia1" name="provincia1" class="form-control">
                                       <div class="form-control-feedback text-danger" id="provincia1t"></div>
                                   </div>
                               </div>
                               <div class="form-group row ">
                                   <label for="nom" class="col-sm-4 col-form-label">Dirección</label>
                                   <div class="col-sm-5">
                                       <input type="text"  id="direccion1" name="direccion1" class="form-control">
                                       <div class="form-control-feedback text-danger" id="direccion1t"></div>

                                   </div>
                               </div>

                               <div class="form-group row ">
                                   <label for="nom" class="col-sm-4 col-form-label">Seleccione la Federación</label>
                                   <div class="col-sm-5">
                                       <select id="federacion1" name="federacion1" class="form-control">

                                           @foreach($federaciones as $federacion)

                                               <option value="{{$federacion->id}}">{{$federacion->descrip}}</option>

                                           @endforeach
                                       </select>

                                   </div>
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
                       <p> Desea eliminar este Cooperativa? <span id="anodelete"></span>  </p>

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
                    url: '/get/cooperativa/' + id ,
                    data: {
                        _token: '{{ csrf_token() }}',

                    },
                    success: function (data) {
                        //  alert('llegooo');
                        //location.reload();
                        $('#id1').val(data.cooperativa.id);
                        $('#nombre1').val(data.cooperativa.nombre);
                        $('#municipio1').val(data.cooperativa.municipio);
                         $('#provincia1').val(data.cooperativa.provincia);
                        $('#direccion1').val(data.cooperativa.direccion);
                        $('#federacion1').val(data.cooperativa.fed_id);


                    }, error: function () {
                        alert('Error cargando los datos')
                    }
                });

                $('#modal_edit_coop').modal('show');
            }


            //Editando un usuairo
            $('#edit1').click(function () {
//                   alert('llegooo');
                var id = $('#id1').val();
                var nombre = $('#nombre1').val();
                var municipio= $('#municipio1').val();
                var direccion = $('#direccion1').val();
                var provincia = $('#provincia1').val();
                var federacion=$('#federacion1').val();

                var url_real='/Edit/Cooperativa/' + id ;




                $.ajax({
                    type: 'POST',
                    url: url_real,
                    data: {
                        _token: '{{ csrf_token() }}',
                        //  id_ano: idAnno,
                        nombre : nombre,
                        provincia : provincia,
                        municipio: municipio,
                        direccion : direccion,
                        federacion:federacion
                    },
                    success: function (data) {
                        $('#formuser1')[0].reset();
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
                                }

                                $("input[name='"+claves[miclave]+"']").attr('class','form-control border-danger');


                            }

                        }
                    }
                });
            });

            //Adiconando un COOPERATIVA

            $('#add').click(function () {
//                   alert('llegooo');
                var nombre = $('#nombre').val();
                var municipio= $('#municipio').val();
                var provincia = $('#provincia').val();
                var direccion = $('#direccion').val();
                var  federacion= $('#federacion').val();

                var url_real='/Nueva/Cooperativa' ;

                $.ajax({
                    type: 'POST',
                    url: url_real,
                    data: {
                        _token: '{{ csrf_token() }}',
                      //  id_ano: idAnno,
                         nombre : nombre,
                         municipio : municipio,
                         provincia: provincia,
                         direccion : direccion,
                         federacion: federacion,


            },

                    success: function (data) {
                      //  alert('llegooo');
                        //location.reload();
                        $('#formuser')[0].reset();
                        $('#alerta').fadeIn(1000);
                        $('#alerta').fadeOut(5000);


                    }, error: function (jqXHR ) {
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
                var url_real='/Delete/Cooperativa/' + id_delete ;


                $.ajax({
                    type: 'POST',
                    url: url_real,
                    data: {
                        _token: '{{ csrf_token() }}',

                    },
                    success: function (data) {

                        location.reload();
                          $('#eliminar').fadeIn(1000);
                         $('#eliminar').fadeOut(5000);


                    }, error: function () {
                        alert('Error al eliminar este Cooperativa');
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

            });*/

            $('#salir1').click(function () {
                location.reload();
            });
            $('#salir').click(function () {
                location.reload();
            });
        });
    </script>

@endsection