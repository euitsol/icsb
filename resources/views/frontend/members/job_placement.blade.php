@extends('frontend.master')

@section('title', 'Available Jobs')

@section('content')
  <!-- =============================== Breadcrumb Section ======================================-->
@php
$banner_image = asset('breadcumb_img/members.jpg');
$title = 'Jobs';
$datas = [
            'image'=>$banner_image,
            'title'=>$title,
            'paths'=>[
                        'home'=>'Home',
                        'javascript:void(0)'=>'Members',
                        'member_view.job_index'=>'Job Placement',
                    ]
        ];
@endphp
@include('frontend.includes.breadcrumb',['datas'=>$datas])
<!-- =============================== Breadcrumb Section ======================================-->


  <!----============================= Job Placement Section ========================---->

  <div class="job-placement-section big-sec-min-height">
    <div class="container">
      <div class="title">
        <h1>{{_('Available Jobs')}}</h1>
        <input type="text" class="search_input" data-job_placements="{{json_encode($job_placements)}}" placeholder="Search job">
      </div>
      <div class="job-table">
        <div class="job_data">
          @foreach ($job_placements as $jp)
            <div class="single-job">
              <div class="left-col">
                  <div class="details-col">
                  <h2>{{$jp->title}}</h2>
                  <h3>{{$jp->company_name}}</h3>
                  <span class="day"><i class="fa-solid fa-clock"></i>
                      {{$jp->createDiffTime}}
                  </span>
                  <span><i class="fa-solid fa-briefcase"></i>{{$jp->job_type}}</span>

                  </div>
              </div>
              <div class="middle-col d-flex align-items-center">
                  <ul class="m-0">
                  <li>
                    <strong>Salary:</strong>
                    @if(isset(json_decode($jp->salary)->from) & isset(json_decode($jp->salary)->to))
                    TK. <span>{{ (json_decode($jp->salary)->from .' - '. json_decode($jp->salary)->to)}}</span> / 
                    @endif
                    {{$jp->salary_type}}
                  </li>
                  
                  <li><strong>Deadline: </strong><span>{{ $jp->deadline}} {{_('12:00 PM')}}</span></li>
                  </ul>
              </div>
              <div class="right-col ">
                  <div class="btn">
                  <a href="{{route('member_view.job_details',$jp->jid)}}">View Details</a>
                  </div>
              </div>
            </div>
          @endforeach
        </div>
       
        <span class="paginate">{{ $job_placements->links('vendor.pagination.notice') }}</span>
        
      </div>
    </div>
  </div>
@endsection
@push('js')
<script>
  $(document).ready(function() {
      $('.search_input').on('input', function() {
          let search_value = $('.search_input').val();
          let job_placements = $('.search_input').data('job_placements');
          if (search_value !== null && search_value !== "") {
              let _url = ("{{ route('job.search', ['search_value']) }}");
              let __url = _url.replace('search_value', search_value);
              $.ajax({
                  url: __url,
                  method: 'GET',
                  dataType: 'json',
                  beforeSend:function() {
                      $('.job_data').html('Loading...');
                  },
                  success: function(data) {
                      $('.paginate').hide();
                      var job_data= '';
                      if(!data.jobs || data.jobs.length === 0){
                        job_data +=`
                                          <h3 class="text-danger mx-auto my-5">Member Not Found</h3>
                                      `;
                      } else{

                          data.jobs.forEach(function(job) {
                            
                            var salary = JSON.parse(job.salary).to != null && JSON.parse(job.salary).from != null  ? 'TK. <span>'+JSON.parse(job.salary).to+' - '+JSON.parse(job.salary).from+'</span> / ' : '';
                            let details_url = ("{{ route('member_view.job_details',['jid']) }}");
                            let details_url_ = details_url.replace('jid', job.jid);
                            console.log(details_url_);
                            job_data += `
                                <div class="single-job">
                                  <div class="left-col">
                                      <div class="details-col">
                                      <h2>${job.title}</h2>
                                      <h3>${job.company_name}</h3>
                                      <span class="day"><i class="fa-solid fa-clock"></i>
                                          ${job.createDiffTime}
                                      </span>
                                      <span><i class="fa-solid fa-briefcase"></i>${job.job_type}</span>

                                      </div>
                                  </div>
                                  <div class="middle-col d-flex align-items-center">
                                      <ul class="m-0">
                                      <li>
                                        <strong>Salary:</strong>
                                        ${salary}
                                        ${job.salary_type}
                                      </li>
                                      
                                      <li><strong>Deadline: </strong><span>${job.deadline}</span></li>
                                      </ul>
                                  </div>
                                  <div class="right-col ">
                                      <div class="btn">
                                      <a href="${details_url_}">View Details</a>
                                      </div>
                                  </div>
                                </div>
                              `;
                          });

                      }
                      $('.job_data').html(job_data);
                  },
                  error: function(xhr, status, error) {
                      console.error('Error fetching member data:', error);
                  }
              });
          }else{
            
              $('.paginate').show();
              var job_placement= '';

              job_placements.data.forEach(function(job) {
                var salary = JSON.parse(job.salary).to != null && JSON.parse(job.salary).from != null  ? 'TK. <span>'+JSON.parse(job.salary).to+' - '+JSON.parse(job.salary).from+'</span> / ' : '';
                  let details_url = ("{{ route('member_view.job_details',['jid']) }}");
                  let details_url_ = details_url.replace('jid', job.jid);
                  console.log(details_url_);
                  job_placement += `
                    <div class="single-job">
                      <div class="left-col">
                          <div class="details-col">
                          <h2>${job.title}</h2>
                          <h3>${job.company_name}</h3>
                          <span class="day"><i class="fa-solid fa-clock"></i>
                          </span>
                          <span><i class="fa-solid fa-briefcase"></i>${job.job_type}</span>

                          </div>
                      </div>
                      <div class="middle-col d-flex align-items-center">
                          <ul class="m-0">
                          <li>
                            <strong>Salary:</strong>
                            ${salary}
                            ${job.salary_type}
                          </li>
                          
                          <li><strong>Deadline: </strong><span>${job.deadline}</span></li>
                          </ul>
                      </div>
                      <div class="right-col ">
                          <div class="btn">
                          <a href="${details_url_}">View Details</a>
                          </div>
                      </div>
                    </div>
                  `;
              });
              $('.job_data').html(job_placement);
          }
      });
  });

</script>
@endpush
