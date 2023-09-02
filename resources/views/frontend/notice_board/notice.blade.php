@extends('frontend.master')

@section('title', 'Notice Board')

@section('content')
<!-- =============================== Breadcrumb Section ======================================-->
@php
$banner_image = asset('breadcumb_img/members.jpg');
$title = 'CS Firms';
$datas = [
            'image'=>$banner_image,
            'title'=>$title,
            'paths'=>[
                        'home'=>'Home',
                        'javascript:void(0)'=>'Notice Board',
                    ]
        ];
@endphp
@include('frontend.includes.breadcrumb',['datas'=>$datas])
<!-- =============================== Breadcrumb Section ======================================-->
<section class="notice-board-section section-padding">
    <div class="container">
        <div class="heading-content text-align">
            <h1 class="common-heading">Notice Board</h1>
        </div>
        <div class="notice-board-content">
            <table>
                <thead>
                    <th>Serial No</th>
                    <th>Title</th>
                    <th>Release date</th>
                    <th>Download</th>
                </thead>
                <tbody>
                    <tr>
                        <td>01</td>
                        <td><a href="">Admission Test Result (January-June 2023)</a></td>
                        <td>Jan 1, 2023</td>
                        <td><a href=""><img src="{{asset('frontend/img/pdf/pdf-icon.svg')}}"></a></td>
                    </tr>
                    <tr>
                        <td>02</td>
                        <td><a href="">Mohammad Asad Ullah FCS Elected as President of ICSB for the Fifth Term 2022-25</a></td>
                        <td>Oct 12, 2022</td>
                        <td><a href=""><img src="{{asset('frontend/img/pdf/pdf-icon.svg')}}"></a></td>
                    </tr>
                    <tr>
                        <td>03</td>
                        <td><a href="">Notification Regarding Change of the Election Venue</a></td>
                        <td>Sep 30, 2022</td>
                        <td><a href=""><img src="{{asset('frontend/img/pdf/pdf-icon.svg')}}"></a></td>
                    </tr>
                    <tr>
                        <td>04</td>
                        <td><a href="">Admission Notice January-June 2023 Session</a></td>
                        <td>Nov 22, 2022</td>
                        <td><a href=""><img src="{{asset('frontend/img/pdf/pdf-icon.svg')}}"></a></td>
                    </tr>
                    <tr>
                        <td>05</td>
                        <td><a href="">Admission Test Result (January-June 2023)</a></td>
                        <td>Jan 1, 2023</td>
                        <td><a href=""><img src="{{asset('frontend/img/pdf/pdf-icon.svg')}}"></a></td>
                    </tr>
                    <tr>
                        <td>06</td>
                        <td><a href="">Mohammad Asad Ullah FCS Elected as President of ICSB for the Fifth Term 2022-25</a></td>
                        <td>Jan 1, 2023</td>
                        <td><a href=""><img src="{{asset('frontend/img/pdf/pdf-icon.svg')}}"></a></td>
                    </tr>
                    <tr>
                        <td>07</td>
                        <td><a href="">Admission Test Result (January-June 2023)</a></td>
                        <td>Jan 1, 2023</td>
                        <td><a href=""><img src="{{asset('frontend/img/pdf/pdf-icon.svg')}}"></a></td>
                    </tr>
                    <tr>
                        <td>08</td>
                        <td><a href="">Admission Test Result (January-June 2023)</a></td>
                        <td>Jan 1, 2023</td>
                        <td><a href=""><img src="{{asset('frontend/img/pdf/pdf-icon.svg')}}"></a></td>
                    </tr>
                    <tr>
                        <td>09</td>
                        <td><a href="">Mohammad Asad Ullah FCS Elected as President of ICSB for the Fifth Term 2022-25</a></td>
                        <td>Jan 1, 2023</td>
                        <td><a href=""><img src="{{asset('frontend/img/pdf/pdf-icon.svg')}}"></a></td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <td><a href="">Admission Test Result (January-June 2023)</a></td>
                        <td>Jan 1, 2023</td>
                        <td><a href=""><img src="{{asset('frontend/img/pdf/pdf-icon.svg')}}"></a></td>
                    </tr>
                </tbody>
                <div class="table-pagination">
                    <ul class="pagination">
                      <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                      <li class="page-item"><a class="page-link active" href="#">1</a></li>
                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item"><a class="page-link" href="#">4</a></li>
                      <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </div>
            </table>
        </div>
    </div>
</section>
@endsection
