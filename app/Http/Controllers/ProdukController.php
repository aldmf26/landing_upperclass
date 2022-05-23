<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Gloudemans\Shoppingcart\Facades\Cart;



class ProdukController extends Controller
{
    // 

    
    public function index(Request $r)
    {
       
        if ($r->search == null) {       
            $produk = DB::table('tb_produk')
            ->join('tb_kategori', 'tb_produk.id_kategori', '=', 'tb_kategori.id_kategori')
            ->join('tb_satuan', 'tb_produk.id_satuan', '=', 'tb_satuan.id_satuan')
            ->join('tb_harga', 'tb_produk.id_produk', '=', 'tb_harga.id_produk')
            ->where('tb_produk.id_lokasi', $r->id_lokasi)
            ->where('tb_produk.id_kategori', $r->kategori)
            ->groupBy('tb_harga.id_produk')
            ->get();
        } else {
            $produk = DB::table('tb_produk')->join('tb_kategori', 'tb_produk.id_kategori', '=', 'tb_kategori.id_kategori')->join('tb_satuan', 'tb_produk.id_satuan', '=', 'tb_satuan.id_satuan')->join('tb_harga', 'tb_produk.id_produk', '=', 'tb_harga.id_produk')->where('tb_produk.nm_produk', 'LIKE', '%' . $r->search . '%')->where('tb_produk.id_lokasi', $r->id_lokasi)->groupBy('tb_harga.id_produk')->get();
        }
        // dd($produk);
        $data = [
            'title' => 'Produk',
            'kategori' => DB::table('tb_kategori')->where('id_lokasi', $r->id_lokasi)->get(),
            'produk' => $produk,
            'lokasi' => DB::table('tb_lokasi')->get(),
            'cart' => Cart::content(),
        ];
        return view('produk.produk', $data);
    }

    public function detail(Request $r)
    {
        $data = [
            'title' => 'Detail Produk',
            'produk' => DB::table('tb_produk')->join('tb_kategori', 'tb_produk.id_kategori', '=', 'tb_kategori.id_kategori')->join('tb_satuan', 'tb_produk.id_satuan', '=', 'tb_satuan.id_satuan')->join('tb_harga', 'tb_produk.id_produk', '=', 'tb_harga.id_produk')->where('tb_harga.id_produk', $r->id_produk)->groupBy('tb_harga.id_produk')->first(),
            'cart' => Cart::content(),
        ];
        return view('produk.detail', $data);
    }

    public function totalCart(Request $r)
    {
        return view('produk.totalCart');
    }

    public function tambahCart(Request $r)
    {
        $qty = $r->totQty + 1;
        echo $qty;

    }
    public function kurangCart(Request $r)
    {
        $qty = $r->totQty - 1;
        if($qty < 0 )
        {
            $qty = 0;
        } else {
            $qty = $qty;
        }
        echo $qty;
    }

    public function tabelProduk(Request $r)
    {
        // dd($r->id_lokasi);
        $data = [
            'title' => 'produk',
            'produk' => DB::table('tb_produk')->join('tb_kategori', 'tb_produk.id_kategori', '=', 'tb_kategori.id_kategori')->join('tb_satuan', 'tb_produk.id_satuan', '=', 'tb_satuan.id_satuan')->join('tb_harga', 'tb_produk.id_produk', '=', 'tb_harga.id_produk')->where('tb_produk.id_lokasi', $r->id_lokasi == '' ? 1 : $r->id_lokasi)->groupBy('tb_harga.id_produk')->paginate(4),
        ];
        return view('produk.pr', $data);
    }
    public function aksiSearch(Request $r)
    {
        $page = 8;
        // dd($page);
        if ($r->search == null) {         
            if($r->kategori == null) {
                $produk = DB::table('tb_produk')->join('tb_kategori', 'tb_produk.id_kategori', '=', 'tb_kategori.id_kategori')->join('tb_satuan', 'tb_produk.id_satuan', '=', 'tb_satuan.id_satuan')->join('tb_harga', 'tb_produk.id_produk', '=', 'tb_harga.id_produk')->where('tb_produk.id_lokasi', $r->id_lokasi)->groupBy('tb_harga.id_produk')->paginate($page);
            } else {
                $produk = DB::table('tb_produk')->join('tb_kategori', 'tb_produk.id_kategori', '=', 'tb_kategori.id_kategori')->join('tb_satuan', 'tb_produk.id_satuan', '=', 'tb_satuan.id_satuan')->join('tb_harga', 'tb_produk.id_produk', '=', 'tb_harga.id_produk')->where('tb_produk.id_lokasi', $r->id_lokasi)->where('tb_produk.id_kategori', $r->kategori)->groupBy('tb_harga.id_produk')->paginate($page);
            }
            
        } else {
            $produk = DB::table('tb_produk')->join('tb_kategori', 'tb_produk.id_kategori', '=', 'tb_kategori.id_kategori')->join('tb_satuan', 'tb_produk.id_satuan', '=', 'tb_satuan.id_satuan')->join('tb_harga', 'tb_produk.id_produk', '=', 'tb_harga.id_produk')->where('tb_produk.nm_produk', 'LIKE', '%' . $r->search . '%')->where('tb_produk.id_lokasi', $r->id_lokasi)->groupBy('tb_harga.id_produk')->paginate($page);
        }
        $data = [
            'title' => 'Produk',
            'produk' => $produk,
            'lokasi' => DB::table('tb_lokasi')->get(),
            'kategori' => DB::table('tb_kategori')->where('id_lokasi', $r->id_lokasi)->get(),
        ];

        return view('produk.pr', ['id_lokasi' => $r->id_lokasi],$data);


    }

    public function bestSeller(Request $r)
    {
        $data = [
            'title' => 'Best Seller'
        ];
        return view('bestSeller.bestSeller',$data);
    }
}
