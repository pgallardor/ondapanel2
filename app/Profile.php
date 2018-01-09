<?php
namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\Model;

class Profile extends Eloquent {
    protected $connection = 'mongodb';
    protected $collection = 'profiles';
    
}