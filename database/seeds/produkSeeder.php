<?php

use Illuminate\Database\Seeder;

class produkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategoris = [
            ['nama_kategori' => 'Aula'],
            ['nama_kategori' => 'Ballroom']
        ];
        $produks = [
            ['nama_produk' => 'pakaian wanita', 'id_kategori' => '1', 'lokasi'=>'jakarta', 'harga'=>'50000'],
            ['nama_produk' => 'pakaian wanita', 'id_kategori' => '2', 'lokasi'=>'jakarta', 'harga'=>'70000']
        ];

        DB::table('kategoris')->insert($kategoris);
        DB::table('produks')->insert($produks);
    }
}
