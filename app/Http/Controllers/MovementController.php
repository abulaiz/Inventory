<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Movement;
use App\Model\Item;

use Auth;
use App\Libs\SimpleEnc;

class MovementController extends Controller
{
    private $enc;

    public function __construct()
    {
        $this->middleware('auth');
        $this->enc = new SimpleEnc();
    }	

    public function move(Request $req){
        $this->validate($req, [
            "posisi_tujuan" => "required"
        ]);

        if($req->posisi_tujuan == 2 && !isset($req->unit_id))
        	return redirect()->back()->with(['_msg'=>"Silahkan pilih unit yang dituju.",'_e'=>'danger']);    

        $unit_id = isset($req->unit_id) ? $req->unit_id : null;
        $item = Item::find($req->id);
        Movement::create([
        	'item_id' => $req->id, 
        	'user_id' => Auth::user()->id,
        	'from_position' => $item->position,
        	'to_position' => $req->posisi_tujuan,
        	'from_unit' => $item->unit_id,
        	'to_unit' => $unit_id
        ]);

        $item->position = $req->posisi_tujuan;
        $item->unit_id = $unit_id;
        $item->save();
        return redirect()->back()->with(['_msg'=>"Barang berhasil dipindahkan.",'_e'=>'update']);
    }

    public function history($id){
    	$id = $this->enc->decrypt($id);
    	$data = Item::find($id);
    	return View('content.data_barang.history_movement', compact('data'));
    }
}
