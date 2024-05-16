@extends('backend.layouts.master', ['pageSlug' => 'media_room'])

@section('title', 'Edit Media Room')
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
                    <h5 class="title">{{ _('Edit Media Room') }}</h5>
                </div>
                <form method="POST" action="{{ route('media_room.media_room_edit', $media_room->id) }}" autocomplete="off" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <div class="form-group {{ $errors->has('title') ? ' has-danger' : '' }}">
                            <label>{{ _('Title') }}</label>
                            <input type="text" name="title" id="title" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="{{ _('Enter Title') }}" value="{{ $media_room->title }}">
                            @include('alerts.feedback', ['field' => 'title'])
                        </div>

                        <div class="form-group {{ $errors->has('slug') ? ' has-danger' : '' }}">
                            <label>{{ _('Slug') }}</label>
                            <input type="text" class="form-control {{ $errors->has('slug') ? ' is-invalid' : '' }}" id="slug" name="slug" placeholder="{{ _('Enter Slug (must be use - on white speace)') }}" value="{{ $media_room->slug }}">
                            @include('alerts.feedback', ['field' => 'slug'])
                        </div>
                        <div class="form-group {{ $errors->has('program_date') ? ' has-danger' : '' }}">
                            <label>{{ _('Program Date') }}</label>
                            <input type="date" class="form-control {{ $errors->has('program_date') ? ' is-invalid' : '' }}" name="program_date" value="{{$media_room->program_date}}">
                            @include('alerts.feedback', ['field' => 'program_date'])
                        </div>
                        <div class="form-group {{ $errors->has('category_id') ? ' has-danger' : '' }}">
                            <label>{{ _('Category') }}</label>
                            <select name="category_id" class="form-control {{ $errors->has('category_id') ? ' is-invalid' : '' }}">
                                @foreach ($media_room_cats as $cat)
                                    <option value="{{ $cat->id }}" @if( $media_room->category_id == $cat->id) selected @endif> {{ $cat->name }}</option>
                                @endforeach
                            </select>
                            @include('alerts.feedback', ['field' => 'category_id'])
                        </div>

                        <div class="form-group  {{ $errors->has('thumbnail_image') ? ' has-danger' : '' }}">
                            <label>{{ _('Thumbnail Image') }}</label>
                            <input type="file" accept="image/*" name="thumbnail_image" class="form-control image-upload  {{ $errors->has('thumbnail_image') ? ' is-invalid' : '' }} image-upload" data-existing-files="{{ storage_url($media_room->thumbnail_image) }}" data-delete-url="">
                            @include('alerts.feedback', ['field' => 'image'])
                       </div>


                       @php
                            if(isset($media_room->additional_images)){
                                $data = json_decode($media_room->additional_images, true);
                                if(!empty($data)){
                                    $result = '';
                                    $itemCount = count($data);
                                    foreach ($data as $index => $url) {
                                        $result .= route('json_image.single.delete', ['Event', $media_room->id,$index,'image' ]);
                                        if($index === $itemCount - 1) {
                                            $result .= '';
                                        }else{
                                            $result .= ', ';
                                        }
                                    }
                                }
                            }
                        @endphp

                       <div class="form-group  {{ $errors->has('additional_images.*') ? 'is-invalid' : '' }}  {{ $errors->has('additional_images') ? 'is-invalid' : '' }}">
                            <label>{{ _('Additional Images') }}</label>
                            <input type="file" accept="image/*" name="additional_images[]" class="form-control  {{ $errors->has('additional_images.*') ? 'is-invalid' : '' }}  {{ $errors->has('additional_images') ? 'is-invalid' : '' }} image-upload" multiple
                            @if(isset($data))
                                data-existing-files="{{ storage_url($data) }}"
                                data-delete-url="{{ $result }}"
                            @endif
                            >
                            @include('alerts.feedback', ['field' => 'additional_images'])
                            @include('alerts.feedback', ['field' => 'additional_images.*'])
                        </div>
                        @php
                            $count = 0;
                        @endphp
                        @if(isset($media_room) && !empty(json_decode($media_room->files)))
                            @foreach (json_decode($media_room->files) as $key=>$file)
                            @php
                                $count++;
                            @endphp
                                <div class="form-group" @if($count) id="file-{{$count}}" @endif>
                                    <label>{{ _('File-'.$count) }}</label>
                                    <div class="input-group mb-3">
                                        <input type="text" name="file[{{$count}}][file_name]" class="form-control" value="{{$file->file_name}}" disabled>
                                        <input type="text" name="file[{{$count}}][file_path]" class="form-control" value="{{$file->file_path}}" disabled>
                                        <a href="{{route('media_room.single_file.delete.media_room_edit',['key'=>$key, 'id'=>$media_room->id])}}">
                                            <span class="input-group-text text-danger h-100"><i class="tim-icons icon-trash-simple"></i></span>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                            <div class="form-group">
                                <label>{{ _('File-'.(count(json_decode($media_room->files, true)))+1) }}</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="file[{{ count(json_decode($media_room->files, true))+1 }}][file_name]" class="form-control" placeholder="{{ _('Enter file name') }}" >
                                    <input type="file" accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.odt,.ods,.odp" name="file[{{ count(json_decode($media_room->files, true))+1 }}][file_path]" class="form-control" >
                                    <span class="input-group-text" id="add_file" data-count="{{ count(json_decode($media_room->files, true))+1 }}"><i class="tim-icons icon-simple-add"></i></span>
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
                                {{ $media_room->description }}
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
                        <b>{{ _('Media Room') }}</b>
                    </p>
                    <div class="card-description">
                        <p><b>Title:</b> This field is required and unique. It is a text field with character limit of 255 characters.</p>
                        <p><b>Slug:</b> This field is required and unique. It is an auto-generated field from the Title. It represents the URL of the Media Room.</p>
                        <p><b>Program Date:</b> This field is required. It is a date field.</p>
                        <p><b>Category:</b> This field is required. This is an option field. It represents the category of the Media Room.</p>
                        <p><b>Thumbnail Image:</b> This field is nullable. It supports file uploads in jpeg, png, jpg, gif, & svg format, with a maximum size limit of 5MB. The dimensions of the image should be 1920 x 700px.</p>
                        <p><b>Additional Images:</b> This field is nullable. It supports file uploads in jpeg, png, jpg, gif, & svg format, with a maximum size limit of 2MB. The dimensions of the image should be 1200 x 800px. You can select multiple images by pressing the 'SHIFT/CTRL' key.
                        <p><b>File-* :</b> This field is nullable.  The name field should be the file name. It supports file uploads in pdf, doc, docx, xls, xlsx, ppt, pptx, odt, ods, odp format. By clicking on the '+' icon you can upload multiple files.</p>
                        <p><b>Description:</b> This field is required. It is a textarea field.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js_link')
    <script src="{{asset('backend/js/multi_file_and_slug.js')}}"></script>
@endpush

