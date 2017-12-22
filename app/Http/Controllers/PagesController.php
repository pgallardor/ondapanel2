<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use \App\Creator as Creator;
use \App\Project as Project;
use Carbon\Carbon as Carbon;

class PagesController extends Controller {
    
    public function getHome() {
        
        if(empty(request()->search))
            $project = Project::where('status', '=', 0)->get();
        
        else
            $project = Project::where('status', '=', 0)
                                ->where('name', 'like', '%'.request()->search.'%')
                                ->get();
        
        
        foreach ($project as $proj){
            $proj['user'] = $proj->user()->first();
            //$deadline = Carbon::instance($proj['deadline']->toDateTime());
            $deadline = Carbon::now()->addWeeks(2);
            $proj['deadline'] = $deadline->format('d-m-Y');
            $proj['remaining'] = $this->remaining($deadline); 
        }
        return view('index', ['project' => $project, 'pagename' => 'Home']);
    }
    
    protected function remaining(\DateTime $date1){
        $now = new \DateTime();
        //var_dump($now->diff($date1)->days);
        $diff = $now->diff($date1);
        return $diff->format("%r%a");
    }

}