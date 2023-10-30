@extends('frontend.master')

@section('title', 'Jobs')

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
        <h1>{{_('Job Placement')}}</h1>
      </div>
      <div class="job-table">
        @foreach ($job_placements as $jp)
            <div class="single-job">
            <div class="left-col">
                <div class="details-col">
                <h2>{{$jp->title}}</h2>
                <h3>{{$jp->company_name}}</h3>
                <span class="day"><i class="fa-solid fa-clock"></i>
                    {{\Carbon\Carbon::parse($jp->created_at)->diffForhumans()}}
                </span>
                <span><i class="fa-solid fa-briefcase"></i>{{$jp->job_type}}</span>

                </div>
            </div>
            <div class="middle-col d-flex align-items-center">
                <ul class="m-0">
                @if(isset(json_decode($jp->salary)->from) & isset(json_decode($jp->salary)->to))
                <li><strong>Salary:</strong> TK. <span>{{ (json_decode($jp->salary)->from .' - '. json_decode($jp->salary)->to)}}</span> / {{$jp->salary_type}}</li>
                @endif
                <li><strong>Deadline: </strong><span>{{ date('d M, Y', strtotime($jp->deadline))}} {{_('12:00 PM')}}</span></li>
                </ul>
            </div>
            <div class="right-col ">
                <div class="btn">
                <a href="{{$jp->company_url}}">View Details</a>
                </div>
            </div>
            </div>
        @endforeach
      </div>
    </div>
  </div>
@endsection
