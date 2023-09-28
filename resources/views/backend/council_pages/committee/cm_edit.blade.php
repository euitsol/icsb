@extends('backend.layouts.master', ['pageSlug' => 'committee'])

@section('title', 'Edit Committee Member')
@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ _('Edit '.$cm->committe->title.' Member') }}</h5>
                </div>
                <form method="POST" action="{{route('committee.committee_member_edit',$cm->id)}}" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group {{ $errors->has('member_id') ? ' has-danger' : '' }}">
                            <label>{{ _('Member') }}</label>
                            <select name="member_id" class="form-control {{ $errors->has('member_id') ? ' is-invalid' : '' }}">
                                @foreach ($members as $member)
                                    @if($member->member_type != 5)
                                        <option value="{{ $member->id }}" @if( $cm->member_id == $member->id) selected @endif> {{ $member->name }} ( {{ $member->membership_id }} )</option>
                                    @endif
                                @endforeach
                            </select>
                            @include('alerts.feedback', ['field' => 'member_id'])
                        </div>
                        <div class="form-group {{ $errors->has('cmt_id') ? ' has-danger' : '' }}">
                            <label>{{ _('Committee Member Type') }}</label>
                            <select name="cmt_id" class="form-control {{ $errors->has('cmt_id') ? ' is-invalid' : '' }}">
                                <option selected hidden>{{_('Select Committee Member Type')}}</option>
                                @foreach ($cm_types as $type)
                                    <option value="{{ $type->id }}" @if( $cm->cmt_id == $type->id) selected @endif> {{ $type->title }}</option>
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
                        {{$cm->committe->title}}{{ _(' Member') }}
                    </p>
                    <div class="card-description">
                        {{ _('The role\'s manages user permissions by assigning different roles to users. Each role defines specific access levels and actions a user can perform. It helps ensure proper authorization and security in the system.') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

