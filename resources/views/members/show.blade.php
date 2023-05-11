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
       <p class="title"><strong>{{ __('members.introducer') }} :</strong></p>
       <p class="result">{{ $member->introducer->name }}</p>
     </div>
     <div class="block">
       <p class="title"><strong>{{ __('members.name') }} :</strong></p>
       <p class="result">{{ $member->user->name }}</p>
     </div>
     <div class="block">
       <p class="title"><strong>{{ __('members.phone') }} :</strong></p>
       <p class="result">{{ $member->user->phone }}</p>
     </div>
     <div class="block">
       <p class="title"><strong>{{ __('members.line_id') }} :</strong></p>
       <p class="result">{{ $member->user->line_id }}</p>
     </div>
     <div class="block">
       <p class="title"><strong>{{ __('members.email') }} :</strong></p>
       <p class="result">{{ $member->user->email }}</p>
     </div>
     <div class="block">
       <p class="title"><strong>{{ __('members.address') }} :</strong></p>
       <p class="result">{{ $member->address }}</p>
     </div>
     <div class="block">
       <p class="title"><strong>{{ __('members.question_1') }} :</strong></p>
       <p class="result">{{ $member->questionnaire->q1 }}</p>
     </div>
     <div class="block">
       <p class="title"><strong>{{ __('members.question_2') }} :</strong></p>
       <p class="result">{{ $member->questionnaire->q2 ? __('tables.yes') : __('tables.no') }}</p>
     </div>
     <div class="block">
       <p class="title"><strong>{{ __('members.question_3') }} :</strong></p>
       <p class="result">{{ $member->questionnaire->q3 ? __('tables.yes') : __('tables.no') }}</p>
     </div>
     <div class="block">
       <p class="title"><strong>{{ __('members.question_4') }} :</strong></p>
       <p class="result">{{ $member->questionnaire->q4 }}</p>
     </div>
     <div class="block">
       <p class="title"><strong>{{ __('members.question_5') }} :</strong></p>
       <p class="result">{{ $member->questionnaire->q5 ? __('tables.yes') : __('tables.no') }}</p>
     </div>
     @include('members.orders')
  </div>
</body>
</html>
