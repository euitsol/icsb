@extends('backend.layouts.master', ['pageSlug' => 'latest_news'])

@section('title', 'Latest News')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                @include('alerts.success')
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{ _('Latest News') }}</h4>
                        </div>
                        <div class="col-4 text-right">
                            @include('backend.partials.button', ['routeName' => 'latest_news.latest_news_create', 'className' => 'btn-primary', 'label' => ' Create Latest News'])
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <div class="">
                        <table class="table tablesorter datatable">
                            <thead class=" text-primary">
                                <tr>
                                    <th>{{ _('Date') }}</th>
                                    <th>{{ _('Title') }}</th>
                                    <th>{{ _('Image') }}</th>
                                    <th>{{ _('Description') }}</th>
                                    <th>{{ _('Status') }}</th>
                                    <th>{{ _('Created by') }}</th>
                                    <th>{{ _('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($latest_newses as $latest_news)
                                    <tr>
                                        <td> {{ date('d M, Y', strtotime($latest_news->date)) }} </td>
                                        <td> {{ $latest_news->title }} </td>
                                        <td>
                                            @if(!empty(json_decode($latest_news->images)))
                                                @foreach (json_decode($latest_news->images) as $key=>$image)
                                                    @if($key == 0)
                                                        <img class="rounded" width="60"
                                                        src="{{($image) ? storage_url($image) : asset('no_img/no_img.jpg') }}"
                                                        alt="{{ $latest_news->title }}">
                                                    @endif
                                                @endforeach
                                            @endif
                                        </td>
                                        <td> {{ stringLimit(html_entity_decode_table($latest_news->description)) }} </td>
                                        <td>
                                            @include('backend.partials.button', ['routeName' => 'latest_news.status.latest_news_edit','params' => [$latest_news->id], 'className' => $latest_news->getStatusClass(), 'label' => $latest_news->getStatus() ])
                                        </td>
                                        <td> {{ $latest_news->created_user->name ?? 'system' }} </td>
                                        <td>
                                            @include('backend.partials.action_buttons', [
                                                'menuItems' => [
                                                    ['routeName' => '', 'label' => 'View'],
                                                    ['routeName' => 'latest_news.status.latest_news_edit',   'params' => [$latest_news->id], 'label' => 'Change Status'],
                                                    ['routeName' => 'latest_news.latest_news_edit',   'params' => [$latest_news->id], 'label' => 'Update'],
                                                    ['routeName' => 'latest_news.latest_news_delete', 'params' => [$latest_news->id], 'label' => 'Delete', 'delete' => true],
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

