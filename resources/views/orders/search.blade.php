
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
<form action="{{ route('orders.index') }}" method="GET">
     @csrf
     <div class="row">
            <div class="block">
                <p class="title"><strong>{{ __('orders.line_id') }} :</p>
                <p class="input"><input type="text" name="line_id" class="form-control"></p>
            </div>
            <p align="center"><button class="submit" type="submit">{{ __('tables.submit') }}</button></p>
    </div>
</form>

