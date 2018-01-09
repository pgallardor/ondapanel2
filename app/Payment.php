<?php
namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\Model;

class Payment extends Eloquent {
    protected $connection = 'mongodb';
    protected $collection = 'payments';
    
    //public function project() {
      //  return $this->hasOne('App\Project', '_id', 'project_id');
    //}
    
    public function user() {
        return $this->hasOne('App\Creator', '_id', 'user_id');
    }
}