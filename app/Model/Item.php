<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
   	public $autoincrement = false;
	
	protected $keyType = 'char';

	protected $guarded = [''];

    public function movements()
    {
        return $this->hasMany('App\Model\Movement');
    }

    public function category()
    {
        return $this->belongsTo('App\Model\Category');
    }       	
}
