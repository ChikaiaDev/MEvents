<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{

    protected $table = 'booking'; 
    protected $dates = ['event_date'];

    use HasFactory;

    protected $fillable = [
        'event_name',
        'event_location',
        'user_id',
        'event_id'
    ];
    
    public function event(){
        return $this->hasMany('App\Models\Event');
    }
}
