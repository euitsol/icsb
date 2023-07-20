@extends('backend.layouts.master', ['pageSlug' => 'national_connection'])

@section('title', 'National Connection')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{ _('National Connection') }}</h4>
                        </div>
                        <div class="col-4 text-right">
                            @include('backend.partials.button', ['routeName' => 'national_connection.national_connection_create', 'className' => 'btn-primary', 'label' => 'Add National Connection'])
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
                                    <th>{{ _('Logo') }}</th>
                                    <th>{{ _('URL') }}</th>
                                    <th>{{ _('Status') }}</th>
                                    <th>{{ _('Creation date') }}</th>
                                    <th>{{ _('Created by') }}</th>
                                    <th>{{ _('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($national_connections as $connection)
                                    <tr>
                                        <td> {{ $connection->title }} </td>
                                        <td><img class="rounded" width="60"
                                            src="@if ($connection->logo) {{ storage_url($connection->logo) }} @else {{ asset('no_img/no_img.jpg') }} @endif"
                                            alt="{{ $connection->title }}">
                                        </td>
                                        <td> {{ $connection->url }} </td>
                                        <td>
                                            @include('backend.partials.button', ['routeName' => 'national_connection.status.national_connection_edit','params' => [$connection->id], 'className' => $connection->getStatusClass(), 'label' => $connection->getStatus() ])
                                        </td>
                                        <td> {{ timeFormate($connection->created_at) }} </td>
                                        <td> {{ $connection->created_user->name ?? 'system' }} </td>
                                        <td>
                                            @include('backend.partials.action_buttons', [
                                                'menuItems' => [
                                                    ['routeName' => '', 'label' => 'View'],
                                                    ['routeName' => 'national_connection.national_connection_edit',   'params' => [$connection->id], 'label' => 'Update'],
                                                    ['routeName' => 'national_connection.national_connection_delete', 'params' => [$connection->id], 'label' => 'Delete', 'delete' => true],
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

