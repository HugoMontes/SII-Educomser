<h3>
    <i class="fa fa-btn fa-cube"></i>Cursos:
</h3>
@if($alumno->inscripciones->count() > 0)
<div class="panel-group" id="cursos_cronograma" role="tablist" aria-multiselectable="true">
    @foreach($alumno->inscripciones as $inscripcion)
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="heading_curso_{{ $inscripcion->id }}">
            <div class="row">
                <h3 class="panel-title col-md-10" style="margin-top:5px;">
                    <a role="button" data-toggle="collapse" data-parent="#cursos_cronograma" href="#collapse_curso_{{ $inscripcion->id }}" aria-expanded="true" aria-controls="collapseOne">
                        <i class="fa fa-btn fa-calendar"></i>({{ $inscripcion->lanzamientoCurso->curso->codigo }}) {{ $inscripcion->lanzamientoCurso->curso->nombre }}
                    </a>
                    <small>(Inscripción: {{ $inscripcion->updated_at->diffForHumans() }})</small>
                </h3>
            </div>
        </div>

        <div class="panel-collapse collapse" role="tabpanel" id="collapse_curso_{{ $inscripcion->id }}" aria-labelledby="heading_{{ $inscripcion->id }}">
            <div class="panel-body">
                <div class="row text-center">
                    <div class="col-md-12">
                        <h4><strong>Información del Curso</strong></h4>
                    </div>
                </div>
                <hr/>
                <div class="row text-center">
                    <div class="col-md-4">
                        <strong><i class="fa fa-btn fa-cube"></i>Tipo de Curso:</strong><br/>
                        {{ $inscripcion->lanzamientoCurso->cronograma->tipo->nombre }}
                    </div>
                    <div class="col-md-4">
                        <strong><i class="fa fa-btn fa-calendar"></i>Fecha de Inicio:</strong><br/>
                        {{ $inscripcion->lanzamientoCurso->cronograma->inicio->formatLocalized('%d-%B-%Y') }} ({{ $inscripcion->lanzamientoCurso->cronograma->inicio->diffForHumans() }})
                    </div>
                    <div class="col-md-4">
                        <strong><i class="fa fa-btn fa-money"></i>Costo Total:</strong><br/>
                        Bs {{ $inscripcion->lanzamientoCurso->costo }}
                    </div>
                </div>
                <hr/>
                <div class="row text-center">
                    <div class="col-md-4">
                        <strong><i class="fa fa-btn fa-user-plus"></i>Docente(s):</strong><br/>
                        @if($inscripcion->lanzamientoCurso->docentes()->count() > 0)
                        @foreach($inscripcion->lanzamientoCurso->docentes as $docente)
                        {{ $docente->persona->primer_apellido }} {{ $docente->persona->segundo_apellido }} {{ $docente->persona->nombres }} <br/>
                        @endforeach
                        @else
                        Sin Docente Asignado
                        @endif
                    </div>
                    <div class="col-md-4">
                        <strong><i class="fa fa-btn fa-calendar"></i>Fecha de Inscripción:</strong><br/>
                        {{ $inscripcion->created_at->formatLocalized('%d-%B-%Y') }} ({{ $inscripcion->created_at->diffForHumans() }})
                    </div>
                    <div class="col-md-4">
                        <strong><i class="fa fa-btn fa-file-text-o"></i>Observaciones de la inscripción:</strong><br/>
                        @if($inscripcion->observaciones == null)
                        Sin observaciones
                        @else
                        {{ $inscripcion->observaciones }}
                        @endif
                    </div>
                </div>
                <hr/>
                <div class="row text-center">
                    @if($inscripcion->historial)
                      <div class="col-md-3">
                          <strong><i class="fa fa-btn fa-calendar"></i>Fecha de Finalización:</strong><br/>
                          {{ $inscripcion->historial->fecha_finalizacion->formatLocalized('%d-%B-%Y') }} ({{ $inscripcion->historial->fecha_finalizacion->diffForHumans() }})
                      </div>
                      <div class="col-md-3">
                          <strong><i class="fa fa-btn fa-mortar-board"></i>Nota:</strong><br/>
                          {{ $inscripcion->historial->nota }}%
                          @if($inscripcion->historial->nota >= 71)
                            (Aprobado)
                          @else
                            (Reprobado)
                          @endif
                      </div>
                      <div class="col-md-3">
                          <strong><i class="fa fa-btn fa-address-card-o"></i>¿Se extendió certificado?:</strong><br/>
                          @if($inscripcion->historial->certificado)
                            Si
                          @else
                            No
                          @endif
                      </div>
                      <div class="col-md-3">
                        <strong><i class="fa fa-btn fa-file-text-o"></i>Observaciones del historial:</strong><br/>
                        @if($inscripcion->historial->observaciones == null)
                          Sin observaciones
                        @else
                          {{ $inscripcion->historial->observaciones }}
                        @endif
                    </div>
                    @endif
                </div>
                <hr/>
                <div class="row text-center">
                    <div class="col-md-12">
                        <h4><strong>Información de los Pagos</strong></h4>
                    </div>
                </div>
                <hr/>
                @if($inscripcion->pagos->count() > 0)
                @foreach($inscripcion->pagos as $pago)
                <div class="row">
                    <div class="col-md-4">
                        <strong>Fecha</strong><br/>
                        {{ $pago->created_at->diffForHumans() }} <br/>
                        {{ $pago->created_at }}
                    </div>
                    <div class="col-md-2">
                        <strong>Concepto</strong><br/>
                        {{ $pago->concepto->descripcion }}
                    </div>
                    <div class="col-md-2">
                        <strong>Monto</strong><br/>
                        Bs {{ $pago->monto }}
                    </div>
                    <div class="col-md-2">
                        <strong>Factura</strong><br/>
                        {{ $pago->numero_factura }}
                    </div>
                    <div class="col-md-2">
                        <strong>Observaciones</strong><br/>
                        @if($pago->observaciones != null && $pago->observaciones != "")
                        {{ $pago->observaciones }}
                        @else
                        Sin Observaciones
                        @endif
                    </div>
                </div>
                @endforeach
                <hr/>
                <div class="row">
                    <div class="col-md-2 col-md-offset-4">
                        <strong>Total</strong>
                    </div>
                    <div class="col-md-2">
                        <strong>Bs {{ $inscripcion->pagos->sum('monto') }}</strong>
                    </div>
                </div>
                @else
                <div class="row">
                    <div class="col-md-12">
                        <strong>* No se encontraron pagos...</strong>
                    </div>
                </div>
                @endif
            </div>
        </div>

    </div>
    @endforeach
</div>
@else
<div class="panel-body">
    <div class="alert alert-info" role="alert">
        <i class="fa fa-info-circle" aria-hidden="true"></i> <strong>Mensaje!!!</strong> No se ha inscrito a ningún curso.
    </div>
</div>
@endif
