@extends('layout')


@section('content')

    <!--Muestra de errores-->
    @if (Session::get('mensaje'))
        <div><p style="color:red;">{{Session::get('mensaje')}}</p></div>
        {{Session::forget('mensaje')}}
    @endif
    @foreach ($errors->all() as $error)
        <div style="color:red;">{{ $error }}</div>
    @endforeach

<!--Modify header page: title and description-->
<div class="container mx-auto">
    <div class="page-header">
        <h1><i class="fas fa-exchange-alt"></i> Modificar partido</h1>
    </div>
    <p>Cambia la información que consideres necesaria del partido</p>
</div>


<div class="container">
    <!--Form-->
    
    

    <div class="col-md-12">
        <form method="post" action="{{route('games.update',[$game])}}">
            @method("PUT")
            @csrf
            <div class="col-md-6">
                <div class="form-group input-group-lg">
                    <label for="team2">Equipo local</label>
                    <select class="form-select " id="team1" name="team1" >
                        @foreach($teams as $team)  	
                                <option value="{{$team->id}}"
                                    @if ($game->team1 == $team->id)
                                    selected = "selected"
                                    @endif
                                    >{{$team->name}}</option>				    
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="result1">Resultado local</label>
                    <input required type="number" class="form-control" id="result1" name="result1" value={{$game->result1}}>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group input-group-lg">
                    <label for="team2">Equipo visitante</label>
                    <select class="form-select " id="team2" name="team2" >
                        @foreach($teams as $team)  	
                                <option value="{{$team->id}}"
                                    @if ($game->team2 == $team->id)
                                    selected = "selected"
                                    @endif
                                    >{{$team->name}}</option>				    
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="result2">Resultado visitante</label>
                    <input required type="number" class="form-control" id="result2" name="result2" value={{$game->result2}}>
                </div>
            </div>

            <div class="form-group">
                <div class='input-group date' data-date-format="yyyy-mm-dd" id='date'>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    <input type='text' class="form-control" id="date" name="date"  value={{$game->date}}>
                </div>
            </div>

            
                        
            <button type="submit" class="btn btn-primary btn-block">Modificar</button>
            <a href="/games" class="btn btn-danger btn-block">Volver</a>
        </form>
    </div>
</div>
@endsection