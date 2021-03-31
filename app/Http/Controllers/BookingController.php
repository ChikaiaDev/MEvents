<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Models\Event;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        
        return view('events.bookedEvents')->with('bookings',$user->bookings);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'event' => 'required'
        ]);
        $user_id = Auth::id();

        $booking = new  Booking([
            'event_name'=>$request->event_name,
            'event_date'=>$request->event_date,
            'event_location'=>$request->event_location,
            'user_id'=> $user_id,
            'event_id'=>$request->event
            
          ]);

          $booking->save();

          return redirect()->route('events.index')
          ->with('success','You have booked the event successfuly');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        $booking->delete();
    
        return redirect()->route('events.index')
                        ->with('success','You have unbooked from'. $booking->event_name . '  successfully');
    }
    }

