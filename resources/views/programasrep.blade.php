@extends('layouts.app')

@section('content')
    <br><br>
    <div class="row justify-content-center">
        <div class="card  ">
            <div class="card-header">   Seleccione la fecha  </div>
            <div class="card-body">

            <table class="table ">
                <thead>
               {{-- <th>Fecha</th>


                </thead>--}}
                <tbody>
                <tr>
                    <td>
                       Fecha:
                    </td>

                    <td>
                        <input type="date" name="fecha" id="fecha" class="form-control">
                    </td>
                </tr>

                </tbody>
                <td colspan="2"><a class="btn boton pull-right " href="#" onclick="añadir()" ><i class="fa fa-check"></i> Aceptar</a>   </td>

            </table>


            </div>
        </div>

    </div>

    <br><br>

    <div class="row justify-content-center">
        <div class="card  ">
            <div class="card-header">   Reporte para el balance social cooperativo por programas sociales  </div>
            <div class="card-body">

                <table class="table  table-bordered col-sm-8" id="tablarep">
                    <thead>
                    <th>No</th>
                    <th>Programa</th>
                    <th>Actividad</th>
                    <th>Responsable</th>
                    <th>Fecha</th>
                    </thead>


                    <tbody>


                    </tbody>

                </table>


            </div>
        </div>

    </div>

    <script>

        var tabla = $('#mytabla');
        var tabla1=$('#tablarep')
        var tablaDT;
        var tablaDT1;
        var añadir;
        var idmeta;
        var presup_total=0; //variable para calcular el presupuesto total al momento de insertar un seguimiento
        var nombprog;
        var nombmeta;
        var ufp_met;// valor maximo de ufp que puede tener el seguimiento a insertar
        var nbf_met;// valor maximo de nbf que puede tener el seguimiento a insertar
        var ult_fecha_seg='1975-01-01';
        var cant_seguimientos=0 ;
        var mi_matriz = new Array();

        $(document).ready(function () {
            // tablaDT = tabla.DataTable();

            //





            añadir= function () {


                fecha=$('#fecha').val();

                var url_t='/reporte/fecha/'+ fecha

                tablaDT = tabla1.DataTable();

                $.ajax({
                    type: 'GET',
                    url: url_t,
                    data: {
                        _token: '{{ csrf_token() }}',

                    },

                    success: function (data) {


                        tablaDT.destroy();
/*
                        for(var k=0 ;k<data.programas.length;k++){
                            $('#elim'+ k).remove();
                        }*/
                        $('#elim').remove();
                       /* tabla1.destroy();*/
                        //  alert(data.seg_met.length)
                        for(var k=0 ;k<data.programas.length;k++){


                            ///agregar los seguimientos a la tabla
                            for(var j=0;j<data.metas.length;j++) {

                                tabla1.append(
                                    '<tr id=elim>' +
                                    ' <td class="col-sm-1"> ' + parseInt(j+1) + '</td>' +

                                    ' <td class="col-sm-1"  > ' +   data.programas[k].nomb_prog +  '</td>' +
                                    ' <td class="col-sm-1"  >  ' + data.metas[k][j].desc_unid_fisicas + '</td>' +
                                    ' <td class="col-sm-1"  >  ' + data.metas[k][j].responsable + '</td>' +
                                    ' <td class="col-sm-1"  >  ' + data.metas[k][j].created_at + '</td>' +

/*
                                    ' <td class="col-sm-1"  > ' +  +
                                    //fecha en que se planifica el detalle de la actividad
                                    ' <td class="col-sm-2"  > ' + '<input type="date" class="form-control" readonly id="fecha_seguimiento_' + data.seg_met[k].id + '" value="' + data.seg_met[k].fecha_seguimiento + '">' + '</td>' +
                                    ' <td class="col-sm-1"  > ' + '<input type="number" class="form-control" id="presup_real_' + data.seg_met[k].id + '" value="' + data.seg_met[k].presup_real + '" max="' + data.seg_met[k].presup_con + '">' + '</td>' +
                                    ' <td class="col-sm-1"  >  ' + '<input type="number" class="form-control" id="unid_fisicas_real_' + data.seg_met[k].id + '" value="' + data.seg_met[k].unid_fisicas_planif + '" readonly max="' + data.seg_met[k].unid_fisicas_planif + '">' + '</td>' +
                                    ' <td class="col-sm-1"  > ' + '<input type="number" class="form-control" id="num_beneficiarios_real_' + data.seg_met[k].id + '" value="' + data.seg_met[k].num_beneficiarios_real + '"  >' + '</td>' + /!* max="'+data.seg_met[k].num_benef_planif+'"*!/
                                    ' <td class="col-sm-1"  > ' + '<input type="text" class="form-control"  readonly value="' + Math.round(parseInt(data.seg_met[k].unid_fisicas_real) * 100 / parseInt(data.seg_met[k].unid_fisicas_planif)) + '">' + '</td>' +
                                    ' <td class="col-sm-1"  > ' + '<input type="text" class="form-control" readonly value="' + Math.round(parseInt(data.seg_met[k].num_beneficiarios_real) * 100 / parseInt(data.seg_met[k].num_benef_planif)) + '">' + '</td>' +
                                    ' <td class="col-sm-2"  > ' + '<input type="date" class="form-control" id="fecha_real_' + data.seg_met[k].id + '" value="' + data.seg_met[k].fecha_real + '" >' + '</td>' +
*/
                                    ' </tr>'
                                );
                            }

//
                        }



                        //$('#tablarep').remove();





                    }, error: function () {
                        alert('Se ha detectado un error al cargar los programas. Verifique su conexión de red');
                    }
                });



            }


            $('#cerrar').click(function () {
                location.reload();
            });

            $('#cerrar1').click(function () {
                location.reload();
            });




            //guardando un seguimiento nuevo
            //&& ufp_met >= parseInt($('#pcon').val()) && nbf_met >= parseInt($('#nbp').val())
            $('#AddMemb').click(function () {

                if($('#descrip').val()!=' ') {
                    if (Date.parse(ult_fecha_seg) <= Date.parse($('#fechaseg').val())) {

                        if (presup_total > 0 && parseInt($('#pcon').val()) > 0) {


                            var descripcion = $('#descrip').val();
                            var presup_con = $('#pcon').val();
                            var unid_fisicas_planif = $('#ufp_fijo').val();
                            var num_benef_planif = $('#nbp').val();
                            var fecha_seguimiento = $('#fechaseg').val();

                            //                          var unid_fisicas_real = $('#ufr').val();
                            //                          var num_beneficiarios_real = $('#nbr').val();
                            //
                            //                          var fecha_real=$('#fechareal').val();
                            //                          var presup_real=$('#preal');

                            var unid_fisicas_real = 0;
                            var num_beneficiarios_real = 0;

                            var fecha_real ={!! date('Ymd') !!};

                            var presup_real = 0;


                            var id_meta = idmeta;


                            if (presup_total < parseInt($('#pcon').val())) {
                                alert('El presupuesto para el seguimiento excede a el presupuesto para la meta,el seguimiento no se insertara')
                            }
                            else {


                                $.ajax({
                                    type: 'POST',

                                    url: '/insertar',
                                    data: {
                                        _token: '{{ csrf_token() }}',


                                        descripcion: descripcion,
                                        presup_con: presup_con,
                                        unid_fisicas_planif: unid_fisicas_planif,
                                        num_benef_planif: num_benef_planif,
                                        fecha_seguimiento: fecha_seguimiento,
                                        id_meta: id_meta,
                                        unid_fisicas_real: unid_fisicas_real,
                                        num_beneficiarios_real: num_beneficiarios_real,
                                        presup_real: presup_real,
                                        fecha_real: fecha_real


                                    },

                                    success: function (data) {
                                        //location.reload();
                                        //se inserto correctamente el seguimiento

                                        tabla.append(
                                            '<tr>' +
                                            ' <td> ' + descripcion + '</td>' +
                                            ' <td> ' + presup_con + '</td>' +  //este es preuspuesto que se planifica a pincipio de ano para este detalle de la acividad
                                            ' <td> ' + 1 + '</td>' +
                                            ' <td> ' + unid_fisicas_planif + '</td>' +
                                            ' <td> ' + num_benef_planif + '</td>' +
                                            ' <td> ' + fecha_seguimiento + '</td>' + //fecha en que se planifica el detalle de la actividad

                                            ' </tr>'
                                        );
                                        /* alert(55);
                                         return 0;*/
                                        var url_t = '/seguimiento/meta/' + idmeta
                                        var ufp_metp = 0;
                                        var nbf_metp = 0;
                                        var presup_totalp = 0


                                        $.ajax({
                                            type: 'GET',
                                            url: url_t,
                                            data: {
                                                _token: '{{ csrf_token() }}',

                                            },

                                            success: function (data) {
                                                //                                              nombmeta=data.meta.desc_unid_fisicas;
                                                //                                              nombprog=data.prog.nomb_prog;

                                                //  $('#seg').val('Els ')

                                                ufp_metp = data.meta.unid_fisicas_plan;
                                                nbf_metp = data.meta.beneficiarios_plan;


                                                for (var k = 0; k < data.seg_met.length; k++) {


                                                    ufp_metp = ufp_metp - parseInt(data.seg_met[k].unid_fisicas_planif);
                                                    nbf_metp = nbf_metp - parseInt(data.seg_met[k].num_benef_planif);

                                                    ///calcular el presupuesto consumudo por el total de los seguimientos
                                                    presup_totalp = presup_totalp + parseInt(data.seg_met[k].presup_con);

                                                    //aqui cojo la fecha del ultimo seguimiento

                                                }


                                                presup_totalp = parseInt(data.meta.presupuesto) - presup_totalp;


                                                $('#pcon').attr('max', presup_totalp);
                                                $('#pcon').val(presup_totalp);

                                                $('#ufp').attr('max', ufp_metp);
                                                $('#ufp').val(ufp_metp);
                                                $('#nbp').attr('max', nbf_metp);
                                                $('#nbp').val(nbf_metp);

                                                // $('h5').val('seguimos en com');


                                            }, error: function () {
                                                alert('Error en el seguimiento a esta meta')
                                            }
                                        });


                                        ///////////////////////////////////////////
                                        // tablaDT.destroy();


                                        $('#elim').remove();

                                        /// tablaDT = tabla.DataTable();


                                        tabla.append(
                                            '<tr id="elim" name="elim" >' +
                                            ' <td class="col-sm-4" > ' + '<textarea id="descrip" rows="1" class="form-control"> </textarea>' + '</td>' +
                                            ' <td class="col-sm-2" > ' + ' <input type="number" id="pcon"  min="0" value="0"  class="form-control " required>' + '</td>' +
                                            ' <td class="col-sm-2" > ' + ' <input type="number" id="ufp_fijo"  readonly min="0" value="' + 1 + '"  max="' + ufp_metp + '" class="form-control " required>' + '</td>' +
                                            ' <td class="col-sm-2" > ' + ' <input type="number" id="ufp"  min="0" readonly value="' + ufp_metp + '"  max="' + ufp_metp + '" class="form-control " required>' + '</td>' +
                                            ' <td class="col-sm-2" > ' + ' <input type="number" id="nbp"  min="0"   value="' + nbf_metp + '" max="' + nbf_metp + '"  class="form-control " required>' + '</td>' +
                                            ' <td  > ' + ' <input type="date" id="fechaseg" min="0"  class="form-control "   required>' + '</td>' +
                                            //                            ' <td class="col-sm-1" > '+ ' <input type="number" id="preal"  min="0" value="0"  class="form-control " required>' +'</td>'+
                                            //                            ' <td class="col-sm-1" > '+ ' <input type="number" id="ufr" min="0" class="form-control" value="0" required>' +'</td>'+
                                            //                            ' <td class="col-sm-1" > '+ ' <input type="number" id="nbr" min="0" class="form-control" value="0" required>' +'</td>'+
                                            //                            ' <td class="col-sm-1" > '+ ' <input type="text" id="psuf" readonly min="0"  value="0" class="form-control" required>' +'</td>'+
                                            //                            ' <td class="col-sm-1" > '+ ' <input type="text" id="psnb" readonly min="0" value="0" class="form-control" required>' +'</td>'+
                                            //                            ' <td  > '+ ' <input type="date" id="fechareal" min="0"  class="form-control "   required>' +'</td>'+


                                            ' </tr>'
                                        )

                                        $('#alerta').fadeIn(1000);
                                        $('#alerta').fadeOut(5000);

                                        //

                                    }, error: function (e) {
                                        alert('Error al insertar el seguimiento');
                                        //location.reload();
                                    }
                                });

                            }
                        }

                        else {
                            alert('Esta meta no tiene presupuesto para agregar otro seguimiento ');
                            /// location.reload();
                        }
                    }
                    else {
                        alert('La fecha del seguimiento desea insertar es menor que la fecha del ultimo seguimiento');
                        // location.reload();
                    }
                }
                else{
                    alert('Por favor especifique la descripción del detalle de la actividad.')
                }

            });



            $('#AddMemb1').click(function () {

                var bandera='Neutro';


                for(var i=0;i<mi_matriz.length;i++ ) {

                    var unid_fisicas_planif = $('#unid_fisicas_planif_' + mi_matriz[i]).val();
                    var num_benef_planif = $('#num_benef_planif_' + mi_matriz[i]).val();
                    var fecha_seguimiento = $('#fecha_seguimiento_' + mi_matriz[i]).val();
                    var presup_con = $('#presup_con_' + mi_matriz[i]).val();

                    var unid_fisicas_real = $('#unid_fisicas_real_' + mi_matriz[i]).val();
                    var num_beneficiarios_real = $('#num_beneficiarios_real_' + mi_matriz[i]).val();
                    var fecha_real = $('#fecha_real_' + mi_matriz[i]).val();
                    var presup_real = $('#presup_real_' + mi_matriz[i]).val();

                    var id_meta = idmeta;
                    if(parseInt(unid_fisicas_planif) >= parseInt(unid_fisicas_real) && parseInt(presup_con)>= parseInt(presup_real) ) { /*&& parseInt(num_benef_planif)>= parseInt(num_beneficiarios_real)*/  /*&&  && Date.parse(fecha_seguimiento)>=Date.parse(fecha_real)*/

                        bandera='Verdadero';
//                              alert(num_benef_planif)
//                              alert(num_beneficiarios_real)
                    }
                    else
                    {
                        bandera='Falso'
                        i=mi_matriz.length;

                    }

                }


                if(bandera=='Verdadero'){
                    for(var i=0;i<mi_matriz.length;i++ ) {

                        var unid_fisicas_planif = $('#unid_fisicas_planif_'+ mi_matriz[i]).val();
                        var num_benef_planif = $('#num_benef_planif_'+ mi_matriz[i]).val();
                        var fecha_seguimiento = $('#fecha_seguimiento_'+ mi_matriz[i]).val();
                        var presup_con = $('#presup_con_'+ mi_matriz[i]).val();

                        var unid_fisicas_real = $('#unid_fisicas_real_'+ mi_matriz[i]).val();
                        var num_beneficiarios_real = $('#num_beneficiarios_real_'+ mi_matriz[i]).val();
                        var fecha_real = $('#fecha_real_'+ mi_matriz[i]).val();
                        var presup_real = $('#presup_real_'+ mi_matriz[i]).val();

                        var id_meta = idmeta;

                        // alert('hola')
                        $.ajax({
                            type: 'POST',

                            url: '/act/seg/'+ mi_matriz[i],
                            data: {
                                _token: '{{ csrf_token() }}',


//                            descripcion: descripcion,
//                            presup_con: presup_con,
//                            unid_fisicas_planif: unid_fisicas_planif,
//                            num_benef_planif: num_benef_planif,
//                            fecha_seguimiento: fecha_seguimiento,


                                unid_fisicas_real: unid_fisicas_real,
                                num_beneficiarios_real: num_beneficiarios_real,
                                fecha_real : fecha_real,
                                presup_real : presup_real,

                                id_meta: id_meta,


                            },

                            success: function (data) {
                                //location.reload();
                                //se inserto correctamente el seguimiento
//                              $('#alerta').fadeIn(1000);
//                              $('#alerta').fadeOut(5000);

                                //

                            }, error: function (e) {
                                alert('Error al insertar el seguimiento en la base de datos');
                                //location.reload();
                            }
                        });



                    }
                    location.reload();

                }
                else
                {
                    alert('Datos Incorrectos.!!Revise!!')
                }










            });



            //eliminando el ultimo seguimiento
            $('#ELIMMemb').click(function () {

                $.ajax({
                    type: 'POST',

                    url: '/eliminarseg/'+ idmeta,
                    data: {
                        _token: '{{ csrf_token() }}',



                    },

                    success: function (data) {
                        location.reload();
                        //se elimino correctamente el seguimiento
                        $('#alerta1').fadeIn(1000);
                        $('#alerta1').fadeOut(5000);

                    }, error: function (e) {
                        alert('Error eliminando el ultimo seguimiento');
                        location.reload();
                    }
                });

            });









            {{--$('#ELIMMemb1').click(function () {--}}

                {{--$.ajax({--}}
                    {{--type: 'POST',--}}

                    {{--url: '/eliminarseg/'+ idmeta,--}}
                    {{--data: {--}}
                        {{--_token: '{{ csrf_token() }}',--}}



                    {{--},--}}

                    {{--success: function (data) {--}}
                        {{--//location.reload();--}}
                        {{--//se elimino correctamente el seguimiento--}}
{{--//                        alert(cant_seguimientos)--}}
                        {{--$('#row_0').remove();--}}
                        {{--var url_t='/seguimiento/meta/'+ idmeta--}}
                        {{--var ufp_metp=0;--}}
                        {{--var nbf_metp=0;--}}
                        {{--var presup_totalp=0--}}


                        {{--$.ajax({--}}
                            {{--type: 'GET',--}}
                            {{--url: url_t,--}}
                            {{--data: {--}}
                                {{--_token: '{{ csrf_token() }}',--}}

                            {{--},--}}

                            {{--success: function (data) {--}}

                                {{--ufp_metp=data.meta.unid_fisicas_plan;--}}
                                {{--nbf_metp=data.meta.beneficiarios_plan;--}}



                                {{--for(var k=0 ;k<data.seg_met.length;k++){--}}



                                    {{--ufp_metp=ufp_metp-parseInt(data.seg_met[k].unid_fisicas_planif);--}}
                                    {{--nbf_metp=nbf_metp-parseInt(data.seg_met[k].num_benef_planif);--}}

                                    {{--///calcular el presupuesto consumudo por el total de los seguimientos--}}
                                    {{--presup_totalp= presup_totalp + parseInt(data.seg_met[k].presup_con);--}}

                                    {{--//aqui cojo la fecha del ultimo seguimiento--}}

                                {{--}--}}


                                {{--presup_totalp=parseInt(data.meta.presupuesto)-presup_totalp;--}}


                                {{--$('#pcon').attr('max',presup_totalp);--}}
                                {{--$('#pcon').val(presup_totalp);--}}

                                {{--$('#ufp').attr('max',ufp_metp);--}}
                                {{--$('#ufp').val(ufp_metp);--}}
                                {{--$('#nbp').attr('max',nbf_metp);--}}
                                {{--$('#nbp').val(nbf_metp);--}}

                                {{--// $('h5').val('seguimos en com');--}}





                            {{--}, error: function () {--}}
                                {{--alert('Error en el seguimiento a esta meta')--}}
                            {{--}--}}
                        {{--});--}}




                        {{--$('#alerta1').fadeIn(1000);--}}
                        {{--$('#alerta1').fadeOut(5000);--}}

                    {{--}, error: function (e) {--}}
                        {{--alert('Error eliminando el ultimo seguimiento');--}}
                        {{--location.reload();--}}
                    {{--}--}}
                {{--});--}}



            {{--});--}}



            $('#salir').click(function () {

                location.reload();



            });
            $('#salir1').click(function () {

                location.reload();



            });


            $('#modalMemb').keyup(function(event) {
                //alert('ent')
                if(event.which=='27')
                {
                    location.reload();
                }


            });
            $('#modalMemb1').keyup(function(event) {

                if(event.which=='27')
                {
                    location.reload();
                }


            });






        });
    </script>
    @endsection