<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class homeController extends Controller
{
    public function homepage(){
        $times=DB::table('trips')->distinct()->select('departure_time')->where('comment','available')->get();
        //comment -> available, done, cancelled

        return view('home')->with('times',$times);
    }

    public function adminHomepage(){
        //$times=DB::table('trips')->distinct()->select('departure_time')->where('comment','available')->get();
        //comment -> available, done, cancelled

        return view('employee.employee-login');
    }

    public function getDepartureTime($date){
        $times = DB::table('trips')->where('date',$date)->select('departure_time')->get();

        return response()->json($times,200);
    }

}
