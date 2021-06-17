<?php

namespace App\Http\Controllers;

use App\Models\group_tables;
use App\Models\grname_tables;
use App\Models\discipl_tables;
use App\Models\score_tables;
use App\Models\octype_tables;
use App\Models\user_tables;
use App\Models\userforgroup_tables;
use App\Models\event_tables;
use App\Models\evtype_tables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Codedge\Fpdf\Fpdf\Fpdf;
use PDF;
class groupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function selectGroup()
    {

        $newSelectGroup = grname_tables::get();

        return view('newSelectGroup',compact('newSelectGroup'));
    }

    public function showDisciplForGroup($item)
    {
        // dd($item);
        $disciplinsSelect = group_tables::where('id_grname',$item)->get();
        return view('showDiscipleForGroup',compact('disciplinsSelect','item'));

    }

    public function journalSelect($item,$secItem,Request $request)
    {
        // $selectGroup = grname_tables::where('id_grname',$item)->get();
        $selectDisc = discipl_tables::where('id_discipl',$secItem)->get();
        $SelectOneDisc = $selectDisc[0]->discipl_name;
        // $SelectOnegroup = $selectGroup[0]->group_name;

        if($request->ajax()) {


            if(isset($request->datecal)) {
                $d =$request->datecal;
                // $kk = $request->item;
                // $tt = $request->discItem;
                // $itemForCal = $item;

                $sos = score_tables::
                where('datee_score',$d)
                 ->where('id_grname',$item)
                 ->where('id_discipl',$secItem)
                ->get();
                return view('calendar',compact('item','secItem','d','sos','SelectOneDisc'))->render();
            }

        }



      //  if(isset($request->ajax()) {
       //     $selectDate = score_tables::
       //     where('id_grname',$discItem)
       //     ->where('id_discipl',$item)
       //     ->where('')
      //  }

        // $selectScore = score_tables::
        // where('id_grname',$discItem)
        // ->where('id_discipl',$item)
        // ->get();


        // return view('newJournal',compact('item','discItem','selectScore','selectDisc'));
        return view('newJournal', compact('item','secItem','selectDisc'));

    }




    public function AddJournal($item,$discItem)
    {
        $selectScore = score_tables::
        where('id_grname',$discItem)
        ->where('id_discipl',$item)
        ->get();
        // dd($item,$discItem);

        $selectdiscForScore = discipl_tables::where('id_discipl',$discItem)->get();
        $selectGroupForScore = grname_tables::where('id_grname',$item)->get();
        $selectusersForScore = userforgroup_tables::where('id_grname',$item)->get();
        $eventForScore = event_tables::get();
        $evtypeForScore = evtype_tables::get();
        $ocenkaForScore = octype_tables::get();
        // dd($selectusersForScore);
        return view('create.createScore',compact('selectGroupForScore','selectdiscForScore','selectusersForScore','eventForScore','evtypeForScore','ocenkaForScore'));

    }

    public function disciplinSelect() {
        $discipSelect = discipl_tables::get();


        return view('discipl.index',compact('discipSelect'));

    }

    public function addDisciplinForGroup() {
        $discipSelect = discipl_tables::get();

        $grnameSelect = grname_tables::get();

        return view('discipl.addDisciplinForGroup',compact('discipSelect', 'grnameSelect'));
    }


    public function disciplGr(Request $request) {
    // dd($request->all());
    group_tables::insert(
        ['id_discipl'=>$request->id_disciplin,
         'id_grname'=>$request->id_grname,
        ]);

        return redirect('/ggNew');
    }



// ВАЖНО

    public function groupForPDF() {
       $gr = grname_tables::get();
        return view('groupPdf',compact('gr'));
    }
    public function groupExpPdf() {
        $gr = grname_tables::all();
        $pdf = PDF::loadview('groupPdf',compact('gr'));
        return $pdf->download('text.pdf');
    }

