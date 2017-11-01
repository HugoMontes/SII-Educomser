@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <nav class="navbar navbar-default">
               <div class="container">
                   <div class="navbar-header">
                       <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu-panel" aria-expanded="false">
                           <span class="sr-only">Toggle navigation</span>
                           <span class="icon-bar"></span>
                           <span class="icon-bar"></span>
                           <span class="icon-bar"></span>
                       </button>
                       <a href="{{ route('admin.docente.getshow', $user->id) }}" class="navbar-brand">
                           <i class="fa fa-btn fa-id-card-o"></i>{{ $user->paterno }} {{ $user->materno }} {{ $user->name }}
                       </a>
                   </div>
               </div>
            </nav>

            <div class="panel-body">
                <div class="row text-center">
                    <div class="col-md-3">
                        <strong><i class="fa fa-btn fa-list-alt"></i>CI:</strong><br/>
                        {{ $user->ci }}
                    </div>
                    <div class="col-md-3">
                        <strong><i class="fa fa-btn fa-envelope"></i>Correo Electrónico:</strong><br/>
                        <a href="mailto:{{ $user->email }}">{{ $user->email }}</a><br/>
                    </div>
                </div>
                <hr/>
                <div class="row text-center">
                    <div class="col-md-6">
                        <strong><i class="fa fa-btn fa-calendar"></i>Fecha de creación: </strong>{{ $user->created_at->formatLocalized('%d-%B-%Y') }} ({{ $user->created_at->diffForHumans() }})
                    </div>
                    <div class="col-md-6">
                        <strong><i class="fa fa-btn fa-calendar"></i>Fecha de modificación: </strong>
                        @if($user->updated_at)
                        {{ $user->updated_at->formatLocalized('%d-%B-%Y') }} ({{ $user->updated_at->diffForHumans() }})
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
