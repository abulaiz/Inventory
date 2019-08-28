<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $guarded = ['id'];
    public $timestamps = false; 

    public function items()
    {
        return $this->hasMany('App\Model\Item');
    }    
}
