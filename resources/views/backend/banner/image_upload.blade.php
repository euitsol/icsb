@extends('backend.layouts.master', ['pageSlug' => 'banner'])

@section('title', 'Banner')
@push('css')
<style>
    .image_group {
        position: relative;
    }
    .delete_btn {
        position: absolute;
        top: 1.6rem;
        right: 0px;
        height: 2.5rem;
        border-radius: 0 0.4285rem 0.4285rem 0;
        border-top: 0;
        border-right: 0;
        border-bottom: 0;
    }
</style>
@endpush
@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title float-left">{{ _("Add $banner->banner_name Image") }}</h5>
                    <span class="float-right btn btn-sm btn-primary" id="add_image" data-count="1">+ {{_('Image')}}</span>
                </div>
                <form method="POST" action="{{ route('banner.image.banner_create',$banner) }}" autocomplete="off"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card-body" id='image-upload-container'>
                        <div class="form-group {{ $errors->has('images.*') ? 'is-invalid' : '' }}  {{ $errors->has('images') ? 'is-invalid' : '' }}">
                            <label>{{ _('Banner Image-1') }}</label>
                            <input type="file" name="images[]" class="form-control image-upload {{ $errors->has('images.*') ? 'is-invalid' : '' }}  {{ $errors->has('images') ? 'is-invalid' : '' }}" multiple>
                            @include('alerts.feedback', ['field' => 'images'])
                            @include('alerts.feedback', ['field' => 'images.*'])
                        </div>
                        <div id="image">

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
                        <b>{{ _('Upload Banner Image') }}</b>
                    </p>
                    <div class="card-description">
                        <p><b>Upload Image-* :</b> This field is required. It supports file uploads in jpeg, png, jpg, gif, & svg format, with a maximum size limit of 5MB. The dimensions of the image should be 1200 x 800px. By clicking on the '+image' button you can upload multiple images </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
<script>
$(document).ready(function(){
    $('#add_image').click(function() {
        result = '';
        count = $(this).data('count') + 1;
        console.log(count);
        $(this).data('count', count);

        result = `<div class="form-group image_group" id="image-${count}">
                    <label>Banner Image-${count}</label>
                    <input type="file" name="images[]" class="form-control image-upload">
                    <span class="input-group-text text-danger delete_btn" onclick="delete_section(${count})"><i class="tim-icons icon-trash-simple"></i></span>
                    @include('alerts.feedback', ['field' => 'image'])
                    @include('alerts.feedback', ['field' => 'image.*'])
                </div>`;

        $('#image').append(result);
    });
});

function delete_section(count) {
    $('#image-' + count).remove();
};
</script>
@endpush
