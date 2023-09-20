@extends('backend.layouts.master', ['pageSlug' => 'testimonial'])

@section('title', 'Testimonial')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{ _('Testimonial') }}</h4>
                        </div>
                        <div class="col-4 text-right">
                            @include('backend.partials.button', ['routeName' => 'testimonial.testimonial_create', 'className' => 'btn-primary', 'label' => 'Add Testimonial'])
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
                                    <th>{{ _('Author Name') }}</th>
                                    <th>{{ _('Author Designation') }}</th>
                                    <th>{{ _('Author Responsibility') }}</th>
                                    <th>{{ _('Author Image') }}</th>
                                    <th>{{ _('Status') }}</th>
                                    <th>{{ _('Creation date') }}</th>
                                    <th>{{ _('Created by') }}</th>
                                    <th>{{ _('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($testimonials as $testimonial)
                                    <tr>
                                        <td> {{ $testimonial->order_key }} </td>
                                        <td> {{ $testimonial->name }} </td>
                                        <td> {{ $testimonial->designation }} </td>
                                        <td> {{ $testimonial->responsibility }} </td>
                                        <td><img class="rounded" width="60"
                                            src="@if ($testimonial->image) {{ storage_url($testimonial->image) }} @else {{ asset('no_img/no_img.jpg') }} @endif"
                                            alt="{{ $testimonial->name }}">
                                        </td>
                                        <td>
                                            @include('backend.partials.button', ['routeName' => 'testimonial.status.testimonial_edit','params' => [$testimonial->id], 'className' => $testimonial->getStatusClass(), 'label' => $testimonial->getStatus() ])
                                        </td>
                                        <td> {{ timeFormate($testimonial->created_at) }} </td>
                                        <td> {{ $testimonial->created_user->name ?? 'system' }} </td>
                                        <td>
                                            @include('backend.partials.action_buttons', [
                                                'menuItems' => [
                                                    ['routeName' => '', 'label' => 'View'],
                                                    ['routeName' => 'testimonial.status.testimonial_edit',   'params' => [$testimonial->id], 'label' => 'Change Status'],
                                                    ['routeName' => 'testimonial.testimonial_edit',   'params' => [$testimonial->id], 'label' => 'Update'],
                                                    ['routeName' => 'testimonial.testimonial_delete', 'params' => [$testimonial->id], 'label' => 'Delete', 'delete' => true],
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

@include('backend.partials.datatable', ['columns_to_show' => [0,1,2,3,4,5,6]])

