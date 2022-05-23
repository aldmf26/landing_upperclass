<style>
   .pagination{
    font-family: 'Poppins', sans-serif;


    justify-content: center;
}
.pagination li a.page-link{
    color: #444;
    background: #f1f1f1;
    font-size: 22px;
    font-weight: 500;
    line-height: 40px;
    height: 40px;
    width: 40px;
    text-align: center;
    padding: 0;
    margin: 0 5px;
    border: none;
    border-radius: 50%;
    overflow: hidden;
    position: relative;
    z-index: 1;
    transition: all 0.3s ease 0.15s;
}

.page-item.active .page-link {
    z-index: 2;
    color: #fff;
    background-color: #89725C;
    border-color: #89725C;
    font-size: 22px;
    font-weight: 500;
    line-height: 40px;
    height: 40px;
    width: 40px;
    text-align: center;
    padding: 0;
    margin: 0 13px;
    border: none;
    border-radius: 50%;
    overflow: hidden;
    position: relative;
    transition: all 0.3s ease 0.15s;
}

.pagination li a.page-link:hover,
.pagination li a.page-link:focus,
.pagination li.active a.page-link:hover,
.pagination li.active a.page-link{
    color: #ffffff;
    background: transparent;
}

.pagination li a.page-link:before,
.pagination li a.page-link:after{
    content: '';
    background-color: #89725C;
    height: 100%;
    width: 100%;
    border-radius: inherit;
    position: absolute;
    left: 0;
    top: 100%;
    z-index: -1;
    transition: all 0.3s ease 0s;
}
.pagination li a.page-link:after{
    background-color: #f1f1f1;
    border-radius: 0;
    top: 0;
    clip-path: polygon(0 0, 50% 100%, 100% 0);
    transition: all 0.3s ease 0.15s;
}
.pagination li a.page-link:hover:before,
.pagination li a.page-link:focus:before,
.pagination li.active a.page-link:hover:before,
.pagination li.active a.page-link:before{
    top: 0;
}
.pagination li a.page-link:hover:after,
.pagination li a.page-link:focus:after,
.pagination li.active a.page-link:hover:after,
.pagination li.active a.page-link:after{
    transform: scaleX(0);
}

</style>
<div class="row isotope-grid">
@foreach ($produk as $p)
                    <div
                        class="col-sm-6 col-md-4 col-lg-3 col-6 p-b-35 isotope-item {{ Str::lower($p->nm_kategori) }} listSearch">
                        <!-- Block2 -->
                        <div class="block2">
                            <div class="block2-pic hov-img0">
                                <a href="{{ route('detail', ['id_produk' => $p->id_produk]) }}">
                                    <img src="http://127.0.0.1:1111/assets/uploads/{{ $p->foto == '' ? 'noimage.jpg' : $p->foto }}" alt="IMG-PRODUCT">
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
            {{ $produk->appends(['id_lokasi' => $id_lokasi])->links() }}
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.min.js"></script>
<script>
    $(document).ready(function () {
        $('img').lazyload()
    });
</script>
@endsection