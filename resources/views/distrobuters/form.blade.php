
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
<form id="distrobuter-form" action="{{ route('distrobuters.store') }}" method="POST" enctype="multipart/form-data">
     @csrf
     <input type="hidden" name="introducer" value="{{ $introducer }}">
     <div class="row">
            <div class="block">
                <p class="title"><strong>{{ __('distrobuters.name') }} : <span class="must">{{ __('tables.must') }}</span></strong></p>
                <p class="input"><input type="text" name="name" class="form-control"></p>
            </div>
            <div class="block">
                <p class="title"><strong>{{ __('distrobuters.phone') }} : <span class="must">{{ __('tables.must') }}</span></strong></p>
                <p class="input"><input type="text" name="phone" class="form-control"></p>
            </div>
            <div class="block">
                <p class="title"><strong>{{ __('distrobuters.line_id') }} : <span class="must">{{ __('tables.must') }}{{ __('tables.anonly') }}</span></strong></p>
                <p class="input"><input type="text" name="line_id" class="form-control"></p>
            </div>
            <div class="block">
                <p class="title"><strong>{{ __('distrobuters.email') }} : </strong></p>
                <p class="input"><input type="text" name="email" class="form-control" placeholder="user@email.com"></p>
            </div>
            <div class="block">
                <p class="title"><strong>{{ __('distrobuters.password') }} : <span class="must">{{ __('tables.password') }}</span></strong></p>
                <p class="input"><input type="password" name="password" class="form-control"></p>
            </div>
            <div class="block">
                <p class="title"><strong>{{ __('distrobuters.pidnumbers') }} : <span class="must">{{ __('tables.must') }}</span></strong></p>
                <p class="input"><input type="text" name="pid" class="form-control"></p>
            </div>
            <div class="block">
                <p class="title"><strong>{{ __('distrobuters.address') }} : <span class="must">{{ __('tables.must') }}</span></strong></p>
                <p class="input"><input type="text" name="address" class="form-control" style="width: 90%;"></p>
            </div>
            <p align="center"><button class="submit" type="submit">{{ __('tables.submit') }}</button></p>
    </div>
</form>

<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="https://sales.mdo.tw/js/jquery-validation/jquery.validate.min.js"></script>
<script>
    $(document).ready(function(){
        $('#distrobuter-form').validate({
           onkeyup: function(element, event) {
               var value = this.elementValue(element).replace(/^\s+/g, "");
               $(element).val(value);
           },
           rules: {
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
               password: {
                  required: true,
                  minlength: 8
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
               password: {
                  required: '密碼必須填寫',
                  minlength: '密碼設置至少8個字元'
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
