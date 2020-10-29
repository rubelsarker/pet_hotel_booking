<?php

namespace App\Http\Controllers;

use App\Model\BookRoom;
use App\Model\Room;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function roomList(){
        $rooms = Room::all();
        return view('pages.room_list',compact('rooms'));
    }
    public function roomDetails($id){
        $row = Room::findOrFail($id);
        return view('pages.room_details',compact('row'));
    }
    public function searchRoom(Request $request){
        $request->validate([
            'from'     => 'required',
            'to'      => 'required',
            'pets'      => 'required'
        ]);
        $from = $request->from;
        $to = $request->to;
        $rooms = Room::where('no_of_bed','>=', $request->pets)->whereHas('booking',function ($query) use ($from){
            $query->whereDate('to','<',$from);
        })->get();
        return view('pages.room_list',compact('rooms','from','to'));
    }
    public function searchRoomView(){
        return view('pages.search_room');
    }
}
