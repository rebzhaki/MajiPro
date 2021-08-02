<?php

namespace App\Http\Controllers;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $this->authorize('viewAny', User::class);
         $users=User::all();
         return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // $this->authorize('create', User::class);
         $roles=Role::all();
         $permissions=Permission::all();
         return view('user.create',compact('roles','permissions'));
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
        // $this->authorize('create', User::class);
        $input=$request->all();
        $input['password']=Hash::make($input['password']);
        $user=User::create($input);
        $user->syncPermissions($input['permissions']);
        return redirect('/user/'.$user->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)

    {
        //
        // $this->authorize('view', $id);
        $user=User::find($id);
        $permissions=Permission::all();
        return view('user.show', compact('user','permissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        // $this->authorize('update', $id);
        $user=User::find($id);
        $roles=Role::all();
        $permissions=Permission::all();
        return view('user.edit', compact('user','permissions','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        // $this->authorize('update', $id);
       $input=$request->all();
        $user=User::find($id);
        if($input['password'] == ''){
           unset($input['password']); 
        }else{
            $input['password']=Hash::make($input['password']);
        }
        $user->update($input);
        $user->syncPermissions($input['permissions']);
        return redirect('/user/'.$user->id);
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     //
    //     $user=User::find($id);
    //     $user->delete();
    //     return redirect('/user');
    // }
    // }
// }
