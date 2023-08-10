@extends('backend.layouts.master', ['pageSlug' => 'permission'])

@section('title', 'Permission')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{ _('Permission') }}</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('um.permission.permission_add') }}" class="btn btn-sm btn-primary">{{ _('Add Permission') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include('alerts.success')
                    <div class="">
                        <table class="table tablesorter datatable">
                            <thead class=" text-primary">
                                <tr>
                                    <th>Name</th>
                                    <th>Guard Name</th>
                                    <th>Prefix</th>
                                    <th>Creation date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($permissions as $permission)
                                    <tr>
                                        <td> {{ $permission->name }} </td>
                                        <td> {{ $permission->guard_name  }} </td>
                                        <td> {{ $permission->prefix }} </td>
                                        <td> {{ timeFormate($permission->created_at) }} </td>
                                        <td>
                                            @include('backend.partials.action_buttons', [
                                                'menuItems' => [
                                                    ['url' => '', 'label' => 'View'],
                                                    ['url' => '', 'label' => 'Update'],
                                                    ['url' => '', 'label' => 'Delete'],
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
