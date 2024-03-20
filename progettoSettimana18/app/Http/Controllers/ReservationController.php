<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Reservation;
use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;
use Auth;
use Database\Factories\CourseFactory;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        if ($user->is_admin == 1) {
            $reservations = Reservation::with('course', 'user')->get();
            return view('admin_reservations', ['reservations' => $reservations, 'user' => $user]);

        } else {
            $reservations = Reservation::where('user_id', $user->id)->with('course', 'user')->get();
            return view('user_reservations', ['reservations' => $reservations, 'user' => $user]);

        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReservationRequest $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReservationRequest $request, Reservation $reservation)
    {
        $reservation->update(['is_pending' => $request->input('is_pending')]);

        return redirect()->back()->with('success', 'Prenotazione confermata con successo.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return redirect()->back()->with('success', 'Prenotazione eliminata con successo.');
    }
}
