<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Kategori extends Model 
{
	 protected $fillable = [
        'nama_kategori' 
    ];

    public static $rules = [
    	'nama_kategori' => 'required',
    ];
   

    public function produk()
    {
        return $this->hasMany('App\Produk');
    }
}