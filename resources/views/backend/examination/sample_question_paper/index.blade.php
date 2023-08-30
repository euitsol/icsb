@extends('backend.layouts.master', ['pageSlug' => 'sample_question_paper'])

@section('title', 'Sample Question Paper')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{ _('Sample Question Papers List') }}</h4>
                        </div>
                        <div class="col-4 text-right">
                            @include('backend.partials.button', ['routeName' => 'sample_question_paper.sqp_create', 'className' => 'btn-primary', 'label' => 'Add Sample Question Paper'])
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
                                @foreach ($sample_question_papers as $sqp)
                                    <tr>
                                        <td> {{ $sqp->order_key }} </td>
                                        <td> {{ $sqp->title }} </td>
                                        <td>
                                            @if(!empty(json_decode($sqp->files)))
                                                @foreach ( json_decode($sqp->files) as $file )
                                                    {{-- <a href="{{route('download',base64_encode($file->file_path))}}" class="btn btn-info btn-sm mb-2">{{basename($file->file_path)}}<i class="fa-regular fa-circle-down ml-2"></i></a><br> --}}
                                                    <a href="{{route('download',base64_encode($file->file_path))}}" class="btn btn-info btn-sm "><i class="fa-regular fa-circle-down"></i></a>
                                                @endforeach
                                            @endif
                                        </td>
                                        <td>
                                            @include('backend.partials.button', ['routeName' => 'acts.status.acts_edit','params' => [$sqp->id], 'className' => $sqp->getStatusClass(), 'label' => $sqp->getStatus() ])
                                        </td>
                                        <td> {{ timeFormate($sqp->created_at) }} </td>
                                        <td> {{ $sqp->created_user->name ?? 'system' }} </td>
                                        <td>
                                            @include('backend.partials.action_buttons', [
                                                'menuItems' => [
                                                    ['routeName' => '', 'label' => 'View'],
                                                    ['routeName' => 'sample_question_paper.status.sqp_edit',   'params' => [$sqp->id], 'label' => 'Change Status'],
                                                    ['routeName' => 'sample_question_paper.sqp_edit',   'params' => [$sqp->id], 'label' => 'Update'],
                                                    ['routeName' => 'sample_question_paper.sqp_delete', 'params' => [$sqp->id], 'label' => 'Delete', 'delete' => true],
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

