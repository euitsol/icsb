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
                                <label>{{ _('Order') }}</label>
                                <select class="form-control {{ $errors->has('order_key') ? ' is-invalid' : '' }}" name="order_key">
                                    @for ($x=1; $x<=1000; $x++)
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
                            <textarea name="description" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}">
                                {{ $cm->description }}
                            </textarea>
                            @include('alerts.feedback', ['field' => 'description'])
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
                        <b>{{$cm->council->title}}{{ _(' Member') }}</b>
                    </p>
                    <div class="card-description">
                        <p><b>Member:</b> This field is required.  This is an option field. It represents the Council Member.</p>
                        <p><b>Order:</b> This field is required and unique. It is a number field. It manages the order of the Council Members</p>
                        <p><b>Council Member Type:</b> This field is required.  This is an option field. It represents the Council Member Type.</p>
                        <p><b>Member Description:</b> This field is required. It is a textarea field</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

