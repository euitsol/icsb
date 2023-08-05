@extends('backend.layouts.master', ['pageSlug' => 'president'])

@section('title', 'Add President')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ _('Add President') }}</h5>
                </div>
                <form method="POST" action="{{ route('president.president_create') }}" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">

                        <div class="form-group col-md-6 {{ $errors->has('slug') ? ' has-danger' : '' }}">
                            <label>{{ _('Slug') }}</label>
                            <input type="text" class="form-control {{ $errors->has('slug') ? ' is-invalid' : '' }}" id="slug" name="slug" placeholder="{{ _('Enter Slug') }}" value="{{ old('slug') }}">
                            @include('alerts.feedback', ['field' => 'slug'])
                        </div>
                        <div class="form-group {{ $errors->has('designation') ? ' has-danger' : '' }}">
                            <label>{{ _('Designation') }} </label>
                            <input type="text" name="designation" class="form-control {{ $errors->has('designation') ? ' is-invalid' : '' }}" placeholder="{{ _('Enter designation') }}" value="{{ old('designation') }}">
                            @include('alerts.feedback', ['field' => 'designation'])
                        </div>
                        <div class="form-group {{ $errors->has('bio') ? ' has-danger' : '' }}">
                            <label>{{ _('President Bio') }} </label>
                            <textarea rows="3" name="bio" class="form-control {{ $errors->has('bio') ? ' is-invalid' : '' }}">
                                {{ old('bio') }}
                            </textarea>
                            @include('alerts.feedback', ['field' => 'bio'])
                        </div>
                        <div class="form-group {{ $errors->has('message') ? ' has-danger' : '' }}">
                            <label>{{ _('President Message') }} </label>
                            <textarea rows="3" name="message" class="form-control {{ $errors->has('message') ? ' is-invalid' : '' }}">
                                {{ old('message') }}
                            </textarea>
                            @include('alerts.feedback', ['field' => 'message'])
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
                        {{ _('President') }}
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
    $(".name").on("keyup mouseleave blur focusout ", function () {
        const nameValue = $(this).val().trim();
        const slugValue = generateSlug(nameValue);
        $("#slug").val(slugValue);
    });
});
</script>
@endpush
