@extends('layouts.frontend')

@section('title', 'Educomser SRL - Registro')

@section('content')
<div class="container" style="height: 100vh;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default" style="margin-top: 20px;">
                <div class="panel-heading" style="font-size: x-large; font-weight: bold; text-align: center; padding: 20px 0;">Regístrese</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {!! csrf_field() !!}
                        <div class="form-group{{ $errors->has('ci') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Cedula de identidad*</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="ci" value="{{ old('ci') }}" placeholder="Ingresar su cédula de identidad">
                                @if ($errors->has('ci'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ci') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Nombre*</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Ingresar su nombre">
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('paterno') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Apellido paterno*</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="paterno" value="{{ old('paterno') }}" placeholder="Ingresar su apellido paterno">
                                @if ($errors->has('paterno'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('paterno') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('materno') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Apellido materno</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="materno" value="{{ old('materno') }}" placeholder="Ingresar su apellido materno">
                                @if ($errors->has('materno'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('materno') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Correo Electrónico*</label>
                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="ejemplo@gmail.com">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Contraseña*</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Confirmar Contraseña*</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i>&nbsp;&nbsp;&nbsp;Registrar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
