@extends('backend.layouts.master', ['pageSlug' => 'pop_up'])

@section('title', 'Pop Up')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{ _('Pop Up') }}</h4>
                        </div>
                        <div class="col-4 text-right">
                            @include('backend.partials.button', ['routeName' => 'pop_up.pop_up_create', 'className' => 'btn-primary', 'label' => 'Add Pop Up'])
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
                                    <th>{{ _('Image') }}</th>
                                    <th>{{ _('URL') }}</th>
                                    <th>{{ _('Status') }}</th>
                                    <th>{{ _('Creation date') }}</th>
                                    <th>{{ _('Created by') }}</th>
                                    <th>{{ _('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pop_ups as $pop_up)
                                    <tr>
                                        <td> {{ $pop_up->order_key }} </td>
                                        <td><img class="rounded" width="60"
                                            src="@if ($pop_up->image) {{ storage_url($pop_up->image) }} @else {{ asset('no_img/no_img.jpg') }} @endif"
                                            alt="{{ __('Pop_up Image') }}">
                                        </td>
                                        <td> {{ $pop_up->url ? removeHttpProtocol($pop_up->url) : 'N/A' }} </td>
                                        <td>
                                            @include('backend.partials.button', ['routeName' => 'pop_up.status.pop_up_edit','params' => [$pop_up->id], 'className' => $pop_up->getStatusClass(), 'label' => $pop_up->getStatus() ])
                                        </td>
                                        <td> {{ timeFormate($pop_up->created_at) }} </td>
                                        <td> {{ $pop_up->created_user->name ?? 'system' }} </td>
                                        <td>
                                            @include('backend.partials.action_buttons', [
                                                'menuItems' => [
                                                    ['routeName' => '', 'label' => 'View'],
                                                    ['routeName' => 'pop_up.status.pop_up_edit',   'params' => [$pop_up->id], 'label' => 'Change Status'],
                                                    ['routeName' => 'pop_up.pop_up_edit',   'params' => [$pop_up->id], 'label' => 'Update'],
                                                    ['routeName' => 'pop_up.pop_up_delete', 'params' => [$pop_up->id], 'label' => 'Delete', 'delete' => true],
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

