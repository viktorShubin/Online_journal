<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\discipl_tables;
use App\Models\grname_tables;
use App\Models\group_tables;
use App\Models\score_tables;
use App\Models\userforgroup_tables;
use App\Models\event_tables;
use App\Models\evtype_tables;
use App\Models\octype_tables;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use App\public\fpdf\fpdf;
;


class TeacherController extends Controller
{
    public function myDisciplins() {
        $userId = auth::id();

        $myDisciplins = discipl_tables::where('id_user',$userId)->get();

        return view('teacher.home',compact('myDisciplins','userId'));
    }
    public function myGroup($itemDis) {
        $userId = auth::id();
        // dd($itemDis);
        $myGroup = group_tables::where('id_discipl',$itemDis)->get();

        return view('teacher.group',compact('myGroup','userId','itemDis'));
    }

    public function myJournal($itemDis,$itemGrn, Request $request) {

        $journalForTeacher = score_tables::
        where('id_discipl',$itemDis)
        ->where('id_grname',$itemGrn)
        ->get();

        $disciplin =discipl_tables::where('id_discipl',$itemDis)->get();
        $groupName =grname_tables::where('id_grname',$itemGrn)->get();


        if($request->ajax()) {


            if(isset($request->datecal)) {
                $d =$request->datecal;
                // $kk = $request->item;
                // $tt = $request->discItem;
                // $itemForCal = $item;

                $journalForTeacher = score_tables::
                where('id_discipl',$itemDis)
                ->where('id_grname',$itemGrn)
                ->where('datee_score',$d)
                ->get();
                return view('teacherCalendar',compact('d','itemDis','itemGrn','journalForTeacher','disciplin','groupName'))->render();
            }

        }







        return view('teacher.journal',compact('journalForTeacher','itemDis','itemGrn','disciplin','groupName'));
    }

    public function addScoreForTeacher($item,$itemDis) {
        // dd($itemDis);

        // $selectScore = score_tables::
        // where('id_grname',$item)
        // ->where('id_discipl',$itemDis)
        // ->get();

        $groupForAddScore = grname_tables::where('id_grname',$itemDis)->get();
        $selectusersForScore = userforgroup_tables::where('id_grname',$itemDis)->get();
        $selectdiscForScore = discipl_tables::where('id_discipl',$item)->get();
        $selectGroupForScore = grname_tables::where('id_grname',$itemDis)->get();
        $ocenkaForScore = octype_tables::get();
        $eventForScore = event_tables::get();
        return view('teacher.addScore',compact('item','itemDis','groupForAddScore','selectusersForScore','ocenkaForScore','selectdiscForScore','eventForScore','selectGroupForScore'));



    }


    public function addScoreDb(Request $request) {
        // dd($request->all());
        score_tables::insert(
            ['id_user'=>$request->id_user,
             'id_octype'=>$request->id_octype,
             'id_discipl'=>$request->id_discipl,
             'id_event'=>$request->id_event,
             'datee_score'=>$request->datee_score,
             'id_grname'=>$request->id_grname,
            ]);

            return redirect('myDisciplins');


    }



}
