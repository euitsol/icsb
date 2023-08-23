@extends('backend.layouts.master', ['pageSlug' => 'council'])

@section('title', 'Council')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('alerts.success')
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{ _('Council') }}</h4>
                        </div>
                        <div class="col-4 text-right">
                            @include('backend.partials.button', ['routeName' => 'council.council_create', 'className' => 'btn-primary', 'label' => 'Create Council'])
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="">
                        <table class="table tablesorter datatable">
                            <thead class=" text-primary">
                                <tr>
                                    <th>{{ _('Order') }}</th>
                                    <th>{{ _('Title') }}</th>
                                    <th>{{ _('Duration') }}</th>
                                    <th>{{ _('Total Member') }}</th>
                                    <th>{{ _('Status') }}</th>
                                    <th>{{ _('Created at') }}</th>
                                    <th>{{ _('Created by') }}</th>
                                    <th>{{ _('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($councils as $council)
                                    <tr>
                                        <td> {{ $council->order_key  }} </td>
                                        <td> {{ $council->title  }} </td>
                                        <td> {{ date('Y', strtotime(json_decode($council->duration)->start_date)) . ' - ' . date('Y', strtotime(json_decode($council->duration)->start_date))}} </td>
                                        <td> {{ number_format($council->council_members->count()) }} </td>
                                        <td>
                                            @include('backend.partials.button', ['routeName' => 'council.status.council_edit','params' => [$council->id], 'className' => $council->getStatusClass(), 'label' => $council->getStatus() ])
                                        </td>
                                        <td> {{ timeFormate($council->created_at) }} </td>
                                        <td> {{ $council->created_user->name ?? 'system' }} </td>
                                        <td>
                                            @include('backend.partials.action_buttons', [
                                                'menuItems' => [
                                                    ['routeName' => '', 'label' => 'View'],
                                                    ['routeName' => 'council.council_edit',   'params' => [$council->id], 'label' => 'Update'],
                                                    ['routeName' => 'council.council_member_list',   'params' => [$council->id], 'label' => 'Council Members'],
                                                    ['routeName' => 'council.status.council_edit',   'params' => [$council->id], 'label' => 'Change Status'],
                                                    ['routeName' => 'council.council_delete', 'params' => [$council->id], 'label' => 'Delete', 'delete' => true],
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

            {{-- <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{ _('council Type List') }}</h4>
                        </div>
                        <div class="col-4 text-right">
                            @include('backend.partials.button', ['routeName' => 'council.council_type_create', 'className' => 'btn-primary', 'label' => 'Create council Type'])
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="">
                        <table class="table tablesorter datatable">
                            <thead class=" text-primary">
                                <tr>
                                    <th>{{ _('Title') }}</th>
                                    <th>{{ _('Total council') }}</th>
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
                                            {{ number_format($type->councils->count()) }}
                                        </td>
                                        <td>
                                            @include('backend.partials.button', ['routeName' => 'council.status.council_type_edit','params' => [$type->id], 'className' => $type->getStatusClass(), 'label' => $type->getStatus() ])
                                        </td>
                                        <td> {{ timeFormate($type->created_at) }} </td>
                                        <td> {{ $type->created_user->name ?? 'system' }} </td>
                                        <td>
                                            @include('backend.partials.action_buttons', [
                                                'menuItems' => [
                                                    ['routeName' => '', 'label' => 'View'],
                                                    ['routeName' => 'council.council_type_edit',     'params' => [$type->id], 'label' => 'Update'],
                                                    ['routeName' => 'council.status.council_type_edit',   'params' => [$type->id], 'label' => 'Change Status'],
                                                    ['routeName' => 'council.council_type_delete',   'params' => [$type->id], 'label' => 'Delete', 'delete' => true],
                                                ]
                                            ])
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> --}}


            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{ _('Council Member Type List') }}</h4>
                        </div>
                        <div class="col-4 text-right">
                            @include('backend.partials.button', ['routeName' => 'council.cm_type_create', 'className' => 'btn-primary', 'label' => 'Create Council Member Type'])
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="">
                        <table class="table tablesorter datatable">
                            <thead class=" text-primary">
                                <tr>
                                    <th>{{ _('Order') }}</th>
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
                                        <td> {{ $type->order_key  }} </td>
                                        <td> {{ $type->title  }} </td>
                                        <td> {{ number_format($type->council_member_type_members->count()) }} </td>
                                        <td>
                                            @include('backend.partials.button', ['routeName' => 'council.status.cm_type_edit','params' => [$type->id], 'className' => $type->getStatusClass(), 'label' => $type->getStatus() ])
                                        </td>
                                        <td> {{ timeFormate($type->created_at) }} </td>
                                        <td> {{ $type->created_user->name ?? 'system' }} </td>
                                        <td>
                                            @include('backend.partials.action_buttons', [
                                                'menuItems' => [
                                                    ['routeName' => '', 'label' => 'View'],
                                                    ['routeName' => 'council.cm_type_edit',   'params' => [$type->id], 'label' => 'Update'],
                                                    ['routeName' => 'council.status.cm_type_edit',   'params' => [$type->id], 'label' => 'Change Status'],
                                                    ['routeName' => 'council.cm_type_delete', 'params' => [$type->id], 'label' => 'Delete', 'delete' => true],
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

