@extends('template.master')
@section('content')
    {{-- <div style="margin-top: 70px"></div><br> --}}

    <!-- Product -->
    @livewireStyles
    <div class="bg0 m-t-30 p-b-140 topproduk" style="background-color: #ECE8E1;">
        <div class="container" >
            @php
                foreach ($lokasi as $l) {
                    if (request()->id_lokasi == $l->id_lokasi) {
                        $lok = $l->nm_lokasi;
                    }
                }
            @endphp
            <div class="flex-w flex-sb-m p-b-52">
                <h3 class="ltext-105 cl5 txt-center respon1">
                    {{ $lok }}
                </h3>
                <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                    <a href="{{ route('produk', ['id_lokasi' => Request::get('id_lokasi')]) }}">
                        <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 {{Request::get('kategori') == '' ? 'how-active1' : ''}}" data-filter="*">
                            All Products
                        </button>
                    </a>
                    @foreach ($kategori as $k)
                        <a href="{{route('produk')}}?kategori={{$k->id_kategori}}&id_lokasi={{Request::get('id_lokasi')}}" class="{{Request::get('kategori') == $k->id_kategori ? 'how-active1' : ''}} stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5"
                            data-filter=".{{ Str::lower($k->nm_kategori) }}">
                            {{ ucwords(Str::lower($k->nm_kategori)) }}
                        </a>
                    @endforeach
                </div>

                <div class="flex-w flex-c-m m-tb-10">
                    {{-- <div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
						<i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
						<i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						 Filter
					</div> --}}

                    <div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
                        <i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
                        <i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                        Search
                    </div>
                </div>

                <!-- Search product -->
                <div class="dis-none panel-search w-full p-t-10 p-b-15">
                    <div class="bor8 dis-flex p-l-15">
                        <button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
                            <i class="zmdi zmdi-search"></i>
                        </button>
                        {{-- <input type="text" class="form-control boxSearch" placeholder="Pencarian" aria-label="Username" aria-describedby="basic-addon1"> --}}
                        <form action="{{route('produk')}}" method="get" class="formSearch">
                            <input type="hidden" value="{{ Request::get('id_lokasi') }}" name="id_lokasi">
                            <input autofocus class="mtext-107 cl2 size-114 plh2 p-r-15 boxSearch" type="text" name="search"
                            placeholder="Search" wire:model="search" id="search">
                            <button type="submit" id="btnSearch"></button>
                        </form>
                    </div>
                </div>
            </div>
            
            <div id="konten"></div>
            <div id="konten1"></div>
            <div class="ajax-load text-center" style="display:none">
                <p><img src="{{ asset('assets/images/icons/load.gif') }}" width="10%" alt=""></p>
            </div>
            
            {{-- <div id="produk"></div> --}}
        </div>
        
    </div>
    @livewireScripts
@endsection
@section('script')

<script>
    $(document).ready(function(){

    var url = "{{ route('aksiSearch') }}?id_lokasi={{Request::get('id_lokasi')}}&kategori={{Request::get('kategori')}}&page=1"
    getSearch(url)

    function getSearch(url){
        $("#konten").load(url, "data", function (response, status, request) {
            this; // dom element  
                   
        });
    }

    $(document).on('keyup', '#search', function(){
        var s = this.value
        var url = "{{ route('aksiSearch') }}?id_lokasi={{Request::get('id_lokasi')}}&search="+s
        getSearch(url)
    });
    getPage(1)
    $(document).on('click', '.page-link', function(event) {
        event.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        getPage(page)
    });

    function getPage(page){
        $("#konten").load("{{ route('aksiSearch') }}?id_lokasi={{Request::get('id_lokasi')}}&kategori={{Request::get('kategori')}}&page="+page, "data", function (response, status, request) {
            this; // dom element  
                   
        });
    }
        
});
</script>
@endsection
