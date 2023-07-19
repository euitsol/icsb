@if ($errors->has($field))
    @if(count(($errors->get($field)))>1)
        @foreach($errors->get($field) as $error)
            <span class="invalid-feedback d-block" role="alert">{{ $error }}</span>
        @endforeach
    @else
        <span class="invalid-feedback d-block" role="alert">{{ $errors->first($field) }}</span>
    @endif
@endif
