@extends('backend.layouts.master', ['pageSlug' => 'exam_faq'])

@section('title', 'Exam Frequently Asked Questions')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{ _('Exam Frequently Asked Questions') }}</h4>
                        </div>
                        <div class="col-4 text-right">
                            @include('backend.partials.button', ['routeName' => 'exam_faq.exam_faq_create', 'className' => 'btn-primary', 'label' => 'Add Exam FAQ'])
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
                                    <th>{{ _('Description') }}</th>
                                    <th>{{ _('Creation date') }}</th>
                                    <th>{{ _('Created by') }}</th>
                                    <th>{{ _('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($faqs as $faq)
                                    <tr>
                                        <td> {{ $faq->order_key }} </td>
                                        <td> {{ $faq->title }} </td>
                                        <td> {{ stringLimit(html_entity_decode_table($faq->description)) }} </td>
                                        <td> {{ timeFormate($faq->created_at)}} </td>
                                        <td> {{ $faq->created_user->name ?? 'system' }} </td>
                                        <td>
                                            @include('backend.partials.action_buttons', [
                                                'menuItems' => [
                                                    ['routeName' => '', 'label' => 'View'],
                                                    ['routeName' => 'exam_faq.exam_faq_edit',   'params' => [$faq->id], 'label' => 'Update'],
                                                    ['routeName' => 'exam_faq.exam_faq_delete', 'params' => [$faq->id], 'label' => 'Delete', 'delete' => true],
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

@include('backend.partials.datatable', ['columns_to_show' => [0,1,2,3]])

