@extends('frontend.master')

@section('title', 'Home')

@section('content')
{{-- Banner Section --}}
@include('frontend.includes.banner',['contact'=>$contact, 'banner'=>$banner])

 <!-- Start News Ticker Section -->
 <section class="news-ticker-section">
    <div class="full-container">
        <div class="ticker-wrapper">
            <div class="ticker-title">
                <h3>LATEST NEWS</h3>
            </div>
            <div class="ticker-desc">
                <ul class="bxnewsticker">
                    <li><a href="#">বাংলাদেশ ব্যাংক কর্তৃক তালিকাভুক্তির জন্য সিএ ফার্মের আবেদনের সময়সীমা ২৮ ডিসেম্বর ২০২২ ইং পর্যন্ত নির্ধারণ</a></li>
                    <li><a href="#">Notice & Students' Enrolment Form: Online Evening Shift Regular Classes for Professional & Ad</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!----============================ Who We are Section ==========================---->
<section class="we-are-section">
    <div class="container">
        <div class="we-are-coulmn flex">
            <div class="content-column">
                <div class="section-heading">
                    <h2>Who We Are</h2>
                </div>
                <p>At Studio 271 your well being is our greatest concern. Our caring and highly skilled professionals are ready to pamper you with our fine selection of salon and spa services and techniques and are dedicated to making you look and feel your best from head to toe. Shoaleh has been a cosmetologist since 2000. She purchased Studio 271 in 2004. Her passion is staying current in styles, trends and techniques by attending salon advanced training and hair shows regularly.</p>
                <a href="#">Read More</a>
            </div>
            <div class="image-column">
                <img src="{{asset('frontend/img/about_image.png')}}">
            </div>
        </div>
    </div>
</section>

<!----============================ President Section ==========================---->
<section class="president-section">
    <div class="container">
        <div class="president-column flex">
            <div class="left-column">
                <img src="{{asset('frontend/img/president-image.png')}}" alt="President Image">
                <div class="president-info text-align color-white">
                    <h3>Mohammad Asad Ullah FCS</h3>
                    <p>ICSB President</p>
                </div>
            </div>
            <div class="right-column">
                <h2>Message of The President</h2>
                <p>My dear ICSB Professional Colleagues, Interns, Students, and ICSB officers and staffs! Ralph Waldo Emerson once said, “Nothing great was ever achieved without enthusiasm!” I keep this mantra above my desk as a reminder to be enthusiastic about the works ahead. Those words act as a cheer-leader for me on days when I cannot bear any more bad news. They motivate me when I feel stuck or burned out as we collectively pull through. My hope is that they will set the tone for my presidency with the ICSB, which began this month.</p>
                <a href="#">Read More</a>
            </div>
        </div>
    </div>
</section>
<!----============================ BSS Secretarial Section ==========================---->
@include('frontend.includes.bss')

<!----============================ Notices Section ==========================---->
<section class="notice-section">
    <div class="container">
        <div class="notice-row">
            <div class="section-heading text-align">
                <h2>Notice Board</h2>
            </div>
            <div class="notice-board-wrapper">
                <div class="left-column notice-details-col">
                    <div class="notice-content flex">
                        <div class="date-col">
                            <h4> Jan 9, 2023</h4>
                        </div>
                        <div class="content-col">
                            <h3><a href="#">Mohammad Asad Ullah FCS Elected as President of ICSB for the Fifth Term 2022-25</a></h3>
                            <ul>
                                <li><i class="fa-solid fa-clock"></i>09.00 am</li>
                                <li><i class="fa-solid fa-user-large"></i>Member</li>
                            </ul>
                        </div>
                    </div>
                    <div class="notice-content flex">
                        <div class="date-col">
                            <h4> Jan 9, 2023</h4>
                        </div>
                        <div class="content-col">
                            <h3><a href="#">Mohammad Asad Ullah FCS Elected as President of ICSB for the Fifth Term 2022-25</a></h3>
                            <ul>
                                <li><i class="fa-solid fa-clock"></i>09.00 am</li>
                                <li><i class="fa-solid fa-user-large"></i>Member</li>
                            </ul>
                        </div>
                    </div>
                    <div class="notice-content flex">
                        <div class="date-col">
                            <h4> Jan 9, 2023</h4>
                        </div>
                        <div class="content-col">
                            <h3><a href="#">Mohammad Asad Ullah FCS Elected as President of ICSB for the Fifth Term 2022-25</a></h3>
                            <ul>
                                <li><i class="fa-solid fa-clock"></i>09.00 am</li>
                                <li><i class="fa-solid fa-user-large"></i>Member</li>
                            </ul>
                        </div>
                    </div>
                    <div class="notice-content flex">
                        <div class="date-col">
                            <h4> Jan 9, 2023</h4>
                        </div>
                        <div class="content-col">
                            <h3><a href="#">Mohammad Asad Ullah FCS Elected as President of ICSB for the Fifth Term 2022-25</a></h3>
                            <ul>
                                <li><i class="fa-solid fa-clock"></i>09.00 am</li>
                                <li><i class="fa-solid fa-user-large"></i>Member</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="right-column notice-title-col">
                    <div class="notice-wrapper">
                        <div class="title-box">
                            <h4>Categories</h4>
                            <ul>
                                <li class="active"><a href="#">All</a></li>
                                <li><a href="#">Member</a></li>
                                <li><a href="#">Student</a></li>
                                <li><a href="#">Others</a></li>
                            </ul>
                            <div class="button-wrapper">
                                <a class="transparent-button" href="#">View All</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@include('frontend.includes.recent_updates',['media_rooms'=>$media_rooms])
@include('frontend.includes.endorsement')
@include('frontend.includes.world_wide_cs',['wwcss'=>$wwcss])
@include('frontend.includes.events',['events'=>$events])
@include('frontend.includes.national_awards',['national_awards'=>$national_awards])
@include('frontend.includes.recent_videos')
@include('frontend.includes.national_connection',['national_connections'=>$national_connections])
@endsection
