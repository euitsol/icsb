@extends('frontend.master')

@section('title', 'Organogram')

@section('content')
<!-- =============================== Breadcrumb Section ======================================-->
@php
$banner_image = asset('breadcumb_img/employees.jpg');
$title = "Organogram";
$datas = [
            'image'=>$banner_image,
            'title'=>$title,
            'paths'=>[
                        'home'=>'Home',
                        'javascript:void(0)'=>'Employees',
                    ]
        ];
@endphp
@include('frontend.includes.breadcrumb',['datas'=>$datas])
<!-- =============================== Breadcrumb Section ======================================-->
    <section class="organogram-section big-sec-min-height">
        <div class="container">
            <div class="chart-main">
                <div class="level-1">
                    @foreach ($councils as $key=>$council)
                        @if($key == count($councils)-1)
                            <a href="{{route('council_view.council.members',$council->slug)}}">
                                <div class="box box-0">
                                    <h2>{{_('Council')}}</h2>
                                </div>
                            </a>
                        @endif
                    @endforeach

                </div>
                <div class="level-1">
                    <a href="{{route('employee_view.sec_and_ceo')}}">
                        <div class="box box-1">
                            <h2>{{_("Secretary")}} <br> {{_("& CEO")}}</h2>
                        </div>
                    </a>
                </div>
                <div class="level-2">
                    <div class="box box-2 d-flex align-items-center justify-content-center"><h3>{{_('HR & Admin Department')}}</h3></div>
                    <div class="box box-3 d-flex align-items-center justify-content-center"><h3>{{_('Education Department')}}</h3></div>
                    <div class="box box-4 d-flex align-items-center justify-content-center"><h3>{{_('Accounts & Finance Department')}}</h3></div>
                    <div class="box box-5 d-flex align-items-center justify-content-center"><h3>{{_('Library')}}</h3></div>
                </div>
                <div class="level-3">
                    <div class="box box-6 d-flex align-items-center justify-content-center"><h3>{{_('Professional Training Department')}}</h3></div>
                    <div class="box box-7 d-flex align-items-center justify-content-center"><h3>{{_('Exam Department')}}</h3></div>
                    <div class="box box-8 d-flex align-items-center justify-content-center"><h3>{{_('Publication Research & Development')}}</h3></div>
                    <div class="box box-9 d-flex align-items-center justify-content-center"><h3>{{_('Membership, Registation & Management Department')}}</h3></div>
                </div>
            </div>
        </div>
    </section>
@endsection
