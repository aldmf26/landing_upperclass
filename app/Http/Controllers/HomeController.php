<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Gloudemans\Shoppingcart\Facades\Cart;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Home',
            'kategori' => DB::table('tb_kategori')->get(),
            'banner' => DB::table('tb_banner')->get(),
            
            'cart' => Cart::content(),
        ];
        // Cart::destroy();
        return view('welcome',$data);
    }
}
