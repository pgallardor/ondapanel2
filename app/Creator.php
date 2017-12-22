<?php
namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\Model;

class Creator extends Eloquent {
    protected $connection = 'mongodb';
    protected $collection = 'user';
    
    public function profile(){
        return $this->hasOne('App\Profile', '_id', 'profile_id');
    }
}