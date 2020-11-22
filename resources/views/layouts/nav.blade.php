@section('nav')
    <nav id="nav-menu-container">
        <ul class="nav-menu">
            <li><a href="/home">Inicio</a></li>
            <li><a href="/coop">Premisas</a></li>
            <li><a href="#portfolio">Variables</a></li>
            <li class="menu-has-children"><a href="#">Encuesta</a>
                <ul>
                    <li><a href="/encuesta">Gestionar Encuestas</a></li>
                    <li><a href="/mostrar">Mostrar Encuestas</a></li>
                    {{--<li><a href="/estadisticaEnc">Estadistica</a></li>--}}
                </ul>
            </li>
            <li><a href="/proyectos">Programa</a></li>
            {{--<li><a href="#team">Variable V</a></li>--}}
            <li class="menu-has-children"><a href="#">Principios</a>
                <ul>
                    <li><a href="/VarI">Membresía</a></li>
                    <li><a href="/VarII">Control Democrático</a></li>
                    <li><a href="/VarIII">Participación Económica</a></li>

                </ul>
            </li>
            <li><a href="#contact">Contact Us</a></li>
        </ul>
    </nav>
@endsection