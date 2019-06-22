<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class MyController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return View
     */
    public function signin()
    {
        return view('user.login');
    }
    
    public function signup()
    {
        return view('user.createAccount');
    }
}