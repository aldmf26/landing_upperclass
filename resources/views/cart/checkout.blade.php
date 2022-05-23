@php
$ttl = 0;
$sub_total = 0;
foreach ($cart as $c):
    $ttl += $c->qty;
    $sub_total += $c->qty * $c->price;
endforeach;
@endphp
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
    

    <title>{{ $title }}</title>
    <style>
      @font-face {
          font-family: Poppins-Medium;
          src: url("{{asset('assets')}}/fonts/Poppins/Poppins-Medium.ttf");
      }
      * {
        font-family: 'Poppins-Medium', sans-serif;
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
    </style>
  </head>
  <body>

    <div class="container mt-5">
      <form action="{{ route('aksiCheckout') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-6">
               <div class="card">
                 <div class="card-body">
                   <h6>Basic Details</h6>
                   <hr>
                   <div class="row checkout-form">
                     <div class="col-md-6">
                       <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
                       <label for="">First Name</label>
                       <input type="text" class="form-control" value="{{ Auth::user()->first }}" placeholder="Enter First Name">
                     </div>
                     <div class="col-md-6">
                       <label for="">Last Name</label>
                       <input type="text" class="form-control" value="{{ Auth::user()->last }}" placeholder="Enter Last Name">
                     </div>
                     <div class="col-md-6 mt-3">
                       <label for="">Email</label>
                       <input required type="email" name="email" class="form-control" value="{{ Auth::user()->email }}" placeholder="Enter Email">
                     </div>
                     <div class="col-md-6 mt-3">
                       <label for="">Phone Number</label>
                       <input required type="text" name="nohp" class="form-control" value="{{ Auth::user()->nohp }}" placeholder="Enter Phone Number">
                     </div>
                     <div class="col-md-6 mt-3">
                       <label for="">Alamat</label>
                       <input required type="text" name="alamat" class="form-control" value="{{ Auth::user()->alamat }}" placeholder="Enter Address">
                     </div>

                     <div class="col-md-6 mt-3">
                       <label for="">Provinsi</label>
                       <select class="form-control" disabled="disabled" name="provinsi" id="provinsi_id">                                 
                        @foreach ($provinsi as $province => $p)
                            <option {{$province == Auth::user()->provinsi ? 'selected' : ''}} value="{{ $province }}">{{ $p }}</option>
                        @endforeach
                        </select>
                       {{-- <input required type="text" class="form-control" value="{{ Auth::user()->provinsi }}" placeholder="Enter Provinsi"> --}}
                     </div>
                     
                     <div class="col-md-6 mt-3">
                       <label for="">Kota</label>
                       <select class="form-control" disabled="disabled" name="kota" id="kota">                                                   
                               
                         <option value="{{ Auth::user()->kota }}">{{ $city[Auth::user()->kota] }}</option>                
                        </select>
                       {{-- <input required type="text" class="form-control" value="{{ Auth::user()->kota }}" placeholder="Enter Kota"> --}}
                     </div>
                     <div class="col-md-6 mt-3">
                       <label for="">Kode Pos</label>
                       <input required type="text" class="form-control" name="kodepos" value="{{ Auth::user()->kodepos }}" placeholder="Enter Kode Pos">
                     </div>
                   </div>
                 </div>
                </div>
                <button class="btn btn-primary btn-block mt-3 buton">Place Order</button>            
                <a onclick="history.back()" class="btn btn-primary btn-block mt-3 buton" style="background-color:transparent; color:#A35A5E;">Return to cart</a>            
                
            </div>
            <div class="col-md-6" >
              <div class="card" style="background-color: #F1E4D8">
                <div class="card-body">
                  <h6>Order Details</h6>
                  <hr>
                  <table class="table" > 
                    {{-- <thead>
                      <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Harga</th>
                      </tr>
                    </thead> --}}
                    <tbody>
                      @foreach ($cart as $c)
                        <tr>
                          <input type="hidden" name="id_harga" value="{{$c->id}}">
                          <input type="hidden" name="qty" value="{{$c->qty}}">
                          <input type="hidden" name="harga" value="{{$c->price}}">
                          <td width="30%">
                            <div class="item">
                              <span class="notify-badge">{{ $c->qty }}</span>
                              <img width="100%" style="marginr" src="http://127.0.0.1:1111/assets/uploads/{{ $c->options->img }}" alt="IMG">
                            </div>
                          </td>
                          <td class="tengah">{{$c->name}} <br><span style="color:#745750;">{{$c->options->gr}} g</span> </td>
                          <td class="tengah">Rp {{number_format($c->price * $c->qty)}}</td>
                        </tr>
                        
                      @endforeach
                    </tbody>
                  </table>
                  <hr>
                  <div id="totCart"></div>         
                  
                </div>
                
              </div>
            </div>
        </div>
      </form>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->

  </body>
</html>
<script>
  $(document).ready(function () {
    
      function load_total() {
        $("#totCart").load("{{route('pembayaran')}}", "data", function (response, status, request) {
          this; // dom element
          hide_default()

          $(document).on('click', '#cekVoucher', function(){
            var voucher = $("#voucher").val()
            if(voucher == '') {
              alert('kosong')
            } else {
              $.ajax({
                url:"{{route('voucherPembayaran')}}?kode="+voucher,
                type : "GET",
                success: function(data) {
                  if(data == 'kosong') {
                    $('#v').addClass('detailV');
                    hide_default()
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        icon: 'error',
                        title: 'Kode voucher tidak ditemukan'
                    });
                  } else {
                    if(data == 'expired') {
                      $('#v').addClass('detailV');
                      hide_default()
                        Swal.fire({
                          toast: true,
                          position: 'top-end',
                          showConfirmButton: false,
                          timer: 3000,
                          icon: 'error',
                          title: 'Kode voucher sudah expired'
                      });
                    } else {
                      $('#v').show();
                      $('.row').removeClass('detailV');

                      var jml = parseFloat(data)
                      var ship = $("#ship").val()
                      var subTotal = $("#subTotal").val()
  
                      var total = parseFloat(subTotal) - jml
                      
                      $("#jmlVoucher").val(jml)
                      $(".jumlahVoucher").text(`Rp. ${jml.toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")}`)
                      if(total < 0) {
                        total = 0
                      } else {
                        total = total + parseFloat(ship)
                      }
                  
                      $("#total").val(total < 0 ? 0 : total)
                      $(".totalOrderan").text(`Rp. ${total.toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")}`)
                    }
                  }
                }
              })
            }
          })
          var ship = $("#ship").val()
          var subTotal = $("#subTotal").val()
  
          var total = parseFloat(subTotal) + parseFloat(ship)
                      
          
          if(total < 0) {
            total = 0
          } else {
            total = total 
          }
                  
          $("#total").val(total < 0 ? 0 : total)
          $(".totalOrderan").text(`Rp. ${total.toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")}`)
        });
      }
      load_total()
      
      function hide_default(){
        $(".detailV").hide()
      }
      
      $(document).on('change', '#provinsi_id', function(){
          let provinsiId = $(this).val()
          
          $.ajax({
                  url : "{{route('getKota')}}?id_provinsi="+provinsiId,
                  type : 'GET',                      
                  success: function(data) {                 
                      $('#kota').html(data);
                  }
              })
      })

      

  });
</script>