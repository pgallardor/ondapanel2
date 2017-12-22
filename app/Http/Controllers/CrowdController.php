<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Payment as Payment;
use \App\Project as Project;
use \App\Creator as Creator;
use \App\Plan as Plan;
use \App\Profile as Profile;
use Carbon\Carbon;
use \PDF;

class CrowdController extends Controller
{
    public function crowdindex(){
       return view('crud/crowd_index');
    }
    
    public function adduserprofile(){
        
        $users = Creator::all();
        return view('crud/user_profile', ['users' => $users]);
    }
    
    public function postuser(Request $req){
        $user = new Creator();
        $user['email'] = $req['email'];
        $user['password'] = bcrypt($req['password']);
        $user['fullname'] = $req['fullname'];
        $user['profile_id'] = 'null';
        
        $user->save();
        
        return redirect()->back();
    }
    
    public function postprofile(Request $req){
        $profile = new Profile();
        
        $profile['username'] = $req['username'];
        $profile['display_name'] = $req['display'];
        $profile['birthday'] = Carbon::parse($req['bday']);
        $profile['country'] = $req['country'];
        
        $user_ref = $req['user'];
        
        //var_dump();
        $profile->save();
        $user = Creator::find($user_ref);
        $user['profile_id'] = $profile->id;
        
        $user->save();
        
        return $profile;
        //return redirect()->back();
        
    }
    
    public function addproject(){
        $projects = Project::all();
        $users = Creator::all();
        $plans = Plan::all();
        return view('crud/project_plan', ['projects' => $projects, 'users' => $users, 'plans' => $plans]);
    }
    
    public function postproject(Request $req){
        $project = new Project();
        
        $project['name'] = $req['name'];
        $project['descr'] = $req['descr'];
        $project['mode'] = $req['mode'];
        $project['cat'] = $req['cat'];
        $project['deadline'] = Carbon::parse($req['deadline']);
        $project['goal'] = $req['goal'];
        $project['user_id'] = $req['user'];
        
        $project['status'] = 0;
        
        $project->save();
        
        return redirect()->back();
    }
    
    public function postplan(Request $req){
        $plan = new Plan();
        
        $plan['name'] = $req['name'];
        $plan['brief'] = $req['brief'];
        $plan['descr'] = $req['descr'];
        $plan['floor'] = $req['floor'];
        $plan['project_id'] = $req['project'];
        
        $plan->save();
        
        return redirect()->back();
    }
    
    public function postpayment(Request $req){
        $payment = new Payment();
        
        $payment['amount'] = $req['amount'];
        $payment['method'] = $req['method'];
        
        $plan = Plan::find($req['plan']);
        $project = $plan->project()->first();
        
        $payment['plan'] = $plan['name'];
        $payment['project_id'] = $project['_id'];
        $payment['user_id'] = $req['user'];
        
        $payment->save();
        
        return redirect()->back();
        
    }
    
    ////////////////// THIS SHOULD NOT BE HERE BUT WHATEVER ////////////////////////
    
    public function pdfstuff($id){
        $project = Project::find($id);
        
        $project['pays'] = $project->payments($id);
        
        foreach($project['pays'] as $pay){
            $pay['date'] = $pay['created_at']->format('d-m-Y');
            $pay['status'] = 'Pagado';
        }
        
        $pdf = PDF::loadView('pdfviews/pdf_pays', compact('project'));
        return $pdf->stream();
    }
}