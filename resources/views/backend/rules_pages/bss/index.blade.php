@extends('backend.layouts.master', ['pageSlug' => 'bss'])

@section('title', 'Bangladesh Secretarial Standards')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{ _('Bangladesh Secretarial Standards') }}</h4>
                        </div>
                        <div class="col-4 text-right">
                            @include('backend.partials.button', ['routeName' => 'bss.bss_create', 'className' => 'btn-primary', 'label' => 'Add BSS'])
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
                                    <th>{{ _('Short Title') }}</th>
                                    <th>{{ _('Image') }}</th>
                                    <th>{{ _('File') }}</th>
                                    <th>{{ _('Featured') }}</th>
                                    <th>{{ _('Status') }}</th>
                                    <th>{{ _('Creation date') }}</th>
                                    <th>{{ _('Created by') }}</th>
                                    <th>{{ _('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bsss as $bss)
                                    <tr>
                                        <td> {{ $bss->title }} </td>
                                        <td> {{ $bss->short_title }} </td>
                                        <td><img class="rounded" width="60"
                                            src="@if ($bss->image) {{ storage_url($bss->image) }} @else {{ asset('no_img/no_img.jpg') }} @endif"
                                            alt="{{ $bss->title }}">
                                        </td>
                                        <td>
                                            @if(!empty(json_decode($bss->file)))
                                                <a href="{{route('download',base64_encode(json_decode($bss->file)->file_path))}}" class="btn btn-info btn-sm"><i class="fa-regular fa-circle-down"></i></a>
                                            @endif
                                        </td>
                                        <td><span class='{{ $bss->getFeaturedStatusClass() }}'>{{ $bss->getFeaturedStatus() }}</span></td>
                                        <td>
                                            @include('backend.partials.button', ['routeName' => 'bss.status.bss_edit','params' => [$bss->id], 'className' => $bss->getStatusClass(), 'label' => $bss->getStatus() ])
                                        </td>
                                        <td> {{ timeFormate($bss->created_at) }} </td>
                                        <td> {{ $bss->created_user->name ?? 'system' }} </td>
                                        <td>
                                            @include('backend.partials.action_buttons', [
                                                'menuItems' => [
                                                    ['routeName' => '', 'label' => 'View'],
                                                    ['routeName' => 'bss.status.bss_edit',   'params' => [$bss->id], 'label' => 'Change Status'],
                                                    ['routeName' => 'bss.featured.bss_edit',   'params' => [$bss->id], 'label' => $bss->getFeatured() ],
                                                    ['routeName' => 'bss.bss_edit',   'params' => [$bss->id], 'label' => 'Update'],
                                                    ['routeName' => 'bss.bss_delete', 'params' => [$bss->id], 'label' => 'Delete', 'delete' => true],
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

@include('backend.partials.datatable', ['columns_to_show' => [0,1,2,3,4,5,6,7]])

