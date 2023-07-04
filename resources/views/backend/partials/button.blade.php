
@php
    //This function will take the route name and return the access permission.
    $check = check_access_by_route_name($routeName);
@endphp

@if($check)
    <a href="{{ route($routeName) }}" class="btn btn-sm {{$className}}">{{ _($label) }}</a>
@endif
