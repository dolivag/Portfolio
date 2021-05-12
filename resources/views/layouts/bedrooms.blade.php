@extends('layouts.dashboard')

@section('page')

    @php $currentPage = 'bedrooms' @endphp

@endsection

@section('content')

<div class="row">
    <div class="col-lg-12">
        <h2 class="title-1 m-b-25" style="display:inline-block">Lista de habitaciones</h2>
        <a href="/bedrooms/create" type="button" class="btn btn-success btn-lg" style="float:right"
        data-toggle="tooltip" data-placement="top" title="" data-original-title="Añadir habitación"><i class="fa fa-plus"></i> Añadir</a>

        @if (Session::get('mensaje'))
            <div><p style="color:green;">{{Session::get('mensaje')}}</p></div>
            {{Session::forget('mensaje')}}
        @endif

        <div class="table-responsive table--no-card m-b-40">
            <table class="table table-borderless table-striped table-earning">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nº de habitación</th>
                        <th>Planta</th>
                        <th class="text-right">Capacidad</th>
                        <th class="text-right">Precio/noche</th>
                        <th class="text-right">Ocupada</th>
                        <th class="text-right">Acciones</th>                     
                    </tr>
                </thead>
                <tbody>
                    @foreach($rooms as $room)
                    <tr>
                        <td>{{$room->id}}</td>
                        <td>{{$room->roomNumber}}</td>
                        <td>{{floor($room->roomNumber /100)}}ª planta</td>
                        <td class="text-right">{{$room->capacity}} personas</td>
                        <td class="text-right">{{$room->price}} €/noche</td>
                        <td class="text-right">
                            @if($room->reservations()==null) No
                            @else Sí
                            @endif
                        </td>
                
                        <td>
                            <div class="table-data-feature">
                                <a href="{{ route('bedrooms.show', $room->id)}}" class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Ver">
                                    <i class="fa fa-eye"></i>
                                </a>
                                @can('update_rooms')
                                <a href="{{ route('bedrooms.edit', [$room]) }}" class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Editar">
                                    <i class="zmdi zmdi-edit"></i>
                                </a>
                                @endcan
                                @can('delete_rooms')
                                <form action="{{ route('bedrooms.destroy', $room->id) }}" method="post"> 
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="item" class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Borrar">
                                    <i class="zmdi zmdi-delete"></i>
                                    </button>
                                </form>    
                                @endcan 
                            </div> 
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
</div>


@endsection