@extends('frontend.master')

@section('title', 'Exam Schedule')

@section('content')
<!----============================= Breadcrumbs Section ========================---->
<section class="breadcrumbs-section">
    <div class="overly-image">
        <img src="{{asset('frontend/img/breadcumb/objectives-background.jpg')}}" alt="">
    </div>
    <div class="container">
        <div class="breadcrumbs-row flex">
        <div class="left-column content-column">
            <div class="inner-column color-white">
                <h1 class="breadcrumbs-heading">Exam Schedule</h1>
                <ul class="flex">
                    <li><a href="index">Home</a></li>
                    <li><i class="fa-solid fa-angle-right"></i></li>
                    <li><a href="#">Examination</a></li>
                    <li><i class="fa-solid fa-angle-right"></i></li>
                    <li><p>Exam Schedule</p></li>
                </ul>
            </div>
        </div>
    </div>
    </div>
</section>
<!--============================= Exam Schedul Section ==================-->
<section class="handbook-section exam-section section-padding">
    <div class="container">
        <div class="handbook-column flex">
            <div class="new-handbook content-column exam-content-column">
                <div class="heading-content">
                    <h2 class="common-heading">Exam Schedule</h2>
                </div>
                <h3>Examination Timetable:</h3>
                <p>The examination timetable will be notified by the Council in the newspaper and in the notice board of the Institute.</p>
                <h3>Examination Rules:</h3>
                <p>In order to be eligible to appear at the examination students are required to comply with such conditions relating to examination as may be laid down by the council from time to time. To be specie, a student shall comply with the following regulations:</p>
                <p>a) Students enrolled in a particular session must attend at least 75% classes. Students failing to pass in a particular examination may reappear in any subsequent examination until he successfully passes the examination.</p>
                <p>b) Students enrolled under correspondence course and completed 100% assignments to the satisfaction of the Council are eligible to appear at the examination.</p>
            </div>
            <div class="old-handbook text-align">
                <img src="{{asset('frontend/img/student/exam-schedule.png')}}" alt="Exam Schedule">
            </div>
        </div>
    </div>
</section>
@endsection
