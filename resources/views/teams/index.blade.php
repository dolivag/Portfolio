@extends('layout')

@section('title')
    <h1 class="text-center">Listado de equipos</h1>
@endsection


@section('content')

    @if (Session::get('mensaje'))
        <div><p style="color:green;">{{Session::get('mensaje')}}</p></div>
        {{Session::forget('mensaje')}}
    @endif

<div class="container d-flex justify-content-center">   
      <div class="col-12">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Nombre</th>
                <th>Ciudad</th>
                <th>Estadio</th>
                <th>Año de creación</th>
                <th>Editar</th>
                <th>Eliminar</th>
                <th>Ver partidos</th></tr>
            </thead>
            <tbody>
            @foreach($teams as $team)
                <tr class="text-left">
                    <td>{{$team->name}}</td>
                    <td>{{$team->city}}</td>
                    <td>{{$team->stadium}}</td>
                    <td>{{$team->year}}</td>
                    <td>
                    @can('update_teams')
                        <a class="btn btn-warning" href="{{route('teams.edit',[$team])}}" method="put">
                            <i class="fa fa-edit"></i>
                        </a>
                    </td>
                    @else 
                        <button class="btn btn-warning disabled" href="{{route('teams.edit',[$team])}}" method="put">
                            <i class="fa fa-edit"></i>
                        </button>
                    </td>
                    @endcan
                    
                    <td>
                        @can('delete_teams')
                        <form action="{{route('teams.destroy', $team->id)}}" method="post">
                            @method("delete")
                            @csrf
                            <button type="submit" class="btn btn-danger">
                                <i class="fa fa-trash"></i>
                            </button>
                        </td>
                        </form>
                        @else
                        <button type="submit" class="btn btn-danger disabled">
                            <i class="fa fa-trash"></i>
                        </button>
                    </td>
                    @endcan
                    <td>
                        <a class="btn btn-warning" href="{{route('teams.show', [$team])}}" method="get">
                                <i class="fas fa-trophy"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

  </div>
  <a href="/teams/create" class="btn btn-success mb-2 btn-lg btn-block">Agregar</a>
</div>
        
@endsection