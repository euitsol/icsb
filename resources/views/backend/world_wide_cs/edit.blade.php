@extends('backend.layouts.master', ['pageSlug' => 'wwcs'])

@section('title', 'Edit World Wide CS')
@push('css')
<style>
    .ck-rounded-corners .ck.ck-editor__main>.ck-editor__editable, .ck.ck-editor__main>.ck-editor__editable.ck-rounded-corners:first-of-type {
        height: 10vh !important;
    }
</style>
@endpush

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ _('Edit World Wide CS') }}</h5>
                </div>
                <form method="POST" action="{{ route('wwcs.wwcs_edit', $wwcs->id) }}" autocomplete="off" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <div class="form-group  {{ $errors->has('title') ? ' has-danger' : '' }}" >
                            <label>{{ _('Title') }}</label>
                            <textarea rows="1" name="title" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}">
                                {{ $wwcs->title }}
                            </textarea>
                            @include('alerts.feedback', ['field' => 'title'])
                        </div>
                        <div class="form-group {{ $errors->has('order_key') ? ' has-danger' : '' }}">
                            <label>{{ _('Order') }}</label>
                            <select class="form-control {{ $errors->has('order_key') ? ' is-invalid' : '' }}" name="order_key">
                                @for ($x=1; $x<=1000; $x++)
                                    @php
                                        $check = App\Models\WWCS::where('order_key',$x)->first();
                                    @endphp
                                    @if($wwcs->order_key == $x)
                                        <option value="{{$x}}" selected>{{ $x }}</option>
                                    @elseif(!$check)
                                        <option value="{{$x}}">{{ $x }}</option>
                                    @endif
                                @endfor
                            </select>
                            @include('alerts.feedback', ['field' => 'order_key'])
                        </div>

                            <div class="form-group {{ $errors->has('logo') ? ' has-danger' : '' }}">
                                <label >{{ _('Logo') }}</label>
                                <input type="file" accept="image/*" name="logo"
                                    class="form-control image-upload  {{ $errors->has('logo') ? ' is-invalid' : '' }}" data-existing-files="{{ storage_url($wwcs->logo) }}">
                            </div>
                            <div class="form-group {{ $errors->has('url') ? ' has-danger' : '' }}">
                                <label>{{ _('URL') }}</label>
                                <input type="text" name="url" class="form-control {{ $errors->has('url') ? ' is-invalid' : '' }}" value="{{ $wwcs->url }}">
                                @include('alerts.feedback', ['field' => 'url'])
                            </div>
                            <div class="form-group {{ $errors->has('description') ? ' has-danger' : '' }}">
                                <label>{{ _('Description(optional)') }} </label>
                                <textarea rows="3" name="description" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}">
                                    {{ $wwcs->description }}
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
                        <b>{{ _(' World Wide CS') }}</b>
                    </p>
                    <div class="card-description">
                        <p><b>Title:</b> This field is required and unique. It is a text field with character limit of 255 characters.</p>
                        <p><b>Order:</b> This field is required and unique. It is a number field. It manages the order of the World Wide CS</p>
                        <p><b>Logo:</b> This field is nullable. It supports file uploads in jpeg, jpg, gif, & svg format, with a maximum size limit of 2MB. The dimensions of the image should be 240 x 130px and it should have a white background.</p>
                        <p><b>URL:</b> This field is required. It is a URL field.</p>
                        <p><b>Description(optional):</b> This field is nullable. It is a textarea field.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
@endpush
