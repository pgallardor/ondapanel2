<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use \Carbon\Carbon as Carbon;

class ProjectController extends Controller
{
 
    public function index()
    {
        if(empty(request()->search))
            $project = Project::all();
        
        else
            $project = Project::where('name', 'like', '%'.request()->search.'%')
                                ->get();
        
        
        foreach ($project as $proj){
            $proj['user'] = $proj->user()->first();
            $deadline = Carbon::now()->addWeeks(2);
            $proj['deadline'] = $deadline->format('d-m-Y');
            $proj['remaining'] = $this->remaining($deadline); 
        }
        return view('index', ['project' => $project, 'pagename' => 'Home']);
    }

    
    protected function remaining(Carbon $date1){
        $now = new \DateTime();
        //var_dump($now->diff($date1)->days);
        $diff = $now->diff($date1);
        return $diff->format("%r%a");
    }

    public function create()
    {
        //may work in the future
    }


    public function store(Request $request)
    {
        //LOL.png
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::find($id);
        $usr = $project->user()->first();
        $project['deadline'] = Carbon::now()->addWeeks(2)->format('d-m-Y');
        //$project->cat = $this->categoryString($project->cat);
        return view('project', ['pdetail' => $project, 
                                'pagename' => $project->name, 
                                'creator' => ['id' => $usr['_id'], 'username' => $usr['email']] 
                               ]);
    }


    public function edit($id)
    {
        //may work bruh
    }


    public function update(Request $request, $id)
    {
        //LUL
    }

    
    public function changeValidation($id, $status){
        $project = Project::find($id);
        
        $project->status = $status;
        $project->save();
        
        return redirect('/testing');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //TO DO
    }
    
    protected function categoryString($cID){
        $array = ['audvisual' => 'Audiovisual'];
        return $array[$cID];
    }
}
