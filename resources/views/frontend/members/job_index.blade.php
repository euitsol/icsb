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

  <div class="job-index-section small-sec-height d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="employee">
                        <a href="{{route('member_view.jps')}}" class="rounded p-5 btn btn-outline-info w-100">{{_("I'm Employee")}}</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="employeer">
                        <a href="{{route('member_view.job_create')}}" class="rounded p-5 btn btn-outline-primary w-100">{{_("I'm Employer")}}</a>
                    </div>
                </div>
            </div>
        </div>
  </div>
@endsection
