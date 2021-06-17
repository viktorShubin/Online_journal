<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use  App\Models\model_has_roles;
use  App\Models\roles;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $UserSelect = User::get();
        $modelHasRoles = model_has_roles::get();


       return view('user.index',compact('UserSelect','modelHasRoles'));
    }

    public function addRole($item)
    {
        $modelHasRolesInTable = model_has_roles::where('model_id',$item)->get();
        if($modelHasRolesInTable == true) {
            $modelHasRoles = model_has_roles::get();
            $roleModel = roles::get();
            return view('user.roleUpdate',compact('modelHasRoles','roleModel','item','modelHasRolesInTable'));
        }
    //    $UserSelect = User::get();
        $modelHasRoles = model_has_roles::get();
        $roleModel = roles::get();
        // dd($item);
       return view('user.addRole',compact('modelHasRoles','roleModel','item','modelHasRolesInTable'));

    // dd($item);

    }

    public function addRoleDb(Request $request)
    {
    // //    $UserSelect = User::get();
    //     $modelHasRoles = model_has_roles::get();
    //     $roleModel = roles::get();
    //     // dd($item);
    //    return view('user.addRole',compact('modelHasRoles','roleModel','item'));

        model_has_roles::insert(
            ['role_id'=>$request->role_id,
             'model_type'=>$request->model_type,
             'model_id'=>$request->model_id
            ]);



        return redirect('/users');
    }

    public function updateRoleDb(Request $request)
    {
        // dd($request->all());
        DB::table('model_has_roles')
        ->where('model_id',$request->model_id)
        ->update([
            'role_id'=>$request->role_id,
            'model_type'=>$request->model_type,
            'model_id'=>$request->model_id
        ]);
        return redirect('/users');
    }


    public function deleteUser($item) {


        DB::table('model_has_roles')
        ->where('model_id',$item)
        ->update([
            'role_id'=>4,
            'model_type'=>'App\Models\User',
            'model_id'=>$item
        ]);
        DB::table('users')
        ->where('id',$item)
        ->update([
            'id_role'=>4
        ]);
        return redirect('/users');
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
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
