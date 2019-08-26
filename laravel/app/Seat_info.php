<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seat_info extends Model
{
    protected $fillable = ['busID', 'seatNo', 'status', 'category'];
}
