<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class AdminActivityController extends Controller
{

    public function adminProfile($id){


        $user = DB::table('admins')
            ->select('username','enterprise','created_at','updated_at')
            ->where('username', $id)->get();


        $user_name=$created=$updated=$userID=$adminID=$enterprise_name=$addressID=$infoID="";
        $i=0;
        foreach ($user as $userdata){

            foreach ($userdata as $data){
                if($i==0) $user_name=$data;
                elseif($i==1) $enterprise_name=$data;
                elseif($i==2) $created=$data;
                elseif($i==3) $updated=$data;

                $i=$i+1;

            }
        }







        $created=date("d/m/Y",strtotime($created));
        $updated=date("d/m/Y",strtotime($updated));

        //return $trips_details;

        //echo $num_trips;

        return view('admin.admin-profile',['username' => $user_name,'c' => $created,'u' => $updated,'enterprise' => $enterprise_name]);
    }


    public function adminGetReptList(){

        $admin = Session::get('admin-username');

        $enterprise = DB::table('admins')->where('username',$admin)->value('enterprise');

        $reptList= DB::table('representatives')->where('representatives.enterprise',$enterprise)
            ->leftjoin('admin_infos','representatives.admin_infoID','=','admin_infos.id')
            ->leftjoin('addresses','representatives.addressID','=','addresses.id')
            ->select('representatives.username','representatives.id','representatives.adminID','admin_infos.first_name','admin_infos.last_name',
                'admin_infos.email','admin_infos.phone_no','addresses.name','addresses.thana','addresses.district',
                'addresses.house_road')
            ->get();
        $total_rept = count($reptList);
        //return $reptList;
        return view('admin.admin-representative')->with('reptList',$reptList)->with( 'total_rept',$total_rept);

    }

    public function adminGetAgentList(){

        $admin = \Illuminate\Support\Facades\Session::get('admin-username');

        $enterprise = DB::table('admins')->where('username',$admin)->value('enterprise');


        $reptList= DB::table('agents')
            ->join('admin_infos','agents.admin_infoID','=','admin_infos.id')
            ->join('addresses','agents.addressID','=','addresses.id')
            ->where('agents.enterprise',$enterprise)
            ->select('agents.username','agents.id','agents.adminID','admin_infos.first_name','admin_infos.last_name','admin_infos.email','admin_infos.phone_no','addresses.name','addresses.thana','addresses.district','addresses.house_road')
            ->get();
        $total_agent = count($reptList);
        //return $reptList;
        return view('admin.admin-agent')->with('reptList',$reptList)->with( 'total_agent',$total_agent);

    }

    function adminReptConfirm ($reptID)
    {
        $adminID = Session::get('adminID');
        echo $adminID;
        $affected =  DB::table('representatives')
            ->where('id', $reptID)
            ->update(['adminID' => $adminID,'updated_at' => date("Y-m-d H:i:s")]);

    }

    function adminReptCancel ($reptID)
    {
        $adminID = Session::get('adminID');
        echo $adminID;
        $affected =  DB::table('representatives')
            ->where('id', $reptID)
            ->update(['adminID' => '','updated_at' => date("Y-m-d H:i:s")]);

    }

    function adminAgentConfirm ($reptID)
    {
        $adminID = \Illuminate\Support\Facades\Session::get('adminID');
        echo $adminID;
        $affected =  DB::table('agents')
            ->where('id', $reptID)
            ->update(['adminID' => $adminID,'updated_at' => date("Y-m-d H:i:s")]);

    }

    function adminAgentCancel ($reptID)
    {
        $adminID = \Illuminate\Support\Facades\Session::get('adminID');
        echo $adminID;
        $affected =  DB::table('agents')
            ->where('id', $reptID)
            ->update(['adminID' => '','updated_at' => date("Y-m-d H:i:s")]);


    }



    public function adminConfirmTicket($id){
        DB::table('tickets')->where('id',$id)
            ->update(['status' => 'active']);

        $paymentID=DB::table('tickets')->where('id',$id)->value('paymentID');
        DB::table('tickets')->where('id',$paymentID)
            ->update(['status' => 'paid']);

        $places=DB::table('buses')->distinct()->select('name')->get();
        $tickets=DB::table('tickets')->where('tickets.status','pending')
            ->join('payments','tickets.paymentID','payments.id')
            ->join('users','tickets.userID','users.id')
            ->select('users.username','users.phone no','tickets.boarding_point','tickets.booking_time',
                'payments.trxID','payments.amount','tickets.status','tickets.id')->get();

        return view('admin.ticket-list-confirm')->with('buses',$places)->with('tickets',$tickets);

    }
}