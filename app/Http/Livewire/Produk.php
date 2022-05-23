<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Produk extends Component
{
    public $count = 2;
    public function render(Request $r)
    {
        $pr = DB::table('tb_produk')->join('tb_kategori', 'tb_produk.id_kategori', '=', 'tb_kategori.id_kategori')->join('tb_satuan', 'tb_produk.id_satuan', '=', 'tb_satuan.id_satuan')->join('tb_harga', 'tb_produk.id_produk', '=', 'tb_harga.id_produk')->where('tb_produk.id_lokasi', $r->id_lokasi == '' ? 1 : $r->id_lokasi)->groupBy('tb_harga.id_produk')->take($this->count);
        $data = [
            'produk' => $pr->get(),
            'totalProduk' => DB::table('tb_produk')->join('tb_kategori', 'tb_produk.id_kategori', '=', 'tb_kategori.id_kategori')->join('tb_satuan', 'tb_produk.id_satuan', '=', 'tb_satuan.id_satuan')->join('tb_harga', 'tb_produk.id_produk', '=', 'tb_harga.id_produk')->where('tb_produk.id_lokasi', $r->id_lokasi == '' ? 1 : $r->id_lokasi)->groupBy('tb_harga.id_produk')->count(),
        ];
        return view('livewire.produk',$data);
    }
    
    public function loadmore()
    {
        dd('tes');
        $this->count += 2;
        // sleep(2);
    }
}
