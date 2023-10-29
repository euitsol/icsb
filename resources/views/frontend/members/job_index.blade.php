@extends('frontend.master')

@section('title', 'Job Placement')

@section('content')
  <!-- =============================== Breadcrumb Section ======================================-->
{{-- @php
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
@include('frontend.includes.breadcrumb',['datas'=>$datas]) --}}
<!-- =============================== Breadcrumb Section ======================================-->


  <!----============================= Job Index Section ========================---->

  <div class="job-index-section big-sec-height">
        <div class="container">
            <div class="wrap">
            <div class="row justify-content-center align-items-center">
                    <div class="col-md-12">
                        <h2 class="page_title">{{__('JOB PORTAL')}}</h2>
                    </div>
                    <div class="col-md-6">
                        <div class="employee">
                            <a href="{{route('member_view.jps')}}" class="rounded py-4 btn w-100">{{_("I'm Employee")}}</a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        {{-- <h1><a href="{{route('member_view.job_edit',[1,'-1'])}}">edit</a></h1> --}}
                        <div class="employeer">
                            <a href="{{route('member_view.job_create')}}" class="rounded py-4 btn w-100">{{_("I'm Employer")}}</a>
                        </div>
                    </div>
                </div>
                </div>
        </div>
  </div>
@endsection
