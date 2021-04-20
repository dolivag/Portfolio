@extends('layout')

@section('title')
    <h1>¡Bienvenid@!</h1>
@endsection



@section('content')
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">A tu página favorita de gestión de empleados</h1>
    <h2 class="display-4">Puedes buscar empleados o departamentos</h2>
    <div class="container">
    <img src="{{asset('images/img2.svg') }}" class="img-fluid">
  </div>
  </div>
</div>
@endsection