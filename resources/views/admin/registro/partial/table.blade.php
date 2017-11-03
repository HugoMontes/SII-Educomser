@section('styles')
  @parent
  <style media="screen">
    /* The switch - the box around the slider */
    .switch {
    position: relative;
    display: inline-block;
    width: 40px;
    height: 20px;
    }

    /* Hide default HTML checkbox */
    .switch input {display:none;}

    /* The slider */
    .slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    -webkit-transition: .4s;
    transition: .4s;
    }

    .slider:before {
    position: absolute;
    content: "";
    height: 14px;
    width: 14px;
    left: 3px;
    bottom: 3px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
    }

    input:checked + .slider {
    background-color: #449d44;
    border-color: #4cae4c;
    }

    input:focus + .slider {
    box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
    -webkit-transform: translateX(20px);
    -ms-transform: translateX(20px);
    transform: translateX(20px);
    }

    /* Rounded sliders */
    .slider.round {
    border-radius: 34px;
    }

    .slider.round:before {
    border-radius: 50%;
    }
  </style>
@endsection

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
            <label class="switch">
              <input type="checkbox" data-id="{{ $user->id }}" checked>
              <span class="slider round"></span>
            </label>
          @else
            <label class="switch">
              <input type="checkbox" data-id="{{ $user->id }}">
              <span class="slider round"></span>
            </label>
          @endif
        </td>
        <td>
          @if($user->persona_codigo!='')
            <a href="{{ route('admin.registro.desvincular_form', $user->id) }}" type="button" class="btn btn-sm btn-primary" title="Vinculado">
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
            @if($user->persona_codigo=='')
            <div class="btn-group" role="group" aria-label="Center Align">
                <button type="button" class="btn btn-sm btn-default" data-toggle="modal" data-target="#destroy" data-codigo="{{ $user->id }}" title="Eliminar">
                    <i class="fa fa-trash"></i>
                    <span class="sr-only">Eliminar</span>
                </button>
            </div>
            @endif
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

@section('script')
@parent
<script>
    // Reset Form
    function resetForm(obj){
        obj.find('form')[0].reset();
        $('.help-block>strong').html('');
        $('.has-error').removeClass('has-error');
    }

    // Llenar Form -> Eliminar
    $(document).on('click', 'button[data-target="#destroy"]', function(e){
        var idUser = $(this).attr('data-codigo');
        var url = '/admin/registro/' + idUser + '/edit';
        var data = 'user=' + idUser;
        $.ajax({
            url: url,
            headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            method: 'GET',
            dataType: 'JSON',
            data: data,
            beforeSend: function(e){
                $('#msg-destroy').css('display', 'block');
                $('#form-destroy').css('display', 'none');
            }
        }).done(function (response){
            $('#question-destroy').html("¿Está seguro de eliminar el registro de usuario: <i>"+response['user']['paterno']+' '+response['user']['materno']+' '+response['user']['name']+"</i>?");
            $('#btn-eliminar').css('display', 'inline-block');
            $('#msg-destroy').css('display', 'none');
            $('#form-destroy').css('display', 'block');
            $('#form-destroy').attr('data-id', idUser);
        });
    });

    // Cambiar estado
    $(document).on('click', 'input[type="checkbox"]', function(e){
      var idUser = $(this).attr('data-id');
      var url = '/admin/registro/' + idUser + '/change/status';
      var data = 'user=' + idUser;
      $.ajax({
          url: url,
          headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
          method: 'GET',
          dataType: 'JSON',
          data: data,
      }).done(function (response){
          $('#ajax-success').html(response['mensaje']);
          $('#ajax-success').css('display', 'block');
      });
    });
</script>
@endsection
