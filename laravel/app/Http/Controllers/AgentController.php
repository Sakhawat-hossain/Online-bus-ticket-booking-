<?php

namespace App\Http\Controllers;

use App\Address;
use App\Admin_infos;
use App\Agent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AgentController extends Controller
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
        return view('agent.agent-register');
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
        ]);

        $adminInfos=new Admin_infos([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'email' => $request->get('email'),
            'phone_no' => $request->get('phone_no'),
        ]);
        $adminInfos->save();

        $addressId=DB::table('addresses')->count();
        $addressId = $addressId+1;
        $address=new Address([
            'id' => $addressId,
            'name' => $request->get('location'),
            'thana' => $request->get('thana'),
            'district' => $request->get('district'),
            'house_road' => $request->get('h-r'),
        ]);
        $address->save();

        $agentId=DB::table('admin_infos')->where('email',$request->get('email'))
            ->where('phone_no',$request->get('phone_no'))->value('id');
        $password=Hash::make($request->get('password'));

        $agent=new Agent([
            'username' => $request->get('username'),
            'password' => $password,
            'addressID' => $addressId,
            'admin_infoID' => $agentId,
        ]);
        $agent->save();
      //  $id=DB::table('agents')->where('username',$request->get('username'))->value('id');
       // Session::put('agent-username',$request->get('username'));
       // Session::put('agentID',$id);

        return view('agent.after-register');

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
