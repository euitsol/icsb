@extends('backend.layouts.master', ['pageSlug' => 'banner'])

@section('title', 'Banner')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{ _('Banner') }}</h4>
                        </div>
                        <div class="col-4 text-right">
                            @include('backend.partials.button', ['routeName' => 'banner.banner_create', 'className' => 'btn-primary', 'label' => 'Add Banner'])
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include('alerts.success')
                    <div class="">
                        <table class="table tablesorter datatable">
                            <thead class=" text-primary">
                                <tr>
                                    <th>{{ _('Name') }}</th>
                                    <th>{{ _('Duration') }}</th>
                                    <th>{{ _('Status') }}</th>
                                    <th>{{ _('Creation date') }}</th>
                                    <th>{{ _('Created by') }}</th>
                                    <th>{{ _('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($banners as $banner)
                                    <tr>
                                        <td> {{ $banner->banner_name }} </td>
                                        <td> {{ timeFormate($banner->banner_start_time).' - '.timeFormate($banner->banner_end_time) }} </td>
                                        <td>
                                            @include('backend.partials.button', ['routeName' => 'banner.status.banner_edit','params' => [$banner->id], 'className' => $banner->getStatusClass(), 'label' => $banner->getStatus() ])
                                        </td>
                                        <td> {{ timeFormate($banner->created_at) }} </td>
                                        <td> {{ $banner->created_user->name ?? 'system' }} </td>
                                        <td>
                                            @include('backend.partials.action_buttons', [
                                                'menuItems' => [
                                                    ['routeName' => '', 'label' => 'View'],
                                                    ['routeName' => 'banner.banner_edit',   'params' => [$banner->id], 'label' => 'Update'],
                                                    ['routeName' => 'banner.image.banner_edit',   'params' => [$banner->id], 'label' => 'Edit Image'],
                                                    ['routeName' => 'banner.banner_delete', 'params' => [$banner->id], 'label' => 'Delete', 'delete' => true],
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

