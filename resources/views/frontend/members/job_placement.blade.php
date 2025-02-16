@extends('frontend.master')

@section('title', 'Available Jobs')

@section('content')
  <!-- =============================== Breadcrumb Section ======================================-->
@php
$banner_image = asset('breadcumb_img/members.jpg');
$title = 'Available Jobs';
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
        <h1 class="m-0" >{{_('Available Jobs')}}</h1>
        <input type="text" class="search_input" data-category="{{$category}}" data-job_placements="{{json_encode($job_placements)}}" placeholder="Search by Designation, Company Name, Nature of Job, Location, Salary">
      </div>
      <div class="category w-100">
        <a href="{{route('member_view.jps', ['category' => 'all'])}}" class="{{$category == 'all' || $category == null ? 'active' : '' }} ">{{__('All Jobs')}}</a>
        <a href="{{route('member_view.jps', ['category' => 'Company Secretary'])}}" class="{{$category == 'Company Secretary' ? 'active' : '' }}">{{__('Secretarial Jobs')}}</a>
        <a href="{{route('member_view.jps', ['category' => 'HR Jobs'])}}" class="{{$category == 'HR Jobs' ? 'active' : '' }}">{{__('HR Jobs')}}</a>
        <a href="{{route('member_view.jps', ['category' => 'Other Jobs'])}}" class="{{$category == 'Other Jobs' ? 'active' : '' }}">{{__('Other Jobs')}}</a>
    </div>
      <div class="job-table">
        <div class="job_data">
          @forelse ($job_placements as $jp)
            <div class="single-job">
              <div class="left-col">
                  <div class="details-col">
                  <h2>{{$jp->title}}</h2>
                  <h3>{{$jp->company_name}}</h3>
                  <span><i class="fa-solid fa-briefcase"></i>{{$jp->job_type}}</span>
                  <span><i class="fa-solid fa-location-dot"></i>{{ html_entity_decode_table($jp->job_location) }}</span>

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
          @empty
            <h3 class="text-danger mx-auto text-center my-5">Job Not Found</h3>
          @endforelse
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
          let category = $('.search_input').data('category');
          if (search_value !== null && search_value !== "") {
              let _url = ("{{ route('job.search', ['search_value','category']) }}");
              let __url = _url.replace('search_value', search_value);
              let ___url = __url.replace('category', category);
              $.ajax({
                  url: ___url,
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
                                          <h3 class="text-danger mx-auto text-center my-5">Job Not Found</h3>
                                      `;
                      } else{

                          data.jobs.forEach(function(job) {
                            
                            var salary='';
                            const parsedSalary = JSON.parse(job.salary);
                            if(parsedSalary !==null){
                              if((JSON.parse(job.salary).to) != null && (JSON.parse(job.salary).from) != null && (JSON.parse(job.salary).to) != '' && (JSON.parse(job.salary).from) != ''){
                                salary = 'TK. <span>'+(JSON.parse(job.salary).to)+' - '+(JSON.parse(job.salary).from)+'</span> / ';
                              }
                            }
                            
                            console.log(salary)
                            let details_url = ("{{ route('member_view.job_details',['jid']) }}");
                            let details_url_ = details_url.replace('jid', job.jid);
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
                var salary='';
                const parsedSalary = JSON.parse(job.salary);
                if(parsedSalary !==null){
                  if((JSON.parse(job.salary).to) != null && (JSON.parse(job.salary).from) != null && (JSON.parse(job.salary).to) != '' && (JSON.parse(job.salary).from) != ''){
                    salary = 'TK. <span>'+(JSON.parse(job.salary).to)+' - '+(JSON.parse(job.salary).from)+'</span> / ';
                  }
                }
                  console.log(salary)
                  let details_url = ("{{ route('member_view.job_details',['jid']) }}");
                  let details_url_ = details_url.replace('jid', job.jid);
                  job_placement += `
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
              $('.job_data').html(job_placement);
          }
      });
  });

</script>
@endpush
