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
    <div class="left-col">
        <img src="{{asset('frontend/img/we-are/Image-3.png')}}" />
    </div>
    <div class="right-col"></div>
    <div class="container">
        <div class="we-are-coulmn flex">
            <div class="content-column">
                <div class="section-heading">
                    <h2>Who We Are</h2>
                </div>
                <p>
                    Institute of Chartered Secretaries of Bangladesh
                    (ICSB) was established under an Act of
                    Parliament i.e. Chartered Secretaries Act 2010
                    is the only recognized professional body to
                    develop, promote and regulate the profession of
                    Chartered Secretary in Bangladesh.
                </p>
                <p>
                    The affairs of the Institute of Chartered
                    Secretaries of Bangladesh (ICSB) are managed by
                    a Council consist of 13 (thirteen) elected
                    members and 05 (five) nominees from the
                    Government of the People's Republic of
                    Bangladesh.
                </p>
                <p>
                    The major contribution of a Chartered Secretary
                    is in the corporate sector. Chartered Secretary
                    is a requisite qualification to become a Company
                    Secretary. Company Secretary is an important
                    professional aiding the efficient management of
                    the corporate sector. Company Secretary is a
                    statutory officer under the Companies Act 1994.
                    According to Bangladesh Securities and Exchange
                    Commission (BSEC) all the listed companies
                    should have a Company Secretary.
                </p>
                <a href="#">Read More</a>
            </div>
            <div class="image-column">
                <div class="border"></div>
                <img src="{{asset('frontend/img/about_image.png')}}" />
            </div>
        </div>
    </div>
</section>

<!----============================ President Section ==========================---->
@if(!empty($president))
    <section class="president-section">
        <div class="container">
            <div class="president-column flex">
                <div class="left-column">
                    <img src="{{getMemberImage($president->member)}}" alt="{{_('President Image')}}">
                    <div class="president-info text-align color-white">
                        <h3>{{$president->member->name}}</h3>
                        <p>{{_('ICSB President')}}</p>
                    </div>
                </div>
                <div class="right-column">
                    <h2>{{_('Message of The President')}}</h2>
                    {!! $president->message !!}
                    <a href="{{route('council_view.president')}}">Read More</a>
                </div>
            </div>
        </div>
    </section>
@endif
<!----============================ BSS Secretarial Section ==========================---->
@include('frontend.includes.bss',['home_bsss'=>$home_bsss])

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
