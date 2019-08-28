<?php 

namespace App\Libs;
use App\Model\Unit;
use App\Libs\MonoAlpha;

class MyString
{	
	public function item_position($position, $unit_id){
		$m = new MonoAlpha;
		$statues = ['Gudang', ' Unit', 'Laundri', 'Hilang'];
		$pos = (int)$position;
		return $statues[$pos-1]." ".($unit_id == null ? '' : $m->decrypt(Unit::find($unit_id)->unit_number));
	}

	public function status_submission($status){
		$statues = ['Menunggu Konfirmasi', ' Disetujui', 'Ditolak'];
		$pos = (int)$status;
		return $statues[$pos-1];		
	}
}