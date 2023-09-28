@extends('backend.layouts.master', ['pageSlug' => 'council'])

@section('title', 'Edit Council Member')
@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ _('Edit '.$cm->council->title.' Member') }}</h5>
                </div>
                <form method="POST" action="{{route('council.council_member_edit',$cm->id)}}" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8 form-group {{ $errors->has('member_id') ? ' has-danger' : '' }}">
                                <label>{{ _('Member') }}</label>
                                <select name="member_id" class="form-control {{ $errors->has('member_id') ? ' is-invalid' : '' }}">
                                    @foreach ($members as $member)
                                        @php
                                            $check = App\Models\CouncilMember::where('member_id',$member->id)->first();
                                        @endphp
                                        @if($cm->member_id == $member->id)
                                            <option value="{{$member->id}}" selected>{{ $member->name }} ( {{ $member->membership_id }} ) @if($member->member_type == 1){{(' (Non Member)')}}@endif</option>
                                        @elseif(!$check)
                                            <option value="{{$member->id}}">{{ $member->name }} ( {{ $member->membership_id }} ) @if($member->member_type == 1){{(' (Non Member)')}}@endif</option>
                                        @endif
                                    @endforeach
                                </select>
                                @include('alerts.feedback', ['field' => 'member_id'])
                            </div>
                            <div class="col-md-4 form-group {{ $errors->has('order_key') ? ' has-danger' : '' }}">
                                <label>{{ _('Council Order') }}</label>
                                <select class="form-control {{ $errors->has('order_key') ? ' is-invalid' : '' }}" name="order_key">
                                    @for ($x=1; $x<=100; $x++)
                                        @php
                                            $check = App\Models\CouncilMember::where('order_key',$x)->where('order_key',$x)->first();
                                        @endphp
                                        @if($cm->order_key == $x)
                                            <option value="{{$x}}" selected>{{ $x }}</option>
                                        @elseif(!$check)
                                            <option value="{{$x}}">{{ $x }}</option>
                                        @endif
                                    @endfor
                                </select>
                                @include('alerts.feedback', ['field' => 'order_key'])
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('cmt_id') ? ' has-danger' : '' }}">
                            <label>{{ _('Council Member Type') }}</label>
                            <select name="cmt_id" class="form-control {{ $errors->has('cmt_id') ? ' is-invalid' : '' }}">
                                <option selected hidden>{{_('Select Council Member Type')}}</option>
                                @foreach ($cm_types as $type)
                                    <option value="{{ $type->id }}" @if( $cm->cmt_id == $type->id) selected @endif> {{ $type->title }}</option>
                                @endforeach
                            </select>
                            @include('alerts.feedback', ['field' => 'cmt_id'])
                        </div>

                        <div class="form-group {{ $errors->has('description') ? ' has-danger' : '' }}">
                            <label for="description">Member Description</label>
                            <textarea name="description" class="form-control">
                                {{ $cm->description }}
                            </textarea>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-fill btn-primary">{{ _('Update') }}</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-user">
                <div class="card-body">
                    <p class="card-text">
                        {{$cm->council->title}}{{ _(' Member') }}
                    </p>
                    <div class="card-description">
                        {{ _('The role\'s manages user permissions by assigning different roles to users. Each role defines specific access levels and actions a user can perform. It helps ensure proper authorization and security in the system.') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

