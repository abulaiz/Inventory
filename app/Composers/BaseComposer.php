<?php 

namespace App\Composers;

use Illuminate\View\View;

use App\Libs\Alert;
use App\Libs\MyString;

class BaseComposer
{
	private $alert, $str;

	public function __construct()
	{
		$this->alert = new Alert;
		$this->str = new MyString;
	}

	public function compose(View $v)
	{
		$v->with('_alert',$this->alert)
		  ->with('_str', $this->str);
	}

}