@extends('backend.layouts.master', ['pageSlug' => 'media_room'])

@section('title', 'Edit Media Room Category')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ _('Edit Media Room Category') }}</h5>
                </div>
                <form method="POST" action="{{ route('media_room.media_room_cat_edit', $cat->id) }}" autocomplete="off">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group {{ $errors->has('name') ? ' has-danger' : '' }}">
                            <label>{{ _('Category Name') }}</label>
                            <input type="text" id ='name' name="name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ _('Enter category name') }}" value="{{ $cat->name }}">
                            @include('alerts.feedback', ['field' => 'name'])
                        </div>
                        <div class="form-group {{ $errors->has('slug') ? ' has-danger' : '' }}">
                            <label>{{ _('Slug') }}</label>
                            <input type="text" class="form-control {{ $errors->has('slug') ? ' is-invalid' : '' }}" id="slug" name="slug" placeholder="{{ _('Enter Slug (must be use - on white speace)') }}" value="{{ $cat->slug }}">
                            @include('alerts.feedback', ['field' => 'slug'])
                        </div>
                        <div class="form-group {{ $errors->has('order_key') ? ' has-danger' : '' }}">
                            <label>{{ _('Order') }}</label>
                            <select class="form-control {{ $errors->has('order_key') ? ' is-invalid' : '' }}" name="order_key">
                                @for ($x=1; $x<=1000; $x++)
                                    @php
                                        $check = App\Models\MediaRoomCategory::where('order_key',$x)->first();
                                    @endphp
                                    @if($cat->order_key == $x)
                                        <option value="{{$x}}" selected>{{ $x }}</option>
                                    @elseif(!$check)
                                        <option value="{{$x}}">{{ $x }}</option>
                                    @endif
                                @endfor
                            </select>
                            @include('alerts.feedback', ['field' => 'order_key'])
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
                        <b>{{ _('Media Room Categrory') }}</b>
                    </p>
                    <div class="card-description">
                        <p><b>Category Name:</b> This field is required and unique. It is a text field with character limit of 255 characters.</p>
                        <p><b>Slug:</b> This field is required and unique. It is an auto-generated field from the Category Name. It represents the URL of the Media Room.</p>
                        <p><b>Order:</b> This field is required and unique. It is a number field. It manages the order of the Media Room Categories</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
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
    $("#name").on("keyup mouseleave blur focusout ", function () {
        const nameValue = $(this).val().trim();
        const slugValue = generateSlug(nameValue);
        $("#slug").val(slugValue);
    });
});
</script>
@endpush
