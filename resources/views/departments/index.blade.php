@extends('layout')

@section('title')
    <h1>Lista de departamentos</h1>
@endsection


@section('content')

    @if (Session::get('mensaje'))
    <div><p>{{Session::get('mensaje')}}</p></div>
    {{Session::flush()}}
    @endif

<div class="row">
  <div class="col-12">
      
    
      <table class="table table-bordered">
          <thead>
          <tr>
              <th>Nombre del departamento</th>
              <th>Número de empleados</th>
              <th>Listado de empleados</th>
          </thead>
          <tbody>
          @foreach($departamentos as $departamento)
              <tr>
                <td>{{$departamento->nombre}}</td>
                
                <td>{{$departamento->count_employees()}}</td>
                <td>
                      <a class="btn btn-warning" href="{{route('departamentos.show',[$departamento])}}" method="get">
                          <i class="fas fa-users"></i>
                      </a>
                </td>
                 
              </tr>
          @endforeach
          </tbody>
      </table>

      <a href="/empleados" class="btn btn-info mb-2 btn-lg btn-block">Ir a Lista de empleados</a>

  </div>
</div>
        
@endsection