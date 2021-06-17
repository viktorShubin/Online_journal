<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\grname_tables;
use App\Models\userforgroup_tables;
use App\Models\group_tables;
use App\Models\discipl_tables;
use App\Models\score_tables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class studentController extends Controller
{
    public function home() {
        $user = auth::user();
        $userId = auth::id();

        // $groupForUsers = userforgroup_tables::get();

        $groupForUsers = userforgroup_tables::
        where('id_user',$userId)
        ->get();

        return view('student.myGroup',compact('groupForUsers','user','userId'));
    }

    public function myDiscipl($item) {
        // dd($item);
        // $selectDiscipl = group_tables::where('id_grname',$item);
        $selectDiscipl = group_tables::where('id_grname', $item)->get();
        return view('student.myDiscipl',compact('selectDiscipl','item'));
    }


    public function myJournal($item,$itemDis, Request $request) {
        $userId = auth::id();
        // dd($item);
        // dd($itemDis);
        if($request->ajax()) {


            if(isset($request->datecal)) {
                $d =$request->datecal;
                // $kk = $request->item;
                // $tt = $request->discItem;
                // $itemForCal = $item;

                $journalForUserForDate = score_tables::
                where('id_discipl',$itemDis)
                ->where('id_grname',$item)
                ->where('id_user',$userId)
                ->where('datee_score',$d)
                ->get();
                return view('userCalendar',compact('item','itemDis','journalForUserForDate','d','userId'))->render();
            }

        }




        $journalForUser = score_tables::
        where('id_discipl',$itemDis)
        ->where('id_grname',$item)
        ->where('id_user',$userId)
        ->get();

        $disName = discipl_tables::where('id_discipl',$itemDis)->get();

        return view('student.myJournal',compact('journalForUser','userId','disName','item','itemDis'));
    }

}
