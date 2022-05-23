@extends('template.master')
@section('content')
<style>
	.rem:hover {
		color:rgb(246, 0, 0);
	}

</style>
    <!-- Shoping Cart -->
    <br><br>
	<form class="bg0 p-t-75 p-b-85" method="post" action="{{ route('aksiCart') }}">
		@csrf
		<div class="container">
			<div id="cart1"></div>
            <div id="cart2" class="text-center">
                <img src="https://c.tenor.com/wfEN4Vd_GYsAAAAC/loading.gif" width="100" alt="">
            </div>
		</div>
        
	</form>
@endsection
@section('script')
	<script>
		$(document).ready(function () {
            
			function load_cart(){
				$("#cart1").load("{{ route('infoCart') }}", "data", function (response, status, request) {
					this; // dom element
					$("#cart2").hide()
                   
				});
			}
			load_cart()
			$(document).on('click', '.plus_cart', function(event) {
                var rowid = $(this).attr("id");
                var qty = $(this).attr("qty");
               

                // alert(qty);
                $.ajax({
                    url: "{{ route('plus_cart') }}",
                    method: "GET",                  
                    data: {
                        rowid: rowid,
                        qty: qty
                    },
                    success: function(data) {                  
                        load_cart();                     
                    
                       
                    }
                });
            });
			$(document).on('click', '.min_cart', function(event) {
                var rowid = $(this).attr("id");
                var qty = $(this).attr("qty");

                // alert(qty);
                $.ajax({
                    url: "{{ route('min_cart') }}",
                    method: "GET",
                    data: {
                        rowid: rowid,
                        qty: qty
                    },
                    success: function(data) {
                        // $('#cart_session').html(data); 
                        load_cart();
                    }
                });
            });
			
		});
	</script>
@endsection