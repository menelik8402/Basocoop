<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>BaSoCoop</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <script src="/js/jquery.js"></script>
    <script src="/js/bootstrap.js"></script>
    <script src="/js/datatables.js"></script>




    <!-- Place your favicon.ico and apple-touch-icon.png in the template root directory -->
    <link href="/favicon.ico" rel="shortcut icon">

    <!-- Bootstrap CSS File -->
{{--<link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">--}}

<!-- Libraries CSS Files -->
    <link href="/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="/lib/animate-css/animate.min.css" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/bootstrap-theme.css">
    <link rel="stylesheet" href="/css/datatables.css">
    <link rel="stylesheet" href="/css/estilo.css">
    <link href="/css/style.css" rel="stylesheet">

    <!-- =======================================================
      Theme Name: Imperial
      Theme URL: https://bootstrapmade.com/imperial-free-onepage-bootstrap-theme/
      Author: BootstrapMade.com
      Author URL: https://bootstrapmade.com
    ======================================================= -->

</head>

<body >


<!--==========================
Hero Section
============================-->


<!--==========================
Header Section
============================-->
<header id="header" >
    <div class="container" >

        <div id="logo" class="pull-left" >
            {{--<img src="img/arbolmano.jpg" alt="">--}}
            <a href="/"><img src="/img/BaSoCooplogo.png" /></a>
            <!-- Uncomment below if you prefer to use a text image -->
            <!--<h1><a href="#hero">Header 1</a></h1>-->
        </div>

        @yield('nav')


        <nav id="nav-menu-container">
            <ul class="nav-menu">
                <li class="menu-has-children"><a href="#">Variables</a>
                    <ul>
                        <li><a href="/federacion/ind">Membresía voluntaria</a></li>
                        <li><a href="/federacion/gestdemo">Gestión democrática</a></li>
                        <li><a href="/federacion/partecon">Participación económica</a></li>
                        <li><a href="/federacion/autoind">Autonomía e independencia</a></li>
                        <li><a href="/federacion/educforminf">Educación, formación e información </a></li>
                        <li><a href="/federacion/coopcoop">Cooperación entre cooperativas</a></li>
                        <li><a href="/federacion/intcoop">Interés por la cooperativa</a></li>


                    </ul>
                </li>
                <li class="menu-has-children"><a href="#">Reportes</a>
                    <ul>
                    <li><a href="/main">Reporte de Cooperativas</a></li>
                    <li><a href="/fed/report/total">Reporte por actividades general</a></li>

                    <li><a href="/federacion/reporte">Reporte de seguimientos por actividades</a></li>


                    </ul>
                </li>

                <li class="menu-has-children"><a href="#">Balances</a>
                    <ul>

                        <li><a href="/federacion/balances">Balance social cooperativo</a></li>
                        <li><a href="/federacion/balances/ind">Balance social cooperativo con variables</a></li>
                        @if(@\Illuminate\Support\Facades\Auth::user()->Rol->nomb_rol != 'Usuario')
                            <li><a href="/federacion/balances/coop/total">Balance social por cooperativas</a></li>
                        @endif
                    </ul>
                </li>

                <li class="menu-has-children"><a href="#">Opciones</a>
                    <ul>
                        <li><a href="/miperfil">Mi perfil</a></li>
                        <li><a href="/cambiarclave">Cambiar contraseña</a></li>
                        <li><a href="/logout">Salir</a></li>
                    </ul>
                </li>
            </ul>
        </nav>

    </div>
</header>
<!-- #header -->

<br>
<br>




@yield('content')




<!--==========================
Footer
============================-->
<footer id="footer" style="margin-top: 627px">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="copyright">
                    &copy; Copyright <strong>BaSoCoop Inc.</strong>. All Rights Reserved
                </div>
                <div class="credits">
                    <!--
                      All the links in the footer should remain intact.
                      You can delete the links only if you purchased the pro version.
                      Licensing information: https://bootstrapmade.com/license/
                      Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Imperial
                    -->
                    {{--Bootstrap Templates by <a href="https://bootstrapmade.com/">BootstrapMade</a>--}}
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- #footer -->

<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

<script src="/js/jquery.js"></script>
<script src="/js/popper.min.js"></script>
<script src="/js/bootstrap.js"></script>
<script src="/js/datatables.js"></script>
<!-- Required JavaScript Libraries -->
{{--<script src="lib/jquery/jquery.min.js"></script>--}}
{{--<script src="lib/bootstrap/js/bootstrap.min.js"></script>--}}
<script src="/lib/superfish/hoverIntent.js"></script>
<script src="/lib/superfish/superfish.min.js"></script>
<script src="/lib/morphext/morphext.min.js"></script>
<script src="/lib/wow/wow.min.js"></script>
<script src="/lib/stickyjs/sticky.js"></script>
<script src="/lib/easing/easing.js"></script>

<!-- Template Specisifc Custom Javascript File -->
<script src="/js/custom.js"></script>

<script src="/contactform/contactform.js"></script>


</body>

</html>
