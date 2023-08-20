@extends('backend.layouts.master', ['pageSlug' => 'cs_firm'])

@section('title', 'Add CS Firms Member')
@push('css')
    <style>
        .input-group .form-control:first-child {
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
                    <h5 class="title">{{ _('Add CS Firms Member') }}</h5>
                </div>
                <form method="POST" action="{{ route('cs_firm.cs_firm_create') }}" autocomplete="off"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="delete_div border p-4">
                            <div
                                class="form-group {{ $errors->has('csf_member.1.member_id') ? ' has-danger' : '' }} {{ $errors->has('csf_member.1.ppcn') ? ' has-danger' : '' }}">
                                <label>{{ _('CS Firm Member - 1') }}</label>
                                <div class="input-group mb-3">
                                    <select name="csf_member[1][member_id]" class="form-control memberSelect"
                                        data-count="1">
                                        <option selected hidden>{{ _('Select Member') }}</option>
                                        @foreach ($members as $member)
                                            @php
                                                $check = App\Models\CsFirms::where('member_id',$member->id)->first();
                                            @endphp
                                            @if(!$check)
                                                <option value="{{ $member->id }}"
                                                    @if (old('csf_member.1.member_id') == $member->id) selected @endif> {{ $member->name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                    <input type="text" name="csf_member[1][ppcn]" value='' class="form-control ppcn" placeholder="Enter private practice certificate no..">
                                    <span class="input-group-text" id="add_csf_member" data-count="1"><i class="tim-icons icon-simple-add"></i></span>
                                </div>
                                @include('alerts.feedback', ['field' => 'csf_member.1.member_id'])
                                @include('alerts.feedback', ['field' => 'csf_member.1.ppcn'])
                            </div>
                            <div class="row align-items-center memberInfo">

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
        function fetchMemberData(selectedMemberId, container) {
            $.ajax({
                url: `/members/${selectedMemberId}`,
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    container.find('.ppcn').val(data.member_id);
                    container.find('.memberInfo').html(`
                        <div class='col-md-2 text-center'>
                            <img class="rounded" width="100" src="{{ storage_url('${data.member.image}') }}">
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
        }

        function bindChangeEvents() {
            $('.memberSelect').off('change').on('change', function() {
                const selectedMemberId = $(this).val();
                const container = $(this).closest('.delete_div');
                fetchMemberData(selectedMemberId, container);
            });
        }

        $(document).ready(function() {
            bindChangeEvents();

            $('#add_csf_member').click(function() {
                const count = $(this).data('count') + 1;
                $(this).data('count', count);

                const result = `
                <div class="delete_div border p-4">
                    <div class="form-group {{ $errors->has('csf_member.${count}.member_id') ? ' has-danger' : '' }} {{ $errors->has('csf_member.${count}.ppcn') ? ' has-danger' : '' }}">
                        <label>{{ _('CS Firm Member - ${count}') }}</label>
                        <div class="input-group mb-3">
                            <select name="csf_member[${count}][member_id]" class="form-control memberSelect">
                                <option selected hidden>{{ _('Select Member') }}</option>
                                @foreach ($members as $member)
                                    <option value="{{ $member->id }}"
                                        @if (old('csf_member.${count}.member_id') == $member->id) selected @endif> {{ $member->name }}
                                    </option>
                                @endforeach
                                </select>
                                <input type="text" name="csf_member[${count}][ppcn]" value='' class="form-control ppcn" placeholder="Enter private practice certificate no..">
                                <span class="input-group-text text-danger delete_csfirm"><i class="tim-icons icon-trash-simple"></i></span>
                        </div>
                        @include('alerts.feedback', ['field' => 'csf_member.${count}.member_id'])
                        @include('alerts.feedback', ['field' => 'csf_member.${count}.ppcn'])
                    </div>
                    <div class="row align-items-center memberInfo">

                    </div>
                </div>
                `;

                $('#append').append(result);
                bindChangeEvents(); // Rebind change events for new elements
            });

            $(document).on('click', '.delete_csfirm', function() {
                $(this).closest('.delete_div').remove();
            });
        });
    </script>
@endpush
