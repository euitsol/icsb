@extends('backend.layouts.master', ['pageSlug' => 'branch'])

@section('title', 'ICSB Branches')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{ _('ICSB Branches') }}</h4>
                        </div>
                        <div class="col-4 text-right">
                            @include('backend.partials.button', [
                                'routeName' => 'branch.branch_create',
                                'className' => 'btn-primary',
                                'label' => 'Add Branch',
                            ])
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
                                    <th>{{ _('Phone') }}</th>
                                    <th>{{ _('Email') }}</th>
                                    <th>{{ _('Address') }}</th>
                                    <th>{{ _('Status') }}</th>
                                    <th>{{ _('Creation date') }}</th>
                                    <th>{{ _('Created by') }}</th>
                                    <th>{{ _('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($branches as $branch)
                                    <tr>
                                        <td> {{ $branch->order_key }} </td>
                                        <td> {{ $branch->name }} </td>
                                        <td> {{ $branch->phone ?? 'NULL' }} </td>
                                        <td> {{ $branch->email ?? 'NULL' }} </td>
                                        <td> {!! $branch->address ? stringLimit($branch->address) : 'NULL' !!} </td>
                                        <td>
                                            @include('backend.partials.button', [
                                                'routeName' => 'branch.status.branch_edit',
                                                'params' => [$branch->id],
                                                'className' => $branch->getStatusClass(),
                                                'label' => $branch->getStatus(),
                                            ])
                                        </td>
                                        <td> {{ timeFormate($branch->created_at) }} </td>
                                        <td> {{ $branch->created_user->name ?? 'system' }} </td>
                                        <td>
                                            @include('backend.partials.action_buttons', [
                                                'menuItems' => [
                                                    ['routeName' => '', 'label' => 'View'],
                                                    [
                                                        'routeName' => 'branch.status.branch_edit',
                                                        'params' => [$branch->id],
                                                        'label' => 'Change Status',
                                                    ],
                                                    [
                                                        'routeName' => 'branch.branch_edit',
                                                        'params' => [$branch->id],
                                                        'label' => 'Update',
                                                    ],
                                                    [
                                                        'routeName' => 'branch.branch_delete',
                                                        'params' => [$branch->id],
                                                        'label' => 'Delete',
                                                        'delete' => true,
                                                    ],
                                                ],
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

@include('backend.partials.datatable', ['columns_to_show' => [0, 1, 2, 3, 4, 5, 6, 7]])
