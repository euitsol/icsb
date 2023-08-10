@extends('backend.layouts.master', ['pageSlug' => 'cs_firms'])

@section('title', 'CS Firms')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{ _('CS Firm Member List') }}</h4>
                        </div>
                        <div class="col-4 text-right">
                            @include('backend.partials.button', ['routeName' => 'cs_firm.cs_firm_create', 'className' => 'btn-primary', 'label' => 'Add CS Firm Member'])
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
                                    <th>{{ _('Private Practice Certificate No') }}</th>
                                    <th>{{ _('Status') }}</th>
                                    <th>{{ _('Created at') }}</th>
                                    <th>{{ _('Created by') }}</th>
                                    <th>{{ _('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cs_firms as $cs_firm)
                                    <tr>
                                        <td> {{ $cs_firm->member->name }} </td>
                                        <td>
                                            <img class="rounded" width="60" src=" {{getMemberImage($cs_firm->member) }}">
                                        </td>
                                        <td> {{ $cs_firm->member->designation  }} </td>
                                        <td>
                                            @foreach (json_decode($cs_firm->member->phone) as $key=>$phone)
                                                {{$phone->number}}<br>
                                            @endforeach
                                        </td>
                                        <td> {{ $cs_firm->member->email }} </td>
                                        <td>
                                            @foreach ($cs_firm->durations as $duration)
                                                {{ formatYearRange($duration->start_date, $duration->end_date) }}<br>
                                            @endforeach
                                         </td>
                                        <td>
                                            @if($cs_firm->status == 1)
                                                <span class="badge badge-primary"> {{_('cs_firm')}} </span>
                                            @else
                                                <span class="badge badge-info"> {{_('Past cs_firm')}} </span>
                                            @endif
                                        </td>
                                        <td> {{ timeFormate($cs_firm->created_at) }} </td>
                                        <td> {{ $cs_firm->created_user->name ?? 'system' }} </td>
                                        <td>
                                            @include('backend.partials.action_buttons', [
                                                'menuItems' => [
                                                    ['routeName' => '', 'label' => 'View'],
                                                    ['routeName' => 'cs_firm.cs_firm_edit',     'params' => [$cs_firm->id], 'label' => 'Update'],
                                                    ['routeName' => 'cs_firm.cs_firm_delete',   'params' => [$cs_firm->id], 'label' => 'Delete', 'delete' => true],
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

