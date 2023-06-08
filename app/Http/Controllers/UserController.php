<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use Hash;
use Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Session::put('page','users');

        $users = User::paginate(5);
        //
    //    echo"<pre>"; print_r($users->name);die;
        return view('layouts.users.index',['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
   
    }

    /**h
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
         $user=new User;
         $user->name=$request->name;
         $user->email=$request->email;
         $user->password=Hash::make($request->password);
         $user->is_admin=$request->role;
         $user->save();
    if($user){
        return redirect()->back()->with('success','User Created Successfully');
    }
    return redirect()->back()->with('User Created Fail');
     

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $users = User::find($id);
        if(!$users)
        {
            return back()->with('error');
        }
        $users->update($request->all());
        return back()->with('success', 'the upated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $users =User::find($id);
        if(!$users)
        {
            return back()->with("Error Delete");
        }
         $users->delete();

        return redirect()-> back()->with('Delete' ,'Successfully Deleted');
    


 
}
}
