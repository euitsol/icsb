@extends('backend.layouts.master', ['pageSlug' => 'recent_video'])

@section('title', 'Edit Recent Video')
@push('css')
<style>
    .ck-rounded-corners .ck.ck-editor__main>.ck-editor__editable, .ck.ck-editor__main>.ck-editor__editable.ck-rounded-corners {
        height: 10vh !important;
    }
</style>
@endpush

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ _('Edit Recent Video') }}</h5>
                </div>
                <form method="POST" action="{{ route('recent_video.recent_video_edit',$recent_video->id) }}" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                            <div class="form-group {{ $errors->has('title') ? ' has-danger' : '' }}">
                                <label>{{ _('Video Title') }}</label>
                                <textarea rows="1" name="title" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}">
                                    {{ $recent_video->title }}
                                </textarea>
                                @include('alerts.feedback', ['field' => 'title'])
                            </div>
                            <div class="form-group {{ $errors->has('url') ? ' has-danger' : '' }}">
                                <label>{{ _('Video URL') }}</label>
                                <input type="url" name="url" class="form-control {{ $errors->has('url') ? ' is-invalid' : '' }}" placeholder="{{ _('Enter Video url') }}" value="{{ $recent_video->url }}">
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
                        <b>{{ _('Recent Video') }}</b>
                    </p>
                    <div class="card-description">
                        <p><b>Video Title:</b> This field is required and unique. It is a text field with character limit of 255 characters.</p>
                        <p><b>Video URL:</b> This field is required. It is a URL field. Please ensure that you enter a valid URL for either a YouTube or Vimeo video.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
@endpush
