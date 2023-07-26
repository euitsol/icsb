@extends('frontend.master')

@section('title', 'World Wide CS')

@section('content')
<!----============================= Breadcrumbs Section ========================---->
<section class="breadcrumbs-section">
    <div class="overly-image">
        <img src="{{asset('frontend/img/breadcumb/wide-wise-cs.jpg')}}" alt="world wide cs">
    </div>
    <div class="container">
        <div class="breadcrumbs-row flex">
            <div class="left-column content-column">
                <div class="inner-column color-white">
                    <h1 class="breadcrumbs-heading">World Wide CS</h1>
                    <ul class="flex">
                        <li><a href="index">Home</a></li>
                        <li><i class="fa-solid fa-angle-right"></i></li>
                        <li><a href="#">About ICSB</a></li>
                        <li><i class="fa-solid fa-angle-right"></i></li>
                        <li>
                            <p>World Wide CS</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--=============================== End World Wide Chartered Secretaries Section ========================== -->
<section class="world-wide-section">
    <div class="container">
        <div class="world-wide-row">
            <div class="section-heading text-align">
                <h2>Who We Are</h2>
            </div>
            @foreach ($wwcss->chunk(2) as $wwcss)
            <div class="world-wide-column flex text-align">
                @foreach ($wwcss as $wwcs)
                    <div class="world-wide-item d-flex flex-wrap justify-content-center">
                        <div class="chart-sec-logo">
                            <img src="{{storage_url($wwcs->logo)}}" alt="{{$wwcs->title}}">
                        </div>
                        <div class="chart-sec-content">
                            <h3 class="chart-heading">{{$wwcs->title}}</h3>
                            <p class="chart-details">{{$wwcs->description}}</p>
                            <div class="chart-link">
                                <span>Website: <a href="{{$wwcs->url}}" target="_blank">{{removeHttpProtocol($wwcs->url)}}</a></span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @endforeach
            {{-- <div class="world-wide-column flex text-align">
                <div class="world-wide-item">
                    <div class="chart-sec-logo">
                        <img src="assets/img/chartered-secretaries/Austrilia.svg" alt="Austrilia logo">
                    </div>
                    <div class="chart-sec-content">
                        <h3 class="chart-heading">Australia</h3>
                        <p class="chart-details">Governance Institute of Australia is the peak body for over 7,000 governance and risk professionals. It is the leading independent authority on best practice in board and organisational governance and risk management. Our accredited and internationally recognised education and training offerings are focused on giving governance and risk practitioners the skills they need to improve their organisations’ performance.</p>
                        <div class="chart-link">
                            <span>Website: <a href="https://www.governanceinstitute.com.au/" target="_blank">www.governanceinstitute.com.au</a></span>
                        </div>
                    </div>
                </div>
                <div class="world-wide-item">
                    <div class="chart-sec-logo">
                        <img src="assets/img/chartered-secretaries/Canada.svg" alt="ICSA-UK logo">
                    </div>
                    <div class="chart-sec-content">
                        <h3 class="chart-heading">ICSA</h3>
                        <p class="chart-details">Chartered Secretaries Canada has over 1,000 members. The first Canadian Branch was established in 1920, and the Canadian Institute was incorporated federally in 1957. Today it has branches across Canada and in Bermuda with representation in every province, in Bermuda, and in the Caribbean.</p>
                        <div class="chart-link">
                            <span>Website: <a href="http://www.icsacanada.org/" target="_blank"> www.icsacanada.org</a></span>
                        </div>
                    </div>
                </div>

            </div>
            <div class="world-wide-column flex text-align">
                <div class="world-wide-item">
                    <div class="chart-sec-logo">
                        <img src="assets/img/chartered-secretaries/Hong-Kong.svg" alt="Hong-Kong logo">
                    </div>
                    <div class="chart-sec-content">
                        <h3 class="chart-heading">HKICSA</h3>
                        <p class="chart-details">Formed in 1949 as a branch of the ICSA, membership remained relatively modest until the early 1970s when, in order to accommodate the demand to provide further education to Hong Kong’s growing population, bodies such as the Hong Kong Polytechnic began to deliver certificate and diploma courses in business-related subjects. </p>
                        <div class="chart-link">
                            <span>Website: <a href="https://www.hkcgi.org.hk/" target="_blank">www.hkics.org.hk</a></span>
                        </div>
                    </div>
                </div>
                <div class="world-wide-item">
                    <div class="chart-sec-logo">
                        <img src="assets/img/chartered-secretaries/Nigeria.svg" alt="Nigeria logo">
                    </div>
                    <div class="chart-sec-content">
                        <h3 class="chart-heading">ICSAN</h3>
                        <p class="chart-details">The Institute of Certified Public Secretaries of Kenya is a Professional Membership Association that was established by an Act of Parliament, the Certified Public Secretaries of Kenya, Cap. 534 of the Laws of Kenya, in 1988.</p>
                        <div class="chart-link">
                            <span>Website: <a href="https://icsan.org/" target="_blank">www.icsa.org.uk</a></span>
                        </div>
                    </div>
                </div>

            </div>
            <div class="world-wide-column flex text-align">
                <div class="world-wide-item">
                    <div class="chart-sec-logo">
                        <img src="assets/img/chartered-secretaries/malaysia-maicsa-logo.svg" alt="Malaysia logo">
                    </div>
                    <div class="chart-sec-content">
                        <h3 class="chart-heading">MAICSA</h3>
                        <p class="chart-details">The Malaysian Institute of Chartered Secretaries and Administrators (MAICSA) was founded in 1959 as an affiliated body to ICSA. It is now one of the nine Divisions of ICSA worldwide, having achieved a Division status in 2001. Membership of the Institute is limited only to members and students of the Institute residing in Malaysia. At present the Institute has about 3,200 members (comprising Fellows, Associates) and Graduates, 3,100 students and 940 Affiliates.</p>
                        <div class="chart-link">
                            <span>Website: <a href="https://www.cgi.org.uk/" target="_blank">www.icsa.org.uk</a></span>
                        </div>
                    </div>
                </div>
                <div class="world-wide-item">
                    <div class="chart-sec-logo">
                        <img src="assets/img/chartered-secretaries/newzealand-csnz.svg" alt="Newzealand logo">
                    </div>
                    <div class="chart-sec-content">
                        <h3 class="chart-heading">CSNZ</h3>
                        <p class="chart-details">Chartered Secretaries New Zealand (CSNZ) is the New Zealand Division of the Institute of Chartered Secretaries and Administrators (ICSA International). ICSA International is an international professional body with 37,000 members worldwide. It was founded in England in 1891 and granted its Royal Charter in 1902. The New Zealand Division of the Institute was formed in 1937.</p>
                        <div class="chart-link">
                            <span>Website: <a href="http://www.csnz.org/" target="_blank">http://www.csnz.org/</a></span>
                        </div>
                    </div>
                </div>

            </div>
            <div class="world-wide-column flex text-align">
                <div class="world-wide-item">
                    <div class="chart-sec-logo">
                        <img src="assets/img/chartered-secretaries/singapore-saicsa-logo.svg" alt="Singapore logo">
                    </div>
                    <div class="chart-sec-content">
                        <h3 class="chart-heading">SAICSA</h3>
                        <p class="chart-details">The Singapore Association of the Institute of Chartered Secretaries and Administrators (SAICSA) is a division of ICSA and comprises members, graduates and registered students of the Institute residing in Singapore.</p>
                        <div class="chart-link">
                            <span>Website: <a href="https://www.saicsa.org.sg/english/" target="_blank">www.saicsa.org.sg</a></span>
                        </div>
                    </div>
                </div>
                <div class="world-wide-item">
                    <div class="chart-sec-logo">
                        <img src="assets/img/chartered-secretaries/southern-africa-logo.svg" alt="Southernlogo">
                    </div>
                    <div class="chart-sec-content">
                        <h3 class="chart-heading">ICSA</h3>

                        <p class="chart-details">The Institute is the professional qualifying body for governance professionals in Southern Africa on the path to Chartered Secretary. The Institute further provides Continuing Professional Development (CPD) for all governance and accounting officers.

                            The Institute represents Botswana, Lesotho, Namibia, South Africa and Swaziland.</p>
                        <div class="chart-link">
                            <span>Website: <a href="https://www.icsa.co.za/" target="_blank">www.icsa.co.za</a></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="world-wide-column flex text-align">
                <div class="world-wide-item">
                    <div class="chart-sec-logo">
                        <img src="assets/img/chartered-secretaries/icsaz-zimbabwe-logo.svg" alt="Zimbabwe logo">
                    </div>
                    <div class="chart-sec-content">
                        <h3 class="chart-heading">ICSAZ</h3>
                        <p class="chart-details">The Institute in Zimbabwe was incorporated on 1st January 1971 by an Act of Parliament through the Chartered Secretaries (Private) Act, which generally prescribes the operations of the Institute in Zimbabwe, status of its members, relationship with Government and world at large.</p>
                        <div class="chart-link">
                            <span>Website: <a href="https://www.icsaz.co.zw/" target="_blank">www.icsaz.co.zw</a></span>
                        </div>
                    </div>
                </div>
                <div class="world-wide-item">
                    <div class="chart-sec-logo">
                        <img src="assets/img/chartered-secretaries/icsl-india-logo.svg" alt="Southernlogo">
                    </div>
                    <div class="chart-sec-content">
                        <h3 class="chart-heading">ICSI</h3>

                        <p class="chart-details">The Institute of Company Secretaries of India(ICSI) is constituted under an Act of Parliament i.e. the Company Secretaries Act, 1980 (Act No. 56 of 1980). ICSI is the only recognized professional body in India to develop and regulate the profession of Company Secretaries in India.</p>
                        <div class="chart-link">
                            <span>Website: <a href="https://www.icsi.edu/home/" target="_blank">www.icsi.edu</a></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="world-wide-column flex text-align">
                <div class="world-wide-item">
                    <div class="chart-sec-logo">
                        <img src="assets/img/chartered-secretaries/icsb-pakistan-logo.svg" alt="Pakistan logo">
                    </div>
                    <div class="chart-sec-content">
                        <h3 class="chart-heading">ICSP</h3>
                        <p class="chart-details">The Institute of Corporate Secretaries of Pakistan was constituted to develop and regulate the profession of company secretaries in Pakistan. In early 1974 a number of prominent professionals stressed the need of forming an Institute for the profession of company secretaries. The Institute was formed under the Companies Act, 1913 as a company Limited by Guarantee. Since then, the Institute of Corporate Secretaries of Pakistan is functioning regularly for the professing of company secretaries.</p>
                        <div class="chart-link">
                            <span>Website: <a href="http://www.icsp.org.pk/" target="_blank">www.icsp.org.pk</a></span>
                        </div>
                    </div>
                </div>
                <div class="world-wide-item">
                    <div class="chart-sec-logo">
                        <img src="assets/img/chartered-secretaries/icsb-char-logo.svg" alt="icsb-char logo">
                    </div>
                    <div class="chart-sec-content">
                        <h3 class="chart-heading">ICSB</h3>

                        <p class="chart-details">Institute of Chartered Secretaries of Bangladesh (ICSB) established under an Act of Parliament i.e. Chartered Secretaries Act 2010 is the only recognized professional body to develop, promote and regulate the profession of Chartered/Company Secretaries in Bangladesh.</p>
                        <div class="chart-link">
                            <span>Website: <a href="/" target="_blank">www.icsb.edu.bd</a></span>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</section>

@endsection
