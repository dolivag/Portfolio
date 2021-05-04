@extends('layout')


@section('content')
<!--Modify header page: title and description-->
<div class="container mx-auto">
    <div class="page-header">
        <h1><i class="fas fa-info-circle"></i>  Info del {{$team->name}}</h1>
    </div>

    <p>Cambia la información que consideres necesaria del equipo</p>
    <br>
    <br>
    
</div>
<div class="container d-flex justify-content-center ">   
    <div class="row table table-bordered justify">
        <div class="col-md-4">
            <img src="{{asset($team->shield)}}">
        </div>
        <div class="col-md-8  text-left">
            <dl class="row">
                <dt class="col-sm-4">Nombre del equipo</dt>
                <dd class="col-sm-8">{{$team->name}}</dd>  
            </dl>
            <dl class="row">
                <dt class="col-sm-4">Ciudad</dt>
                <dd class="col-sm-8">{{$team->city}}</dd>  
            </dl>
            <dl class="row">
                <dt class="col-sm-4">Estadio</dt>
                <dd class="col-sm-8">{{$team->stadium}}</dd>  
            </dl>
            <dl class="row border bg-light">
                <dt class="col-sm-4 ">Año de creacion</dt>
                <dd class="col-sm-8">{{$team->year}}</dd>  
            </dl>
        </div>
    </div>
    <br>
            
        @foreach ($team->games as $game)
        <div class="container d-flex justify-content-center text-left table table-bordered">   
            <div class="row">
                <div class="col-md-5 text-right border bg-light">
                    <p style="font-size: 1.8rem;">{{$game->local->name}}</p>
                </div>
                <div class="col-md-2 text-center">
                    <p style="font-size: 2rem;">VS</p>  
                </div>
                <div class="col-md-5">
                    <div class="col-md-5 text-left">
                        <p style="font-size: 1.8rem;">{{$game->visitor->name}}</p>
                    </div>
                </div>    
            </div>
            <div class="row">
                <div class="col-md-5 text-right">
                    <p>{{$game->result1}}</p>
                </div>
                <div class="col-md-2 text-center">
                    <p>-</p>  
                </div>
                <div class="col-md-5">
                    <div class="col-md-5 text-left">
                        <p>{{$game->result2}}</p>
                    </div>
                </div>    
            </div>
        </div>

        @endforeach
            <a class="btn btn-primary" href="/teams">Volver al Equipos</a>
    
</div>   
@endsection
