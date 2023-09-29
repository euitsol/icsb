@extends('backend.layouts.master', ['pageSlug' => 'committee'])

@section('title', 'Create Committee')
@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ _('Create Committee') }}</h5>
                </div>
                <form method="POST" action="{{ route('committee.committee_create') }}" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group {{ $errors->has('title') ? ' has-danger' : '' }}">
                            <label>{{ _('Committee Title') }}</label>
                            <input type="text" id='title' name="title" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="{{ _('Enter the committee title') }}" value="{{ old('title') }}">
                            @include('alerts.feedback', ['field' => 'title'])
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 {{ $errors->has('committee_type') ? ' has-danger' : '' }}">
                                <label>{{ _('Committee Type') }}</label>
                                <select name="committee_type" class="form-control {{ $errors->has('committee_type') ? ' is-invalid' : '' }}">
                                    <option selected hidden>{{_('Select Committee Type')}}</option>
                                    @foreach ($c_types as $type)
                                        <option value="{{ $type->id }}" @if( old('committee_type') == $type->id) selected @endif> {{ $type->title }}</option>
                                    @endforeach
                                </select>
                                @include('alerts.feedback', ['field' => 'committee_type'])
                            </div>
                            <div class="form-group col-md-6 {{ $errors->has('order_key') ? ' has-danger' : '' }}">
                                <label>{{ _('Order') }}</label>
                                <select class="form-control {{ $errors->has('order_key') ? ' is-invalid' : '' }}" name="order_key">
                                    <option value="" selected hidden>{{ _('Select Order') }}</option>
                                    @for ($x=1; $x<=100; $x++)
                                        @php
                                            $check = App\Models\Committee::where('order_key',$x)->first();
                                        @endphp
                                        @if(!$check)
                                            <option value="{{$x}}">{{ $x }}</option>
                                        @endif
                                    @endfor
                                </select>
                                @include('alerts.feedback', ['field' => 'order_key'])
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('slug') ? ' has-danger' : '' }}">
                            <label>{{ _('Slug') }}</label>
                            <input type="text" class="form-control {{ $errors->has('slug') ? ' is-invalid' : '' }}" id="slug" name="slug" placeholder="{{ _('Enter Slug (must be use - on white speace)') }}">
                            @include('alerts.feedback', ['field' => 'slug'])
                        </div>
                        <div class="form-group {{ $errors->has('description') ? ' has-danger' : '' }}">
                            <label>{{ _('Description') }} </label>
                            <textarea rows="3" name="description" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}">
                                {{ old('description') }}
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
                        {{ _('Committee') }}
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

