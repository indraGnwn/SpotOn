<?php 

namespace App\Http\Controllers;

use App\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        if ($data_produk) {
            return response()->json([
                'success' => true,
                'massage' => 'Successfull',
                'data' => $data_produk
            ],201);
        } else {
            return response()->json([
                'success' => false,
                'massage' => 'Failed',
                'data' => $data_produk
            ],400);
        }
    }

    //create produk dengan user id auth
    public function store(Request $req)
    {
        $data = Produk::create([
                'id_user' => Auth::user()->id,
                'nama_produk' => $req->nama_produk,
                'id_kategori' => $req->id_kategori,
                'lokasi' => $req->lokasi,
                'harga' => $req->harga,
                'deskripsi' => $req->deskripsi,
                'foto' => $req->foto
            ]);

        return response()->json([
            'success' => true,
            'message' => 'Successfull create new product',
            'data' => $data
        ],201);
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
            return response()->json([
            'success' => true,
            'message' => 'Successfull',
            'data' => $data
        ],201);
        } else {
            return response()->json([
            'success' => false,
            'message' => 'Failed',
            'data' => $data
         ],201);
        }
       

    }

}

 ?>