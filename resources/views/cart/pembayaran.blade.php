@php
$ttl = 0;
$sub_total = 0;
foreach ($cart as $c):
    $ttl += $c->qty;
    $sub_total += $c->qty * $c->price;
endforeach;
@endphp
<div class="row">
    <div class="col-md-8 col-7">                
      <input type="text" name="voucher" id="voucher" placeholder="Discount Code" class="form-control">              
    </div>
    <div class="col-md-4 col-5">          
      <a class="btn btn-primary buton" id="cekVoucher" style="height: 2.5rem;">Apply</a>    
    </div>
</div>
  <hr>
  <div class="row">
    <div class="col-md-8">
      <p style="color:#74574C;">Sub total</p>
    </div>
    <div class="col-md-4">
      <input type="hidden" name="subTotal" id="subTotal" value="{{ $sub_total }}">
      <p class="float-end" style="color:#3a3a3a;">Rp {{ number_format($sub_total, 0) }}</p>
    </div>
    
  </div>
  <div class="row detailV" id="v">
    <div class="col-md-8">
        <p style="color:#70744c;">Voucher <img width="10%" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAABmJLR0QA/wD/AP+gvaeTAAAEDUlEQVRoge2XXWxURRTH/+fe/ShBioFo8NvaNmrLhyI2kDal22px0cVEWZSYQtHSIIREn4wmhkXro9EHI6EIaVIjUoS2VEqtJG7j1oJiGi3EwpYtiFEUEyAL2u7eO8cHRe323r2zH3Ebc3/JvMz8z/+ck72zMwPY2NjY2NjY5A7KdQFGrD/rKwXoTRZ8UkP0pZaC4JiZdso10HDGV0BAP4Cb/po6Qi74mm/u+tVIr/x3pVmzLuy9QQEO4Z/iAWAxx9DXeNp3u1HMlGlgc9ib73A6ehi422C5BA6E/vy0JjIlGtgc9rrHnI52AAvNNMy4DYwu8MTPPucNBDigjDkdrQCqrbQMTEucy3kDP5z9+h0AfglpjEipA4H/PZnTBhpHVwQIeF5CKph5zY47Og8nLuTsb3T96GMbGNgmp+YX3ys4+LbRimUDG09UXRed7eLWOb1XUyvRnIaIdyWDPgSgSsibdt7V/arZYtIG1o3UVoPoABg6g9e2FPV2pFqsoSeoG4DbSkvAjl1FnzQm05jugbrh2gIheI/QxXQhRD4L3l9/sjaQRs1/s2a4Zr4QvE8I4RZCwGIciJwb32jlafgLPDtcPkNT3F+AMTdxjUHN537UNwU9QS2V4teGqwtZIARgjqWY0ae4xSPJ7kDXmNRAgAPKyPBn7QCtSBLX46L4ql339EctiwFQN1J7I8djIQDFEvIhEdeWfjA/dFHGe1IDq4+XvwDQW9aB9BVzzLd73tGfk+n8xx6a6cgb6wOwQKKeiKpQxfsln/8koQVgsAdYaPOE0GA1dBF/UDAdeWpo8b1m5vWjVXmq60qnENoCaz/tF430ZakUb9gAdHpd0/XTutAhMe7Udb1/5eCiqkQbf5tfvXr5ym5N6EslfKIax717SwdGUikeMNnE/hOls/RxVzuASkmfGICG/QsHWwEADHpi8P5mAA0ysYoifB/d902vZK4JmJ4D3nCR23V52k4wnpH0YgK91rHo262PH5vbBNArEjGCmFd3lB1vk8wxieQnMYN8X5Y0AZAp5prlAMBL5KS8qavsu3flvQ0sZETLB4rrAdoOwJVJsgS2di85ldHBCKRwmfP2F1YL5n0EXJ9pUgDbeyoiG7Lgk9pt9OG+W4tBjoMAyxxIJgm5c+b575/cuwp6uh4T/VKk5vAts4WKDgIqUo1lIMhweoOeM5ZXBFnSeg94u4vcv7ujLQCeTiFsCMp4ZdBz6VI6Oc1I/0HDoMreWVuYsEVCHVGdannQc+F82vlMyPhFVn5oxnMM2gbAaSK5oAiuCD0aPZVpLiOy8qQs+3j6MgK3AchPWLqoKKgZWP7bYDbyGJG1N/ED7e5CUvkNYvYwKA+MT1WVXj7qGw9nK4eNjY2Njc3/jj8AuzXhYrmOV6EAAAAASUVORK5CYII="/></p>
      </div>
      <div class="col-md-4">
        <input type="hidden" id="jmlVoucher" name="voucher" value="">
        <p class="float-end jumlahVoucher" style="color:#3a3a3a;"></p>
      </div>
  </div>

  @php
        $etd = $cost[0]['costs'][1]['cost'][0]['etd'];
        $ship = $cost[0]['costs'][1]['cost'][0]['value'];                 
    @endphp
    <input type="hidden" name="shipping" value="{{ $ship }}">
  <div class="row">
    <div class="col-md-8">
      <p style="color:#74574C;">Shipping</p>
    </div>
    
    <div class="col-md-4">
      <input type="hidden" id="ship" name="shipping" value="{{ $ship }}">
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
          $tot = $sub_total;
    
      @endphp
      <input type="hidden" name="tot" value="{{$tot}}" id="total">
      <p class="float-end totalOrderan" style="font-size: 20px">Rp {{number_format($tot,0)}}</p>
    </div>
  </div> 