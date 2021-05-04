@extends('layout')
@section('title')
    <h1>¡Bienvenid@!</h1>
@endsection

@section('content')

<div class="row mt-4 text-center">
  <div class="col-sm-6">
    <div class="card mx-auto text-center align-content-center" style="width: 20rem;">
      <img class="card-img-top justify-items-center" src="{{asset('images/equipos.png')}}" alt="Card image cap">
      <div class="card-body">
        <h4 class="card-title text-center">Equipos</h4>
        <p class="card-text">Aquí tienes la lista de equipos y toda su información</p>
        <a href="{{route('teams.index')}}" class="btn btn-success">Entrar</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card mx-auto text-center border" style="width: 20rem;">
      <img class="card-img-top" src="{{asset('images/Captura.jpg')}}" alt="Card image cap">
      <div class="card-body justify-content-center">
        <h4 class="card-title">Partidos</h4>
        <p class="card-text">Aquí tienes la lista de partidos y sus resultados</p>
        <a href="{{route('games.index')}}" class="btn btn-success">Entrar</a>
      </div>
    </div>
  </div>
</div>



  @endsection