@extends('frontend.master')

@section('title', 'Job Placement')

@section('content')
<!----============================= Breadcrumbs Section ========================---->
<section class="breadcrumbs-section">
    <div class="overly-image">
      <img src="{{asset('frontend/img/breadcumb/Board-Meeting.jpg')}}" alt="Board of Directors Meeting" />
    </div>
    <div class="container">
      <div class="breadcrumbs-row flex">
        <div class="left-column content-column">
          <div class="inner-column color-white">
            <h1 class="breadcrumbs-heading">{{_('Job Placement')}}</h1>
            <ul class="flex">
              <li><a href="index">{{_('Home')}}</a></li>
              <li><i class="fa-solid fa-angle-right"></i></li>
              <li><a href="#">{{_('Members')}}</a></li>
              <li><i class="fa-solid fa-angle-right"></i></li>
              <li><p>{{_('Job Placement')}}</p></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!----============================= Job Placement Section ========================---->

  <div class="job-placement-section">
    <div class="container">
      <div class="title">
        <h1>{{_('Job Placement')}}</h1>
      </div>
      <div class="job-table">
        <div class="table-serch">
          <p>Showing results <span> 10</span> in <span>{{count($job_placements)}}</span> jobs list</p>
          <p class="sort">
            <label for="cars">Sort By</label>
            <select id="">
              <option value="">Default</option>
              <option value="">Item 1</option>
              <option value="">Item 2</option>
              <option value="" selected>Item 3</option>
            </select>
          </p>
        </div>
        @foreach ($job_placements as $jp)
            <div class="single-job">
            <div class="left-col">
                <div class="details-col">
                <h2>{{$jp->title}}</h2>
                <h3>{{$jp->company_name}}</h3>
                <span class="day"><i class="fa-solid fa-clock"></i>
                    @if(($today->diff(date('Y-m-d', strtotime($jp->deadline))))->days == 0 )
                        {{_('Today')}}
                    @elseif(($today->diff(date('Y-m-d', strtotime($jp->deadline))))->days == 1 )
                        {{($today->diff(date('Y-m-d', strtotime($jp->deadline))))->days}}{{_(' day ago')}}
                    @else
                        {{($today->diff(date('Y-m-d', strtotime($jp->deadline))))->days}}{{_(' days ago')}}
                    @endif
                </span>
                <span><i class="fa-solid fa-briefcase"></i>{{$jp->job_type}}</span>

                </div>
            </div>
            <div class="right-col">
                <ul>
                <li><strong>Salary:</strong> TK. <span>{{json_decode($jp->salary)->from}}-{{json_decode($jp->salary)->to}}</span> / {{$jp->salary_type}}</li>
                <li><strong>Deadline: </strong><span>{{ date('d M, Y', strtotime($jp->deadline))}} ({{ date('H:i A', strtotime($jp->deadline))}})</span></li>
                </ul>

                <div class="btn">
                <a href="{{$jp->company_url}}">Apply Now</a>
                </div>
            </div>
            </div>
        @endforeach
      </div>
    </div>
  </div>
@endsection
