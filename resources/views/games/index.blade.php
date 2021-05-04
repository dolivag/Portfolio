@extends('layout')

@section('title')
    <h1>Listado de partidos</h1>
    <br>
    <br>
@endsection


@section('content')

    @if (Session::get('mensaje'))
        <div><p style="color:green;">{{Session::get('mensaje')}}</p></div>
    {{Session::forget('mensaje')}}
    @endif

    
    @foreach ($games as $game)
    <div class="col-12">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>{{$game->date}}</th>
                </tr>
                <tr>
                    <th>{{$game->stadium}}</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th><small>Local</small></th>
                    <th><small>Visitante</small></th>
                </tr>
                <tr class="mx-auto">
                    <th ><img src="{{$game->local->shield}}"></th>
                    <th><img src="{{$game->visitor->shield}}"></th>
                </tr>
                <tr>
                    <th>{{$game->local->name}}</th>
                    <th>{{$game->visitor->name}}</th>
                    @can('update_games')
                    <td>
                        <a class="btn btn-warning" href="{{route('games.edit', [$game])}}" method="put">
                            <i class="fa fa-edit"></i>
                        </a>
                    </td>
                    @else
                    <td>
                        <button class="btn btn-warning disabled" href="#" method="put">
                            <i class="fa fa-edit"></i>
                        </button>
                    </td>
                    @endcan
                    @can('delete_games')
                    <td>
                        <form action="{{route('games.destroy', [$game])}}" method="post">
                            @method("delete")
                            @csrf
                            <button type="submit" class="btn btn-danger">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                    @else
                    <td>         
                            <button  class="btn btn-danger disabled">
                                <i class="fa fa-trash"></i>
                            </button>                  
                    </td>
                    @endcan
                </tr>
            <tr>
                <th>{{$game->result1}}</th>
                <th>{{$game->result2}}</th>
            </tr>
            </table>
    </div>

    @endforeach
 

  <a href="{{route('games.create')}}" class="btn btn-success mb-2 btn-lg btn-block mover-arriba">Agregar</a>
 <br>
 <br>
 <br>

        
@endsection