@extends('template.master')
@section('content')
  <div class="topdesktop"></div><br>
    <!-- breadcrumb -->
    {{-- <div class="container">
        <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
            <a href="{{ route('home') }}" class="stext-109 cl8 hov-cl1 trans-04">
                Home
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            

            <span class="stext-109 cl4">
                {{ ucwords(Str::lower($produk->nm_produk)) }}
            </span>
        </div>
    </div> --}}
    <section class="sec-product-detail bg0 p-t-65 p-b-60" style="background-color: #ECE8E1">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-7 p-b-30">
                    <div class="p-l-25 p-r-30 p-lr-0-lg">
                        <div class="wrap-slick3 flex-sb flex-w">
                            <div class="wrap-slick3-dots"></div>
                            <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

                            <div class="slick3 gallery-lb">
                                

                                <div class="item-slick3"
                                    data-thumb="http://127.0.0.1:1111/assets/uploads/{{ $produk->foto }}">
                                    <div class="wrap-pic-w pos-relative">
                                        <img src="http://127.0.0.1:1111/assets/uploads/{{ $produk->foto }}"
                                            alt="IMG-PRODUCT">

                                        <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                            href="http://127.0.0.1:1111/assets/uploads/{{ $produk->foto }}">
                                            <i class="fa fa-expand"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                  
                <div class="col-md-6 col-lg-5 p-b-30">
                    <div class="p-r-50 p-t-5 p-lr-0-lg">
                        <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                            {{ $produk->nm_produk }}
                        </h4>
                        <span class="mtext-106 cl2">
                            Rp {{ number_format($produk->harga, 0) }}
                        </span><br>
                        <span class="mtext-102">{{ $produk->gr }}g</span>

                        <p class="stext-102 cl3 p-t-23">
                            {!! $produk->deskripsi !!}
                        </p>

                        <!--  -->
                        <div class="p-t-33">


                            <div class="flex-w p-b-10">
                                <div class="size-200 flex-w flex-m respon6-next">
                                    @php
                                        $harga = DB::table('tb_harga')
                                            ->select('tb_harga.*', 'tb_distribusi.*')
                                            ->join('tb_distribusi', 'tb_harga.id_distribusi', '=', 'tb_distribusi.id_distribusi')
                                            ->where('id_produk', $produk->id_produk)
                                            ->get();
                                    @endphp
                                    <div id="totalCart"></div>
                                    <br>
                                    <div class="mr-5 middle">
                                    <p>
                                        
                                        <a href="#" id="qtyTotal" qty="1" gr="{{ $produk->gr }}" img="{{ $produk->foto }}" price="{{ $produk->harga }}" name="{{$produk->nm_produk}}" id_produk="{{$produk->id_harga}}" id_user="{{ @Auth::user()->id == '' ? '' : Auth::user()->id }}" class="mr-2 btn_to_cart btn btn-primary">
                                            Add To Cart
                                        </a>
                                        <span style="font-size:20px; font-weight:bold; margin-top: 10px;">via :</span>     
                                        @foreach ($harga as $h)
                                            @php
                                                if (Str::lower($h->nm_distribusi) == 'shopee') {
                                                    $icon = 'https://img.icons8.com/color/48/000000/shopee.png';
                                                    $w = 48;
                                                } elseif (Str::lower($h->nm_distribusi) == 'tokopedia') {
                                                    $icon = 'https://www.freepnglogos.com/uploads/logo-tokopedia-png/logo-tokopedia-15.png';
                                                    $w = 46;
                                                }
                                            @endphp
    
                                            <a href="{{ $h->link }}" target="blank" class="mr-2">
                                                <img src="{{ $icon }}" width="{{ $w }}" />
                                            </a>
                                            @endforeach
                                      </p>
                                    </div>
                                          <div class="collapse multi-collapse" id="multiCollapseExample1">
                                            <span style="font-size:20px; font-weight:bold;">via :</span>    
                                            <a href="#" id="qtyTotal" qty="1" gr="{{ $produk->gr }}" img="{{ $produk->foto }}" price="{{ $produk->harga }}" name="{{$produk->nm_produk}}" id_produk="{{$produk->id_harga}}" id_user="{{ @Auth::user()->id == '' ? '' : Auth::user()->id }}" class="mr-2 btn_to_cart">
                                                <img src="{{ asset('assets') }}/images/icons/cart2.png" width="48" />
                                            </a>
                                            
                                         </div>
                                    

                                </div>
                                
                            </div>
                        </div>

                        <!--  -->

                    </div>
                </div>
            </div>

            <div class="bor10 m-t-50 p-t-43 p-b-40">
                <!-- Tab01 -->
                <div class="tab01">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item p-b-10">
                            <a class="nav-link active" data-toggle="tab" style="font-family: Poppins-Medium" href="#description" role="tab">Product Video</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content p-t-43">
                        <!-- - -->
                        <div class="tab-pane fade show active" id="description" role="tabpanel">
                            <div class="how-pos2 p-lr-15-md">
                                <div class="row justify-content-center">
                                    @php
                                            $video = DB::table('tb_video')->join('tb_produk', 'tb_produk.id_produk', '=', 'tb_video.id_produk')->where('tb_video.id_produk', $produk->id_produk)->get();
                                        @endphp
                                        @foreach ($video as $v)
                                        <div class="col-lg-6 col-11 mb-2">           
                                            <div class="embed-responsive embed-responsive-16by9">
                                                <iframe width="420" height="315" allowfullscreen class="embed-responsive-item"
                                                    src="https://www.youtube.com/embed/{{Str::substr($v->link_video, 32, 20)}}">
                                                </iframe>
                                            </div>
                                            </div>
                                        @endforeach
                                    
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Related Products -->
	<section class="sec-relate-product bg0 p-t-45 p-b-105" style="background-color: #ECE8E1">
		<div class="container">
			<div class="p-b-45">
				<h3 class="ltext-106 cl5 txt-center">
					Related Products
				</h3>
			</div>

			<!-- Slide2 -->
			<div class="wrap-slick2">
				<div class="slick2">
                        @php
                            $pr = DB::table('tb_produk')
                                    ->join('tb_kategori', 'tb_produk.id_kategori', '=', 'tb_kategori.id_kategori')
                                    ->join('tb_satuan', 'tb_produk.id_satuan', '=', 'tb_satuan.id_satuan')
                                    ->join('tb_harga', 'tb_produk.id_produk', '=', 'tb_harga.id_produk')
                                    ->where('tb_kategori.id_kategori', $produk->id_kategori)
                                    ->groupBy('tb_harga.id_produk')
                                    ->get();
                                   
                        @endphp
                    @foreach ($pr as $p)                     
					<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
						<!-- Block2 -->
						<div class="block2">
							<div class="block2-pic hov-img0">
                                <a href="{{ route('detail', ['id_produk' => $p->id_produk]) }}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                    <img src="http://127.0.0.1:1111/assets/uploads/{{ $p->foto }}" alt="IMG-PRODUCT">
                                </a>
							</div>

							<div class="block2-txt flex-w flex-t p-t-14">
								<div class="block2-txt-child1 flex-col-l ">
									<a href="{{ route('detail', ['id_produk' => $p->id_produk]) }}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
										{{ ucwords(Str::lower($p->nm_produk)) }}
									</a>

									<span class="stext-105 cl3">
										{{ number_format($p->harga, 0) }}
									</span>
								</div>
							</div>
						</div>
					</div>
                    @endforeach					
				</div>
			</div>
		</div>
	</section>
