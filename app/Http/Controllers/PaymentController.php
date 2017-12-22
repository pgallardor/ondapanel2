<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Payment as Payment;
use \App\Project as Project;
use \App\Creator as Creator;
use Carbon\Carbon;


class PaymentController extends Controller
{
   
    public function paymentByProject(){
        
        $starting_date = ['year' => 2017, 'month' => 6];
        
        if (empty(request()->search) && empty(request()->dates))
            $projects = Project::all();
        
        else{
            //0 day, 1 month, 2 year
            if (request()->dates == 'all'){
                $from = Carbon::createFromDate($starting_date['year'], $starting_date['month'], '1');
                $to = Carbon::now();
            }
                
            else{
                $date = explode("-", request()->dates);
                $from = Carbon::createFromDate($date[2], $date[1], '1');
                $to = Carbon::createFromDate($date[2], $date[1], $date[0]);
            }
            
            
            $projects = Project::where('created_at', '>', $from)
                                       ->where('created_at', '<', $to) 
                                        ->get();
        }
            
        $reference = 0;
        
        foreach($projects as $project){
            $pymnts = $project->payments($project['_id']);
            
            foreach($pymnts as $pay){
                $user = $pay->user()->first();
                
                $pay['date'] = $pay['created_at']->format('Y-m-d');
                //$pay['user'] = $user['email'];
            }
            
            $project['pays'] = $pymnts;
            $project['reference'] = 'ref'.$reference;
            $reference++;
        }
    
        $datelist = $this->dateList(['year' => 2017, 'month' => 6]);
        
        return view('payments', ['projects' => $projects, 'pagename' => 'Pagos', 'dates' => $datelist]);
    }
    
    public function paymentDetail($pyid){
        
    }
    
    ////////////////////////////////////  Auxiliary functions ////////////////////////////////////
    
    protected function dateList($idate){
        $monthstring = ['haha BENIS :DDDD', 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 
                            'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
        
        foreach($idate as $key=>$value){
            $initial_date[$key] = $value;
        }
        
        $today = Carbon::now();
        $year = $initial_date['year'];
        $month = $initial_date['month'];
        
        $count = 0;
        $dt_list = array();
        
        while($year < $today->year or $month <= $today->month){
            
            if ($month > 12){
                $month = 1;
                $year++;
            }  
            
            if ($month == 2)
                $last_day = (date('L', mktime(0,0,0,1,1,$year)) ? 29 : 28); 
            else
                $last_day = ($month % 2 == 1 and $month <= 7 or $month % 2 == 0 and $month > 7) ? 31 : 30;
            
            $value = $last_day.'-'.$month.'-'.$year;
            $strlist = $monthstring[$month].' '.$year;
            
            $dt_list[$count++] = ['value' => $value, 'string' => $strlist];
            
            $month++;
                
        }
        
        return $dt_list;
    }
    
}
