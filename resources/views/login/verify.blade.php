@extends('template.master')
@section('content')
<div class="bg0 m-t-30 p-b-90 topproduk" style="background-color: #ECE8E1;">
    <div class="container" >
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">
                        {{_('Verifiy Your Email Address')}}
                    </div>
                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success">
                                {{_('email verifikasi terkirim')}}
                            </div>
                        @endif

                        {{_('email Anda Belum diverifikasi')}}, <a href="" class="btn btn-link p-0 m-0 align-bassline text-wrap">kirim ulang kode verifikasi</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection