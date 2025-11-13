<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with(['user', 'schedule.bus', 'schedule.route'])->get();
        return view('admin.bookings.index', compact('bookings'));
    }

    public function create()
    {
        $schedules = Schedule::with(['bus', 'route'])->get();
        return view('bookings.create', compact('schedules'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'schedule_id' => 'required|exists:schedules,id',
            'seat_number' => 'required|integer',
        ]);

        $schedule = Schedule::find($request->schedule_id);

        if ($schedule->available_seats < 1) {
            return redirect()->back()->with('error', 'No available seats.');
        }

        Booking::create([
            'user_id' => Auth::id(),
            'schedule_id' => $request->schedule_id,
            'seat_number' => $request->seat_number,
        ]);

        $schedule->decrement('available_seats');

        return redirect()->route('bookings.my-bookings')
            ->with('success', 'Booking created successfully.');
    }

    public function myBookings()
    {
        $bookings = Booking::where('user_id', Auth::id())->with(['schedule.bus', 'schedule.route'])->get();
        return view('bookings.my-bookings', compact('bookings'));
    }
}
