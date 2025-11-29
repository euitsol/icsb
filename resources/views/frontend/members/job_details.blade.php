@extends('frontend.master')

@section('title', 'Job Details')

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
                                            <p>{{ ($job->vacancy == 0) ? "--" : ($job->vacancy . ' Person') }}</p>
                                        </div>
                                        <div class="job_type">
                                            <h5>{{__('Nature of Job')}}</h5>
                                            <p>
                                                {{ $job->job_type }}
                                            </p>
                                        </div>
                                        <div class="job_res">
                                            <h5>{{__('Job Responsibility')}}</h5>
                                            <div class="content-description">
                                                {!! $job->job_responsibility !!}
                                            </div>
                                        </div>
                                        @if (!empty($job->educational_requirement))
                                            <div class="ed_req">
                                                <h5>{{__('Educational Requirements')}}</h5>
                                                <p>
                                                    {{$job->educational_requirement}}
                                                </p>
                                            </div>
                                        @endif
                                        @if (!empty($job->professional_requirement))
                                            <div class="pro_req">
                                                <h5>{{__('Professional Requirements')}}</h5>
                                                <div class="content-description">
                                                    {!! $job->professional_requirement !!}
                                                </div>
                                            </div>
                                        @endif
                                        @if (!empty($job->experience_requirement))
                                            <div class="ex_req">
                                                <h5>{{__('Experience Requirements')}}</h5>
                                                <p>
                                                    {{$job->experience_requirement . ' Years'}}
                                                </p>
                                            </div>
                                        @endif
                                        @if (!empty($job->age_requirement))
                                            <div class="age_req">
                                                <h5>{{__('Age Requirements')}}</h5>
                                                <p>
                                                    {{$job->age_requirement . ' Years'}}
                                                </p>
                                            </div>
                                        @endif
                                        @if (!empty($job->additional_requirement))
                                            <div class="addi_req">
                                                <h5>{{__('Additional Requirements')}}</h5>
                                                <div class="content-description">
                                                    {!! $job->additional_requirement !!}
                                                </div>
                                            </div>
                                        @endif
                                        <div class="job_location">
                                            <h5>{{__('Job Location')}}</h5>
                                            <p>
                                                {{ html_entity_decode_table($job->job_location) }}
                                            </p>
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
                                                <div class="content-description">
                                                    {!! $job->other_benefits !!}
                                                </div>
                                            </div>
                                        @endif
                                        @if (!empty($job->special_instractions))
                                            <div class="sp_inst">
                                                <h5>{{__('Special Instructions')}}</h5>
                                                <div class="content-description">
                                                    {!! $job->special_instractions !!}
                                                </div>
                                            </div>
                                        @endif
                                        <div class="com_add">
                                            <h5>{{__('Company Address')}}</h5>
                                            <p>
                                                {{ html_entity_decode_table($job->company_address) }}
                                            </p>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-5 job_summary">
                                    <div class="card">
                                        <div class="card-header title">
                                            <span><strong>{{__('Job Summary')}}</strong></span>
                                        </div>
                                        <div class="card-body">
                                            <p><strong>{{__('Position Name:')}}</strong> {{ $job->title }}</p>
                                            <p><strong>{{__('Number of Vacancy:')}}</strong> {{ ($job->vacancy == 0) ? "--" : ($job->vacancy . ' Person') }}</p>
                                            <p><strong>{{__('Experience Requirements:')}}</strong> {{ $job->experience_requirement ? $job->experience_requirement . ' Years' : '...' }}</p>
                                            <p><strong>{{__('Professional Requirements:')}}</strong> {{ $job->professional_requirement ? $job->professional_requirement : '...' }}</p>
                                            <p><strong>{{__('Age Requirements:')}}</strong> {{ $job->age_requirement ? $job->age_requirement . ' Years' : '...' }}</p>
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
                                            <span style="color: #5c5c5c" class="me-0 me-md-0 me-lg-2 me-xxl-3 me-sm-3 d-md-block d-xl-inline share"><strong>{{__('Share with:')}}</strong></span>
                                            @foreach ($facebookLinks as $facebookLink)
                                                <a href="{{ $facebookLink }}" target="_blank">
                                                    @if ($count == 0)
                                                        <i class="fa-brands fa-facebook-f me-0 me-md-0 me-lg-2 me-xxl-3 me-sm-4"></i>
                                                    @elseif ($count == 1)
                                                        <i class="fa-brands fa-linkedin-in me-0 me-md-0 me-lg-2 me-xxl-3 me-sm-4"></i>
                                                    @elseif ($count == 2)
                                                        <i class="fa-brands fa-square-x-twitter me-0 me-md-0 me-lg-2 me-xxl-3 me-sm-4"></i>
                                                    @elseif ($count == 3)
                                                        <i class="fa-brands fa-whatsapp me-0 me-md-0 me-lg-2 me-xxl-3 me-sm-4"></i>
                                                    @elseif ($count == 4)
                                                        <i class="fa-brands fa-telegram me-0 me-md-0 me-lg-2 me-xxl-3 me-sm-4"></i>
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
                                                <div class="instructions mx-auto" style="width: 60%">Interested ICSB Candidates who meet the requirements are encouraged to apply<br> using their updated information through following:</div>
                                            </div>

                                        </div>

                                        <br>
                                        <div>
                                            <h2 class="appprocedure" style="margin-bottom: 15px;">
                                                {{__('Apply Procedures')}}
                                            </h2>
                                        </div>


                                        <div class="text-center">
                                            @if(isset($job->application_url) && !empty($job->application_url))
                                                <a class="btn btn-success" href="{{ $job->application_url }}" target="_blank">{{__('Apply Now')}}</a>
                                            @elseif(isset($job->email) && !empty($job->email))
                                                <p class="bg-success p-2 text-white">{{__('Send mail to: ') . $job->email}}</p>
                                            @endif
                                        </div>
                                        <div class="gra-padded gra-bordered"></div>
                                        <div>
                                            <span class="date">
                                                <span style="color:red">{{__('Application Deadline :')}}</span> <strong>{{ date('d-M-Y', strtotime($job->deadline)) }}</strong>
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
