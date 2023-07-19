@extends('backend.layouts.master', ['pageSlug' => 'national_award'])

@section('title', 'Edit National Award')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ _('Edit National Award') }}</h5>
                </div>
                <form method="POST" action="{{ route('national_award.national_award_edit', $national_award->id) }}" autocomplete="off" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                            <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                <label>{{ _('Title') }}</label>
                                <input type="text" name="title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" value="{{ $national_award->title }}">
                                @include('alerts.feedback', ['field' => 'title'])
                            </div>

                            <div class="form-group{{ $errors->has('image') ? ' has-danger' : '' }}">
                                <label class="form-label">Image</label>
                                <input type="file" name="image"
                                    class="form-control {{ $errors->has('image') ? ' is-invalid' : '' }}" value="{{ $national_award->image }}" class="image-upload">
                            </div>
                            <div class="form-group{{ $errors->has('file') ? ' has-danger' : '' }}">
                                <label class="form-label">file</label>
                                <input type="file" name="file"
                                    class="form-control {{ $errors->has('file') ? ' is-invalid' : '' }}" value="{{ $national_award->file }}">
                            </div>
                            <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                <label>{{ _('Description(optional)') }} </label>
                                <textarea rows="3" name="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}">
                                    {{ $national_award->description }}
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
                        National Award
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
