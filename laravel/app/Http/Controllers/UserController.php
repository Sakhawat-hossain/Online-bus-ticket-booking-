<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

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
        return view('user.index')->with('users',$users);
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
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
            'email' => 'required'
            
        ]);
        
        $user = new User([
            'username' => $request->get('username'),
            'password' => $request->get('password'),
            'email' => $request->get('email')
        ]);
        
        $user->save();
        
        return redirect()->route('user.create')->with('success','added done'); 
        
        //return view('user.createAccount');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $user = DB::table('users')->where('name', 'John')->first(); // for a row
        // $email = DB::table('users')->where('name', 'John')->value('email'); // for a single value
        // $user = DB::table('users')->find(3); // using id

        $users = DB::table('users')->find($id);//with('username','password','email')->get(); DB::table('users');//
        return view('user.profile')->with('user',$users);

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
