<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Creator as Creator;

class UserController extends Controller
{
    
    public function index()
    {
        if (empty(request()->search))
            $user = Creator::all();
        
        //el filtro no va a funcionar
        else
            $user = Creator::where('username', 'like', '%'.request()->search.'%')->get();
        
        return view('users', ['users' => $user, 'pagename' => 'Usuarios']);
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        $user = Creator::find($id);
        return view('profile', ['pagename' => 'Perfil', 'user' => $user]);
    }

    //puede que esto tampoco funcione
    public function setBan($id, $ban){
        $user = Creator::find($id);
        $user->status = $ban;
        $user->save();
        
        return redirect('/users');
    }
    
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
