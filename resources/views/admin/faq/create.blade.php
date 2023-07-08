@extends('layouts.app', ['page' => __('FAQ'), 'pageSlug' => 'faq'])

@section('content')
<div class="col-md-12">
    <form action="{{route('faq.store')}}" method="POST" class="form-horizontal">
        <div class="card-body">
            @csrf
            <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                <label>Title</label>
                <input type="text" name="title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="Enter faq question" value="{{ old('title') }}">
                @include('alerts.feedback', ['field' => 'title'])
            </div>
            <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                <label>Description</label>
                <textarea type="textarea" name="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" placeholder="Enter faq answer" required>{{ old('description') }}</textarea>
                @include('alerts.feedback', ['field' => 'description'])
            </div>

    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-fill btn-primary">Save</button>
    </div>
    </form>
</div>
@endsection
