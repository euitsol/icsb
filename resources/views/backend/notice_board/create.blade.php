@extends('backend.layouts.master', ['pageSlug' => 'notice_board'])

@section('title', 'Create Notice')
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
                    <h5 class="title">{{ _('Create Notice') }}</h5>
                </div>
                <form method="POST" action="{{ route('notice_board.notice_create') }}" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group {{ $errors->has('title') ? ' has-danger' : '' }}">
                            <label>{{ _('Notice Title') }}</label>
                            <input type="text" id='title' name="title" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="{{ _('Enter notice title') }}" value="{{ old('title') }}">
                            @include('alerts.feedback', ['field' => 'title'])
                        </div>
                        <div class="form-group {{ $errors->has('cat_id') ? ' has-danger' : '' }}">
                            <label>{{ _('Notice Category') }}</label>
                            <select name="cat_id" class="form-control {{ $errors->has('cat_id') ? ' is-invalid' : '' }}">
                                <option selected hidden>{{_('Select Notice Category')}}</option>
                                @foreach ($notice_cats as $cat)
                                    <option value="{{ $cat->id }}" @if( old('cat_id') == $cat->id) selected @endif> {{ $cat->title }}</option>
                                @endforeach
                            </select>
                            @include('alerts.feedback', ['field' => 'cat_id'])
                        </div>
                        <div class="form-group {{ $errors->has('slug') ? ' has-danger' : '' }}">
                            <label>{{ _('Slug') }}</label>
                            <input type="text" class="form-control {{ $errors->has('slug') ? ' is-invalid' : '' }}" id="slug" name="slug" placeholder="{{ _('Enter Slug (must be use - on white speace)') }}">
                            @include('alerts.feedback', ['field' => 'slug'])
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
                            <textarea rows="3" name="description" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}">
                                {{ old('description') }}
                            </textarea>
                            @include('alerts.feedback', ['field' => 'description'])
                        </div>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1">
                              <span class="form-check-sign"><strong>{{_('Notify All Members')}}</strong></span>
                            </label>
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
                        {{ _('Notice') }}
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


