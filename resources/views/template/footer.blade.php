<style>
    .float{
        position:fixed;
        width:60px;
        height:60px;
        bottom:40px;
        right:40px;
        background-color:#25d366;
        color:#FFF;
        border-radius:50px;
        text-align:center;
        font-size:30px;
            box-shadow: 2px 2px 3px #999;
        z-index:100;
    }

    .wa-float{
        margin-top:16px;
    }
</style>
@php
    $no = DB::table('wa')->first();
@endphp
<a class="float" href="https://wa.me/{{$no->nomor}}?text=ADA YANG KAMI BANTU ?"><i class="fa-brands fa-whatsapp wa-float"></i></a>
<footer class="bg3 p-t-75 p-b-32" style="background-color: #89725C;">
    <h3 class="text-center" style="font-size:30px; color:white; font-weight:500; font-family: Americana-Regular;"> be.you.tiful</h3><br>
    <div class="container">
        <style>
            .logim {
                width:24px;
            }
        </style>
        {{-- <div class="row justify-content-center" style="color: rgb(199, 198, 198);">
            @php
                $lokasi = DB::table('tb_footer')->join('tb_lokasi','tb_lokasi.id_lokasi','=','tb_footer.id_lokasi')->get();
                
            @endphp
            @foreach ($lokasi as $l)
            <div class="col-sm-6 col-lg-3 p-b-50">
                <h4 class="stext-301 p-b-30">
                    {{$l->nm_lokasi}}
                </h4>
            
                <span class="cl7 size-201" style="color: rgb(199, 198, 198); font-size:12px;">
                    {!! $l->deskripsi !!}
                </span>
                @php
                    $sosmed = DB::table('tb_footer')->join('tb_footer_sosmed', 'tb_footer_sosmed.id_footer','=','tb_footer.id_footer')->where('tb_footer_sosmed.id_footer', $l->id_footer)->get();
                @endphp
                <div class="p-t-10 " style="color: rgb(199, 198, 198);">
                    @foreach ($sosmed as $s)                    
                    <a href="{{$s->link}}" class="fs-18 cl7 hov-cl1 trans-04 m-r-16" target="_blank">
                        <img src="{{$s->icon}}" class="logim"/>
                    </a>                 
                    @endforeach               
                </div>
            </div>
            @endforeach 

        </div> --}}
            {{-- <div class="col-sm-6 col-lg-3 p-b-50">
                <h4 class="stext-301 p-b-30">
                    Birdnest
                </h4>

                <p class="cl7 size-201" style="color: rgb(93, 93, 93);font-size:12px;">
                    Ig: @upperclassbirdnest <br>
                    Jl Ks Tubun No.28B-D Banjarmasin 70246 <br> or call us on <br>
                    (+62) 811 5088881 / (+62) 811 5088882
                </p>
                <div class="p-t-10 " style="color: rgb(93, 93, 93);">
                    <a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16 " target="_blank">
                        <img src="https://img.icons8.com/fluency/48/000000/facebook-new.png" class="logim"/>
                    </a>

                    
                    <a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16 " target="_blank">
                        <img src="https://img.icons8.com/fluency/48/000000/instagram-new.png" class="logim"/>
                    </a>
                    <a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16 " target="_blank">
                        <img src="https://img.icons8.com/color/48/000000/shopee.png" class="logim">
                    </a>
                    <a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16 " target="_blank">
                        <img src="https://www.freepnglogos.com/uploads/logo-tokopedia-png/logo-tokopedia-15.png" class="logim">
                    </a>
                </div>
            </div> --}}
            
            
            
        
        <!--<div class="p-t-20">-->
        <!--        <div class="p-t-10 txt-center" style="color: rgb(93, 93, 93);">-->
        <!--            <a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">-->
        <!--                <i class="fa fa-facebook"></i>-->
        <!--            </a>-->

        <!--            <a href="https://www.instagram.com/upperclassbeautyindonesia/"-->
        <!--                class="fs-18 cl7 hov-cl1 trans-04 m-r-16">-->
        <!--                <i class="fa fa-instagram"></i>-->
        <!--            </a>-->

                    <!--<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">-->
                    <!--    <i class="fa fa-pinterest-p"></i>-->
                    <!--</a>-->
        <!--        </div>-->
     
        <!--</div>-->
        <div class="p-t-40" >
            <p class=" cl6 txt-center" style="color: rgb(199, 198, 198)">
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;
                <script>
                    document.write(new Date().getFullYear());
                </script> All rights reserved | Made with Upperclass
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

            </p>
        </div>
    </div>
