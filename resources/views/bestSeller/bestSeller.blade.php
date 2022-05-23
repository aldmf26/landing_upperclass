@extends('template.master')
@section('content')
    {{-- <div style="margin-top: 70px"></div><br> --}}

    <!-- Product -->
    <div class="bg0 m-t-30 p-b-140 topproduk" style="background-color: #ECE8E1;">
        <div class="container">

            <div class="flex-w flex-sb-m p-b-52">
                <h3 class="ltext-105 cl5 txt-center respon1">
                    Best Seller
                </h3>


                <div class="flex-w flex-c-m m-tb-10">
                    {{-- <div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
						<i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
						<i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						 Filter
					</div> --}}


                </div>

                <!-- Search product -->
                <div class="dis-none panel-search w-full p-t-10 p-b-15">
                    <div class="bor8 dis-flex p-l-15">
                        <button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
                            <i class="zmdi zmdi-search"></i>
                        </button>
                        {{-- <input type="text" class="form-control boxSearch" placeholder="Pencarian" aria-label="Username" aria-describedby="basic-addon1"> --}}
                        <form action="{{ route('produk') }}" method="get" class="formSearch">
                            <input type="hidden" value="{{ Request::get('id_lokasi') }}" name="id_lokasi">
                            <input autofocus class="mtext-107 cl2 size-114 plh2 p-r-15 boxSearch" type="text" name="search"
                                placeholder="Search" wire:model="search" id="search">
                            <button type="submit" id="btnSearch"></button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row isotope-grid">
                @php
                    $bl = DB::table('tb_produk')
                                ->join('tb_kategori', 'tb_produk.id_kategori', '=', 'tb_kategori.id_kategori')
                                ->join('tb_satuan', 'tb_produk.id_satuan', '=', 'tb_satuan.id_satuan')
                                ->join('tb_harga', 'tb_produk.id_produk', '=', 'tb_harga.id_produk')
                                ->where('tb_produk.best_seller', 'ON')
                                ->groupBy('tb_harga.id_produk')
                                ->get();
                @endphp
                @foreach ($bl as $p)
                    <div
                        class="col-sm-6 col-md-4 col-lg-3 col-6 p-b-35 isotope-item {{ Str::lower($p->nm_kategori) }} listSearch">
                        <!-- Block2 -->
                        <div class="block2">
                            <div class="block2-pic hov-img0">
                                <a href="{{ route('detail', ['id_produk' => $p->id_produk]) }}">
                                    <img src="http://127.0.0.1:1111/assets/uploads/{{ $p->foto }}" alt="IMG-PRODUCT">
                                </a>
                            </div>

                            <div class="block2-txt flex-w flex-t p-t-14">
                                <div class="block2-txt-child1 flex-col-l ">
                                    <a href="{{ route('detail', ['id_produk' => $p->id_produk]) }}"
                                        class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6"
                                        >
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


            {{-- <div id="produk"></div> --}}
        </div>
    </div>
@endsection
