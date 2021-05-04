@extends('layout')


@section('content')
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Bienvenid@ a La Liga de la IT Academy</h1>
    @if(!Auth::check())
      <h2 class="display-4">Inicia sesión para consultar equipos y partidos</h2>
    @endif
    <div class="container">
    <img src="{{asset('images/liga.jpg') }}" class="img-fluid">
  </div>
  </div>
</div>
@endsection