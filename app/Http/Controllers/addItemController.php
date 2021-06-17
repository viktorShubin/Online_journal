<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\grname_tables;
use App\Models\discipl_tables;
use App\Models\event_tables;
use App\Models\evtype_tables;
use App\Models\user_tables;
use App\Models\specialforgroup_tables;
use App\Models\User;
use App\Models\userforgroup_tables;
use function GuzzleHttp\Promise\all;

class addItemController extends Controller
{
    public function createGroup() {
        return view('create.createGroup');
    }

    public function addGroup(Request $request) {
        // dd($request->kurs);
        grname_tables::insert(
            ['group_name'=>$request->group_name,
             'kurs'=>$request->kurs,
            ]);

        return redirect('/ggNew');

    }

    public function createDiscipl() {

        $userSelect = User::get();

        return view('create.createDiscipl',compact('userSelect'));
    }

    public function addDiscipl(Request $request) {
        // dd($request->all());
        discipl_tables::insert(
            ['discipl_name'=>$request->discipl_name,
             'id_user'=>$request->id_user,
            ]);

            return redirect('/ggNew');
    }

    public function createEvent() {

        $selectEvtype = evtype_tables::get();

        return view('create.createEvent',compact('selectEvtype'));
    }

    public function addEvent(Request $request) {


        // dd($request->all());

        // $selectEvtype = evtype_tables::get();

        event_tables::insert(
            ['data_ev'=>$request->data_ev,
             'id_evtype'=>$request->id_evtype,
             'theme_ev'=>$request->theme_ev
            ]);
        // return view('create.createEvent',compact('selectEvtype'));
        return redirect('/ggNew');
    }

    public function createSpecialnost() {

        $groupSelect = grname_tables::get();

        return view('create.createSpecial',compact('groupSelect'));
    }


    public function addSpecial(Request $request) {

        // $groupSelect = grname_tables::get();

        // return view('create.createSpecial',compact('groupSelect'));

        specialforgroup_tables::insert(
            ['specialName'=>$request->specialName,
             'id_grname'=>$request->id_grname,
            ]);

            return redirect('/ggNew');

        // dd($request->all());

    }

    public function addUserForGroup(Request $request) {

            $users= User::get();
            $grnameSelect = grname_tables::get();

            return view('create.createStudentForGroup',compact('users','grnameSelect'));
    }

    public function addUseGrouprForDb(Request $request) {
            // dd($request->all());
            userforgroup_tables::insert(
                ['id_grname'=>$request->id_grname,
                 'id_user'=>$request->id_user,
                ]);

                return redirect('/ggNew');

    }



}
