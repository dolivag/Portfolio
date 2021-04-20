@extends('layout')





@section('content')
<div class="container mx-auto">
    <div class="page-header">
        <h1><i class="fas fa-plus-circle"></i>Añade un empleado</h1>
    </div>
    <p>Escribe su información y el departamento al que pertenece</p>
</div>
<div>
    <form method="POST" action="{{route("empleados.store")}}">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                
                <label for="nombre"  style="color: black;">Nombre</label>
                <input required autocomplete="off" id="nombre" name="nombre" class="form-control"
                        type="text" placeholder="Nombre">
            </div>
            <div class="form-group col-md-6">

                <label for="apellidos"  style="color: black;">Apellidos</label>
                <input required autocomplete="off" id="apellidos" name="apellidos" class="form-control"
                        type="text" placeholder="Apellidos">
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-group col-md-6">
                <label  style="color: black;">Email</label>
                <input required autocomplete="off" name="email" class="form-control"
                        type="email" placeholder="Email">
            </div>

            <div class="form-group col-md-6">
                <label  style="color: black;">Teléfono</label>
                <input required autocomplete="off" name="telefono" class="form-control"
                        type="text" placeholder="Teléfono">
            </div>
        </div>
        <div class="form-row ">
            <div class="form-group col-md-12">
                <label for="departamento_id" style="color: black;">Departamento</label>
                <select name="departamento_id" id="departamento_id">
                    @foreach ($departamentos as $departamento)
                        <option value="{{ $departamento->id }}"
                        @if ($departamento->id == old('myselect', $departamento->id))
                            selected="selected"
                        @endif
                        >{{ $departamento->nombre }}</option>
                    @endforeach
                    </select>
            </div>
        </div>
        <div class="form-row ">
                <button type="submit" class="btn btn-success">Guardar</button>
                <a class="btn btn-primary" href="empleados/index">Volver al listado</a>
        </div>
    </form>
</div>

        
@endsection