@extends('backend.layouts.master', ['pageSlug' => 'council'])

@section('title', 'Edit Council')
@push('css')

<style>
    .input-group-append .input-group-text {
        border-left: none;
        padding: 0 !important;
        border: 0;
        color: #ddd;
        justify-content: center;
    }
    .input-group-append{
        border-radius: 0 !important;
        border-color: rgba(29, 37, 59, 0.5);
    }
    .input-group .form-control:not(:first-child):not(:last-child){
        border-radius: 0 !important;
    }
    .form-control:focus+.input-group-append .input-group-text, .form-control:focus~.input-group-append .input-group-text{
        border-color: transparent;
    }
</style>

@endpush
@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ _('Edit Council') }}</h5>
                </div>
                <form method="POST" action="{{ route('council.council_edit',$council->id) }}" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8 form-group {{ $errors->has('title') ? ' has-danger' : '' }}">
                                <label>{{ _('Council Title') }}</label>
                                <input type="text" name="title" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="{{ _('Council Title') }}" value="{{ $council->title }}">
                                @include('alerts.feedback', ['field' => 'title'])
                            </div>
                            <div class="col-md-4 form-group {{ $errors->has('order_key') ? ' has-danger' : '' }}">
                                <label>{{ _('Council Order') }}</label>
                                <select class="form-control {{ $errors->has('order_key') ? ' is-invalid' : '' }}" name="order_key">
                                    @for ($x=1; $x<=100; $x++)
                                        @php
                                            $check = App\Models\Council::where('order_key',$x)->first();
                                        @endphp
                                        @if($council->order_key == $x)
                                            <option value="{{$x}}" selected>{{ $x }}</option>
                                        @elseif(!$check)
                                            <option value="{{$x}}">{{ $x }}</option>
                                        @endif
                                    @endfor
                                </select>
                                @include('alerts.feedback', ['field' => 'order_key'])
                            </div>
                        </div>
                        <div class="form-group row {{ $errors->has('duration.start_date') ? ' has-danger' : '' }} {{ $errors->has('duration.end_date') ? ' has-danger' : '' }}">
                            <label class="col-md-12">{{_('Duration')}}</label>
                            <div class="col-md-12">
                                <div class="input-group">
                                    <input type="date" class="form-control" name="duration[start_date]" value="{{ json_decode($council->duration)->start_date }}">
                                    <div class="input-group-append">
                                        <div class="input-group-text">{{ _('to') }}</div>
                                    </div>
                                    <input type="date" class="form-control" name="duration[end_date]" value="{{ json_decode($council->duration)->end_date }}">
                                </div>
                            </div>
                            @include('alerts.feedback', ['field' => 'duration.start_date'])
                            @include('alerts.feedback', ['field' => 'duration.end_date'])
                        </div>
                        <div class="form-group {{ $errors->has('slug') ? ' has-danger' : '' }}">
                            <label>{{ _('Slug') }}</label>
                            <input type="text" class="form-control {{ $errors->has('slug') ? ' is-invalid' : '' }}" id="slug" name="slug" placeholder="{{ _('Enter Slug (must be use - on white speace)') }}" value="{{$council->slug}}">
                            @include('alerts.feedback', ['field' => 'slug'])
                        </div>
                        <div class="form-group {{ $errors->has('description') ? ' has-danger' : '' }}">
                            <label>{{ _('Description') }} </label>
                            <textarea rows="3" name="description" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}">
                                {{ $council->description }}
                            </textarea>
                            @include('alerts.feedback', ['field' => 'description'])
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-fill btn-primary">{{ _('Update') }}</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-user">
                <div class="card-body">
                    <p class="card-text">
                        {{ _('Council') }}
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

