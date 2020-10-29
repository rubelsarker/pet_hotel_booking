<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class EmployeeTask extends Model
{
    protected $guarded = [];
    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'employee_id');
    }
    public function doneTask()
    {
        return $this->hasMany(TaskDone::class, 'task_id');
    }
}
