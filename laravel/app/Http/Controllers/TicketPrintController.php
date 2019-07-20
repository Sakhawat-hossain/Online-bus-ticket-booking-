<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

use PDF;

class TicketPrintController extends Controller
{
    //
    public function showTicket($id,$ticketID){

        $user = DB::table('users')
            ->select('first_name','last_name','email','phone no','gender','id','age')
            ->where('username', $id)->get();

        $first_name=$last_name=$phn=$gender=$email=$create=$update=$userID=$age="";
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

        $ticketactive=DB::table('tickets')
            ->where('tickets.id',$ticketID)
            ->join('seats','seats.ticketID', '=', 'tickets.id')
            ->join('trips','seats.tripID', '=', 'trips.id')
            ->join('buses','trips.busID', '=', 'buses.id')
            ->join('routes','trips.routeID', '=', 'routes.id')
            ->select('routes.from', 'routes.to','trips.date','buses.name','buses.type','tickets.booking_time','tickets.id',
                'trips.departure_time','buses.coach_no','tickets.boarding_point')
            ->groupBy('tickets.id')->get();

        $from=$to=$date=$bname=$btype=$btime=$tid=$dtime=$bc=$bp='';

        $i=0;
        foreach ($ticketactive as $tdata){
            foreach ($tdata as $data){
                if($i==0) $from=$data;
                elseif($i==1) $to=$data;
                elseif($i==2) $date=$data;
                elseif($i==3) $bname=$data;
                elseif($i==4) $btype=$data;
                elseif($i==5) $btime=$data;
                elseif($i==6) $tid=$data;
                elseif($i==7) $dtime=$data;
                elseif($i==8) $bc=$data;
                else $bp=$data;

                $i=$i+1;
            }
        }

        $ticketactive=(object)array(
            'from' => $from,
            'to' => $to,
            'journey_date' => $date,
            'bus_name' => $bname,
            'bus_type' => $btype,
            'booking_time' => $btime,
            'tid' => $tid,
            'departure_time' => $dtime,
            'coach_no' => $bc,
            'boarding_point' => $bp,
        );

        $seats=DB::table('seats')
            ->where('seats.ticketID',$ticketID)
            ->where('seats.status','booked')
            ->join('seat_infos','seat_infos.id','seats.seatID')
            ->select('seat_infos.seatNo','seat_infos.category','seats.fare')->get();

        $total=0;
        $sc=0;
        $scc=DB::table('service_charges')->where('status','active')->value('amount');

        foreach ($seats as $st){
            $j=0;
            foreach ($st as $s){
                if($j==2){
                    $total = $total+$s;
                    $sc=$sc+$scc;
                }
                $j++;
            }
        }
        $sc=$sc+$total;

        $ticketInfo=collect();
        $ticketInfo->put('ticket',$ticketactive);
        $ticketInfo->put('seats',$seats);
        $ticketInfo->put('userdata',$userdata);
        // echo $ticketInfo->get('userdata')->phn;

        $ticketInfo->put('total',$total);
        $ticketInfo->put('sc',$sc);
        $ticketInfo->put('ticketID',$ticketID);

        //return view('user.profile')->with('userdata',$userdata)->with('ticketInfo',$ticketInfo)->with('ticketNum',$ticketNum);

        return view('ticket')->with('ticketInfo',$ticketInfo);

    }

    public function downloadTicket($id,$ticketID){

        $user = DB::table('users')
            ->select('first_name','last_name','email','phone no','gender','id','age')
            ->where('username', $id)->get();

        $first_name=$last_name=$phn=$gender=$email=$create=$update=$userID=$age="";
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

        $ticketactive=DB::table('tickets')
            ->where('tickets.id',$ticketID)
            ->join('seats','seats.ticketID', '=', 'tickets.id')
            ->join('trips','seats.tripID', '=', 'trips.id')
            ->join('buses','trips.busID', '=', 'buses.id')
            ->join('routes','trips.routeID', '=', 'routes.id')
            ->select('routes.from', 'routes.to','trips.date','buses.name','buses.type','tickets.booking_time','tickets.id',
                'trips.departure_time','buses.coach_no','tickets.boarding_point')
            ->groupBy('tickets.id')->get();

        $from=$to=$date=$bname=$btype=$btime=$tid=$dtime=$bc=$bp='';

        $i=0;
        foreach ($ticketactive as $tdata){
            foreach ($tdata as $data){
                if($i==0) $from=$data;
                elseif($i==1) $to=$data;
                elseif($i==2) $date=$data;
                elseif($i==3) $bname=$data;
                elseif($i==4) $btype=$data;
                elseif($i==5) $btime=$data;
                elseif($i==6) $tid=$data;
                elseif($i==7) $dtime=$data;
                elseif($i==8) $bc=$data;
                else $bp=$data;

                $i=$i+1;
            }
        }

        $ticketactive=(object)array(
            'from' => $from,
            'to' => $to,
            'journey_date' => $date,
            'bus_name' => $bname,
            'bus_type' => $btype,
            'booking_time' => $btime,
            'tid' => $tid,
            'departure_time' => $dtime,
            'coach_no' => $bc,
            'boarding_point' => $bp,
        );

        $seats=DB::table('seats')
            ->where('seats.ticketID',$ticketID)
            ->where('seats.status','booked')
            ->join('seat_infos','seat_infos.id','seats.seatID')
            ->select('seat_infos.seatNo','seat_infos.category','seats.fare')->get();

        $total=0;
        $sc=0;
        $scc=DB::table('service_charges')->where('status','active')->value('amount');

        foreach ($seats as $st){
            $j=0;
            foreach ($st as $s){
                if($j==2){
                    $total = $total+$s;
                    $sc=$sc+$scc;
                }
                $j++;
            }
        }
        $sc=$sc+$total;

        $ticketInfo=collect();
        $ticketInfo->put('ticket',$ticketactive);
        $ticketInfo->put('seats',$seats);
        $ticketInfo->put('userdata',$userdata);
        // echo $ticketInfo->get('userdata')->phn;

        $ticketInfo->put('total',$total);
        $ticketInfo->put('sc',$sc);
        $ticketInfo->put('ticketID',$ticketID);

        //return view('user.profile')->with('userdata',$userdata)->with('ticketInfo',$ticketInfo)->with('ticketNum',$ticketNum);

        //return view('ticketPrint')->with('ticketInfo',$ticketInfo);

        $pdf=PDF::loadView('ticketPrint',compact('ticketInfo'));

        return $pdf->download('ticket.pdf');

    }

