@extends('layout')


@section('content')
<div class="container mx-auto">
    <div class="page-header">
        <h1><i class="fas fa-plus-circle"></i>  Añade un equipo</h1>
    </div>
    <p>Escribe la información del equipo que deseas crear</p>
</div>
<div>
    @foreach ($errors->all() as $error)

  <div>{{ $error }}</div>

@endforeach
    <form method="POST" action="{{route("teams.store")}}">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                
                <label for="name"  style="color: black;">Nombre del equipo</label>
                <input required autocomplete="on" id="name" name="name" class="form-control"
                        type="text" placeholder="P. ej: Madripour Riders">
            </div>
            <div class="form-group col-md-6">

                <label for="city"  style="color: black;">Ciudad</label>
                <input required autocomplete="on" id="city" name="city" class="form-control"
                        type="text" placeholder="P. ej: Madripour">
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-group col-md-6">
                <label  style="color: black;">Estadio</label>
                <input required autocomplete="on" name="stadium" id="stadium" class="form-control"
                        type="text" placeholder="P.ej: Carter Arena">
            </div>

            <div class="form-group col-md-6">
                <label  style="color: black;">Año de creación</label>
                <input required autocomplete="on" name="year" id="year" class="form-control"
                        type="text" placeholder="P.ej: 2023">
                        
            </div>
        </div>
        <div class="form-row ">
                <button type="submit" class="btn btn-success">Guardar</button>
                <a class="btn btn-primary" href="/teams">Volver al listado</a>
        </div>
    </form>
</div>

        
@endsection