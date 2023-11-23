@extends('backend.layouts.master', ['pageSlug' => 'council'])

@section('title', 'Council Member')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('alerts.success')
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{$council->title}}{{ _(' Member List') }}</h4>
                        </div>
                        <div class="col-4 text-right">
                            @include('backend.partials.button', ['routeName' => 'council.council_member_create','params'=>[$council->id], 'className' => 'btn-primary', 'label' => 'Add Council Member'])
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
                                    <th>{{ _('Image') }}</th>
                                    <th>{{ _('Member Type') }}</th>
                                    <th>{{ _('Responsibility') }}</th>
                                    <th>{{ _('Status') }}</th>
                                    <th>{{ _('Created at') }}</th>
                                    <th>{{ _('Created by') }}</th>
                                    <th>{{ _('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($council_members as $council_member)
                                    <tr>
                                        <td> {{ $council_member->order_key }} </td>
                                        <td> {{ $council_member->member->name }} </td>
                                        <td>
                                            <img class="rounded" width="60" src="{{getMemberImage($council_member->member)}}">
                                        </td>
                                        <td> {{ $council_member->member->member_type()  }} </td>
                                        <td> {{ $council_member->council_member_type->title  }} </td>
                                        <td>
                                            @include('backend.partials.button', ['routeName' => 'council.status.council_member_edit','params' => [$council_member->id], 'className' => $council_member->getStatusClass(), 'label' => $council_member->getStatus() ])
                                        </td>
                                        <td> {{ timeFormate($council_member->created_at) }} </td>
                                        <td> {{ $council_member->created_user->name ?? 'system' }} </td>
                                        <td>
                                            @include('backend.partials.action_buttons', [
                                                'menuItems' => [
                                                    ['routeName' => '', 'label' => 'View'],
                                                    ['routeName' => 'council.council_member_edit',     'params' => [$council_member->id], 'label' => 'Update'],
                                                    ['routeName' => 'council.status.council_member_edit',   'params' => [$council_member->id], 'label' => 'Change Status'],
                                                    ['routeName' => 'council.council_member_delete',   'params' => [$council_member->id], 'label' => 'Delete', 'delete' => true],
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

