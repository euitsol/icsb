@extends('backend.layouts.master', ['pageSlug' => 'job_placement'])

@section('title', 'Job Placement')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{ _('Job Placement') }}</h4>
                        </div>
                        <div class="col-4 text-right">
                            @include('backend.partials.button', ['routeName' => 'job_placement.jp_create', 'className' => 'btn-primary', 'label' => 'Add Job Placement'])
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
                                    <th>{{ _('Company Name') }}</th>
                                    <th>{{ _('Company URL') }}</th>
                                    <th>{{ _('Job Type') }}</th>
                                    <th>{{ _('Salary') }}</th>
                                    <th>{{ _('Deadline') }}</th>
                                    <th>{{ _('Status') }}</th>
                                    <th>{{ _('Creation date') }}</th>
                                    <th>{{ _('Created by') }}</th>
                                    <th>{{ _('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($job_placements as $jp)
                                    <tr>
                                        <td> {{ $jp->title }} </td>
                                        <td> {{ $jp->company_name }} </td>
                                        <td> {{ removeHttpProtocol($jp->company_url) }} </td>

                                        <td>
                                            @if(!empty(json_decode($jp->job_type)))
                                                @foreach (json_decode($jp->job_type) as $jp_type )
                                                    {{$jp_type}}<br>
                                                @endforeach
                                            @endif
                                        </td>
                                        <td>
                                            @if(!empty(json_decode($jp->salary)))
                                                {{ json_decode($jp->salary)->from .'-'. json_decode($jp->salary)->to .' ('. $jp->salary_type .')' }}
                                            @endif
                                        </td>
                                        <td>
                                            {{ date('d-M-Y', strtotime($jp->deadline)) }}
                                            <br>
                                            {{ date('H:i A', strtotime($jp->deadline)) }}
                                         </td>
                                        <td>
                                            @include('backend.partials.button', ['routeName' => 'job_placement.status.jp_edit','params' => [$jp->id], 'className' => $jp->getStatusClass(), 'label' => $jp->getStatus() ])
                                        </td>
                                        <td> {{ timeFormate($jp->created_at) }} </td>
                                        <td> {{ $jp->created_user->name ?? 'system' }} </td>
                                        <td>
                                            @include('backend.partials.action_buttons', [
                                                'menuItems' => [
                                                    ['routeName' => '', 'label' => 'View'],
                                                    ['routeName' => 'job_placement.status.jp_edit',   'params' => [$jp->id], 'label' => 'Change Status'],
                                                    ['routeName' => 'job_placement.jp_edit',   'params' => [$jp->id], 'label' => 'Update'],
                                                    ['routeName' => 'job_placement.jp_delete', 'params' => [$jp->id], 'label' => 'Delete', 'delete' => true],
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

@include('backend.partials.datatable', ['columns_to_show' => [0,1,2,3,4,5,6,7,8]])
