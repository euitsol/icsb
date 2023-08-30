@extends('backend.layouts.master', ['pageSlug' => 'convocation'])

@section('title', 'Convocation')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{ _('Convocation') }}</h4>
                        </div>
                        <div class="col-4 text-right">
                            @include('backend.partials.button', ['routeName' => 'convocation.convocation_create', 'className' => 'btn-primary', 'label' => 'Add Convocation'])
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include('alerts.success')
                    <div class="">
                        <table class="table tablesorter datatable">
                            <thead class=" text-primary">
                                <tr>
                                    <th>{{ _('Title') }}</th>
                                    <th>{{ _('Image') }}</th>
                                    <th>{{ _('File') }}</th>
                                    <th>{{ _('Status') }}</th>
                                    <th>{{ _('Creation date') }}</th>
                                    <th>{{ _('Created by') }}</th>
                                    <th>{{ _('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($convocations as $convocation)
                                    <tr>
                                        <td> {{ $convocation->title }} </td>
                                        <td><img class="rounded" width="60"
                                            src="@if ($convocation->image) {{ storage_url($convocation->image) }} @else {{ asset('no_img/no_img.jpg') }} @endif"
                                            alt="{{ $convocation->title }}">
                                        </td>
                                        <td>
                                            <a href="{{route('download',base64_encode($convocation->file))}}" class="btn btn-info btn-sm {{$convocation->file ?  : 'd-none'}}"><i class="fa-regular fa-circle-down"></i></a>
                                        </td>
                                        <td>
                                            @include('backend.partials.button', ['routeName' => 'convocation.status.convocation_edit','params' => [$convocation->id], 'className' => $convocation->getStatusClass(), 'label' => $convocation->getStatus() ])
                                        </td>
                                        <td> {{ timeFormate($convocation->created_at) }} </td>
                                        <td> {{ $convocation->created_user->name ?? 'system' }} </td>
                                        <td>
                                            @include('backend.partials.action_buttons', [
                                                'menuItems' => [
                                                    ['routeName' => '', 'label' => 'View'],
                                                    ['routeName' => 'convocation.status.convocation_edit',   'params' => [$convocation->id], 'label' => 'Change Status'],
                                                    ['routeName' => 'convocation.convocation_edit',   'params' => [$convocation->id], 'label' => 'Update'],
                                                    ['routeName' => 'convocation.convocation_delete', 'params' => [$convocation->id], 'label' => 'Delete', 'delete' => true],
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

@include('backend.partials.datatable', ['columns_to_show' => [0,1,2,3,4,5]])