// ВАЖНО

    public function secondOtchetForm() {

        $grname = grname_tables::get();


        return view('otchetSecondForm',compact('grname'));
    }

    public function allDisciplOtchet(Fpdf $fpdf, Request $request) {

        // dd($request->all());

        $scoreOtchetDisciplinsAll = score_tables::
        where('id_grname',$request->id_grname)
        ->where('datee_score',$request->datee_score)
        ->get();


        $idGRN = $request->id_grname;
        // $Grname =grname_tables::where('id_grname',$idGRN)->get
        $dateGRN = $request->datee_score;
        return view('otchet.test', compact('scoreOtchetDisciplinsAll','idGRN','dateGRN'));

    }

    public function allDisciplOtchetPDF($idGRN,$dateGRN) {
        $gr = grname_tables::all();
        $scoreOtchetDisciplinsAll = score_tables::
        where('id_grname',$idGRN)
        ->where('datee_score',$dateGRN)
        ->get();
        $pdf = PDF::loadview('otchet.test',compact('scoreOtchetDisciplinsAll','idGRN','dateGRN'));
        return $pdf->download('text.pdf');
    }


    public function groupAndDisOt() {

    $grname = grname_tables::get();

    return view('otchet.first',compact('grname'));
    }

    public function groupDisPDF($item) {

        $dis = group_tables::where('id_grname',$item)->get();

        $GroupItem = grname_tables::where('id_grname',$item)->get();

        return view('otchet.firstDisc',compact('dis','item','GroupItem'));
        }




        public function addOtchResult(Request $request) {

            // $dis = group_tables::where('id_grname',$item)->get();

            // $GroupItem = grname_tables::where('id_grname',$item)->get();

            // return view('otchet.firstDisc',compact('dis','item','GroupItem'));

            // dd($request->all());

            $studForGroupAndDis =score_tables::
            where('id_grname',$request->id_grname)
            ->where('id_discipl',$request->id_discipl)
            ->get();
            $idGRN = $request->id_grname;
            $dateGRN = $request->id_discipl;

            return view('otchet.testSec',compact('studForGroupAndDis','idGRN','dateGRN'));

        }

        public function addSecOtchetAddPDF($idGRN,$dateGRN) {
            $studForGroupAndDis =score_tables::
            where('id_grname',$idGRN)
            ->where('id_discipl',$dateGRN)
            ->get();

            $pdf = PDF::loadview('otchet.testSec',compact('studForGroupAndDis','idGRN','dateGRN'));
            return $pdf->download('text.pdf');
        }



    public function ekzOtchetForm() {
        $user = User::get();


        return view('ekzFormOtchet',compact('user'));
    }

    public function ekzOtchetCreate(Fpdf $fpdf,Request $request) {
        // $user = User::get();

            $userId = $request->id_user;


            $event = event_tables::where('id_evtype',4)->get();

            $selScore = score_tables::
            where('id_user',$userId)
            ->whereHas('eventForScore',function($q){
                $q->where('id_evtype',4);
            })->get();


        // dd($evtype);
        return view('pp',compact('selScore','userId'));
    }

    public function addEkzOtchetCreate ($userId) {

        // dd($userId);
        $selScore = score_tables::
        where('id_user',$userId)
        ->whereHas('eventForScore',function($q){
            $q->where('id_evtype',4);
        })->get();

        $pdf = PDF::loadview('pp',compact('selScore','userId'));
        return $pdf->download('text.pdf');



    }




    public function  disciplDelete($item) {

                // dd($item);
                // $deletdiscipl = discipl_tables::find($item);
                $deletdiscipl = discipl_tables::
                where('id_discipl',$item)
                ->delete();



                // $deletdiscipl->delete();
                return redirect('/disciplinSelect');

    }

    public function addJournalFinal(Request $request)
    {
        // dd($request->all());
        score_tables::insert(
            ['id_user'=>$request->id_user,
             'id_octype'=>$request->id_octype,
             'id_discipl'=>$request->id_discipl,
             'id_event'=>$request->id_event,
             'datee_score'=>$request->datee_score,
             'id_grname'=>$request->id_grname,
            ]);

            return redirect('/ggNew');
    }




    public function index()
    {

        $selectGroup = group_tables::get();

        return view('selectGroup',compact('selectGroup'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\group_tables  $group_tables
     * @return \Illuminate\Http\Response
     */
    public function show($group)
    {

        $disciplinsSelect = DB::table('discipl_tables')
        ->where('id_discipl',$group)
        ->get();

        return view('showDisciplins',compact('disciplinsSelect','group'));
    }
    public function showJournal($id_discipl,$group)
    {
        // $scoreSelect = DB::table('score_tables')
        // ->where('id_discipl',$group)
        // ->get();


        // $selectScore = DB::table('discipl_tables')
        // ->where('id_discipl',$group)
        // ->get();

        $selectScore = score_tables::where('id_score',$group)->get();
        return view('showJournal', compact('selectScore'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\group_tables  $group_tables
     * @return \Illuminate\Http\Response
     */
    public function edit(group_tables $group_tables)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\group_tables  $group_tables
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, group_tables $group_tables)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\group_tables  $group_tables
     * @return \Illuminate\Http\Response
     */
    public function destroy(group_tables $group_tables)
    {
        //
    }


















}
