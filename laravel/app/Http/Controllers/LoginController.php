<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         Session::forget('username');
        Session::forget('userID');
         //return redirect()->route('/');
        return redirect()->route('signin.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('user.login');
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

        $form=$request->get('form');
        $username=$request->get('username');
        $password=$request->get('password');

        //echo "    $form";

        if ($form='Sign in'){
            $pass = DB::table('users')->where('username',$username)->value('password');

            if(Hash::check($password,$pass)){
                Session::put('username',$username);
                return redirect()->route('signin.create');
                //return view('home');
            }
            //echo "password in - $pass<br>";
        }

        return redirect()->route('signin.create')->with('userwrong','username or password wrong');

        //echo "password out - $password<br>";
       //

        /*
        //$validator = Validator::make(Input::all(), $rules);

        //if ($validator->fails()) {
        //  return Redirect::to('signin')
        //     ->withErrors($validator)// send back all errors to the login form
        //   ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
        //}
        //else {

        // create our user data for the authentication
        $userdata = array(
            'username' => Input::get('username'),
            'password' => Input::get('password')
        );

        // attempt to do the login
        if (Auth::attempt($userdata)) {

            // validation successful!
            // redirect them to the secure section or whatever
            // return Redirect::to('secure');
            // for now we'll just echo success (even though echoing in a controller is bad)
            echo 'SUCCESS!';

        } else {

            // validation not successful, send back to form
            return Redirect::to('signin');

        }
        //}*/
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
