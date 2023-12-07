@extends('backend.layouts.master', ['pageSlug' => 'notice_board'])

@section('title', 'Edit Notice')
@push('css')
<style>
    .form-group .form-control, .input-group .form-control {
    padding: 8px 0px 10px 18px;
    }
    .input-group .form-control:first-child, .input-group-btn:first-child>.dropdown-toggle, .input-group-btn:last-child>.btn:not(:last-child):not(.dropdown-toggle) {
        border-right: 1px solid rgba(29, 37, 59, 0.5);
    }
    .input-group .form-control:not(:first-child):not(:last-child), .input-group-btn:not(:first-child):not(:last-child) {
        border-radius: 0;
        border-right: 0;
    }

</style>
@endpush
@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ _('Edit Notice') }}</h5>
                </div>
                <form method="POST" action="{{ route('notice_board.notice_edit',$notice->id) }}" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group {{ $errors->has('title') ? ' has-danger' : '' }}">
                            <label>{{ _('Notice Title') }}</label>
                            <input type="text" id='title' name="title" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="{{ _('Enter notice title') }}" value="{{ $notice->title }}">
                            @include('alerts.feedback', ['field' => 'title'])
                        </div>
                        <div class="form-group {{ $errors->has('slug') ? ' has-danger' : '' }}">
                            <label>{{ _('Slug') }}</label>
                            <input type="text" class="form-control {{ $errors->has('slug') ? ' is-invalid' : '' }}" id="slug" name="slug" placeholder="{{ _('Enter Slug (must be use - on white speace)') }}" value="{{$notice->slug}}">
                            @include('alerts.feedback', ['field' => 'slug'])
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 {{ $errors->has('cat_id') ? ' has-danger' : '' }}">
                                <label>{{ _('Notice Category') }}</label>
                                <select name="cat_id" class="form-control {{ $errors->has('cat_id') ? ' is-invalid' : '' }}">
                                    @foreach ($notice_cats as $cat)
                                        <option value="{{ $cat->id }}" @if( $notice->cat_id == $cat->id) selected @endif> {{ $cat->title }}</option>
                                    @endforeach
                                </select>
                                @include('alerts.feedback', ['field' => 'cat_id'])
                            </div>
                            <div class="form-group col-md-6 {{ $errors->has('release_date') ? ' has-danger' : '' }}">
                                <label>{{ _('Release Date') }}</label>
                                <input type="datetime-local" name="release_date"
                                    class="form-control {{ $errors->has('release_date') ? ' is-invalid' : '' }}"
                                    value="{{ $notice->release_date }}">
                                @include('alerts.feedback', ['field' => 'release_date'])
                            </div>
                        </div>

                        @php
                            $count = 0;
                        @endphp
                        @if(isset($notice) && !empty(json_decode($notice->files)))
                            @foreach (json_decode($notice->files) as $key=>$file)
                            @php
                                $count++;
                            @endphp
                                <div class="form-group" @if($count) id="file-{{$count}}" @endif>
                                    <label>{{ _('File-'.$count) }}</label>
                                    <div class="input-group mb-3">
                                        <input type="text" name="file[{{$count}}][file_name]" class="form-control" value="{{$file->file_name}}" disabled>
                                        <input type="text" name="file[{{$count}}][file_path]" class="form-control" value="{{$file->file_path}}" disabled>
                                        <a href="{{route('notice_board.single_file.delete.notice_edit',['key'=>$key, 'id'=>$notice->id])}}">
                                            <span class="input-group-text text-danger h-100"><i class="tim-icons icon-trash-simple"></i></span>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                            <div class="form-group">
                                <label>{{ _('File-'.(count(json_decode($notice->files, true)))+1) }}</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="file[{{ count(json_decode($notice->files, true))+1 }}][file_name]" class="form-control" placeholder="{{ _('Enter file name') }}" >
                                    <input type="file" accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.odt,.ods,.odp" name="file[{{ count(json_decode($notice->files, true))+1 }}][file_path]" class="form-control" >
                                    <span class="input-group-text" id="add_file" data-count="{{ count(json_decode($notice->files, true))+1 }}"><i class="tim-icons icon-simple-add"></i></span>
                                </div>
                            </div>
                        @else
                            <div class="form-group">
                                <label>{{ _('File-1') }}</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="file[1][file_name]" class="form-control" placeholder="{{ _('Enter file name') }}" >
                                    <input type="file" accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.odt,.ods,.odp" name="file[1][file_path]" class="form-control" >
                                    <span class="input-group-text" id="add_file" data-count="1"><i class="tim-icons icon-simple-add"></i></span>
                                </div>
                            </div>
                        @endif
                        <div id="file">

                        </div>


                        <div class="form-group {{ $errors->has('description') ? ' has-danger' : '' }}">
                            <label>{{ _('Description') }} </label>
                            <textarea rows="3" name="description" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}">
                                {{ $notice->description }}
                            </textarea>
                            @include('alerts.feedback', ['field' => 'description'])
                        </div>

                        

                        {{---------------------
                            EMAIL NOTIFY 
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
                                    placeholder="{{ _('Email Subject') }}" value="{{ $notice->email_subject }}">
                                @include('alerts.feedback', ['field' => 'email_subject'])
                            </div>
                            <div class="form-group {{ $errors->has('email_body') ? ' has-danger' : '' }}">
                                <label>{{ _('Email Body') }} </label>
                                <textarea rows="3" name="email_body" class="form-control {{ $errors->has('email_body') ? ' is-invalid' : '' }}">
                                    {{ $notice->email_body }}
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
                                <textarea rows="3" name="sms_body" class="w-100 {{ $errors->has('sms_body') ? ' is-invalid' : '' }} ck-off">{{ $notice->sms_body }}</textarea>
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
                        <b>{{ _('Notice') }}</b>
                    </p>
                    <div class="card-description">
                        <p><b>Notice Title:</b> This field is required and unique. It is a text field with character limit of 255 characters.</p>
                        <p><b>Notice Category:</b> This field is required. This is an option field. It represents the Notice Category.</p>
                        <p><b>Slug:</b> This field is required and unique. It is an auto-generated field from the Notice Title. It represents the URL of the Notice.</p>
                        <p><b>File-* :</b> This field is nullable.  The name field should be the file name. It supports file uploads in jpg, png, pdf, doc, docx, xls, xlsx, ppt, pptx, odt, ods, odp format. By clicking on the '+' icon you can upload multiple files.</p>
                        <p><b>Description:</b> This field is nullable. It is a textarea field.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{asset('backend/js/multi_file_and_slug.js')}}"></script>
    <script>
        $(document).ready(function(){
            //================================//
            //      Notify EMAIL Js           //
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
            //      Notify SMS Js             //
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

