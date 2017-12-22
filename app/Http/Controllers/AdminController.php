<?php
namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller{
    
    public function signup(Request $req){
        $username = $req['username'];
        $password = bcrypt($req['password']);
        
        $admin = new Admin();
        $admin->username = $username;
        $admin->password = $password;
        
        $admin->save();
        
        
        return redirect()->back();
    }
    
    public function signin(Request $req){
        if(Auth::attempt(['username' => $req['username'], 'password' => $req['password']])) 
            return redirect('/testing');
        
        return redirect()->back();
    }
    
    public function logout(){
        Auth::logout();
        
        return redirect('/login');
    }
    
    public function viewaddadmin(){
        return view('admins', ['pagename' => 'Añadir administrador']);
    }
    
    public function viewlogin(){
        if (Auth::check())
            return redirect()->back();
        
        return view('login');
    }
}