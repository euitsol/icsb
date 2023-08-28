@extends('backend.layouts.master', ['pageSlug' => 'committee'])

@section('title', 'Create Committee Member')
@push('css')
<style>
    .input-group .form-control:first-child{
        border-right: 1px solid rgba(29, 37, 59, 0.5);
    }
    .input-group .form-control:not(:first-child):not(:last-child){
        border-radius: 0;
        border-right: 0;
    }
</style>
@endpush
@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title float-left">{{ _('Add '.$committee->title.' Member') }}</h5>
                    <div class="col-4 text-right float-right">
                        @include('backend.partials.button', ['routeName' => 'committee.committee_list', 'className' => 'btn-info', 'label' => 'Committees'])
                        @include('backend.partials.button', ['routeName' => 'committee.committee_member_list', 'params'=>[$committee->id], 'className' => 'btn-success', 'label' => 'Member List'])
                    </div>
                </div>

                <form method="POST" action="{{route('committee.committee_member_create',$committee->id)}}" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group ">
                            <label>{{ _('Member-1') }}</label>
                            <div class="input-group mb-3">
                                <select name="cm[1][member_id]" class="form-control ">
                                    <option selected hidden>{{_('Select Committee Member')}}</option>
                                    @foreach ($members as $member)
                                        @if($member->member_type != 5)
                                            <option value="{{ $member->id }}" @if( old('cm[1][member_id]') == $member->id) selected @endif> {{ $member->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <select name="cm[1][cmt_id]" class="form-control ">
                                    <option selected hidden>{{_('Select Committee Member Type')}}</option>
                                    @foreach ($cm_types as $type)
                                        <option value="{{ $type->id }}" @if( old('cm[1][cmt_id]') == $type->id) selected @endif> {{ $type->title }}</option>
                                    @endforeach
                                </select>
                                <span class="input-group-text" id="add_member" data-count="1"><i class="tim-icons icon-simple-add"></i></span>
                            </div>
                        </div>
                        @include('alerts.feedback', ['field' => 'cm.*.member_id'])
                        @include('alerts.feedback', ['field' => 'cm.*.cmt_id'])
                        <div id="append">
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
@push('js')
<script>
$(function() {
    $('#add_member').click(function() {

        count = $(this).data('count') + 1;
        $(this).data('count', count);

        result = `
                <div class="form-group ">
                    <label>{{ _('Member-${count}') }}</label>
                    <div class="input-group mb-3">
                        <select name="cm[${count}][member_id]" class="form-control ">
                            <option selected hidden>{{_('Select Committee')}}</option>
                            @foreach ($members as $member)
                                @if($member->member_type != 5)
                                    <option value="{{ $member->id }}" @if( old('cm[${count}][member_id]') == $member->id) selected @endif> {{ $member->name }}</option>
                                @endif
                            @endforeach
                        </select>
                        <select name="cm[${count}][cmt_id]" class="form-control ">
                            <option selected hidden>{{_('Select Committee Member Type')}}</option>
                            @foreach ($cm_types as $type)
                                <option value="{{ $type->id }}" @if( old('cm[${count}][cmt_id]') == $type->id) selected @endif> {{ $type->title }}</option>
                            @endforeach
                        </select>
                        <span class="input-group-text text-danger delete_member"><i class="tim-icons icon-trash-simple"></i></span>
                    </div>
                </div>
        `;
        $('#append').append(result);

    });

    $(document).on('click', '.delete_member', function() {
        $(this).closest('.form-group').remove();
    });
});
</script>
@endpush

