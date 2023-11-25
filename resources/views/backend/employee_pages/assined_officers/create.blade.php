@extends('backend.layouts.master', ['pageSlug' => 'assined_officer'])

@section('title', 'Assigned Officer')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ _('Add Assigned Officer') }}</h5>
                </div>
                <form method="POST" action="{{ route('assined_officer.assined_officer_create') }}" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                            <div class="row">
                                <div class="col-md-8 form-group {{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label>{{ _('Name') }}</label>
                                    <input type="text" name="name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ _('Enter Name') }}" value="{{ old('name') }}">
                                    @include('alerts.feedback', ['field' => 'name'])
                                </div>
                                <div class="col-md-4 form-group {{ $errors->has('order_key') ? ' has-danger' : '' }}">
                                    <label>{{ _('Order') }}</label>
                                    <select class="form-control {{ $errors->has('order_key') ? ' is-invalid' : '' }}" name="order_key">
                                        <option value="" selected hidden>{{ _('Select Order') }}</option>
                                        @for ($x=1; $x<=1000; $x++)
                                            @php
                                                $check = App\Models\AssinedOfficer::where('order_key',$x)->first();
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

                            <div class="form-group {{ $errors->has('image') ? ' has-danger' : '' }}">
                                <label>{{ _('Image') }}</label>
                                <input type="file" accept="image/*" name="image" class="form-control image-upload  {{ $errors->has('image') ? ' is-invalid' : '' }}">
                                @include('alerts.feedback', ['field' => 'image'])
                           </div>

                            <div class="form-group {{ $errors->has('designation') ? ' has-danger' : '' }}">
                                <label>{{ _('Designation') }}</label>
                                <input type="text" name="designation" class="form-control {{ $errors->has('designation') ? ' is-invalid' : '' }}" placeholder="{{ _('Enter Designation') }}" value="{{ old('designation') }}">
                                @include('alerts.feedback', ['field' => 'designation'])
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-group {{ $errors->has('phone') ? ' has-danger' : '' }}">
                                    <label>{{ _('Phone') }}</label>
                                    <input type="tel" name="phone" class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}" placeholder="{{ _('Enter Phone Number') }}" value="{{ old('phone') }}">
                                    @include('alerts.feedback', ['field' => 'phone'])
                                </div>
                                <div class="col-md-6 form-group {{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label>{{ _('Email') }}</label>
                                    <input type="text" name="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ _('Enter Email') }}" value="{{ old('email') }}">
                                    @include('alerts.feedback', ['field' => 'email'])
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
                        <b>{{ _('Assigned Officer') }}</b>
                    </p>
                    <div class="card-description">
                        <p><b>Name:</b> This field is required. It is a text field with character limit of 255 characters.</p>
                        <b>Order:</b> This field is required and unique. It is a number field. It manages the order of the Assigned Officers</p>
                        <b>Image:</b> This field is required. It supports file uploads in jpeg, png, jpg, gif, & svg format, with a maximum size limit of 2MB. The dimensions of the image should be 400 x 450px.</p>
                        <p><b>Designation:</b> This field is required. It is a text field with character limit of 255 characters. It represents the designation of the assigned officers</p>
                        <p><b>Phone:</b> This field is required & unique. It represents the contact number of the assigned officers</p>
                        <p><b>Email:</b> This field is required & unique. It is a email field with a maximum character limit of 255. The entered value must follow the standard email format (e.g., user@example.com) and represents the email of the assigned officers.</p>
                         
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
@endpush
