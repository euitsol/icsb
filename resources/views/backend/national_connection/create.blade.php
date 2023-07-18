@extends('backend.layouts.master', ['pageSlug' => 'national_connection'])

@section('title', 'National Connection')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ _('Add National Connection') }}</h5>
                </div>
                <form method="POST" action="{{ route('national_connection.national_connection_create') }}" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                            <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                <label>{{ _('Title') }}</label>
                                <input type="text" name="title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="{{ _('Enter Title') }}" value="{{ old('title') }}">
                                @include('alerts.feedback', ['field' => 'title'])
                            </div>

                            {{-- Logo --}}

                            <div class="form-group{{ $errors->has('logo') ? ' has-danger' : '' }}">
                                <label>{{ _('Logo') }}</label>
                                <input type="file" id="upImgInput" name="logo" onchange="myFunction('upImg')" class="form-control {{ $errors->has('logo') ? ' is-invalid' : '' }}">
                                @include('alerts.feedback', ['field' => 'logo'])
                           </div>

                            <div class="form-group{{ $errors->has('url') ? ' has-danger' : '' }}">
                                <label>{{ _('URL') }}</label>
                                <input type="url" name="url" class="form-control{{ $errors->has('url') ? ' is-invalid' : '' }}" placeholder="{{ _('Enter URL') }}" value="{{ old('url') }}">
                                @include('alerts.feedback', ['field' => 'url'])
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
                        National Connection
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
@endpush
