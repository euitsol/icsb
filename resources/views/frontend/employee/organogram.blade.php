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
    <section class="organogram-section big-sec-height">
        <div class="container">
            <div class="chart-main">
            <div class="level-1">
                <div class="box">
                <h2>Secretary & CEO</h2>
                </div>
            </div>
            <div class="level-2">
                <div class="box d-flex align-items-center justify-content-center"><h3>HR & Admin Dept.</h3></div>
                <div class="box d-flex align-items-center justify-content-center"><h3>Education Department</h3></div>
                <div class="box d-flex align-items-center justify-content-center"><h3>Accounts & Finance Department</h3></div>
                <div class="box d-flex align-items-center justify-content-center"><h3>Library</h3></div>
            </div>
            <div class="level-3">
                <div class="box d-flex align-items-center justify-content-center"><h3>Professional Training Department</h3></div>
                <div class="box d-flex align-items-center justify-content-center"><h3>Exam Department</h3></div>
                <div class="box d-flex align-items-center justify-content-center"><h3>Publication Research & Development</h3></div>
                <div class="box d-flex align-items-center justify-content-center"><h3>Membership, Registation & Management Department</h3></div>
            </div>
            </div>
        </div>
    </section>
@endsection
