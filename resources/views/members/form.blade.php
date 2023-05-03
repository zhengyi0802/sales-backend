
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
<form action="{{ route('members.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="introducer" value="{{ $introducer }}">
     <div class="row">
            <div class="block">
                <p class="title"><strong>{{ __('members.question_1') }} : <span class="must">{{ __('tables.must') }}</span></strong></p>
                <p class="input"><input type="text" name="q1" class="form-control"></p>
            </div>
            <div class="block">
                <p class="title"><strong>{{ __('members.question_2') }} : <span class="must">{{ __('tables.must') }}</span></strong></p>
                <p class="input"><input type="radio" name="q2" value="1">{{ __('tables.yes') }}</p>
                <p class="input"><input type="radio" name="q2" value="1">{{ __('tables.no') }}</p>
            </div>
            <div class="block">
                <p class="title"><strong>{{ __('members.question_3') }} : <span class="must">{{ __('tables.must') }}</span></strong></p>
                <p class="input"><input type="radio" name="q3" value="1">{{ __('tables.yes') }}</p>
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
                <p class="input"><input type="radio" name="q5" value="1">{{ __('tables.yes') }}</p>
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
                <p class="title"><strong>{{ __('members.address') }} : <span class="must">{{ __('tables.must') }}</span></strong></p>
                <p class="input"><input type="text" name="address" class="form-control" style="width: 95%;"></p>
            </div>
            <div class="block">
                <p class="title"><strong>{{ __('members.model') }} : <span class="must">{{ __('tables.must') }}</span></strong></p>
                <p class="input"><input type="radio" name="model" value="1" class="form-control">{{ __('members.model_75') }}</p>
                <p class="input"><input type="radio" name="model" value="2" class="form-control">{{ __('members.model_65') }}</p>
            </div>
            <p align="center"><button class="submit" type="submit">{{ __('tables.submit') }}</button></p>
    </div>
</form>

