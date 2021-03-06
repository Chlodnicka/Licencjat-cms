@section('content')
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header title">{{ trans('app.owner-edit') }}</h1>
    </div>
  </div>
  <div class="action-buttons">
    <a href="{{ URL::route('dashboard') }}" class="btn btn-default btn-back"><i class="fa fa-long-arrow-left"></i>  {{ trans('common.back') }} </a>
  </div>
  <div class="edit owner">
    {{ Form::open(array('route' => array('owner.update', $owner->id), 'files'=>true)) }}
    <div class="form-cluster">
      <div class="form-group">
        {{ Form::label('firstname', Lang::get('common.firstname').'*')}}
        {{ Form::text('firstname', $owner->firstname, $attributes = array(
          'data-rule-required' => 'true',
          'data-msg-required' => Lang::get('common.your-name'),
        )) }}
        @if ($errors->has('firstname')) <p class="help-block">{{ $errors->first('firstname') }}</p> @endif
      </div>
      <div class="form-group">
        <?php $attachment = DB::table('attachments')->where('id', '=', $owner->attachment_id)->get();?>
        {{ Form::label('image', Lang::get('app.upload-img'))}}
        @foreach($attachment as $item)
          <p>{{ trans('common.attached-file') }}</p>
          {{ HTML::image($item->url) }}
        @endforeach
        <input name="image" type="file" id="image">
      </div>
      <div class="form-group">
        <input id="img-isset" type="checkbox" name="img-isset" checked="checked" value="1"><label for="img-isset"><span>{{ trans('common.img-isset') }}</span></label>
      </div>
      <div class="form-group">
        {{ Form::label('lastname',  Lang::get('common.lastname').'*')}}
        {{ Form::text('lastname', $owner->lastname, $attributes = array(
          'data-rule-required' => 'true',
          'data-msg-required' => Lang::get('common.your-lastname'),
        )) }}
        @if ($errors->has('lastname')) <p class="help-block">{{ $errors->first('lastname') }}</p> @endif
      </div>
      <div class="form-group">
        {{ Form::label('email',  Lang::get('common.email').'*')}}
        {{ Form::text('email', $owner->email, $attributes = array(
          'data-rule-required' => 'true',
          'data-msg-required' => Lang::get('common.your-email'),
          'data-rule-email' => 'true',
          'data-msg-email' => Lang::get('common.enter-proper-email')
        )) }}
        @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
      </div>
      <div class="form-group">
        {{ Form::label('phone',  Lang::get('common.phone'))}}
        {{ Form::text('phone', $owner->phone) }}
        @if ($errors->has('phone')) <p class="help-block">{{ $errors->first('phone') }}</p> @endif
      </div>
      <div class="form-group">
        {{ Form::label('university', Lang::get('common.university').'*')}}
        {{ Form::text('university', $owner->university) }}
        @if ($errors->has('university')) <p class="help-block">{{ $errors->first('university') }}</p> @endif
      </div>
      <div class="form-group">
        {{ Form::label('department',  Lang::get('common.department').'*')}}
        {{ Form::text('department', $owner->department) }}
        @if ($errors->has('department')) <p class="help-block">{{ $errors->first('department') }}</p> @endif
      </div>
      <div class="form-group">
        {{ Form::label('institute',  Lang::get('common.institute'))}}
        {{ Form::text('institute', $owner->institute) }}
        @if ($errors->has('institute')) <p class="help-block">{{ $errors->first('institute') }}</p> @endif
      </div>
      <div class="form-group">
        {{ Form::label('tutorshipHours',  Lang::get('common.tutorship-hours').'*')}}<!--trzzeba to jakoś inaczaj ogarnąć -->
        {{ Form::textarea('tutorshipHours', $owner->tutorshipHours) }}
        @if ($errors->has('tutorshipHours')) <p class="help-block">{{ $errors->first('tutorshipHours') }}</p> @endif
      </div>
      <div class="form-group">
        {{ Form::label('content',  Lang::get('common.description'))}}
        {{ Form::textarea('content', $owner->content, array('id'=>'editor')) }}
        @if ($errors->has('content')) <p class="help-block">{{ $errors->first('content') }}</p> @endif
      </div>

      {{ Form::label('position', Lang::get('common.position')) }}
      {{ Form::select('position', $positions, $owner->position) }}
        @if ($errors->has('position')) <p class="help-block">{{ $errors->first('position') }}</p> @endif
      {{ Form::submit( Lang::get('common.submit')) }}
    </div>
    {{ Form::close() }}
  </div>
  <script>
    jQuery.validator.setDefaults({
      debug: true,
      success: "valid"
    });

    $("form").each( function () {
      var that = $(this);
      $(this).validate({
        submitHandler: function(form) {
          var name = $(form).find('[name="name"]').val();
          var email = $(form).find('[name="email"]').val();
          var tel = $(form).find('[name="tel"]').val();
          //do other things for a valid form
          $.ajax({
            type: "POST",
            url: 'process_lead.php',
            data : { name: name, email: email, tel: tel },
            success: function (data) {
              $('.section-two-form').hide();
              $('.section-six-desc-text-form').hide();
              $('#form-messages').fadeIn();
              $('#form-messages2').fadeIn();
              saveToMailchimp(name,email,tel);
            },
            error: function () {
              $('#form-messages').find('p').text('WystÄpiĹ bĹÄd. SprĂłbuj jeszcze raz.');
              $('.form-contact-title').hide();
              $('.form-contact-subtitle').hide();
              $('.form-contact').css({'margin-top' : '0'});
              $('#form-messages').fadeIn();
            }
            //form.submit();
            //return false;
          });
        }
      });
    });
  </script>
@stop

