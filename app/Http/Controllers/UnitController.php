<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Unit;
use App\Libs\SimpleEnc;

class UnitController extends Controller
{
    private $enc;

    public function __construct()
    {
        $this->middleware('auth');
        $this->enc = new SimpleEnc();
    }

    public function index(){
    	$unit = Unit::all();
    	return View('content.portal_unit.index', compact('unit'));
    }

    public function items($id){
    	$id = $this->enc->decrypt($id);
    	// dd($id);
    	$unit = Unit::find($id);
    	return View('content.portal_unit.items', compact('unit'));
    }
}
