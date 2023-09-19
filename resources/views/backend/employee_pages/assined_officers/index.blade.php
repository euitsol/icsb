@extends('backend.layouts.master', ['pageSlug' => 'assined_officer'])

@section('title', 'Assigned Officer')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{ _('Assigned Officer') }}</h4>
                        </div>
                        <div class="col-4 text-right">
                            @include('backend.partials.button', ['routeName' => 'assined_officer.assined_officer_create', 'className' => 'btn-primary', 'label' => 'Add Assigned Officer'])
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include('alerts.success')
                    <div class="">
                        <table class="table tablesorter datatable">
                            <thead class=" text-primary">
                                <tr>
                                    <th>{{ _('Order') }}</th>
                                    <th>{{ _('Name') }}</th>
                                    <th>{{ _('Image') }}</th>
                                    <th>{{ _('Designation') }}</th>
                                    <th>{{ _('Phone') }}</th>
                                    <th>{{ _('Email') }}</th>
                                    <th>{{ _('Status') }}</th>
                                    <th>{{ _('Creation date') }}</th>
                                    <th>{{ _('Created by') }}</th>
                                    <th>{{ _('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($assined_officers as $asf)
                                    <tr>
                                        <td> {{ $asf->order_key }} </td>
                                        <td> {{ $asf->name }} </td>
                                        <td><img class="rounded" width="60"
                                            src="@if ($asf->image) {{ storage_url($asf->image) }} @else {{ asset('no_img/no_img.jpg') }} @endif"
                                            alt="{{ $asf->name }}">
                                        </td>
                                        <td> {{ $asf->designation }} </td>
                                        <td> {{ $asf->phone }} </td>
                                        <td> {{ $asf->email }} </td>
                                        <td>
                                            @include('backend.partials.button', ['routeName' => 'assined_officer.status.assined_officer_edit','params' => [$asf->id], 'className' => $asf->getStatusClass(), 'label' => $asf->getStatus() ])
                                        </td>
                                        <td> {{ timeFormate($asf->created_at) }} </td>
                                        <td> {{ $asf->created_user->name ?? 'system' }} </td>
                                        <td>
                                            @include('backend.partials.action_buttons', [
                                                'menuItems' => [
                                                    ['routeName' => '', 'label' => 'View'],
                                                    ['routeName' => 'assined_officer.status.assined_officer_edit',   'params' => [$asf->id], 'label' => 'Change Status'],
                                                    ['routeName' => 'assined_officer.assined_officer_edit',   'params' => [$asf->id], 'label' => 'Update'],
                                                    ['routeName' => 'assined_officer.assined_officer_delete', 'params' => [$asf->id], 'label' => 'Delete', 'delete' => true],
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

@include('backend.partials.datatable', ['columns_to_show' => [0,1,2,3,4,5,6,7,8]])

