@foreach ($produk as $p)
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
                                        class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6" style="font-family: Americana-Regular; font-size: 11px;">
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
                <button class="btn btn-primary" wire:click="loadmore">Load More</button>
                @if ($count < $totalProduk)
        
                @endif
                <div class="spinner-border spinner-border-sm" role="status" wire:loading>
                    <span class="visually-hidden">Loading...</span>
                  </div>
