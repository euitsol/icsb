@extends('backend.layouts.master', ['pageSlug' => 'act'])

@section('title', 'Act')
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
                    <h5 class="title">{{ _('Edit Act') }}</h5>
                </div>
                <form method="POST" action="{{ route('acts.acts_edit',$act->id) }}" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                            <div class="row">
                                <div class="col-md-8 form-group {{ $errors->has('title') ? ' has-danger' : '' }}">
                                    <label>{{ _('Title') }}</label>
                                    <input type="text" name="title" id="title" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="{{ _('Enter Title') }}" value="{{ $act->title }}">
                                    @include('alerts.feedback', ['field' => 'title'])
                                </div>
                                <div class="col-md-4 form-group {{ $errors->has('order_key') ? ' has-danger' : '' }}">
                                    <label>{{ _('FAQ Order') }}</label>
                                    <select class="form-control {{ $errors->has('order_key') ? ' is-invalid' : '' }}" name="order_key">
                                        @for ($x=1; $x<=1000; $x++)
                                            @php
                                                $check = App\Models\Act::where('order_key',$x)->first();
                                            @endphp
                                            @if($act->order_key == $x)
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
                                <input type="text" class="form-control {{ $errors->has('slug') ? ' is-invalid' : '' }}" id="slug" name="slug" placeholder="{{ _('Enter Slug (must be use - on white speace)') }}" value="{{$act->slug}}">
                                @include('alerts.feedback', ['field' => 'slug'])
                            </div>
                            @php
                                $count = 0;
                            @endphp
                            @if(isset($act) && !empty(json_decode($act->files)))
                                @foreach (json_decode($act->files) as $key=>$file)
                                @php
                                    $count++;
                                @endphp
                                    <div class="form-group" @if($count) id="file-{{$count}}" @endif>
                                        <label>{{ _('File-'.$count) }}</label>
                                        <div class="input-group mb-3">
                                            <input type="text" name="file[{{$count}}][file_name]" class="form-control" value="{{$file->file_name}}" disabled>
                                            <input type="text" name="file[{{$count}}][file_path]" class="form-control" value="{{$file->file_path}}" disabled>
                                            <a href="{{route('acts.single_file.delete.acts_edit',['key'=>$key, 'id'=>$act->id])}}">
                                                <span class="input-group-text text-danger h-100"><i class="tim-icons icon-trash-simple"></i></span>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="form-group">
                                    <label>{{ _('File-'.(count(json_decode($act->files, true)))+1) }}</label>
                                    <div class="input-group mb-3">
                                        <input type="text" name="file[{{ count(json_decode($act->files, true))+1 }}][file_name]" class="form-control" placeholder="{{ _('Enter file name') }}" >
                                        <input type="file" accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.odt,.ods,.odp" name="file[{{ count(json_decode($act->files, true))+1 }}][file_path]" class="form-control" >
                                        <span class="input-group-text" id="add_file" data-count="{{ count(json_decode($act->files, true))+1 }}"><i class="tim-icons icon-simple-add"></i></span>
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
                        {{ _('Act') }}
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
    <script src="{{asset('backend/js/multi_file_and_slug.js')}}"></script>
@endpush
