
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
      padding          : 5px 5px;
      text-align       : center;
      text-decoration  : none;
      display          : inline-block;
      font-size        : 14px;
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
                <span class="title"><strong>{{ __('orders.line_id') }} :</span>
                <span class="input"><input type="text" name="line_id" class="form-control"></span>
                <span ><button class="submit" type="submit">{{ __('tables.submit') }}</button></span>
                <a href="https://lin.ee/on0rOe1">
                  <img src="../button4.jpg" width="10%">
                </a>
            </div>
    </div>
</form>

