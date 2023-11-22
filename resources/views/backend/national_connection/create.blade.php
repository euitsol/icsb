@extends('backend.layouts.master', ['pageSlug' => 'national_connection'])

@section('title', 'National Connection')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ _('Add National Connection') }}</h5>
                </div>
                <form method="POST" action="{{ route('national_connection.national_connection_create') }}" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                            <div class="row">
                                <div class="col-md-8 form-group {{ $errors->has('title') ? ' has-danger' : '' }}">
                                    <label>{{ _('Title') }}</label>
                                    <input type="text" name="title" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="{{ _('Enter Title') }}" value="{{ old('title') }}">
                                    @include('alerts.feedback', ['field' => 'title'])
                                </div>
                                <div class="col-md-4 form-group {{ $errors->has('order_key') ? ' has-danger' : '' }}">
                                    <label>{{ _('Order') }}</label>
                                    <select class="form-control {{ $errors->has('order_key') ? ' is-invalid' : '' }}" name="order_key">
                                        <option value="" selected hidden>{{ _('Select Order') }}</option>
                                        @for ($x=1; $x<=1000; $x++)
                                            @php
                                                $check = App\Models\NationalConnection::where('order_key',$x)->first();
                                            @endphp
                                            @if(!$check)
                                                <option value="{{$x}}">{{ $x }}</option>
                                            @endif
                                        @endfor
                                    </select>
                                    @include('alerts.feedback', ['field' => 'order_key'])
                                </div>
                            </div>

                            {{-- Logo --}}

                            <div class="form-group {{ $errors->has('logo') ? ' has-danger' : '' }}">
                                <label>{{ _('Logo') }}</label>
                                <input type="file" accept="image/*" name="logo" class="form-control image-upload  {{ $errors->has('logo') ? ' is-invalid' : '' }}">
                                @include('alerts.feedback', ['field' => 'logo'])
                           </div>

                            <div class="form-group {{ $errors->has('url') ? ' has-danger' : '' }}">
                                <label>{{ _('URL') }}</label>
                                <input type="url" name="url" class="form-control {{ $errors->has('url') ? ' is-invalid' : '' }}" placeholder="{{ _('Enter URL') }}" value="{{ old('url') }}">
                                @include('alerts.feedback', ['field' => 'url'])
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
                        <b>{{ _('National Connection') }}</b>
                    </p>
                    <div class="card-description">
                        <p><b>Title:</b> This field is required and unique. It is a text field with character limit of 255 characters.</p>
                        <p><b>Order:</b> This field is required. It is a number field. It manages the order of the National Connection</p>
                        <p><b>Logo:</b> This field is required. It supports file uploads in jpeg, jpg, gif, & svg format, with a maximum size limit of 2MB. The dimensions of the image should be 126 x 126px and it should have a white background.</p>
                        <p><b>URL:</b> It is a URL field.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
@endpush
