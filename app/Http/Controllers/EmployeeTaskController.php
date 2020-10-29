<?php

namespace App\Http\Controllers;

use App\Model\EmployeeTask;
use App\Model\Room;
use App\Model\Task;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class EmployeeTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = EmployeeTask::all();
        return view('assign_employee.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rooms = Room::all();
        $users = User::role('Employee')->get();
        $tasks = Task::all();
        return view('assign_employee.create',compact('rooms','users','tasks'));
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
            'room_id'       => 'required',
            'employee_id'   => 'required',
            'tasks'       => 'required'
        ]);
            $data = [
                'room_id'   => $request->room_id,
                'employee_id'         => $request->employee_id,
                'tasks'          => json_encode($request->tasks)
            ];

        EmployeeTask::create($data);
        return redirect()->route('assign-employee.index')
            ->with('success','Assign Employee successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
