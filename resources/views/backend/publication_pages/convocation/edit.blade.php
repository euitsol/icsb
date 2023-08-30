@extends('backend.layouts.master', ['pageSlug' => 'convocation'])

@section('title', 'Edit Convocation')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ _('Edit Convocation') }}</h5>
                </div>
                <form method="POST" action="{{ route('convocation.convocation_edit', $convocation->id) }}" autocomplete="off" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                            <div class="form-group {{ $errors->has('title') ? ' has-danger' : '' }}">
                                <label>{{ _('Title') }}</label>
                                <input type="text" name="title" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" value="{{ $convocation->title }}">
                                @include('alerts.feedback', ['field' => 'title'])
                            </div>

                            <div class="form-group {{ $errors->has('image') ? ' has-danger' : '' }}">
                                <label class="form-label">Image</label>
                                <input type="file" accept="image/*" name="image"
                                    class="form-control image-upload  {{ $errors->has('image') ? ' is-invalid' : '' }}" data-existing-files="{{ storage_url($convocation->image) }}">
                            </div>
                            <div class="form-group {{ $errors->has('file') ? ' has-danger' : '' }}">
                                <label class="form-label">file</label>
                                <input type="file" accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.odt,.ods,.odp" name="file"
                                    class="form-control  {{ $errors->has('file') ? ' is-invalid' : '' }}" value="{{ $convocation->file }}">
                            </div>
                            <div class="form-group {{ $errors->has('description') ? ' has-danger' : '' }}">
                                <label>{{ _('Description(optional)') }} </label>
                                <textarea rows="3" name="description" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}">
                                    {{ $convocation->description }}
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
                        {{ _('Convocation') }}
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
