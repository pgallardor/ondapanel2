<?php
namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\Model;

class Plan extends Eloquent {
    protected $connection = 'mongodb';
    protected $collection = 'plans';
    
    public function project(){
        return $this->hasOne('\App\Project', '_id', 'project_id');
    }
}