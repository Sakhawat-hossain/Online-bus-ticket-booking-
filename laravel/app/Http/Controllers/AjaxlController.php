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

    public function getUserGender($id){
        $gender=DB::table('users')->where('username',$id)->value('gender');
        return response()->json(array('gender'=>$gender),200);
    }

    public function getSeatList($id){
        $list=DB::table('seats')
            ->where('seats.ticketID',$id)
            ->where('seats.status','booked')
            ->join('seat_infos','seats.seatID','seat_infos.id')
            ->select('seat_infos.seatNo','seat_infos.category','seats.fare')->get();

        //dd($list);
        return response()->json($list,200);
    }

    public function getBusLayout($id){
        $layoutRow = DB::table('bus_layouts')->where('id',$id)->
            select('id','busID','decker_num','rows','columns','layout')->get();
        $idx = 1;
        $decker=$rows=$columns=$layoutStr='';
        foreach ($layoutRow as $row){
            foreach ($row as $data){
                if($idx==3) $decker=$data;
                else if($idx==4) $rows=$data;
                else if($idx==5) $columns=$data;
                else if($idx==6) $layoutStr=$data;

                $idx=$idx+1;
            }
        }

        $layoutArr = explode(";",$layoutStr);
        $layout='';
        for($i=0;$i<$rows;$i++)
            $layout[$i] = explode(",",$layoutArr[$i]);

        $layout['decker'] = $decker;
        $layout['rows'] = $rows;
        $layout['columns'] = $columns;


        return response()->json($layout,200);
    }
}
