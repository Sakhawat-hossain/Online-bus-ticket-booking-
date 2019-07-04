<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class BusSearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function search_bus(Request $request)
    {
        //
        //$form=$request->get('search-bus');
        $from=$request->get('fromvalue');
        $to=$request->get('tovalue');
        $departure=$request->get('departuredate');
        $returndate=$request->get('returndate');

        //$data=DB::table('routes')->get()->where('from',$from)->where('to',$to)->where('date',$departure);
        $data=DB::table('trips')
            ->join('routes','trips.routeID', '=', 'routes.id')
            ->join('buses','trips.busID', '=', 'buses.id')
            ->where('date',$departure)
            ->where('from',$from)
            ->where('to',$to)
            ->select('buses.name', 'buses.coach_no','routes.starting_point','buses.type','trips.departure_time','trips.arrival_time','buses.available_seat','trips.b/e','trips.id')
            ->get();

        //$all=$request->all();
        return View::make('busList')->with('searchdata',$data);

    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('busList');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $form=$request->get('search-bus');
        $from=$request->get('fromvalue');
        $to=$request->get('tovalue');
        $departure=$request->get('departuredate');
        $returndate=$request->get('returndate');

        //echo "    $form";

        if ($form='search-bus'){
            //$pass = DB::table('users')->where('username',$username)->value('password');

            Session::put('from',$from);
            Session::put('to',$to);
            Session::put('departure',$departure);
            Session::put('returndate',$returndate);

            echo "password in - $from<br>";
        }


        return redirect()->route('/buslist')->with('success',$request);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
