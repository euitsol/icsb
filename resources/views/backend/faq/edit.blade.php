@extends('backend.layouts.master', ['pageSlug' => 'faq'])

@section('title', 'Edit Frequently Asked Question')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ _('Edit Frequently Asked Question') }}</h5>
                </div>
                <form method="POST" action="{{ route('about.faq.faq_edit', $faq->id) }}" autocomplete="off">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                            @include('alerts.success')

                            <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                <label>{{ _('Title') }}</label>
                                <input type="text" name="title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="{{ _('Title') }}" value="{{ $faq->title }}">
                                @include('alerts.feedback', ['field' => 'title'])
                            </div>

                            <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                <label>{{ _('Description') }} </label>
                                <textarea rows="3" name="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}">
                                    {{ $faq->description }}
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
                        Faqs
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
