@php
$berat = 0;
$ttl = 0;
$sub_total = 0;
foreach ($cart as $c):
    $berat += $c->options->gr * $c->qty;
    $ttl += $c->qty;
    $sub_total += $c->qty * $c->price;
endforeach;
if($berat == 0) {
    $ship = 0;
} else if(Session::get('login') != 1){
    $ship = 0;
}else {
    $cost = RajaOngkir::ongkosKirim([
                'origin' => 36,
                'destination' => Auth::user()->kota,
                'weight' => $berat,
                'courier' => 'jne',
            ])->get();
$ship = $cost[0]['costs'][1]['cost'][0]['value'];
}

@endphp
<style>
    .huruf {
        font-family: Poppins-Medium;
    }
    .remov {
        color:#89725C;
    }
    .remov:hover {
        color:#45413e;
        text-decoration:underline;
    }
</style>
<div class="row">
    <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
        <div class="m-l-25 m-r--38 m-lr-0-xl">
            <div class="wrap-table-shopping-cart" style="background-color: #F1E4D8">

                <table class="table-shopping-cart">
                    <tr class="table_head">
                        <th class="column-1 huruf" style="font-family: Poppins-Medium;">Product</th>
                        <th class="column-2 huruf" style="font-family: Poppins-Medium;"></th>
                        <th class="column-3 huruf" style="font-family: Poppins-Medium;">Price</th>
                        <th class="column-4 huruf" style="font-family: Poppins-Medium;">Quantity</th>
                        <th class="column-5 huruf" style="font-family: Poppins-Medium;">Total</th>
                    </tr>
                    @foreach ($cart as $c)

                    <tr class="table_row">
                        <td class="column-1">
                            <div class="how-itemcart1">
                                
                                <img src="http://127.0.0.1:1111/assets/uploads/{{ $c->options->img }}" alt="IMG">
                            </div>
                        </td>
                        <td class="column-2 huruf" style="font-family: Poppins-Medium;">{{ $c->name }}</td>
                        <td class="column-3 huruf" style="font-family: Poppins-Medium;">{{ number_format($c->price) }}</td>
                        <td class="column-4">
                            <div class="wrap-num-product flex-w m-l-auto m-r-0">
                                <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m min_cart" id="{{ $c->rowId }}" qty="{{ $c->qty }}">
                                    <a href="#" class="min_cart" ><i class="fs-16 zmdi zmdi-minus"></i></a>
                                </div>
                
                                <input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product1" value="{{ $c->qty }}">
                
                                <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m plus_cart" id="{{ $c->rowId }}" qty="{{ $c->qty }}">
                                    <a href="#" class="plus_cart" ></a><i class="fs-16 zmdi zmdi-plus"></i>
                                </div>
                         
                            </div>
                            <a href="{{ route('remove', ['rowid' => $c->rowId]) }}" class="txt-center rem huruf" style="font-family: Poppins-Medium;" style="font-family: DIN Neuzeit Grotesk, sans-serif;"><span class="remov">remove</span></a>
                        </td>
                        <td class="column-5" style="font-family: Poppins-Medium;">{{number_format($c->price * $c->qty)}}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="5"><hr style="border: 1px solid #89725C">  </td>
                    </tr>
                    <tr class="table_head">
                        <td colspan="3" class="">
                            <div class="how-itemcart1">
                                
                            </div>
                        </td>
                        
                        <th class="column-4 huruf" style="font-family: Poppins-Medium;">Shipping : </th>
                        <td class="column-5" style="font-family: Poppins-Medium;"><span class="mtext-110 cl2" style="font-family: Poppins-Medium;">{{ number_format($ship, 0) }}</span></td>
                        
                    </tr>
                    <tr>
                        <td colspan="5"><hr style="border: 0px solid #F1E4D8">  </td>
                    </tr>
                    <tr class="table_head">
                        <td class="column-1">
                            <div class="how-itemcart1">
                                
                            </div>
                        </td>
                        <td class="column-2 huruf" style="font-family: Poppins-Medium;"></td>
                        <td class="column-3 huruf" style="font-family: Poppins-Medium;"></td>
                        <th class="column-4 huruf" style="font-family: Poppins-Medium;">Total : </th>
                        <td class="column-5" style="font-family: Poppins-Medium;"><span class="mtext-110 cl2" style="font-family: Poppins-Medium;">{{ number_format($sub_total + $ship, 0) }}</span></td>
                    </tr>
                    <tr>
                        <td colspan="5"><hr style="border: 0px solid #F1E4D8">  </td>
                    </tr>
                    <tr>
                        <td colspan="5">
                            @if ($berat == 0)
                            <a style="background-color: #7f7d7b" href="{{ route('home') }}" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                                Continue To Order
                            </a>
                            @else
                            
                            <a style="background-color: #89725C" href="{{ route(Session::get('login') != 1 ? 'login' : 'checkout') }}" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                                Proceed to Checkout
                            </a>
                            @endif
                        </td>
                    </tr>
                </table>
        
            </div>

            {{-- <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
                <div class="flex-w flex-m m-r-20 m-tb-5">
                    <input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text" name="coupon" placeholder="Coupon Code">
                        
                    <div class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
                        Apply coupon
                    </div>
                </div>

                <div class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
                    Update Cart
                </div>
            </div> --}}
        </div>
    </div>

    {{-- <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50" >
        <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm" style="background-color: #F1E4D8;">
            <h4 class="mtext-109 cl2" style="font-family: Poppins-Medium;">
                Order Summary 
            </h4>
            <hr style="border: 1px solid #89725C">    

            <div class="flex-w flex-t p-t-27 p-b-33">
                <div class="size-208">
                    <span class="mtext-101 cl2" style="font-family: Poppins-Medium;">
                        Total:
                    </span>
                </div>

                <div class="size-209 p-t-1">
                    <span class="mtext-110 cl2" style="font-family: Poppins-Medium;">
                        {{ number_format($sub_total, 0) }}
                    </span>
                </div>
            </div>
                <a style="background-color: #89725C" href="{{ route(Session::get('login') != 1 ? 'login' : 'checkout') }}" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                    Proceed to Checkout
                </a>
        </div>
    </div> --}}
</div>