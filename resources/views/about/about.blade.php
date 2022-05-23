@extends('template.master')
@section('content')
<style>
    p {
    text-align: justify;
    text-justify: inter-word;
    }
</style>
    {{-- <div style="margin-top: 70px"></div><br> --}}
    <section class="bg0 p-t-75 p-b-120 topproduk" style="background-color: #ECE8E1">
        <div class="container">
            @php
                    $gambar = DB::table('tb_about')->get();
                    
                @endphp
            <div class="row p-b-148">
                <div class="col-md-7 col-lg-8">
                    <div class="p-t-7 p-r-85 p-r-15-lg p-r-0-md">
                        <h3 class="mtext-111 cl2 p-b-16">
                            Our Story
                        </h3>

                        <span class="stext-113 cl6 p-b-26">
                            {!! $gambar[0]->teks1 !!}
                        </span>

                        {{-- <p class="stext-113 cl6 p-b-26">
                            Donec gravida lorem elit, quis condimentum ex semper sit amet. Fusce eget ligula magna. Aliquam
                            aliquam imperdiet sodales. Ut fringilla turpis in vehicula vehicula. Pellentesque congue ac orci
                            ut gravida. Aliquam erat volutpat. Donec iaculis lectus a arcu facilisis, eu sodales lectus
                            sagittis. Etiam pellentesque, magna vel dictum rutrum, neque justo eleifend elit, vel tincidunt
                            erat arcu ut sem. Sed rutrum, turpis ut commodo efficitur, quam velit convallis ipsum, et
                            maximus enim ligula ac ligula.
                        </p> --}}

                        {{-- <p class="stext-113 cl6 p-b-26">
                            Any questions? Let us know in store at 8th floor, 379 Hudson St, New York, NY 10018 or call us
                            on (+1) 96 716 6879
                        </p> --}}
                    </div>
                </div>
                
                <div class="col-11 col-md-5 col-lg-4 m-lr-auto">
                    <div class="how-bor1 ">
                        <div class="hov-img0">
                            <img src="http://127.0.0.1:1111/assets/uploads/{{$gambar[0]->gambar}}" alt="IMG">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="order-md-2 col-md-7 col-lg-8 p-b-30">
                    <div class="p-t-7 p-l-85 p-l-15-lg p-l-0-md">
                        <h3 class="mtext-111 cl2 p-b-16">
                            Our Mission
                        </h3>

                        <span class="stext-113 cl6 p-b-26">
                            {!! $gambar[1]->teks1 !!}
                        </span>

                        {{-- <div class="bor16 p-l-29 p-b-9 m-t-22">
                            <p class="stext-114 cl6 p-r-40 p-b-11">
                                Creativity is just connecting things. When you ask creative people how they did something,
                                they feel a little guilty because they didn't really do it, they just saw something. It
                                seemed obvious to them after a while.
                            </p>

                            <span class="stext-111 cl8">
                                - Steve Job’s
                            </span>
                        </div> --}}
                    </div>
                </div>

                <div class="order-md-1 col-11 col-md-5 col-lg-4 m-lr-auto p-b-30">
                    <div class="how-bor2">
                        <div class="hov-img0">
                            <img src="http://127.0.0.1:1111/assets/uploads/{{$gambar[1]->gambar}}" alt="IMG">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
