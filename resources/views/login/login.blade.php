@extends('template.master')
@section('content')
<style>
    .forgot:hover {
        text-decoration: underline;
    }
    .daftar:hover {
        text-decoration: underline;
    }
    .inputan {
        height: 2.8rem;
    }
    .buton {
        height: 3.5rem;
        padding-right: 40px;
        padding-left: 40px;
        background-color: #89725C;
        border: #89725C;
    }
    .buton:hover {
        background-color: #cbaa8d;
        border: 1px solid #89725C;     
    }
    .butong:hover {
        background-color: #cbaa8d;
        border: 1px solid #89725C;
    }

</style>
<div class="bg0 m-t-30 p-b-90 topproduk" style="background-color: #ECE8E1;">
    <div class="container" >
        <div class="row txt-center">
            <div class="col-xl-12 m-t-30">
                <h3 style="font-size:40px; color:#1C1A1A; font-family: Poppins-Medium; margin-bottom:50px;">Login</h3>
                <?php if($pesan = Session::get('error')){ ?>
                    <h3 style="font-size:20px; color:#1C1A1A; font-family: Poppins-Medium; margin-bottom:20px;"><i class="fa-solid fa-circle-exclamation text-danger"></i> Please adjust the following:</h3>
                    <h3 style="font-size:20px; text-decoration:underline; color:#ff0000; font-family: Sans-Serif; margin-bottom:50px;"><em>{{ $pesan }}</em></h3>
                <?php }else{ ?>
                <?php } ?>

                <form action="{{ route('aksiLogin') }}" method="post">
                    @csrf
                    <div class="inputan">
                    <center>
                        <div class="form-group">
                            <div class="col-lg-5">
                                <input type="email" name="email" placeholder="Email" class="form-control inputan">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-5">
                                <input type="password" name="password" placeholder="Password" class="form-control inputan">
                            </div>
                        </div>
                    </div>
                    </center>
                    <div class="form-group m-t-70">
                        {{-- <label><a href="" style="color: #89725C; white-space:nowrap;" class="forgot"> Forgot your password?</a></label> --}}
                        
                    </div>
                    <button class="btn btn-primary mt-3 mb-2 buton" type="submit">Sign in</button><br>
                </form>
                <label><a href="{{ route('register') }}" style="color: #89725C; white-space:nowrap;" class="txt-center daftar"> Create account</a></label>
                <hr>
                {{-- <a class="btn btn-dark butong" href="{{route('goggleRedirect')}}" role="button" style="text-transform:none;">
                    <img width="20px" style="margin-bottom:3px; margin-right:5px;" alt="Google sign-in" src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/512px-Google_%22G%22_Logo.svg.png" />
                        Login with Google
                </a> --}}

            </div>
        </div>
    </div>
</div>
@endsection