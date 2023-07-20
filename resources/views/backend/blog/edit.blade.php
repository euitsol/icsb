@extends('backend.layouts.master', ['pageSlug' => 'blog'])

@section('title', 'Edit Blog')
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
                    <h5 class="title">{{ _('Edit Blog') }}</h5>
                </div>
                <form method="POST" action="{{ route('blog.blog_edit', $blog->id) }}" autocomplete="off" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                            <label>{{ _('Title') }}</label>
                            <input type="text" name="title" id="title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="{{ _('Enter Title') }}" value="{{ $blog->title }}">
                            <input type="text" class="form-control" id="slug" value="{{$blog->slug}}" name="slug" hidden>
                            @include('alerts.feedback', ['field' => 'title'])
                        </div>

                        <div class="form-group {{ $errors->has('thumbnail_image') ? ' has-danger' : '' }}">
                            <label>{{ _('Thumbnail Image') }}</label>
                            <input type="file" accept="image/*" name="thumbnail_image" class="form-control {{ $errors->has('thumbnail_image') ? ' is-invalid' : '' }} image-upload" data-existing-files="{{ storage_url($blog->thumbnail_image) }}">
                            @include('alerts.feedback', ['field' => 'image'])
                       </div>
                       <div class="form-group {{ $errors->has('additional_images.*') ? 'is-invalid' : '' }} {{ $errors->has('additional_images') ? 'is-invalid' : '' }}">
                            <label>{{ _('Additional Images') }}</label>
                            <input type="file" accept="image/*" name="additional_images[]" class="form-control {{ $errors->has('additional_images.*') ? 'is-invalid' : '' }} {{ $errors->has('additional_images') ? 'is-invalid' : '' }} image-upload" multiple>
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
                        <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                            <label>{{ _('Description') }} </label>
                            <textarea rows="3" name="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}">
                                {{ $blog->description }}
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
                        Blog
                    </p>
                    <div class="card-description">
                        {{ _('The faq\'s manages user permissions by assigning different faqs to users. Each faq defines specific access levels and actions a user can perform. It helps ensure proper authorization and security in the system.') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
<script>
    $('#add_file').click(function() {
    result = '';
    count = $(this).data('count') + 1;
    $(this).data('count', count);

    result =`<div class="form-group" id="file-${count}">
                <label>File-${count}</label>
                <div class="input-group mb-3">
                    <input type="text" name="file[${count}][file_name]" class="form-control" placeholder="{{ _('Enter file name') }}" >
                    <input type="file" accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.odt,.ods,.odp" name="file[${count}][file_path]" class="form-control" >
                    <span class="input-group-text text-danger" onclick="delete_section(${count})"><i class="tim-icons icon-trash-simple"></i></span>
                </div>
            </div>`;
    $('#file').append(result);
});
function delete_section(count) {
    $('#file-' + count).remove();
};
</script>

<script>
     function generateSlug(str) {
            return str
                .toLowerCase()
                .replace(/\s+/g, '-')
                .replace(/[^\w-]+/g, '')
                .replace(/--+/g, '-')
                .replace(/^-+|-+$/g, '');
        }

        $('#title').on('keyup', function() {
            const titleValue = $(this).val().trim();
            const slugValue = generateSlug(titleValue);
            $('#slug').val(slugValue);
        });
</script>
@endpush
