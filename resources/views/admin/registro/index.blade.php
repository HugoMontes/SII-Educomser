@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <!-- Panel Registrados -->
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
                       <a href="{{ route('admin.registro.index') }}" class="navbar-brand">
                           <i class="fa fa-btn fa-id-card-o"></i>Registrados
                       </a>
                   </div>

                   <div class="collapse navbar-collapse" id="menu-panel">
                       <ul class="nav navbar-nav">
                           <li>
                               <a href="{{ route('admin.registro.index') }}">
                                   <i class="fa fa-btn fa-th"></i>Ver Todos
                               </a>
                           </li>
                       </ul>

                       {!! Form::open(['route' => 'admin.registro.index', 'method' => 'GET', 'class' => 'navbar-form navbar-right', 'role' => 'search']) !!}
                       <div class="input-group">
                         {!! Form::label('buscar_por', 'Buscar por ', ['class' => 'control-label']) !!}
                         </div>
                       <div class="input-group">
                         {!! Form::select('buscar_por', ['paterno'=>'Apellido paterno', 'ci'=>'Cedula de identidad', 'email'=>'Correo electrónico', ], null, ['class'=>'form-control']) !!}
                       </div>
                       <div class="input-group">
                           {!! Form::text('buscar_user', null, ['placeholder' => 'Buscar ususario...', 'class' => 'form-control']) !!}
                           <span class="input-group-btn">
                               <button type="submit" class="btn btn-default"><span class="fa fa-btn fa-search"></span></button>
                           </span>
                       </div>
                       {!! Form::close() !!}
                   </div>
               </div>
            </nav>

            <div class="alert alert-warning" role="alert" id="msg-index" style="display: none;">
                <i class="fa fa-btn fa-spin fa-refresh"></i>
                <strong>Cargando!!!</strong> Un momento por favor...
            </div>

            <div class="content-ajax">
                @include('admin.registro.partial.table')
            </div>

        </div>
        <!-- / Panel Registrados -->
    </div>
</div>
@include('admin.registro.partial.destroy')
@endsection
