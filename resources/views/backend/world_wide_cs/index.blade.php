@extends('backend.layouts.master', ['pageSlug' => 'wwcs'])

@section('title', 'World Wide CS')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{ _('National World Wide CS') }}</h4>
                        </div>
                        <div class="col-4 text-right">
                            @include('backend.partials.button', ['routeName' => 'wwcs.wwcs_create', 'className' => 'btn-primary', 'label' => 'Add World Wide CS'])
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
                                    <th>{{ _('Email') }}</th>
                                    <th>{{ _('URL') }}</th>
                                    <th>{{ _('Status') }}</th>
                                    <th>{{ _('Creation date') }}</th>
                                    <th>{{ _('Created by') }}</th>
                                    <th>{{ _('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($wwcss as $wwcs)
                                    <tr>
                                        <td> {{ $wwcs->title }} </td>
                                        <td><img class="rounded" width="60"
                                            src="@if ($wwcs->logo) {{ storage_url($wwcs->logo) }} @else {{ asset('no_img/no_img.jpg') }} @endif"
                                            alt="{{ $wwcs->title }}">
                                        </td>
                                        <td> {{ removeHttpProtocol($wwcs->url) }} </td>
                                        <td> {{ $wwcs->email }} </td>
                                        <td>
                                            @include('backend.partials.button', ['routeName' => 'wwcs.status.wwcs_edit','params' => [$wwcs->id], 'className' => $wwcs->getStatusClass(), 'label' => $wwcs->getStatus() ])
                                        </td>
                                        <td> {{ timeFormate($wwcs->created_at) }} </td>
                                        <td> {{ $wwcs->created_user->name ?? 'system' }} </td>
                                        <td>
                                            @include('backend.partials.action_buttons', [
                                                'menuItems' => [
                                                    ['routeName' => '', 'label' => 'View'],
                                                    ['routeName' => 'wwcs.wwcs_edit',   'params' => [$wwcs->id], 'label' => 'Update'],
                                                    ['routeName' => 'wwcs.wwcs_delete', 'params' => [$wwcs->id], 'label' => 'Delete', 'delete' => true],
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

@include('backend.partials.datatable', ['columns_to_show' => [0,1,2,3,4,5,6]])

