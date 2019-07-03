<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Movement;
use App\Model\Item;

use Auth;

class MovementController extends Controller
{
    public function move(Request $req){
        $this->validate($req, [
            "posisi_tujuan" => "required"
        ]);

        if($req->posisi_tujuan == 2 && !isset($req->unit_id))
        	return redirect()->back()->with(['_msg'=>"Silahkan pilih unit yang dituju.",'_e'=>'danger']);    
        // $item = Item::find($req->id);
        // Movement::create([
        // 	'item_id' => $req->id, 
        // 	'user_id' => Auth::user()->id,
        // 	'from_status' => $item->
        // ]);
    }
}
