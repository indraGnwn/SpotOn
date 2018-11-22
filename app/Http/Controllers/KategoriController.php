<?php 

namespace App\Http\Controllers;

use App\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller 
{
	

	public function index()
	{
		$data_kategori = Kategori::all();
		return response()->json($data_kategori);
	}

	 public function show($id)
    {
        $data_kategori = Kategori::find($id);
        return response()->json($data_kategori);
    }

	public function store(Request $request)
    {
        Kategori::create($request->all());
        return response()->json([
           'message' => 'Successfull create new category'
        ]);
    }

     public function delete($id)
    {
        Kategori::destroy($id);
 
        return response()->json([
            'message' => 'Successfull delete category'
        ]);
    }

    public function update(Request $req, $id) 
    {
        $data = Kategori::find($id);
        $data->nama_kategori = $req->input("nama_kategori");
        if ($data->save()) {
            $res['success'] = true;
            $res['result'] = 'Successfull update Kategori';
            return response($res);
        } else {
            $res['success'] = false;
            $res['result'] = 'Nama Kategori harus diisi';
            return response($res);
        }
       
    }

}

 ?>