@extends('frontend.master')

@section('title', 'Job Placement')

@section('content')
<!----============================= Breadcrumbs Section ========================---->
<section class="breadcrumbs-section">
    <div class="overly-image">
      <img src="{{asset('frontend/img/breadcumb/Board-Meeting.jpg')}}" alt="Board of Directors Meeting" />
    </div>
    <div class="container">
      <div class="breadcrumbs-row flex">
        <div class="left-column content-column">
          <div class="inner-column color-white">
            <h1 class="breadcrumbs-heading">Job Placement</h1>
            <ul class="flex">
              <li><a href="index">Home</a></li>
              <li><i class="fa-solid fa-angle-right"></i></li>
              <li><a href="#">Members</a></li>
              <li><i class="fa-solid fa-angle-right"></i></li>
              <li><p>Job Placement</p></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!----============================= Job Placement Section ========================---->

  <div class="job-placement-section">
    <div class="container">
      <div class="title">
        <h1>Job Placement</h1>
      </div>
      <div class="job-table">
        <div class="table-serch">
          <p>Showing results <span> 10</span> in <span>200</span> jobs list</p>
          <p class="sort">
            <label for="cars">Sort By</label>
            <select id="">
              <option value="">Default</option>
              <option value="">Item 1</option>
              <option value="">Item 2</option>
              <option value="" selected>Item 3</option>
            </select>
          </p>
        </div>
        <div class="single-job">
          <div class="left-col">
            <div class="img-col">
              <img src="{{asset('frontend/img/job-placement/job-img.png')}}" alt="" />
            </div>
            <div class="details-col">
              <h2>Senior PHP Developer</h2>
              <h3>Medico.co Ltd</h3>
              <span class="day"><i class="fa-solid fa-clock"></i>1 day ago</span>
              <span><i class="fa-solid fa-briefcase"></i>Full time</span>
              <span><i class="fa-solid fa-briefcase"></i>Part time</span>
            </div>
          </div>
          <div class="right-col">
            <ul>
              <li><strong>Salary:</strong> TK. <span>30000-40000</span> / Per Month</li>
              <li><strong>Deadline:</strong> TK. <span>30 July, 2023</span></li>
            </ul>

            <div class="btn">
              <a href="#">Apply Now</a>
            </div>
          </div>
        </div>
        <div class="single-job">
          <div class="left-col">
            <div class="img-col">
              <img src="{{asset('frontend/img/job-placement/job-img.png')}}" alt="" />
            </div>
            <div class="details-col">
              <h2>Senior PHP Developer</h2>
              <h3>Medico.co Ltd</h3>
              <span class="day"><i class="fa-solid fa-clock"></i>1 day ago</span>
              <span><i class="fa-solid fa-briefcase"></i>Full time</span>
              <span><i class="fa-solid fa-briefcase"></i>Part time</span>
            </div>
          </div>
          <div class="right-col">
            <ul>
              <li><strong>Salary:</strong> TK. <span>30000-40000</span> / Per Month</li>
              <li><strong>Deadline:</strong> TK. <span>30 July, 2023</span></li>
            </ul>

            <div class="btn">
              <a href="#">Apply Now</a>
            </div>
          </div>
        </div>
        <div class="single-job">
          <div class="left-col">
            <div class="img-col">
              <img src="{{asset('frontend/img/job-placement/job-img.png')}}" alt="" />
            </div>
            <div class="details-col">
              <h2>Senior PHP Developer</h2>
              <h3>Medico.co Ltd</h3>
              <span class="day"><i class="fa-solid fa-clock"></i>1 day ago</span>
              <span><i class="fa-solid fa-briefcase"></i>Full time</span>
              <span><i class="fa-solid fa-briefcase"></i>Part time</span>
            </div>
          </div>
          <div class="right-col">
            <ul>
              <li><strong>Salary:</strong> TK. <span>30000-40000</span> / Per Month</li>
              <li><strong>Deadline:</strong> TK. <span>30 July, 2023</span></li>
            </ul>

            <div class="btn">
              <a href="#">Apply Now</a>
            </div>
          </div>
        </div>
        <div class="single-job">
          <div class="left-col">
            <div class="img-col">
              <img src="{{asset('frontend/img/job-placement/job-img.png')}}" alt="" />
            </div>
            <div class="details-col">
              <h2>Senior PHP Developer</h2>
              <h3>Medico.co Ltd</h3>
              <span class="day"><i class="fa-solid fa-clock"></i>1 day ago</span>
              <span><i class="fa-solid fa-briefcase"></i>Full time</span>
              <span><i class="fa-solid fa-briefcase"></i>Part time</span>
            </div>
          </div>
          <div class="right-col">
            <ul>
              <li><strong>Salary:</strong> TK. <span>30000-40000</span> / Per Month</li>
              <li><strong>Deadline:</strong> TK. <span>30 July, 2023</span></li>
            </ul>

            <div class="btn">
              <a href="#">Apply Now</a>
            </div>
          </div>
        </div>
        <div class="single-job">
          <div class="left-col">
            <div class="img-col">
              <img src="{{asset('frontend/img/job-placement/job-img.png')}}" alt="" />
            </div>
            <div class="details-col">
              <h2>Senior PHP Developer</h2>
              <h3>Medico.co Ltd</h3>
              <span class="day"><i class="fa-solid fa-clock"></i>1 day ago</span>
              <span><i class="fa-solid fa-briefcase"></i>Full time</span>
              <span><i class="fa-solid fa-briefcase"></i>Part time</span>
            </div>
          </div>
          <div class="right-col">
            <ul>
              <li><strong>Salary:</strong> TK. <span>30000-40000</span> / Per Month</li>
              <li><strong>Deadline:</strong> TK. <span>30 July, 2023</span></li>
            </ul>

            <div class="btn">
              <a href="#">Apply Now</a>
            </div>
          </div>
        </div>
        <div class="single-job">
          <div class="left-col">
            <div class="img-col">
              <img src="{{asset('frontend/img/job-placement/job-img.png')}}" alt="" />
            </div>
            <div class="details-col">
              <h2>Senior PHP Developer</h2>
              <h3>Medico.co Ltd</h3>
              <span class="day"><i class="fa-solid fa-clock"></i>1 day ago</span>
              <span><i class="fa-solid fa-briefcase"></i>Full time</span>
              <span><i class="fa-solid fa-briefcase"></i>Part time</span>
            </div>
          </div>
          <div class="right-col">
            <ul>
              <li><strong>Salary:</strong> TK. <span>30000-40000</span> / Per Month</li>
              <li><strong>Deadline:</strong> TK. <span>30 July, 2023</span></li>
            </ul>

            <div class="btn">
              <a href="#">Apply Now</a>
            </div>
          </div>
        </div>
        <div class="single-job">
          <div class="left-col">
            <div class="img-col">
              <img src="{{asset('frontend/img/job-placement/job-img.png')}}" alt="" />
            </div>
            <div class="details-col">
              <h2>Senior PHP Developer</h2>
              <h3>Medico.co Ltd</h3>
              <span class="day"><i class="fa-solid fa-clock"></i>1 day ago</span>
              <span><i class="fa-solid fa-briefcase"></i>Full time</span>
              <span><i class="fa-solid fa-briefcase"></i>Part time</span>
            </div>
          </div>
          <div class="right-col">
            <ul>
              <li><strong>Salary:</strong> TK. <span>30000-40000</span> / Per Month</li>
              <li><strong>Deadline:</strong> TK. <span>30 July, 2023</span></li>
            </ul>

            <div class="btn">
              <a href="#">Apply Now</a>
            </div>
          </div>
        </div>
        <div class="single-job">
          <div class="left-col">
            <div class="img-col">
              <img src="{{asset('frontend/img/job-placement/job-img.png')}}" alt="" />
            </div>
            <div class="details-col">
              <h2>Senior PHP Developer</h2>
              <h3>Medico.co Ltd</h3>
              <span class="day"><i class="fa-solid fa-clock"></i>1 day ago</span>
              <span><i class="fa-solid fa-briefcase"></i>Full time</span>
              <span><i class="fa-solid fa-briefcase"></i>Part time</span>
            </div>
          </div>
          <div class="right-col">
            <ul>
              <li><strong>Salary:</strong> TK. <span>30000-40000</span> / Per Month</li>
              <li><strong>Deadline:</strong> TK. <span>30 July, 2023</span></li>
            </ul>

            <div class="btn">
              <a href="#">Apply Now</a>
            </div>
          </div>
        </div>

        <div class="pagination">
          <nav aria-label="Page navigation example">
            <ul class="pagination">
              <li class="page-item"><a class="page-link" href="#">Previous</a></li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
@endsection
