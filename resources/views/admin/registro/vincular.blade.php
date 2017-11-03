@extends('layouts.app')
@section('styles')
  <style media="screen">
    #tbl-alumnos td {
      /*border: 1px #DDD solid;*/
      /*padding: 5px;*/
      cursor: pointer;
    }
    #tbl-alumnos th {
      background-color: #f5f5f5;
    }
    .selected {
      background-color: #186ba0;
      color: #FFF;
    }
  </style>
@endsection

@section('content')
<div class="container">

  {!! Form::open(['route' => 'admin.registro.vinculo.vincular', 'method' => 'POST', 'id' => 'form-create']) !!}
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
           <h3 class="panel-title">Seleccionar un registro de alumno para vincularlo con el usuario</h3>
        </div>
        <div class="panel-body">
          @if ($errors->has('codigo'))
            <div class="alert alert-danger" role="alert">Favor seleccionar un registro de alumno para vincularlo. {{ $errors->first('codigo') }}</div>
          @endif
          <table id="tbl-alumnos" class="table table-bordered">
            <thead>
              <tr>
                <th></th>
                <th>Código</th>
                <th>CI</th>
                <th>Nombre Completo</th>
                <th>Correo Electronico</th>
              </tr>
            </thead>
            <tbody>
              @foreach($personas as $persona)
              <tr>
                <td style="text-align:center;"><input type="radio" name="codigo" value="{{ $persona->codigo }}" /></td>
                <td>{{ $persona->codigo }}</td>
                <td>{{ $persona->numero_ci }}</td>
                <td>{{ $persona->primer_apellido }} {{ $persona->segundo_apellido }} {{ $persona->nombres }}</td>
                <td>{{ $persona->email }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="panel-footer" style="text-align: right;">
      <a href="{{ route('admin.registro.index') }}" class="btn btn-default">
        <i class="fa fa-close"></i> Cancelar
      </a>
      <input type="hidden" name="id_user" value="{{ $user->id }}">
      <button type="submit" id="btn-agregar" class="btn btn-default">
        <i class="fa fa-handshake-o"></i> Vincular
      </button>
    </div>
  </div>
  {!! Form::close() !!}
</div>
@endsection

@section('script')
  @parent
  <script>
  $("#tbl-alumnos tbody tr").click(function(){
     $(this).addClass('selected').siblings().removeClass('selected');
     $(this).find('td:first input').prop("checked", true);
     var value=$(this).find('td:first').html();
     console.log(value);
  });
  </script>
@endsection
