@php
$ttl = 0;
$sub_total = 0;
foreach ($cart as $c):
    $ttl += $c->qty;
    $sub_total += $c->qty * $c->price;
endforeach;
@endphp
<div class="row">
    <div class="col-md-8">                
      <input type="text" placeholder="Discount Code" class="form-control">              
    </div>
    <div class="col-md-4">          
      <button class="btn btn-primary buton" style="height: 2.5rem;">Apply</button>    
    </div>
  </div>
  <hr>
  <div class="row">
    <div class="col-md-8">
      <p style="color:#74574C;">Sub total</p>
    </div>
    <div class="col-md-4">
      <input type="hidden" name="subTotal" value="{{ $sub_total }}">
      <p class="float-end" style="color:#3a3a3a;">Rp {{ number_format($sub_total, 0) }}</p>
    </div>
  </div>
  <div class="row">
    <div class="col-md-8">
      <p style="color:#74574C;">Shipping</p>
    </div>
    @php
        $etd = $cost[0]['costs'][1]['cost'][0]['etd'];
        $ship = $cost[0]['costs'][1]['cost'][0]['value'];                 
    @endphp
    <div class="col-md-4">
      <input type="hidden" name="shipping" value="{{ $ship }}">
      <p class="float-end" style="color:#3a3a3a;"><span style="font-size: 11px">jne reguler </span> Rp {{number_format($ship,0)}} </p>
      
    </div>
  </div>
  <hr>
  <div class="row">
    <div class="col-md-8">
      <p>Total</p>
    </div>
    <div class="col-md-4">
      @php
          $tot = $sub_total + $ship;
    
      @endphp
      <input type="hidden" name="tot" value="{{ $tot }}">
      <p class="float-end" style="font-size: 20px">Rp {{ number_format($tot, 0) }}</p>
    </div>
  </div>