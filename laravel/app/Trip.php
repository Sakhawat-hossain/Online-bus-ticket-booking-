<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    protected $fillable = ['routeID','departure_time','arrival_time','date','comment','busID','rID','b/e'];
}
