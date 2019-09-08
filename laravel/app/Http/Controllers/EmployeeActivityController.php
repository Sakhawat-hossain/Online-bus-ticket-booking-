<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class employeeActivityController extends Controller
{
    public function getTicketList(){
        $places=DB::table('buses')->distinct()->select('name')->get();
        $tickets=DB::table('tickets')->where('tickets.status','pending')
            ->join('payments','tickets.paymentID','payments.id')
            ->join('users','tickets.userID','users.id')
            ->select('users.username','users.phone no','tickets.boarding_point','tickets.booking_time',
                'payments.trxID','payments.amount','tickets.status','tickets.id')->get();

        return view('employee.employee-ticket-list')->with('buses',$places)
            ->with('tickets',$tickets);//redirect()->route('sign-in');
    }

}