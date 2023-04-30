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
  <h2>分銷商申請資料已送出</h2>
  <div class="content">
     <div class="block">
       <p class="title"><strong>{{ __('distrobuters.reseller') }} :</strong></p>
       <p class="result">{{ $distrobuter->introducer->line_id }}</p>
     </div>
     <div class="block">
       <p class="title"><strong>{{ __('distrobuters.name') }} :</strong></p>
       <p class="result">{{ $distrobuter->user->name }}</p>
     </div>
     <div class="block">
       <p class="title"><strong>{{ __('distrobuters.phone') }} :</strong></p>
       <p class="result">{{ $distrobuter->user->phone }}</p>
     </div>
     <div class="block">
       <p class="title"><strong>{{ __('distrobuters.line_id') }} :</strong></p>
       <p class="result">{{ $distrobuter->user->line_id }}</p>
     </div>
     <div class="block">
       <p class="title"><strong>{{ __('distrobuters.pidnumbers') }} :</strong></p>
       <p class="result">{{ $distrobuter->pid }}</p>
     </div>
     <div class="block">
       <p class="title"><strong>{{ __('distrobuters.address') }} :</strong></p>
       <p class="result">{{ $distrobuter->address }}</p>
     </div>
  </div>
</body>
</html>
