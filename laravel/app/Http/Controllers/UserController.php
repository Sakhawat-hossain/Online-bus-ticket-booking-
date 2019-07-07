<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $users;

    public function index()
    {
        $users = DB::table('users')->get();
        return view('user.index')->with('userinfo',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('user.createAccount');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
            'email' => 'required'
            
        ]);
        
        return redirect()->route('user.create')->with('success','added done'); 
        */
        $username=$request->get('username');
        $username=$this->test_input($username);

        $password=$this->test_input($request->get('password'));
        $repassword=$this->test_input($request->get('re-password'));

        $form=$request->get('form');
        $request->merge([
            'form' => 'done'
        ]);
        /*if ($form='signin'){
            $pass = DB::table('users')->where('username',$username)->value('password');

            $password=Hash::make($password);
            if($password != $pass){
                return view('user.login')->with('userwrong','username or password wrong');
            }

        }
        else*/
            if($form='signup') {
            if ($password != $repassword) {
                return redirect()->route('user.create')->with('wrong', 'password not matched');
            }
            // 'first_name', 'last_name', 'username', 'password', 'email', 'phone no', 'gender'

            $fname = $request->get('firstname');
            $lname = $request->get('lastname');
            $email = $this->test_input($request->get('email'));
            $pno = $this->test_input($request->get('mobileno'));
            $gender = $this->test_input($request->get('gender'));

            $password = Hash::make($password);

            $user = new User([
                'first_name' => $fname,
                'last_name' => $lname,
                'username' => $username,
                'password' => $password,
                'email' => $email,
                'phone no' => $pno,
                'gender' => $gender
            ]);

            $user->save();
        }

        return view('home')->with('username',$username);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //echo $id;
        // $user = DB::table('users')->where('name', 'John')->first(); // for a row
        // $email = DB::table('users')->where('name', 'John')->value('email'); // for a single value
        // $user = DB::table('users')->find(3); // using id

        //$users = DB::table('users')->find($id);//with('username','password','email')->get(); DB::table('users');//
        $user = DB::table('users')
             ->select('first_name','last_name','email','phone no','gender','created_at','updated_at','id')
             ->where('username', $id)->get();

        $first_name=$last_name=$phn=$gender=$email=$create=$update=$userID="";
        $i=0;
        foreach ($user as $userdata){
            foreach ($userdata as $data){
                if($i==0) $first_name=$data;
                elseif($i==1) $last_name=$data;
                elseif($i==2) $email=$data;
                elseif($i==3) $phn=$data;
                elseif($i==4) $gender=$data;
                elseif($i==5) $create=$data;
                elseif($i==6) $update=$data;
                elseif($i==7) $userID=$data;

                $i=$i+1;
            }
        }
        $create=date("d/m/Y",strtotime($create));
        $update=date("d/m/Y",strtotime($update));
        $userdata=(object)array(
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
            'phn' => $phn,
            'gender' => $gender,
            'create' => $create,
            'update' => $update,
        );

        $ticketdata=DB::table('tickets')
            ->where('userID',$userID)
            ->join('seats','seats.ticketID', '=', 'tickets.id')
            ->join('trips','seats.tripID', '=', 'trips.id')
            ->join('buses','trips.busID', '=', 'buses.id')
            ->join('routes','trips.routeID', '=', 'routes.id')
            ->join('seat_infos','seats.seatID', '=', 'seat_infos.id')
            ->select('routes.from', 'routes.to','trips.date','buses.name','buses.type','seat_infos.seatNo','seats.fare','tickets.booking_time')
            ->get();

        $ticketNum=DB::table('tickets')
            ->where('userID',$userID)->count();

        return view('user.profile')->with('userdata',$userdata)->with('ticketdata',$ticketdata)->with('ticketNum',$ticketNum);

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

        $password=$request->get('password');
        $repassword=$request->get('re-password');

        echo "$password<br>";

        if ($password != $repassword) {
            return redirect()->route('user.show',['id' => $id]);
        }
        // 'first_name', 'last_name', 'username', 'password', 'email', 'phone no', 'gender'

        $fname = $request->get('first_name');
        $lname = $request->get('last_name');
        $email = $this->test_input($request->get('email'));
        $pno = $this->test_input($request->get('phone'));

        $password = Hash::make($password);

        DB::table('users')
            ->where('username', $id)
            ->update(['first_name' => $fname, 'last_name' => $lname, 'email' => $email, 'phone no' => $pno, 'password' => $password,'updated_at' => date("Y-m-d H:i:s")]);

        return redirect()->route('user.show',['id' => $id]);

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

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}
