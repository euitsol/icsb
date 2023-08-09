@extends('backend.layouts.master', ['pageSlug' => 'sec_and_ceo'])

@section('title', 'Secretary & CEO')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{ _('Secretary & CEO List') }}</h4>
                        </div>
                        <div class="col-4 text-right">
                            @include('backend.partials.button', ['routeName' => 'sec_and_ceo.sc_create', 'className' => 'btn-primary', 'label' => 'Add Secretary & CEO'])
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
                                @foreach ($sec_and_ceos as $sec_and_ceo)
                                    <tr>
                                        <td> {{ $sec_and_ceo->member->name }} </td>
                                        <td>
                                            <img class="rounded" width="60" src=" {{getMemberImage($sec_and_ceo->member) }}">
                                        </td>
                                        <td> {{ $sec_and_ceo->member->designation  }} </td>
                                        <td>
                                            @foreach (json_decode($sec_and_ceo->member->phone) as $key=>$phone)
                                                {{$phone->number}}<br>
                                            @endforeach
                                        </td>
                                        <td> {{ $sec_and_ceo->member->email }} </td>
                                        <td>
                                            @foreach ($sec_and_ceo->durations as $duration)
                                                {{ formatYearRange($duration->start_date, $duration->end_date) }}<br>
                                            @endforeach
                                         </td>
                                        <td>
                                            @if($sec_and_ceo->status == 1)
                                                <span class="badge badge-primary"> {{_('Secretary & CEO')}} </span>
                                            @else
                                                <span class="badge badge-info"> {{_('Past Secretary & CEO')}} </span>
                                            @endif
                                        </td>
                                        <td> {{ timeFormate($sec_and_ceo->created_at) }} </td>
                                        <td> {{ $sec_and_ceo->created_user->name ?? 'system' }} </td>
                                        <td>
                                            @include('backend.partials.action_buttons', [
                                                'menuItems' => [
                                                    ['routeName' => '', 'label' => 'View'],
                                                    ['routeName' => 'sec_and_ceo.sc_edit',     'params' => [$sec_and_ceo->id], 'label' => 'Update'],
                                                    ['routeName' => 'sec_and_ceo.sc_delete',   'params' => [$sec_and_ceo->id], 'label' => 'Delete', 'delete' => true],
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

