@extends('layout')

@section('title')
    <h1>Lista de empleados</h1>
@endsection


@section('content')

    @if (Session::get('mensaje'))
    <div><p>{{Session::get('mensaje')}}</p></div>
    {{Session::flush()}}
    @endif

<div class="container">
  
    
      <div class="col-12">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Email</th>
                <th>Departamento</th>
                <th>Editar</th>
                <th>Eliminar</th></tr>
            </thead>
            <tbody>
            @foreach($empleados as $empleado)
                <tr>
                    <td>{{$empleado->nombre}}</td>
                    <td>{{$empleado->apellidos}}</td>
                    <td>{{$empleado->email}}</td>
                    <td>{{$empleado->department->nombre}}</td>
                    <td>
                        <a class="btn btn-warning" href="{{route('empleados.edit',[$empleado])}}" method="put">
                            <i class="fa fa-edit"></i>
                        </a>
                    </td>
                    <td>
                        <form action="{{route('empleados.destroy', [$empleado])}}" method="post">
                            @method("delete")
                            @csrf
                            <button type="submit" class="btn btn-danger">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

  </div>
  <a href="/empleados/create" class="btn btn-success mb-2 btn-lg btn-block">Agregar</a>
</div>
        
@endsection