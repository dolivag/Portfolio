@extends('layout')




@section('content')
<!--Modify header page: title and description-->
<div class="container mx-auto">
    <div class="page-header">
        <h1><i class="fas fa-exchange-alt"></i> Modificar empleado</h1>
    </div>
    <p>Cambia la información que consideres necesaria del empleado</p>
</div>


<div class="container">
    <!--Form-->
    <div class="col-md-12">
        <form method="post" action="{{route('empleados.update',[$empleado])}}">
            @method("PUT")
            @csrf
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input required type="text" class="form-control" id="nombre" name="nombre" value={{$empleado->nombre}}>
            </div>

            <div class="form-group">
                <label for="apellidos">Apellidos</label>
                <input required type="text" class="form-control" id="apellidos" name="apellidos" value={{$empleado->apellidos}}>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input required type="email" class="form-control" id="email" name="email" value={{$empleado->email}}>
            </div>

            <div class="form-group">
                <label for="producte">Teléfono</label>
                <input required type="text" class="form-control" id="telefono" name="telefono" value={{$empleado->telefono}}>
            </div>
            
            <div class="form-group">
                <label  for="departamento_id" style="color: black;">Departamento</label>
                <select name="departamento_id" id="departamento_id">
                    @foreach ($departamentos as $departamento)
                        <option value="{{ $departamento->id }}"
                        @if ($departamento->id == $empleado->departamento_id)
                            selected="selected"
                        @endif
                        >{{ $departamento->nombre }}</option>
                    @endforeach
                    </select>
            </div>

            
            <button type="submit" class="btn btn-primary btn-block">Modificar</button>
            <button href="{{route('empleados.index')}}" class="btn btn-danger btn-block">Volver</button>
        </form>
    </div>
</div>


</div>

        
@endsection
