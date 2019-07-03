<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Category;
use App\Model\Submission;

use Auth;

class SubmissionController extends Controller
{
    public function index(){
    	if(Auth::user()->hasRole('manager'))
    		$data = Submission::where('status', '1')->get();
    	else
    		$data = Submission::where('user_id', Auth::user()->id)->get();

    	return View('content.pengajuan_barang.index', compact('data'));
    }

    public function create(){
    	$category = Category::all();
    	return View('content.pengajuan_barang.create', compact('category'));
    }

    public function store(Request $req){
        $this->validate($req, [
            "jenis_pengajuan" => "required"
        ]);   
        if($req->jenis_pengajuan == 1){
	        $this->validate($req, [
	            "nama_kategori_barang" => "required"
	        ]);           	
        } else {
	        $this->validate($req, [
	            "kategori_barang" => "required",
	            "jumlah_stok" => "required|numeric|min:1"
	        ]);   
        }

        $new =  $req->jenis_pengajuan == 1;
        Submission::create([
        	'new_category' =>$new,
        	'category_name' => $new ? $req->nama_kategori_barang : null,
        	'category_id' => $new ? null : $req->kategori_barang,
        	'qty' => $new ? null : $req->jumlah_stok,
        	'status' => '1', 'user_id' => Auth::user()->id
        ]);

        return redirect('/submission')->with(['_msg'=>"Pengajuan berhasil ditambahkan.",'_e'=>'success']);  
    }    
}
