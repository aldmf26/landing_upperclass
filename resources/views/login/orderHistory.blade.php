@extends('template.master')
@section('content')
<style>
    .forgot:hover {
        text-decoration: underline;
    }
    .daftar:hover {
        text-decoration: underline;
    }
    .inputan {
        height: 2.8rem;
    }
    .buton {
        height: 3.5rem;
        padding-right: 40px;
        padding-left: 40px;
        background-color: #89725C;
        border: #89725C;
    }
    .buton:hover {
        background-color: #cbaa8d;
        border: 1px solid #89725C;     
    }
    .butong:hover {
        background-color: #cbaa8d;
        border: 1px solid #89725C;
    }

    .hilangkan {
        margin-bottom: 6%;
        height: 10%;
    }
    .aorder:hover {
        text-decoration: underline;
        color: rgb(125, 187, 245);
    }
    .hovP:hover {
        text-decoration: underline;
    }

</style>

<div class="bg0 m-t-30 p-b-90 topproduk" style="background-color: #ECE8E1;">
    <div class="container ">
        <div class="row m-b-100">
            <div class="col-xl-4 m-t-30">
                @php
                    $produk = DB::table('tb_produk')->join('tb_harga', 'tb_harga.id_produk', '=', 'tb_produk.id_produk')->join('tb_order', 'tb_order.id_harga', '=','tb_harga.id_harga')->where('tb_order.no_order', request()->no_order)->get();
                    $order = DB::table('tb_transaksi')->where('no_order', request()->no_order)->first();
                    $no=1;
                    $tot=0;
                @endphp
                <h3 style="font-size:40px; color:#525050; font-family: Americana-Regular; margin-bottom:20px;">My Account</h3>
                <a href="{{ route('userPage') }}">&larr; Back to My Account</a>  
                <div class="card mt-3" style="background-color: #F4EAE1">
                    <div class="card-body">
                        <h5>Order Information</h5>
                        <h6 class="mt-3 mb-2">Order: <b>{{ Str::substr(request()->no_order,14) }}</b></h6>
                        <h6 class="mt-3 mb-2">Date: <b>{{ $order->tgl }}</b></h6>
                        <h6 class="mt-3">Payment Status: <b>{{ $order->status }}</b></h6>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <table class="table">
                    <thead style="background-color: #F4EAE1">
                        <tr>
                            <th>#</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th class="text-right">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produk as $p)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td><a class="hovP" style="color:#666666" target="_blank" href="{{ route('detail', ['id_produk' => $p->id_produk]) }}">{{ $p->nm_produk }}</a> <em>x{{$p->qty}}</em></td>
                            <td>{{ number_format($p->harga,0) }}</td>
                            <td class="text-right">{{ number_format($p->harga * $p->qty,0) }}</td>
                            @php
                                $total = ($p->harga * $p->qty);
                                $tot += $total;
                            @endphp
                        </tr> 
                        @endforeach 
                        <tfoot style="background-color: #F4EAE1">
                        <tr>
                            <th colspan="3">Shiping</th>
                            <th class="text-right">{{ number_format($order->shipping,0) }}</th>
                        </tr>          
                        <tr>
                            <th colspan="3">Total</th>
                            <th class="text-right">{{ number_format($tot + $order->shipping,0) }}</th>
                        </tr>  
                    </tfoot>                
                    </tbody>
                </table>    
            </div>
        </div>
    </div>
</div>
@endsection