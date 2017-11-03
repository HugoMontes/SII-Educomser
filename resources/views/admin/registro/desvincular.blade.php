@extends('layouts.app')
@section('content')
<div class="container">

  <div class="panel panel-default">
    <div class="panel-heading">
      <h4><i class="fa fa-handshake-o"></i> Registro Vinculado</h4>
    </div>
    <div class="panel-body">
      <div class="row">
        <div class="col-md-6">
          <h4><i class="fa fa-btn fa-id-card-o"></i> Registro de Usuario</h4>
          <table class="table table-bordered">
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
        <div class="col-md-6">
          <table class="table table-bordered">
            <h4><i class="fa fa-btn fa-user"></i> Registro de Alumno</h4>
            <tbody>
              <tr>
                <th><i class="fa fa-btn fa-list-alt"></i> CI:</th>
                <td>{{ $persona->numero_ci }}</td>
              </tr>
              <tr>
                <th><i class="fa fa-btn fa-user"></i> Nombre Completo:</th>
                <td>{{ $persona->primer_apellido }} {{ $persona->segundo_apellido }} {{ $persona->nombres }}</td>
              </tr>
              <tr>
                <th><i class="fa fa-btn fa-envelope"></i> Correo Electrónico:</th>
                <td><a href="mailto:{{ $persona->email }}">{{ $persona->email }}</a></td>
              </tr>
              <tr>
                <th><i class="fa fa-btn fa-list-alt"></i> Código:</th>
                <td>{{ $persona->codigo }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="panel-footer" style="text-align: right;">
      <a href="{{ route('admin.registro.index') }}" class="btn btn-default">
        <i class="fa fa-close"></i> Cancelar
      </a>
      <a href="{{ route('admin.registro.vinculo.desvincular', $user->id) }}" class="btn btn-default">
        <i class="fa fa-chain-broken"></i> Desvincular
      </a>
    </div>
  </div>
</div>
@endsection

@section('script')
  @parent
  <script>
  $("#tbl-alumnos tbody tr").click(function(){
     $(this).addClass('selected').siblings().removeClass('selected');
     $(this).find('td:first input').prop("checked", true);
     //$("#radio_1").prop("checked", true)
     var value=$(this).find('td:first').html();
     console.log(value);
     /*alert(value);*/
  });
  /*
  $('.ok').on('click', function(e){
      alert($("#tbl-alumnos tr.selected td:first").html());
  });
  */
  </script>
@endsection
