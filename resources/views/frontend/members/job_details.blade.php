@extends('frontend.master')

@section('title', 'Job Details')
@push('css')
    <style>
        /* .job-detailes-section .job-detail-item ul li{
                            width: auto;
                        } */
        .job_title {
            font-size: 30px;
            margin: 0;
        }

        .company_name {
            font-size: 22px;
            margin-bottom: 30px;
            color: #5d5d5d;
        }

        .job_details h5 {
            font-size: 20px;
            text-transform: capitalize;
            color: #5d5d5d;
        }

        .apply_border {
            width: 160px;
            height: 2px;
            background: #cccccc;
            margin: -10px auto 10px auto;
        }

        .rba h2 {
            color: #5c5c5c;
            font-size: 30px;
        }

        .appprocedure {
            font-size: 20px;
            color: #5c5c5c;
            margin: 0;
            padding: 0;
            text-transform: capitalize;
        }

        .gra-padded {
            padding-top: 10px;
            padding-bottom: 10px;
            margin-bottom: 15px;
        }

        .gra-bordered {
            position: relative;
        }

        .gra-bordered::before {
            content: "";
            display: block;
            width: 80%;
            position: absolute;
            bottom: 0px;
            left: 40%;
            margin-left: -30%;
            height: 1px;
            background: radial-gradient(at center center, rgba(0, 0, 0, 0.2) 0px, rgba(255, 255, 255, 0) 75%);
        }

        .email_title {
            text-transform: capitalize;
            font-size: 25px;
            color: #5c5c5c;
        }

        .job_summary p {
            color: #5d5d5d;
            margin-bottom: 15px;
        }

        .job_summary .title {
            background-color: #37474f;
            color: #fff;
            font-size: 16px;
            padding: 15px 15px;
            border: none;
            font-weight: bold;
        }

        .job_summary .card-footer a i:hover {
            color: #fff;
            background: #122F98;
        }

        .job_summary .card-footer a i {
            color: #122F98;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #DCDCDC;
            transition: 0.4s;
            margin-right: 20px
        }
    </style>
@endpush

