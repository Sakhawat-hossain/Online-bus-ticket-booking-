<?php

namespace App\Http\Controllers;

use App\Payment;
use App\Ticket;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
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
        $tid=$busID='';
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
            ->select('seat_infos.status','seat_infos.seatNo','seat_infos.category','seat_infos.id','trips.busID')->get();

        $seat_info=collect();
        $i=0;

        foreach ($seats as $seat){
            $j=0;
            foreach ($seat as $st){
                if($j==0)  $status=$st;
                elseif($j==1) $seatNo=$st;
                elseif($j==2) $category=$st;
                elseif($j==3) $idx=$st;
                else $busID=$st;

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
                $collectData=collect(['status'=>$status,'seatNo'=>$seatNo,'category'=>$category,'fare'=>$fare,'id'=>0,'userID'=>$tid,'gender'=>'X']);
            }else{
                $collectData=collect(['status'=>$status_t,'seatNo'=>$seatNo,'category'=>$category,'fare'=>$fare,'id'=>$seatid,'userID'=>$tid,'gender'=>'X']);
            }

            $seat_info->put($i,$collectData);
            $i=$i+1;
        }

        $total=DB::table('trips')->where('trips.id',$id)
            ->join('buses','trips.busID','=','buses.id')
            ->value('total_seat');

        $tripInfo=DB::table('trips')->where('trips.id',$id)
            ->join('routes','trips.routeID','routes.id')
            ->join('buses','trips.busID','buses.id')
            ->select('routes.from','routes.to','buses.name','buses.type','trips.date','trips.departure_time')
            ->get();
        $from=$to=$busname=$bustype='';
        $j=0;
        foreach ($tripInfo as $trip){
            foreach ($trip as $td){
                if($j==0) $from=$td;
                elseif ($j==1) $to=$td;
                elseif ($j==2) $busname=$td;
                elseif ($j==3) $bustype=$td;
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

        $layoutRow = DB::table('buses')->where('buses.id',$busID)
            ->join('bus_layouts','buses.id','bus_layouts.busID')
            ->select('decker_num','rows','columns','layout')->get();
        $idx = 1;
        $decker=$rows=$columns=$layoutStr='';
        foreach ($layoutRow as $row){
            foreach ($row as $data){
                if($idx==1) $decker=$data;
                else if($idx==2) $rows=$data;
                else if($idx==3) $columns=$data;
                else if($idx==4) $layoutStr=$data;

                $idx=$idx+1;
            }
        }

        $layoutArr = explode(";",$layoutStr);
        $layout='';
        for($i=0;$i<$rows;$i++)
            $layout[$i] = explode(",",$layoutArr[$i]);

        $layout['decker'] = $decker;
        $layout['rows'] = $rows;
        $layout['columns'] = $columns;

        $bdtf=collect();
        $bdtf->put('boarding',$boarding);
        $bdtf->put('dropping',$dropping);
        $bdtf->put('busname',$busname);
        $bdtf->put('bustype',$bustype);

        $seat_info->put('layout',$layout);

        $seat_inf=json_encode($seat_info);

        return view('seatList')->with('seat_info',$seat_inf)->with('total',$total)->with('tripID',$id)->with('bdtf',$bdtf);

    }

    public function booking(Request $request,$id,$tripID){

        if($request->get('boarding')=='Required'){
            return redirect('seat-list-details/'.$tripID)->with('berror','Select a Boarding Point');
        }

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
        $fare=$total;
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

      /*  $boarding=DB::table('routes')->where('from',$from)->where('to',$to)
            ->join('boardings','routes.id','boardings.routeID')
            ->join('places','boardings.placeID','places.id')
            ->select('places.name')->get();

        $dropping=DB::table('routes')->where('from',$to)->where('to',$from)
            ->join('boardings','routes.id','boardings.routeID')
            ->join('places','boardings.placeID','places.id')
            ->select('places.name')->get();
*/
        $boarding = $request->get('boarding');
        $dropping = $request->get('dropping');
        if($dropping=='Optional') $dropping='';
        $bdtf=collect();
        $bdtf->put('boarding',$boarding);
        $bdtf->put('dropping',$dropping);
        $bdtf->put('total',$total);
        $bdtf->put('sc',$sc);
        $bdtf->put('fare',$fare);
        $bdtf->put('tripID',$tripID);

        return view('booking')->with('userdata',$userdata)->with('seats',$seats)->with('tripInfo',$tripInfo)->with('bdtf',$bdtf);
    }

    public function payment(Request $request,$id,$tripID){
        //$method='Select Payment Gateway';

        //if($request->get('payment-method')=='Select Payment Gateway'){
          //      return redirect('booking-details/'.$id.'/'.$tripID)->with('perror','Select payment method');
        //}
        $method=$request->get('payment-method');
        $error=$request->get('trxIDstatus');

        $senddata=collect();
        $fare=$request->get('total')-$request->get('sc');
        $senddata->put('total',$request->get('total'));
        $senddata->put('sc',$request->get('sc'));
        $senddata->put('fare',$fare);
        $senddata->put('boarding',$request->get('boarding'));
        $senddata->put('dropping',$request->get('dropping'));
        $senddata->put('tripID',$tripID);
        $senddata->put('payment-method',$method);
        $senddata->put('trxIDstatus',$error);

        return view('payment')->with('senddata',$senddata);
    }

    public function confirmTicket(Request $request,$id,$tripID){
        //$this->validate($request,[
            //'trxID' => 'required|unique:payments',
        //]);
        //

        $boarding=$request->get('boarding');
        $dropping=$request->get('dropping');
        $tripID=$request->get('tripID');
        $trxID=$request->get('trxID');

        $data=DB::table('payments')->where('trxID',$trxID)->value('id');

        if($data != ''){
            //return redirect()->back();
            //$trxError='Already accepted, try with your new trxID';
            $request->input('trxIDstatus','Already accepted, try with your new trxID');
            return $this->payment($request,$id,$tripID);
            //return back();
        }
      //  echo 'hello';

        $payment=new Payment([
            'trxID' => $trxID,
            'amount' => $request->get('total'),
            'status' => 'pending'
        ]);
        $payment->save();

        $data=DB::table('payments')->where('trxID',$trxID)->value('id');

            $userID=DB::table('users')->where('username',$id)->value('id');
            if($dropping=='Optional') $dropping='';

            $ticket= new Ticket([
                'boarding_point' => $boarding,
                'dropping_point' => $dropping,
                'paymentID' => $data,
                'userID' => $userID,
                'status' => 'pending'
            ]);

            $ticket->save();

            $cdata=DB::table('tickets')->where('paymentID',$data)->value('id');
             DB::table('seats')->where('ticketID',$userID)
                                ->where('status','selected')
                                ->update(['status' => 'booked', 'ticketID' => $cdata]);

             // update total available seat

        $aseat=DB::table('trips')->where('trips.id',$tripID)->join('buses','trips.busID','buses.id')
            ->select('available_seat','trips.busID')->get();
        $tseat=$busID='';
        foreach ($aseat as $st){
            $j=0;
            foreach ($st as $dt){
                if($j==0) $tseat=$dt;
                elseif ($j==1) $busID=$dt;
                $j++;
            }
        }
        $tseat = $tseat - 1;
        // echo $tseat;
        DB::table('buses')->where('id',$busID)->update(['available_seat' => $tseat]);

        //return $this->send_from($id,$tripID,$userID);


//showing ticket
  /*      $user = DB::table('users')
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
            ->where('tickets.id',$cdata)
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
            ->where('seats.ticketID',$cdata)
            ->where('seats.status','booked')
            ->join('seat_infos','seat_infos.id','seats.seatID')
            ->select('seat_infos.seatNo','seat_infos.category','seats.fare')->get();

        $ticketInfo=collect();
        $ticketInfo->put('ticket',$ticketactive);
        $ticketInfo->put('seats',$seats);
        $ticketInfo->put('userdata',$userdata);
       // echo $ticketInfo->get('userdata')->phn;

        $total=$request->get('total')-$request->get('sc');
        $ticketInfo->put('total',$total);
        $ticketInfo->put('sc',$request->get('total'));
        $ticketInfo->put('ticketID',$cdata);
*/
        //return view('user.profile')->with('userdata',$userdata)->with('ticketInfo',$ticketInfo)->with('ticketNum',$ticketNum);

        return view('user.confirm-mgs');

    }



    public function agent_search_bus_filter(Request $request)
    {
        //
        //$form=$request->get('search-bus');
        $from=$request->get('from');
        $to=$request->get('to');
        $departure=$request->get('departure');
        $type=$request->get('type');

        $username=$request->get('username');
        $bus_name=DB::table('agents')
                    ->where('agents.username',$username)
                    ->join('admins','agents.adminID','admins.id')
                    ->value('admins.enterprise');

       // echo $bus_name;

        //$returndate=$request->get('returndate');

        // $departure=strtotime($departure,'Y-m-d')->yesterday();
        if($request->get('sendval')=='prev')
            $departure = date("Y-m-d", strtotime('-1 day',strtotime($departure)));
        elseif($request->get('sendval')=='next')
            $departure = date("Y-m-d", strtotime('+1 day',strtotime($departure)));

        if($type != 'All'){
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
        else{
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


        $send_data=(object)array(
            'from' => $from,
            'to' => $to,
            'departure' => $departure,
        );

        $places=DB::table('routes')->distinct()->select('to')->get();

       return View::make('agent.agent-buslist')->with('searchdata',$data)->with('send_data',$send_data)->with('places',$places);

    }

    public  function agent_search_bus(){

        $places=DB::table('routes')->distinct()->select('to')->get();

        return view('agent.agent-buslist')->with('places',$places);//redirect()->route('sign-in');
    }

    public function agent_seat_list($id){
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

        $tripInfo=DB::table('trips')->where('trips.id',$id)
            ->join('routes','trips.routeID','routes.id')
            ->join('buses','trips.busID','buses.id')
            ->select('routes.from','routes.to','buses.name','buses.type','trips.date','trips.departure_time')
            ->get();
        $from=$to=$busname=$bustype='';
        $j=0;
        foreach ($tripInfo as $trip){
            foreach ($trip as $td){
                if($j==0) $from=$td;
                elseif ($j==1) $to=$td;
                elseif ($j==2) $busname=$td;
                elseif ($j==3) $bustype=$td;
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
        $bdtf->put('busname',$busname);
        $bdtf->put('bustype',$bustype);

        return view('agent.agent-seatlist')->with('seat_info',$seat_inf)->with('total',$total)->with('tripID',$id)
            ->with('bdtf',$bdtf);

    }

    public function agent_booking(Request $request,$id,$tripID){



        $first_name=$last_name=$phn=$gender=$email=$userID=$age="";

        $userdata=(object)array(
            'fullname' => $request->get('fullname'),
            'phn' => $request->get('phone_no'),
            'gender' => $request->get('gender'),
        );

        $agentID=DB::table('agents')->where('username',$id)->value('id');
        $userID=DB::table('users')->where('phone no',$request->get('phone_no'))->value('id');
        //echo  $userID;
        if($userID==''){
            $user=new User([
                'first_name' => $request->get('fullname'),
                'phone no' => $request->get('phone_no'),
                'gender' => $request->get('gender'),
            ]);
            $user->save();
        }
        else{
            $userID=DB::table('users')->where('phone no',$request->get('phone_no'))->value('id');
        }

        $seats=DB::table('seats')->where('seats.ticketID',$agentID)->where('seats.status','selected')
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
                    $sc = $sc + 0;
                }
                $j++;
            }
        }

        $from=$to='';

        $boarding=$request->get('boarding');

        $dropping=$request->get('dropping');

        $bdtf=collect();
        $bdtf->put('boarding',$boarding);
        $bdtf->put('dropping',$dropping);
        $bdtf->put('total',$total);
        $bdtf->put('tripID',$tripID);
        $bdtf->put('userID',$userID);

        return view('agent.agent-booking')->with('userdata',$userdata)->with('seats',$seats)
            ->with('tripInfo',$tripInfo)->with('bdtf',$bdtf);
    }

    public function agent_confirmTicket(Request $request,$id,$tripID,$userID){
        $boarding=$request->get('boarding');
        $dropping=$request->get('dropping');

        //$data=DB::table('payments')->where('trxID',$trxID)->value('id');

        //if($data==''){
            //return redirect()->back();
           // return $this->payment($request,$id,$tripID);
        //}

        //$cdata=DB::table('tickets')->where('paymentID',$data)->value('id');
        //$request->input('trxIDstatus','Already accepted, try with your new trxID');

        //if($cdata==''){
            $agentID=DB::table('agents')->where('username',$id)->value('id');
            if($dropping=='Optional') $dropping='';

            $ticket= new Ticket([
                'boarding_point' => $boarding,
                'dropping_point' => $dropping,
                'userID' => $userID,
                'agentID' => $agentID,
                'status' => 'active',
            ]);

            $ticket->save();

            $aseat=DB::table('trips')->where('trips.id',$tripID)->join('buses','trips.busID','buses.id')
                ->select('available_seat','trips.busID')->get();
            $tseat=$busID='';
            foreach ($aseat as $st){
                $j=0;
                foreach ($st as $dt){
                    if($j==0) $tseat=$dt;
                    elseif ($j==1) $busID=$dt;
                    $j++;
                }
            }
            $tseat = $tseat - 1;
           // echo $tseat;
            DB::table('buses')->where('id',$busID)->update(['available_seat' => $tseat]);
            return $this->send_from($id,$tripID,$userID);

            //return redirect('agent-confirm-ticket',['id'=>$id,'tripID'=>$tripID,'userID'=>$userID]);
    }

    public function send_from($id,$tripID,$userID){

        $agentID=DB::table('agents')->where('username',$id)->value('id');

        $cdata=DB::table('tickets')->where('userID',$userID)->where('agentID',$agentID)->value('id');
        DB::table('seats')->where('ticketID',$agentID)
            ->where('status','selected')
            ->update(['status' => 'booked', 'ticketID' => $cdata]);
        //}

//showing ticket
        $user = DB::table('users')
            ->select('first_name','last_name','email','phone no','gender','id','age')
            ->where('id', $userID)->get();

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
            ->where('tickets.id',$cdata)
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
            ->where('seats.ticketID',$cdata)
            ->where('seats.status','booked')
            ->join('seat_infos','seat_infos.id','seats.seatID')
            ->select('seat_infos.seatNo','seat_infos.category','seats.fare')->get();

        $total=$sc=0;

        foreach ($seats as $trip){
            $j=0;
            foreach ($trip as $td){
                if($j==2) {
                    $total = $total + $td;
                }
                $j++;
            }
        }

        $ticketInfo=collect();
        $ticketInfo->put('ticket',$ticketactive);
        $ticketInfo->put('seats',$seats);
        $ticketInfo->put('userdata',$userdata);
        // echo $ticketInfo->get('userdata')->phn;

        //$total=$request->get('total');
        $ticketInfo->put('total',$total);
        $ticketInfo->put('sc',0);
        $ticketInfo->put('ticketID',$cdata);

        //return view('user.profile')->with('userdata',$userdata)->with('ticketInfo',$ticketInfo)->with('ticketNum',$ticketNum);

        return view('agent.agent-ticket')->with('ticketInfo',$ticketInfo);

    }


    public function search_ticket(){
        return view('ticket-list');
    }

}
