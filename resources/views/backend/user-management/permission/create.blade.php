@extends('backend.layouts.master', ['pageSlug' => 'permission'])

@section('title', 'Permission')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ _('Add Role') }}</h5>
                </div>
                <form method="POST" action="{{ route('um.permission.store') }}" autocomplete="off">
                    @csrf
                    <div class="card-body">
                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <label>{{ _('Permission Name') }}</label>
                                <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ _('Name') }}" value="{{ old('name') }}">
                                @include('alerts.feedback', ['field' => 'name'])
                            </div>

                            <div class="form-group{{ $errors->has('prefix') ? ' has-danger' : '' }}">
                                <label>{{ _('Prefix') }}</label>
                                <input type="text" name="prefix" class="form-control{{ $errors->has('prefix') ? ' is-invalid' : '' }}" placeholder="{{ _('Prefix') }}" value="{{ old('prefix') }}">
                                @include('alerts.feedback', ['field' => 'prefix'])
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
                        Permission
                    </p>
                    <div class="card-description">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
