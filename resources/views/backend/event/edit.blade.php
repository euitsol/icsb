@extends('backend.layouts.master', ['pageSlug' => 'event'])

@section('title', 'Edit Event')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ _('Edit Event') }}</h5>
                </div>
                <form method="POST" action="{{ route('event.event_edit', $event->id) }}" autocomplete="off" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <div class="form-group {{ $errors->has('title') ? ' has-danger' : '' }}">
                            <label>{{ _('Event Title') }}</label>
                            <input type="text" name="title"
                                class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}"
                                value="{{ $event->title }}">
                            @include('alerts.feedback', ['field' => 'title'])
                        </div>
                        <div class="form-group {{ $errors->has('total_participant') ? ' has-danger' : '' }}">
                            <label>{{ _('Total Perticipant') }}</label>
                            <input type="string" name="total_participant"
                                class="form-control {{ $errors->has('total_participant') ? ' is-invalid' : '' }}"
                                value="{{ $event->total_participant }}">
                            @include('alerts.feedback', ['field' => 'total_participant'])
                        </div>

                        {{-- image --}}

                        <div class="form-group  {{ $errors->has('image.*') ? 'is-invalid' : '' }}  {{ $errors->has('image') ? 'is-invalid' : '' }}">
                            <label>{{ _('Event Images') }}</label>
                            <input type="file" accept="image/*" name="image[]" class="form-control  {{ $errors->has('image.*') ? 'is-invalid' : '' }}  {{ $errors->has('image') ? 'is-invalid' : '' }} image-upload" multiple >
                            @include('alerts.feedback', ['field' => 'image'])
                            @include('alerts.feedback', ['field' => 'image.*'])
                        </div>

                        <div class="form-group {{ $errors->has('video_url') ? ' has-danger' : '' }}">
                            <label>{{ _('Event Video(Youtube URL)') }}</label>
                            <input type="url" name="video_url"
                                class="form-control {{ $errors->has('video_url') ? ' is-invalid' : '' }}"
                                value="{{ $event->video_url }}">
                            @include('alerts.feedback', ['field' => 'video_url'])
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('event_start_time') ? ' has-danger' : '' }}">
                                    <label>{{ _('Event Start Time') }}</label>
                                    <input type="datetime-local" name="event_start_time"
                                        class="form-control {{ $errors->has('event_start_time') ? ' is-invalid' : '' }}"
                                        value="{{ $event->event_start_time }}">
                                    @include('alerts.feedback', ['field' => 'event_start_time'])
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('event_end_time') ? ' has-danger' : '' }}">
                                    <label>{{ _('Event End Time') }}</label>
                                    <input type="datetime-local" name="event_end_time"
                                        class="form-control {{ $errors->has('event_end_time') ? ' is-invalid' : '' }}"
                                        value="{{ $event->event_end_time }}">
                                    @include('alerts.feedback', ['field' => 'event_end_time'])
                                </div>
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('event_location') ? ' has-danger' : '' }}">
                            <label>{{ _('Event Location') }}</label>
                            <input type="text" name="event_location"
                                class="form-control {{ $errors->has('event_location') ? ' is-invalid' : '' }}"
                                 value="{{ $event->event_location }}">
                            @include('alerts.feedback', ['field' => 'event_location'])
                        </div>
                        <div class="form-group  {{ $errors->has('type') ? ' has-danger' : '' }}">
                            <label>{{ _('Event Type') }}</label>
                            <select name="type" class="form-control  {{ $errors->has('type') ? ' is-invalid' : '' }}">
                                <option value="1" @if($event->type == "1") selected @endif>Online</option>
                                <option value="0" @if($event->type == "0") selected @endif>Offline</option>
                            </select>
                            @include('alerts.feedback', ['field' => 'type'])
                        </div>
                        <div class="form-group {{ $errors->has('description') ? ' has-danger' : '' }}">
                            <label>{{ _('Description') }} </label>
                            <textarea rows="3" name="description" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}">
                                {{ $event->description }}
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
                        {{ _('Event') }}
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
