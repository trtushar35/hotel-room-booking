<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function booking(){
        return $this->belongsTo(Booking::class);
    }

    public function bookingRooms()
{
    return $this->hasMany(Booking_room::class, 'room_id');
}

public function discounts()
{
    return $this->hasMany(Discount::class);
}
    
}
