<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Programa social</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Place your favicon.ico and apple-touch-icon.png in the template root directory -->
    <link href="favicon.ico" rel="shortcut icon">

    <!-- Bootstrap CSS File -->
{{--<link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">--}}

<!-- Libraries CSS Files -->
    <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="lib/animate-css/animate.min.css" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/bootstrap-theme.css">
    <link rel="stylesheet" href="/css/datatables.css">
    <link href="/css/style.css" rel="stylesheet">

    <!-- =======================================================
      Theme Name: Imperial
      Theme URL: https://bootstrapmade.com/imperial-free-onepage-bootstrap-theme/
      Author: BootstrapMade.com
      Author URL: https://bootstrapmade.com
    ======================================================= -->

</head>

<body>
<script type="text/javascript">
    window.setInterval(BlinkIt, 700);
    var color = "red";
    function BlinkIt() {
        var blink = document.getElementById("blink");
        color = (color == "#ffffff") ? "red" : "#ffffff";
        blink.style.color = color;
    }
</script>

{{--style="background: url(img/arbolmano.jpg)  no-repeat right 100px center fixed; "--}}

<div class="container " align="center" id="basocoIntro">
    <img  src="img/Barner3.jpg">
    {{--<div align="center"  style="background: url(img/coop3.jpg);height: 288px;width: 900px" >--}}




    {{-- <div class="align-content-center"></div>
         <a class="btn-default btn-lg" href="/home" >Entrar </a>
         <a class="btn-default btn-lg"  href="#"> Registrase </a>--}}





    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('login') ? ' has-error' : '' }}">
            <label for="username" class="col-md-4 control-label">Usuario</label>

            <div class="col-md-6">
                <input id="login" type="text" class="form-control" name="login" value="{{ old('login') }}">

                @if ($errors->has('login'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('login') }}</strong>
                                    </span>
                @endif
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
            <div class="form">
                <a href="/registerinv" >Registrar Usuario</a>
            </div>
        </div>
    </form>




</div>
</div>
</body>
</html>
