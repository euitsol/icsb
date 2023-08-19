@extends('backend.layouts.master', ['pageSlug' => 'bss'])

@section('title', 'Edit Bangladesh Secretarial Standards')
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
                    <h5 class="title">{{ _('Edit Bangladesh Secretarial Standards') }}</h5>
                </div>
                <form method="POST" action="{{ route('bss.bss_edit', $bss->id) }}" autocomplete="off" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <div class="form-group {{ $errors->has('title') ? ' has-danger' : '' }}">
                            <label>{{ _('Title') }}</label>
                            <input type="text" name="title" id="title" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="{{ _('Enter Title') }}" value="{{ $bss->title }}">
                            @include('alerts.feedback', ['field' => 'title'])
                        </div>
                        <div class="form-group {{ $errors->has('slug') ? ' has-danger' : '' }}">
                            <label>{{ _('Slug') }}</label>
                            <input type="text" class="form-control {{ $errors->has('slug') ? ' is-invalid' : '' }}" id="slug" name="slug" placeholder="{{ _('Enter Slug (must be use - on white speace)') }}" value="{{ $bss->slug }}">
                            @include('alerts.feedback', ['field' => 'slug'])
                        </div>
                        <div class="form-group {{ $errors->has('short_title') ? ' has-danger' : '' }}">
                            <label>{{ _('Short Title') }}</label>
                            <input type="text" name="short_title" class="form-control {{ $errors->has('short_title') ? ' is-invalid' : '' }}" placeholder="{{ _('short_Title') }}" value="{{ $bss->short_title }}">
                            @include('alerts.feedback', ['field' => 'short_title'])
                        </div>


                        <div class="form-group {{ $errors->has('image') ? ' has-danger' : '' }}">
                            <label>{{ _('Image') }}</label>

                            <input type="file" accept=".png" name="image" class="form-control image-upload  {{ $errors->has('image') ? ' is-invalid' : '' }}" data-existing-files="{{ storage_url($bss->image) }}">
                            <small>{{_('(image must be png and 50x50)')}}</small>
                            @include('alerts.feedback', ['field' => 'image'])
                       </div>
                       <div class="form-group {{ $errors->has('file.file_name') ? ' has-danger' : '' }} {{ $errors->has('file.file_path') ? ' has-danger' : '' }}">
                            <label>{{ _('File') }}</label>
                            <div class="input-group mb-3">
                                <input type="text" name="file[file_name]" class="form-control" placeholder="{{ _('Enter file name') }}" >
                                <input type="file" accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.odt,.ods,.odp" name="file[file_path]" class="form-control" >
                            </div>
                            @if(!empty(json_decode($bss->file)))
                                <a href="{{route('download',base64_encode(json_decode($bss->file)->file_path))}}" class="btn btn-info btn-sm">{{basename(json_decode($bss->file)->file_path)}}<i class="fa-regular fa-circle-down ml-2"></i></a>
                            @endif
                            @include('alerts.feedback', ['field' => 'file.file_name'])
                            @include('alerts.feedback', ['field' => 'file.file_path'])
                        </div>


                        <div class="form-group {{ $errors->has('description') ? ' has-danger' : '' }}">
                            <label>{{ _('Description(optional)') }} </label>
                            <textarea rows="3" name="description" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}">
                                {{ $bss->description }}
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
                        {{ _('Service') }}
                    </p>
                    <div class="card-description">
                        {{ _('The faq\'s manages user permissions by assigning different faqs to users. Each faq defines specific access levels and actions a user can perform. It helps ensure proper authorization and security in the system.') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js_link')
    <script>
        function generateSlug(str) {
            return str
                .toLowerCase()
                .replace(/\s+/g, "-")
                .replace(/[^\w-]+/g, "")
                .replace(/--+/g, "-")
                .replace(/^-+|-+$/g, "");
        }
    $(document).ready(function () {
        $("#title").on("keyup mouseleave blur focusout ", function () {
            const titleValue = $(this).val().trim();
            const slugValue = generateSlug(titleValue);
            $("#slug").val(slugValue);
        });
    });
    </script>
@endpush
