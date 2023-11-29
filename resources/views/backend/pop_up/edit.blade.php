@extends('backend.layouts.master', ['pageSlug' => 'pop_up'])

@section('title', 'Edit Pop Up')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ _('Edit Pop Up') }}</h5>
                </div>
                <form method="POST" action="{{ route('pop_up.pop_up_edit', $pop_up->id) }}" autocomplete="off" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                            <div class="form-group {{ $errors->has('image') ? ' has-danger' : '' }}">
                                <label class="form-label">{{__('Image')}}</label>
                                <input type="file" accept="image/*" name="image"
                                    class="form-control image-upload  {{ $errors->has('image') ? ' is-invalid' : '' }}" value="{{ $pop_up->image }}" data-existing-files="{{ storage_url($pop_up->image) }}" data-delete-url="">
                                @include('alerts.feedback', ['field' => 'image'])
                            </div>
                            <div class="row">
                                <div class=" col-md-6 form-group {{ $errors->has('order_key') ? ' has-danger' : '' }}">
                                    <label>{{ _('Order') }}</label>
                                    <select class="form-control {{ $errors->has('order_key') ? ' is-invalid' : '' }}" name="order_key">
                                        @for ($x=1; $x<=1000; $x++)
                                            @php
                                                $check = App\Models\NationalConnection::where('order_key',$x)->first();
                                            @endphp
                                            @if($pop_up->order_key == $x)
                                                <option value="{{$x}}" selected>{{ $x }}</option>
                                            @elseif(!$check)
                                                <option value="{{$x}}">{{ $x }}</option>
                                            @endif
                                        @endfor
                                    </select>
                                    @include('alerts.feedback', ['field' => 'order_key'])
                                </div>
                                <div class="col-md-6 form-group {{ $errors->has('url') ? ' has-danger' : '' }}">
                                    <label>{{ _('URL') }}</label>
                                    <input type="text" name="url" class="form-control {{ $errors->has('url') ? ' is-invalid' : '' }}" value="{{ $pop_up->url }}" placeholder="{{ _('Enter URL') }}">
                                    @include('alerts.feedback', ['field' => 'url'])
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
                        <b>{{ _('Pop Up') }}</b>
                    </p>
                    <div class="card-description">
                        <p><b>Image:</b> This field is nullable. It supports file uploads in jpeg, jpg, gif, & svg format, with a maximum size limit of 2MB. The dimensions of the image should be 1200 x 800px and it should have a white background.</p>
                        <p><b>Order:</b> This field is required. It is a number field. It manages the order of the Pop Up</p>
                        <p><b>URL:</b> This field is nullable. It is a URL field.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
@endpush
