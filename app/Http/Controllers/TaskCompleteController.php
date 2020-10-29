<?php

namespace App\Http\Controllers;

use App\Model\EmployeeTask;
use App\Model\TaskDone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskCompleteController extends Controller
{
    public function index(){
        $data = EmployeeTask::where('employee_id',Auth::user()->id)->get();
        return view('employee.task',compact('data'));
    }
    public function Update($id){
        TaskDone::create([
            'task_id' => $id,
            'status'  => 1,
            'date'    => date('Y-m-d')
        ]);
        return redirect()->route('task-complete.index')
            ->with('success','Task Completed  successfully');

    }
    public function allReport(){

    }
}
