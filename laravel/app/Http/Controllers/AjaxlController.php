<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AjaxlController extends Controller
{
    //
    public function getSeatStatus($id){
        $status=DB::table('seats')->select('id','status')->where('tripID',$id)->get();
        $idx=0;
        $st='';
        $temp=collect();
        foreach ($status as $prc){
            $j=0;
            foreach($prc as $pr){
                if($j==0) $idx=$pr;
                else $st=$pr;
                $j=$j+1;
            }
            $temp->put($idx,$st);
        }
//echo $status;
        return response()->json($temp,200);
    }
    public function updateStatus($id,$status,$userID){
        DB::table('seats')->where('id',$id)->update(['status'=>$status,'ticketID'=>$userID,'updated_at'=>Carbon::now()]);
        return response()->json(array('ok'=>'ok'),200);
    }
    public function getUserID($id){
        $id=DB::table('users')->where('username',$id)->value('id');
        return response()->json(array('userID'=>$id),200);
    }

    public function getSeatList($id){
        $list=DB::table('seats')
            ->where('seats.ticketID',$id)
            ->join('seat_infos','seats.seatID','seat_infos.id')
            ->select('seat_infos.seatNo','seat_infos.category','seats.fare')->get();

        //dd($list);
        return response()->json($list,200);
    }
}
