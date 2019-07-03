<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Category;
use App\Model\Item;
use App\Libs\SimpleEnc;
use App\Model\Unit;

class ItemController extends Controller
{

    private $enc;

    public function __construct()
    {
        $this->middleware('auth');
        $this->enc = new SimpleEnc();
    }

    public function add_category(Request $req){
        $this->validate($req, [
            "nama_kategori" => "required|string|unique:categories,name",
            "inisial" => "required|string|max:3|min:3|unique:categories,code",
        ]);
        
        Category::create([
            'name' => $req->nama_kategori, 'code' => $req->inisial
        ]);

        return redirect()->back()->with(['_msg'=>"Berhasil menambahkan kategori.",'_e'=>'success']);
    }

    public function delete_category(Request $req){
        $id = $this->enc->decrypt($req->category_id);
        Category::find($id)->delete();
        return redirect()->back()->with(['_msg'=>"Data berhasil dihapus.",'_e'=>'info']);
    }

    public function category_list(){
        $data = Category::all();
        return View('content.data_barang.index_category', compact('data'));
    }

    public function update_item_description(Request $req){
        $this->validate($req, [
            "deskripsi" => "required"
        ]);           

        $id = $this->enc->decrypt($req->id);
        $data = Item::find($id)->update([
            'description' => $req->deskripsi
        ]);

        return redirect()->back()->with(['_msg'=>"Deskripsi berhasil diupdate.",'_e'=>'update']);
    }

    public function add_item(Request $req){
        $this->validate($req, [
            "jumlah" => "required|numeric|min:0"
        ]);        

        $category_id = $this->enc->decrypt($req->category_id);
        $category = Category::find($category_id);

        $items = Item::where('category_id', $category_id)->get();
        $last_id = $items->count() == 0 ? 's-0' : $items->last()->id;
        $c = explode('-', $last_id);
        
        $last_id = (int)$c[1];
        $n = $req->jumlah;
        
        for($i = 0; $i<$n; $i++){
            $id = $category->code."-".str_pad(++$last_id, 4, '0', STR_PAD_LEFT);
            Item::create([
                'id' => $id, 'description' => '-', 'position' => '1', 'category_id' => $category_id
            ]);
        }

        return redirect()->back()->with(['_msg'=>"Berhasil menambahkan barang.",'_e'=>'success']);
    }

    public function item_list($category_id){
        $id = $this->enc->decrypt($category_id);
        $data = Category::find($id);
        $units = Unit::all();
        return View('content.data_barang.index_item', compact('data', 'units'));
    }

    public function delete_item(Request $req){
        $id = $this->enc->decrypt($req->item_id);
        Item::find($id)->delete();
        return redirect()->back()->with(['_msg'=>"Data berhasil dihapus.",'_e'=>'info']);        
    }
}
