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

        $send_data=(object)array(
            'from' => $from,
            'to' => $to,
            'departure' => $departure,
            'returndate' => $returndate,
            'bus' => 'All',
        );

        $places=DB::table('routes')->distinct()->select('to')->get();
        $buses=DB::table('buses')->distinct()->select('name')->get();

        return View::make('busList')->with('searchdata',$data)->with('send_data',$send_data)->with('places',$places)->with('buses',$buses);

    }

    public function search_bus_filter(Request $request)
    {
        //
        //$form=$request->get('search-bus');
        $from=$request->get('from');
        $to=$request->get('to');
        $departure=$request->get('departure');
        $type=$request->get('type');
        $bus_name=$request->get('bus_name');

        //$returndate=$request->get('returndate');


        if($bus_name != 'All' && $type != 'All'){
            $data=DB::table('trips')
                ->join('routes','trips.routeID', '=', 'routes.id')
                ->join('buses','trips.busID', '=', 'buses.id')
                ->where('date',$departure)
                ->where('from',$from)
                ->where('to',$to)
                ->where('name',$bus_name)
                ->where('type',$type)
                ->select('buses.name', 'buses.coach_no','routes.starting_point','buses.type','trips.departure_time','trips.arrival_time','buses.available_seat','trips.b/e','trips.id')
                ->get();
        }
        elseif($bus_name != 'All'){
            $data=DB::table('trips')
                ->join('routes','trips.routeID', '=', 'routes.id')
                ->join('buses','trips.busID', '=', 'buses.id')
                ->where('date',$departure)
                ->where('from',$from)
                ->where('to',$to)
                ->where('name',$bus_name)
                ->select('buses.name', 'buses.coach_no','routes.starting_point','buses.type','trips.departure_time','trips.arrival_time','buses.available_seat','trips.b/e','trips.id')
                ->get();
        }
        elseif($type != 'All'){
            $data=DB::table('trips')
                ->join('routes','trips.routeID', '=', 'routes.id')
                ->join('buses','trips.busID', '=', 'buses.id')
                ->where('date',$departure)
                ->where('from',$from)
                ->where('to',$to)
                ->where('type',$type)
                ->select('buses.name', 'buses.coach_no','routes.starting_point','buses.type','trips.departure_time','trips.arrival_time','buses.available_seat','trips.b/e','trips.id')
                ->get();
        }
        else{
            $data=DB::table('trips')
                ->join('routes','trips.routeID', '=', 'routes.id')
                ->join('buses','trips.busID', '=', 'buses.id')
                ->where('date',$departure)
                ->where('from',$from)
                ->where('to',$to)
                ->select('buses.name', 'buses.coach_no','routes.starting_point','buses.type','trips.departure_time','trips.arrival_time','buses.available_seat','trips.b/e','trips.id')
                ->get();
        }


        $send_data=(object)array(
            'from' => $from,
            'to' => $to,
            'departure' => $departure,
            'bus' => $bus_name,
        );

        $places=DB::table('routes')->distinct()->select('to')->get();
        $buses=DB::table('buses')->distinct()->select('name')->get();

        return View::make('busList')->with('searchdata',$data)->with('send_data',$send_data)->with('places',$places)->with('buses',$buses);

    }
}
