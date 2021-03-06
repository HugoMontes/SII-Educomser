<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Educomser SRL - Educación en Computación y Servicios</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Select2 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
    @yield('styles')
</head>
<body id="app-layout">

    <!-- Facebook -->
    <div id="fb-root"></div>
    <script>
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.8";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>

    <nav class="navbar navbar-default navbar-static-top navbar-transparent">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}" title="Educación en Computación y Servicios">
                    <i class="fa fa-btn fa-laptop"></i>Educomser SRL <span class="badge">beta</span>
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                @if(Auth::user()->tipo == 'admin')
                  <!-- Left Side Of Navbar -->
                  <ul class="nav navbar-nav">
                      <!--<li><a href="{{ url('/home') }}">Inicio</a></li>-->
                      <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                              Administrar <span class="caret"></span>
                          </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ route('admin.carrera.index') }}"><i class="fa fa-btn fa-cubes"></i>Carreras</a></li>
                                <li><a href="{{ route('admin.curso.index') }}"><i class="fa fa-btn fa-cube"></i>Cursos</a></li>
                                <li><a href="{{ route('admin.docente.index') }}"><i class="fa fa-btn fa-user-plus"></i>Docentes</a></li>
                                <li><a href="{{ route('admin.alumno.index') }}"><i class="fa fa-btn fa-user"></i>Alumnos</a></li>
                                <li><a href="{{ route('admin.registro.index') }}"><i class="fa fa-btn fa-id-card-o"></i>Registrados</a></li>
                                <li><a href="{{ route('admin.user.index') }}"><i class="fa fa-btn fa-users"></i>Usuarios </a></li>
                                <li><a href="{{ route('admin.cronograma.index') }}"><i class="fa fa-btn fa-calendar"></i>Cronogramas de Cursos</a></li>
                                <li><a href="{{ route('admin.cronograma_carrera.index') }}"><i class="fa fa-btn fa-calendar"></i>Cronogramas de Carreras</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="{{ route('admin.ayuda.cursos') }}"><i class="fa fa-btn fa-question"></i>Ayuda</a></li>
                            </ul>
                      </li>
                  </ul>
                @endif

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Iniciar Sesión</a></li>
                        <li><a href="{{ url('/register') }}">Regístrese</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ route('usuario.configuracion.edit_form', Auth::user()->id) }}"><i class="fa fa-btn fa-cog"></i>Configuración</a></li>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Cerrar Sesión</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">@include('flash::message')</div>

    @yield('content')

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <!-- JQuery Form -->
    <script src="http://malsup.github.com/jquery.form.js"></script>
    <!-- Select2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}

    @yield('script')
</body>
</html>
