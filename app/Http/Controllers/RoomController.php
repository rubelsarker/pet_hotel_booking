<?php

namespace App\Http\Controllers;

use App\Model\Category;
use App\Model\Facility;
use App\Model\Room;
use App\Model\RoomFacility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Room::all();
        return view('room.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $facilities = Facility::all();
        return view('room.create',compact('categories','facilities'));
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
            'title'     => 'required',
            'type'      => 'required',
            'name'      => 'required',
            'no_of_bed' => 'required',
            'cats'      => 'required',
            'dogs'      => 'required',
            'fare'      => 'required'
        ]);
        $image = $request->image;
        if(isset($image)){
            $imageName = uniqid().'.'.$image->getClientOriginalExtension();
            $upload_path='upload/room';
            $image_url=$upload_path.'/'.$imageName;
            if (! File::exists($upload_path)) {
                File::makeDirectory($upload_path, $mode = 0777, true, true);
            }
            $img = Image::make($image->getRealPath());
            $img->resize(300, 300)->save($upload_path.'/'.$imageName);

        }
        else{
            $image_url = Null;
        }
        $data = [
            'category_id'   => $request->type,
            'title'         => $request->title,
            'name'          => $request->name,
            'no_of_bed'     => $request->no_of_bed,
            'cats'          => $request->cats,
            'dogs'          => $request->dogs,
            'fare'          => $request->fare,
            'desc'          => $request->desc,
            'image'         => $image_url
        ];
        $room = Room::create($data);
        if($room){
            $room->facilities()->attach($request->facility);
            return redirect()->route('room.index')
                ->with('success','Room created successfully');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $row = Room::findOrFail($id);
        return view('room.show',compact('row'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $facilities = Facility::all();
        $row = Room::findOrFail($id);
        return view('room.edit',compact('categories','facilities','row'));
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
        $request->validate([
            'title'     => 'required',
            'type'      => 'required',
            'name'      => 'required',
            'no_of_bed' => 'required',
            'cats' => 'required',
            'dogs' => 'required',
            'fare'      => 'required'
        ]);
        $row = Room::findOrFail($id);
        $image = $request->image;
        if(isset($image)){
            $imageName = uniqid().'.'.$image->getClientOriginalExtension();
            $upload_path='upload/room';
            $image_url=$upload_path.'/'.$imageName;
            if (! File::exists($upload_path)) {
                File::makeDirectory($upload_path, $mode = 0777, true, true);
            }
            if(file_exists($row->image)){
                unlink($row->image);
            }
            $img = Image::make($image->getRealPath());
            $img->resize(300, 300)->save($upload_path.'/'.$imageName);

        }
        else{
            $image_url = $row->image;
        }
        $data = [
            'category_id'   => $request->type,
            'title'         => $request->title,
            'name'          => $request->name,
            'no_of_bed'     => $request->no_of_bed,
            'cats'          =>   $request->cats,
            'dogs'          => $request->dogs,
            'fare'          => $request->fare,
            'desc'          => $request->desc,
            'image'         => $image_url
        ];
         Room::where('id',$id)->update($data);
        $room = Room::findOrFail($id);
        $room->facilities()->sync($request->facility);
        return redirect()->route('room.index')
            ->with('success','Room updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = Room::find($id);
        $row->facilities()->detach();
        if(file_exists($row->image)){
            unlink($row->image);
        }
        $row->delete();
        return redirect()->route('room.index')
            ->with('success','Room deleted successfully');
    }
}
