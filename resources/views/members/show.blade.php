    <div class="row">
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('members.introducer') }} :</strong>
                {{ $member->introducer->name }}
            </div>
         </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('members.name') }} :</strong>
                {{ $member->user->name }}
            </div>
         </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('members.phone') }} :</strong>
                {{ $member->user->phone }}
            </div>
         </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('members.line_id') }} :</strong>
                {{ $member->user->line_id }}
            </div>
         </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('members.address') }} :</strong>
                {{ $member->address }}
            </div>
         </div>

         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('members.question_1') }} :</strong>
                {{ $member->questionnaire->q1 }}
            </div>
         </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('members.question_2') }} :</strong>
                {{ $member->questionnaire->q2 ? __('tables.yes') : __('tables.no') }}
            </div>
         </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('members.question_3') }} :</strong>
                {{ $member->questionnaire->q3 ? __('tables.yes') : __('tables.no') }}
            </div>
         </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('members.question_4') }} :</strong>
                {{ $member->questionnaire->q4 }}
            </div>
         </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('members.question_5') }} :</strong>
                {{ $member->questionnaire->q5 ? __('tables.yes') : __('tables.no') }}
            </div>
         </div>
     </div>
