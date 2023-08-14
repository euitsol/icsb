@extends('backend.layouts.master', ['pageSlug' => 'recent_video'])

@section('title', 'Recent Video')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{ _('Recent Video') }}</h4>
                        </div>
                        <div class="col-4 text-right">
                            @include('backend.partials.button', ['routeName' => 'recent_video.recent_video_create', 'className' => 'btn-primary', 'label' => 'Add Recent Video'])
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
                                    <th>{{ _('URL') }}</th>
                                    <th>{{ _('Status') }}</th>
                                    <th>{{ _('Creation date') }}</th>
                                    <th>{{ _('Created by') }}</th>
                                    <th>{{ _('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($recent_videos as $recent_video)
                                    <tr>
                                        <td> {{ stringLimit(html_entity_decode_table($recent_video->title)) }} </td>
                                        <td> {{ stringLimit(removeHttpProtocol($recent_video->url),'30') }} </td>
                                        <td>
                                            @include('backend.partials.button', ['routeName' => 'recent_video.status.recent_video_edit','params' => [$recent_video->id], 'className' => $recent_video->getStatusClass(), 'label' => $recent_video->getStatus() ])
                                        </td>
                                        <td> {{ timeFormate($recent_video->created_at) }} </td>
                                        <td> {{ $recent_video->created_user->name ?? 'system' }} </td>
                                        <td>
                                            @include('backend.partials.action_buttons', [
                                                'menuItems' => [
                                                    ['routeName' => '', 'label' => 'View'],
                                                    ['routeName' => 'recent_video.status.recent_video_edit',   'params' => [$recent_video->id], 'label' => 'Change Status'],
                                                    ['routeName' => 'recent_video.recent_video_edit',   'params' => [$recent_video->id], 'label' => 'Update'],
                                                    ['routeName' => 'recent_video.recent_video_delete', 'params' => [$recent_video->id], 'label' => 'Delete', 'delete' => true],
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

@include('backend.partials.datatable', ['columns_to_show' => [0,1,2,3,4]])

