@extends('layouts.dashboard')

@section('page')

    @php $currentPage = 'home' @endphp

@endsection

@section('content')

<h2 class="pb-2 display-5">Bienvenid@ al Hotel Laravel</h2>
<br>
@if(!Auth::check())
    <h3 class="pb-2 display-5">Si tienes una cuenta, <a href="{{ route('login')}}">inicia sesión</a> para empezar a disfrutar de nuestros servicios</h3>
    <h3 class="pb-2 display-5">Si no, <a href="{{ route('register')}}">regístrate aquí</a></h3>
@else
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <img class="card-img-top" src="{!! asset('theme/images/habitacion.jpeg') !!}" alt="Card image cap">
            <div class="card-body">
                <h4 class="card-title mb-3">Ir a Habitaciones</h4>
                <p class="card-text">Click aquí para ver, hacer, borrar o editar habitaciones
                </p>
                <a class="btn btn-success mt-2 btn-block" href="{{route('bedrooms.index')}}">Habitaciones</a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <img class="card-img-top" src="{!! asset('theme/images/reserva.jpg') !!}" alt="Card image cap">
            <div class="card-body">
                <h4 class="card-title mb-3">Ir a Reservas</h4>
                <p class="card-text">Click aquí para ver, hacer, borrar o editar reservas
                </p>
                <a class="btn btn-success mt-2 btn-block" href="{{route('reservations.index')}}">Reservas</a>
            </div>
        </div>
    </div>
</div>

@endif
@endsection