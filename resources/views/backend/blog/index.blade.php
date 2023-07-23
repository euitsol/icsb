@extends('backend.layouts.master', ['pageSlug' => 'blog'])

@section('title', 'Blog')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{ _('Blog') }}</h4>
                        </div>
                        <div class="col-4 text-right">
                            @include('backend.partials.button', ['routeName' => 'blog.blog_create', 'className' => 'btn-primary', 'label' => 'Add Blog'])
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include('alerts.success')
                    <div class="">
                        <table class="table tablesorter datatable">
                            <thead class=" text-primary">
                                <tr>
                                    <th>{{ _('Title') }}</th>
                                    <th>{{ _('Thumbnail Image') }}</th>
                                    {{-- <th>{{ _('Additional Images') }}</th>
                                    <th>{{ _('Files') }}</th> --}}
                                    <th>{{ _('Featured') }}</th>
                                    <th>{{ _('Status') }}</th>
                                    <th>{{ _('Creation date') }}</th>
                                    <th>{{ _('Created by') }}</th>
                                    <th>{{ _('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($blogs as $blog)
                                    <tr>
                                        <td> {{ $blog->title }} </td>
                                        <td><img class="rounded" width="60"
                                            src="@if ($blog->thumbnail_image) {{ storage_url($blog->thumbnail_image) }} @else {{ asset('no_img/no_img.jpg') }} @endif"
                                            alt="{{ $blog->title }}">
                                        </td>
                                        {{-- <td>
                                            @if(!empty(json_decode($blog->additional_images)))
                                                @foreach (json_decode($blog->additional_images) as $image)
                                                    <img class="rounded" width="60"
                                                    src="{{ storage_url($image) }}"
                                                    alt="{{ $blog->title }}">
                                                @endforeach
                                            @else
                                                <img class="rounded" width="60"
                                                src="{{ asset('no_img/no_img.jpg') }}"
                                                alt="{{ $blog->title }}">
                                            @endif

                                        </td>
                                        <td>
                                            @if(!empty(json_decode($blog->files)))
                                                @foreach (json_decode($blog->files) as $file)
                                                    @if(!empty($file->file_path))
                                                        <a href="{{route('download',base64_encode($file->file_path))}}" class="btn btn-info btn-sm {{$file->file_path ?  : 'd-none'}}"><i class="fa-regular fa-circle-down"></i></a>
                                                    @endif
                                                @endforeach
                                            @endif

                                        </td> --}}
                                        <td><span class='{{ $blog->getFeaturedStatusClass() }}'>{{ $blog->getFeaturedStatus() }}</span></td>
                                        <td>
                                            <span class="badge {{ $blog->getPermissionClass() }}">{{ $blog->getPermission() }}</span>
                                        </td>
                                        <td> {{ timeFormate($blog->created_at) }} </td>
                                        <td> {{ $blog->created_user->name ?? 'system' }} </td>
                                        <td>
                                            @include('backend.partials.action_buttons', [
                                                'menuItems' => [
                                                    ['routeName' => '', 'label' => 'View'],
                                                    ['routeName' => 'blog.permission.accept.blog_edit',   'params' => [$blog->id], 'label' => 'Accept', 'className'=>$blog->getPermissionAcceptTogleClassName() ],
                                                    ['routeName' => 'blog.permission.decline.blog_edit',   'params' => [$blog->id], 'label' => 'Decline', 'className'=>$blog->getPermissionDeclineTogleClassName() ],
                                                    ['routeName' => 'blog.featured.blog_edit',   'params' => [$blog->id], 'label' => $blog->getFeatured() ],
                                                    ['routeName' => 'blog.blog_edit',   'params' => [$blog->id], 'label' => 'Update'],
                                                    ['routeName' => 'blog.blog_delete', 'params' => [$blog->id], 'label' => 'Delete', 'delete' => true],
                                                ]
                                            ])
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@include('backend.partials.datatable', ['columns_to_show' => [0,1,2]])

