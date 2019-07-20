<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Auth;

class MyController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return View
     */
    public function showLogin()
    {
        if (Session::has('username')) echo  'ok-ckeck';

        else
        return view('user.login');
    }
    public function places()
    {
        $pls=DB::table('routes')->select('to')->distinct()->get();
        $i=0;

        echo "[";
        foreach ($pls as $pl){
            //echo "$i. ";
            foreach ($pl as $p)
                //Session::put($i,$p);
                echo '"'."$p".'", ';
            $i = $i+1;
            //echo "<br>";
        }
        //Session::put('from-to',$i);

        //return redirect()->route('/home');
    }

    public function doLogin(Request $request)
    {
        //echo 'hello';
        $rules = array(
            'username' => 'required', // make sure the email is an actual email
            'password' => 'required' //|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
        );

        $form=$request->get('form');
        $username=$request->get('username');
        $password=$request->get('password');

        //if ($form='signin'){
            $pass = DB::table('users')->where('username',$username)->value('password');

            if(Hash::check($password,$pass)){
                $id=DB::table('users')->where('username',$username)->value('id');
                Session::put('username',$username);
                Session::put('userID',$id);
                return view('user.login');//redirect()->route('sign-in');
            }

        //}
        //Session::put('username',$username);
        return view('user.login')->with('userwrong','username or password wrong');//redirect()->route('sign-in');

    }

    public function loginFrom($id)
    {
        return view('user.loginFromSeatlist')->with('tripID',$id);
    }

    public function loginFromSeat(Request $request,$idx)
    {
        //echo 'hello';
        $rules = array(
            'username' => 'required', // make sure the email is an actual email
            'password' => 'required' //|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
        );

        $form=$request->get('form');
        $username=$request->get('username');
        $password=$request->get('password');
        //$idx=$request->get('tripID');

        //if ($form='signin'){
            $pass = DB::table('users')->where('username',$username)->value('password');

            if(Hash::check($password,$pass)){
                $id=DB::table('users')->where('username',$username)->value('id');
                Session::put('username',$username);
                Session::put('userID',$id);
                //return view('user.login');//redirect()->route('sign-in');
                return redirect()->action('BusSearchController@seat_list',['id' => $idx]);
            }

       // }
        //Session::put('username',$username);
        return view('user.loginFromSeatlist')->with('tripID',$idx)->with('userwrong','username or password wrong');//redirect()->route('sign-in');

    }

    public function logout(){
        Session::forget('username');
        Session::forget('userID');
        //return redirect()->route('/');
        return view('user.login');
    }

    public function checkuser(Request $request)
    {
        $form=$request->get('form');
        $username=$request->get('username');
        $password=$request->get('password');

        if ($form='signin'){
        $pass = DB::table('users')->where('username',$username)->value('password');

            $password=Hash::make($password);
            if($password != $pass){
                return view('signin')->with('userwrong','username or password wrong');
            }

        }
        return view('home')->with('username',$username);
    }
}