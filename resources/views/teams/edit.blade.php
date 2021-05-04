@extends('layout')


@section('content')
<!--Modify header page: title and description-->
<div class="container mx-auto">
    <div class="page-header">
        <h1><i class="fas fa-exchange-alt"></i> Modificar equipo</h1>
    </div>
    <p>Cambia la información que consideres necesaria del equipo</p>
</div>


<div class="container">
    <!--Form-->
    <div class="col-md-12">
        <form method="post" action="{{route('teams.update',[$team])}}">
            @method("PUT")
            @csrf
            <div class="form-group">
                <label for="name">Nombre del equipo</label>
                <input required type="text" class="form-control" id="name" name="name" value="{{$team->name}}">
            </div>

            <div class="form-group">
                <label for="city">Ciudad</label>
                <input required type="text" class="form-control" id="city" name="city" value="{{$team->city}}">
            </div>

            <div class="form-group">
                <label for="email">Estadio</label>
                <input required type="text" class="form-control" id="stadium" name="stadium" value="{{$team->stadium}}">
            </div>

            <div class="form-group">
                <label for="producte">Año de creación</label>
                <input required type="text" class="form-control" id="year" name="year" value="{{$team->year}}">
            </div>
                        
            <button type="submit" class="btn btn-primary btn-block">Modificar</button>
            <a href="/teams" class="btn btn-danger btn-block">Volver</a>
        </form>
    </div>
</div>


</div>

        
@endsection
