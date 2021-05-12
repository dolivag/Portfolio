@extends('layouts.dashboard')

@section('page')

    @php $currentPage = 'reservations' @endphp

@endsection

@section('content')

<div class="row">
    <div class="col-lg-12">
        <h2 class="title-1 m-b-25" style="display:inline-block">Lista de reservas</h2>
        <a href="/reservations/create" type="button" class="btn btn-success btn-lg" style="float:right"
        data-toggle="tooltip" data-placement="top" title="" data-original-title="Hacer una reserva"><i class="fa fa-plus"></i> Reservar</a>

        @if (Session::get('mensaje'))
            <div><p style="color:green;">{{Session::get('mensaje')}}</p></div>
            {{Session::forget('mensaje')}}
        @endif

        <div class="table-responsive table--no-card m-b-40">
            <table class="table table-borderless table-striped table-earning">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Nº de personas</th>
                        <th class="text-right">Fecha de entrada</th>
                        <th class="text-right">Fecha de salida</th>
                        <th class="text-right">Días</th>
                        <th class="text-right">Nº de habitación</th>
                        @can('update_reservation')
                        <th>Acciones</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @foreach($reservations as $reservation)
                    <tr>
                        <td>{{$reservation->id}}</td>
                        <td>{{$reservation->name}}</td>
                        <td>{{$reservation->people}} 
                        @if ($reservation->people == 1)
                            persona
                        @else
                            personas
                        @endif
                    </td>
                        <td class="text-right">{{\Carbon\Carbon::parse($reservation->checkin)->format('j F, Y')}}</td>
                        <td class="text-right">{{\Carbon\Carbon::parse($reservation->checkout)->format('j F, Y')}}</td>
                        <td class="text-right">{{$reservation->days}} días</td>
                        <td class="text-right">{{$reservation->bedroom->roomNumber}}</td>
                        @can('update_reservation')
                        <td>
                            <div class="table-data-feature">
                                
                                <a href="{{ route('reservations.edit', [$reservation]) }}"class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Editar">
                                    <i class="zmdi zmdi-edit"></i>
                                </a>
                                @can('delete_reservation')
                                <form action="{{ route('reservations.destroy', $reservation->id) }}" method="post"> 
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="item" class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Borrar">
                                    <i class="zmdi zmdi-delete"></i>
                                    </button>
                                </form>    
                                @endcan                        
                            </div> 
                        </td>
                        @endcan  
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
</div>

@endsection