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
                        <div class="form-group {{ $errors->has('title') ? ' has-danger' : '' }}">
                            <label>{{ _('Title') }}</label>
                            <input type="text" name="title" id="title" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="{{ _('Enter Title') }}" value="{{ $blog->title }}">
                            @include('alerts.feedback', ['field' => 'title'])
                        </div>

                        <div class="form-group {{ $errors->has('slug') ? ' has-danger' : '' }}">
                            <label>{{ _('Slug') }}</label>
                            <input type="text" class="form-control {{ $errors->has('slug') ? ' is-invalid' : '' }}" id="slug" name="slug" placeholder="{{ _('Enter Slug (must be use - on white speace)') }}" value="{{ $blog->slug }}">
                            @include('alerts.feedback', ['field' => 'slug'])
                        </div>

                        <div class="form-group  {{ $errors->has('thumbnail_image') ? ' has-danger' : '' }}">
                            <label>{{ _('Thumbnail Image') }}</label>
                            <input type="file" accept="image/*" name="thumbnail_image" class="form-control  {{ $errors->has('thumbnail_image') ? ' is-invalid' : '' }} image-upload" data-existing-files="{{ storage_url($blog->thumbnail_image) }}">
                            @include('alerts.feedback', ['field' => 'image'])
                       </div>
                       <div class="form-group  {{ $errors->has('additional_images.*') ? 'is-invalid' : '' }}  {{ $errors->has('additional_images') ? 'is-invalid' : '' }}">
                            <label>{{ _('Additional Images') }}</label>
                            <input type="file" accept="image/*" name="additional_images[]" class="form-control  {{ $errors->has('additional_images.*') ? 'is-invalid' : '' }}  {{ $errors->has('additional_images') ? 'is-invalid' : '' }} image-upload" multiple>
                            @include('alerts.feedback', ['field' => 'additional_images'])
                            @include('alerts.feedback', ['field' => 'additional_images.*'])
                        </div>
                        @php
                            $count = 0;
                        @endphp
                        @if(isset($blog) && !empty(json_decode($blog->files)))
                            @foreach (json_decode($blog->files) as $key=>$file)
                            @php
                                $count++;
                            @endphp
                                <div class="form-group" @if($count) id="file-{{$count}}" @endif>
                                    <label>{{ _('File-'.$count) }}</label>
                                    <div class="input-group mb-3">
                                        <input type="text" name="file[{{$count}}][file_name]" class="form-control" value="{{$file->file_name}}" disabled>
                                        <input type="text" name="file[{{$count}}][file_path]" class="form-control" value="{{$file->file_path}}" disabled>
                                        <a href="{{route('blog.single_file.delete.blog_edit',['key'=>$key, 'id'=>$blog->id])}}">
                                            <span class="input-group-text text-danger h-100"><i class="tim-icons icon-trash-simple"></i></span>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                            <div class="form-group">
                                <label>{{ _('File-'.(count(json_decode($blog->files, true)))+1) }}</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="file[{{ count(json_decode($blog->files, true))+1 }}][file_name]" class="form-control" placeholder="{{ _('Enter file name') }}" >
                                    <input type="file" accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.odt,.ods,.odp" name="file[{{ count(json_decode($blog->files, true))+1 }}][file_path]" class="form-control" >
                                    <span class="input-group-text" id="add_file" data-count="{{ count(json_decode($blog->files, true))+1 }}"><i class="tim-icons icon-simple-add"></i></span>
                                </div>
                            </div>
                        @else
                            <div class="form-group">
                                <label>{{ _('File-1') }}</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="file[1][file_name]" class="form-control" placeholder="{{ _('Enter file name') }}" >
                                    <input type="file" accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.odt,.ods,.odp" name="file[1][file_path]" class="form-control" >
                                    <span class="input-group-text" id="add_file" data-count="1"><i class="tim-icons icon-simple-add"></i></span>
                                </div>
                            </div>
                        @endif
                        <div id="file">

                        </div>
                        <div class="form-group {{ $errors->has('description') ? ' has-danger' : '' }}">
                            <label>{{ _('Description') }} </label>
                            <textarea rows="3" name="description" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}">
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
                        {{ _('Blog') }}
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
<script src="{{ asset('backend/js/blog.js') }}"></script>
@endpush
