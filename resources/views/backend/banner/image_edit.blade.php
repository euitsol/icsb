@extends('backend.layouts.master', ['pageSlug' => 'banner'])

@section('title', 'Edit Banner Image')
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
                    <h5 class="title float-left">{{ _("Edit $banner->banner_name Image") }}</h5>
                    <div class="col-4 text-right float-right">
                        @include('backend.partials.button', ['routeName' => 'banner.banner_list', 'className' => 'btn-primary', 'label' => 'Back'])
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach ($banner->images as $image)
                            <div class="col-md-4 pb-5" style="height: 20rem;">
                                <img src="{{storage_url($image->image)}}" class="h-100 w-100 p-2" alt="{{$banner->banner_name}}" style="border: 1px solid #e8e4e4;">
                                <a href="{{route('banner.image.banner_delete',$image->id)}}" class="btn btn-danger btn-sm"><i class="tim-icons icon-trash-simple"></i></a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h5 class="title float-left">{{ _("Add $banner->banner_name Image") }}</h5>
                    <span class="float-right btn btn-sm btn-primary" id="add_image" data-count="1">+ {{_('Image')}}</span>
                </div>
                <form method="POST" action="{{ route('banner.image.banner_edit',$banner->id) }}" autocomplete="off"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body" id='image-upload-container'>
                        <div class="form-group">
                            <label>{{ _('Banner Image-1') }}</label>
                            <input type="file" name="images[]" class="form-control image-upload">
                            @include('alerts.feedback', ['field' => 'images'])
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
                        <p><b>Upload Image-* :</b> This field is nullable. It supports file uploads in jpeg, png, jpg, gif, & svg format, with a maximum size limit of 5MB. The dimensions of the image should be 1920 x 700px. By clicking on the '+image' button you can upload multiple images </p>
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
                </div>`;

        $('#image').append(result);
    });
});

function delete_section(count) {
    $('#image-' + count).remove();
};
</script>
@endpush
