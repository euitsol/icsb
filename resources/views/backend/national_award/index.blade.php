@extends('backend.layouts.master', ['pageSlug' => 'national_award'])

@section('title', 'National Award')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{ _('National National Award') }}</h4>
                        </div>
                        <div class="col-4 text-right">
                            @include('backend.partials.button', ['routeName' => 'national_award.national_award_create', 'className' => 'btn-primary', 'label' => 'Add National Award'])
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
                                    <th>{{ _('Description') }}</th>
                                    <th>{{ _('Status') }}</th>
                                    <th>{{ _('Creation date') }}</th>
                                    <th>{{ _('Created by') }}</th>
                                    <th>{{ _('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($national_awards as $national_award)
                                    <tr>
                                        <td> {{ $national_award->title }} </td>
                                        <td><img class="rounded" width="60"
                                            src="@if ($national_award->image) {{ asset('storage/'.$national_award->image) }} @else {{ asset('no_img/no_img.jpg') }} @endif"
                                            alt="{{ $national_award->title }}">
                                        </td>
                                        <td> <a href="{{route('download',base64_encode($national_award->file))}}" class="btn btn-info btn-sm"><i class="fa-regular fa-circle-down"></i></a> </td>
                                        <td> {{ $national_award->description }} </td>
                                        <td>
                                            @if ($national_award->status == 1)
                                                @include('backend.partials.button', ['routeName' => 'national_award.status.national_award_edit','params' => [$national_award->id], 'className' => 'btn-success', 'label' => 'Active'])
                                            @else
                                                @include('backend.partials.button', ['routeName' => 'national_award.status.national_award_edit','params' => [$national_award->id], 'className' => 'btn-danger', 'label' => 'Deactive'])
                                            @endif
                                        </td>
                                        <td> {{ $national_award->created_at }} </td>
                                        <td> {{ $national_award->created_user->name ?? 'system' }} </td>
                                        <td>
                                            @include('backend.partials.action_buttons', [
                                                'menuItems' => [
                                                    ['routeName' => '', 'label' => 'View'],
                                                    ['routeName' => 'national_award.national_award_edit',   'params' => [$national_award->id], 'label' => 'Update'],
                                                    ['routeName' => 'national_award.national_award_delete', 'params' => [$national_award->id], 'label' => 'Delete', 'delete' => true],
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
