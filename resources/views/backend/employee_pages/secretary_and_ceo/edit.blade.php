@extends('backend.layouts.master', ['pageSlug' => 'sec_and_ceo'])

@section('title', 'Edit Secretary & CEO')
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
                    <h5 class="title">{{ _('Edit Secretary & CEO') }}</h5>
                </div>
                <form method="POST" action="{{ route('sec_and_ceo.sc_edit',$sec_and_ceo->id) }}" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6 {{ $errors->has('member_id') ? ' has-danger' : '' }}">
                                <label>{{ _('Member') }}</label>
                                <select id="memberSelect" name="member_id" class="form-control {{ $errors->has('member_id') ? ' is-invalid' : '' }}">
                                    @foreach ($members as $member)
                                        <option value="{{ $member->id }}" @if( $sec_and_ceo->member_id == $member->id) selected @endif> {{ $member->name }}</option>
                                    @endforeach
                                </select>
                                @include('alerts.feedback', ['field' => 'member_id'])
                            </div>
                            <div class="form-group col-md-6 {{ $errors->has('slug') ? ' has-danger' : '' }}">
                                <label>{{ _('Slug') }}</label>
                                <input type="text" class="form-control {{ $errors->has('slug') ? ' is-invalid' : '' }}" id="slug" name="slug" placeholder="{{ _('Enter Slug') }}" value="{{ $sec_and_ceo->slug }}">
                                @include('alerts.feedback', ['field' => 'slug'])
                            </div>
                        </div>

                        <div id="memberInfo" class="row align-items-center">

                        </div>
                        {{-- <div class="form-group {{ $errors->has('designation') ? ' has-danger' : '' }}">
                            <label>{{ _('Designation') }}</label>
                            <select name="designation" class="form-control {{ $errors->has('designation') ? ' is-invalid' : '' }}">
                                    <option value="Secretary & CEO, ICSB" @if( $sec_and_ceo->designation == 'Secretary & CEO, ICSB') selected @endif>{{_('Secretary & CEO')}}</option>
                                    <option value="Past Secretary & CEO, ICSB" @if( $sec_and_ceo->designation == 'Past Secretary & CEO, ICSB') selected @endif>{{_('Past Secretary & CEO')}}</option>
                            </select>
                            @include('alerts.feedback', ['field' => 'designation'])
                        </div> --}}
                        @foreach ($sec_and_ceo->durations as $key=>$duration)
                        <div class="form-group {{ $errors->has('duration') ? ' has-danger' : '' }} {{ $errors->has('duration.*') ? ' has-danger' : '' }}">
                            <label>{{ _('Secretary & CEO Duration -')}}{{$key+1}}</label>
                            <div class="input-group mb-3">
                                <input type="date" name="duration[{{$key+1}}][start_date]" class="form-control" value="{{ date('Y-m-d', strtotime($duration->start_date))}}" @if((!empty($duration->end_date)) && (date('Y-m-d', strtotime($duration->end_date)) <= Carbon\Carbon::now()->format('Y-m-d')) ) disabled @endif >
                                <input type="date" name="duration[{{$key+1}}][end_date]" class="form-control" @if((!empty($duration->end_date)) && (date('Y-m-d', strtotime($duration->end_date)) <= Carbon\Carbon::now()->format('Y-m-d')) ) disabled @endif value="{{ $duration->end_date ? date('Y-m-d', strtotime($duration->end_date)) : ''}}">
                                @if($key<1)
                                    <span class="input-group-text" id="add_duration" data-count="{{count($sec_and_ceo->durations)}}"><i class="tim-icons icon-simple-add"></i></span>
                                @else
                                    <a href="{{route('sec_and_ceo.single.sc_delete',$duration->id)}}">
                                        <span class="input-group-text text-danger delete_duration h-100"><i class="tim-icons icon-trash-simple"></i></span>
                                    </a>
                                @endif
                                <input type="hidden" name='duration[{{$key+1}}][id]' value='{{$duration->id}}' @if((!empty($duration->end_date)) && (date('Y-m-d', strtotime($duration->end_date)) <= Carbon\Carbon::now()->format('Y-m-d')) ) disabled @endif>
                            </div>
                        </div>
                        @endforeach
                        @include('alerts.feedback', ['field' => 'duration'])
                        @include('alerts.feedback', ['field' => 'duration.*'])
                        <div id="append">

                        </div>

                        <div class="form-group {{ $errors->has('bio') ? ' has-danger' : '' }}">
                            <label>{{ _('Secretary & CEO Bio') }} </label>
                            <textarea rows="3" name="bio" class="form-control {{ $errors->has('bio') ? ' is-invalid' : '' }}">
                                {{ $sec_and_ceo->bio }}
                            </textarea>
                            @include('alerts.feedback', ['field' => 'bio'])
                        </div>
                        <div class="form-group {{ $errors->has('message') ? ' has-danger' : '' }}">
                            <label>{{ _('Secretary & CEO Message') }} </label>
                            <textarea rows="3" name="message" class="form-control {{ $errors->has('message') ? ' is-invalid' : '' }}">
                                {{ $sec_and_ceo->message }}
                            </textarea>
                            @include('alerts.feedback', ['field' => 'message'])
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
                        {{ _('Secretary & CEO') }}
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
    $('#add_duration').click(function() {
        count = $(this).data('count') + 1;
        $(this).data('count', count);

        result = `
                <div class="form-group {{ $errors->has('duration') ? ' has-danger' : '' }} {{ $errors->has('duration.*') ? ' has-danger' : '' }}">
                    <label>{{ _('Secretary & CEO Duration - ${count}') }}</label>
                    <div class="input-group mb-3">
                        <input type="date" name="duration[${count}][start_date]" class="form-control">
                        <input type="date" name="duration[${count}][end_date]" class="form-control">
                        <span class="input-group-text text-danger delete_duration"><i class="tim-icons icon-trash-simple"></i></span>
                    </div>
                </div>
                `;
        $('#append').append(result);
    });
    $(document).on('click', '.delete_duration', function() {
        $(this).closest('.form-group').remove();
    });
});
</script>
@endpush