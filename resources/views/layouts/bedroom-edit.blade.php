@extends('layouts.dashboard')

@section('page')

    @php $currentPage = 'bedrooms' @endphp

@endsection

@section('content')

<div class="col-lg-6">
    <div class="card">
        <div class="card-header">Cambia de información que consideres conveniente</div>
        <div class="card-body">
            <div class="card-title">
                <h3 class="text-center title-2">Edita la habitación nº {{ $bedroom->roomNumber }}</h3>
            </div>

            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach

            <hr>
            <form action="{{route('bedrooms.update', [$bedroom])}}" method="post">
                @method('put')
                @csrf
                <div class="form-group">
                    <label for="roomNumber" class="control-label mb-1">Número de habitación</label>
                    <div class="alert alert-warning" role="alert">
                        El número de habitación no se puede modificar
                    </div>
                </div>
                <div class="form-group">
                    <label for="capacity" class="control-label mb-1">Capacidad</label>
                    <input id="capacity" name="capacity" type="number" class="form-control" value={{ $bedroom->capacity }}>
                </div>
                <div class="form-group">
                    <label for="price" class="control-label mb-1">Precio/noche</label>
                    <input id="price" name="price" type="number" min="1" step="0.01" class="form-control" value={{ $bedroom->price }}>
                </div>
                <div>
                    <button type="submit" class="btn btn-lg btn-info btn-block">
                        <i class="fas fa-edit fa-lg"></i> Editar
                    </button>
                </div>
            </form>
            <div class="mt-2">
                <a href="/bedrooms" class="btn btn-danger btn-block"> Volver</a>
            </div>
        </div>
    </div>
</div>


@endsection