@extends('backend.layouts.master', ['pageSlug' => 'media_room'])

@section('title', 'Add Media Room Category')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ _('Add Media Room Category') }}</h5>
                </div>
                <form method="POST" action="{{ route('media_room.media_room_cat_create') }}" autocomplete="off">
                    @csrf
                    <div class="card-body">
                        <div class="form-group {{ $errors->has('name') ? ' has-danger' : '' }}">
                            <label>{{ _('Category Name') }}</label>
                            <input type="text" id="name" name="name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ _('Enter category name') }}" value="{{ old('name') }}">
                            @include('alerts.feedback', ['field' => 'name'])
                        </div>

                        <div class="form-group {{ $errors->has('slug') ? ' has-danger' : '' }}">
                            <label>{{ _('Slug') }}</label>
                            <input type="text" class="form-control {{ $errors->has('slug') ? ' is-invalid' : '' }}" id="slug" name="slug" placeholder="{{ _('Enter Slug (must be use - on white speace)') }}">
                            @include('alerts.feedback', ['field' => 'slug'])
                        </div>
                        <div class="form-group {{ $errors->has('order_key') ? ' has-danger' : '' }}">
                            <label>{{ _('Order') }}</label>
                            <select class="form-control {{ $errors->has('order_key') ? ' is-invalid' : '' }}" name="order_key">
                                <option value="" selected hidden>{{ _('Select Order') }}</option>
                                @for ($x=1; $x<=1000; $x++)
                                    @php
                                        $check = App\Models\MediaRoomCategory::where('order_key',$x)->first();
                                    @endphp
                                    @if(!$check)
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
                        {{ _('Media Room Category') }}
                    </p>
                    <div class="card-description">
                        {{ _('The role\'s manages user permissions by assigning different roles to users. Each role defines specific access levels and actions a user can perform. It helps ensure proper authorization and security in the system.') }}
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
