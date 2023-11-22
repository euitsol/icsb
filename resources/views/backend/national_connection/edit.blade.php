@extends('backend.layouts.master', ['pageSlug' => 'national_connection'])

@section('title', 'Edit National Connection')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ _('Edit National Connection') }}</h5>
                </div>
                <form method="POST" action="{{ route('national_connection.national_connection_edit', $connection->id) }}" autocomplete="off" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                            <div class="row">
                                <div class="col-md-8 form-group {{ $errors->has('title') ? ' has-danger' : '' }}">
                                    <label>{{ _('Title') }}</label>
                                    <input type="text" name="title" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" value="{{ $connection->title }}">
                                    @include('alerts.feedback', ['field' => 'title'])
                                </div>
                                <div class=" col-md-4 form-group {{ $errors->has('order_key') ? ' has-danger' : '' }}">
                                    <label>{{ _('Order') }}</label>
                                    <select class="form-control {{ $errors->has('order_key') ? ' is-invalid' : '' }}" name="order_key">
                                        @for ($x=1; $x<=1000; $x++)
                                            @php
                                                $check = App\Models\NationalConnection::where('order_key',$x)->first();
                                            @endphp
                                            @if($connection->order_key == $x)
                                                <option value="{{$x}}" selected>{{ $x }}</option>
                                            @elseif(!$check)
                                                <option value="{{$x}}">{{ $x }}</option>
                                            @endif
                                        @endfor
                                    </select>
                                    @include('alerts.feedback', ['field' => 'order_key'])
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('logo') ? ' has-danger' : '' }}">
                                <label class="form-label">Logo</label>
                                <input type="file" accept="image/*" name="logo"
                                    class="form-control image-upload  {{ $errors->has('logo') ? ' is-invalid' : '' }}" value="{{ $connection->logo }}" data-existing-files="{{ storage_url($connection->logo) }}" data-delete-url="">
                            </div>
                            <div class="form-group {{ $errors->has('url') ? ' has-danger' : '' }}">
                                <label>{{ _('URL') }}</label>
                                <input type="text" name="url" class="form-control {{ $errors->has('url') ? ' is-invalid' : '' }}" value="{{ $connection->url }}">
                                @include('alerts.feedback', ['field' => 'url'])
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
                        {{ _('National Connection') }}
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
