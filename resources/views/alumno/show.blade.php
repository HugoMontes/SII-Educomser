@extends('layouts.app')

@section('content')
<div class="container">
    @if($user->persona_codigo == '')
      <div class="alert alert-info" role="alert">
        <p><i class="fa fa-info-circle" aria-hidden="true"></i> Favor apersonarse a oficinas de <strong>EDUCOMSER</strong> para asociar su cuenta.</p>
      </div>
    @endif
    <div class="row">
        <div class="panel panel-default">
          <nav class="navbar navbar-default">
             <div class="container">
                 <div class="navbar-header">
                     <a href="{{ route('usuario.alumno.show', $user->id) }}" class="navbar-brand">
                       @if($user->persona_codigo == '')
                          <i class="fa fa-btn fa-user"></i>{{ $user->paterno }} {{ $user->materno }} {{ $user->name }}
                       @else
                          <i class="fa fa-btn fa-user"></i>({{ $alumno->persona->codigo }}) {{ $alumno->persona->primer_apellido }} {{ $alumno->persona->segundo_apellido }} {{ $alumno->persona->nombres }}
                       @endif
                     </a>
                 </div>

             </div>
          </nav>

          <div class="panel-body">
              @if($user->persona_codigo == '')
                @include('alumno.partial.show_user')
              @else
                @include('alumno.partial.show_alumno')
                @include('alumno.partial.show_curso')
                @include('alumno.partial.show_carrera')
              @endif
          </div>
            <div class="alert alert-warning" role="alert" id="msg-index" style="display: none;">
                <i class="fa fa-btn fa-spin fa-refresh"></i>
                <strong>Cargando!!!</strong> Un momento por favor...
            </div>
            <div class="content-ajax">
            </div>
        </div>
    </div>
</div>
@endsection
