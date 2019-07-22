<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    protected $fillable = ['username', 'password', 'addressID', 'adminID', 'admin_infoID'];
}