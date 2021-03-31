<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $dates = ['date'];
    
    protected $fillable = [
        'name', 
        'description',
        'date',
        'location',
        'cover_image',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function bookings(){
        return $this->belongsTo('App\Models\Booking');
    }

}
