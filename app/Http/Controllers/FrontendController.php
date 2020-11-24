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
    public function searchRoom(){
        $from = isset($_GET['from']) ? $_GET['from'] : null;
        $to = isset($_GET['to']) ? $_GET['to'] : null;
        $cats = isset($_GET['cats']) ? $_GET['cats'] : null;
        $dogs = isset($_GET['dogs']) ? $_GET['dogs'] : null;
        $rooms = Room::where('cats','>=', $cats)->where('dogs','>=', $dogs)->whereHas('booking',function ($query) use ($from){
            $query->whereDate('to','<',$from);
        })->get();
        return view('pages.room_list',compact('rooms','from','to'));
    }
    public function searchRoomView(){
        return view('pages.search_room');
    }
    public function about(){
        return  view('pages.about');
    }
    public function contact(){
        return  view('pages.contact');
    }
}
