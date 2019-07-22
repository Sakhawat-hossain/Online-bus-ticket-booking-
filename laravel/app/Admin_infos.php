<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Admin_infos extends Model
{
    protected $fillable = [ 'first_name', 'last_name', 'email', 'phone_no'];
}