{{--@extends('users.federativo.perfil')--}}
        <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Balance</title>
    <head>
        <title>Balance </title>
        <style type="text/css">
            body{
                font-size: 16px;
                font-family: "Arial";
            }
            table{
                border-collapse: collapse;
            }
            td{
                padding: 6px 5px;
                font-size: 15px;
            }
            .h1{
                font-size: 21px;
                font-weight: bold;
            }
            .h2{
                font-size: 18px;
                font-weight: bold;
            }
            .tabla1{
                margin-bottom: 20px;
            }
            .tabla2 {
                margin-bottom: 20px;
            }
            .tabla3{
                margin-top: 15px;
            }
            .tabla3 td{
                border: 1px solid #000;
            }
            .tabla3 .cancelado{
                border-left: 0;
                border-right: 0;
                border-bottom: 0;
                border-top: 1px dotted #000;
                width: 200px;
            }
            .emisor{
                color: red;
            }
            .linea{
                border-bottom: 1px dotted #000;
            }
            .border{
                border: 1px solid #000;
            }
            .fondo{
                background-color: #dfdfdf;
            }
            .fisico{
                color: #fff;
            }
            .fisico td{
                color: #fff;
            }
            .fisico .border{
                border: 1px solid #fff;
            }
            .fisico .tabla3 td{
                border: 1px solid #fff;
            }
            .fisico .linea{
                border-bottom: 1px dotted #fff;
            }
            .fisico .emisor{
                color: #fff;
            }
            .fisico .tabla3 .cancelado{
                border-top: 1px dotted #fff;
            }
            .fisico .text{
                color: #000;
            }
            .fisico .fondo{
                background-color: #fff;
            }

        </style>
    </head>
<body>
<h1>Balance social por cooperativas </h1>
<hr>
<div >
    <div class="container">

    <section class="tabla">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1 class="panel-title">Balances Cooperativo de todas las Cooperativas</h1>
            </div>
            <div class="panel-body">
                <form action="/balance/federativo/total" method="get">

                    <div class="form-inline justify-content-center ">

                        <label  class=" mx-3 pull-left">Año :</label>
                        <div CLASS="@if($errors->has('ano')) border-danger @endif">
                            <select id="ano" name="ano"  class="form-control">
                                <option value="0">-------SELECCIONE-------</option>
                                 @foreach($annos as $ano)
                                     <option value="{{$ano->id}}">{{$ano->ano}}</option>
                                 @endforeach
                            </select>
                            @foreach($errors->get('ano') as $error)
                                <div class="form-control-feedback text-danger">{{$error}}</div>
                            @endforeach
                        </div>
                        <button type="submit"  class="btn btn-primary mx-2">  Aceptar</button>
                        {{-- <button href="#"  class="btn btn-success mx-3">  Imprimir</button>
                         <button href="#"  class="btn btn-success  mx-2">  Descargar PDF</button>
 --}}


                    </div>
                </form>
            </div>
            <div class="panel-footer">
                {{--<a  href="/AddPrograma" class="btn boton pull-right">Nuevo Programa</a>--}}
                {{--<a data-toggle="modal" data-target="#modal" href="#" class="btn btn-primary pull-right">Nuevo--}}
                {{--Programa</a>--}}
            </div>
        </div>
    </section>

    </div>
</div>
</body>
</html>