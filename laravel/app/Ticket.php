<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    //
    protected $fillable = ['boarding_point','dropping_point','booking_time','paymentID','userID','agentID','adminID','status'];
}
