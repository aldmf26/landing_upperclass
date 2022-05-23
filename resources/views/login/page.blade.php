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

    .hilangkan {
        margin-bottom: 6%;
        height: 10%;
    }
    .aorder:hover {
        text-decoration: underline;
        color: rgb(125, 187, 245);
    }

</style>

<div class="bg0 m-t-30 p-b-90 topproduk" style="background-color: #ECE8E1;">
    <div class="container ">
        <div class="row m-b-100">
            <div class="col-xl-8 m-t-30">

                <h3 style="font-size:40px; color:#525050; font-family: Poppins-Medium; margin-bottom:20px;">My Account</h3>
                <button data-toggle="modal" data-target="#orderhistory" class="btn btn-primary mt-3 mb-2 buton" type="submit">Order History&nbsp &nbsp</button><br>
                <button data-toggle="modal" data-target="#alamat" class="btn btn-primary mt-3 mb-2 buton" type="submit">Details Account</button><br>
                <p class="mtext-101">Hai, {{ Auth::user()->name}}</p>
                <a href="{{ route('logout') }}" class="text-danger text-underline"><i class="fas fa-user"></i>   Log out</a>

            
            </div>
            <div class="col-xl-4 m-t-30">
                
            </div>
        </div>
    </div>
</div>


{{-- order history --}}
<div class="modal fade mt-5" id="orderhistory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog mt-5 modal-dialog-centered modal-lg" role="document">
      <div class="modal-content" >
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Order History</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <table class="table table-stripped" id="example2">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ORDER</th>
                        <th>DATE</th>
                        <th>PAYMENT STATUS</th>
                        <th>TOTAL</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $user = Auth::user()->name;
                        $db = DB::select("SELECT t.id_transaksi,t.shipping,t.voucher,t.tgl, o.id_harga, t.no_order, u.name, t.email, t.nohp, t.alamat, t.total as totTransaksi, t.status
                        FROM tb_transaksi as t
                        LEFT JOIN user_upperclass as u ON u.id = t.id_user
                        LEFT JOIN tb_order as o ON o.no_order = t.no_order
                        WHERE u.name = '$user'
                        GROUP BY o.no_order
                        ORDER BY t.id_transaksi DESC;");
                        // dd($db);
                        $no =1;
                    @endphp
                    @foreach ($db as $d)                                       
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td><a target="_blank" href="{{ route('orderHistory', ['no_order' => $d->no_order]) }}" class="aorder">{{ Str::substr($d->no_order,14) }}</a></td>
                        <td>{{date('d-m-Y', strtotime($d->tgl))}}</td>
                        <td>
                            @if ($d->status == 'PENDING')
                                <span class="badge badge-info">PENDING</span>
                            @elseif($d->status == 'DELIVERED')
                                <span class="badge badge-success">DELIVERED</span>
                            @elseif($d->status == 'FAILED')
                                <span class="badge badge-warning">FAILED</span>    
                            @endif
                        </td>
                        <td>{{ number_format($d->totTransaksi,0) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>

      </div>
    </div>
  </div>
<!-- alamat modal -->
<form action="{{ route('editUser') }}" method="post">
    @csrf
<div class="modal fade mt-5" id="alamat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog mt-5 modal-dialog-centered" role="document">
      <div class="modal-content" >
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Details Account</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <input type="hidden" name="id_user" value="{{Auth::user()->id}}">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="">First Name</label>
                    <input type="text" value="{{Auth::user()->first}}" name="first" class="form-control">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="">Last Name</label>
                        <input type="text" value="{{Auth::user()->last}}" name="last" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="">Phone Number</label>
                        <input type="text" value="{{Auth::user()->nohp}}" name="nohp" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="">Address</label>
                        <input type="text" value="{{Auth::user()->alamat}}" name="alamat" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="">Address 2</label>
                        <input type="text" value="{{Auth::user()->alamat2}}" name="alamat2" class="form-control">
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="">Provinsi</label>
                        <select class="form-control" name="provinsi" id="provinsi_id">                                 
                            @foreach ($provinsi as $province => $p)
                                <option {{$province == Auth::user()->provinsi ? 'selected' : ''}} value="{{ $province }}">{{ $p }}</option>
                            @endforeach
                            </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="">Kota</label>
                       <select class="form-control" name="kota" id="kota">                                                   
                               
                         <option value="{{ Auth::user()->kota }}">{{ $city[Auth::user()->kota] }}</option>                
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          
          <button type="submit" class="btn text-light" style="background-color: #89725C;">Edit / Save</button>
        </div>
      </div>
    </div>
  </div>
</form>
@endsection
@section('script')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    <?php if(Session::get('sukses')) { ?>
    Swal.fire({
        position: 'inherit',
        showConfirmButton: false,
        timer: 1500,
        icon: 'success',
        title: "{{ Session::get('sukses') }}"
    });
    <?php }elseif(Session::get('error')) { ?>
    Swal.fire({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        icon: 'error',
        title: "{{ Session::get('error') }}"
    });
    <?php } ?>
</script>
<script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
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
  
    });
</script>
    
@endsection