@extends('backend.layouts.master', ['pageSlug' => 'faq'])

@section('title', 'Frequently Asked Questions')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ _('Add FAQ') }}</h5>
                </div>
                <form method="POST" action="{{ route('about.faq.faq_create') }}" autocomplete="off">
                    @csrf
                    <div class="card-body">
                            <div class="row">
                                <div class="col-md-8 form-group {{ $errors->has('title') ? ' has-danger' : '' }}">
                                    <label>{{ _('FAQ Title') }}</label>
                                    <input type="text" name="title" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="{{ _('Faq Title') }}" value="{{ old('title') }}">
                                    @include('alerts.feedback', ['field' => 'title'])
                                </div>
                                <div class="col-md-4 form-group {{ $errors->has('order_key') ? ' has-danger' : '' }}">
                                    <label>{{ _('FAQ Order') }}</label>
                                    <select class="form-control {{ $errors->has('order_key') ? ' is-invalid' : '' }}" name="order_key">
                                        <option value="" selected hidden>{{ _('Select FAQ Order') }}</option>
                                        @for ($x=1; $x<=1000; $x++)
                                            @php
                                                $check = App\Models\Faq::where('order_key',$x)->first();
                                            @endphp
                                            @if(!$check)
                                                <option value="{{$x}}">{{ $x }}</option>
                                            @endif
                                        @endfor
                                    </select>
                                    @include('alerts.feedback', ['field' => 'order_key'])
                                </div>
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
                        <b>{{ _('Faqs') }}</b>
                    </p>
                    <div class="card-description">
                        <p><b>FAQ Title:</b> This field is required and unique. It is a text field with character limit of 255 characters.</p>
                        <p><b>FAQ Order:</b> This field is required and unique. It is a number field. It manages the order of the FAQ.</p>
                        <p><b>Description:</b> This field is required. It is a textarea field.</p></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
@endpush
