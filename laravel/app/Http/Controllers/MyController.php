<?php

namespace App\Http\Controllers;

use App\Admin;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Null_;

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
        //if (Session::has('username')) echo  'ok-ckeck';

        //else
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
                return redirect('home');//redirect()->route('sign-in');
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
        //Auth::logout();
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

    public function agentShowLogin()
    {
        //if (Session::has('username')) echo  'ok-ckeck';

        //else
        return view('agent.agent-login');
    }
    public function agentDoLogin(Request $request)
    {

        //echo 'hello';
        $this->validate($request, [
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:6',
        ]);

        $username=$request->get('username');
        $password=$request->get('password');

        //if ($form='signin'){
        $pass = DB::table('agents')->where('username',$username)->value('password');

        if(Hash::check($password,$pass)){
            $admin=DB::table('agents')->where('username',$username)->value('adminID');

            if($admin==Null){
                return view('agent.agent-login')->with('agentwrong','Your account is not confirmed yet.');//redirect()->route('sign-in');
            }
            $id=DB::table('agents')->where('username',$username)->value('id');
            Session::put('agent-username',$username);
            Session::put('agentID',$id);

            $places=DB::table('routes')->distinct()->select('to')->get();

            return view('agent.agent-buslist')->with('places',$places);//redirect()->route('sign-in');
        }

        //}
        //Session::put('username',$username);
        return view('agent.agent-login')->with('agentwrong','username or password wrong');//redirect()->route('sign-in');

    }
    public function agentLogout(){
        Session::forget('agent-username');
        Session::forget('agentID');
        //return redirect()->route('/');
        //Auth::logout();
        return view('agent.agent-login');
    }
    public function agentRegister()
    {
        //if (Session::has('username')) echo  'ok-ckeck';

        //else
        return view('agent.after-register');
    }

    public function adminShowLogin()
    {
        //if (Session::has('username')) echo  'ok-ckeck';

        //else
        return view('admin.admin-login');
    }
    public function adminDoLogin(Request $request)
    {

        //echo 'hello';
        $this->validate($request, [
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:6',
        ]);

        $username=$request->get('username');
        $password=$request->get('password');

        //if ($form='signin'){
        $pass = DB::table('admins')->where('username',$username)->value('password');
        //Hash::check($password,$pass)
        if($password==$pass){

            $id=DB::table('admins')->where('username',$username)->value('id');
            Session::put('admin-username',$username);
            Session::put('adminID',$id);
/*
            $places=DB::table('buses')->distinct()->select('name')->get();
            $tickets=DB::table('tickets')->where('tickets.status','pending')
                ->join('payments','tickets.paymentID','payments.id')
                ->join('users','tickets.userID','users.id')
                ->select('users.username','users.phone no','tickets.boarding_point','tickets.booking_time',
                    'payments.trxID','payments.amount','tickets.status','tickets.id')->get();
            return view('admin.ticket-list')->with('buses',$places)->with('tickets',$tickets);//redirect()->route('sign-in');
*/
            return view('admin.admin-home');
        }

        //}
        //Session::put('username',$username);
        return view('admin.admin-login')->with('agentwrong','username or password wrong');//redirect()->route('sign-in');

    }
    public function adminLogout(){
        Session::forget('admin-username');
        Session::forget('adminID');
        //return redirect()->route('/');
        //Auth::logout();
        return view('admin.admin-login');
    }
    public function adminHome()
    {
        //if (Session::has('username')) echo  'ok-ckeck';

        //else
        //$admin=DB::table('representatives')->where('username',$id)->value('adminID');

        return view('admin.admin-home');
    }
    public function adminCreate()
    {
        //if (Session::has('username')) echo  'ok-ckeck';

        //else
        //$admin=DB::table('representatives')->where('username',$id)->value('adminID');

        return view('admin.admin-register');
    }
    public function adminStore(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|string|max:255|unique:admins',
            'password' => 'required|string|min:6|confirmed',
            'enterprise' => 'required|string|max:255',
        ]);

        $password=Hash::make($request->get('password'));

        $representative=new Admin([
            'username' => $request->get('username'),
            'password' => $password,
            'enterprise' => $request->get('enterprise')
        ]);
        //$representative->save();
