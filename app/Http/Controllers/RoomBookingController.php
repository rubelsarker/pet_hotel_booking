<?php

namespace App\Http\Controllers;

use App\Model\BookRoom;
use App\Model\Payment;
use App\Model\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoomBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = BookRoom::where('customer_id',Auth::user()->id)->get();
        return view('room_booking.index',compact('rows'));
    }

    public function allBooking(){
        $rows = BookRoom::all();
        return view('room_booking.index',compact('rows'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createBooking($id,$from,$to)
    {
        $room = Room::findOrFail($id);
        return view('room_booking.create',compact('room','from','to'));
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
            'from'     => 'required',
            'to'      => 'required'
        ]);
        $data = [
            'from'          => $request->from,
            'to'            => $request->to,
            'mobile'        => $request->customer_mobile,
            'customer_id'   => Auth::user()->id,
            'room_id'       => $request->room_id
            ];
        return view('room_booking.payment',compact('data'));
    }
    public function payment(Request $request){
        $request->validate([
            'card_number'     => 'required',
            'payment_date'    => 'required',
            'card_type'       => 'required',
            'amount'          => 'required'
        ]);

        $booking = BookRoom::create($request->booking_data);
        $payment_data = [
            'card_number'       => $request->card_number,
            'payment_date'      => $request->payment_date,
            'card_type'         => $request->card_type,
            'customer_id'       => Auth::user()->id,
            'amount'            => $request->amount,
            'booking_id'            => $booking->id
        ];
        if($booking){
            Payment::create($payment_data);
        }
        return redirect()->route('room-booking.show',$booking->id)
            ->with('success','Room booking  successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $row = BookRoom::find($id);
        return view('room_booking.show',compact('row'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
