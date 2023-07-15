@extends('backend.layouts.master', ['pageSlug' => 'service'])

@section('title', 'Edit Service')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ _('Edit Service') }}</h5>
                </div>
                <form method="POST" action="{{ route('service.service_edit', $service->id) }}" autocomplete="off" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                            @include('alerts.success')

                            <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                <label>{{ _('Title') }}</label>
                                <input type="text" name="title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="{{ _('Title') }}" value="{{ $service->title }}">
                                @include('alerts.feedback', ['field' => 'title'])
                            </div>

                            <div class="form-group{{ $errors->has('image') ? ' has-danger' : '' }}">
                                <label class="form-label">Service Image</label>
                                <input type="file" id="upImgInput" name="image"
                                    class="form-control {{ $errors->has('image') ? ' is-invalid' : '' }}" value="{{ $service->image }}">
                            </div>
                            <div class="mb-1">
                                <img src="@if ($service->image) {{ asset($service->image) }} @else {{ asset('no_img/no_img.jpg') }} @endif" id="upImg"
                                    class="upImg rounded me-50 border" alt="service image" height="100">
                            </div>
                            <div class="mt-1 mb-2">
                                <button type="button" id="upImgReset"
                                    class="btn btn-sm btn-outline-secondary mb-75 waves-effect">Reset</button>
                            </div>

                            <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                <label>{{ _('Description') }} </label>
                                <textarea rows="3" name="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}">
                                    {{ $service->description }}
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
                        Service
                    </p>
                    <div class="card-description">
                        {{ _('The faq\'s manages user permissions by assigning different faqs to users. Each faq defines specific access levels and actions a user can perform. It helps ensure proper authorization and security in the system.') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
@endpush
