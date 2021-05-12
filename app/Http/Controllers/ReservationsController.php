<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\Bedroom;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class ReservationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = Reservation::all()->sortBy('checkin');
        return view('layouts.reservations.index', compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.reservations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required',
            'people' => 'required|numeric',
            'checkin' => 'required',
            'checkout' => 'required',
            'room' => 'required',
        ]);

        if ($validation->fails()) {
            return redirect('reservation/create')->withErrors($validation)->withInput();
        } else if ($request->checkin > $request->checkout) {
            return redirect('reservations/create')->with(['mensaje' => '¿Tienes una máquina del tiempo?¡La fecha de salida ha de ser posterior a la de entrada!']);
        } else {
            //Comprobamos que la habitación solicitada no esté reservada para las fechas de la reserva
            $room = (Bedroom::find($request->room));
            $reservations = $room->reservations;
            foreach ($reservations as $reservation) {
                if (($request->checkin > $reservation->checkin && $request->checkout < $reservation->checkout)
                    || ($request->checkout > $reservation->checkin && $request->checkout < $reservation->checkout)
                    || ($request->checkin > $reservation->checkin && $request->checkout < $reservation->checkout)
                    || ($request->checkin < $reservation->checkin && $request->checkout >= $reservation->checkout)
                ) {
                    return redirect('reservations/create')->withInput()->with(['mensaje' => 'Habitación no disponible para las fechas seleccionadas']);
                }
            }

            //Calculamos los días entre las dos fechas
            $in = Carbon::createFromFormat('Y-m-d', $request->checkin);
            $out = Carbon::createFromFormat('Y-m-d', $request->checkout);
            $days = $in->diffInDays($out);
            $request['days'] = $days;

            //Creamos la reserva
            $reservation = Reservation::create($request->all());
            return redirect()->route('reservations.index')->with(['mensaje' => 'Reserva creada con éxito']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        $rooms = Bedroom::where('capacity', $reservation->people)->get();
        return view('layouts.reservations.edit', [
            "reservation" => $reservation,
            "rooms" => $rooms
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required',
            'people' => 'required|numeric',
            'checkin' => 'required',
            'checkout' => 'required',
            'room' => 'required',
        ]);

        if ($validation->fails()) {
            return redirect()->route('reservations.edit', [$reservation])->withErrors($validation)->withInput();
        } else if ($request->checkin > $request->checkout) {
            return redirect()->route('reservations/edit', [$reservation])->with(['mensaje' => '¿Tienes una máquina del tiempo?¡La fecha de salida ha de ser posterior a la de entrada!']);
        } else {
            //Comprobamos que la habitación solicitada no esté reservada para las fechas de la reserva
            $room = (Bedroom::find($request->room));
            $reservations = $room->reservations;
            foreach ($reservations as $reserva) {
                if (($request->checkin > $reserva->checkin && $request->checkout < $reserva->checkout)
                    || ($request->checkout > $reserva->checkin && $request->checkout < $reserva->checkout)
                    || ($request->checkin > $reserva->checkin && $request->checkout < $reserva->checkout)
                    || ($request->checkin < $reserva->checkin && $request->checkout >= $reserva->checkout)
                ) {
                    return redirect()->route('reservations.edit', [$reservation])->withInput()->with(['mensaje' => '¡Ups! Habitación no disponible para las fechas seleccionadas']);
                }
            }

            //Calculamos los días entre las dos fechas
            $in = Carbon::createFromFormat('Y-m-d', $request->checkin);
            $out = Carbon::createFromFormat('Y-m-d', $request->checkout);
            $days = $in->diffInDays($out);
            $request['days'] = $days;

            //Creamos la reserva
            $reservation->fill($request->input())->saveOrFail();
            return redirect()->route('reservations.index')->with(['mensaje' => 'Reserva modificada con éxito']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return redirect()->route('reservations.index')->with(["mensaje" => "Reserva borrada con éxito"]);
    }

    public function getRooms($room)
    {
        $roomsData['data'] = Bedroom::where('capacity', $room)->get();

        return response()->json($roomsData);
    }
}
