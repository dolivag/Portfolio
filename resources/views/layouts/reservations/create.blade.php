@extends('layouts.dashboard')

@section('page')

    @php $currentPage = 'reservations' @endphp

@endsection

@section('content')


<div class="col-lg-6">
    <div class="card">
        <div class="card-header">Introduce tus datos</div>
        <div class="card-body">
            <div class="card-title">
                <h3 class="text-center title-2">Haz una reserva</h3>
            </div>

            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach

            @if (Session::get('mensaje'))
            <div><p style="color:green;">{{Session::get('mensaje')}}</p></div>
            {{Session::forget('mensaje')}}
            @endif

            <hr>
            <form action="{{route('reservations.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name" class="control-label mb-1">Nombre</label>
                    <input required id="name"  name="name" type="text" class="form-control"  placeholder="P.ej: Taylor Otwell" value="{{old('name')}}">
                </div>
                <div class="form-group">
                    <label for="people" class="control-label mb-1">Nº de personas</label>
                    <input id="people" name="people" type="number" min="1" max="{{\App\Models\Bedroom::max('capacity')}}" class="form-control" placeholder="P.ej: 2" value="{{old('people')}}">
                </div>
                <div class="form-group">
                    <label for="checkin" class="control-label mb-1">Fecha de entrada</label>
                    <input id="checkin" name="checkin" type="date" min="{{\Carbon\Carbon::now()}}" max="2022-12-31" class="form-control" placeholder="P.ej: 2021-08-15" value="{{old('checkin')}}">
                </div>
                <div class="form-group">
                    <label for="checkout" class="control-label mb-1">Fecha de salida</label>
                    <input id="checkout" name="checkout" type="date" min="{{\Carbon\Carbon::now()}}" max="2022-12-31" class="form-control" placeholder="P.ej: 2021-08-17" value="{{old('checkout')}}">
                </div>
                <div class="form-group">
                    <label for="room" class="control-label mb-1">Habitación</label>
                    <select class="form-select " id="room" name="room" >
                        <option value='0'>-- Selecciona habitación --</option>
                    </select>
                <div>
                    <button type="submit" class="btn btn-lg btn-info btn-block">
                        <i class="fa fa-plus fa-lg"></i>  Agregar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection