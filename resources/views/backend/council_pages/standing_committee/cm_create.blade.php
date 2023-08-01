@extends('backend.layouts.master', ['pageSlug' => 'committee'])

@section('title', 'Create Committee Member')
@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ _('Create '.$committee->title.' Member') }}</h5>
                </div>
                <form method="POST" action="{{route('committee.committee_member_create',$committee->id)}}" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group {{ $errors->has('member_id') ? ' has-danger' : '' }}">
                            <label>{{ _('Member') }}</label>
                            <select name="member_id" class="form-control {{ $errors->has('member_id') ? ' is-invalid' : '' }}">
                                <option selected hidden>{{_('Select Committee')}}</option>
                                @foreach ($members as $member)
                                    <option value="{{ $member->id }}" @if( old('member_id') == $member->id) selected @endif> {{ $member->name }}</option>
                                @endforeach
                            </select>
                            @include('alerts.feedback', ['field' => 'member_id'])
                        </div>
                        <div class="form-group {{ $errors->has('cmt_id') ? ' has-danger' : '' }}">
                            <label>{{ _('Committee Member Type') }}</label>
                            <select name="cmt_id" class="form-control {{ $errors->has('cmt_id') ? ' is-invalid' : '' }}">
                                <option selected hidden>{{_('Select Committee Member Type')}}</option>
                                @foreach ($cm_types as $type)
                                    <option value="{{ $type->id }}" @if( old('cmt_id') == $type->id) selected @endif> {{ $type->title }}</option>
                                @endforeach
                            </select>
                            @include('alerts.feedback', ['field' => 'cmt_id'])
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
                <div class="card-body">
                    <p class="card-text">
                        {{$committee->title}}{{ _(' Member') }}
                    </p>
                    <div class="card-description">
                        {{ _('The role\'s manages user permissions by assigning different roles to users. Each role defines specific access levels and actions a user can perform. It helps ensure proper authorization and security in the system.') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

