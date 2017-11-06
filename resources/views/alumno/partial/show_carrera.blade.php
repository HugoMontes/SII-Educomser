<h3>
    <i class="fa fa-btn fa-cubes"></i>Carreras:
</h3>
@if($alumno->inscripcionesCarrera->count() > 0)
<div class="panel-group" id="carreras_cronograma" role="tablist" aria-multiselectable="true">
    @foreach($alumno->inscripcionesCarrera as $inscripcion)
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="heading_carrera_{{ $inscripcion->id }}">
            <div class="row">
                <h3 class="panel-title col-md-10" style="margin-top:5px;">
                    <a role="button" data-toggle="collapse" data-parent="#carreras_cronograma" href="#collapse_carrera_{{ $inscripcion->id }}" aria-expanded="true" aria-controls="collapseOne">
                        <i class="fa fa-btn fa-calendar"></i>({{ $inscripcion->lanzamientoCarrera->carrera->codigo }}) {{ $inscripcion->lanzamientoCarrera->carrera->nombre }}
                    </a>
                    <small>(Inscripción: {{ $inscripcion->updated_at->diffForHumans() }})</small>
                </h3>
            </div>
        </div>

        <div class="panel-collapse collapse" role="tabpanel" id="collapse_carrera_{{ $inscripcion->id }}" aria-labelledby="heading_{{ $inscripcion->id }}">
            <div class="panel-body">
                <div class="row text-center">
                    <div class="col-md-12">
                        <h4><strong>Información de la Carrera</strong></h4>
                    </div>
                </div>
                <hr/>
                <div class="row text-center">
                    <div class="col-md-4">
                        <strong><i class="fa fa-btn fa-cube"></i>Tipo de Carrera:</strong><br/>
                        {{ $inscripcion->lanzamientoCarrera->cronograma->tipo->nombre }}
                    </div>
                    <div class="col-md-4">
                        <strong><i class="fa fa-btn fa-calendar"></i>Fecha de Inicio:</strong><br/>
                        {{ $inscripcion->lanzamientoCarrera->cronograma->inicio->formatLocalized('%d-%B-%Y') }} ({{ $inscripcion->lanzamientoCarrera->cronograma->inicio->diffForHumans() }})
                    </div>
                    <div class="col-md-4">
                        <strong><i class="fa fa-btn fa-money"></i>Matrícula:</strong><br/>
                        Bs {{ $inscripcion->lanzamientoCarrera->matricula }}
                    </div>
                </div>
                <hr/>
                <div class="row text-center">
                    <div class="col-md-4">
                        <strong><i class="fa fa-btn fa-money"></i>Mensualidad:</strong><br/>
                        Bs {{ $inscripcion->lanzamientoCarrera->mensualidad }}
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
                @foreach($inscripcion->modulos as $modulo)
                  <div class="row text-center">
                      <div class="col-md-2">
                          <strong><i class="fa fa-btn fa-cube"></i>Módulo
                          </strong><br/>
                          ({{ $modulo->lanzamientoCurso->curso->codigo }}) {{ $modulo->lanzamientoCurso->curso->nombre }}
                      </div>
                      <div class="col-md-2">
                          <strong><i class="fa fa-btn fa-calendar"></i>Fecha de Inicio:</strong><br/>
                          {{ $modulo->lanzamientoCurso->cronograma->inicio->formatLocalized('%d-%B-%Y') }} ({{ $modulo->lanzamientoCurso->cronograma->inicio->diffForHumans() }})
                      </div>
                      @if($modulo->historial)
                        <div class="col-md-2">
                            <strong><i class="fa fa-btn fa-calendar"></i>Fecha de Finalización:</strong><br/>
                            {{ $modulo->historial->fecha_finalizacion->formatLocalized('%d-%B-%Y') }} ({{ $modulo->historial->fecha_finalizacion->diffForHumans() }})
                        </div>
                        <div class="col-md-2">
                            <strong><i class="fa fa-btn fa-mortar-board"></i>Nota:</strong><br/>
                            {{ $modulo->historial->nota }}%
                            @if($modulo->historial->nota >= 71)
                              (Aprobado)
                            @else
                              (Reprobado)
                            @endif
                        </div>
                        <div class="col-md-2">
                            <strong><i class="fa fa-btn fa-address-card-o"></i>¿Se extendió certificado?:</strong><br/>
                            @if($modulo->historial->certificado)
                              Si
                            @else
                              No
                            @endif
                        </div>
                        <div class="col-md-2">
                            <strong><i class="fa fa-btn fa-file-text-o"></i>Observaciones del historial:</strong><br/>
                            @if($modulo->historial->observaciones == null)
                              Sin observaciones
                            @else
                              {{ $modulo->historial->observaciones }}
                            @endif
                        </div>
                      @endif
                  </div>
                  <hr/>
                @endforeach
            </div>
        </div>
    </div>
    @endforeach
</div>
@else
<div class="panel-body">
    <div class="alert alert-info" role="alert">
        <i class="fa fa-info-circle" aria-hidden="true"></i> <strong>Mensaje!!!</strong> No se ha inscrito a ninguna carrera.
    </div>
</div>
@endif
