@extends('backend.layouts.master', ['pageSlug' => 'latest_news'])

@section('title', 'Edit Latest News')
@push('css')
<style>
    .input-group .form-control {
    padding: 8px 0px 10px 18px;
    }
    .input-group .form-control:first-child, .input-group-btn:first-child>.dropdown-toggle, .input-group-btn:last-child>.btn:not(:last-child):not(.dropdown-toggle) {
        border-right: 1px solid rgba(29, 37, 59, 0.5);
    }
    .input-group .form-control:not(:first-child):not(:last-child), .input-group-btn:not(:first-child):not(:last-child) {
        border-radius: 0;
        border-right: 0;
    }
</style>
@endpush

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ _('Edit Latest News') }}</h5>
                </div>
                <form method="POST" action="{{ route('latest_news.latest_news_edit', $latest_news->id) }}" autocomplete="off" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-8 {{ $errors->has('title') ? ' has-danger' : '' }}">
                                <label>{{ _('Title') }}</label>
                                <input type="text" name="title" id="title" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="{{ _('Enter Title') }}" value="{{ $latest_news->title }}">
                                @include('alerts.feedback', ['field' => 'title'])
                            </div>
                            <div class="col-md-4 form-group {{ $errors->has('order_key') ? ' has-danger' : '' }}">
                                <label>{{ _('Order') }}</label>
                                <select class="form-control {{ $errors->has('order_key') ? ' is-invalid' : '' }}" name="order_key">
                                    @for ($x=1; $x<=1000; $x++)
                                        @php
                                            $check = App\Models\LatestNews::where('order_key',$x)->first();
                                        @endphp
                                        @if($latest_news->order_key == $x)
                                            <option value="{{$x}}" selected>{{ $x }}</option>
                                        @elseif(!$check)
                                            <option value="{{$x}}">{{ $x }}</option>
                                        @endif
                                    @endfor
                                </select>
                                @include('alerts.feedback', ['field' => 'order_key'])
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('slug') ? ' has-danger' : '' }}">
                            <label>{{ _('Slug') }}</label>
                            <input type="text" class="form-control {{ $errors->has('slug') ? ' is-invalid' : '' }}" id="slug" name="slug" placeholder="{{ _('Enter Slug (must be use - on white speace)') }}" value="{{ $latest_news->slug }}">
                            @include('alerts.feedback', ['field' => 'slug'])
                        </div>
                        <div class="form-group {{ $errors->has('date') ? ' has-danger' : '' }}">
                            <label>{{ _('News Date') }}</label>
                            <input type="date" class="form-control {{ $errors->has('date') ? ' is-invalid' : '' }}" name="date" value="{{date('Y-m-d', strtotime($latest_news->date))}}">
                            @include('alerts.feedback', ['field' => 'date'])
                        </div>
                       <div class="form-group  {{ $errors->has('images.*') ? 'is-invalid' : '' }}  {{ $errors->has('images') ? 'is-invalid' : '' }}">
                        @php
                                $data = json_decode($latest_news->images, true);
                                $result = '';
                                $itemCount = count($data);
                                foreach ($data as $index => $url) {
                                    $result .= route('json_image.single.delete', ['LatestNews', $latest_news->id,$index,'images' ]);
                                    if($index === $itemCount - 1) {
                                        $result .= '';
                                    }else{
                                        $result .= ', ';
                                    }
                                }
                            @endphp
                            <label>{{ _('Upload Images') }}</label>
                            <input type="file" accept="image/*" name="images[]" class="form-control  {{ $errors->has('images.*') ? 'is-invalid' : '' }}  {{ $errors->has('images') ? 'is-invalid' : '' }} image-upload" multiple
                            @if(isset($data))
                                data-existing-files="{{ storage_url($data) }}"
                                data-delete-url="{{ $result }}"
                            @endif
                            >
                            @include('alerts.feedback', ['field' => 'images'])
                            @include('alerts.feedback', ['field' => 'images.*'])
                        </div>
                        @php
                            $count = 0;
                        @endphp
                        @if(isset($latest_news) && !empty(json_decode($latest_news->files)))
                            @foreach (json_decode($latest_news->files) as $key=>$file)
                            @php
                                $count++;
                            @endphp
                                <div class="form-group" @if($count) id="file-{{$count}}" @endif>
                                    <label>{{ _('File-'.$count) }}</label>
                                    <div class="input-group mb-3">
                                        <input type="text" name="file[{{$count}}][file_name]" class="form-control" value="{{$file->file_name}}" disabled>
                                        <input type="text" name="file[{{$count}}][file_path]" class="form-control" value="{{$file->file_path}}" disabled>
                                        <a href="{{route('latest_news.single_file.delete.latest_news_edit',['key'=>$key, 'id'=>$latest_news->id])}}">
                                            <span class="input-group-text text-danger h-100"><i class="tim-icons icon-trash-simple"></i></span>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                            <div class="form-group">
                                <label>{{ _('File-'.(count(json_decode($latest_news->files, true)))+1) }}</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="file[{{ count(json_decode($latest_news->files, true))+1 }}][file_name]" class="form-control" placeholder="{{ _('Enter file name') }}" >
                                    <input type="file" accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.odt,.ods,.odp" name="file[{{ count(json_decode($latest_news->files, true))+1 }}][file_path]" class="form-control" >
                                    <span class="input-group-text" id="add_file" data-count="{{ count(json_decode($latest_news->files, true))+1 }}"><i class="tim-icons icon-simple-add"></i></span>
                                </div>
                            </div>
                        @else
                            <div class="form-group">
                                <label>{{ _('File-1') }}</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="file[1][file_name]" class="form-control" placeholder="{{ _('Enter file name') }}" >
                                    <input type="file" accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.odt,.ods,.odp" name="file[1][file_path]" class="form-control" >
                                    <span class="input-group-text" id="add_file" data-count="1"><i class="tim-icons icon-simple-add"></i></span>
                                </div>
                            </div>
                        @endif
                        <div id="file">

                        </div>
                        <div class="form-group {{ $errors->has('description') ? ' has-danger' : '' }}">
                            <label>{{ _('Description') }} </label>
                            <textarea rows="3" name="description" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}">
                                {{ $latest_news->description }}
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
                        <b>{{ _('Latest News') }}</b>
                    </p>
                    <div class="card-description">
                        <p><b>Title:</b> This field is required and unique. It is a text field with character limit of 255 characters.</p>
                        <p><b>Slug:</b> This field is required and unique. It is an auto-generated field from the Title. It represents the URL of the Latest News.</p>
                        <p><b>News Date:</b> This field is required. It is a date field.</p>
                        <p><b>Upload Images:</b> This field is nullable. It supports file uploads in jpeg, png, jpg, gif, & svg format, with a maximum size limit of 5MB. The dimensions of the image should be 1200 x 800px. You can select multiple images by pressing the 'SHIFT/CTRL' key.</p>
                        <p><b>File-* :</b> This field is required.  The name filed should be the file name. It supports file uploads in jpg,png,pdf, doc, docx, xls, xlsx, ppt, pptx, odt, ods, & odp format. By clicking on the '+' icon you can upload multiple files.</p>
                        <p><b>Description:</b> This field is required. It is a textarea field</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js_link')
    <script src="{{asset('backend/js/multi_file_and_slug.js')}}"></script>
@endpush

