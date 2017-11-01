<div class="form-group wrapper-nombre">
    {!! Form::label('name', 'Nombre *', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
      {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ej. Juan']) !!}
      <span class="help-block">
          <strong></strong>
      </span>
    </div>

    {!! Form::label('paterno', 'Apellido paterno *', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
      {!! Form::text('paterno', null, ['class' => 'form-control', 'placeholder' => 'Ej. Perez']) !!}
      <span class="help-block">
          <strong></strong>
      </span>
    </div>

    {!! Form::label('materno', 'Apellido materno', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
      {!! Form::text('materno', null, ['class' => 'form-control', 'placeholder' => 'Ej. Gomez']) !!}
      <span class="help-block">
          <strong></strong>
      </span>
    </div>

    {!! Form::label('email', 'Email *', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
      {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Ej. juan@educomser.com']) !!}
      <span class="help-block">
          <strong></strong>
      </span>
    </div>

    {!! Form::label('password', 'Contraseña *', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
      {!! Form::password('password', ['class' => 'form-control']) !!}
      <span class="help-block">
          <strong></strong>
      </span>
    </div>

    {!! Form::label('tipo', 'Tipo de usuario *', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
      {!! Form::select('tipo', [''=>'Seleccione tipo de usuario', 'admin'=>'Administrador', 'gerencia'=>'Gerencia', 'docente'=>'Docente', 'recepcion'=>'Recepción', ], null, ['class'=>'form-control']) !!}
      <span class="help-block">
          <strong></strong>
      </span>
    </div>

    {!! Form::label('is_active', 'Estado', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
      {!! Form::select('is_active', ['1'=>'Activo', '0'=>'Inactivo'], null, ['class'=>'form-control']) !!}
    </div>
</div>
<span>Todos los campos con asterisco(*) son obligarorios.</span>
