<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    protected $fillable = ['name', 'coach_no', 'type', 'status', 'total_seat', 'available_seat', 'rID'];
}
