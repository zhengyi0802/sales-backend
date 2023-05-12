<!DOCTYPE html>
<html>
<head></head>
<title></title>
  <meta charset="UTF-8" ,="" name="viewport" content="width=device-width, initial-scale=1">
  <!--====== Required meta tags ======-->
  <meta charset="utf-8" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<style>
  body {
      background-color : burlywood;
  }
  div.content {
      width            : 100%;
  }
  div.block {
      border           : 1px solid blue;
      border-radius    : 10px;
      margin-top       : 4px;
      margin-bottom    : 4px;
      background-color : white;
  }
  p.title {
      margin-left : 10px;
  }
  p.result {
      margin-left : 30px;
  }
</style>

<body>
  <h2>紅陽金流回覆資料</h2>
  <div class="content">
     <div class="block">
       <p class="title"><strong>{{ __('suntechpayment.user_no') }} :</strong></p>
       <p class="result">{{ $str->user_no }}</p>
       <p class="title"><strong>{{ __('suntechpayment.td') }} :</strong></p>
       <p class="result">{{ $str->td }}</p>
       <p class="title"><strong>{{ __('suntechpayment.mn') }} :</strong></p>
       <p class="result">{{ $str->mn }}</p>
       <p class="title"><strong>{{ __('suntechpayment.note1') }} :</strong></p>
       <p class="result">{{ $str->note1 }}</p>
     </div>
     @if ($str->web == env('MERCHANTID_24PAYMENT'))
     <div class="block">
       <p class="title"><strong>{{ __('suntechpayment.barcode') }} :</strong></p>
       <p class="result">
         <img src="data:image/png;base64,{{ DNS1D::getBarcodePNG($str->barcode_a, 'C39') }}" style="width: 50%; height: 36px;">
       </p>
       <p class="result">{{ $str->barcode_a }}</p>
       <p class="result">
         <img src="data:image/png;base64,{{ DNS1D::getBarcodePNG($str->barcode_b, 'C39') }}" style="width: 90%; height: 36px;">
       </p>
       <p class="result">{{ $str->barcode_b }}</p>
       <p class="result">
         <img src="data:image/png;base64,{{ DNS1D::getBarcodePNG($str->barcode_c, 'C39') }}" style="width: 85%; height: 36px;">
       </p>
       <p class="result">{{ $str->barcode_c }}</p>
     </div>
     @endif
     @if ($str->web == env('MERCHANTID_ATM'))
     <div class="block">
       <p class="title"><strong>{{ __('suntechpayment.entity_atm') }} :</strong></p>
       <p class="result">{{ $str->entity_atm }}</p>
       <p class="title"><strong>{{ __('suntechpayment.bank_code') }} :</strong></p>
       <p class="result">{{ $str->bank_code }}</p>
       <p class="title"><strong>{{ __('suntechpayment.bank_name') }} :</strong></p>
       <p class="result">{{ $str->bank_name }}</p>
     </div>
     @endif
     @if ($str->web == env('MERCHANTID_PAYCODE'))
     <div class="block">
       <p class="title"><strong>{{ __('suntechpayment.pay_code') }} :</strong></p>
       <p class="result">{{ $str->pay_code }}</p>
       <p class="title"><strong>{{ __('suntechpayment.pay_type') }} :</strong></p>
       <p class="result">{{ $str->pay_type }}</p>
     </div>
     @endif
  </div>
</body>
</html>
