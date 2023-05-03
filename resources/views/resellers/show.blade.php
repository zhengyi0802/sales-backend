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
  <h2>經銷商申請資料已送出</h2>
  <div class="content">
     <div class="block">
       <p class="title"><strong>{{ __('resellers.introducer_id') }} :</strong></p>
       <p class="result">{{ $reseller->introducer->name }}</p>
     </div>
     <div class="block">
       <p class="title"><strong>{{ __('resellers.name') }} :</strong></p>
       <p class="result">{{ $reseller->user->name }}</p>
     </div>
     <div class="block">
       <p class="title"><strong>{{ __('resellers.phone') }} :</strong></p>
       <p class="result">{{ $reseller->user->phone }}</p>
     </div>
     <div class="block">
       <p class="title"><strong>{{ __('resellers.line_id') }} :</strong></p>
       <p class="result">{{ $reseller->user->line_id }}</p>
     </div>
     <div class="block">
       <p class="title"><strong>{{ __('resellers.email') }} :</strong></p>
       <p class="result">{{ $reseller->user->email }}</p>
     </div>
     <div class="block">
       <p class="title"><strong>{{ __('resellers.pidnumbers') }} :</strong></p>
       <p class="result">{{ $reseller->pid }}</p>
     </div>
     <div class="block">
       <p class="title"><strong>{{ __('resellers.address') }} :</strong></p>
       <p class="result">{{ $reseller->address }}</p>
     </div>
  </div>
</body>
</html>
