<?php
namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\Model;

class Project extends Eloquent {
    protected $connection = 'mongodb';
    protected $collection = 'projects';
    
    public function user() {
        return $this->hasOne('App\Creator', '_id', 'user_id'); //change by with user_id when DB is updated
    }
    
    public function payments($p_id) {
        $payments = Payment::where('project_id', '=', $p_id)->get();
        return $payments;
    }

}