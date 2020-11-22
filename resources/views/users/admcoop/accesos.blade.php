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
    <div class="container">
        <section class="tabla">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title">Accesos de usuario <strong>{{$user->name}}</strong></h1>
                </div>
                <div class="panel-body">
                    <form action="/insertar/accesos/{{$user->id}}" method="post">
                        {{csrf_field()}}
                    <table class="table  table-bordered">
                        <thead>
                        <th>No.</th>
                        <th>Privilegio</th>
                        <th>Adicionar</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                        <th>Información</th>

                        </thead>
                        <tbody>
                        @foreach($privilegios as $i => $privilegio)
                            <tr>
                                <td>{{$i +1}}</td>
                                <td>{{$privilegio->nomb_priv}}</td>
                                <td> <input type="checkbox" id="{{$privilegio->codigo_priv}}_add" name="{{$privilegio->codigo_priv}}_add"  @if($privilegio->accion_add==1)checked @else value="0" @endif @if($user->Rol->nomb_rol=='Usuario')disabled else @endif>  </td>
                                <td><input type="checkbox" id="{{$privilegio->codigo_priv}}_edit" name="{{$privilegio->codigo_priv}}_edit" @if($privilegio->accion_edit==1)checked @else value="0" @endif  @if($user->Rol->nomb_rol=='Usuario')disabled else @endif></td>
                                <td> <input type="checkbox" id="{{$privilegio->codigo_priv}}_elim" name="{{$privilegio->codigo_priv}}_elim" @if($privilegio->accion_elim==1)checked @else value="0" @endif @if($user->Rol->nomb_rol=='Usuario')disabled else @endif> </td>

                                <td> <input type="checkbox" id="{{$privilegio->codigo_priv}}_inf" name="{{$privilegio->codigo_priv}}_inf"  @if($privilegio->accion_inf==1) checked else @endif   >   </td>

                            </tr>

                        @endforeach
                        <tr>
                            <td></td>
                            <td></td>
                            <td><input type="checkbox" id="todos_add">Todos</td>
                            <td><input type="checkbox" id="todos_edit" >Todos</td>
                            <td><input type="checkbox" id="todos_elim" >Todos</td>
                            <td><input type="checkbox" id="todos_info" >Todos</td>
                        </tr>
                        </tbody>

                    </table>
                    <button type="submit"  class="boton btn pull-right"><i class="fa fa-edit"></i>Aceptar</button>
                    </form>
                </div>
            </div>
        </section>

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

            añadir=function(id){

                $.ajax({
                    type: 'POST',
                    url: '/crear/acceso/' + id ,
                    data: {
                        _token: '{{ csrf_token() }}',

                    },
                    success: function (data) {
                        //  alert('llegooo');
                        //location.reload();



                    }, error: function () {
                        alert('Error cargando los datos')
                    }
                });

                $('#modal_edit_user').modal('show');
            }


            $('#todos_add').change(function () {
                $("input[name$='_add']").prop('checked',$(this).prop('checked'));
            });
            $('#todos_edit').change(function () {
                $("input[name$='_edit']").prop('checked',$(this).prop('checked'));
            });
            $('#todos_elim').change(function () {
                $("input[name$='_elim']").prop('checked',$(this).prop('checked'));
            });
            $('#todos_info').change(function () {
                $("input[name$='_inf']").prop('checked',$(this).prop('checked'));
            });


        });
    </script>

@endsection