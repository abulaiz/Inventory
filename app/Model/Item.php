<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
   	public $autoincrement = false;
	
	protected $keyType = 'char';

	protected $guarded = [''];
}
