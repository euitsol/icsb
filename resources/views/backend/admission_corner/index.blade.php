@extends('backend.layouts.master', ['pageSlug' => 'admission_corner'])

@section('title', 'Admission Corner')

@section('content')
<div class="row">
    <div class="col-md-12">
        @include('alerts.success')
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="title">{{ _('Add Admission Corner Page Image') }}</h5>
                    </div>
                    <form method="POST" action="{{route('admission_corner.page_image.admission_corner_create')}}" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group {{ $errors->has('page_image') ? 'is-invalid' : '' }}">
                                <label>{{ _('Page Image') }}</label>
                                <input type="file" accept="image/*" name="page_image"
                                class="form-control  {{ $errors->has('page_image') ? 'is-invalid' : '' }} image-upload"
                                @if(isset($admission_corner_image->page_image))
                                data-existing-files="{{ storage_url($admission_corner_image->page_image) }}"
                                data-delete-url=""
                                @endif
                                >
                                @include('alerts.feedback', ['field' => 'page_image'])
                            </div>
                            <div class="form-group {{ $errors->has('url') ? 'is-invalid' : '' }}">
                                <label>{{ _('URL') }}</label>
                                <input type="url" name="url" value="{{$admission_corner_image->url ?? old('url')}}" placeholder="Enter admission notice url" class="form-control  {{ $errors->has('url') ? 'is-invalid' : '' }}"
                                >
                                @include('alerts.feedback', ['field' => 'url'])
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-fill btn-primary">{{ _('Save') }}</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-user">
                    <div class="card-body" @if(isset($admission_corner_image->page_image)) style="min-height:360px" @endif>
                        <p class="card-text">
                            <b>{{ _('Contact') }}</b>
                        </p>
                        <div class="card-description">
                            <b>Page Image:</b> This field is required. It supports file uploads in jpeg, png, jpg, gif, & svg format, with a maximum size limit of 2MB. The recommended image dimensions are 1920 x 700 pixels.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    







<div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{ _('Admission Corner') }}</h4>
                        </div>
                        <div class="col-4 text-right">
                            @include('backend.partials.button', ['routeName' => 'admission_corner.admission_corner_create', 'className' => 'btn-primary', 'label' => 'Add Admission Corner'])
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="">
                        <table class="table tablesorter datatable">
                            <thead class=" text-primary">
                                <tr>
                                    <th>{{ _('Order') }}</th>
                                    <th>{{ _('Name') }}</th>
                                    <th>{{ _('Image') }}</th>
                                    <th>{{ _('Designation') }}</th>
                                    <th>{{ _('Phone') }}</th>
                                    <th>{{ _('Telephone') }}</th>
                                    <th>{{ _('Email') }}</th>
                                    <th>{{ _('PABX') }}</th>
                                    <th>{{ _('Status') }}</th>
                                    <th>{{ _('Creation date') }}</th>
                                    <th>{{ _('Created by') }}</th>
                                    <th>{{ _('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($admission_corners as $ac)
                                    <tr>
                                        <td> {{ $ac->order_key }} </td>
                                        <td> {{ $ac->name }} </td>
                                        <td><img class="rounded" width="60"
                                            src="@if ($ac->image) {{ storage_url($ac->image) }} @else {{ asset('no_img/no_img.jpg') }} @endif"
                                            alt="{{ $ac->name }}">
                                        </td>
                                        <td> {{ $ac->designation }} </td>
                                        <td> {{ $ac->phone }} </td>
                                        <td>
                                            @foreach(json_decode($ac->telephone) as $key=>$tp)
                                                <span class="mb-1">{{$tp}}{{((count(json_decode($ac->telephone))-1) == $key) ? '' : ', '}}</span>
                                            @endforeach
                                        </td>
                                        <td> {{ $ac->email }} </td>
                                        <td> {{ $ac->pabx ?? "N/A" }} </td>
                                        <td>
                                            @include('backend.partials.button', ['routeName' => 'admission_corner.status.admission_corner_edit','params' => [$ac->id], 'className' => $ac->getStatusClass(), 'label' => $ac->getStatus() ])
                                        </td>
                                        <td> {{ timeFormate($ac->created_at) }} </td>
                                        <td> {{ $ac->created_user->name ?? 'system' }} </td>
                                        <td>
                                            @include('backend.partials.action_buttons', [
                                                'menuItems' => [
                                                    ['routeName' => '', 'label' => 'View'],
                                                    ['routeName' => 'admission_corner.status.admission_corner_edit',   'params' => [$ac->id], 'label' => 'Change Status'],
                                                    ['routeName' => 'admission_corner.admission_corner_edit',   'params' => [$ac->id], 'label' => 'Update'],
                                                    ['routeName' => 'admission_corner.admission_corner_delete', 'params' => [$ac->id], 'label' => 'Delete', 'delete' => true],
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

