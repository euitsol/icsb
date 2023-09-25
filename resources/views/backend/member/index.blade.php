@extends('backend.layouts.master', ['pageSlug' => 'member'])

@section('title', 'Member')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{ _('Member List') }}</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="javascript:void(0)" class="btn btn-sm btn-success syncButton">Sync</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include('alerts.success')
                    <div class="">
                        <table class="table tablesorter datatable">
                            <thead class=" text-primary">
                                <tr>
                                    <th>{{ _('Membership ID') }}</th>
                                    <th>{{ _('Name') }}</th>
                                    <th>{{ _('Image') }}</th>
                                    <th>{{ _('Type') }}</th>
                                    <th>{{ _('Honorary') }}</th>
                                    <th>{{ _('Member Status') }}</th>
                                    <th>{{ _('Created at') }}</th>
                                    <th>{{ _('Created by') }}</th>
                                    {{-- <th>{{ _('Action') }}</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($members as $member)
                                    <tr>
                                        <td> {{ $member->membership_id }} </td>
                                        <td> {{ $member->name }} </td>
                                        <td>
                                            <img class="rounded" width="60" src="
                                            @if(!empty($member->image))
                                                {{ member_image($member->image) }}
                                            @else
                                                {{ asset('no_img/no_img.jpg') }}
                                            @endif
                                            ">
                                        </td>
                                        <td> {{ $member->member_type()}} </td>
                                        <td> {{ $member->member_honorary()}} </td>
                                        <td>
                                            {{-- @include('backend.partials.button', ['routeName' => 'member.status.member_edit','params' => [$member->id], 'className' => $member->getStatusClass(), 'label' => $member->getStatus() ]) --}}
                                            {{ $member->member_status()}}
                                        </td>
                                        <td> {{ timeFormate($member->created_at) }} </td>
                                        <td> {{ $member->created_user->name ?? 'system' }} </td>
                                        {{-- <td>
                                            @include('backend.partials.action_buttons', [
                                                'menuItems' => [
                                                    ['routeName' => '', 'label' => 'View'],
                                                    ['routeName' => 'member.member_edit',     'params' => [$member->id], 'label' => 'Update'],
                                                    ['routeName' => 'member.status.member_edit',   'params' => [$member->id], 'label' => 'Change Status'],
                                                    ['routeName' => 'member.member_delete',   'params' => [$member->id], 'label' => 'Delete', 'delete' => true],
                                                ]
                                            ])
                                        </td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{ _('Non Member List') }}</h4>
                        </div>
                        <div class="col-4 text-right">
                            @include('backend.partials.button', ['routeName' => 'member.member_create', 'className' => 'btn-primary', 'label' => 'Create Non Member'])
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include('alerts.success')
                    <div class="">
                        <table class="table tablesorter datatable">
                            <thead class=" text-primary">
                                <tr>
                                    <th>{{ _('Name') }}</th>
                                    <th>{{ _('Image') }}</th>
                                    <th>{{ _('Type') }}</th>
                                    <th>{{ _('Status') }}</th>
                                    <th>{{ _('Created at') }}</th>
                                    <th>{{ _('Created by') }}</th>
                                    <th>{{ _('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($non_members as $nmember)
                                    <tr>
                                        <td> {{ $nmember->name }} </td>
                                        <td>
                                            <img class="rounded" width="60" src="
                                            @if(!empty($nmember->image))
                                                {{ member_image($nmember->image) }}
                                            @else
                                                {{ asset('no_img/no_img.jpg') }}
                                            @endif
                                            ">
                                        </td>
                                        <td> {{ $nmember->type->title ?? ''}} </td>
                                        <td>
                                            @include('backend.partials.button', ['routeName' => 'member.status.member_edit','params' => [$nmember->id], 'className' => $nmember->getStatusClass(), 'label' => $nmember->getStatus() ])
                                        </td>
                                        <td> {{ timeFormate($nmember->created_at) }} </td>
                                        <td> {{ $nmember->created_user->name ?? 'system' }} </td>
                                        <td>
                                            @include('backend.partials.action_buttons', [
                                                'menuItems' => [
                                                    ['routeName' => '', 'label' => 'View'],
                                                    ['routeName' => 'member.member_edit',     'params' => [$nmember->id], 'label' => 'Update'],
                                                    ['routeName' => 'member.status.member_edit',   'params' => [$nmember->id], 'label' => 'Change Status'],
                                                    ['routeName' => 'member.member_delete',   'params' => [$nmember->id], 'label' => 'Delete', 'delete' => true],
                                                ]
                                            ])
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
{{--
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{ _('Member Types') }}</h4>
                        </div>
                        <div class="col-4 text-right">
                            @include('backend.partials.button', ['routeName' => 'member.member_type_create', 'className' => 'btn-primary', 'label' => 'Create Member Type'])
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="">
                        <table class="table tablesorter datatable">
                            <thead class=" text-primary">
                                <tr>
                                    <th>{{ _('Order') }}</th>
                                    <th>{{ _('Type Name') }}</th>
                                    <th>{{ _('Total Member') }}</th>
                                    <th>{{ _('Status') }}</th>
                                    <th>{{ _('Created at') }}</th>
                                    <th>{{ _('Created by') }}</th>
                                    <th>{{ _('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($types as $type)
                                    <tr>
                                        <td> {{ $type->order_key }} </td>
                                        <td> {{ $type->title ?? ''  }} </td>
                                        <td> {{ number_format($type->members->count()) }} </td>
                                        <td>
                                            @include('backend.partials.button', ['routeName' => 'member.status.member_type_edit','params' => [$type->id], 'className' => $type->getStatusClass(), 'label' => $type->getStatus() ])
                                        </td>
                                        <td> {{ timeFormate($type->created_at) }} </td>
                                        <td> {{ $type->created_user->name ?? 'system' }} </td>
                                        <td>
                                            @include('backend.partials.action_buttons', [
                                                'menuItems' => [
                                                    ['routeName' => '', 'label' => 'View'],
                                                    ['routeName' => 'member.member_type_edit',   'params' => [$type->id], 'label' => 'Update'],
                                                    ['routeName' => 'member.status.member_type_edit',   'params' => [$type->id], 'label' => 'Change Status'],
                                                    ['routeName' => 'member.member_type_delete', 'params' => [$type->id], 'label' => 'Delete', 'delete' => true],
                                                ]
                                            ])
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> --}}



        </div>
    </div>

  <!-- Modal -->
  <div class="modal fade" id="syncModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body">
            <h5 class="text-center"> Syncing Data....  </h5>
            <h6 class="text-center text-danger" id="syncError"></h6>
            <h6 class="text-center text-success" id="syncSuccess"></h6>
            <div class="text-center" id="countdownTimer"></div>
        </div>
      </div>
    </div>
  </div>
@endsection

@include('backend.partials.datatable', ['columns_to_show' => [0,1,2,3,4,5,6]])


@push('js')
<script>
    $(document).ready(function () {
        $(".syncButton").click(function () {
            $('#syncError').text('');
            $('#syncSuccess').text('');
            $('#syncModal').modal('show');
            $.ajax({
                url: "{{ route('sync') }}",
                type: "POST",
                dataType: "json",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                success: function (data) {
                    var countdown = 3; // 3 seconds
                    var countdownTimer = setInterval(function () {
                        $('#countdownTimer').text(countdown);
                        countdown--;

                        if (countdown < 0) {
                            clearInterval(countdownTimer);
                            $("#syncSuccess").text("Successfully synced");
                            setTimeout(function () {
                                location.reload();
                            }, 1000);
                        }
                    }, 1000);
                },
                error: function (xhr, status, error) {
                    $('#syncModal').modal('show');
                    $("#syncError").text("Error: " + xhr.responseText);
                },
            });
        });
    });
</script>
@endpush

