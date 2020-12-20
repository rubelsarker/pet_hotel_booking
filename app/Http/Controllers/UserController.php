<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Spatie\Permission\Models\Role;
use DB;
use Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = User::orderBy('id','DESC')->paginate(5);
//        $data = User::all();
        return view('users.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'user_name' => 'unique:users,user_name',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);
        $image =  $request->image;
        if(isset($image)){
            $imageName = uniqid().'.'.$image->getClientOriginalExtension();
            $upload_path='upload/user';
            $image_url=$upload_path.'/'.$imageName;
            if (! File::exists($upload_path)) {
                File::makeDirectory($upload_path, $mode = 0777, true, true);
            }
            $img = Image::make($image->getRealPath());
            $img->resize(100, 100)->save($upload_path.'/'.$imageName);

        }
        else{
            $image_url = Null;
        }
        $data =[
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'user_name' => $request->user_name,
            'date_of_birth' => $request->date_of_birth,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
            'image' => $image_url,
            'password' => Hash::make($request->password),
        ];

        $user = User::create($data);
        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
            ->with('success','User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();

        return view('users.edit',compact('user','roles','userRole'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);
        $user = User::find($id);
        $image =  $request->image;
        if(isset($image)){
            $imageName = uniqid().'.'.$image->getClientOriginalExtension();
            $upload_path='upload/user';
            $image_url=$upload_path.'/'.$imageName;
            if (! File::exists($upload_path)) {
                File::makeDirectory($upload_path, $mode = 0777, true, true);
            }
            if(file_exists($user->image)){
                unlink($user->image);
            }
            $img = Image::make($image->getRealPath());
            $img->resize(100, 100)->save($upload_path.'/'.$imageName);

        }
        else{
            $image_url = $user->image;
        }
        $pass = $request->password;
        $data =[
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'user_name' => $request->user_name,
            'date_of_birth' => $request->date_of_birth,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
            'image' => $image_url,
            'password' => isset($pass) ? Hash::make($pass) : $user->password
        ];

        $user->update($data);
        DB::table('model_has_roles')->where('model_id',$id)->delete();

        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
            ->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if(file_exists($user->image)){
            unlink($user->image);
        }
        $user->delete();

        return redirect()->route('users.index')
            ->with('success','User deleted successfully');
    }
}
