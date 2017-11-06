<div class="form-group wrapper-name">
  {!! Form::label('name', 'Nombre', ['class' => 'col-md-4 control-label']) !!}
  <div class="col-md-6">
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ej. Juan']) !!}
    <span class="help-block" style="display:none;">
      <strong></strong>
    </span>
  </div>
</div>
<div class="form-group wrapper-paterno">
  {!! Form::label('paterno', 'Apellido paterno', ['class' => 'col-md-4 control-label']) !!}
  <div class="col-md-6">
    {!! Form::text('paterno', null, ['class' => 'form-control', 'placeholder' => 'Ej. Perez']) !!}
    <span class="help-block" style="display:none;">
      <strong></strong>
    </span>
  </div>
</div>
<div class="form-group wrapper-materno">
  {!! Form::label('materno', 'Apellido materno', ['class' => 'col-md-4 control-label']) !!}
  <div class="col-md-6">
    {!! Form::text('materno', null, ['class' => 'form-control', 'placeholder' => 'Ej. Gomez']) !!}
    <span class="help-block" style="display:none;">
      <strong></strong>
    </span>
  </div>
</div>
<div class="form-group wrapper-email">
  {!! Form::label('email', 'Correo electrónico', ['class' => 'col-md-4 control-label']) !!}
  <div class="col-md-6">
    {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Ej. juan@educomser.com']) !!}
    <span class="help-block" style="display:none;">
      <strong></strong>
    </span>
  </div>
</div>
<div class="form-group wrapper-passwor">
  {!! Form::label('password', 'Contraseña', ['class' => 'col-md-4 control-label']) !!}
  <div class="col-md-6">
    {!! Form::password('password', ['class' => 'form-control']) !!}
    <span class="help-block" style="display:none;">
      <strong></strong>
    </span>
  </div>
</div>
<div class="form-group wrapper-tipo">
  {!! Form::label('tipo', 'Tipo de usuario', ['class' => 'col-md-4 control-label']) !!}
  <div class="col-md-6">
    {!! Form::select('tipo', [''=>'Seleccione tipo de usuario', 'admin'=>'Administrador', 'gerencia'=>'Gerencia', 'docente'=>'Docente', 'recepcion'=>'Recepción', ], null, ['class'=>'form-control']) !!}
    <span class="help-block" style="display: none;">
      <strong></strong>
    </span>
  </div>
</div>
<div class="form-group wrapper-is_active">
  {!! Form::label('is_active', 'Estado', ['class' => 'col-md-4 control-label']) !!}
  <div class="col-md-6">
    {!! Form::select('is_active', ['1'=>'Activo', '0'=>'Inactivo'], null, ['class'=>'form-control']) !!}
  </div>
</div>
