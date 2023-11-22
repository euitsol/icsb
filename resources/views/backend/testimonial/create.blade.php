@extends('backend.layouts.master', ['pageSlug' => 'testimonial'])

@section('title', 'Quotes')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ _('Add Quotes') }}</h5>
                </div>
                <form method="POST" action="{{ route('testimonial.testimonial_create') }}" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                            <div class="form-group {{ $errors->has('name') ? ' has-danger' : '' }}">
                                <label>{{ _('Author Name') }}</label>
                                <input type="text" name="name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ _('Enter author name') }}" value="{{ old('name') }}">
                                @include('alerts.feedback', ['field' => 'name'])
                            </div>
                            <div class="form-group {{ $errors->has('designation') ? ' has-danger' : '' }}">
                                <label>{{ _('Author Designation') }}</label>
                                <input type="text" name="designation" class="form-control {{ $errors->has('designation') ? ' is-invalid' : '' }}" placeholder="{{ _('Enter author designation') }}" value="{{ old('designation') }}">
                                @include('alerts.feedback', ['field' => 'designation'])
                            </div>
                            <div class="form-group {{ $errors->has('responsibility') ? ' has-danger' : '' }}">
                                <label>{{ _('Author Responsibility') }}</label>
                                <input type="text" name="responsibility" class="form-control {{ $errors->has('responsibility') ? ' is-invalid' : '' }}" placeholder="{{ _('Enter author responsibility') }}" value="{{ old('responsibility') }}">
                                @include('alerts.feedback', ['field' => 'responsibility'])
                            </div>
                            <div class="form-group {{ $errors->has('order_key') ? ' has-danger' : '' }}">
                                <label>{{ _('Order') }}</label>
                                <select class="form-control {{ $errors->has('order_key') ? ' is-invalid' : '' }}" name="order_key">
                                    <option value="" selected hidden>{{ _('Select Order') }}</option>
                                    @for ($x=1; $x<=1000; $x++)
                                        @php
                                            $check = App\Models\Testimonial::where('order_key',$x)->first();
                                        @endphp
                                        @if(!$check)
                                            <option value="{{$x}}">{{ $x }}</option>
                                        @endif
                                    @endfor
                                </select>
                                @include('alerts.feedback', ['field' => 'order_key'])
                            </div>
                            <div class="form-group  {{ $errors->has('image') ? ' has-danger' : '' }}">
                                <label>{{ _('Author Image') }}</label>
                                <input type="file" accept="image/*" name="image" class="form-control  {{ $errors->has('image') ? ' is-invalid' : '' }} image-upload">
                                @include('alerts.feedback', ['field' => 'image'])
                           </div>
                            <div class="form-group {{ $errors->has('description') ? ' has-danger' : '' }}">
                                <label>{{ _('Description') }} </label>
                                <textarea rows="3" name="description" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}">
                                    {{ old('description') }}
                                </textarea>
                                @include('alerts.feedback', ['field' => 'description'])
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
                        <b>{{ _('Quotes') }}</b>
                    </p>
                    <div class="card-description">
                        <p><b>Author Name:</b> This field is required. It is a text field with character limit of 255 characters.</p>
                        <p><b>Author Designation:</b> This field is required. It is a text field with character limit of 255 characters.</p>
                        <p><b>Author Responsibility:</b> This field is required. It is a text field with character limit of 255 characters.</p>
                        <p><b>Order:</b> This field is required and unique. It is a number field. It manages the order of the Quotes Author.</p>
                        <p><b>Author Image:</b> This field is required. It supports file uploads in jpeg, png, jpg, gif, & svg format, with a maximum size limit of 2MB. The dimensions of the image should be 185 x 220px.</p>
                        <p><b>Description:</b> This field is required. It is a textarea field</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
