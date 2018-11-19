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

   //not yet
    public function update(Request $request, $id)
    {
        $data_produk = Produk::find($id);
        $data_produk->update($request->all());
 
        return response()->json([
            'message' => 'Successfull update product'
        ]);
    }

}

 ?>