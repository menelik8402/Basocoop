<!DOCTYPE html>
<html><head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>BasoCoop</title>
    <meta charset="utf-8">
    <meta name="description" content="Balance Social Cooperativo">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">

    <link href="Bandec/bootstrap.css" rel="stylesheet">

    <link href="Bandec/bootstrap_002.css" rel="stylesheet" type="text/css" media="all">




    {{--<script type="text/javascript">
        getIPs(function (ip) {
            var dat = document.getElementById("ipWebRTC");
            dat.value = ip;
        });
    </script>--}}


    <style id="holderjs-style" type="text/css">.holderjs-fluid {font-size:16px;font-weight:bold;text-align:center;font-family:sans-serif;margin:0}</style></head>
<body>
<br>
<div class="container-login hidden-print">
    <img class="img-responsive" src="img/barnertop.jpg">
</div>
<div class="container-login hidden-print">
    <img class="img-responsive" src="img/Barner3.jpg">
</div>
<div class="container-login" style="background-color: #fff">
    <div class="row">
        <div class="col-sm-8 hidden-xs" style="padding-left: 15px; padding-right: 15px; background-color: #fff">


            <script type="text/javascript">
                window.setInterval(BlinkIt, 700);
                var color = "red";
                function BlinkIt() {
                    var blink = document.getElementById("blink");
                    color = (color == "#ffffff") ? "red" : "#ffffff";
                    blink.style.color = color;
                }
            </script>


            <h4 class="page-header">Plan de Gestión Social-Balance Social</h4>
            <ul>


            </ul>
            <small style="text-align: justify">
                El Plan de Gestión Social - Balance Social constituye un instrumento de gestión que utilizan cooperativas de la Federación de Cooperativas de Ahorro y Crédito de El Salvador (FEDECACES), para planificar, organizar, medir y evaluar el cumplimiento de su Responsabilidad Social en correspondencia con su naturaleza y esencia, así como para conocer el impacto que su desempeño social genera en sus asociados, directivos, sus familias y los miembros de la comunidad donde estas empresas se encuentran insertadas.
                <p></p>



        </div>
        <div class="col-sm-4 hidden-print" style="background-color: #fff">
            <div class="panel-login">

                <div class="panel-login">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}
                            <div class="panel-body-login">
                                <div class="form-group">
                                    <div class="col-sm-10 col-sm-offset-1">
                                        <div class="input-group input-group-sm {{ $errors->has('login') ? ' has-error' : '' }}">

                                            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                            <input type="text" class="form-control input-sm" name="login" placeholder="Usuario..." autocomplete="off" required="">

                                            @if ($errors->has('login'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('login') }}</strong>
                                    </span>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-10 col-sm-offset-1">
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                                            <input type="password" class="form-control input-sm" name="password" placeholder="Contraseña..." autocomplete="off" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-10 col-sm-offset-1">
                                        <input type="submit" class="btn-login" value="Entrar">
                                    </div>
                                    <br><br>

                                </div>
                                <div style="text-align: center"><strong></strong></div>
                            </div>
                    </form>
                    <div  align="center">
                        <a href="/registerinv"  >Usuario Invitado</a>
                    </div>
                        </section>
                </div>
               {{-- <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('login') ? ' has-error' : '' }}">
                        <label for="username" class="col-md-4 control-label">Usuario</label>

                        <div class="col-md-6">
                            <input id="login" type="text" class="form-control" name="login" value="{{ old('login') }}">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                <input type="text" class="form-control input-sm" name="login" placeholder="Usuario..." autocomplete="off" required="">

                            </div>


                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="col-md-4 control-label">Password</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control" name="password" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Login
                            </button>


                        </div>
                        <br>

                    </div>
                </form>--}}
            </div>
        </div>
    </div>
</div>
<div class="container-login text-center hidden-print">
    <div style="border-top: 3px solid #919191;">
        <h6><small>© 2020 - FEDECACES</small></h6>
    </div>
</div>

<script src="Bandec/jquery"></script>



<script src="Bandec/jquery.js"></script>
<script src="Bandec/bootstrap.js"></script>
<script src="Bandec/holder.js"></script>
<script src="Bandec/jquery-1.js"></script>
<script src="Bandec/jquery-ui-1.js"></script>
<script src="Bandec/knockout-2.js"></script>




</body>
</html>