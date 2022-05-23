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
    
    .holder {
    position: absolute;
    margin: 10px;
    padding-left: 4px;
    color: #A3A3A3;
    cursor: auto;
    font-family: Arial, sans-serif;
    font-size: 11pt;
    z-index: 1;
    }

    .red{
        color: red;
    }

</style>
<div class="bg0 m-t-50 p-b-90 topproduk" style="background-color: #ECE8E1;">
    <div class="container" >
        <div class="row txt-center">
            <div class="col-xl-12 m-t-50 m-b-30">
                <h3 style="font-size:40px; color:#1C1A1A; font-family: Poppins-Medium; margin-bottom:50px;">Create account</h3>
                <form action="{{ route('aksiRegister') }}" method="post">
                    @csrf
                <div class="inputan">
                <center>
                    <div class="form-group">
                        <div class="col-lg-5">
                            <div class="holder">First name <span class="red">*</span></div>
                            <input type="text" name="first"  class="form-control inputan @error('first') is-invalid @enderror" value="{{ old('first') }}">
                            @error('first')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-5">
                            <div class="holder">Last name <span class="red">*</span></div>
                            <input type="text" required name="last" value="{{ old('last') }}" class="form-control inputan @error('last') is-invalid @enderror">
                            @error('last')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    {{-- <div class="form-group">
                        <div class="col-lg-5">
                            <input type="text" name="kecamatan" placeholder="Kecamatan" class="form-control inputan">
                        </div>
                    </div> --}}
              
                    <div class="form-group">
                        <div class="col-lg-5">
                            <select class="form-control inputan" name="provinsi" id="provinsi_id">
                            <option value="">Province</option>
                            
                            @foreach ($provinsi as $province => $p)
                                <option value="{{ $province }}">{{ $p }}</option>
                            @endforeach
                            </select>
                            {{-- <input type="text" required name="provinsi" placeholder="Province" class="form-control inputan"> --}}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-5">
                            <select name="kota" class="form-control inputan" id="kota">
                                <option value="">City</option>
                            </select>
                            {{-- <input type="text" required name="kota" placeholder="City (Kota/Kabupaten)" class="form-control inputan"> --}}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-5">
                            <div class="holder">Address <span class="red">*</span></div>
                            <input type="text" required name="alamat" value="{{ old('alamat') }}" class="form-control inputan @error('alamat') is-invalid @enderror">
                            @error('alamat')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-5">
                            <div class="holder">Address 2 (optional)</div>
                            <input type="text" name="alamat2" value="{{ old('alamat2') }}"  class="form-control inputan">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-5">
                            <div class="holder">Postal code (optional)</div>
                            <input type="text" name="kodepos"  class="form-control inputan">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-5">
                            <div class="holder">Phone Number Example : 62896575757 <span class="red">*</span></div>
                            <input type="text" value="{{ old('nohp') }}" required name="nohp" class="form-control inputan @error('nohp') is-invalid @enderror">                  
                            @error('nohp')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-5">
                            <div class="holder">Email <span class="red">*</span></div>
                            <input type="email" value="{{ old('email') }}" required name="email"  class="form-control inputan @error('email') is-invalid @enderror">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-5">
                            <div class="holder">Password <span class="red">*</span></div>
                            <input type="password" value="{{ old('password') }}" required name="password" class="form-control inputan @error('password') is-invalid @enderror">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                </center>
                <div class="form-group m-t-70">
                </div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                <button class="btn btn-primary mt-5 buton" type="submit">Create</button><br>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $(document).on('change', '#provinsi_id', function(){
                let provinsiId = $(this).val()
               
                $.ajax({
                        url : "{{route('getKota')}}?id_provinsi="+provinsiId,
                        type : 'GET',                      
                        success: function(data) {                 
                            $('#kota').html(data);
                        }
                    })
            })


            $(function() {
                $(".holder + input").keyup(function() {
                    if($(this).val().length) {
                        $(this).prev('.holder').hide();
                    } else {
                        $(this).prev('.holder').show();
                    }
                });
                $(".holder").click(function() {
                    $(this).next().focus();
                });
            });
        });
    </script>
@endsection