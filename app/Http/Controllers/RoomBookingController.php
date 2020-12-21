<?php

namespace App\Http\Controllers;

use App\Model\BookRoom;
use App\Model\Payment;
use App\Model\Room;
use Carbon\CarbonPeriod;
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
    public function createBooking($id)
    {
        $room = Room::findOrFail($id);
        return view('room_booking.create',compact('room'));
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
        $bookRoom = BookRoom::where('room_id',$request->room_id)->get();
        $bookedDayes = [];
        foreach ($bookRoom as $b){
            $period = CarbonPeriod::create($b->from,$b->to);
            foreach ($period as $date) {
                $bookedDayes[] = $date->format('Y-m-d');
            }
        }
        $available = [];
        $allAvailable = true;
        $message = '';
        $last = '';
        $period = CarbonPeriod::create($request->from,$request->to);
        foreach ($period as $key => $date) {
            if($key==0){
                $message = $date->format('Y-m-d').' to ';
            }
            $status = 'Available';
            if(in_array($date->format('Y-m-d'),$bookedDayes )){
                $status = 'Booked';
                $allAvailable = false;
                $last = $date->format('Y-m-d');
            }
            $available[$date->format('Y-m-d')] = $status;
        }
        $message .= $last;
        $now = strtotime($request->to);
        $your_date = strtotime($request->from);
        $datediff = $now - $your_date;
        $day = round($datediff / (60 * 60 * 24));
        $room = Room::findOrFail( $request->room_id);
        $fare =  $day * $room->fare;
        if($allAvailable){
            return view('room_booking.payment',compact('data','fare','available'));
        } else {
            return back()->with('warning','Room is not available at '.$message);
        }
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
        $row = BookRoom::find($id);
        return view('room_booking.edit',compact('row'));
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
        $row = BookRoom::findOrFail($id);
        $request->validate([
            'to'          => 'required'
        ]);
        $bookRoom = BookRoom::where('room_id',$row->room_id)->get();
        $bookedDayes = [];
        foreach ($bookRoom as $b){
            $period = CarbonPeriod::create($b->from,$b->to);
            foreach ($period as $date) {
                $bookedDayes[] = $date->format('Y-m-d');
            }
        }
        if(in_array($request->to,$bookedDayes )){
            return back()->with('warning','Room is not available');
        }
        else{
            BookRoom::where('id',$id)->update([
                'to' => $request->to,
            ]);
            $now = strtotime($request->to);
            $your_date = strtotime($row->to);
            $datediff = $now - $your_date;
            $dayIncrease = round($datediff / (60 * 60 * 24));
            $increaseFare = $row->room->fare;
            $payment = Payment::where('booking_id',$id)->first();
            Payment::where('booking_id',$id)->update([
                'Amount' => ( $dayIncrease *  $increaseFare) + $payment->Amount
            ]);
            return redirect()->route('room-booking.index')
                ->with('success','Booking updated  successfully');
        }

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
