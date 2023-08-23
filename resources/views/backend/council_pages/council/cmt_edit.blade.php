@extends('backend.layouts.master', ['pageSlug' => 'council'])

@section('title', 'Edit Council Member Type')
@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ _('Edit Council Member Type') }}</h5>
                </div>
                <form method="POST" action="{{ route('council.cm_type_edit',$cmt->id) }}" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group {{ $errors->has('title') ? ' has-danger' : '' }}">

                        </div>
                        <div class="row">
                            <div class="col-md-8 form-group {{ $errors->has('title') ? ' has-danger' : '' }}">
                                <label>{{ _('Council Member Type') }}</label>
                                <input type="text" id='title' name="title" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="{{ _('Enter council member type ') }}" value="{{ $cmt->title }}">
                                @include('alerts.feedback', ['field' => 'title'])
                            </div>
                            <div class="col-md-4 form-group {{ $errors->has('order_key') ? ' has-danger' : '' }}">
                                <label>{{ _('Council Order') }}</label>
                                <select class="form-control {{ $errors->has('order_key') ? ' is-invalid' : '' }}" name="order_key">
                                    @for ($x=1; $x<=100; $x++)
                                        @php
                                            $check = App\Models\CouncilMemberType::where('order_key',$x)->where('order_key',$x)->first();
                                        @endphp
                                        @if($cmt->order_key == $x)
                                            <option value="{{$x}}" selected>{{ $x }}</option>
                                        @elseif(!$check)
                                            <option value="{{$x}}">{{ $x }}</option>
                                        @endif
                                    @endfor
                                </select>
                                @include('alerts.feedback', ['field' => 'order_key'])
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('slug') ? ' has-danger' : '' }}">
                            <label>{{ _('Slug') }}</label>
                            <input type="text" class="form-control {{ $errors->has('slug') ? ' is-invalid' : '' }}" id="slug" name="slug" placeholder="{{ _('Enter Slug (must be use - on white speace)') }}" value="{{ $cmt->slug }}">
                            @include('alerts.feedback', ['field' => 'slug'])
                        </div>
                        <div class="form-group {{ $errors->has('description') ? ' has-danger' : '' }}">
                            <label>{{ _('Description(optional)') }} </label>
                            <textarea rows="3" name="description" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}">
                                {{ $cmt->description }}
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
                        {{ _('Council Member Type') }}
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
    <script src="{{ asset('backend/js/blog.js') }}"></script>
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

