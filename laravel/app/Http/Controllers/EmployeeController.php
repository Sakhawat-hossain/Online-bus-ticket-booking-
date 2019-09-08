<?php


namespace App\Http\Controllers;


use App\Address;
use App\Admin_infos;
use App\Agent;
use App\SuperAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
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
        return view('employee.employee-register');
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
            'username' => 'required|string|max:255|unique:super_admins',
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

        $employeeId=DB::table('admin_infos')->where('email',$request->get('email'))
            ->where('phone_no',$request->get('phone_no'))->value('id');
        $password=Hash::make($request->get('password'));

        $employee=new SuperAdmin([
            'username' => $request->get('username'),
            'password' => $password,
            'admin_infoID' => $employeeId,
            'addressID' => $addressId,
        ]);
        $employee->save();
        //  $id=DB::table('agents')->where('username',$request->get('username'))->value('id');
        // Session::put('agent-username',$request->get('username'));
        // Session::put('agentID',$id);

        return view('employee.employee-login')->with('registerInfo','Registration successful.');

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