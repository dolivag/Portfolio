@extends('layout')

@section('title')
    <h1>Empleados del departamento de {{$departamento->nombre}}</h1>
@endsection


@section('content')


<div class="row">
  <div class="col-12">
      
    
      <table class="table table-bordered">
        <thead>
            <tr>
              <th>Nombre</th>
              <th>Apellidos</th>
              <th>Email</th>
              <th>Departamento</th>
            </tr>
        </thead>
          <tbody>
              
          @foreach($departamento->employees as $empleado)
              <tr>
                <td>{{$empleado->nombre}}</td>
                <td>{{$empleado->apellidos}}</td>
                <td>{{$empleado->email}}</td>
                <td>{{$empleado->department->nombre}}</td>         
              </tr>
          @endforeach
          </tbody>
      </table>

  </div>
</div>
        
@endsection