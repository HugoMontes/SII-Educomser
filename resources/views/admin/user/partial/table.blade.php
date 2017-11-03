@if($users->total() > 0)
<table class="table table-hover">
    <tr>
        <th>Nombre Completo</th>
        <th>Email</th>
        <th>Tipo</th>
        <th>Estado</th>
        <th></th>
    </tr>
    @foreach($users as $user)
    <tr>
        <td>{{ $user->paterno }} {{ $user->materno }} {{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td><span class="label label-default">{{ $user->tipo }}</span></td>
        <td>
          @if($user->is_active)
            <span class="label label-success">Activo</span>
          @else
            <span class="label label-danger">Inactivo</span>
          @endif
        </td>
        <td>
            <div class="btn-group" role="group" aria-label="Center Align">
                <button type="button" class="btn btn-sm btn-default" data-toggle="modal" data-target="#update" data-codigo="{{ $user->id }}" title="Editar">
                    <i class="fa fa-edit"></i>
                    <span class="sr-only">Editar</span>
                </button>
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
@section('script')
@parent
<script>
    // Reset Form
    function resetForm(obj){
        obj.find('form')[0].reset();
        $('.help-block>strong').html('');
        $('.has-error').removeClass('has-error');
    }
    // Validation
    function validation(response){
        if(response.responseJSON['name']){
            $('.wrapper-nombre').addClass('has-error');
            $('.wrapper-nombre .help-block>strong').html(response.responseJSON['name']);
        }else{
            $('.wrapper-nombre').removeClass('has-error');
            $('.wrapper-nombre .help-block>strong').html('');
        }
    }
    // Paginación
    $(document).on('click', '.pagination a', function (e){
        e.preventDefault();
        var href = $(this).attr('href').split('?');
        var url = href[0];
        var data = href[1];
        $.ajax({
            url: url,
            method: 'GET',
            dataType: 'JSON',
            data: data,
            beforeSend: function(e){
                $('#msg-index').css('display', 'block');
            }
        }).done(function (response){
            $('.content-ajax').html(response);
            $('#msg-index').css('display', 'none');
        });
    });

    // Llenar Form -> Editar
    $(document).on('click', 'button[data-target="#update"]', function(e){
        var idUser = $(this).attr('data-codigo');
        var url = '/admin/user/' + idUser + '/edit';
        var data = 'user=' + idUser;
        $.ajax({
            url: url,
            headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            method: 'GET',
            dataType: 'JSON',
            data: data,
            beforeSend: function(e){
                $('#msg-update').css('display', 'block');
                $('#form-update').css('display', 'none');
            }
        }).done(function (response){
          console.log(response['user']);
            $.each(response['user'], function(key, value){
                $('input[name="'+key+'"]').val(value);
                $('select[name="'+key+'"]').val(value);
            });
            //$('select[name="'+response['user']+'"]').val(value);
            $('#msg-update').css('display', 'none');
            $('#form-update').css('display', 'block');
            $('#form-update').attr('data-id', idUser);
        });
    });

    // Llenar Form -> Eliminar
    $(document).on('click', 'button[data-target="#destroy"]', function(e){
        var idUser = $(this).attr('data-codigo');
        var url = '/admin/user/' + idUser + '/edit';
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
            $('#question-destroy').html("¿Está seguro de eliminar el usuario: <i>"+ response['user']['name'] +"</i>?");
            $('#btn-eliminar').css('display', 'inline-block');
            $('#msg-destroy').css('display', 'none');
            $('#form-destroy').css('display', 'block');
            $('#form-destroy').attr('data-id', idUser);
        });
    });
</script>
@endsection
