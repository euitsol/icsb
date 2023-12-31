@extends('frontend.master')

@section('title', 'Job Details')
@push("css")
<style>
    .job-detailes-section .job-detail-item ul li{
        width: auto;
    }
</style>

@endpush

@section('content')
  <!-- =============================== Breadcrumb Section ======================================-->
@php
$banner_image = asset('breadcumb_img/members.jpg');
$title = $job->title;
$datas = [
            'image'=>$banner_image,
            'title'=>$title,
            'paths'=>[
                        'home'=>'Home',
                        'javascript:void(0)'=>'Members',
                        'member_view.job_index'=>'Job Placement',
                        'member_view.jps'=>'Availeable Jobs',
                    ]
        ];
@endphp
@include('frontend.includes.breadcrumb',['datas'=>$datas])
<!-- =============================== Breadcrumb Section ======================================-->

<section class="job-detailes-section ">
    <div class="container">
        <div class="job-row flex">
            <div class="job-detail-item flex">
                <div class="content-col">
                    <h3>{{$job->title}}</h3>
                    <p>{{$job->company_name}}</p>
                </div>
            </div>
            <div class="job-detail-item">
                <ul>
                    <li><i class="fa-solid fa-users"></i><span>Vacancy: </span>{{$job->vacancy." Person" }}</li>
                    <li><i class="fa-solid fa-calendar"></i><span>Deadline: </span>{{date('d-M-Y'), strtotime($job->deadline)}}</li>
                </ul>
            </div>
            <div class="job-detail-item">
                <ul>
                    <li><i class="fa-solid fa-briefcase"></i><span>Job Type: </span>{{$job->job_type}}</li>
                    <li><i class="fa-solid fa-comment-dollar"></i><span>Salary: </span> @if(isset(json_decode($job->salary)->from) & isset(json_decode($job->salary)->to))
                        TK. <span>{{ (json_decode($job->salary)->from .' - '. json_decode($job->salary)->to)}}</span> /
                       @endif
                       {{$job->salary_type}}</li>
                </ul>
            </div>
            <div class="job-detail-item last-item">
                <ul class="flex">
                    <li><a href="{{ $job->application_url ? $job->application_url :  'mailto:'.$job->email}}" target="_blank" class="apply-button">Apply Position</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="jobsingle-content-section">
    <div class="container">
        <div class="content-row flex">
            <div class="content-column">
                <p class="mb-1"><span>Job Responsibility:</span></p>
                {!! $job->job_responsibility !!}
                @if(!empty($job->special_instractions))
                    <p class="mb-1"><span>Special Instractions:</span></p>
                    {!! $job->special_instractions !!}
                @endif
                @if(!empty($job->professional_requirement))
                    <p class="mb-1"><span>Professional Requirement:</span></p>
                    {!! $job->professional_requirement !!}
                @endif
                @if(!empty($job->special_instractions))
                    <p class="mb-1"><span>Special Instractions:</span></p>
                    {!! $job->special_instractions !!}
                @endif
                @if(!empty($job->additional_requirement))
                    <p class="mb-1"><span>Additional Aequirement:</span></p>
                    {!! $job->additional_requirement !!}
                @endif
                @if(!empty($job->other_benefits))
                    <p class="mb-1"><span>Other Benefits:</span></p>
                    {!! $job->other_benefits !!}
                @endif
            </div>
            <div class="summary-column">
                <div class="job-summery">
                    <h4>Job Summary:</h4>
                    <ul>
                        <li><span>Job Posted: </span> {{\Carbon\Carbon::parse($job->created_at)->diffForhumans()}}</li>
                        <li><span>Expiration: </span> {{date('d-M-Y'), strtotime($job->deadline)}}</li>
                        <li><span>Vacancy: </span> {{$job->vacancy}} Person.</li>
                        <li><span>Experiences: </span> {{$job->experience_requirement ? ($job->experience_requirement.' Years') : '...'}}</li>
                        <li><span>Preferable Age: </span> {{$job->age_requirement ? ($job->age_requirement.' Years') : '...'}}</li>
                        <li><span>Education: </span> {{$job->educational_requirement ? $job->educational_requirement : '...'}}</li>
                        <li><span>Website: </span> <a href="{{$job->company_url ? $job->company_url : 'javascript:void(0)'}}" @if($job->company_url) class="text-secondary" target="_blank" @endif>{{$job->company_url ? removeHttpProtocol($job->company_url) : '...'}}</a></li>
                    </ul>
                </div>

                    <div class="email-column text-align">
                        <h3><a href="mailto:{{$job->email}}"><i class="fa-solid fa-envelope-open-text"></i>Email Now</a></h3>
                    </div>
                <h3><i class="fa-solid fa-location-dot"></i> Comapy Location: </h3><span>{{html_entity_decode_table($job->company_address) }}</span>
                <h3><i class="fa-solid fa-location-dot"></i> Job Location: </h3><span>{{html_entity_decode_table($job->job_location) }}</span>
            </div>
        </div>
    </div>
</section>


@endsection
