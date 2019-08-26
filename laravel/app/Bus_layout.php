<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Bus_layout extends Model
{
    protected $fillable = ['busID', 'decker_num', 'rows', 'columns', 'layout'];
}