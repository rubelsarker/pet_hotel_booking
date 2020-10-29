<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $guarded = [];
    public function type()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function facilities()
    {
        return $this->belongsToMany(Facility::class, 'room_facilities')->withTimestamps();
    }
    public function booking()
    {
        return $this->hasMany(BookRoom::class, 'room_id');
    }
}
