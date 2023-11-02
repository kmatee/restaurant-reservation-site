<?php

namespace App\Http\Controllers\Admin;

use App\Enums\TableStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReservationStoreRequest;
use App\Models\Reservation;
use App\Models\Table;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReservationController extends Controller
{

    public function index()
    {
        $reservations = Reservation::all();
        return view('admin.reservations.index', compact('reservations'));
    }

    public function create()
    {
        $tables = Table::where('status', TableStatus::Available)->get();
        return view('admin.reservations.create', compact('tables'));
    }


    public function store(ReservationStoreRequest $request)
    {
        $table = Table::findOrFail($request->table_id);
        if($request->guest_number > $table->guest_number){
            return back()->with('warning', 'Choose a table that have enough seats');
        }
        $request_date = Carbon::parse($request->reservation_date);
        foreach ($table->reservations as $res){
            //Compares if any existing reservation is within 2 hours of the current reservation attempt
            $existingReservationDate = Carbon::parse($res->reservation_date);
            if($request_date->diffInHours($existingReservationDate) < 2){
                return back()->with('warning', 'This table is reserved for this date and hour (Reservations are reserved for two hours)');
            }

        }
        Reservation::create($request->validated());

        return to_route('admin.reservations.index')->with('success', 'Reservation created successfully');
    }
    

    public function edit(Reservation $reservation)
    {
        $tables = Table::where('status', TableStatus::Available)->get();
        return view('admin.reservations.edit', compact('reservation', 'tables'));
    }


    public function update(ReservationStoreRequest $request, Reservation $reservation)
    {
        $table = Table::findOrFail($request->table_id);
        if($request->guest_number > $table->guest_number){
            return back()->with('warning', 'Choose a table that have enough seats');
        }
        $request_date = Carbon::parse($request->reservation_date);
        $reservations = $table->reservations()->where('id', '!=', $reservation->id)->get();
        foreach ($reservations as $res){
            $existingReservationDate = Carbon::parse($res->reservation_date);
            if($request_date->diffInHours($existingReservationDate) < 2){
                return back()->with('warning', 'This table is reserved for this date and hour (Reservations are reserved for two hours)');
            }
        }
        $reservation->update($request->validated());
        return to_route('admin.reservations.index')->with('success', 'Reservation updated successfully');
    }


    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return to_route('admin.reservations.index')->with('warning', 'Reservation deleted successfully');
    }
}
