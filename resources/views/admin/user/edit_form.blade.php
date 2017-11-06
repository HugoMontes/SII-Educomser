@extends('layouts.app')

@section('content')
  <div class="container">
      <div class="row">

          <div class="panel panel-default">
              <nav class="navbar navbar-default">
                 <div class="container">
                     <div class="navbar-header">
                         <a href="{{ route('admin.user.index') }}" class="navbar-brand">
                            <i class="fa fa-btn fa-cog"></i> Configuracion de la cuenta
                         </a>
                     </div>
                 </div>
              </nav>

              <div class="panel-body">
                {!! Form::open(['route' => ['usuario.configuracion.update_form', $user], 'method' => 'PUT', 'id' => 'form-update']) !!}
                  <div class="form-group">
                    {!! Form::label('name', 'Nombre', ['class' => 'control-label']) !!}
                    {!! Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => 'Ej. Juan']) !!}
                    <span class="help-block" style="display:none;">
                      <strong></strong>
                    </span>
                  </div>
                  <div class="form-group">
                    {!! Form::label('paterno', 'Apellido paterno', ['class' => 'control-label']) !!}
                    {!! Form::text('paterno', $user->paterno, ['class' => 'form-control', 'placeholder' => 'Ej. Perez']) !!}
                    <span class="help-block" style="display:none;">
                      <strong></strong>
                    </span>
                  </div>
                  <div class="form-group">
                    {!! Form::label('materno', 'Apellido materno', ['class' => 'control-label']) !!}
                    {!! Form::text('materno', $user->materno, ['class' => 'form-control', 'placeholder' => 'Ej. Gomez']) !!}
                    <span class="help-block" style="display:none;">
                      <strong></strong>
                    </span>
                  </div>
                  <div class="form-group">
                    {!! Form::label('email', 'Correo electrónico', ['class' => 'control-label']) !!}
                    {!! Form::text('email', $user->email, ['class' => 'form-control', 'placeholder' => 'Ej. juan@educomser.com']) !!}
                    <span class="help-block" style="display:none;">
                      <strong></strong>
                    </span>
                  </div>
                  <div class="form-group">
                    {!! Form::label('password', 'Contraseña', ['class' => 'control-label']) !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                    <span class="help-block" style="display:none;">
                      <strong></strong>
                    </span>
                  </div>
                  <div class="form-group">
                    <a href="{{ redirect()->getUrlGenerator()->previous() }}" class="btn btn-default">
                      <i class="fa fa-times" aria-hidden="true"></i> Cancelar
                    </a>
                    <button type="submit" class="btn btn-default">
                      <i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar
                    </button>
                  </div>
                {!! Form::close() !!}
              </div>
          </div>
      </div>
  </div>
@endsection
