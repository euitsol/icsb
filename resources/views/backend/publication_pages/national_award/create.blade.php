@extends('backend.layouts.master', ['pageSlug' => 'national_award'])

@section('title', 'Add National Award')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ _('Add National Award') }}</h5>
                </div>
                <form method="POST" action="{{ route('national_award.national_award_create') }}" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                            <div class="form-group {{ $errors->has('title') ? ' has-danger' : '' }}">
                                <label>{{ _('Title') }}</label>
                                <input type="text" name="title" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="{{ _('Enter Title') }}" value="{{ old('title') }}">
                                @include('alerts.feedback', ['field' => 'title'])
                            </div>

                            <div class="form-group  {{ $errors->has('image') ? ' has-danger' : '' }}">
                                <label>{{ _('Image') }}</label>
                                <input type="file" accept="image/*" name="image" class="form-control  {{ $errors->has('image') ? ' is-invalid' : '' }} image-upload">
                                @include('alerts.feedback', ['field' => 'image'])
                           </div>
                            <div class="form-group  {{ $errors->has('file') ? ' has-danger' : '' }}">
                                <label>{{ _('File') }}</label>
                                <input type="file" accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.odt,.ods,.odp" name="file" class="form-control  {{ $errors->has('file') ? ' is-invalid' : '' }}">
                                @include('alerts.feedback', ['field' => 'file'])
                           </div>
                            <div class="form-group {{ $errors->has('description') ? ' has-danger' : '' }}">
                                <label>{{ _('Description(optional)') }} </label>
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
                        <b>{{ _('National Award') }}</b>
                    </p>
                    <div class="card-description">
                        <p><b>Title:</b> This field is required and unique. It is a text field with character limit of 255 characters.</p>
                        <p><b>Image:</b> This field is required. It supports file uploads in jpeg, png, jpg, gif, & svg format, with a maximum size limit of 2MB. The dimensions of the image should be 350 x 450px.</p>
                        <p><b>File:</b> This field is nullable. It supports file uploads in pdf, doc, docx, xls, xlsx, ppt, pptx, odt, ods, and odp format.</p>
                        <p><b>Description(optional):</b> This field is nullable. It is a textarea field.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
@endpush
