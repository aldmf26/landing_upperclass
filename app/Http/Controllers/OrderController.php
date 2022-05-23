<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\Province;
use App\Models\Transaksi;
use Darryldecode\Cart\Cart as Cartd;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Darryldecode\Cart\Facades\CartFacade;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Kavist\RajaOngkir\Facades\RajaOngkir;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function cartList(Request $r)
    {
         
        $cartItem = 
        $data = [
            'cart' => Cart::content(),
        ];
        dd($data['cart']);
      
        return view('template.cart', $data);
    }

    public function addToCart(Request $r)
    {
        $id_user = $r->id_user;
        $id = $r->id_produk;
        $price = $r->price;
        $nama = $r->name;
        $qty = $r->qty;
        $img = $r->img;
        $gr = $r->gr;
        
        Cart::add(['id' => $id, 'name' => $nama, 'price' => $price, 'qty' => $qty, 'options' => ['img' => $img, 'id_user' => $id_user, 'gr' => $gr]]);
        echo 'berhasil';
    }

    public function viewCart(Request $r)
    {
        $data = [
            'cart' => Cart::content(),
        ];
       
        return view('template.cart',$data);
    }

    public function remove(Request $r)
    {
        // Cart::destroy();
        $rowId = $r->rowid;
        // dd($rowId);
        $cart = Cart::content()->where('rowId',$rowId);
        if($cart->isNotEmpty()){
            Cart::remove($rowId);
        }
        return redirect()->route('shopingCart');
    }
    
    public function plus_cart(Request $r)
    {
        $rowId = $r->rowid;
        $qty = $r->qty + 1;
        Cart::update($rowId, ['qty' => $qty]);
    }
    public function min_cart(Request $r)
    {
        $rowId = $r->rowid;
        $qty = $r->qty - 1;
        Cart::update($rowId, ['qty' => $qty]);
    }

    public function shopingCart(Request $r)
    {
        $data = [
            'title' => 'Shoping Cart',
            'cart' => Cart::content(),
        ];
        return view('cart.shopingCart',$data);
    }

    public function aksiCart(Request $r)
    {
        Cart::destroy();
        return redirect()->route('checkout');
    }

    public function checkout(Request $r)
    {
        $berat = 0;
        $kat = Cart::content();
        foreach($kat as $k) {
            $berat += $k->options->gr * $k->qty;
        }
      
        $data = [
            'title' => 'Shoping Cart',
            'cart' => $kat,     
            'provinsi' => Province::pluck('title', 'province_id'),
            'city' => City::pluck('title', 'city_id'),
            'cost' => RajaOngkir::ongkosKirim([
                'origin' => 36,
                'destination' => Auth::user()->kota,
                'weight' => $berat,
                'courier' => 'jne',
            ])->get(),    
        ];
        return view('cart.checkout',$data);
    }

    public function totalCheckout(Request $r)
    {
        $berat = 0;
        $kat = Cart::content();
        foreach($kat as $k) {
            $berat += $k->options->gr * $k->qty;
        }
        $data = [
            'cart' => $kat,   
            'cost' => RajaOngkir::ongkosKirim([
                'origin' => 36,
                'destination' => Auth::user()->kota,
                'weight' => $berat,
                'courier' => 'jne',
            ])->get(), 
        ];
        return view('cart.totalCheckout',$data);
    }

    public function checkout2(Request $r)
    {
        Cart::destroy();

        $data = [
            'title' => 'Shoping Cart',
            'transaksi' => Transaksi::join('user_upperclass', 'user_upperclass.id','=','tb_transaksi.id_user')->join('tb_order', 'tb_order.no_order','=','tb_transaksi.no_order')->where('tb_transaksi.no_order', $r->no_order)->groupBy('tb_order.no_order')->first(),
        ];
        return view('cart.checkout2',$data);
    }

    public function getKota(Request $r)
    {
        $city = City::where('province_id', $r->id_provinsi)->pluck('title', 'city_id');
        foreach ($city as $id_kota =>  $k) {
            echo "<option value='" . $id_kota . "'>" . $k . "</option>";
        }
    }

    public function getIconCart(Request $r)
    {
        $notify = Cart::count();
        echo $notify;
    }
    
    public function voucherPembayaran(Request $request)
    {
        $kode = $request->kode;
        $voucher = DB::table('tb_voucher')->where('kode', $kode)->first();
        
     
        if ($voucher) {
            // dd($voucher->expired);
            if ($voucher->expired <= date('Y-m-d')) {
                echo "expired";
            } else if($voucher->status == '1') {
                echo "$voucher->jumlah";
            }
            
        } else {
            echo 'kosong';
        }
    }

    public function aksiCheckout(Request $r)
    {
        date_default_timezone_set('Asia/Makassar');
        // transaksi
        $id_user = $r->id_user;
        $email = $r->email;
        $nohp = $r->nohp;
        $alamat = $r->alamat;
        $provinsi = $r->provinsi;
        $kota = $r->kota;
        $kodepos = $r->kodepos;
        $subTotal = $r->subTotal;
        $shipping = $r->shipping;
        $tot = $r->tot;
        $uniqCode = mt_rand(100, 999);
        $voucher = $r->voucher;

        $berat = 0;
        $kat = Cart::content();
        foreach($kat as $k) {
            $berat += $k->options->gr * $k->qty;
        }
        // $shipping = RajaOngkir::ongkosKirim([
        //     'origin' => 36,
        //     'destination' => $kota,
        //     'weight' => $berat,
        //     'courier' => 'jne',
        // ])->get(); 
        // $shipping = $shipping[0]['costs'][1]['cost'][0]['value'];         
        // dd($shipping);

        $tgl = date('Y-m-d H:i:s');
        
        $q = DB::select(
            DB::raw("SELECT MAX(RIGHT(a.no_order,4)) AS kd_max FROM tb_order AS a
        WHERE DATE(a.tgl)=CURDATE()"),
        );
        // dd($q);
        $kd = '';
        if (count($q) > 0) {
            foreach ($q as $k) {
                $tmp = ((int) $k->kd_max) + 1;
                $kd = sprintf('%04s', $tmp);
            }
        } else {
            $kd = '0001';
        }
        $no_invoice = date('ymd') . $kd;
        $no_order = mt_rand(100000, 999999);
        $hasil = "up-$no_invoice-$no_order";
        // dd($hasil);
        foreach(Cart::content() as $c) {
            $data1 = [
                'no_order' => $hasil,
                'id_harga' => $c->id,
                'qty' => $c->qty,
                'harga' => $c->price,
                'total' => $c->price * $c->qty,
                'tgl' => $tgl,
            ];
    
            Order::create($data1);
        }
        
        // dd($hasil);
        $data2 = [
            'no_order' => $hasil,
            'id_user' => $id_user,
            'email' => $email,
            'nohp' => $nohp,
            'alamat' => $alamat,
            'kota' => $kota,
            'provinsi' => $provinsi,
            'kodepos' => $kodepos,
            'sub_total' => $subTotal,
            'shipping' => $shipping,
            'total' => $tot,
            'tgl' => $tgl,
            'uniqcode' => $uniqCode,
            'id_user' => $id_user,
            'voucher' => $voucher,
        ];

        Transaksi::create($data2);
        
        $teks = "*UPPERCLASS ORDERS : $tgl*\nNO ORDER = ".Str::substr($hasil,14)."\nEMAIL = $email\nTOTAL ORDERAN = Rp ".number_format($tot+$uniqCode,0);
        $wa = [
                'api_key' => 'vQglzYScHyLvjrYZCtTl',
                'sender'  => '62895413111053',
                'number'  => '62895704893952',
                'message' => $teks,
            ];
        $response = Http::withHeaders([
            'Content-Type' => 'application/x-www-form-urlencoded',
        ])->withBody(http_build_query($wa), 'application/json')->post('https://waapi.putrirembulan.com/send-message')->collect()->toArray();
        

        return redirect()->route('checkout2', ['no_order' => $hasil]);
    }
    
    public function infoCart(Request $r)
    {
        
        $data = [
            'title' => 'Shoping Cart',
            'cart' => Cart::content(),
        ];
        // dd(Cart::get('id','febcb9e23142dd4095adac570985e84a'));
        // // Cart::destroy();
        return view('cart.infoCart',$data)->render();
    }

    public function pembayaran(Request $r)
    {
        $berat = 0;
        $kat = Cart::content();
        foreach($kat as $k) {
            $berat += $k->options->gr * $k->qty;
        }
      
        $data = [
            'title' => 'Shoping Cart',
            'cart' => $kat,     
            'provinsi' => Province::pluck('title', 'province_id'),
            'city' => City::pluck('title', 'city_id'),
            'cost' => RajaOngkir::ongkosKirim([
                'origin' => 36,
                'destination' => Auth::user()->kota,
                'weight' => $berat,
                'courier' => 'jne',
            ])->get(),    
        ];
        return view('cart.pembayaran',$data);
    }
}
