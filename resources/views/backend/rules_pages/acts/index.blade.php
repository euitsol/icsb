@extends('backend.layouts.master', ['pageSlug' => 'act'])

@section('title', 'Act')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{ _('Acts List') }}</h4>
                        </div>
                        <div class="col-4 text-right">
                            @include('backend.partials.button', ['routeName' => 'acts.acts_create', 'className' => 'btn-primary', 'label' => 'Add Act'])
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
                                    <th>{{ _('Title') }}</th>
                                    <th>{{ _('Files') }}</th>
                                    <th>{{ _('Status') }}</th>
                                    <th>{{ _('Creation date') }}</th>
                                    <th>{{ _('Created by') }}</th>
                                    <th>{{ _('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($acts as $act)
                                    <tr>
                                        <td> {{ $act->order_key }} </td>
                                        <td> {{ $act->title }} </td>
                                        <td>
                                            @if(!empty(json_decode($act->files)))
                                                @foreach ( json_decode($act->files) as $file )
                                                    {{-- <a href="{{route('download',base64_encode($file->file_path))}}" class="btn btn-info btn-sm mb-2">{{basename($file->file_path)}}<i class="fa-regular fa-circle-down ml-2"></i></a><br> --}}
                                                    <a href="{{route('download',base64_encode($file->file_path))}}" class="btn btn-info btn-sm "><i class="fa-regular fa-circle-down"></i></a>
                                                @endforeach
                                            @endif
                                        </td>
                                        <td>
                                            @include('backend.partials.button', ['routeName' => 'acts.status.acts_edit','params' => [$act->id], 'className' => $act->getStatusClass(), 'label' => $act->getStatus() ])
                                        </td>
                                        <td> {{ timeFormate($act->created_at) }} </td>
                                        <td> {{ $act->created_user->name ?? 'system' }} </td>
                                        <td>
                                            @include('backend.partials.action_buttons', [
                                                'menuItems' => [
                                                    ['routeName' => '', 'label' => 'View'],
                                                    ['routeName' => 'acts.status.acts_edit',   'params' => [$act->id], 'label' => 'Change Status'],
                                                    ['routeName' => 'acts.acts_edit',   'params' => [$act->id], 'label' => 'Update'],
                                                    ['routeName' => 'acts.acts_delete', 'params' => [$act->id], 'label' => 'Delete', 'delete' => true],
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

@include('backend.partials.datatable', ['columns_to_show' => [0,1,2,3,4]])

