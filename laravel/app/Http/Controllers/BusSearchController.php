<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Collection;
use phpDocumentor\Reflection\Types\Null_;

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
        $time=$request->get('departuretime');


        $data='';
        //if($returndate!=''){
            if($time=='All'){
                $data=DB::table('trips')
                    ->join('routes','trips.routeID', '=', 'routes.id')
                    ->join('buses','trips.busID', '=', 'buses.id')
                    ->where('date',$departure)
                    ->where('from',$from)
                    ->where('to',$to)
                    ->select('buses.name', 'buses.coach_no','routes.starting_point','buses.type','trips.departure_time','trips.arrival_time','buses.available_seat','trips.b/e','trips.id')
                    ->get();
            }
            else{
                $data=DB::table('trips')
                    ->join('routes','trips.routeID', '=', 'routes.id')
                    ->join('buses','trips.busID', '=', 'buses.id')
                    ->where('date',$departure)
                    ->where('from',$from)
                    ->where('to',$to)->where('departure_time',$time)
                    ->select('buses.name', 'buses.coach_no','routes.starting_point','buses.type','trips.departure_time','trips.arrival_time','buses.available_seat','trips.b/e','trips.id')
                    ->get();
            }
        //}


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

       // $departure=strtotime($departure,'Y-m-d')->yesterday();
        if($request->get('sendval')=='prev')
            $departure = date("Y-m-d", strtotime('-1 day',strtotime($departure)));
        elseif($request->get('sendval')=='next')
            $departure = date("Y-m-d", strtotime('+1 day',strtotime($departure)));

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

    public function seat_list($id){
        //return view('seatList');

        $prices=DB::table('seats')->select('fare','seatID','status','id','ticketID')->where('tripID',$id)->get();

        $seat_fare=collect();
        $fare=0;
        $idx=0;
        $status='';
        $seatid=0;
        $tid='';
        foreach ($prices as $prc){
            $j=0;
            foreach($prc as $pr){
                if($j==0) $fare=$pr;
                elseif($j==1) $idx=$pr;
                elseif($j==2) $status=$pr;
                elseif($j==3) $seatid=$pr;
                else $tid=$pr;
                $j=$j+1;
            }
            $seat_temp=collect(['fare'=>$fare,'status'=>$status,'id'=>$seatid,'userID'=>$tid]);
            $seat_fare->put($idx,$seat_temp);
        }
        //dd($seat_fare);

        $seats=DB::table('trips')->where('trips.id',$id)
            ->join('buses','trips.busID','=','buses.id')
            ->join('seat_infos','buses.id','=','seat_infos.busID')
            ->select('seat_infos.status','seat_infos.seatNo','seat_infos.category','seat_infos.id')->get();

        $seat_info=collect();
        $i=0;

        foreach ($seats as $seat){
            $j=0;
            foreach ($seat as $st){
                if($j==0)  $status=$st;
                elseif($j==1) $seatNo=$st;
                elseif($j==2) $category=$st;
                else $idx=$st;

                $j=$j+1;
            }
            $status_t='available';
            $sfare=$seat_fare->get($idx);
            if($sfare){
                $status_t=$sfare->get('status');
                $fare=$sfare->get('fare');
                $seatid=$sfare->get('id');
                $tid=$sfare->get('userID');
            }

            if($status != 'available'){
                $collectData=collect(['status'=>$status,'seatNo'=>$seatNo,'category'=>$category,'fare'=>$fare,'id'=>0,'userID'=>$tid]);
            }else{
                $collectData=collect(['status'=>$status_t,'seatNo'=>$seatNo,'category'=>$category,'fare'=>$fare,'id'=>$seatid,'userID'=>$tid]);
            }

            $seat_info->put($i,$collectData);
            $i=$i+1;
        }
//echo "hello<br>";
//dd($seat_info);
        //$s=json_encode($seat_info);

        //$ss=$s.status;
        //dd($s);

        $total=DB::table('trips')->where('trips.id',$id)
            ->join('buses','trips.busID','=','buses.id')
            ->value('total_seat');

        $seat_inf=json_encode($seat_info);

        return view('seatList')->with('seat_info',$seat_inf)->with('total',$total)->with('tripID',$id);

    }

    public function booking($id,$tripID){

        $user = DB::table('users')
            ->select('first_name','last_name','email','phone no','gender','id','age')
            ->where('username', $id)->get();

        $first_name=$last_name=$phn=$gender=$email=$userID=$age="";
        $i=0;
        foreach ($user as $userdata){
            foreach ($userdata as $data){
                if($i==0) $first_name=$data;
                elseif($i==1) $last_name=$data;
                elseif($i==2) $email=$data;
                elseif($i==3) $phn=$data;
                elseif($i==4) $gender=$data;
                elseif($i==5) $userID=$data;
                else $age=$data;

                $i=$i+1;
            }
        }
        $userdata=(object)array(
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
            'phn' => $phn,
            'gender' => $gender,
            'age' => $age,
        );

        $seats=DB::table('seats')->where('seats.ticketID',$userID)->where('seats.status','selected')
            ->where('seats.tripID',$tripID)
            ->join('seat_infos','seats.seatID','seat_infos.id')
            ->select('seat_infos.category','seat_infos.seatNo','seats.fare')->get();

        $tripInfo=DB::table('trips')->where('trips.id',$tripID)
            ->join('routes','trips.routeID','routes.id')
            ->join('buses','trips.busID','buses.id')
            ->select('routes.from','routes.to','buses.name','buses.type','trips.date','trips.departure_time')
            ->get();

        $total=$sc=0;

        foreach ($seats as $trip){
            $j=0;
            foreach ($trip as $td){
                if($j==2) {
                    $total = $total + $td;
                    $sc = $sc + 50;
                }
                $j++;
            }
        }
        $total = $total+$sc;

        $from=$to='';
        $j=0;
        foreach ($tripInfo as $trip){
            foreach ($trip as $td){
                if($j==0) $from=$td;
                elseif ($j==1) $to=$td;
                $j++;
            }
        }
        $boarding=DB::table('routes')->where('from',$from)->where('to',$to)
            ->join('boardings','routes.id','boardings.routeID')
            ->join('places','boardings.placeID','places.id')
            ->select('places.name')->get();

        $dropping=DB::table('routes')->where('from',$to)->where('to',$from)
            ->join('boardings','routes.id','boardings.routeID')
            ->join('places','boardings.placeID','places.id')
            ->select('places.name')->get();

        $bdtf=collect();
        $bdtf->put('boarding',$boarding);
        $bdtf->put('dropping',$dropping);
        $bdtf->put('total',$total);
        $bdtf->put('sc',$sc);

        return view('booking')->with('username',$id)->with('userdata',$userdata)->with('seats',$seats)->with('tripInfo',$tripInfo)->with('bdtf',$bdtf);
    }

}
