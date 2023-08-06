@extends('backend.layouts.master', ['pageSlug' => 'blog'])

@section('title', 'Media Room')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                @include('alerts.success')
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{ _('Media Room') }}</h4>
                        </div>
                        <div class="col-4 text-right">
                            @include('backend.partials.button', ['routeName' => 'blog.blog_create', 'className' => 'btn-primary', 'label' => ' Create Media Room'])
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <div class="">
                        <table class="table tablesorter datatable">
                            <thead class=" text-primary">
                                <tr>
                                    <th>{{ _('Title') }}</th>
                                    <th>{{ _('Category') }}</th>
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
                                        <td> {{ $blog->cat->name }} </td>
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
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{ _('Media Room Category') }}</h4>
                        </div>
                        <div class="col-4 text-right">
                            @include('backend.partials.button', ['routeName' => 'blog.blog_cat_create', 'className' => 'btn-primary', 'label' => 'Add Media Room Category'])
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="">
                        <table class="table tablesorter datatable">
                            <thead class=" text-primary">
                                <tr>
                                    <th>{{ _('Name') }}</th>
                                    <th>{{ _('Total Blogs') }}</th>
                                    <th>{{ _('Status') }}</th>
                                    <th>{{ _('Creation date') }}</th>
                                    <th>{{ _('Created by') }}</th>
                                    <th>{{ _('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($blog_cats as $cat)
                                    <tr>
                                        <td> {{ $cat->name }} </td>
                                        <td> {{ number_format($cat->blogs->count()) }} </td>
                                        <td>
                                            @include('backend.partials.button', ['routeName' => 'blog.status.blog_cat_edit','params' => [$cat->id], 'className' => $cat->getStatusClass(), 'label' => $cat->getStatus() ])
                                        </td>
                                        <td> {{ timeFormate($cat->created_at) }} </td>
                                        <td> {{ $cat->created_user->name ?? 'system' }} </td>
                                        <td>
                                            @include('backend.partials.action_buttons', [
                                                'menuItems' => [
                                                    ['routeName' => '', 'label' => 'View'],
                                                    ['routeName' => 'blog.status.blog_cat_edit',   'params' => [$cat->id], 'label' => 'Change Status'],
                                                    ['routeName' => 'blog.blog_cat_edit',   'params' => [$cat->id], 'label' => 'Update'],
                                                    ['routeName' => 'blog.blog_cat_delete', 'params' => [$cat->id], 'label' => 'Delete', 'delete' => true],
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

@include('backend.partials.datatable', ['columns_to_show' => [0,1,2,3,4,5]])

