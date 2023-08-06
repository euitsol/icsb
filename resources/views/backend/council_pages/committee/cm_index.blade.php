@extends('backend.layouts.master', ['pageSlug' => 'committee'])

@section('title', 'Committee Member')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('alerts.success')
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{$committee->title}}{{ _(' Member List') }}</h4>
                        </div>
                        <div class="col-4 text-right">
                            @include('backend.partials.button', ['routeName' => 'committee.committee_member_create','params'=>[$committee->id], 'className' => 'btn-primary', 'label' => 'Add Committee Member'])
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="">
                        <table class="table tablesorter datatable">
                            <thead class=" text-primary">
                                <tr>
                                    <th>{{ _('Name') }}</th>
                                    <th>{{ _('Image') }}</th>
                                    <th>{{ _('Member Type') }}</th>
                                    <th>{{ _('Committee Type') }}</th>
                                    <th>{{ _('Responsibility') }}</th>
                                    <th>{{ _('Status') }}</th>
                                    <th>{{ _('Created at') }}</th>
                                    <th>{{ _('Created by') }}</th>
                                    <th>{{ _('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($committee->committe_members as $committee_member)
                                    <tr>
                                        <td> {{ $committee_member->member->name }} </td>
                                        <td>
                                            <img class="rounded" width="60" src="{{getMemberImage($committee_member->member)}}">
                                        </td>
                                        <td> {{ $committee_member->member->type->title  }} </td>
                                        <td> {{ $committee_member->committe->committe_type->title  }} </td>
                                        <td> {{ $committee_member->committe_member_type->title  }} </td>
                                        <td>
                                            @include('backend.partials.button', ['routeName' => 'committee.status.committee_member_edit','params' => [$committee_member->id], 'className' => $committee_member->getStatusClass(), 'label' => $committee_member->getStatus() ])
                                        </td>
                                        <td> {{ timeFormate($committee_member->created_at) }} </td>
                                        <td> {{ $committee_member->created_user->name ?? 'system' }} </td>
                                        <td>
                                            @include('backend.partials.action_buttons', [
                                                'menuItems' => [
                                                    ['routeName' => '', 'label' => 'View'],
                                                    ['routeName' => 'committee.committee_member_edit',     'params' => [$committee_member->id], 'label' => 'Update'],
                                                    ['routeName' => 'committee.status.committee_member_edit',   'params' => [$committee_member->id], 'label' => 'Change Status'],
                                                    ['routeName' => 'committee.committee_member_delete',   'params' => [$committee_member->id], 'label' => 'Delete', 'delete' => true],
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

