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
        $id_user = $request->input("id_user");
        $nama_produk = $request->input("nama_produk");
        $id_kategori = $request->input("id_kategori");
        $lokasi = $request->input("lokasi");
        $harga = $request->input("harga");
        $deskripsi = $request->input("deskripsi");
        $foto = $request->input("foto");
		$buat = Produk::create([
			'id_user' => $id_user,
			'nama_produk' => $nama_produk,
			'id_kategori' => $id_kategori,
			'lokasi' => $lokasi,
			'harga' => $harga,
			'deskripsi' => $deskripsi,
			'foto' => $foto
		]);
		if($buat){
			return response()->json([
			   'message' => 'Successfull create new product'
			]);	
		}else{
			return response()->json([
			   'message' => 'Failed create new product'
			]);
		}
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
            $res['message'] = 'Successfull update Produk';
            return response($res);
        } else {
            $res['success'] = false;
            $res['message'] = 'Update Failed';
            return response($res);
        }
       

    }

}

 ?>