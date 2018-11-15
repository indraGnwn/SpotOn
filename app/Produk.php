<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Produk extends Model 
{
	 protected $fillable = [
        'id_user', 'nama_produk', 'id_kategori', 'lokasi', 'harga', 'deskripsi', 'foto'
    ];

    public static $rules = [
    	'id_user' => 'required',
        'nama_produk' => 'required',
        'id_kategori' => 'required',
        'lokasi' => 'required',
        'harga' => 'required',
    ];
   

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function kategori()
    {
        return $this->belongsTo('App\Kategori');
    }
    //kategori sama produk one to many kan?
}