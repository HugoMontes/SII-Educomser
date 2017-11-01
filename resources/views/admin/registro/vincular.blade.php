@extends('layouts.app')

@section('content')
<div class="container">

  {!! Form::open(['route' => 'admin.registro.vinculo.store', 'method' => 'POST', 'id' => 'form-create']) !!}
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4><i class="fa fa-btn fa-id-card-o"></i>Registro de Usuario</h4>
    </div>
    <div class="panel-body">
      <div class="row">
        <div class="col-md-7">
          <table class="table">
            <tbody>
              <tr>
                <th><i class="fa fa-btn fa-list-alt"></i> CI:</th>
                <td>{{ $user->ci }}</td>
              </tr>
              <tr>
                <th><i class="fa fa-btn fa-user"></i> Nombre Completo:</th>
                <td>{{ $user->paterno }} {{ $user->materno }} {{ $user->name }}</td>
              </tr>
              <tr>
                <th><i class="fa fa-btn fa-envelope"></i> Correo Electrónico:</th>
                <td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
              </tr>
              <tr>
                <th><i class="fa fa-btn fa-calendar"></i> Fecha de Registro:</th>
                <td>{{ $user->created_at->formatLocalized('%d-%B-%Y') }} ({{ $user->created_at->diffForHumans() }})</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="panel panel-default">
        <div class="panel-heading">
           <h3 class="panel-title">Lista de Alumnos</h3>
        </div>
        <div class="panel-body">
          <p>Seleccionar un registro de alumno para vincularlo con el usuario.</p>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th></th>
                <th>Código</th>
                <th>CI</th>
                <th>Nombre Completo</th>
                <th>Correo Electronico</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach($personas as $persona)
              <tr>
                <td style="text-align:center;"><input type="radio" name="codigo" value="{{ $persona->codigo }}" /></td>
                <td>{{ $persona->codigo }}</td>
                <td>{{ $persona->numero_ci }}</td>
                <td>{{ $persona->primer_apellido }} {{ $persona->segundo_apellido }} {{ $persona->primer_nombres }}</td>
                <td>{{ $persona->email }}</td>
                <td>
                  <a href="{{-- route('admin.persona.getshow', $persona->id) --}}" type="button" class="btn btn-sm btn-default" title="Ver Alumno">
                      <i class="fa fa-eye"></i>
                      <span class="sr-only">Ver Alumno</span>
                  </a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="panel-footer" style="text-align: right;">
      <button type="submit" id="btn-agregar" class="btn btn-default">
        <i class="fa fa-close"></i> Cancelar
      </button>
      <button type="submit" id="btn-agregar" class="btn btn-success">
        <i class="fa fa-handshake-o"></i> Vincular
      </button>
    </div>
  </div>
  {!! Form::close() !!}
      <!-- https://stackoverflow.com/questions/24750623/select-a-row-from-html-table-and-send-values-onclick-of-a-button -->

</div>
@endsection
