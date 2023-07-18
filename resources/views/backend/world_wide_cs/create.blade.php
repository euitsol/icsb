@extends('backend.layouts.master', ['pageSlug' => 'wwcs'])

@section('title', 'World Wide CS')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ _('Add World Wide CS') }}</h5>
                </div>
                <form method="POST" action="{{ route('wwcs.wwcs_create') }}" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                            <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                <label>{{ _('Title') }}</label>
                                <input type="text" name="title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="{{ _('Enter Title') }}" value="{{ old('title') }}">
                                @include('alerts.feedback', ['field' => 'title'])
                            </div>

                            {{-- Logo --}}

                            <div class="form-group {{ $errors->has('logo') ? ' has-danger' : '' }}">
                                <label>{{ _('Logo') }}</label>
                                <input type="file" name="logo" class="form-control {{ $errors->has('logo') ? ' is-invalid' : '' }}">
                                @include('alerts.feedback', ['field' => 'logo'])
                           </div>
                            <div class="form-group{{ $errors->has('url') ? ' has-danger' : '' }}">
                                <label>{{ _('URL') }}</label>
                                <input type="url" name="url" class="form-control{{ $errors->has('url') ? ' is-invalid' : '' }}" placeholder="{{ _('Enter URL') }}" value="{{ old('url') }}">
                                @include('alerts.feedback', ['field' => 'url'])
                            </div>
                            <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                <label>{{ _('Description(optional)') }} </label>
                                <textarea rows="3" name="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}">
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
                        World Wide CS
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
