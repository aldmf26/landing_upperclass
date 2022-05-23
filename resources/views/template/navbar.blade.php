<style>
    .btn-google {
        color: #545454;
        background-color: #ffffff;
        box-shadow: 0 1px 2px 1px #ddd
    }
    .ui-state-active h4,
    .ui-state-active h4:visited {
        color: #26004d;
    }

    .ui-menu-item {
        height: 80px;
        border: 1px solid #ececf9;
    }

    .ui-widget-content .ui-state-active {
        background-color: white !important;
        border: none !important;
    }

    .list_item_container {
        width: 740px;
        height: 80px;
        float: left;
        margin-left: 20px;
    }

    .ui-widget-content .ui-state-active .list_item_container {
        background-color: #f5f5f5;
    }

    .image {
        width: 15%;
        float: left;
        padding: 10px;
    }

    .image img {
        width: 80px;
        height: 60px;
    }

    .label {
        width: 85%;
        float: right;
        white-space: nowrap;
        overflow: hidden;
        color: rgb(124, 77, 255);
        text-align: left;
    }

    input:focus {
        background-color: #f5f5f5;
    }

    select:focus,
    input[type="text"]:focus,
    input[type="number"]:focus,
    input[type="password"]:focus,
    input[type="email"]:focus,
    input[type="url"]:focus,
    textarea:focus {
        border-color: #5b518b !important;
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset, 0 0 4px #5b518b !important;
        outline: 0 none;
    }

</style>

