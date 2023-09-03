@extends('backend.layouts.master', ['pageSlug' => $slug])

@section('title', 'Notice Board')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('alerts.success')
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{ _('Notice List') }}</h4>
                        </div>
                        <div class="col-4 text-right">
                            @include('backend.partials.button', ['routeName' => 'notice_board.notice_create', 'className' => 'btn-primary', 'label' => 'Create Notice'])
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="">
                        <table class="table tablesorter datatable">
                            <thead class=" text-primary">
                                <tr>
                                    <th>{{ _('Title') }}</th>
                                    <th>{{ _('Category') }}</th>
                                    <th>{{ _('Status') }}</th>
                                    <th>{{ _('Created at') }}</th>
                                    <th>{{ _('Created by') }}</th>
                                    <th>{{ _('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($notices as $notice)
                                    <tr>
                                        <td> {{ $notice->title  }} </td>
                                        <td> {{ $notice->category->title }} </td>
                                        <td>
                                            @include('backend.partials.button', ['routeName' => 'notice_board.status.notice_edit','params' => [$notice->id], 'className' => $notice->getStatusClass(), 'label' => $notice->getStatus() ])
                                        </td>
                                        <td> {{ timeFormate($notice->created_at) }} </td>
                                        <td> {{ $notice->created_user->name ?? 'system' }} </td>
                                        <td>
                                            @include('backend.partials.action_buttons', [
                                                'menuItems' => [
                                                    ['routeName' => '', 'label' => 'View'],
                                                    ['routeName' => 'notice_board.notice_edit',   'params' => [$notice->id], 'label' => 'Update'],
                                                    ['routeName' => 'notice_board.status.notice_edit',   'params' => [$notice->id], 'label' => 'Change Status'],
                                                    ['routeName' => 'notice_board.notice_delete', 'params' => [$notice->id], 'label' => 'Delete', 'delete' => true],
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
            @if(isset($notice_categories))
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{ _('Notice Category List') }}</h4>
                        </div>
                        <div class="col-4 text-right">
                            @include('backend.partials.button', ['routeName' => 'notice_board.notice_cat_create', 'className' => 'btn-primary', 'label' => 'Create Notice Category'])
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="">
                        <table class="table tablesorter datatable">
                            <thead class=" text-primary">
                                <tr>
                                    <th>{{ _('Title') }}</th>
                                    <th>{{ _('Total Notice') }}</th>
                                    <th>{{ _('Status') }}</th>
                                    <th>{{ _('Created at') }}</th>
                                    <th>{{ _('Created by') }}</th>
                                    <th>{{ _('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($notice_categories as $cat)
                                    <tr>
                                        <td> {{ $cat->title }} </td>
                                        <td>
                                            {{ number_format($cat->notices->count()) }}
                                        </td>
                                        <td>
                                            @include('backend.partials.button', ['routeName' => 'notice_board.status.notice_cat_edit','params' => [$cat->id], 'className' => $cat->getStatusClass(), 'label' => $cat->getStatus() ])
                                        </td>
                                        <td> {{ timeFormate($cat->created_at) }} </td>
                                        <td> {{ $cat->created_user->name ?? 'system' }} </td>
                                        <td>
                                            @include('backend.partials.action_buttons', [
                                                'menuItems' => [
                                                    ['routeName' => '', 'label' => 'View'],
                                                    ['routeName' => 'notice_board.notice_cat_edit',     'params' => [$cat->id], 'label' => 'Update'],
                                                    ['routeName' => 'notice_board.status.notice_cat_edit',   'params' => [$cat->id], 'label' => 'Change Status'],
                                                    ['routeName' => 'notice_board.notice_cat_delete',   'params' => [$cat->id], 'label' => 'Delete', 'delete' => true],
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
            @endif





        </div>
    </div>
@endsection

@include('backend.partials.datatable', ['columns_to_show' => [0,1,2,3,4,5,6]])

