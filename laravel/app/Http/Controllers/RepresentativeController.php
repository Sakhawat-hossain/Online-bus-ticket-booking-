<?php

namespace App\Http\Controllers;

use App\Address;
use App\Admin_infos;
use App\Representative;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class RepresentativeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $buses = DB::table('buses')->distinct()->select('name')->get();
        return view('representative.representative-register')->with('buses',$buses);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:agents',
            'phone_no' => 'required|string|max:11|min:11|unique:admin_infos',
            'email' => 'required|string|email|max:255|unique:admin_infos',
            'password' => 'required|string|min:6|confirmed',
            'location' => 'required|string|max:255',
            'thana' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'enterprise' => 'required|string|min:2',
        ]);

        $adminInfos=new Admin_infos([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'email' => $request->get('email'),
            'phone_no' => $request->get('phone_no'),
        ]);
        $adminInfos->save();
        $repID = $adminInfos->id;

        $address=new Address([
            'name' => $request->get('location'),
            'thana' => $request->get('thana'),
            'district' => $request->get('district'),
            'house_road' => $request->get('h-r'),
        ]);
        $address->save();
        $addressId = $address->id;

        $password=Hash::make($request->get('password'));

        $rept=new Representative([
            'username' => $request->get('username'),
            'password' => $password,
            'enterprise' => $request->get('enterprise'),
            'addressID' => $addressId,
            'admin_infoID' => $repID,
        ]);
        $rept->save();
        //  $id=DB::table('agents')->where('username',$request->get('username'))->value('id');
        // Session::put('agent-username',$request->get('username'));
        // Session::put('agentID',$id);

        Session::put('registerInfo','Registration successful.');

        return redirect('representative/create');

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $user = DB::table('representatives')
            ->select('username','enterprise','created_at','updated_at','id','adminID','addressID','admin_infoID')
            ->where('username', $id)->get();


        $user_name=$created=$updated=$userID=$adminID=$enterprise_name=$addressID=$infoID="";
        $i=0;
        foreach ($user as $userdata){

            foreach ($userdata as $data){
                if($i==0) $user_name=$data;
                elseif($i==1) $enterprise_name=$data;
                elseif($i==2) $created=$data;
                elseif($i==3) $updated=$data;
                elseif($i==4) $userID=$data;
                elseif($i==5) $adminID=$data;
                elseif($i==6) $addressID = $data;
                else $infoID = $data;
                $i=$i+1;

            }
        }

        $address_data = DB::table('addresses')->where('id',$addressID)->get();
        $user_info = DB::table('admin_infos')->where('id',$infoID)->get();

        $trips = DB::table('trips')->where('rID',$userID)->get();
        $num_trips = count($trips);

        $trips_details = DB::table('trips')
            ->leftjoin('buses','buses.id','=','trips.busID')
            ->leftjoin('routes','routes.id','=','trips.routeID')
            ->where('trips.rID',$userID)
            ->select('routes.*','trips.*','buses.*')
            ->get();

        // foreach($trips_details as $data)
        //   print_r($data);

        $created=date("d/m/Y",strtotime($created));
        $updated=date("d/m/Y",strtotime($updated));

        //return $trips_details;

        //echo $num_trips;

        return view('representative.rept-profile',['username' => $user_name,'c' => $created,'u' => $updated,
            'enterprise' => $enterprise_name,'num_trips' => $num_trips])->with('info',$user_info)
            ->with('address',$address_data)->with('trips',$trips_details);
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
        $password=$request->get('password');
        $repassword=$request->get('re-password');

        if ($password != $repassword) {

            return redirect()->back()->with('error_msg','Password not matched');
        }
//echo $request->get('first_name');
        $password = Hash::make($password);

        DB::table('representatives')
            ->where('username', $id)
            ->update(['password' => $password,'updated_at' => date("Y-m-d H:i:s")]);
        $infoID = DB::table('representatives')
            ->where('username',$id)->value('admin_infoID');
        $addressID = DB::table('representatives')
            ->where('username',$id)->value('addressID');

        DB::table('addresses')
            ->where('id', $addressID)
            ->update(['name' => $request->get('place_name'),'thana' => $request->get('thana'),'district' => $request->get('district'),'updated_at' => date("Y-m-d H:i:s")]);

        DB::table('admin_infos')
            ->where('id', $infoID)
            ->update(['first_name' => $request->get('first_name'),'last_name' => $request->get('last_name'),'email' => $request->get('email'),'phone_no' => $request->get('phone_no'),'updated_at' => date("Y-m-d H:i:s")]);

        return redirect()->back()->with('message','Profile updated successfully');

        /*       $user = DB::table('representatives')
            ->select('username','enterprise','created_at','updated_at','id','adminID')
            ->where('username', $id)->get();


       $user_name=$created=$updated=$userID=$adminID=$enterprise_name="";
       $i=0;
       foreach ($user as $userdata){

           foreach ($userdata as $data){
               if($i==0) $user_name=$data;
               elseif($i==1) $enterprise_name=$data;
               elseif($i==2) $created=$data;
               elseif($i==3) $updated=$data;
               elseif($i==4) $userID=$data;
               else $adminID=$data;

               $i=$i+1;
               ;
           }
       }


       $created=date("d/m/Y",strtotime($created));
       $updated=date("d/m/Y",strtotime($updated));




        return view('representative.rept.rept-profile',['username' => $user_name,'c' => $created,'u' => $updated,'enterprise' => $enterprise_name]);

      // echo 'profile update';
       */
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
