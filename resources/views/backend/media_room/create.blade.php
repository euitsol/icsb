@extends('backend.layouts.master', ['pageSlug' => 'media_room'])

@section('title', 'Create Media Room')
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
                    <h5 class="title">{{ _('Create Media Room') }}</h5>
                </div>
                <form method="POST" action="{{ route('media_room.media_room_create') }}" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                            <div class="form-group {{ $errors->has('title') ? ' has-danger' : '' }}">
                                <label>{{ _('Title') }}</label>
                                <input type="text" name="title" id="title" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="{{ _('Enter Title') }}" value="{{ old('title') }}">
                                @include('alerts.feedback', ['field' => 'title'])
                            </div>

                            <div class="form-group {{ $errors->has('slug') ? ' has-danger' : '' }}">
                                <label>{{ _('Slug') }}</label>
                                <input type="text" class="form-control {{ $errors->has('slug') ? ' is-invalid' : '' }}" id="slug" name="slug" placeholder="{{ _('Enter Slug (must be use - on white speace)') }}">
                                @include('alerts.feedback', ['field' => 'slug'])
                            </div>
                            <div class="form-group {{ $errors->has('program_date') ? ' has-danger' : '' }}">
                                <label>{{ _('Program Date') }}</label>
                                <input type="date" class="form-control {{ $errors->has('program_date') ? ' is-invalid' : '' }}" name="program_date">
                                @include('alerts.feedback', ['field' => 'program_date'])
                            </div>
                            <div class="form-group {{ $errors->has('category_id') ? ' has-danger' : '' }}">
                                <label>{{ _('Category') }}</label>
                                <select name="category_id" class="form-control {{ $errors->has('category_id') ? ' is-invalid' : '' }}">
                                    <option selected hidden >{{_('Select Category')}}</option>
                                    @foreach ($media_room_cats as $cat)
                                        <option value="{{ $cat->id }}" @if( old('category_id') == $cat->id) selected @endif> {{ $cat->name }}</option>
                                    @endforeach
                                </select>
                                @include('alerts.feedback', ['field' => 'category_id'])
                            </div>

                            <div class="form-group  {{ $errors->has('thumbnail_image') ? ' has-danger' : '' }}">
                                <label>{{ _('Thumbnail Image') }}</label>
                                <input type="file" accept="image/*" name="thumbnail_image" class="form-control  {{ $errors->has('thumbnail_image') ? ' is-invalid' : '' }} image-upload">
                                @include('alerts.feedback', ['field' => 'thumbnail_image'])
                           </div>
                           <div class="form-group  {{ $errors->has('additional_images.*') ? 'is-invalid' : '' }}  {{ $errors->has('additional_images') ? 'is-invalid' : '' }}">
                                <label>{{ _('Additional Images') }}</label>
                                <input type="file" accept="image/*" name="additional_images[]" class="form-control  {{ $errors->has('additional_images.*') ? 'is-invalid' : '' }}  {{ $errors->has('additional_images') ? 'is-invalid' : '' }} image-upload" multiple>
                                @include('alerts.feedback', ['field' => 'additional_images'])
                                @include('alerts.feedback', ['field' => 'additional_images.*'])
                            </div>
                            <div class="form-group">
                                <label>{{ _('File-1') }}</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="file[1][file_name]" class="form-control" placeholder="{{ _('Enter file name') }}" >
                                    <input type="file" accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.odt,.ods,.odp" name="file[1][file_path]" class="form-control" >
                                    <span class="input-group-text" id="add_file" data-count="1"><i class="tim-icons icon-simple-add"></i></span>
                                </div>
                            </div>
                            <div id="file">

                            </div>
                            <div class="form-group {{ $errors->has('description') ? ' has-danger' : '' }}">
                                <label>{{ _('Description') }} </label>
                                <textarea rows="3" id="editor" name="description" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}">
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
                        {{ _('Media Room') }}
                    </p>
                    <div class="card-description">
                        {{ _('The role\'s manages user permissions by assigning different roles to users. Each role defines specific access levels and actions a user can perform. It helps ensure proper authorization and security in the system.') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js_link')
    <script src="{{asset('backend/js/multi_file_and_slug.js')}}"></script>
@endpush
