@extends('backend.layouts.master', ['pageSlug' => $details->page_key])

@section('title', $details->title)
@push('css')
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
                                        <label for="{{$fd->field_key}}">{{ $fd->field_name }}</label>
                                        <input type="text" name="{{$fd->field_key}}" id="{{$fd->field_key}}" class="form-control title {{ $errors->has($fd->field_key) ? ' is-invalid' : '' }}" value="{{ json_decode($details->saved_data)->$a ?? old($fd->field_key) }}">
                                        @include('alerts.feedback', ['field' => $fd->field_key])
                                    </div>
                                @elseif($fd->type == "number")
                                    <div class="form-group {{ $errors->has($fd->field_key) ? ' has-danger' : '' }}">
                                        <label for="{{$fd->field_key}}">{{ $fd->field_name }}</label>
                                        <input type="number" name="{{$fd->field_key}}" id="{{$fd->field_key}}" class="form-control title {{ $errors->has($fd->field_key) ? ' is-invalid' : '' }}" value="{{ json_decode($details->saved_data)->$a ?? old($fd->field_key) }}">
                                        @include('alerts.feedback', ['field' => $fd->field_key])
                                    </div>
                                @elseif($fd->type == "url")
                                    <div class="form-group {{ $errors->has($fd->field_key) ? ' has-danger' : '' }}">
                                        <label for="{{$fd->field_key}}">{{ $fd->field_name }}</label>
                                        <input type="url" name="{{$fd->field_key}}" id="{{$fd->field_key}}" class="form-control title {{ $errors->has($fd->field_key) ? ' is-invalid' : '' }}" value="{{ json_decode($details->saved_data)->$a ?? old($fd->field_key) }}">
                                        @include('alerts.feedback', ['field' => $fd->field_key])
                                    </div>
                                @elseif($fd->type == "textarea")
                                    <div class="form-group {{ $errors->has($fd->field_key) ? ' has-danger' : '' }}">
                                        <label for="{{$fd->field_key}}">{{ $fd->field_name }}</label>
                                        <textarea name="{{$fd->field_key}}" id="{{$fd->field_key}}" class="form-control title {{ $errors->has($fd->field_key) ? ' is-invalid' : '' }}">
                                            {{ json_decode($details->saved_data)->$a ?? old($fd->field_key) }}
                                        </textarea>
                                        @include('alerts.feedback', ['field' => $fd->field_key])
                                    </div>
                                @elseif($fd->type == "image")
                                    <div class="form-group {{ $errors->has($fd->field_key) ? ' has-danger' : '' }}">
                                        <label for="{{$fd->field_key}}">{{ $fd->field_name }}</label>
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
                                        <label for="{{$fd->field_key}}">{{ $fd->field_name }}</label>
                                        <input type="file" accept="" name="{{$fd->field_key}}" id="{{$fd->field_key}}" class="form-control fileInput {{ $errors->has($fd->field_key) ? 'is-invalid' : '' }}">

                                        <div class="d-flex">
                                            <input type="hidden" name="{{$fd->field_key}}" class="file_url">
                                            <div class="progressBar bg-success" style="width: 0%; background: #ddd; height: 20px;"></div>
                                            <span class="cancelBtn"  style="margin-left: 1rem; margin-right: 1rem; cursor: pointer; display:none;"><i class="fa-solid fa-xmark"></i></span>
                                        </div>
                                        @include('alerts.feedback', ['field' => $fd->field_key])
                                    </div>
                                @elseif($fd->type == "email")
                                    <div class="form-group {{ $errors->has($fd->field_key) ? ' has-danger' : '' }}">
                                        <label for="{{$fd->field_key}}">{{ $fd->field_name }}</label>
                                        <input type="email" name="{{$fd->field_key}}" id="{{$fd->field_key}}" class="form-control  {{ $errors->has($fd->field_key) ? 'is-invalid' : '' }}" value="{{ json_decode($details->saved_data)->$a ?? old($fd->field_key) }}">
                                        @include('alerts.feedback', ['field' => $fd->field_key])
                                    </div>

                                @elseif($fd->type == "option")
                                    <div class="form-group {{ $errors->has($fd->field_key) ? ' has-danger' : '' }}">
                                        <label for="{{$fd->field_key}}">{{ $fd->field_name }}</label>
                                        <select  name="{{$fd->field_key}}" id="{{$fd->field_key}}" class="form-control  {{ $errors->has($fd->field_key) ? 'is-invalid' : '' }}" >
                                            @foreach ($fd->option_data as $value=>$label)

                                                <option value="{{$value}}" @if(isset(json_decode($details->saved_data)->$a) && (json_decode($details->saved_data)->$a == $value || old($fd->field_key) == $value)) selected @endif >{{ $label }}</option>
                                            @endforeach
                                        </select>
                                        @include('alerts.feedback', ['field' => $fd->field_key])
                                    </div>
                                @endif

							@endforeach
						@endif
                        <div id="message"></div>
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
    $(document).ready(function () {
        $(document).ready(function () {
        let xhr;

        $(document).on("change", ".fileInput", function () {
            const progressBar = $(this).siblings(".d-flex").find(".progressBar");
            const cancelBtn = $(this).siblings(".d-flex").find(".cancelBtn");
            const fileUrl = $(this).siblings(".d-flex").find(".file_url");

            const formData = new FormData();
            formData.append('file', this.files[0]);

            xhr = $.ajax({
                url: "{{ route('sp.file.upload') }}",
                type: "POST",
                data: formData,
                dataType: "json",
                contentType: false,
                processData: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                xhr: function () {
                    const xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener("progress", function (evt) {
                        if (evt.lengthComputable) {
                            const percentComplete = (evt.loaded / evt.total) * 100;
                            progressBar.css("width", percentComplete + "%");
                            cancelBtn.css("display", "block");
                        }
                    }, false);
                    return xhr;
                },
                success: function (response) {
                    console.log(response);
                    if (response.success) {
                        alert("File uploaded successfully.");
                        fileUrl.val(response.file_path);
                    } else {
                        alert("Failed to upload file. Please try again.");
                    }
                    progressBar.css("width", "0%");
                    cancelBtn.css("display", "none");
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert("Failed to upload file: " + textStatus);
                    progressBar.css("width", "0%");
                    cancelBtn.css("display", "none");
                }
            });
        });

        $(document).on("click", ".cancelBtn", function () {
            if (xhr && xhr.readyState !== 4) {
                xhr.abort();
                alert("File upload canceled.");
                $(this).siblings(".progressBar").css("width", "0%");
                $(this).siblings(".cancelBtn").css("display", "none");
            }
        });
    });
    });
</script>
@endpush
