<?php 

namespace App\Libs;
use App\Model\Unit;

class MyString
{	
	public function item_position($position, $unit_id){
		$statues = ['Di Gudang', ' Di Unit', 'Di Laundri', 'Hilang'];
		$pos = (int)$position;
		return $statues[$pos-1]. ($unit_id == null ? '' : Unit::find($unit_id)->unit_number);
	}
}