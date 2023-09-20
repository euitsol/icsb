@extends('backend.layouts.master', ['pageSlug' => 'testimonial'])

@section('title', 'Edit Testimonial')
@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ _('Edit Testimonial') }}</h5>
                </div>
                <form method="POST" action="{{ route('testimonial.testimonial_edit', $testimonial->id) }}" autocomplete="off" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <div class="form-group  {{ $errors->has('name') ? ' has-danger' : '' }}" >
                            <label>{{ _('Author Name') }}</label>
                            <input type="text" name="name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ _('Enter author name') }}" value="{{ $testimonial->name }}">
                            @include('alerts.feedback', ['field' => 'name'])
                        </div>
                        <div class="form-group  {{ $errors->has('designation') ? ' has-danger' : '' }}" >
                            <label>{{ _('Author Designation') }}</label>
                            <input type="text" name="designation" class="form-control {{ $errors->has('designation') ? ' is-invalid' : '' }}" placeholder="{{ _('Enter author designation') }}" value="{{ $testimonial->designation }}">
                            @include('alerts.feedback', ['field' => 'designation'])
                        </div>
                        <div class="form-group {{ $errors->has('order_key') ? ' has-danger' : '' }}">
                            <label>{{ _('Order') }}</label>
                            <select class="form-control {{ $errors->has('order_key') ? ' is-invalid' : '' }}" name="order_key">
                                @for ($x=1; $x<=100; $x++)
                                    @php
                                        $check = App\Models\Testimonial::where('order_key',$x)->first();
                                    @endphp
                                    @if($testimonial->order_key == $x)
                                        <option value="{{$x}}" selected>{{ $x }}</option>
                                    @elseif(!$check)
                                        <option value="{{$x}}">{{ $x }}</option>
                                    @endif
                                @endfor
                            </select>
                            @include('alerts.feedback', ['field' => 'order_key'])
                        </div>

                            <div class="form-group {{ $errors->has('image') ? ' has-danger' : '' }}">
                                <label >{{ _('Author Image') }}</label>
                                <input type="file" accept="image/*" name="image"
                                    class="form-control image-upload  {{ $errors->has('image') ? ' is-invalid' : '' }}" data-existing-files="{{ storage_url($testimonial->image) }}">
                            </div>
                            <div class="form-group {{ $errors->has('description') ? ' has-danger' : '' }}">
                                <label>{{ _('Description') }} </label>
                                <textarea rows="3" name="description" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}">
                                    {{ $testimonial->description }}
                                </textarea>
                                @include('alerts.feedback', ['field' => 'description'])
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
                        {{ _('Testimonial') }}
                    </p>
                    <div class="card-description">
                        {{ _('The faq\'s manages user permissions by assigning different faqs to users. Each faq defines specific access levels and actions a user can perform. It helps ensure proper authorization and security in the system.') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
