<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    protected $guarded = [];
    public function rooms()
    {
        return $this->belongsToMany(Room::class, 'room_facilities')->withTimestamps();
    }
}
