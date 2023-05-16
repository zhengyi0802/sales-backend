
<style>
  p.input {
      margin-left : 20px;
  }
  p.title {
      margin-left : 10px;
  }
  div.block {
      border           : 1px solid blue;
      border-radius    : 10px;
      margin-top       : 4px;
      margin-bottom    : 4px;
      background-color : white;
  }
  button.submit {
      background-color : #4CAF50; /* Green */
      border           : none;
      color            : white;
      padding          : 15px 32px;
      text-align       : center;
      text-decoration  : none;
      display          : inline-block;
      font-size        : 16px;
  }
  span.must {
      color      : red;
      font-size  : 12px;
  }
  .error {
     color       : red;
     margin-left : 10px;
     font-size   : 12px;
  }
  label.error {
     display     : inline;
  }
</style>
<form id="member-form" action="{{ route('members.store') }}" method="POST">
    @csrf
    <input type="hidden" name="introducer" value="{{ $introducer }}">
     <div class="row">
            <div class="block">
                <p class="title"><strong>{{ __('members.question_1') }} : <span class="must">{{ __('tables.must') }}</span></strong></p>
                <p class="input"><input type="text" name="q1" class="form-control"></p>
            </div>
            <div class="block">
                <p class="title"><strong>{{ __('members.question_2') }} : <span class="must">{{ __('tables.must') }}</span></strong></p>
                <p class="input"><input type="radio" name="q2" value="1" checked>{{ __('tables.yes') }}</p>
                <p class="input"><input type="radio" name="q2" value="1">{{ __('tables.no') }}</p>
            </div>
            <div class="block">
                <p class="title"><strong>{{ __('members.question_3') }} : <span class="must">{{ __('tables.must') }}</span></strong></p>
                <p class="input"><input type="radio" name="q3" value="1" checked>{{ __('tables.yes') }}</p>
                <p class="input"><input type="radio" name="q3" value="1">{{ __('tables.no') }}</p>
            </div>
            <div class="block">
                <p class="title"><strong>{{ __('members.question_4') }} : </strong></p>
                <p class="input"><input type="checkbox" name="q4[]" value="{{ trans_choice('members.answer_4', '1') }}">
                   <label for="{{ trans_choice('members.answer_4', '1') }}">{{ trans_choice('members.answer_4', '1') }}</label></p>
                <p class="input"><input type="checkbox" name="q4[]" value="{{ trans_choice('members.answer_4', '2') }}">
                   <label for="{{ trans_choice('members.answer_4', '2') }}">{{ trans_choice('members.answer_4', '2') }}</label></p>
                <p class="input"><input type="checkbox" name="q4[]" value="{{ trans_choice('members.answer_4', '3') }}">
                   <label for="{{ trans_choice('members.answer_4', '3') }}">{{ trans_choice('members.answer_4', '3') }}</label></p>
                <p class="input"><input type="checkbox" name="q4[]" value="{{ trans_choice('members.answer_4', '4') }}">
                   <label for="{{ trans_choice('members.answer_4', '4') }}">{{ trans_choice('members.answer_4', '4') }}</label></p>
                <p class="input"><input type="checkbox" name="q4[]" value="{{ trans_choice('members.answer_4', '5') }}">
                   <label for="{{ trans_choice('members.answer_4', '5') }}">{{ trans_choice('members.answer_4', '5') }}</label></p>
            </div>
            <div class="block">
                <p class="title"><strong>{{ __('members.question_5') }} : <span class="must">{{ __('tables.must') }}</span></strong></p>
                <p class="input"><input type="radio" name="q5" value="1" checked>{{ __('tables.yes') }}</p>
                <p class="input"><input type="radio" name="q5" value="1">{{ __('tables.no') }}</p>
            </div>
            <div>
                <p class="title"><strong>{{ __('members.order_title') }}</strong></p>
            </div>
            <div class="block">
                <p class="title"><strong>{{ __('members.name') }} : <span class="must">{{ __('tables.must') }}</span></strong></p>
                <p class="input"><input type="text" name="name" class="form-control"></p>
            </div>
            <div class="block">
                <p class="title"><strong>{{ __('members.line_id') }} : <span class="must">{{ __('tables.must') }}</span></strong></p>
                <p class="input"><input type="text" name="line_id" class="form-control"></p>
            </div>
            <div class="block">
                <p class="title"><strong>{{ __('members.phone') }} : <span class="must">{{ __('tables.must') }}</span></strong></p>
                <p class="input"><input type="text" name="phone" class="form-control"></p>
            </div>
            <div class="block">
                <p class="title"><strong>{{ __('members.email') }} : <span class="must">{{ __('tables.must') }}</span></strong></p>
                <p class="input"><input type="text" name="email" class="form-control" placeholder="user@email.com"></p>
            </div>
            <div class="block">
                <p class="title"><strong>{{ __('members.address') }} : <span class="must">{{ __('tables.must') }}</span></strong></p>
                <p class="input"><input type="text" name="address" class="form-control" style="width: 95%;"></p>
            </div>
            <div class="block">
                <p class="title"><strong>{{ __('members.model') }} : <span class="must">{{ __('tables.must') }}</span></strong></p>
                <p class="input"><input type="radio" name="model" value="2" class="form-control">{{ __('members.model_65') }}</p>
                <p class="input"><input type="radio" name="model" value="1" class="form-control" checked>{{ __('members.model_75') }}</p>
            </div>
            <div class="block">
                <p class="title"><strong>{{ __('members.introducer') }} : <span class="must">{{ __('tables.must') }}</span></strong></p>
                <p class="input"><input type="text" name="introducer" class="form-control" style="width: 95%;" value="{{ $introducer }}"></p>
            </div>
            <p align="center"><button class="submit" type="submit">{{ __('tables.submit') }}</button></p>
    </div>
</form>

<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="https://sales.mdo.tw/js/jquery-validation/jquery.validate.min.js"></script>
<script>
    $(document).ready(function(){
        $('#member-form').validate({
           onkeyup: function(element, event) {
               var value = this.elementValue(element).replace(/^\s+/g, "");
               $(element).val(value);
           },
           rules: {
               q1: {
                  required: true
               },
               name: {
                  required: true
               },
               phone: {
                  required: true,
                  minlength: 10,
                  maxlength: 10
               },
               line_id: {
                  required: true
               },
               email: {
                  required: true,
                  email: true
               },
               address: {
                  required: true,
                  minlength: 10
               },
               pid: {
                  required: true,
                  minlength: 10
               },
           },
           messages: {
               q1: {
                  required: '不能空白'
               },
               name: {
                  required: '姓名必填'
               },
               phone: {
                  required: '電話必填',
                  minlength: '電話號碼長度錯誤(10位數字)',
                  maxlength: '電話號碼長度錯誤(10位數字)'
               },
               line_id: {
                  required: 'Line ID必填'
               },
               email: {
                  required: '電子信箱必須填寫',
                  email: '電子信箱格式錯誤'
               },
               address: {
                  required: '地址必須填寫',
                  minlength: '地址填寫錯誤'
               },
               pid: {
                  required: '身份證字號必填',
                  minlength: '身份證字號長度錯誤'
               },
           },
           submitHandler: function(form) {
                form.submit();
           }
        });
    });
</script>
