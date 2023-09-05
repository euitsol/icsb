@extends('backend.layouts.master', ['pageSlug' => 'event'])

@section('title', 'Event')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{ _('Event') }}</h4>
                        </div>
                        <div class="col-4 text-right">
                            @include('backend.partials.button', ['routeName' => 'event.event_create', 'className' => 'btn-primary', 'label' => 'Add Event'])
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
                                    {{-- <th>{{ _('Image') }}</th> --}}
                                    <th>{{ _('Event Duration') }}</th>
                                    <th>{{ _('Event Type') }}</th>
                                    <th>{{ _('Featured') }}</th>
                                    <th>{{ _('Status') }}</th>
                                    <th>{{ _('Creation date') }}</th>
                                    <th>{{ _('Created by') }}</th>
                                    <th>{{ _('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($events as $event)
                                    <tr>
                                        <td> {{ stringLimit($event->title, 30, '...') }} </td>
                                        {{-- <td>
                                            @foreach (json_decode($event->image) as $image)
                                                <img class="rounded" width="60" src="{{ $image ? (storage_url($image)) : (asset('no_img/no_img.jpg'))  }} "alt="{{ $event->title }}">
                                            @endforeach

                                        </td> --}}
                                        <td> {{ formatDateTimeRange($event->event_start_time, $event->event_end_time)}} </td>
                                        <td>
                                            <span class="badge {{ $event->getTypeClass() }}">{{ $event->getType() }}</span>
                                        </td>
                                        <td><span class='{{ $event->getFeaturedStatusClass() }}'>{{ $event->getFeaturedStatus() }}</span></td>
                                        <td>
                                            @include('backend.partials.button', ['routeName' => 'event.status.event_edit','params' => [$event->id], 'className' => $event->getStatusClass(), 'label' => $event->getStatus() ])
                                        </td>
                                        <td> {{ timeFormate($event->created_at) }} </td>
                                        <td> {{ $event->created_user->name ?? 'system' }} </td>
                                        <td>
                                            @include('backend.partials.action_buttons', [
                                                'menuItems' => [
                                                    ['routeName' => '', 'label' => 'View'],
                                                    ['routeName' => 'event.featured.event_edit',   'params' => [$event->id], 'label' => $event->getFeatured() ],
                                                    ['routeName' => 'event.event_edit',   'params' => [$event->id], 'label' => 'Update'],
                                                    ['routeName' => 'event.event_delete', 'params' => [$event->id], 'label' => 'Delete', 'delete' => true],
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

