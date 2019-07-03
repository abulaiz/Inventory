<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Item;
use App\Model\Movement;
use App\Libs\SimpleEnc;

use Auth;

class MissingItemController extends Controller
{

    private $enc;

    public function __construct()
    {
        $this->middleware('auth');
        $this->enc = new SimpleEnc();
    }		

    public function add(Request $req){
    	$id = $this->enc->decrypt($req->item_id);
    	$item = Item::find($id);
        Movement::create([
        	'item_id' => $id, 
        	'user_id' => Auth::user()->id,
        	'from_position' => $item->position,
        	'to_position' => '4',
        	'from_unit' => $item->unit_id,
        	'to_unit' => null
        ]);    	
        $item->position = '4';
        $item->save();
        return redirect()->back()->with(['_msg'=>"Barang telah dilaporkan hilang.",'_e'=>'info']);
    }

    public function report(){
        $data = Item::where('position', '4')->get();
        return View('content.laporan_kehilangan.index', compact('data'));
    }

    public function cancel(Request $req){
        $id = $this->enc->decrypt($req->item_id);
        $item = Item::find($id);
        $item->position = $item->movements->last()->from_position;
        $item->unit_id = $item->movements->last()->from_unit;
        $item->save();
        Movement::where('to_position', '4')->where('item_id', $id)->delete();
        return redirect()->back()->with(['_msg'=>"Laporan Kehilangan telah dibatalkan.",'_e'=>'info']);
    }    
}
