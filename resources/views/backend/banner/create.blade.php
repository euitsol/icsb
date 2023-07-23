@extends('backend.layouts.master', ['pageSlug' => 'banner'])

@section('title', 'Banner')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ _('Add Banner') }}</h5>
                </div>
                <form method="POST" action="{{ route('banner.banner_create') }}" autocomplete="off"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group{{ $errors->has('banner_name') ? ' has-danger' : '' }}">
                            <label>{{ _('Banner Name') }}</label>
                            <input type="text" name="banner_name"
                                class="form-control{{ $errors->has('banner_name') ? ' is-invalid' : '' }}"
                                placeholder="{{ _('Banner banner name') }}" value="{{ old('banner_name') }}">
                            @include('alerts.feedback', ['field' => 'banner_name'])
                        </div>
                        <div class="form-check mb-3">
                            <label class="form-check-label">
                                <input class="form-check-input checkBox" type="checkbox">
                                <span class="form-check-sign">
                                    <span class="check">Set Banner Duration</span>
                                </span>
                            </label>
                        </div>
                        <div class="row banner_duration" style="display: none;">
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('from_time') ? ' has-danger' : '' }}">
                                    <label>{{ _('Banner Start Time') }}</label>
                                    <input type="datetime-local" name="from_time"
                                        class="form-control{{ $errors->has('from_time') ? ' is-invalid' : '' }}"
                                        value="{{ old('from_time') }}">
                                    @include('alerts.feedback', ['field' => 'from_time'])
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('to_time') ? ' has-danger' : '' }}">
                                    <label>{{ _('Banner End Time') }}</label>
                                    <input type="datetime-local" name="to_time"
                                        class="form-control{{ $errors->has('to_time') ? ' is-invalid' : '' }}"
                                        value="{{ old('to_time') }}">
                                    @include('alerts.feedback', ['field' => 'to_time'])
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-fill btn-primary">{{ _('Save') }}</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-user">
                <div class="card-body">
                    <p class="card-text">
                        {{ _('Banner') }}
                    </p>
                    <div class="card-description">
                        {{ _('The role\'s manages user permissions by assigning different roles to users. Each role defines specific access levels and actions a user can perform. It helps ensure proper authorization and security in the system.') }}
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
        checkbox.on('change', function() {
            if (checkbox.prop('checked')) {
                divElement.show();
            } else {
                divElement.hide();
            }
        });
    });
</script>
@endpush