</footer>
<!--===============================================================================================-->
<script src="{{ asset('assets') }}/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="{{ asset('assets') }}/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="{{ asset('assets') }}/vendor/bootstrap/js/popper.js"></script>
<script src="{{ asset('assets') }}/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="{{ asset('assets') }}/vendor/select2/select2.min.js"></script>
<script>
    $('.select21').select2()
    $(".js-select2").each(function() {
        $(this).select2({
            minimumResultsForSearch: 20,
            dropdownParent: $(this).next('.dropDownSelect2')
        });
    })
</script>
<!--===============================================================================================-->
<script src="{{ asset('assets') }}/vendor/daterangepicker/moment.min.js"></script>
<script src="{{ asset('assets') }}/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="{{ asset('assets') }}/vendor/slick/slick.min.js"></script>
<script src="{{ asset('assets') }}/js/slick-custom.js"></script>
<script src="sweetalert2.all.min.js"></script>
<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
<!--===============================================================================================-->
<script src="{{ asset('assets') }}/vendor/parallax100/parallax100.js"></script>
<script>
    $('.parallax100').parallax100();
</script>
<!--===============================================================================================-->
<script src="{{ asset('assets') }}/vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
<script>
    $('.gallery-lb').each(function() { // the containers for all your galleries
        $(this).magnificPopup({
            delegate: 'a', // the selector for gallery item
            type: 'image',
            gallery: {
                enabled: true
            },
            mainClass: 'mfp-fade'
        });
    });
            function load_icon(){
                $.ajax({
                    url : "{{route('getIconCart')}}",
                    type : 'GET',                      
                    success: function(data) {                 
                        $('.notif').attr("data-notify", data);
                    }
                })
            }

            load_icon()
            setInterval(function() {
                load_icon()
            }, 1000);  
            
            
</script>
<!--===============================================================================================-->
<script src="{{ asset('assets') }}/vendor/isotope/isotope.pkgd.min.js"></script>
{{-- <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script> --}}
<!-- DataTables  & Plugins -->
<script src="{{ asset('assets') }}/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('assets') }}/vendor/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('assets') }}/vendor/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('assets') }}/vendor/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{ asset('assets') }}/vendor/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('assets') }}/vendor/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{ asset('assets') }}/vendor/jszip/jszip.min.js"></script>
<script src="{{ asset('assets') }}/vendor/pdfmake/pdfmake.min.js"></script>
<script src="{{ asset('assets') }}/vendor/pdfmake/vfs_fonts.js"></script>
<script src="{{ asset('assets') }}/vendor/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{ asset('assets') }}/vendor/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{ asset('assets') }}/vendor/datatables-buttons/js/buttons.colVis.min.js"></script>
<!--===============================================================================================-->
<script src="{{ asset('assets') }}/vendor/sweetalert/sweetalert.min.js"></script>

<script>
    $('#example2').DataTable({
                    "paging": true,
                    "lengthChange": true,
                    "searching": true,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                    "responsive": true,
                });
    $('.js-addwish-b2').on('click', function(e) {
        e.preventDefault();
    });

    $('.js-addwish-b2').each(function() {
        var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
        $(this).on('click', function() {
            swal(nameProduct, "is added to wishlist !", "success");

            $(this).addClass('js-addedwish-b2');
            $(this).off('click');
        });
    });

    $('.js-addwish-detail').each(function() {
        var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

        $(this).on('click', function() {
            swal(nameProduct, "is added to wishlist !", "success");

            $(this).addClass('js-addedwish-detail');
            $(this).off('click');
        });
    });

    /*---------------------------------------------*/

    $('.js-addcart-detail').each(function() {
        var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
        $(this).on('click', function() {
            swal(nameProduct, "is added to cart !", "success");
        });
    });
</script>
<!--===============================================================================================-->
<script src="{{ asset('assets') }}/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script>
    $('.js-pscroll').each(function() {
        $(this).css('position', 'relative');
        $(this).css('overflow', 'hidden');
        var ps = new PerfectScrollbar(this, {
            wheelSpeed: 1,
            scrollingThreshold: 1000,
            wheelPropagation: false,
        });

        $(window).on('resize', function() {
            ps.update();
        })
    });
</script>
<!--===============================================================================================-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKFWBqlKAGCeS1rMVoaNlwyayu0e0YRes"></script>
<script src="js/map-custom.js"></script>
<!--===============================================================================================-->
<script src="{{ asset('assets') }}/js/main.js"></script>

@yield('script')

</body>

</html>
