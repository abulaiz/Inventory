<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    protected $guarded = ['id'];

    public function category()
    {
        return $this->belongsTo('App\Model\Category');
    }       
}
