@extends('layouts.dashboard')

@section('page')

    @php $currentPage = 'bedrooms' @endphp

@endsection

@section('content')

<div class="row">
    <div class="col-lg-4">
        <div class="row">
            <div class="card">
                <div class="card-header">Información de la habitación</div>
                    <div class="card-body">
                        <dl class="row">
                            <dt class="col-sm-4">Número</dt>
                            <dd class="col-sm-8">{{$bedroom->roomNumber}}</dd>
                            <dt class="col-sm-4">Planta</dt>
                            <dd class="col-sm-8">{{floor($bedroom->roomNumber/100)}}ª planta</dd>
                            <dt class="col-sm-4">Capacidad</dt>
                            <dd class="col-sm-8">{{$bedroom->capacity}} personas</dd>
                            <dt class="col-sm-4">Precio/noche</dt>
                            <dd class="col-sm-8">{{$bedroom->price}} €/noche</dd>
                        </dl>
                    </div>
            </div>
        </div>
        
        @if ($bedroom->is_cheaper)
        <div class="row">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="{!! asset('theme/images/trophy-icon.png') !!}" class="card-img p-3" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                    <h5 class="card-title">Habitación más barata</h5>
                    <p class="card-text">Entre todas las habitaciones para {{$bedroom->capacity}} personas</p>
                    </div>
                </div>
                </div>
            </div>
        </div>
@endif
        
    </div>

    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">Historial de reservas</div>
                <div class="card-body">
                    @foreach($bedroom->reservations as $reservation)
                    <dl class="row">
                        <dt class="col-sm-4">Nombre</dt>
                        <dd class="col-sm-8">{{$reservation->name}}</dd>
                        <dt class="col-sm-4">Personas</dt>
                        <dd class="col-sm-8">{{$reservation->people}}</dd>
                        <dt class="col-sm-4">Fecha entrada</dt>
                        <dd class="col-sm-8">{{\Carbon\Carbon::parse($reservation->checkin)->format('j F, Y')}}</dd>
                        <dt class="col-sm-4">Fecha salida</dt>
                        <dd class="col-sm-8">{{\Carbon\Carbon::parse($reservation->checkout)->format('j F, Y')}}</dd>
                        <dt class="col-sm-4">Días</dt>
                        <dd class="col-sm-8">{{$reservation->days}}</dd>
                    </dl>
                    <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</div>

@endsection