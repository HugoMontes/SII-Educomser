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
                       <a href="{{ route('admin.area.index') }}" class="navbar-brand">
                           <i class="fa fa-btn fa-th-large"></i>Áreas
                       </a>
                   </div>

                   <div class="collapse navbar-collapse" id="menu-panel">
                       <ul class="nav navbar-nav">
                           <li>
                               <button type="button" class="btn btn-default navbar-btn" data-toggle="modal" data-target="#create">
                                   <i class="fa fa-btn fa-plus"></i>Agregar
                               </button>
                           </li>
                           <li>
                               <a href="{{ route('admin.area.index') }}">
                                   <i class="fa fa-btn fa-th"></i>Ver Todos
                               </a>
                           </li>
                       </ul>

                       {!! Form::open(['route' => 'admin.area.index', 'method' => 'GET', 'class' => 'navbar-form navbar-right', 'role' => 'search']) !!}
                       <div class="input-group">
                           {!! Form::text('buscar_area', null, ['placeholder' => 'Buscar área...', 'class' => 'form-control']) !!}
                           <span class="input-group-addon">
                               <i class="fa fa-btn fa-search"></i>
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
                @include('admin.area.partial.table')
            </div>

        </div>

    </div>
</div>
@include('admin.area.partial.create')
@include('admin.area.partial.update')
@include('admin.area.partial.destroy')
@endsection
