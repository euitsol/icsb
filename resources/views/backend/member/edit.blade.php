@extends('backend.layouts.master', ['pageSlug' => 'member'])

@section('title', 'Edit Member')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                @include('alerts.success')
                <div class="card-header">
                    <h5 class="title">{{ _('Edit Member') }}</h5>
                </div>
                <form method="POST" action="{{ route('member.member_edit', $member->id) }}" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        {{-- <div class="form-group {{ $errors->has('membership_id') ? ' has-danger' : '' }}">
                            <label>{{ _('Membership ID') }}</label>
                            <input type="text" name="membership_id" class="form-control {{ $errors->has('membership_id') ? ' is-invalid' : '' }}" placeholder="{{ _('Enter membership ID') }}" value="{{$member->membership_id }}">
                            @include('alerts.feedback', ['field' => 'membership_id'])
                        </div> --}}
                        <div class="form-group {{ $errors->has('name') ? ' has-danger' : '' }}">
                            <label>{{ _('Name') }}</label>
                            <input type="text" name="name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ _('Enter Member\'s Name') }}" value="{{ $member->name }}">
                            @include('alerts.feedback', ['field' => 'name'])
                        </div>
                        <div class="form-group {{ $errors->has('designation') ? ' has-danger' : '' }}">
                            <label>{{ _('Designation') }} </label>
                            <input type="text" name="designation" class="form-control {{ $errors->has('designation') ? ' is-invalid' : '' }}" placeholder="{{ _('Enter Member\'s Designation') }}" value="{{ $member->designation }}">
                            @include('alerts.feedback', ['field' => 'designation'])
                        </div>
                        <div class="row">
                            {{-- <div class="form-group col-md-6 {{ $errors->has('member_type') ? ' has-danger' : '' }}">
                                <label>{{ _('Member Type') }}</label>
                                <select name="member_type" class="form-control {{ $errors->has('member_type') ? ' is-invalid' : '' }}">
                                    @foreach ($types as $type)
                                        <option value="{{ $type->id }}" @if( $member->member_type == $type->id) selected @endif> {{ $type->title }}</option>
                                    @endforeach
                                </select>
                                @include('alerts.feedback', ['field' => 'member_type'])
                            </div> --}}
                            <div class="form-group col-md-12 {{ $errors->has('member_email') ? ' has-danger' : '' }}">
                                <label>{{ _('Member Email') }} <small>will be used for login</small></label>
                                <input type="email" name="member_email" class="form-control {{ $errors->has('member_email') ? ' is-invalid' : '' }}" placeholder="{{ _('Enter Member\'s Email') }}" value="{{ $member->email }}">
                                @include('alerts.feedback', ['field' => 'member_email'])
                            </div>
                        </div>
                        <div class="form-group  {{ $errors->has('image') ? ' has-danger' : '' }}">
                            <label>{{ _('Image') }}</label>
                            <input type="file" accept="image/*" name="image" class="form-control  {{ $errors->has('image') ? ' is-invalid' : '' }}">
                            @include('alerts.feedback', ['field' => 'image'])
                        </div>

                        @if(gettype(json_decode($member->phone)) == 'object')
                            @foreach(json_decode($member->phone) as $key=>$phone)
                                <div class="form-group">
                                    <label>{{ _('Contact Number - '.$key) }}</label>
                                    <div class="input-group mb-3">
                                        <input type="text" name="phone[{{$key}}][number]" class="form-control" placeholder="{{ _('Enter Member\'s Contact Number') }}" value="{{ $phone->number }}">
                                        <div class="div">
                                            <select class="form-control" name="phone[{{$key}}][type]" style="font-family: inherit;">
                                                <option value="residential" @if($phone->type == 'residential') selected @endif>{{ _('Residential') }}</option>
                                                <option value="office" @if($phone->type == 'office') selected @endif>{{ _('Office') }}</option>
                                            </select>
                                            @if($key == 1)
                                                <span class="input-group-text" id="add_phone" data-count="{{collect(json_decode($member->phone))->count()}}"><i class="tim-icons icon-simple-add"></i></span>
                                            @else
                                                <span class="input-group-text delete_phone"><i class="tim-icons icon-trash-simple"></i></span>
                                            @endif
                                        </div>
                                    </div>
                                    @include('alerts.feedback', ['field' => 'phone'])
                                    @include('alerts.feedback', ['field' => 'phone.*'])
                                </div>
                            @endforeach
                        @else
                            <div class="form-group">
                                <label>{{ _('Contact Number - 1') }}</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="phone[1][number]" class="form-control" placeholder="{{ _('Enter Member\'s Contact Number') }}">
                                    <div class="div">
                                        <select class="form-control" name="phone[1][type]" style="font-family: inherit;">
                                            <option value="residential">{{ _('Residential') }}</option>
                                            <option value="office">{{ _('Office') }}</option>
                                        </select>
                                        <span class="input-group-text" id="add_phone" data-count="1"><i class="tim-icons icon-simple-add"></i></span>
                                    </div>
                                </div>
                                @include('alerts.feedback', ['field' => 'phone'])
                                @include('alerts.feedback', ['field' => 'phone.*'])
                            </div>
                        @endif





                        <div id="append"></div>

                        <div class="form-group {{ $errors->has('address') ? ' has-danger' : '' }}">
                            <label>{{ _('Address') }} </label>
                            <input type="text" name="address" class="form-control {{ $errors->has('address') ? ' is-invalid' : '' }}" placeholder="{{ _('Enter Member\'s Address') }}" value="{{ $member->address }}">
                            @include('alerts.feedback', ['field' => 'address'])
                        </div>

                        <div class="form-group {{ $errors->has('description') ? ' has-danger' : '' }}">
                            <label>{{ _('Additional Description') }} </label>
                            <textarea rows="3" name="description" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}">
                                {{ $member->details }}
                            </textarea>
                            @include('alerts.feedback', ['field' => 'description'])
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
                        {{ _('Create Member') }}
                    </p>
                    <div class="card-description">
                        {{ _('The role\'s manages user permissions by assigning different roles to users. Each role defines specific access levels and actions a user can perform. It helps ensure proper authorization and security in the system.') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
<script>
$(function() {
    $('#add_phone').click(function() {

        count = $(this).data('count') + 1;
        $(this).data('count', count);

        result = `
                <div class="form-group">
                    <label>{{ _('Contact Number - ${count}') }}</label>
                    <div class="input-group mb-3">
                        <input type="text" name="phone[${count}][number]" class="form-control" placeholder="{{ _('Enter Member\'s Contact Number') }}">
                        <div class="div">
                            <select class="form-control" name="phone[${count}][type]" style="font-family: inherit;">
                                <option value="residential">{{ _('Residential') }}</option>
                                <option value="office">{{ _('Office') }}</option>
                            </select>
                            <span class="input-group-text delete_phone"><i class="tim-icons icon-trash-simple"></i></span>
                        </div>
                    </div>
                </div>

        `;

        $('#append').append(result);

    });

    $(document).on('click', '.delete_phone', function() {
        $(this).closest('.form-group').remove();
    });
});
</script>
@endpush
