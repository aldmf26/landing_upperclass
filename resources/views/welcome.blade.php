@extends('template.master')
@section('content')

    <!-- Slider -->
    <section class="section-slide"  style="background-color: #ECE8E1">
        
        <div class="row">
            <div class="col-12 col-lg-6 slider-m" >
                <div class="wrap-slick1">
                    <div class="slick1">         
                        @foreach ($banner as $b)
                            <div class="item-slick1"
                                style="background-image: url(http://127.0.0.1:1111/assets/uploads/{{ $b->nm_foto }});">
                                <div class="container h-full">
                                    <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
                                        <div class="layer-slick1 animated visible-false" data-appear="fadeInDown"
                                            data-delay="0">
                                            <span class="ltext-101 cl2 respon2">
                                                {{ $b->teks1 }}
                                            </span>
                                        </div>

                                        <div class="layer-slick1 animated visible-false" data-appear="fadeInUp"
                                            data-delay="800">
                                            <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
                                                {{ $b->teks2 }}
                                            </h2>
                                        </div>

                                        <div class="layer-slick1 animated visible-false" data-appear="zoomIn"
                                            data-delay="1600">
                                            <a href="product.html"
                                                class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                                                Shop Now 
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <!-- Banner -->
                <div class="sec-banner bg0 p-t-80 p-b-10 m-t-10" style="background-color: #F1E7D8">
                    <div class="container">
                        <div class="row">
                            @php
                                $lokasi = DB::table('tb_lokasi')->get();
                            @endphp
                            @foreach ($lokasi as $l)
                                <div class="col-md-6 col-xl-6 col-6 p-b-30 m-lr-auto" >
                                    <!-- Block1 -->
                                    <div class="block1 wrap-pic-w">
                                        <img src="http://127.0.0.1:1111/assets/uploads/{{ $l->gambar }}"
                                            alt="IMG-BANNER">
                                        <a href="{{ route('produk', ['id_lokasi' => $l->id_lokasi]) }}"
                                            class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                                            <div class="block1-txt-child2 flex-col-l trans-05">
                                                <span
                                                    class="block1-link cl0 {{ $l->id_lokasi == 4 ? 'ltext-100' : 'ltext-102' }} trans-09 p-b-8">
                                                    {{ $l->nm_lokasi }}
                                                </span>

                                                <span class="block1-info stext-102 trans-09">
                                                    Upperclass
                                                </span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach


                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6 slider-d">
                <div class="wrap-slick1">
                    <div class="slick1">
                        @foreach ($banner as $b)
                            <div class="item-slick1"
                                style="background-image: url(http://127.0.0.1:1111/assets/uploads/{{ $b->nm_foto }});">
                                <div class="container h-full">
                                    <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
                                        <div class="layer-slick1 animated visible-false" data-appear="fadeInDown"
                                            data-delay="0">
                                            <span class="ltext-101 cl2 respon2">
                                                {{ $b->teks1 }}
                                            </span>
                                        </div>

                                        <div class="layer-slick1 animated visible-false" data-appear="fadeInUp"
                                            data-delay="800">
                                            <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
                                                {{ $b->teks2 }}
                                            </h2>
                                        </div>

                                        <div class="layer-slick1 animated visible-false" data-appear="zoomIn"
                                            data-delay="1600">
                                            <a href="product.html"
                                                class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                                                Shop Now
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </section>





    <!-- Product -->
    <section class="sec-product bg0 p-t-100 p-b-50" style="background-color: #ECE8E1">
        <div class="container">
            <div class="p-b-32">
                <h3 class="ltext-105 cl5 txt-center respon1" style="color:#89725C;">
                    Store Overview
                </h3>
            </div>

            <!-- Tab01 -->
            <div class="tab01">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item p-b-10">
                        <a class="nav-link active" style="font-family: Poppins-Medium" data-toggle="tab" href="#best-seller" role="tab">Best Seller</a>
                    </li>

                    {{-- <li class="nav-item p-b-10">
                        <a class="nav-link" data-toggle="tab" href="#top-rate" role="tab">Top Rate</a>
                    </li> --}}
                </ul>

                <!-- Tab panes -->
                <div class="tab-content p-t-50">

                    <!-- - -->
                    <div class="tab-pane fade show active" id="best-seller" role="tabpanel">
                        <!-- Slide2 -->
                        @php
                            $bl = DB::table('tb_produk')
                                ->join('tb_kategori', 'tb_produk.id_kategori', '=', 'tb_kategori.id_kategori')
                                ->join('tb_satuan', 'tb_produk.id_satuan', '=', 'tb_satuan.id_satuan')
                                ->join('tb_harga', 'tb_produk.id_produk', '=', 'tb_harga.id_produk')
                                ->where('tb_produk.best_seller', 'ON')
                                ->groupBy('tb_harga.id_produk')
                                ->get();
                        @endphp
                        <div class="wrap-slick2">
                            <div class="slick2">
                                @foreach ($bl as $p)
                                    <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                                        <!-- Block2 -->
                                        <div class="block2">
                                            <div class="block2-pic hov-img0">
                                                <a href="{{ route('detail', ['id_produk' => $p->id_produk]) }}">
                                                    <img src="http://127.0.0.1:1111/assets/uploads/{{ $p->foto }}"
                                                        alt="IMG-PRODUCT">
                                                </a>
                                            </div>

                                            <div class="block2-txt flex-w flex-t p-t-14">
                                                <div class="block2-txt-child1 flex-col-l ">
                                                    <a href="{{ route('detail', ['id_produk' => $p->id_produk]) }}"
                                                        class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
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

                    <!-- - -->
                    <div class="tab-pane fade show" id="top-rate" role="tabpanel">
                        <!-- Slide2 -->
                        <div class="wrap-slick2">
                            <div class="slick2">
                                @php
                                    $bl = DB::table('tb_produk')
                                        ->join('tb_kategori', 'tb_produk.id_kategori', '=', 'tb_kategori.id_kategori')
                                        ->join('tb_satuan', 'tb_produk.id_satuan', '=', 'tb_satuan.id_satuan')
                                        ->join('tb_harga', 'tb_produk.id_produk', '=', 'tb_harga.id_produk')
                                        ->where('tb_produk.top_rate', 'ON')
                                        ->groupBy('tb_harga.id_produk')
                                        ->get();
                                @endphp
                                @foreach ($bl as $p)
                                    <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                                        <!-- Block2 -->
                                        <div class="block2">
                                            <div class="block2-pic hov-img0">
                                                <a href="{{ route('detail', ['id_produk' => $p->id_produk]) }}">
                                                    <img src="http://127.0.0.1:1111/assets/uploads/{{ $p->foto }}"
                                                        alt="IMG-PRODUCT">
                                                </a>
                                            </div>

                                            <div class="block2-txt flex-w flex-t p-t-14">
                                                <div class="block2-txt-child1 flex-col-l ">
                                                    <a href="{{ route('detail', ['id_produk' => $p->id_produk]) }}"
                                                        class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
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


                </div>
            </div>
        </div>
    </section>


    <!-- Footer -->



    <!-- Back to top -->
    <div class="btn-back-to-top" id="myBtn">
        <span class="symbol-btn-back-to-top">
            <i class="zmdi zmdi-chevron-up"></i>
        </span>
    </div>

    <!-- Modal1 -->
    <div class="wrap-modal1 js-modal1 p-t-60 p-b-20">
        <div class="overlay-modal1 js-hide-modal1"></div>

        <div class="container">
            <div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
                <button class="how-pos3 hov3 trans-04 js-hide-modal1">
                    <img src="{{ asset('assets') }}/images/icons/icon-close.png" alt="CLOSE">
                </button>

                <div class="row">
                    <div class="col-md-6 col-lg-7 p-b-30">
                        <div class="p-l-25 p-r-30 p-lr-0-lg">
                            <div class="wrap-slick3 flex-sb flex-w">
                                <div class="wrap-slick3-dots"></div>
                                <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

                                <div class="slick3 gallery-lb">
                                    <div class="item-slick3" data-thumb="images/product-detail-01.jpg">
                                        <div class="wrap-pic-w pos-relative">
                                            <img src="{{ asset('assets') }}/images/product-detail-01.jpg"
                                                alt="IMG-PRODUCT">

                                            <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                                href="images/product-detail-01.jpg">
                                                <i class="fa fa-expand"></i>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="item-slick3" data-thumb="images/product-detail-02.jpg">
                                        <div class="wrap-pic-w pos-relative">
                                            <img src="{{ asset('assets') }}/images/product-detail-02.jpg"
                                                alt="IMG-PRODUCT">

                                            <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                                href="images/product-detail-02.jpg">
                                                <i class="fa fa-expand"></i>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="item-slick3" data-thumb="images/product-detail-03.jpg">
                                        <div class="wrap-pic-w pos-relative">
                                            <img src="{{ asset('assets') }}/images/product-detail-03.jpg"
                                                alt="IMG-PRODUCT">

                                            <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                                href="images/product-detail-03.jpg">
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
                                Lightweight Jacket
                            </h4>

                            <span class="mtext-106 cl2">
                                $58.79
                            </span>

                            <p class="stext-102 cl3 p-t-23">
                                Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare
                                feugiat.
                            </p>

                            <!--  -->
                            <div class="p-t-33">
                                <div class="flex-w flex-r-m p-b-10">
                                    <div class="size-203 flex-c-m respon6">
                                        Size
                                    </div>

                                    <div class="size-204 respon6-next">
                                        <div class="rs1-select2 bor8 bg0">
                                            <select class="js-select2" name="time">
                                                <option>Choose an option</option>
                                                <option>Size S</option>
                                                <option>Size M</option>
                                                <option>Size L</option>
                                                <option>Size XL</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex-w flex-r-m p-b-10">
                                    <div class="size-203 flex-c-m respon6">
                                        Color
                                    </div>

                                    <div class="size-204 respon6-next">
                                        <div class="rs1-select2 bor8 bg0">
                                            <select class="js-select2" name="time">
                                                <option>Choose an option</option>
                                                <option>Red</option>
                                                <option>Blue</option>
                                                <option>White</option>
                                                <option>Grey</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex-w flex-r-m p-b-10">
                                    <div class="size-204 flex-w flex-m respon6-next">
                                        <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                            <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                <i class="fs-16 zmdi zmdi-minus"></i>
                                            </div>

                                            <input class="mtext-104 cl3 txt-center num-product" type="number"
                                                name="num-product" value="1">

                                            <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                <i class="fs-16 zmdi zmdi-plus"></i>
                                            </div>
                                        </div>

                                        <button
                                            class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
                                            Add to cart
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!--  -->
                            <div class="flex-w flex-m p-l-100 p-t-40 respon7">
                                <div class="flex-m bor9 p-r-10 m-r-11">
                                    <a href="#"
                                        class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100"
                                        data-tooltip="Add to Wishlist">
                                        <i class="zmdi zmdi-favorite"></i>
                                    </a>
                                </div>

                                <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
                                    data-tooltip="Facebook">
                                    <i class="fa fa-facebook"></i>
                                </a>

                                <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
                                    data-tooltip="Twitter">
                                    <i class="fa fa-twitter"></i>
                                </a>

                                <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
                                    data-tooltip="Google Plus">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script>
    $(function(){
        $(".whatsappbut").floatingWhatsApp({
            phone : '6285751609104',
            showPopup : true,
            popupMessage : 'Hey !',
            headerTitle : 'Whatsapp chat',
            message : 'great work',
            position : 'right'
        });
    });
</script>
@endsection
