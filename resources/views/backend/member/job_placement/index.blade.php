@extends('backend.layouts.master', ['pageSlug' => 'job_placement'])

@section('title', 'Job Placement')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{ _('Job Placement') }}</h4>
                        </div>
                        <div class="col-4 text-right">
                            @include('backend.partials.button', ['routeName' => 'job_placement.jp_create', 'className' => 'btn-primary', 'label' => 'Add Job Placement'])
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include('alerts.success')
                    <div class="">
                        <table class="table tablesorter datatable">
                            <thead class=" text-primary">
                                <tr>
                                    <th>{{ _('Title') }}</th>
                                    <th>{{ _('Company Name') }}</th>
                                    <th>{{ _('Company URL') }}</th>
                                    <th>{{ _('Job Type') }}</th>
                                    <th>{{ _('Salary') }}</th>
                                    <th>{{ _('Deadline') }}</th>
                                    <th>{{ _('Status') }}</th>
                                    <th>{{ _('Creation date') }}</th>
                                    <th>{{ _('Created by') }}</th>
                                    <th>{{ _('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($job_placements as $jp)
                                    <tr>
                                        <td> {{ $jp->title }} </td>
                                        <td> {{ $jp->company_name }} </td>
                                        <td> {{ removeHttpProtocol($jp->company_url) }} </td>

                                        <td>{{ $jp->job_type }}</td>
                                        <td>
                                            @if(!empty(json_decode($jp->salary)))
                                                {{ json_decode($jp->salary)->from .'-'. json_decode($jp->salary)->to .' ('. $jp->salary_type .')' }}
                                            @endif
                                        </td>
                                        <td>
                                            {{ date('d-M-Y', strtotime($jp->deadline)) }}
                                         </td>
                                        <td>
                                            <span class="badge {{$jp->getMultiStatusClass()}}">{{$jp->getMultiStatus()}}</span>
                                        </td>
                                        <td> {{ timeFormate($jp->created_at) }} </td>
                                        <td> {{ $jp->created_user->name ?? 'system' }} </td>
                                        <td>
                                            @include('backend.partials.action_buttons',
                                                $jp->getMultiStatusBtn($jp->id)
                                            )
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



<!-- Test Mail Modal -->
  <div class="modal test_mail_modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{_('Test Mail')}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" id="testMailForm">
            @csrf
            <div class="modal-body">
                <div class="form-group {{ $errors->has('email') ? ' has-danger' : '' }}">
                    <label>{{ _('Email') }} <span class="text-danger">*</span></label>
                    <input type="email" name="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ _('Enter job email') }}" value="{{ old('email') }}">
                    @include('alerts.feedback', ['field' => 'email'])
                </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
      </div>
    </div>
  </div>
@endsection

@include('backend.partials.datatable', ['columns_to_show' => [0,1,2,3,4,5,6,7,8]])

@push('js')
    <script>
        $(document).ready(function() {
            $('.accept').click(function(e) {
                e.preventDefault();
                $.ajax({
                    url: "/run-queue",
                    type: "GET",
                    success: function (data) {},
                    error: function (xhr, status, error) {
                        console.log();("Error: " + xhr.responseText);
                    },
                });
                window.location.href = $(this).attr('href');
            });



            // Modal JS 
            $('.test_mail').on('click', function(){
                let url = ("{{ route('job_placement.test_mail.jp_edit', ['id']) }}");
                let _url = url.replace('id', $(this).data('id'));
                $('.test_mail_modal').modal('show');
                $('#testMailForm').attr('action',_url);
            })

            
        });
    </script>
@endpush
