<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class BookRoom extends Model
{
    protected $guarded = [];
    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }
    public function payment()
    {
        return $this->hasOne(Payment::class, 'booking_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }
}
