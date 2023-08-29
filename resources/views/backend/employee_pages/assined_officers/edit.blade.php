@extends('backend.layouts.master', ['pageSlug' => 'assined_officer'])

@section('title', 'Edit Assined Officer')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ _('Edit Assined Officer') }}</h5>
                </div>
                <form method="POST" action="{{ route('assined_officer.assined_officer_edit', $asf->id) }}" autocomplete="off" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                            <div class="row">
                                <div class="col-md-8 form-group {{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label>{{ _('Name') }}</label>
                                    <input type="text" name="name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ $asf->name }}">
                                    @include('alerts.feedback', ['field' => 'name'])
                                </div>
                                <div class=" col-md-4 form-group {{ $errors->has('order_key') ? ' has-danger' : '' }}">
                                    <label>{{ _('Order') }}</label>
                                    <select class="form-control {{ $errors->has('order_key') ? ' is-invalid' : '' }}" name="order_key">
                                        @for ($x=1; $x<=100; $x++)
                                            @php
                                                $check = App\Models\AssinedOfficer::where('order_key',$x)->first();
                                            @endphp
                                            @if($asf->order_key == $x)
                                                <option value="{{$x}}" selected>{{ $x }}</option>
                                            @elseif(!$check)
                                                <option value="{{$x}}">{{ $x }}</option>
                                            @endif
                                        @endfor
                                    </select>
                                    @include('alerts.feedback', ['field' => 'order_key'])
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('Image') ? ' has-danger' : '' }}">
                                <label class="form-label">{{_('Image')}}</label>
                                <input type="file" accept="image/*" name="image"
                                    class="form-control image-upload  {{ $errors->has('image') ? ' is-invalid' : '' }}" data-existing-files="{{ storage_url($asf->image) }}">
                            </div>
                            <div class="form-group {{ $errors->has('designation') ? ' has-danger' : '' }}">
                                <label>{{ _('Designation') }}</label>
                                <input type="text" name="designation" class="form-control {{ $errors->has('designation') ? ' is-invalid' : '' }}" value="{{ $asf->designation }}">
                                @include('alerts.feedback', ['field' => 'designation'])
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-group {{ $errors->has('phone') ? ' has-danger' : '' }}">
                                    <label>{{ _('Phone') }}</label>
                                    <input type="tel" name="phone" class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}" placeholder="{{ _('Enter Phone Number') }}" value="{{ $asf->phone }}">
                                    @include('alerts.feedback', ['field' => 'phone'])
                                </div>
                                <div class="col-md-6 form-group {{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label>{{ _('Email') }}</label>
                                    <input type="text" name="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ _('Enter Email') }}" value="{{ $asf->email }}">
                                    @include('alerts.feedback', ['field' => 'email'])
                                </div>
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
                        {{ _('Assined Officer') }}
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