    public function cancelTicket($id,$ticketID){

        $user = DB::table('users')
            ->select('first_name','last_name','email','phone no','gender','id','age')
            ->where('username', $id)->get();

        $first_name=$last_name=$phn=$gender=$email=$create=$update=$userID=$age="";
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

        $ticketactive=DB::table('tickets')
            ->where('tickets.id',$ticketID)
            ->join('seats','seats.ticketID', '=', 'tickets.id')
            ->join('trips','seats.tripID', '=', 'trips.id')
            ->join('buses','trips.busID', '=', 'buses.id')
            ->join('routes','trips.routeID', '=', 'routes.id')
            ->select('routes.from', 'routes.to','trips.date','buses.name','buses.type','tickets.booking_time','tickets.id',
                'trips.departure_time','buses.coach_no','tickets.boarding_point')
            ->groupBy('tickets.id')->get();

        $from=$to=$date=$bname=$btype=$btime=$tid=$dtime=$bc=$bp='';

        $i=0;
        foreach ($ticketactive as $tdata){
            foreach ($tdata as $data){
                if($i==0) $from=$data;
                elseif($i==1) $to=$data;
                elseif($i==2) $date=$data;
                elseif($i==3) $bname=$data;
                elseif($i==4) $btype=$data;
                elseif($i==5) $btime=$data;
                elseif($i==6) $tid=$data;
                elseif($i==7) $dtime=$data;
                elseif($i==8) $bc=$data;
                else $bp=$data;

                $i=$i+1;
            }
        }

        $ticketactive=(object)array(
            'from' => $from,
            'to' => $to,
            'journey_date' => $date,
            'bus_name' => $bname,
            'bus_type' => $btype,
            'booking_time' => $btime,
            'tid' => $tid,
            'departure_time' => $dtime,
            'coach_no' => $bc,
            'boarding_point' => $bp,
        );

        $seats=DB::table('seats')
            ->where('seats.ticketID',$ticketID)
            ->where('seats.status','booked')
            ->join('seat_infos','seat_infos.id','seats.seatID')
            ->select('seat_infos.seatNo','seat_infos.category','seats.fare')->get();

        $total=0;
        $sc=0;
        $scc=DB::table('service_charges')->where('status','active')->value('amount');

        foreach ($seats as $st){
            $j=0;
            foreach ($st as $s){
                if($j==2){
                    $total = $total+$s;
                    $sc=$sc+$scc;
                }
                $j++;
            }
        }
        $sc=$sc+$total;

        $ticketInfo=collect();
        $ticketInfo->put('ticket',$ticketactive);
        $ticketInfo->put('seats',$seats);
        $ticketInfo->put('userdata',$userdata);

        $ticketInfo->put('total',$total);
        $ticketInfo->put('sc',$sc);
        $ticketInfo->put('ticketID',$ticketID);

        $now=Carbon::now();
        $dtime=$date.' '.$dtime;
        $departure=Carbon::parse($dtime);

        $diff=0;
        if($departure->gt($now))
            $diff=$now->diffInHours($departure);

        $ticketInfo->put('time_diff',$diff);
        $ticketInfo->put('expected_diff',6);

        //echo $diff;
        //return view('user.profile')->with('userdata',$userdata)->with('ticketInfo',$ticketInfo)->with('ticketNum',$ticketNum);

        return view('cancelTicket')->with('ticketInfo',$ticketInfo);

    }

    public function cancelRefundPolicy(){
        return view('ticket.cancelRefundPolicy');
    }

}