@endsection
@section('script')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function () {
            $(document).on('click', '.btn_to_cart', function(){
                var id_user = $(this).attr('id_user')
                var id_produk = $(this).attr('id_produk')
                var price = $(this).attr('price')
                var name = $(this).attr('name')
                var qty = $(this).attr('qty')
                var img = $(this).attr('img')
                var gr = $(this).attr('gr')
         
                $.ajax({
                    url : "{{ route('addToCart') }}",
                    method : 'GET',
                    data : {
                        id_user : id_user,
                        id_produk : id_produk,
                        price : price,
                        name : name,
                        qty : qty,
                        img : img,
                        gr : gr,
                    },
                    success:function(data) {
                        if(data == 'berhasil') {
                            Swal.fire({
                            position: 'inherit',
                            icon: 'success',
                            title: 'Berhasil Tambah Cart',
                            showConfirmButton: false,
                            timer: 1500
                            })
                        }
                    }
                })
            })
            function loadTotalCart(){
				$("#totalCart").load("{{ route('totalCart') }}", "data", function (response, status, request) {
					this; // dom element
					
				});
			}
			loadTotalCart()
            function iQty(){
                var iqty = $('#iQty').val()
                $('#qtyTotal').attr('qty', iqty)
            }
            $(document).on('click', '.tambahCart', function(event) {
                var qty = $(this).attr("qty");
                var totQty = $('.num-product').val()
                // alert(qty);
                $.ajax({
                    url: "{{ route('tambahCart') }}",
                    method: "GET",
                    data: {
                        qty: qty,
                        totQty: totQty,
                    },
                    success: function(data) {
                        // console.log(data)
                        $('.num-product').val(data)
                        $('.tambahCart').attr("qty", data)     
                        iQty()
                    }
                });
            });
			$(document).on('click', '.kurangCart', function(event) {
                var qty = $(this).attr("qty");
                var totQty = $('.num-product').val()

                // alert(qty);
                $.ajax({
                    url: "{{ route('kurangCart') }}",
                    method: "GET",
                    data: {
                        qty: qty,
                        totQty: totQty,
                    },
                    success: function(data) {
                        $('.num-product').val(data)
                        $('.kurangCart').attr("qty", data)       
                        iQty()
                    }
                });
            });

        });
    </script>
@endsection
