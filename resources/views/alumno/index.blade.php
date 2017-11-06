@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="panel panel-default">
          <nav class="navbar navbar-default">
             <div class="container">
                 <div class="navbar-header">
                     <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu-panel" aria-expanded="false">
                         <span class="sr-only">Toggle navigation</span>
                         <span class="icon-bar"></span>
                         <span class="icon-bar"></span>
                         <span class="icon-bar"></span>
                     </button>
                     <a href="{{ route('admin.alumno.getshow', $alumno->id) }}" class="navbar-brand">
                         <i class="fa fa-btn fa-user"></i>({{ $alumno->persona->codigo }}) {{ $alumno->persona->primer_apellido }} {{ $alumno->persona->segundo_apellido }} {{ $alumno->persona->nombres }}
                     </a>
                 </div>

             </div>
          </nav>

          <div class="panel-body">
              <p>Inicio (content)....</p>
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