echo 'hello';
       // return redirect('admin-sign-in');
    }

    public function superAdminShowLogin()
    {
        //if (Session::has('username')) echo  'ok-ckeck';

        //else
        return view('admin.super-admin-login');
    }
    public function superAdminDoLogin(Request $request)
    {

        //echo 'hello';
        $this->validate($request, [
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:6',
        ]);

        $username=$request->get('username');
        $password=$request->get('password');

        //if ($form='signin'){
        $pass = DB::table('super_admins')->where('username',$username)->value('password');
        //Hash::check($password,$pass)
        if($password==$pass){

            $id=DB::table('super_admins')->where('username',$username)->value('id');
            Session::put('super-admin-username',$username);
            Session::put('super-adminID',$id);
/*
            $places=DB::table('buses')->distinct()->select('name')->get();
            $tickets=DB::table('tickets')->where('tickets.status','pending')
                ->join('payments','tickets.paymentID','payments.id')
                ->join('users','tickets.userID','users.id')
                ->select('users.username','users.phone no','tickets.boarding_point','tickets.booking_time',
                    'payments.trxID','payments.amount','tickets.status','tickets.id')->get();

            return view('admin.ticket-list')->with('buses',$places)->with('tickets',$tickets);//redirect()->route('sign-in');
*/
            return redirect('super-admin-home');
        }

        //}
        //Session::put('username',$username);
        return view('admin.super-admin-login')->with('agentwrong','username or password wrong');//redirect()->route('sign-in');

    }
    public function superAdminLogout(){
        Session::forget('super-admin-username');
        Session::forget('super-adminID');
        //return redirect()->route('/');
        //Auth::logout();
        return view('admin.super-admin-login');
    }
    public function superAdminHome()
    {
        //if (Session::has('username')) echo  'ok-ckeck';

        //else
        //$admin=DB::table('representatives')->where('username',$id)->value('adminID');

        return view('admin.super-admin-home');
    }
    public function superAdminConfirmTicket($id){
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

    public function reptShowLogin()
    {
        //if (Session::has('username')) echo  'ok-ckeck';

        //else
        return view('representative.representative-login');
    }
    public function reptDoLogin(Request $request)
    {

        //echo 'hello';
        $this->validate($request, [
            'username' => 'required|string|max:255',
            'password' => 'required|string',
        ]);

        $username=$request->get('username');
        $password=$request->get('password');


        $admin=DB::table('representatives')->where('username',$username)->value('adminID');

        if($admin==null)
            return view('representative.representative-login')->with('rep_wrong','This account is not confirmed yet.');

        //if ($form='signin'){
        $pass = DB::table('representatives')->where('username',$username)->value('password');

        if(Hash::check($password,$pass)){

            $id=DB::table('representatives')->where('username',$username)->value('id');
            Session::put('rep-username',$username);
            Session::put('repID',$id);

            return redirect('representative-home');//redirect()->route('sign-in');
        }

        //}
        //Session::put('username',$username);
        return view('representative.representative-login')->with('rep_wrong','username or password wrong');//redirect()->route('sign-in');

    }
    public function reptLogout(){
        Session::forget('rep-username');
        Session::forget('repID');
        //return redirect()->route('/');
        //Auth::logout();
        return view('representative.representative-login');
    }
    public function reptHome()
    {
        //if (Session::has('username')) echo  'ok-ckeck';

        //else
        //$admin=DB::table('representatives')->where('username',$id)->value('adminID');

            return view('representative.representative-home');
    }

    public function employeeShowLogin()
    {
        //if (Session::has('username')) echo  'ok-ckeck';

        //else
        return view('employee.employee-login');
    }
    public function employeeDoLogin(Request $request)
    {

        //echo 'hello';
        $this->validate($request, [
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:6',
        ]);

        $username=$request->get('username');
        $password=$request->get('password');

        //if ($form='signin'){
        $pass = DB::table('super_admins')->where('username',$username)->value('password');

        if(Hash::check($password,$pass)){
            $admin=DB::table('super_admins')->where('username',$username)->value('adminID');

            if($admin==Null){
                return view('employee.employee-login')->with('employeewrong','Your account is not confirmed yet.');//redirect()->route('sign-in');
            }
            $id=DB::table('super_admins')->where('username',$username)->value('id');
            Session::put('employee-username',$username);
            Session::put('employeeID',$id);

            //return view('employee.employee-home');//redirect()->route('sign-in');
            return redirect('employee-home');
        }

        //}
        //Session::put('username',$username);
        return view('employee.employee-login')->with('agentwrong','username or password wrong');//redirect()->route('sign-in');

    }
    public function employeeLogout(){
        Session::forget('employee-username');
        Session::forget('userID');
        //return redirect()->route('/');
        //Auth::logout();
        return view('employee.employee-login');
    }
    public function employeeHome()
    {
        //if (Session::has('username')) echo  'ok-ckeck';

        //else
        //$admin=DB::table('representatives')->where('username',$id)->value('adminID');

        return view('employee.employee-home');
    }

}