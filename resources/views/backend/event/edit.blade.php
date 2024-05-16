@extends('backend.layouts.master', ['pageSlug' => 'event'])

@section('title', 'Edit Upcomming Event')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ _('Edit Upcomming Event') }}</h5>
                </div>
                <form method="POST" action="{{ route('event.event_edit', $event->id) }}" autocomplete="off" enctype="multipart/form-data" class="eventForm">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <div class="form-group {{ $errors->has('title') ? ' has-danger' : '' }}">
                            <label>{{ _('Event Title') }}</label>
                            <input type="text" name="title"
                                class="form-control title {{ $errors->has('title') ? ' is-invalid' : '' }}"
                                value="{{ $event->title }}">
                            @include('alerts.feedback', ['field' => 'title'])
                        </div>
                        <div class="form-group {{ $errors->has('slug') ? ' has-danger' : '' }}">
                            <label>{{ _('Slug') }}</label>
                            <input type="text" class="form-control {{ $errors->has('slug') ? ' is-invalid' : '' }}" id="slug" name="slug" placeholder="{{ _('Enter Slug') }}" value="{{ $event->slug }}">
                            @include('alerts.feedback', ['field' => 'slug'])
                        </div>

                        <div class="form-group {{ $errors->has('total_participant') ? ' has-danger' : '' }}">
                            <label>{{ _('Total Perticipant') }}</label>
                            <input type="number" name="total_participant"
                                class="form-control {{ $errors->has('total_participant') ? ' is-invalid' : '' }}"
                                value="{{ $event->total_participant }}">
                            @include('alerts.feedback', ['field' => 'total_participant'])
                        </div>

                        {{-- image --}}

                        <div class="form-group  {{ $errors->has('image.*') ? 'is-invalid' : '' }}  {{ $errors->has('image') ? 'is-invalid' : '' }}">
                            @php
                                $data = json_decode($event->image, true);
                                if(!empty($data)){
                                    $result = '';
                                    $itemCount = count($data);
                                    foreach ($data as $index => $url) {
                                        $result .= route('json_image.single.delete', ['Event', $event->id,$index,'image' ]);
                                        if($index === $itemCount - 1) {
                                            $result .= '';
                                        }else{
                                            $result .= ', ';
                                        }
                                    }
                                }
                            @endphp
                            <label>{{ _('Event Images') }}</label>
                            <input type="file" accept="image/*" name="image[]" class="form-control  {{ $errors->has('image.*') ? 'is-invalid' : '' }}  {{ $errors->has('image') ? 'is-invalid' : '' }} image-upload" multiple
                            @if(isset($data))
                                data-existing-files="{{ storage_url($data) }}"
                                data-delete-url="{{ $result }}"
                            @endif
                            >

                            @include('alerts.feedback', ['field' => 'image'])
                            @include('alerts.feedback', ['field' => 'image.*'])
                        </div>

                        <div class="form-group {{ $errors->has('video_url') ? ' has-danger' : '' }}">
                            <label>{{ _('Event Video(Youtube URL)') }}</label>
                            <input type="url" name="video_url"
                                class="form-control {{ $errors->has('video_url') ? ' is-invalid' : '' }}"
                                value="{{ $event->video_url }}">
                            @include('alerts.feedback', ['field' => 'video_url'])
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('event_start_time') ? ' has-danger' : '' }}">
                                    <label>{{ _('Event Start Time') }}</label>
                                    <input type="datetime-local" name="event_start_time"
                                        class="form-control {{ $errors->has('event_start_time') ? ' is-invalid' : '' }}"
                                        value="{{ $event->event_start_time }}">
                                    @include('alerts.feedback', ['field' => 'event_start_time'])
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('event_end_time') ? ' has-danger' : '' }}">
                                    <label>{{ _('Event End Time') }}</label>
                                    <input type="datetime-local" name="event_end_time"
                                        class="form-control {{ $errors->has('event_end_time') ? ' is-invalid' : '' }}"
                                        value="{{ $event->event_end_time }}">
                                    @include('alerts.feedback', ['field' => 'event_end_time'])
                                </div>
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('event_location') ? ' has-danger' : '' }}">
                            <label>{{ _('Event Location') }}</label>
                            <input type="text" name="event_location"
                                class="form-control {{ $errors->has('event_location') ? ' is-invalid' : '' }}"
                                 value="{{ $event->event_location }}">
                            @include('alerts.feedback', ['field' => 'event_location'])
                        </div>
                        <div class="form-group  {{ $errors->has('type') ? ' has-danger' : '' }}">
                            <label>{{ _('Event Type') }}</label>
                            <select name="type" class="form-control  {{ $errors->has('type') ? ' is-invalid' : '' }}">
                                <option value="1" @if($event->type == "1") selected @endif>Online</option>
                                <option value="0" @if($event->type == "0") selected @endif>Offline</option>
                            </select>
                            @include('alerts.feedback', ['field' => 'type'])
                        </div>
                        <div class="form-group {{ $errors->has('description') ? ' has-danger' : '' }}">
                            <label>{{ _('Description') }} </label>
                            <textarea rows="3" name="description" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}">
                                {{ $event->description }}
                            </textarea>
                            @include('alerts.feedback', ['field' => 'description'])
                        </div>


                        {{---------------------
                            Email NOTIFY 
                        ---------------------}}

                        <div class="form-check form-check-inline">
                            <label class="form-check-label mr-2">
                              <input class="form-check-input" type="checkbox" id="notify" name="notify" value="1" {{ old('notify') ? 'checked' : '' }}>
                              <span class="form-check-sign"><strong>{{_('Notify All Members')}}</strong></span>
                            </label>
                            <label class="form-check-label mr-2">
                                <input class="form-check-input" type="checkbox" id="test_notify" name="test_notify" value="1" {{ old('test_notify') ? 'checked' : '' }}>
                                <span class="form-check-sign"><strong>{{_('Test Mail')}}</strong></span>
                            </label>
                        </div>
                        <div id="email-details" class="mt-2" style="display: none;">
                            <div class="form-group {{ $errors->has('test_mail') ? ' has-danger' : '' }} testMail" style="display: none;">
                                <label>{{ _('Test Mail') }}</label>
                                <input type="email" name="test_mail"
                                    class="form-control {{ $errors->has('test_mail') ? ' is-invalid' : '' }}"
                                    placeholder="{{ _('Enter your email') }}" value="{{ old('test_mail') }}">
                                @include('alerts.feedback', ['field' => 'test_mail'])
                            </div>
                            <div class="form-group {{ $errors->has('email_subject') ? ' has-danger' : '' }}">
                                <label>{{ _('Email Subject') }}</label>
                                <input type="text" name="email_subject"
                                    class="form-control {{ $errors->has('email_subject') ? ' is-invalid' : '' }}"
                                    placeholder="{{ _('Email Subject') }}" value="{{ $event->email_subject }}">
                                @include('alerts.feedback', ['field' => 'email_subject'])
                            </div>
                            <div class="form-group {{ $errors->has('email_body') ? ' has-danger' : '' }}">
                                <label>{{ _('Email Body') }} </label>
                                <textarea rows="3" name="email_body" class="form-control {{ $errors->has('email_body') ? ' is-invalid' : '' }}">
                                    {{ $event->email_body }}
                                </textarea>
                                @include('alerts.feedback', ['field' => 'email_body'])
                            </div>
                        </div>


                        {{---------------------
                            SMS NOTIFY 
                        ---------------------}}
                        <div class="form-check form-check-inline col-md-12">
                            <label class="form-check-label mr-2">
                              <input class="form-check-input" type="checkbox" id="notify_sms" name="notify_sms" value="1" {{ old('notify_sms') ? 'checked' : '' }}>
                              <span class="form-check-sign"><strong>{{_('Notify All Members By SMS')}}</strong></span>
                            </label>
                            <label class="form-check-label mr-2">
                                <input class="form-check-input" type="checkbox" id="test_notify_sms" name="test_notify_sms" value="1" {{ old('test_notify_sms') ? 'checked' : '' }}>
                                <span class="form-check-sign"><strong>{{_('Test SMS')}}</strong></span>
                            </label>
                        </div>

                        <div id="sms-details" class="mt-2" style="display: none;">
                            <div class="form-group {{ $errors->has('phone') ? ' has-danger' : '' }} testPhone" style="display: none;">
                                <label>{{ _('Phone Number') }}</label>
                                <input type="tel" name="phone"
                                    class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                    placeholder="{{ _('Enter your email') }}" value="{{ old('phone') }}">
                                @include('alerts.feedback', ['field' => 'phone'])
                            </div>
                            <div class="form-group {{ $errors->has('sms_body') ? ' has-danger' : '' }}">
                                <label>{{ _('SMS Body') }} </label>
                                <textarea rows="3" name="sms_body" class="w-100 {{ $errors->has('sms_body') ? ' is-invalid' : '' }} ck-off">{{ $event->sms_body }}</textarea>
                                <small>Please use '\n' for new line. All sms should be in Bangla.</small>
                                @include('alerts.feedback', ['field' => 'sms_body'])
                            </div>
                        </div>


                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-fill btn-primary">{{ _('Update') }}</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-user">
                <div class="card-body">
                    <p class="card-text">
                        <b>{{ _('Upcoming Event') }}</b>
                    </p>
                    <div class="card-description">
                        <p><b>Event Title:</b> This field is required and unique. It is a text field with character limit of 255 characters.</p>
                        <p><b>Slug:</b> This field is required and unique. It is an auto-generated field from the Title. It represents the URL of the Event.</p>
                        <p><b>Total Perticipant:</b> This field is nullable. It is a number field.</p>
                        <p><b>Event Images:</b> This field is nullable. It supports file uploads in jpeg, png, jpg, gif, & svg format, with a maximum size limit of 5MB. The dimensions of the image should be 1200 x 800px. You can select multiple images by pressing the 'SHIFT/CTRL' key.</p>
                        <p><b>Event Video(Youtube URL):</b> This field is nullable. It is a URL field. Please ensure that you enter a valid URL for either a YouTube or Vimeo video.</p>
                        <p><b>Event Start Time:</b> This field is required. It is a datetime field.</p>
                        <p><b>Event End Time:</b> This field is nullable. It is a datetime field.</p>
                        <p><b>Event Location:</b> This field is required. It is a text field with character limit of 255 characters.</p>
                        <p><b>Event Type:</b> This field is required. It is a option field. It represents the event type</p>
                        <p><b>Description:</b> This field is required. It is a textarea field</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
