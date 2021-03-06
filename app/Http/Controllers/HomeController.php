<?php

namespace App\Http\Controllers;

use DateTime;
use DateInterval;
use App\Models\Booking;
use App\Classes\TimeSlot;
use App\Models\Unavailable;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class HomeController extends Controller
{
    public function index() {
        # define time slot
        # loop time slot according start, end and interval
        # if diff duration less than parameter duration, remove it (duration is inconsistent)
        # if date is sat and sun then return null 
        # if time slot is within 12:00 and 13:00, remove it (break time)

        return view('calendar.index');
    }
    
    public function show(Request $request) {

        $request->validate([
            'date' => 'required|date|date_format:Y-m-d|after:today',
        ]);

        $booked = Booking::where('date', $request->input('date'))->get()->toArray();
        // $tt = new Collection;
        // foreach ($booked as $value) {
        //     $tt->push(['start' => $value['start']]);
        // }

        // dd($booked);

        $unavailable = Unavailable::where('date', $request->input('date'))->count();

        $time_slot = new TimeSlot(
            $booked,
            $unavailable, 
            $request->input('date'), 
            env('START_TIME'), 
            env('END_TIME'), 
            env('TIME_SLOT_DURATION'), 
            '0');

        $results = $time_slot->getTimeSlot();
        return view('calendar.show', ['time_slots' => $results]);

    }

    public function book(Request $request) {

        $request->validate([
            'date' => 'required|date|date_format:Y-m-d',
            'start' => 'required',
            'end' => 'required',
        ]);

        $key = Booking::generateTicket();
        $booking = Booking::create([
            'ticket' => $key,
            'date' => $request->input('date'),
            'start' => $request->input('start'),
            'end' => $request->input('end'),
        ]);

        // dd($booking);
        return redirect()->route('calendar')->with('message', 'Booking successed.Your booking id is '. $booking->ticket);
    }
   
}
