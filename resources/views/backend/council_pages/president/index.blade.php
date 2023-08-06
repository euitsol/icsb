@extends('backend.layouts.master', ['pageSlug' => 'president'])

@section('title', 'President')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{ _('President List') }}</h4>
                        </div>
                        <div class="col-4 text-right">
                            @include('backend.partials.button', ['routeName' => 'president.president_create', 'className' => 'btn-primary', 'label' => 'Add President'])
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
                                    <th>{{ _('Image') }}</th>
                                    <th>{{ _('Designation') }}</th>
                                    <th>{{ _('Phone') }}</th>
                                    <th>{{ _('Email') }}</th>
                                    <th>{{ _('Duration') }}</th>
                                    <th>{{ _('Status') }}</th>
                                    <th>{{ _('Created at') }}</th>
                                    <th>{{ _('Created by') }}</th>
                                    <th>{{ _('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($presidents as $president)
                                    <tr>
                                        <td> {{ $president->member->name }} </td>
                                        <td>
                                            <img class="rounded" width="60" src=" {{getMemberImage($president->member) }}">
                                        </td>
                                        <td> {{ $president->member->designation  }} </td>
                                        <td>
                                            @foreach (json_decode($president->member->phone) as $key=>$phone)
                                                {{$phone->number}}<br>
                                            @endforeach
                                        </td>
                                        <td> {{ $president->member->email }} </td>
                                        <td>
                                            @foreach ($president->durations as $duration)
                                                {{ formatYearRange($duration->start_date, $duration->end_date) }}<br>
                                            @endforeach
                                         </td>
                                        <td>
                                            @if($president->status == 1)
                                                <span class="badge badge-primary"> {{_('President')}} </span>
                                            @else
                                                <span class="badge badge-info"> {{_('Past President')}} </span>
                                            @endif
                                        </td>
                                        <td> {{ timeFormate($president->created_at) }} </td>
                                        <td> {{ $president->created_user->name ?? 'system' }} </td>
                                        <td>
                                            @include('backend.partials.action_buttons', [
                                                'menuItems' => [
                                                    ['routeName' => '', 'label' => 'View'],
                                                    ['routeName' => 'president.president_edit',     'params' => [$president->id], 'label' => 'Update'],
                                                    ['routeName' => 'president.president_delete',   'params' => [$president->id], 'label' => 'Delete', 'delete' => true],
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

