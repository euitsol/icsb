@extends('backend.layouts.master', ['pageSlug' => 'banner'])

@section('title', 'Edit Banner')
@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ _('Edit Banner') }}</h5>
                </div>
                <form method="POST" action="{{ route('banner.banner_edit',$banner->id) }}" autocomplete="off"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group{{ $errors->has('banner_name') ? ' has-danger' : '' }}">
                            <label>{{ _('Banner Name') }}</label>
                            <input type="text" name="banner_name"
                                class="form-control{{ $errors->has('banner_name') ? ' is-invalid' : '' }}"
                                placeholder="{{ _('Enter banner name') }}" value="{{ $banner->banner_name }}">
                            @include('alerts.feedback', ['field' => 'banner_name'])
                        </div>
                        <div class="form-check mb-3">
                            <label class="form-check-label">
                                <input class="form-check-input checkBox" type="checkbox" @if(!empty($banner->from_time) && !empty($banner->from_time)) checked @endif>
                                <span class="form-check-sign">
                                    <span class="check">Set Banner Duration</span>
                                </span>
                            </label>
                        </div>
                        <div class="banner_duration" style="@if(!empty($banner->from_time) && !empty($banner->from_time)) display:block; @else display:none; @endif">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('from_time') ? ' has-danger' : '' }}">
                                        <label>{{ _('Banner Start Time') }}</label>
                                        <input type="datetime-local" name="from_time"
                                            class="form-control {{ $errors->has('from_time') ? ' is-invalid' : '' }} start_time"
                                            value="{{ $banner->from_time }}">
                                        @include('alerts.feedback', ['field' => 'from_time'])
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('to_time') ? ' has-danger' : '' }}">
                                        <label>{{ _('Banner End Time') }}</label>
                                        <input type="datetime-local" name="to_time"
                                            class="form-control {{ $errors->has('to_time') ? ' is-invalid' : '' }} end_time"
                                            value="{{ $banner->to_time }}">
                                        @include('alerts.feedback', ['field' => 'to_time'])
                                    </div>
                                </div>
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
                        <b>{{ _('Banner') }}</b>
                    </p>
                    <div class="card-description">
                        <p><b>Banner Name:</b> This field is required and unique. It is a text field with character limit of 255 characters </p>

                        <p><b>Set Banner Duration:</b> This is a checkbox. This is a checkbox. It represents whether to enable Bannar Start Time and Banner End Time or not.</p>

                        <p><b>Banner Start Time:</b> This field is nullable. It is a datetime field.</p>

                        <p><b>Banner End Time:</b> This field is nullable. It is a datetime field.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
<script>
    $(document).ready(function() {
            var checkbox = $('.checkBox');
            var divElement = $('.banner_duration');
            checkbox.on('load reset change', function() {
                if (checkbox.prop('checked')) {
                    divElement.show();
                } else {
                    divElement.hide();
                    $('.start_time').val('');
                    $('.end_time').val('');
                }
            });
        });
    </script>
@endpush