@section('content')
    <!-- =============================== Breadcrumb Section ======================================-->
    @php
        $banner_image = asset('breadcumb_img/members.jpg');
        $title = $job->title;
        $datas = [
            'image' => $banner_image,
            'title' => $title,
            'paths' => [
                'home' => 'Home',
                'javascript:void(0)' => 'Members',
                'member_view.job_index' => 'Job Placement',
                'member_view.jps' => 'Availeable Jobs',
            ],
        ];
    @endphp
    @include('frontend.includes.breadcrumb', ['datas' => $datas])
    <!-- =============================== Breadcrumb Section ======================================-->

    {{-- <section class="job-detailes-section ">
        <div class="container">
            <div class="job-row flex">
                <div class="job-detail-item flex">
                    <div class="content-col">
                        <h3>{{ $job->title }}</h3>
                        <p>{{ $job->company_name }}</p>
                    </div>
                </div>
                <div class="job-detail-item">
                    <ul>
                        <li><i class="fa-solid fa-users"></i><span>Vacancy: </span>{{ $job->vacancy . ' Person' }}</li>
                        <li><i class="fa-solid fa-calendar"></i><span>Deadline:
                            </span>{{ date('d-M-Y'), strtotime($job->deadline) }}</li>
                    </ul>
                </div>
                <div class="job-detail-item">
                    <ul>
                        <li><i class="fa-solid fa-briefcase"></i><span>Job Type: </span>{{ $job->job_type }}</li>
                        <li><i class="fa-solid fa-comment-dollar"></i><span>Salary: </span>
                            @if (isset(json_decode($job->salary)->from) & isset(json_decode($job->salary)->to))
                                
                                <span>{{ json_decode($job->salary)->from . ' - ' . json_decode($job->salary)->to }}</span> TK./
                            @endif
                            {{ $job->salary_type }}
                        </li>
                    </ul>
                </div>
                <div class="job-detail-item last-item">
                    <ul class="flex">
                        <li><a href="{{ $job->application_url ? $job->application_url : 'mailto:' . $job->email }}"
                                target="_blank" class="apply-button">Apply Position</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section> --}}

    {{-- <section class="jobsingle-content-section">
        <div class="container">
            <div class="content-row flex">
                <div class="content-column">
                    <p class="mb-1"><span>Job Responsibility:</span></p>
                    {!! $job->job_responsibility !!}
                    @if (!empty($job->special_instractions))
                        <p class="mb-1"><span>Special Instractions:</span></p>
                        {!! $job->special_instractions !!}
                    @endif
                    @if (!empty($job->professional_requirement))
                        <p class="mb-1"><span>Professional Requirement:</span></p>
                        {!! $job->professional_requirement !!}
                    @endif
                    @if (!empty($job->special_instractions))
                        <p class="mb-1"><span>Special Instractions:</span></p>
                        {!! $job->special_instractions !!}
                    @endif
                    @if (!empty($job->additional_requirement))
                        <p class="mb-1"><span>Additional Aequirement:</span></p>
                        {!! $job->additional_requirement !!}
                    @endif
                    @if (!empty($job->other_benefits))
                        <p class="mb-1"><span>Other Benefits:</span></p>
                        {!! $job->other_benefits !!}
                    @endif
                </div>
                <div class="summary-column">
                    <div class="job-summery">
                        <h4>Job Summary:</h4>
                        <ul>
                            <li><span>Job Posted: </span> {{ \Carbon\Carbon::parse($job->created_at)->diffForhumans() }}
                            </li>
                            <li><span>Expiration: </span> {{ date('d-M-Y'), strtotime($job->deadline) }}</li>
                            <li><span>Vacancy: </span> {{ $job->vacancy }} Person.</li>
                            <li><span>Experiences: </span>
                                {{ $job->experience_requirement ? $job->experience_requirement . ' Years' : '...' }}</li>
                            <li><span>Preferable Age: </span>
                                {{ $job->age_requirement ? $job->age_requirement . ' Years' : '...' }}</li>
                            <li><span>Education: </span>
                                {{ $job->educational_requirement ? $job->educational_requirement : '...' }}</li>
                            <li><span>Website: </span> <a
                                    href="{{ $job->company_url ? $job->company_url : 'javascript:void(0)' }}"
                                    @if ($job->company_url) class="text-secondary" target="_blank" @endif>{{ $job->company_url ? removeHttpProtocol($job->company_url) : '...' }}</a>
                            </li>
                        </ul>
                    </div>

                    <div class="email-column text-align">
                        <h3><a href="mailto:{{ $job->email }}"><i class="fa-solid fa-envelope-open-text"></i>Email
                                Now</a></h3>
                    </div>
                    <h3><i class="fa-solid fa-location-dot"></i> Comapy Location: </h3>
                    <span>{{ html_entity_decode_table($job->company_address) }}</span>
                    <h3><i class="fa-solid fa-location-dot"></i> Job Location: </h3>
                    <span>{{ html_entity_decode_table($job->job_location) }}</span>
                </div>
            </div>
        </div>
    </section> --}}
    <section class="job_details_section py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-7">
                                    <h1 class="job_title">{{ $job->title }}</h1>
                                    <h4 class="company_name">{{ $job->company_name }}</h4>
                                    <div class="job_details">
                                        <div class="vacancy">
                                            <h5>{{__('Number of Vacancy')}}</h5>
                                            <ul>{{ $job->vacancy . ' Person' }}</ul>
                                        </div>
                                        <div class="job_type">
                                            <h5>{{__('Nature of Job')}}</h5>
                                            <ul>
                                                {{ $job->job_type }}
                                            </ul>
                                        </div>
                                        <div class="job_res">
                                            <h5>{{__('Job Responsibility')}}</h5>
                                            <ul>
                                                {!! $job->job_responsibility !!}
                                            </ul>
                                        </div>
                                        @if (!empty($job->educational_requirement))
                                            <div class="ed_req">
                                                <h5>{{__('Educational Requirements')}}</h5>
                                                <ul>
                                                    {{$job->educational_requirement}}
                                                </ul>
                                            </div>
                                        @endif
                                        @if (!empty($job->professional_requirement))
                                            <div class="pro_req">
                                                <h5>{{__('Professional Requirements')}}</h5>
                                                <ul>
                                                    {!! $job->professional_requirement !!}
                                                </ul>
                                            </div>
                                        @endif
                                        @if (!empty($job->experience_requirement))
                                            <div class="ex_req">
                                                <h5>{{__('Experience Requirements')}}</h5>
                                                <ul>
                                                    {{$job->experience_requirement . ' Years'}}
                                                </ul>
                                            </div>
                                        @endif
                                        @if (!empty($job->age_requirement))
                                            <div class="age_req">
                                                <h5>{{__('Age Requirements')}}</h5>
                                                <ul>
                                                    {{$job->age_requirement . ' Years'}}
                                                </ul>
                                            </div>
                                        @endif
                                        @if (!empty($job->additional_requirement))
                                            <div class="addi_req">
                                                <h5>{{__('Additional Requirements')}}</h5>
                                                <ul>
                                                    {!! $job->additional_requirement !!}
                                                </ul>
                                            </div>
                                        @endif
                                        <div class="job_location">
                                            <h5>{{__('Job Location')}}</h5>
                                            <ul>
                                                {{ html_entity_decode_table($job->job_location) }}
                                            </ul>
                                        </div>
                                        <div class="salary">
                                            <h5>{{__('Salary')}}</h5>
                                            <ul>
                                                @if (isset(json_decode($job->salary)->from) & isset(json_decode($job->salary)->to))
                                                    <span>{{ json_decode($job->salary)->from . ' - ' . json_decode($job->salary)->to }}</span> TK./
                                                @endif
                                                {{ $job->salary_type }}
                                            </ul>
                                        </div>
                                        @if (!empty($job->other_benefits))
                                            <div class="benefits">
                                                <h5>{{__('Other Benefits')}}</h5>
                                                <ul>
                                                    {!! $job->other_benefits !!}
                                                </ul>
                                            </div>
                                        @endif
                                        @if (!empty($job->special_instractions))
                                            <div class="sp_inst">
                                                <h5>{{__('Special Instructions')}}</h5>
                                                <ul>
                                                    {!! $job->special_instractions !!}
                                                </ul>
                                            </div>
                                        @endif
                                        <div class="com_add">
                                            <h5>{{__('Company Address')}}</h5>
                                            <ul>
                                                {{ html_entity_decode_table($job->company_address) }}
                                            </ul>
                                        </div>
                                        {{-- 

                                        <div class="jp_source">
                                            <h5>Job Source</h5>
                                            <ul>
                                                Negotiable
                                            </ul>
                                        </div>
                                        
                                        <div class="com_web">
                                            <h5>Company Website</h5>
                                            <ul>
                                                Dhaka
                                            </ul>
                                        </div> --}}
                                    </div>
                                </div>
                                <div class="col-md-5 job_summary">
                                    <div class="card">
                                        <div class="card-header title">
                                            <span><strong>{{__('Job Summary')}}</strong></span>
                                        </div>
                                        <div class="card-body">
                                            {{-- <p><strong>Publish on:</strong> 6 Dec 2023</p> --}}
                                            <p><strong>{{__('Position Name:')}}</strong> {{ $job->title }}</p>
                                            <p><strong>{{__('Number of Vacancy:')}}</strong> {{ $job->vacancy . ' Person' }}</p>
                                            <p><strong>{{__('Experience Requirements:')}}</strong> {{ $job->experience_requirement ? $job->experience_requirement . ' Years' : '...' }}</p>
                                            <p><strong>{{__('Professional Requirements:')}}</strong> {{ $job->professional_requirement ? $job->professional_requirement : '...' }}</p>
                                            <p><strong>{{__('Age Requirements:')}}</strong> {{ $job->age_requirement ? $job->age_requirement . ' Years' : '...' }}</p>
                                            {{-- <p><strong>Job Type:</strong> Full Time</p> --}}
                                            <p><strong>{{__('Salary:')}}</strong> 
                                                @if (isset(json_decode($job->salary)->from) & isset(json_decode($job->salary)->to))
                                                    <span>{{ json_decode($job->salary)->from . ' - ' . json_decode($job->salary)->to }}</span> TK./
                                                @endif
                                                {{ $job->salary_type }}
                                            </p>
                                            <p><strong>{{__('Application Deadline:')}}</strong> {{ date('d M Y', strtotime($job->deadline)) }}</p>
                                        </div>
                                        <div class="card-footer">
                                            @php
                                                $facebookLinks = Share::currentPage()
                                                    ->facebook()
                                                    ->linkedin('Title')
                                                    ->twitter()
                                                    ->whatsapp()
                                                    ->telegram()
                                                    ->getRawLinks();
                                                if (!is_array($facebookLinks)) {
                                                    $facebookLinks = [$facebookLinks];
                                                }
                                                $count = 0;
                                            @endphp
                                            <span style="color: #5c5c5c" class="me-4"><strong>{{__('Share with:')}}</strong></span>
                                            @foreach ($facebookLinks as $facebookLink)
                                                <a href="{{ $facebookLink }}" target="_blank">
                                                    @if ($count == 0)
                                                        <i class="fa-brands fa-facebook-f"></i>
                                                    @elseif ($count == 1)
                                                        <i class="fa-brands fa-linkedin-in"></i>
                                                    @elseif ($count == 2)
                                                        <i class="fa-brands fa-square-x-twitter"></i>
                                                    @elseif ($count == 3)
                                                        <i class="fa-brands fa-whatsapp"></i>
                                                    @elseif ($count == 4)
                                                        <i class="fa-brands fa-telegram"></i>
                                                    @endif
                                                </a>
                                                @php
                                                    $count++;
                                                @endphp
                                            @endforeach
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <div class="guide text-center">
                                        <div class="rba">
                                            <h2 style="text-transform: capitalize">
                                                {{__('Read Before Apply')}}
                                            </h2>
                                            <div class="apply_border"></div>


                                            <div>
                                                <div class="instructions mx-auto" style="width: 60%">Interested ICSB Members
                                                    who meet the requirements are encouraged to send their updated CV in PDF
                                                    format mentioning the post title along with applications to the
                                                    following address.</div>
                                            </div>

                                        </div>

                                        <br>
                                        <div>
                                            <h2 class="appprocedure" style="margin-bottom: 15px;">
                                                {{__('Apply Procedures')}}
                                            </h2>
                                        </div>


                                        <div class="text-center">
                                            <a class="btn btn-success" href="{{ $job->application_url ? $job->application_url : 'mailto:'.$job->email }}" target="_blank">{{__('Apply Now')}}</a>
                                        </div>
                                        <div class="gra-padded gra-bordered"></div>
                                        <h3 class="email_title">{{__('Email')}}</h3>
                                        <div class="text-center">
                                            Send your CV to <strong> {{$job->email}} </strong>
                                        </div>
                                        <div>
                                            <span class="date">
                                                {{__('Application Deadline :')}} <strong>{{ date('d-M-Y', strtotime($job->deadline)) }}</strong>
                                            </span>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
