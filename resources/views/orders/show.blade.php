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
  <h2>申領資料已送出</h2>
  <div class="content">
     <div class="block">
       <p class="title"><strong>{{ __('orders.id') }} :</strong></p>
       <p class="result">{{ $order->id }}</p>
     </div>
     <div class="block">
       <p class="title"><strong>{{ __('orders.name') }} :</strong></p>
       <p class="result">{{ $order->member->user->name }}</p>
     </div>
     <div class="block">
       <p class="title"><strong>{{ __('orders.phone') }} :</strong></p>
       <p class="result">{{ $order->phone }}</p>
     </div>
     <div class="block">
       <p class="title"><strong>{{ __('orders.email') }} :</strong></p>
       <p class="result">{{ $order->member->user->email }}</p>
     </div>
     <div class="block">
       <p class="title"><strong>{{ __('orders.address') }} :</strong></p>
       <p class="result">{{ $order->address }}</p>
     </div>
     <div class="block">
       <p class="title"><strong>{{ __('orders.model') }} :</strong></p>
       <p class="result">{{ trans_choice('orders.models', $order->model) }}</p>
     </div>
     <div class="block">
       <p class="title"><strong>{{ __('orders.flow_status') }} :</strong></p>
       <p class="result">{{ trans_choice('orders.flow_statuses', $order->flow_status) }}</p>
     </div>

  </div>
