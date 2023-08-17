@extends('frontend.master')

@section('title', 'Job Placement')

@section('content')
  <!-- =============================== Breadcrumb Section ======================================-->
@php
$banner_image = asset('breadcumb_img/members.jpg');
$title = 'Job Placement';
$datas = [
            'image'=>$banner_image,
            'title'=>$title,
            'paths'=>[
                        'home'=>'Home',
                        'javascript:void(0)'=>'Members',
                    ]
        ];
@endphp
@include('frontend.includes.breadcrumb',['datas'=>$datas])
<!-- =============================== Breadcrumb Section ======================================-->


  <!----============================= Job Placement Section ========================---->

  <div class="job-placement-section big-sec-min-height">
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
