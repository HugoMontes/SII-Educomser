@if($users->total() > 0)
<table class="table table-hover">
    <tr>
        <th>CI</th>
        <th>Nombre Completo</th>
        <th>Email</th>
        <th>Fecha de registro</th>
        <th>Estado</th>
        <th>Vinculo</th>
        <th></th>
    </tr>
    @foreach($users as $user)
    <tr>
        <td>{{ $user->ci }}</td>
        <td>{{ $user->paterno }} {{ $user->materno }} {{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ Carbon\Carbon::parse($user->created_at)->format('d/m/Y') }}</td>
        <td>
          @if($user->is_active)
            <span class="label label-success">Activo</span>
          @else
            <span class="label label-danger">Inactivo</span>
          @endif
        </td>
        <td>
          @if($user->persona_codigo!='')
            <a href="{{ route('admin.registro.desvincular_form', $user->id) }}" type="button" class="btn btn-sm btn-success" title="Vinculado">
                <i class="fa fa-handshake-o"></i>
                <span class="sr-only">Vinculado</span>
            </a>
          @else
            <a href="{{ route('admin.registro.vincular_form', $user->id) }}" type="button" class="btn btn-sm btn-default" title="Vincular">
                <i class="fa fa-handshake-o"></i>
                <span class="sr-only">Vincular</span>
            </a>
          @endif
        </td>
        <td>
            <div class="btn-group" role="group" aria-label="Center Align">
                <button type="button" class="btn btn-sm btn-default" data-toggle="modal" data-target="#destroy" data-codigo="{{ $user->id }}" title="Eliminar">
                    <i class="fa fa-trash"></i>
                    <span class="sr-only">Eliminar</span>
                </button>
            </div>
        </td>
    </tr>
    @endforeach
</table>
@else
<div class="panel-body">
    <div class="alert alert-warning" role="alert">
        <i class="fa fa-btn fa-database"></i>
        <strong>Oops!!!</strong> No se encontraron usuarios en la base de datos. Intenta <strong>agregar un nuevo usuario</strong>
    </div>
</div>
@endif
