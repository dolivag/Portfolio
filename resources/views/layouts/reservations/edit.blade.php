@extends('layouts.dashboard')

@section('page')

    @php $currentPage = "reservations" @endphp

@endsection

@section('content')

<div class="col-lg-6">
    <div class="card">
        <div class="card-header">Cambia de información de la reserva que consideres conveniente</div>
        <div class="card-body">
            <div class="card-title">
                <h3 class="text-center title-2">Edita la reserva de {{ $reservation->name }}</h3>
            </div>

            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach

            @if (Session::get('mensaje'))
                <div><p style="color:green;">{{Session::get('mensaje')}}</p></div>
                {{Session::forget('mensaje')}}
            @endif

            <hr>
            <form action="{{route('reservations.update', [$reservation])}}" method="post">
                @method('put')
                @csrf
                <input type="hidden" id="reservedRoom" name="reservedRoom" value="{{$reservation->bedroom->roomNumber}}">
                <div class="form-group">
                    <label for="name" class="control-label mb-1">Nombre de la reserva</label>
                    <input id="name" name="name" type="text" class="form-control" value="{{ $reservation->name }}">
                </div>
                <div class="form-group">
                    <label for="people" class="control-label mb-1">Nº de personas</label>
                    <input id="people" name="people" type="number" min="1" max="{{\App\Models\Bedroom::max('capacity')}}"" class="form-control" value={{ $reservation->people }}>
                </div>
                <div class="form-group">
                    <label for="checkin" class="control-label mb-1">Fecha de entrada</label>
                    <input id="checkin" name="checkin" type="date" min="{{\Carbon\Carbon::now()}}" max="2022-12-31" class="form-control" value={{ $reservation->checkin }}>
                </div>
                <div class="form-group">
                    <label for="checkout" class="control-label mb-1">Fecha de salida</label>
                    <input id="checkout" name="checkout" type="date" min="{{\Carbon\Carbon::now()}}" max="2022-12-31" class="form-control" value={{ $reservation->checkout }}>
                </div>
                <div class="form-group">
                    <label for="room" class="control-label mb-1">Habitación</label>
                    <select class="form-select " id="room" name="room" >
                        <option value='0'>-- Selecciona habitación --</option>
                    </select>
         
                    
                </div>
                <div>
                    <button type="submit" class="btn btn-lg btn-info btn-block">
                        <i class="fas fa-edit fa-lg"></i> Editar
                    </button>
                </div>
            </form>
            <div class="mt-2">
                <a href="/reservations" class="btn btn-danger btn-block"> Volver</a>
            </div>
        </div>
    </div>
</div>


@endsection