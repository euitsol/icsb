@extends('backend.layouts.master', ['pageSlug' => 'member'])

@section('title', 'Member')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{ _('Member List') }}</h4>
                        </div>
                        <div class="col-4 text-right">
                            @include('backend.partials.button', ['routeName' => 'member.member_create', 'className' => 'btn-primary', 'label' => 'Create Member'])
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include('alerts.success')
                    <div class="">
                        <table class="table tablesorter datatable">
                            <thead class=" text-primary">
                                <tr>
                                    <th>{{ _('Membership ID') }}</th>
                                    <th>{{ _('Name') }}</th>
                                    <th>{{ _('Image') }}</th>
                                    <th>{{ _('Type') }}</th>
                                    <th>{{ _('Username') }}</th>
                                    <th>{{ _('Status') }}</th>
                                    <th>{{ _('Created at') }}</th>
                                    <th>{{ _('Created by') }}</th>
                                    <th>{{ _('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($members as $member)
                                    <tr>
                                        <td> {{ $member->membership_id }} </td>
                                        <td> {{ $member->name }} </td>
                                        <td>
                                            <img class="rounded" width="60" src="
                                            @if(!empty($member->image))
                                                {{ storage_url($member->image) }}
                                            @else
                                                {{ asset('no_img/no_img.jpg') }}
                                            @endif
                                            ">
                                        </td>
                                        <td> {{ $member->type->title  }} </td>
                                        <td> {{ $member->user->name }} </td>
                                        <td>
                                            @include('backend.partials.button', ['routeName' => 'member.status.member_edit','params' => [$member->id], 'className' => $member->getStatusClass(), 'label' => $member->getStatus() ])
                                        </td>
                                        <td> {{ timeFormate($member->created_at) }} </td>
                                        <td> {{ $member->created_user->name ?? 'system' }} </td>
                                        <td>
                                            @include('backend.partials.action_buttons', [
                                                'menuItems' => [
                                                    ['routeName' => '', 'label' => 'View'],
                                                    ['routeName' => 'member.member_edit',     'params' => [$member->id], 'label' => 'Update'],
                                                    ['routeName' => 'member.status.member_edit',   'params' => [$member->id], 'label' => 'Change Status'],
                                                    ['routeName' => 'member.member_delete',   'params' => [$member->id], 'label' => 'Delete', 'delete' => true],
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
                            <h4 class="card-title">{{ _('Member Types') }}</h4>
                        </div>
                        <div class="col-4 text-right">
                            @include('backend.partials.button', ['routeName' => 'member.member_type_create', 'className' => 'btn-primary', 'label' => 'Create Member Type'])
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="">
                        <table class="table tablesorter datatable">
                            <thead class=" text-primary">
                                <tr>
                                    <th>{{ _('Type Name') }}</th>
                                    <th>{{ _('Total Member') }}</th>
                                    <th>{{ _('Status') }}</th>
                                    <th>{{ _('Created at') }}</th>
                                    <th>{{ _('Created by') }}</th>
                                    <th>{{ _('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($types as $type)
                                    <tr>
                                        <td> {{ $type->title  }} </td>
                                        <td> {{ number_format($type->members->count()) }} </td>
                                        <td>
                                            @include('backend.partials.button', ['routeName' => 'member.status.member_type_edit','params' => [$type->id], 'className' => $type->getStatusClass(), 'label' => $type->getStatus() ])
                                        </td>
                                        <td> {{ timeFormate($type->created_at) }} </td>
                                        <td> {{ $type->created_user->name ?? 'system' }} </td>
                                        <td>
                                            @include('backend.partials.action_buttons', [
                                                'menuItems' => [
                                                    ['routeName' => '', 'label' => 'View'],
                                                    ['routeName' => 'member.member_type_edit',   'params' => [$type->id], 'label' => 'Update'],
                                                    ['routeName' => 'member.status.member_type_edit',   'params' => [$type->id], 'label' => 'Change Status'],
                                                    ['routeName' => 'member.member_type_delete', 'params' => [$type->id], 'label' => 'Delete', 'delete' => true],
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

