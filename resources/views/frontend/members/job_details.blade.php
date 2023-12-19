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

{{-- <section class="job_details_section py-5">
    <div class="container">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <div class="col-md-7">
                        <h1 class="job_title">Company Secretary</h1>
                        <h4 class="company_name">Homeland Life Insurance Co. Ltd.</h4>
                        <div class="vacancy">
                            <h5>Vacancy</h5>
                            <ul>1</ul>
                        </div>
                        <div class="job_des">
                            <h5>Job Context</h5>
                            <ul>
                                Homeland life insurance Company Limited, One of the leading Life Insurance Companies in Bangladesh is looking for dynamic, Result oriented, Committed Self-driven Professional. The appointment will be made by the Company subject to approval of Insurance Development & Regulatory Authority.
                            </ul>
                        </div>
                        <div class="job_res">
                            <h5>Job Responsibilities</h5>
                            <ul>
                                Company Secretary
                            </ul>
                        </div>
                        <div class="job_type">
                            <h5>Employment Status</h5>
                            <ul>
                                Full-Time
                            </ul>
                        </div>
                        <div class="ed_req">
                            <h5>Educational Requirements</h5>
                            <ul>
                                Masters degree in any discipline
                            </ul>
                        </div>
                        <div class="ex_req">
                            <h5>Experience Requirements</h5>
                            <ul>
                                At least 5 year(s)
                            </ul>
                        </div>
                        <div class="addi_req">
                            <h5>Additional Requirements</h5>
                            <ul>
                                Age at least 40 years
                                Only males are allowed to apply
                                Practical experience as company secretary in any financial institution.
                            </ul>
                        </div>
                        <div class="job_location">
                            <h5>Job Location</h5>
                            <ul>
                                Dhaka
                            </ul>
                        </div>
                        <div class="salary">
                            <h5>Salary</h5>
                            <ul>
                                Negotiable
                            </ul>
                        </div>
                        <div class="other_benefits">
                            <h5>Compensation & Other Benefits</h5>
                            <ul>
                                Negotiable
                            </ul>
                        </div>
                        <div class="jp_source">
                            <h5>Job Source</h5>
                            <ul>
                                Negotiable
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-5"></div>
                     
                </div>
            </div>
        </div>
    </div>
</section> --}}


@endsection
