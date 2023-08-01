@extends('backend.layouts.master', ['pageSlug' => 'committee'])

@section('title', 'Committee')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('alerts.success')
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{ _('Committee Type List') }}</h4>
                        </div>
                        <div class="col-4 text-right">
                            @include('backend.partials.button', ['routeName' => 'committee.committee_type_create', 'className' => 'btn-primary', 'label' => 'Create Committee Type'])
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="">
                        <table class="table tablesorter datatable">
                            <thead class=" text-primary">
                                <tr>
                                    <th>{{ _('Title') }}</th>
                                    <th>{{ _('Total Committee') }}</th>
                                    <th>{{ _('Status') }}</th>
                                    <th>{{ _('Created at') }}</th>
                                    <th>{{ _('Created by') }}</th>
                                    <th>{{ _('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($c_types as $type)
                                    <tr>
                                        <td> {{ $type->title }} </td>
                                        <td>
                                            {{ number_format($type->committees->count()) }}
                                        </td>
                                        <td>
                                            @include('backend.partials.button', ['routeName' => 'committee.status.committee_type_edit','params' => [$type->id], 'className' => $type->getStatusClass(), 'label' => $type->getStatus() ])
                                        </td>
                                        <td> {{ timeFormate($type->created_at) }} </td>
                                        <td> {{ $type->created_user->name ?? 'system' }} </td>
                                        <td>
                                            @include('backend.partials.action_buttons', [
                                                'menuItems' => [
                                                    ['routeName' => '', 'label' => 'View'],
                                                    ['routeName' => 'committee.committee_type_edit',     'params' => [$type->id], 'label' => 'Update'],
                                                    ['routeName' => 'committee.status.committee_type_edit',   'params' => [$type->id], 'label' => 'Change Status'],
                                                    ['routeName' => 'committee.committee_type_delete',   'params' => [$type->id], 'label' => 'Delete', 'delete' => true],
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


            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{ _('Committee Member Type List') }}</h4>
                        </div>
                        <div class="col-4 text-right">
                            @include('backend.partials.button', ['routeName' => 'committee.cm_type_create', 'className' => 'btn-primary', 'label' => 'Create Committee Member Type'])
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="">
                        <table class="table tablesorter datatable">
                            <thead class=" text-primary">
                                <tr>
                                    <th>{{ _('Title') }}</th>
                                    <th>{{ _('Total Member') }}</th>
                                    <th>{{ _('Status') }}</th>
                                    <th>{{ _('Created at') }}</th>
                                    <th>{{ _('Created by') }}</th>
                                    <th>{{ _('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cm_types as $type)
                                    <tr>
                                        <td> {{ $type->title  }} </td>
                                        <td> {{ number_format($type->committe_member_type_members->count()) }} </td>
                                        <td>
                                            @include('backend.partials.button', ['routeName' => 'committee.status.cm_type_edit','params' => [$type->id], 'className' => $type->getStatusClass(), 'label' => $type->getStatus() ])
                                        </td>
                                        <td> {{ timeFormate($type->created_at) }} </td>
                                        <td> {{ $type->created_user->name ?? 'system' }} </td>
                                        <td>
                                            @include('backend.partials.action_buttons', [
                                                'menuItems' => [
                                                    ['routeName' => '', 'label' => 'View'],
                                                    ['routeName' => 'committee.cm_type_edit',   'params' => [$type->id], 'label' => 'Update'],
                                                    ['routeName' => 'committee.status.cm_type_edit',   'params' => [$type->id], 'label' => 'Change Status'],
                                                    ['routeName' => 'committee.cm_type_delete', 'params' => [$type->id], 'label' => 'Delete', 'delete' => true],
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

            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{ _('Committee') }}</h4>
                        </div>
                        <div class="col-4 text-right">
                            @include('backend.partials.button', ['routeName' => 'committee.committee_create', 'className' => 'btn-primary', 'label' => 'Create Committee'])
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="">
                        <table class="table tablesorter datatable">
                            <thead class=" text-primary">
                                <tr>
                                    <th>{{ _('Title') }}</th>
                                    <th>{{ _('Total Member') }}</th>
                                    <th>{{ _('Status') }}</th>
                                    <th>{{ _('Created at') }}</th>
                                    <th>{{ _('Created by') }}</th>
                                    <th>{{ _('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($committees as $committee)
                                    <tr>
                                        <td> {{ $committee->title  }} </td>
                                        <td> {{ number_format($committee->committe_members->count()) }} </td>
                                        <td>
                                            @include('backend.partials.button', ['routeName' => 'committee.status.committee_edit','params' => [$committee->id], 'className' => $committee->getStatusClass(), 'label' => $committee->getStatus() ])
                                        </td>
                                        <td> {{ timeFormate($committee->created_at) }} </td>
                                        <td> {{ $committee->created_user->name ?? 'system' }} </td>
                                        <td>
                                            @include('backend.partials.action_buttons', [
                                                'menuItems' => [
                                                    ['routeName' => '', 'label' => 'View'],
                                                    ['routeName' => 'committee.committee_edit',   'params' => [$committee->id], 'label' => 'Update'],
                                                    ['routeName' => 'committee.committee_member_list',   'params' => [$committee->id], 'label' => 'Committee Members'],
                                                    ['routeName' => 'committee.status.committee_edit',   'params' => [$committee->id], 'label' => 'Change Status'],
                                                    ['routeName' => 'committee.committee_delete', 'params' => [$committee->id], 'label' => 'Delete', 'delete' => true],
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

