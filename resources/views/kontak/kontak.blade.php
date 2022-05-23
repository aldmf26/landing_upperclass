@extends('template.master')
@section('content')
<style>
	.container1 {
	position: relative;
	overflow: hidden;
	width: 100%;
	height: 100%;
	padding-left: 50%;
	padding-top: 56.25%; /* 16:9 Aspect Ratio (divide 9 by 16 = 0.5625) */
	}

	/* Then style the iframe to fit in the container div with full height and width */
	.responsive-iframe {
	position: absolute;
	top: 0;
	left: 0;
	bottom: 0;
	right: 0;
	width: 100%;
	height: 100%;
	}
</style>
    <!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{asset('assets')}}/images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			Contact
		</h2>
	</section>	


	<!-- Content page -->
	<section class="bg0 p-t-104 p-b-50" style="background-color: #ECE8E1">
		<div class="container justify-content-center">
			<div class="flex-w flex-tr justify-content-center">
				<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
					<form action="{{ route('kirim') }}" method="post">
						@csrf
						<h4 class="mtext-105 cl2 txt-center p-b-30">
							Send Us A Message
						</h4>

						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="email" placeholder="Your Email Address">
							<img class="how-pos4 pointer-none" src="{{asset('assets')}}/images/icons/icon-email.png" alt="ICON">
						</div>

						<div class="bor8 m-b-30">
							<textarea class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25" name="msg" placeholder="How Can We Help?"></textarea>
						</div>

						<button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
							Submit
						</button>
					</form>
				</div>

				<div class="row size-210 bor10 p-lr-70 p-t-55 p-lr-15-lg w-full-md">
					@php
						$lokasi = DB::table('tb_footer')->join('tb_lokasi','tb_lokasi.id_lokasi','=','tb_footer.id_lokasi')->get();
						
					@endphp
					@foreach ($lokasi as $l)
					<div class="col-sm-12 col-lg-6 p-b-50">
						<h4 class="stext-301 p-b-30">
							{{$l->nm_lokasi}}
						</h4>
					
						<span class="cl7 size-201 stext-302" style="color: #89725C; font-size:12px;">
							{!! $l->deskripsi !!}
						</span>
						@php
							$sosmed = DB::table('tb_footer')->join('tb_footer_sosmed', 'tb_footer_sosmed.id_footer','=','tb_footer.id_footer')->where('tb_footer_sosmed.id_footer', $l->id_footer)->get();
						@endphp
						<div class="p-t-10 " style="color: #89725C;">
							@foreach ($sosmed as $s)                    
							<a href="{{$s->link}}" class="fs-18 cl7 hov-cl1 trans-04 m-r-16" target="_blank">
								<img src="{{$s->icon}}" class="logim"/>
							</a>                 
							@endforeach               
						</div>
					</div>
					@endforeach 
				</div>
				

				<!--<div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">-->
				<!--	<div class="flex-w w-full p-b-42">-->
				<!--		<span class="fs-18 cl5 txt-center size-211">-->
				<!--			<span class="lnr lnr-map-marker"></span>-->
				<!--		</span>-->

				<!--		<div class="size-212 p-t-2">-->
				<!--			<span class="mtext-110 cl2">-->
				<!--				Address-->
				<!--			</span>-->

				<!--			<p class="stext-115 cl6 size-213 p-t-18">-->
				<!--				Ig: @orchard.upperclassnail <br>-->
				<!--				Jl Ks Tubun No.28B-D Banjarmasin 70246-->
				<!--			</p>-->
				<!--		</div>-->
				<!--	</div>-->

				<!--	<div class="flex-w w-full p-b-42">-->
				<!--		<span class="fs-18 cl5 txt-center size-211">-->
				<!--			<span class="lnr lnr-phone-handset"></span>-->
				<!--		</span>-->

				<!--		<div class="size-212 p-t-2">-->
				<!--			<span class="mtext-110 cl2">-->
				<!--				Contact Us-->
				<!--			</span>-->

				<!--			<p class="stext-115 cl1 size-213 p-t-18">-->
				<!--				+62 811 5188778 / +62 811 5088881-->
				<!--			</p>-->
				<!--		</div>-->
				<!--	</div>-->

				<!--	<div class="flex-w w-full">-->
				<!--		<span class="fs-18 cl5 txt-center size-211">-->
				<!--			<span class="lnr lnr-envelope"></span>-->
				<!--		</span>-->

				<!--		<div class="size-212 p-t-2">-->
				<!--			<span class="mtext-110 cl2">-->
				<!--				Email-->
				<!--			</span>-->

				<!--			<p class="stext-115 cl1 size-213 p-t-18">-->
				<!--				upperclass.indonesia@gmail.com-->
				<!--			</p>-->
				<!--		</div>-->
				<!--	</div>-->
				<!--</div>-->
			</div>
		</div>
	</section>	
	
	
	<!-- Map -->
	<div class="text-center p-b-50 container1">
		<iframe class="responsive-iframe" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15932.325766508655!2d114.58366096977537!3d-3.3300561999999974!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2de423df74278031%3A0x6e19d873632f2f73!2sOrchard%20Beauty%20Studio!5e0!3m2!1sid!2sid!4v1646968737573!5m2!1sid!2sid" width="500" height="200" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
	</div>
@endsection
@section('script')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script>
		Swal.fire({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            icon: 'success',
            title: "{{ Session::get('sukses') }}"
        });
	</script>
@endsection