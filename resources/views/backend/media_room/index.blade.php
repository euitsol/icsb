@extends('backend.layouts.master', ['pageSlug' => 'media_room'])

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
                            @include('backend.partials.button', ['routeName' => 'media_room.media_room_create', 'className' => 'btn-primary', 'label' => ' Create Media Room'])
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <div class="">
                        <table class="table tablesorter datatable">
                            <thead class=" text-primary">
                                <tr>
                                    <th>{{ _('Creation date') }}</th>
                                    <th>{{ _('Title') }}</th>
                                    <th>{{ _('Program Date') }}</th>
                                    <th>{{ _('Category') }}</th>
                                    <th>{{ _('Thumbnail Image') }}</th>
                                    {{-- <th>{{ _('Additional Images') }}</th>
                                    <th>{{ _('Files') }}</th> --}}
                                    <th>{{ _('Featured') }}</th>
                                    <th>{{ _('Status') }}</th>
                                    <th>{{ _('Created by') }}</th>
                                    <th>{{ _('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($media_rooms as $media_room)
                                    <tr>
                                        <td data-search="{{ date('d M, Y', strtotime($media_room->created_at)) }}" data-order="{{ date('Ymdhi', strtotime($media_room->created_at)) }}">
                                            {{ date('d M, Y', strtotime($media_room->created_at)) }}
                                        </td>                                        
                                        <td> {{ $media_room->title }} </td>
                                        <td> {{ $media_room->program_date ? date('d M, Y', strtotime($media_room->program_date)) : '' }} </td>
                                        <td> {{ $media_room->cat->name }} </td>
                                        <td><img class="rounded" width="60"
                                            src="@if ($media_room->thumbnail_image) {{ storage_url($media_room->thumbnail_image) }} @else {{ asset('no_img/no_img.jpg') }} @endif"
                                            alt="{{ $media_room->title }}">
                                        </td>
                                        <td><span class='{{ $media_room->getFeaturedStatusClass() }}'>{{ $media_room->getFeaturedStatus() }}</span></td>
                                        <td>
                                            <span class="badge {{ $media_room->getPermissionClass() }}">{{ $media_room->getPermission() }}</span>
                                        </td>
                                        <td> {{ $media_room->created_user->name ?? 'system' }} </td>
                                        <td>
                                            @include('backend.partials.action_buttons', [
                                                'menuItems' => [
                                                    ['routeName' => '', 'label' => 'View'],
                                                    ['routeName' => 'media_room.permission.accept.media_room_edit',   'params' => [$media_room->id], 'label' => 'Accept', 'className'=>$media_room->getPermissionAcceptTogleClassName() ],
                                                    ['routeName' => 'media_room.permission.decline.media_room_edit',   'params' => [$media_room->id], 'label' => 'Decline', 'className'=>$media_room->getPermissionDeclineTogleClassName() ],
                                                    ['routeName' => 'media_room.featured.media_room_edit',   'params' => [$media_room->id], 'label' => $media_room->getFeatured() ],
                                                    ['routeName' => 'media_room.media_room_edit',   'params' => [$media_room->id], 'label' => 'Update'],
                                                    ['routeName' => 'media_room.media_room_delete', 'params' => [$media_room->id], 'label' => 'Delete', 'delete' => true],
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
                            @include('backend.partials.button', ['routeName' => 'media_room.media_room_cat_create', 'className' => 'btn-primary', 'label' => 'Add Media Room Category'])
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="">
                        <table class="table tablesorter datatable">
                            <thead class=" text-primary">
                                <tr>
                                    <th>{{ _('Order') }}</th>
                                    <th>{{ _('Name') }}</th>
                                    <th>{{ _('Total media_rooms') }}</th>
                                    <th>{{ _('Status') }}</th>
                                    <th>{{ _('Creation date') }}</th>
                                    <th>{{ _('Created by') }}</th>
                                    <th>{{ _('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($media_room_cats as $cat)
                                    <tr>
                                        <td> {{ $cat->order_key }} </td>
                                        <td> {{ $cat->name }} </td>
                                        <td> {{ number_format($cat->media_rooms->count()) }} </td>
                                        <td>
                                            @include('backend.partials.button', ['routeName' => 'media_room.status.media_room_cat_edit','params' => [$cat->id], 'className' => $cat->getStatusClass(), 'label' => $cat->getStatus() ])
                                        </td>
                                        <td> {{ timeFormate($cat->created_at) }} </td>
                                        <td> {{ $cat->created_user->name ?? 'system' }} </td>
                                        <td>
                                            @include('backend.partials.action_buttons', [
                                                'menuItems' => [
                                                    ['routeName' => '', 'label' => 'View'],
                                                    ['routeName' => 'media_room.status.media_room_cat_edit',   'params' => [$cat->id], 'label' => 'Change Status'],
                                                    ['routeName' => 'media_room.media_room_cat_edit',   'params' => [$cat->id], 'label' => 'Update'],
                                                    ['routeName' => 'media_room.media_room_cat_delete', 'params' => [$cat->id], 'label' => 'Delete', 'delete' => true],
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

@include('backend.partials.datatable', ['columns_to_show' => [0,1,2,3,4,5],'order'=>'desc'])

