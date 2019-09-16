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
                'payments.amount','tickets.status','payments.trxID','tickets.id')->get();

        return view('employee.employee-ticket-list')->with('buses',$places)
            ->with('tickets',$tickets)->with('ticket_status','pending');//redirect()->route('sign-in');
    }

    public function getFilteredTicketList(Request $request){
        $val = $request->get('ticket_status');
        $places=DB::table('buses')->distinct()->select('name')->get();
        $tickets='';
        if($val=='pending'){
            $tickets=DB::table('tickets')->where('tickets.status',$val)
                ->join('payments','tickets.paymentID','payments.id')
                ->join('users','tickets.userID','users.id')
                ->select('users.username','users.phone no','tickets.boarding_point','tickets.booking_time',
                    'payments.amount','tickets.status','payments.trxID','tickets.id')->get();
        }
        elseif($val=='cancelling'){
            $tickets=DB::table('tickets')->where('tickets.status',$val)
                ->join('payments','tickets.paymentID','payments.id')
                ->join('users','tickets.userID','users.id')
                ->select('users.username','users.phone no','tickets.boarding_point','tickets.booking_time',
                    'payments.amount','payments.refund_mobile','tickets.status','payments.trxID','tickets.id')->get();
        }

        return view('employee.employee-ticket-list')->with('buses',$places)
            ->with('tickets',$tickets)->with('ticket_status',$val);//redirect()->route('sign-in');
    }

}