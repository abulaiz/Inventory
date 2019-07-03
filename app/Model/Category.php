<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false; 

    protected $guarded = ['id'];

    public function item()
    {
        return $this->hasMany('App\Model\Item');
    }    
}
