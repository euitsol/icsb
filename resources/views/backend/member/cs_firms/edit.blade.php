@extends('backend.layouts.master', ['pageSlug' => 'cs_firm'])

@section('title', 'Edit CS Firms Member')
@push('css')
    <style>
        .input-group .form-control:first-child {
            border-right: 1px solid rgba(29, 37, 59, 0.5);
        }
    </style>
@endpush

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ _('Edit CS Firms Member') }}</h5>
                </div>
                <form method="POST" action="{{ route('cs_firm.cs_firm_edit',$csf_member->id) }}" autocomplete="off"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="delete_div border p-4">
                            <div
                                class="form-group {{ $errors->has('csf_member.member_id') ? ' has-danger' : '' }} {{ $errors->has('sf_member.ppcn') ? ' has-danger' : '' }}">
                                <label>{{ _('CS Firm Member - 1') }}</label>
                                <div class="input-group mb-3">
                                    <select name="csf_member[member_id]" class="form-control memberSelect"
                                        data-count="1">
                                        @foreach ($members as $member)
                                            @php
                                                $check = App\Models\CsFirms::where('member_id',$member->id)->where('member_id','!=',$csf_member->member_id)->first();
                                            @endphp
                                            @if(!$check)
                                                @if($member->member_type != 5)
                                                    <option value="{{ $member->id }}"
                                                        @if ($csf_member->member_id == $member->id) selected @endif> {{ $member->name }} ( {{ $member->membership_id }} )
                                                    </option>
                                                @endif
                                            @endif
                                        @endforeach
                                    </select>
                                    <input type="text" name="csf_member[ppcn]" value='{{$csf_member->private_practice_certificate_no}}' class="form-control" placeholder="Enter private practice certificate no..">
                                </div>
                                @include('alerts.feedback', ['field' => 'csf_member.member_id'])
                                @include('alerts.feedback', ['field' => 'csf_member.ppcn'])
                            </div>
                            <div class="row align-items-center memberInfo">

                            </div>
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
                        {{ _('CS Firms Member') }}
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
    $(document).ready(function() {
        function handleMemberSelection() {
            const selectedMemberId = $(this).val();
            const container = $(this).closest('.delete_div');
            $.ajax({
                url: `/members/${selectedMemberId}`,
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    container.find('.memberInfo').html(`
                        <div class='col-md-2 text-center'>
                            <img class="rounded" width="100" src="${data.member.image}">
                        </div>
                        <div class='col-md-10'>
                            <div class="form-group">
                                <label>Designation</label>
                                <input type="text" class="form-control" value="${data.member.designation}" disabled>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" value="${data.member.email}" disabled>
                            </div>
                        </div>
                    `);
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching member data:', error);
                }
            });
        };
        $('.memberSelect').on('change', handleMemberSelection);
    });
    </script>
@endpush
