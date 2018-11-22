<?php 

namespace App\Http\Controllers;

use App\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller 
{
	

	public function index()
	{
		$data_produk = Produk::all();
		return response()->json($data_produk);
	}

	 public function show($id)
    {
        $data_produk = Produk::find($id);
        return response()->json($data_produk);
    }

	public function store(Request $request)
    {
        Produk::create($request->all());
        return response()->json([
           'message' => 'Successfull create new product'
        ]);
    }

     public function delete($id)
    {
        Produk::destroy($id);
 
        return response()->json([
            'message' => 'Successfull delete product'
        ]);
    }

   public function update(Request $req, $id) 
    {
        $data = Produk::find($id);
        $data->id_user = $req->input("id_user");
        $data->nama_produk = $req->input("nama_produk");
        $data->id_kategori = $req->input("id_kategori");
        $data->lokasi = $req->input("lokasi");
        $data->harga = $req->input("harga");
        $data->deskripsi = $req->input("deskripsi");
        $data->foto = $req->input("foto");
        if ($data->save()) {
            $res['success'] = true;
            $res['result'] = 'Successfull update Produk';
            return response($res);
        } else {
            $res['success'] = false;
            $res['result'] = 'Update Failed';
            return response($res);
        }
       
    }

}

 ?>