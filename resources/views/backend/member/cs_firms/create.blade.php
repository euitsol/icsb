@extends('backend.layouts.master', ['pageSlug' => 'president'])

@section('title', 'Add President')
@push('css')
<style>
    .input-group .form-control:first-child{
        border-right: 1px solid rgba(29, 37, 59, 0.5);
    }
    .input-group .form-control:not(:first-child):not(:last-child) {
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
                    <h5 class="title float-left">{{ _('Add President') }}</h5>
                    <span class="btn btn-sm btn-primary float-right" id="add_csf_member" data-count="1">{{_('+ Add New')}}</i></span>
                </div>
                <form method="POST" action="{{ route('president.president_create') }}" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="delete_div border p-4">
                            <div class="form-group {{ $errors->has('csf_member.member_id') ? ' has-danger' : '' }} {{ $errors->has('csf_member.ppcn') ? ' has-danger' : '' }}">
                                <label>{{ _('CS Firm Member - 1') }}</label>
                                <div class="input-group mb-3">
                                    <select name="csf_member[member_id]" class="form-control memberSelect">
                                        <option selected hidden>{{_('Select Member')}}</option>
                                        @foreach ($members as $member)
                                            <option value="{{ $member->id }}" @if( old('csf_member.member_id') == $member->id) selected @endif> {{ $member->name }}</option>
                                        @endforeach
                                    </select>
                                    <input type="text" name="csf_member[ppcn]" value='{{member_id($member->id)}}' class="form-control ppcn">
                                </div>
                            </div>
                            @include('alerts.feedback', ['field' => 'csf_member.member_id'])
                            @include('alerts.feedback', ['field' => 'csf_member.ppcn'])
                            <div class="row align-items-center memberInfo">

                            </div>
                            <div class="form-group {{ $errors->has('csf_member.slug') ? ' has-danger' : '' }}">
                                <label>{{ _('Slug') }}</label>
                                <input type="text" class="form-control {{ $errors->has('csf_member.slug') ? ' is-invalid' : '' }}" id="slug" name="csf_member[slug]" placeholder="{{ _('Enter Slug') }}" value="{{ old('csf_member.slug') }}">
                                @include('alerts.feedback', ['field' => 'csf_member.slug'])
                            </div>
                        </div>



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
                        {{ _('President') }}
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
    function generateSlug(str) {
        return str
            .toLowerCase()
            .replace(/\s+/g, "-")
            .replace(/[^\w-]+/g, "")
            .replace(/--+/g, "-")
            .replace(/^-+|-+$/g, "");
    }
    $(document).ready(function () {
        $('#memberSelect').on('change', function () {
            const selectedMemberId = $(this).val();
            $.ajax({
                url: `/members/${selectedMemberId}`,
                method: 'GET',
                dataType: 'json',
                success: function (data) {
                    console.log(data);
                    const slugValue = generateSlug(data.name);
                    $("#slug").val(slugValue);
                    $('#memberInfo').html(`
                    <div class='col-md-2 text-center'>
                        <img class="rounded" width="100" src="{{ storage_url('${data.image}')}}">
                    </div>
                    <div class='col-md-10'>
                        <div class="form-group">
                            <label>{{ _('Designation') }}</label>
                            <input type="text" class="form-control" value="${data.designation}" disabled>
                        </div>
                        <div class="form-group">
                            <label>{{ _('Email') }}</label>
                            <input type="text" class="form-control" value="${data.email}" disabled>
                        </div>
                    </div>

                    `);
                },
                error: function (xhr, status, error) {
                    console.error('Error fetching member data:', error);
                }
            });
        });
    });


    $(function() {
    $('#add_csf_member').click(function() {
        count = $(this).data('count') + 1;
        $(this).data('count', count);

        result = `
                        <div class="delete_div border p-4">
                            <div class="form-group {{ $errors->has('csf_member.member_id') ? ' has-danger' : '' }} {{ $errors->has('csf_member.ppcn') ? ' has-danger' : '' }}">
                                <label>{{ _('CS Firm Member - ${count}') }}</label>
                                <div class="input-group mb-3">
                                    <select name="csf_member[member_id]" class="form-control memberSelect">
                                        <option selected hidden>{{_('Select Member')}}</option>
                                        @foreach ($members as $member)
                                            <option value="{{ $member->id }}" @if( old('csf_member.member_id') == $member->id) selected @endif> {{ $member->name }}</option>
                                        @endforeach
                                    </select>
                                    <input type="text" name="csf_member[ppcn]" value='{{member_id($member->id)}}' class="form-control ppcn">
                                    <span class="input-group-text text-danger delete_csfirm"><i class="tim-icons icon-trash-simple"></i></span>
                                </div>
                            </div>
                            @include('alerts.feedback', ['field' => 'csf_member.member_id'])
                            @include('alerts.feedback', ['field' => 'csf_member.ppcn'])
                            <div class="row align-items-center memberInfo">

                            </div>
                            <div class="form-group {{ $errors->has('csf_member.slug') ? ' has-danger' : '' }}">
                                <label>{{ _('Slug') }}</label>
                                <input type="text" class="form-control {{ $errors->has('csf_member.slug') ? ' is-invalid' : '' }}" id="slug" name="csf_member[slug]" placeholder="{{ _('Enter Slug') }}" value="{{ old('csf_member.slug') }}">
                                @include('alerts.feedback', ['field' => 'csf_member.slug'])
                            </div>
                        </div>
                    `;
                        $('#append').append(result);
                    });
                    $(document).on('click', '.delete_csfirm', function() {
                        $(this).closest('.delete_div').remove();
                    });
                });
                </script>
@endpush


