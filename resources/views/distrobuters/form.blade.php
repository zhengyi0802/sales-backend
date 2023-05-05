
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
</style>
<form action="{{ route('distrobuters.store') }}" method="POST" enctype="multipart/form-data">
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
                <p class="title"><strong>{{ __('distrobuters.line_id') }} : <span class="must">{{ __('tables.must') }}</span></strong></p>
                <p class="input"><input type="text" name="line_id" class="form-control"></p>
            </div>
            <div class="block">
                <p class="title"><strong>{{ __('distrobuters.email') }} : <span class="must">{{ __('tables.must') }}</span></strong></p>
                <p class="input"><input type="text" name="email" class="form-control"></p>
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
                <p class="input"><input type="text" name="address" class="form-control"></p>
            </div>
            <p align="center"><button class="submit" type="submit">{{ __('tables.submit') }}</button></p>
    </div>
</form>