<script>
    function generateSlug(str) {
        return str
            .toLowerCase()
            .replace(/\s+/g, "-")
            .replace(/[^\w-]+/g, "")
            .replace(/--+/g, "-")
            .replace(/^-+|-+$/g, "");
    }
$(document).ready(function () {
    $(".title").on("keyup mouseleave blur focusout ", function () {
        const titleValue = $(this).val().trim();
        const slugValue = generateSlug(titleValue);
        $("#slug").val(slugValue);
    });

    //================================//
    //      Notify Email Js           //
    //================================//
    var checkbox = $('#notify');
    var testCheckbox = $('#test_notify');
    var targetDiv = $('#email-details');
    var testMail = $('.testMail')

    if (checkbox.is(':checked')) {
        testCheckbox.prop('checked', false);
        testMail.hide();
        targetDiv.show();
        
    }else if(testCheckbox.is(':checked')){
        checkbox.prop('checked', false);
        testMail.show();
        targetDiv.show();
    }
     else {
        testMail.hide();
        targetDiv.hide();
    }
    checkbox.on('change', function() {
        if (checkbox.is(':checked')) {
            testCheckbox.prop('checked', false);
            testMail.hide();
            targetDiv.show();
        } else {
            targetDiv.hide();
        }
    });
    testCheckbox.on('change', function() {
        if (testCheckbox.is(':checked')) {
            checkbox.prop('checked', false);
            testMail.show();
            targetDiv.show();
        } else {
            testMail.hide();
            targetDiv.hide();
        }
    });
    if (checkbox.is(':checked')) {
        $('.eventForm').submit(function(event) {
            event.preventDefault();
            $.ajax({
                url: "/run-queue",
                type: "GET",
                success: function (data) {},
                error: function (xhr, status, error) {
                    console.log();("Error: " + xhr.responseText);
                },
            });
            $('.eventForm').off('submit').submit();
        });
    }


    //================================//
    //      Notify SMS Js           //
    //================================//
    var smsCheckbox = $('#notify_sms');
    var testSmsCheckbox = $('#test_notify_sms');
    var targetSmsDiv = $('#sms-details');
    var testPhone = $('.testPhone')

    if (smsCheckbox.is(':checked')) {
        testSmsCheckbox.prop('checked', false);
        testPhone.hide();
        targetSmsDiv.show();
        
    }else if(testSmsCheckbox.is(':checked')){
        smsCheckbox.prop('checked', false);
        testPhone.show();
        targetSmsDiv.show();
    }
     else {
        testPhone.hide();
        targetSmsDiv.hide();
    }
    smsCheckbox.on('change', function() {
        if (smsCheckbox.is(':checked')) {
            testSmsCheckbox.prop('checked', false);
            testPhone.hide();
            targetSmsDiv.show();
        } else {
            targetSmsDiv.hide();
        }
    });
    testSmsCheckbox.on('change', function() {
        if (testSmsCheckbox.is(':checked')) {
            smsCheckbox.prop('checked', false);
            testPhone.show();
            targetSmsDiv.show();
        } else {
            testPhone.hide();
            targetSmsDiv.hide();
        }
    });
});
</script>
@endpush
