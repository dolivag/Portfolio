@extends('layouts.dashboard')

@section('page')

    @php $currentPage = 'bedrooms' @endphp

@endsection

@section('content')
<div class="col-lg-6">
    <div class="card">
        <div class="card-header">Introduce la información</div>
        <div class="card-body">
            <div class="card-title">
                <h3 class="text-center title-2">Agrega una habitación</h3>
            </div>

            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach

            <hr>
            <form action="{{route('bedrooms.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="roomNumber" class="control-label mb-1">Número de habitación</label>
                    <input required id="roomNumber" min="101" max="1000" name="roomNumber" type="number" class="form-control"  placeholder="P.ej: 110">
                </div>
                <div class="form-group">
                    <label for="capacity" class="control-label mb-1">Capacidad</label>
                    <input id="capacity" name="capacity" type="number" class="form-control" placeholder="P.ej: 3">
                </div>
                <div class="form-group">
                    <label for="price" class="control-label mb-1">Precio/noche</label>
                    <input id="price" name="price" type="number" min="1" step="0.01" class="form-control" placeholder="P.ej: 51.45">
                </div>
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