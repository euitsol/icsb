@extends('backend.layouts.master', ['pageSlug' => 'service'])

@section('title', 'Service')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{ _('Service') }}</h4>
                        </div>
                        <div class="col-4 text-right">
                            @include('backend.partials.button', ['routeName' => 'service.service_create', 'className' => 'btn-primary', 'label' => 'Add Service'])
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
                                    <th>{{ _('Image') }}</th>
                                    <th>{{ _('Description') }}</th>
                                    <th>{{ _('Creation date') }}</th>
                                    <th>{{ _('Created by') }}</th>
                                    <th>{{ _('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($services as $service)
                                    <tr>
                                        <td> {{ $service->title }} </td>
                                        <td><img class="rounded" width="60"
                                            src="@if ($service->image) {{ asset('storage/'.$service->image) }} @else {{ asset('no_img/no_img.jpg') }} @endif"
                                            alt="{{ $service->title }}">
                                        </td>
                                        <td> {{ $service->description }} </td>
                                        <td> {{ $service->created_at }} </td>
                                        <td> {{ $service->created_user->name ?? 'system' }} </td>
                                        <td>
                                            @include('backend.partials.action_buttons', [
                                                'menuItems' => [
                                                    ['routeName' => '', 'label' => 'View'],
                                                    ['routeName' => 'service.service_edit',   'params' => [$service->id], 'label' => 'Update'],
                                                    ['routeName' => 'service.service_delete', 'params' => [$service->id], 'label' => 'Delete', 'delete' => true],
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