<body class="animsition">

    <!-- Header -->
    <header>
        <!-- Header desktop -->
        <div class="container-menu-desktop">
            <!-- Topbar -->
            <div style="background-color: #DAD0C0; height:0px">

            </div>
            <div class="wrap-menu-desktop" style="background-color:#89725C;">
                <nav class="limiter-menu-desktop container">

                    <!-- Logo desktop -->
                    <a href="#" class="logo">
                        <img src="{{ asset('assets') }}/images/icons/logoupputih.png" alt="IMG-LOGO">
                    </a>

                    <!-- Menu desktop -->
                    <div class="menu-desktop">
                        <ul class="main-menu">
                            <li class="{{ request()->is('/') ? 'active-menu' : '' }}">
                                <a href="{{ route('home') }}">HOME</a>
                            </li>
                            <li class="">
                                <a href="{{ route('bestSeller') }}">BEST SELLER</a>
                            </li>

                            <li>
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    SHOP
                                </a>

                                <div class="dropdown-menu sub-menu-m" style="padding: 2px">
                                    @php
                                        $lokasi = DB::table('tb_lokasi')->get();
                                    @endphp
                                    @foreach ($lokasi as $l)
                                        <a class="dropdown-item"
                                            href="{{ route('produk', ['id_lokasi' => $l->id_lokasi]) }}">{{ Str::upper($l->nm_lokasi) }}</a>
                                    @endforeach
                                </div>
                            </li>

                            <li>
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    INFO
                                </a>

                                <div class="dropdown-menu sub-menu-m" style="padding: 2px">
                                    <a class="dropdown-item" href="{{ route('about') }}">ABOUT US</a>
                                    <a class="dropdown-item" href="{{ route('how') }}">HOW TO ORDER</a>
                                    <a class="dropdown-item" href="{{ route('kontak') }}">CONTACT US</a>
                                </div>
                            </li>
                            <li class="{{ request()->is('confirm') ? 'active-menu' : '' }}">
                                <a href="{{ route('confirm') }}">PAYMENT CONFIRMATION</a>
                            </li>

                            {{-- <li class="{{ request()->is('about') ? 'active-menu' : '' }}">
                                <a href="{{ route('about') }}">About Us</a>
                            </li>

                            <li class="{{ request()->is('kontak') ? 'active-menu' : '' }}">
                                <a href="{{ route('kontak') }}">Contact</a>
                            </li> --}}
                        </ul>
                    </div>

                    {{-- <p>{{ Auth::user()->alamat }}</p> --}}
                    <!-- Icon header -->
                    <div class="wrap-icon-header flex-w flex-r-m">
                        <div  class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 ">
                            <a href="{{ route(Session::get('login') == 1 ? 'userPage' : 'login') }}" class="text-light"><i class="zmdi zmdi-account" style="font-size:35px;"></i></a>
                        </div>

                        <div id="iconCart">
                            <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti notif" id="notif" data-notify="">
                                <a href="{{ route('shopingCart') }}"><i class="zmdi zmdi-shopping-cart text-light" style="font-size:35px;"></i></a>
                            </div>
                        </div>
                        {{-- <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
                            <i class="zmdi zmdi-search"></i>
                        </div>
                        </a> --}}
                    </div>
                </nav>
            </div>
        </div>

        <!-- Header Mobile -->
        <div class="wrap-header-mobile" style="background-color:#89725C;">
            <!-- Button show menu -->
            <div class="btn-show-menu-mobile hamburger hamburger--squeeze-light">
                <span class="hamburger-box" >
                    <i class="fa-solid fa-bars fa-2x text-light"></i>
                </span>
            </div>
            <!-- Logo moblie -->
            <div class="logo-mobile ">
                <a href="index.html"><img src="{{ asset('assets') }}/images/icons/logoupputih.png" alt="IMG-LOGO"></a>
            </div>

            <div style="position: absolute; left:80%;" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti notif" id="notif" data-notify="">
                <a href="{{ route('shopingCart') }}"><i class="zmdi zmdi-shopping-cart text-light"></i></a>
            </div>
            {{-- <!-- Icon header -->
            <div class="wrap-icon-header flex-w flex-r-m m-r-15">
                <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search" >
                    <i class="zmdi zmdi-search"></i>
                </div>
            </div> --}}
            {{-- <div data-toggle="modal" data-target="#user" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 ">
                <a href=""><i class="zmdi zmdi-account"></i> Log in</a>
            </div> --}}
            


            
        </div>


        <!-- Menu Mobile -->
        <div class="menu-mobile">

            <ul class="main-menu-m">
                <li class="{{ request()->is('/') ? 'active-menu' : '' }}">
                    <a href="{{ route('home') }}">HOME</a>
                </li>
                <li class="">
                    <a href="{{ route('bestSeller') }}">BEST SELLER</a>
                </li>

                <li>
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        SHOP
                    </a>

                    <div class="dropdown-menu sub-menu-m" style="padding: 2px">
                        @php
                            $lokasi = DB::table('tb_lokasi')->get();
                        @endphp
                        @foreach ($lokasi as $l)
                            <a class="dropdown-item"
                                href="{{ route('produk', ['id_lokasi' => $l->id_lokasi]) }}">{{ Str::upper($l->nm_lokasi) }}</a>
                        @endforeach
                    </div>
                </li>

                <li>
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        INFO
                    </a>

                    <div class="dropdown-menu sub-menu-m" style="padding: 2px">
                        <a class="dropdown-item" href="{{ route('about') }}">ABOUT US</a>
                        <a class="dropdown-item" href="{{ route('how') }}">HOW TO ORDER</a>
                        <a class="dropdown-item" href="{{ route('kontak') }}">CONTACT US</a>
                    </div>
                </li>
                <li class="{{ request()->is('confirm') ? 'active-menu' : '' }}">
                    <a href="{{ route('confirm') }}">PAYMENT CONFIRMATION</a>
                </li>

                {{-- <li class="{{ request()->is('about') ? 'active-menu' : '' }}">
                    <a href="{{ route('about') }}">About</a>
                </li>

                <li class="{{ request()->is('kontak') ? 'active-menu' : '' }}">
                    <a href="{{ route('kontak') }}">Contact</a>
                </li> --}}

                <li>
                    <a href="{{ route('login') }}"><i class="zmdi zmdi-account mr-2"></i> Log in</a>
                    
                </li>
            </ul>

            
        </div>

        <!-- Modal Search -->
        <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
            <div class="container-search-header">
                <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
                    <img src="{{ asset('assets') }}/images/icons/icon-close2.png" alt="CLOSE">
                </button>

                <form class="wrap-search-header flex-w p-l-15">
                    <button class="flex-c-m trans-04">
                        <i class="zmdi zmdi-search"></i>
                    </button>
                    <input class="plh3" type="text" id="search" autocomplete="off" name="search"
                        placeholder="Search...">
                </form>
            </div>
        </div>
    </header>
    {{-- user login --}}
    <!-- Modal -->
    <!-- Modal -->
    <div class="modal fade" style="margin-top: 100px" id="user" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="form-title text-center">
                    <h4>Login</h4>
                  </div>
                  <div class="d-flex flex-column text-center">
                    <form>
                      <div class="form-group">
                        <input type="email" class="form-control" id="email1"placeholder="Your email address...">
                      </div>
                      <div class="form-group">
                        <input type="password" class="form-control" id="password1" placeholder="Your password...">
                      </div>
                      <button type="button" class="btn btn-info btn-block btn-round">Login</button>
                    </form>
                    
                    <div class="text-center text-muted delimiter">or use a social network</div>
                    <div class="d-flex justify-content-center social-buttons">
                      <button type="button" class="btn btn-secondary btn-round" data-toggle="tooltip" data-placement="top" title="Twitter">
                        <i class="fab fa-twitter"></i>
                      </button>
                      <button type="button" class="btn btn-secondary btn-round" data-toggle="tooltip" data-placement="top" title="Facebook">
                        <i class="fab fa-facebook"></i>
                      </button>
                      <button type="button" class="btn btn-secondary btn-round" data-toggle="tooltip" data-placement="top" title="Linkedin">
                        <i class="fab fa-linkedin"></i>
                      </button>
                    </div>
                  </div>

              </div>
              <div class="modal-footer">
                
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>
    {{-- -------------- --}}
    <!-- Cart -->
    
    <div id="cart">
        
    </div>
@section('script')
    <script>
        
        $(document).ready(function () {       
            

            $("#cart").load("{{ route('viewCart') }}", "data", function (response, status, request) {
                this; // dom element
                $(document).on('click', '.delete_cart', function(){
                    var rowid = $(this).attr('rowid')
                    // alert(rowid)
                    $.ajax({
                        url: "{{ route('remove') }}?rowid="+rowid,
                        method:"GET",
                        success: function(data){
                            Swal.fire({
                            position: 'inherit',
                            icon: 'success',
                            title: 'Item dihapus dari keranjang',
                            showConfirmButton: false,
                            timer: 1500
                            })
                        }
                    })
                })
            });
        });
    </script>
@endsection