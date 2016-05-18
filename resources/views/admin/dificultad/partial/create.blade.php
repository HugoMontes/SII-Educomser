<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="Agregar">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="Agregar">
                    <i class="fa fa-btn fa-level-up"></i>Agregar Dificultad
                </h4>
            </div>

            <div class="modal-body">
                {!! Form::open(['route' => 'admin.dificultad.store', 'method' => 'POST', 'id' => 'form-create', 'class' => 'form-horizontal']) !!}

                @include('admin.dificultad.partial.form')

                {!! Form::close() !!}
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    <i class="fa fa-btn fa-close"></i>Cancelar
                </button>
                <button id="btn-agregar" type="button" class="btn btn-default">
                    <i class="fa fa-btn fa-save"></i>Guardar
                </button>
            </div>
        </div>
    </div>
</div>

@section('script')
@parent
<script>
    // Reset Form
    $('.modal#create').on('show.bs.modal', function(e){
        resetForm($(this));
    });
    $('.modal#create').on('hidden.bs.modal', function(e){
        resetForm($(this));
    });
    // Crear
    var formCreate = $('#form-create');
    $(document).on('click', '#btn-agregar', function(){
        var url = formCreate.attr('action');
        var data = formCreate.serialize();
        $.ajax({
            url: url,
            method: 'POST',
            dataType: 'JSON',
            data: data
        }).done (function (response){
            window.location.href = "/admin/dificultad";
        }).fail (function (response){
            validation(response);
        });
    });
</script>
@endsection
