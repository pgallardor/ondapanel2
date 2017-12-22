<?php
namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

class Admin extends Eloquent implements Authenticatable{
    protected $connection = 'mongodb';
    protected $collection = 'admin';
    
    use \Illuminate\Auth\Authenticatable;
}