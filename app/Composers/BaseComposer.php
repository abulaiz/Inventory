<?php 

namespace App\Composers;

use Illuminate\View\View;

use App\Libs\Alert;
use App\Libs\MyString;
use App\Libs\SimpleEnc;

class BaseComposer
{
	private $alert, $str, $enc;

	public function __construct()
	{
		$this->alert = new Alert;
		$this->str = new MyString;
		$this->enc = new SimpleEnc;
	}

	public function compose(View $v)
	{
		$v->with('_alert',$this->alert)
		  ->with('_enc', $this->enc)
		  ->with('_str', $this->str);
	}

}