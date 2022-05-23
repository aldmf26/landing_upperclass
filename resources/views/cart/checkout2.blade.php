
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Order Received</title>
    <style>
      * {
        font-family: 'Raleway', sans-serif;
      }
        .checkout-form label {
          font-size: 12px;
          font-weight: 700;
        }
        .checkout-form input {
          font-size: 14px;
          padding: 10px;
          font-weight: 400;
        }
        .tengah {
          vertical-align: middle;
        }
        .item {
            position:relative;
            padding-top:20px;
            display:inline-block;
        }
        .notify-badge{
            position: absolute;
            right:-8px;
            top:10px;
            background:#7F7D7C;
            text-align: center;
            padding: 20px;
            border-radius: 10px;
            color:white;
            padding:5px 10px;
            font-size:15px;
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
        .inputan {
            height: 2.8rem;
        }
        .underline:hover {
          text-decoration: none;
          color: #89725C;
        }
        .teks1 {
          color: #847977;
          font-size: 14px;
        }
        .teks2 {
          color: #000000;
          font-size: 14px;
        }
        .jne{
          color: #847977;
          font-size: 11px;
        }

    </style>
  </head>
  <body>

    <div class="container mt-5">
        <h2 class="text-center mb-5">ORDER COMPLETE</h2>
        @php
            $t = $transaksi->sub_total - $transaksi->voucher;
            if($t < 0){ $t = 0;} else {$t = $t;}
            $to = ($transaksi->shipping + $transaksi->uniqcode) + $t;
        @endphp

       
        <div class="row">
          <div class="col-lg-7 col-12">
            <div class="card">
              <div class="card-header">
                <h5>Our Bank Details</h5>
              </div>
              <div class="card-body">
                <ol>
                <h6>Linda Dinata : </h6>
              </ol>
                <ul>
                  <li>Bank : <span>BCA</span></li>
                  <li>Account Number : <span>8320066663</span></li>
                </ul>
                
                <ol>
                  <h3>Order Details</h3>
                  <table class="table">
                    <thead>
                      <tr style="color: #777777">
                        <th>PRODUCT</th>
                        <th class="float-end">TOTAL</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php
                          $order = DB::table('tb_order')
                          ->join('tb_transaksi', 'tb_transaksi.no_order','=','tb_order.no_order')
                          ->join('tb_harga', 'tb_harga.id_harga','=','tb_order.id_harga')
                          ->join('tb_produk', 'tb_produk.id_produk','=','tb_harga.id_produk')
                          ->where('tb_order.no_order',Request::get('no_order'))
                          ->get();
                      @endphp
                      @foreach ($order as $o)
                      <tr>
                        <td>{{ $o->nm_produk }}  <span class="teks1">x{{ $o->qty }}</span></td>
                        <td class="teks2"><span class="float-end">Rp.{{ number_format($o->harga * $o->qty,0) }}</span></td>
                      </tr>
                      @endforeach                  
                      <tr>
                        <td class="teks1">Subtotal:</td>
                        <td class="teks2"><span class="float-end">Rp.{{ number_format($transaksi->sub_total,0) }}</span></td>
                      </tr>
                      <tr>
                        <td class="teks1">Voucher:</td>
                        <td class="teks2"><span class="float-end">Rp.{{ number_format($transaksi->voucher,0) }}</span></td>
                      </tr>
                      <tr>
                        <td class="teks1">Shipping:</td>
                        <td><span class="float-end" style="white-space: nowrap">Rp.{{number_format($transaksi->shipping,0)}} <span class="jne"> via jne reguler</span></span></td>
                      </tr>
                      <tr>
                        <td class="teks1">Unique code:</td>
                        <td class="teks2"><span class="float-end">Rp.{{$transaksi->uniqcode}}</span></td>
                      </tr>
                      <tr>
                        <td class="teks1">Payment method:</td>
                        <td class="teks2"><span class="float-end jne" style="font-size: 14px">Direct Bank Transfer</span>
                        </td>
                      </tr>
                      <tr>
                        <td class="teks1">Total:</td>
                        
                        <td class="teks2"><span class="float-end">Rp.{{number_format($to,0)}}</span></td>
                      </tr>
                      <tr>
                        <td colspan="2">
                          <div class="alert alert-primary"  role="alert">
                            Setelah Anda melakukan pembayaran harap melakukan konfirmasi pembayaran melalui link dibawah ini <a href="{{ route('confirm') }}" onclick="return confirm('Apakah sudah discreenshoot ?')" class="alert-link underline">Konfirmasi Pembayaran</a>
                          </div>
                        </td>                   
                      </tr>
                    </tbody>
                  </table>
                </ol>
              </div>
            </div>
            
          </div>
          <div class="col-lg-5">         
            <div class="card">
              <div class="card-body" style="background-color: #FAFAFA">
                  {{-- <p>Thank you. Your order has been received.</p> --}}
                  <p>Plese Screenshot Your Order. Thank you</p>
                    @php
                        $nomor_kode = DB::table('tb_transaksi')->where('no_order', Request::get('no_order'))->first();
                    @endphp
                    <li class="teks1 form-control">Order Number : <span class=" text-lg" style="font-size: 16px"><b>{{ Str::substr($nomor_kode->no_order,14) }}</b></span></li>
                    <li class="teks1 form-control">Date : <span class=" text-lg" style="font-size: 16px"><b>{{date('d-m-Y', strtotime($nomor_kode->tgl))}}</span></li>
                    <li class="teks1 form-control">Total : <span class="text-dark text-lg" style="font-size: 16px">Rp.{{number_format($to,0)}}</span></li>
                    <li class="teks1 form-control">Payment method: <span class=" text-lg" style="font-size: 16px"><b>Direct Bank Transfer</b></span></li>
           

              </div>
            </div>
          </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>