@extends('backend.layouts.master', ['pageSlug' => $details->page_key])

@section('title', $details->title)
@push('css')
<style>
</style>
@endpush

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ _($details->title) }}</h5>
                </div>
                <form method="POST" action="{{ route('sp.form.store', $details->page_key) }}" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        @include('alerts.success')
                        @if($details->form_data)
							@foreach(json_decode($details->form_data) as $k => $fd)
                            @php
                                $a = $fd->field_key;
                            @endphp

                                @if($fd->type == "text")
                                    <div class="form-group {{ $errors->has($fd->field_key) ? ' has-danger' : '' }}">
                                        <label for="{{$fd->field_key}}">{{ getSinglePageLebel($fd->field_name) }}</label>
                                        <input type="text" name="{{$fd->field_key}}" id="{{$fd->field_key}}" class="form-control title {{ $errors->has($fd->field_key) ? ' is-invalid' : '' }}" value="{{ json_decode($details->saved_data)->$a ?? old($fd->field_key) }}">
                                        @include('alerts.feedback', ['field' => $fd->field_key])
                                    </div>
                                @elseif($fd->type == "number")
                                    <div class="form-group {{ $errors->has($fd->field_key) ? ' has-danger' : '' }}">
                                        <label for="{{$fd->field_key}}">{{ getSinglePageLebel($fd->field_name) }}</label>
                                        <input type="number" name="{{$fd->field_key}}" id="{{$fd->field_key}}" class="form-control title {{ $errors->has($fd->field_key) ? ' is-invalid' : '' }}" value="{{ json_decode($details->saved_data)->$a ?? old($fd->field_key) }}">
                                        @include('alerts.feedback', ['field' => $fd->field_key])
                                    </div>
                                @elseif($fd->type == "url")
                                    <div class="form-group {{ $errors->has($fd->field_key) ? ' has-danger' : '' }}">
                                        <label for="{{$fd->field_key}}">{{ getSinglePageLebel($fd->field_name) }}</label>
                                        <input type="url" name="{{$fd->field_key}}" id="{{$fd->field_key}}" class="form-control title {{ $errors->has($fd->field_key) ? ' is-invalid' : '' }}" value="{{ json_decode($details->saved_data)->$a ?? old($fd->field_key) }}">
                                        @include('alerts.feedback', ['field' => $fd->field_key])
                                    </div>
                                @elseif($fd->type == "textarea")
                                    <div class="form-group {{ $errors->has($fd->field_key) ? ' has-danger' : '' }}">
                                        <label for="{{$fd->field_key}}">{{ getSinglePageLebel($fd->field_name) }}</label>
                                        <textarea name="{{$fd->field_key}}" id="{{$fd->field_key}}" class="form-control title {{ $errors->has($fd->field_key) ? ' is-invalid' : '' }}">
                                            {{ json_decode($details->saved_data)->$a ?? old($fd->field_key) }}
                                        </textarea>
                                        @include('alerts.feedback', ['field' => $fd->field_key])
                                    </div>
                                @elseif($fd->type == "image")
                                    <div class="form-group {{ $errors->has($fd->field_key) ? ' has-danger' : '' }}">
                                        <label for="{{$fd->field_key}}">{{ getSinglePageLebel($fd->field_name) }}</label>
                                        <input type="file" accept="image/*" name="{{$fd->field_key}}" id="{{$fd->field_key}}" class="form-control  {{ $errors->has($fd->field_key) ? 'is-invalid' : '' }} image-upload">
                                        @include('alerts.feedback', ['field' => $fd->field_key])
                                    </div>
                                    <div class="mb-4">
                                        @if(!empty(json_decode($details->saved_data)) && isset(json_decode($details->saved_data)->$a))
                                        <img src="{{ storage_url(json_decode($details->saved_data)->$a) }}" alt="">
                                        @endif
                                    </div>

                                @elseif($fd->type == "file_single")
                                    <div class="form-group {{ $errors->has($fd->field_key) ? ' has-danger' : '' }}">
                                        <label for="{{$fd->field_key}}">{{ getSinglePageLebel($fd->field_name) }}</label>
                                        <input type="file" accept="" name="{{$fd->field_key}}" id="{{$fd->field_key}}" class="form-control  {{ $errors->has($fd->field_key) ? 'is-invalid' : '' }}">
                                        @include('alerts.feedback', ['field' => $fd->field_key])
                                    </div>
                                @elseif($fd->type == "email")
                                    <div class="form-group {{ $errors->has($fd->field_key) ? ' has-danger' : '' }}">
                                        <label for="{{$fd->field_key}}">{{ getSinglePageLebel($fd->field_name) }}</label>
                                        <input type="email" name="{{$fd->field_key}}" id="{{$fd->field_key}}" class="form-control  {{ $errors->has($fd->field_key) ? 'is-invalid' : '' }}" value="{{ json_decode($details->saved_data)->$a ?? old($fd->field_key) }}">
                                        @include('alerts.feedback', ['field' => $fd->field_key])
                                    </div>
                                @endif

							@endforeach
						@endif

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
                        {{ _(json_decode($details->documentation)->title ?? '') }}
                    </p>
                    <div class="card-description">
                        {!! _(json_decode($details->documentation)->details ?? '') !!}</div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js_link')

<script>

</script>
@endpush
