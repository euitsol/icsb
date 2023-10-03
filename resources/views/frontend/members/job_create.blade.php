@extends('frontend.master')

@section('title', 'Create Job Posting')
@push('css')
<style>
    .ck-rounded-corners .ck.ck-editor__main>.ck-editor__editable,
    .ck.ck-editor__main>.ck-editor__editable.ck-rounded-corners {
    height: 15vh !important;
    }
    .fieldset {
    border: 1px solid black;
    position: relative;
    margin-top: 1.6rem;
    }
    .legend {
        position: absolute;
        top: -14%;
        background: #fff;
        padding: 0px 3px;
        left: 3%;
    }
    #job_type{
        padding: 1rem;
    }
</style>

@endpush
@section('content')
  <!-- =============================== Breadcrumb Section ======================================-->
@php
$banner_image = asset('breadcumb_img/members.jpg');
$title = 'Create Job Posting';
$datas = [
            'image'=>$banner_image,
            'title'=>$title,
            'paths'=>[
                        'home'=>'Home',
                        'javascript:void(0)'=>'Members',
                        'member_view.job_index'=>'Job Placement',
                    ]
        ];
@endphp
@include('frontend.includes.breadcrumb',['datas'=>$datas])
<!-- =============================== Breadcrumb Section ======================================-->


  <!----============================= Job Index Section ========================---->

  <div class="job-create-section big-sec-min-height d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mx-auto">
                    <div class="job_create_form p-4">
                        <form action="" method="post" class="p-4">
                            <h2>CREATE A JOB POSTING</h2>
                            <div class="row align-items-center">
                                <div class="form-group mb-3 col-md-6">
                                    <label for="position_name">Position Name</label>
                                    <input type="text" name="position_name" id="position_name" placeholder="Job Position" class="form-control py-3 px-3">
                                </div>
                                <div class="form-group mb-3 col-md-6">
                                    <label for="company_name">Company Name</label>
                                    <input type="text" name="company_name" placeholder="Company Name" class="form-control py-3 px-3">
                                </div>
                                <div class="form-group mb-3 col-md-6">
                                    <label for="vacancy">Number of Vacancy</label>
                                    <input type="text" name="vacancy" id="vacancy" placeholder="Number of Vacancies" class="form-control py-3 px-3">
                                </div>
                                <div class="form-group mb-3 col-md-6">
                                    <div class="fieldset">
                                        <label for="job_type" class="legend">Nature of Job</label>
                                        <div class="form-check" id="job_type">
                                            <label class="form-check-label ms-5" for="job_type1">
                                                <input class="form-check-input" type="radio" name="job_type" id="job_type1" value="Full-Time">
                                                Full Time
                                            </label>
                                            <label class="form-check-label ms-5" for="job_type2">
                                                <input class="form-check-input" type="radio" name="job_type" id="job_type2"  value="Part-Time">
                                                Part Time
                                            </label>
                                            <label class="form-check-label ms-5" for="job_type3">
                                                <input class="form-check-input" type="radio" name="job_type" id="job_type3" value="Contractual">
                                                Contractual
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="jr">Job Responsibility</label>
                                    <textarea name="job_responsibility" id="jr" cols="30" rows="5" class="form-control py-3 px-3" placeholder="Enter Job Responsibility"></textarea>
                                </div>
                                <div class="form-group mb-3 col-md-6">
                                    <label for="er">Educational Requirements</label>
                                    <input type="text" name="educational_requirement" id="er" class="form-control py-3 px-3" placeholder="MBA/ M.Sc/ BBA/ Masters">
                                </div>
                                <div class="form-group mb-3 col-md-6">
                                    <label for="pr">Professional Requirements</label>
                                        <input type="text" name="professional_requirement" id="pr" class="form-control py-3 px-3" placeholder="FCS/ ACS/ QCS/ Certificate Level Passed">
                                </div>
                                <div class="form-group mb-3 col-md-6">
                                    <label for="er">Experience Requirements</label>
                                    <div class="input-group">
                                        <input type="number" name="experience_requirement" id="er" class="form-control py-3 px-3 w-75" placeholder="Enter Experience Requirements">
                                        <input type="text" value="in Years" class="form-control py-3 px-3 bold text-center w-25" disabled>
                                    </div>
                                </div>
                                <div class="form-group mb-3 col-md-6">
                                    <label for="ar">Age Requirements</label>
                                    <div class="input-group">
                                        <input type="number" name="age_requirement" id="er" class="form-control py-3 px-3 w-75" placeholder="Age at most in years">
                                        <input type="text" value="in Years" class="form-control py-3 px-3 bold text-center w-25" disabled>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="adr">Additional Requirements</label>
                                    <textarea name="additional_requirement" id="adr" cols="30" rows="5" class="form-control py-3 px-3" placeholder="Enter Additional Requirements"></textarea>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="jl">Job Location</label>
                                    <textarea name="job_location" id="jl" cols="30" rows="5" class="form-control py-3 px-3" placeholder="Enter Job Location"></textarea>
                                </div>
                                <div class="form-group {{ $errors->has('salary') ? ' has-danger' : '' }} {{ $errors->has('salary.*') ? ' has-danger' : '' }} {{ $errors->has('salary_type') ? ' has-danger' : '' }}">
                                    <label class="col-md-12">Salary</label>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <input type="number" class="form-control" name="salary[from]" value="{{ old('salary.from') }}">
                                            <div class="input-group-append">
                                                <div class="input-group-text">{{ _('to') }}</div>
                                            </div>
                                            <input type="number" class="form-control" name="salary[to]" value="{{ old('salary.to') }}">
                                            <select name="salary_type" class="form-control no-select">
                                                <option selected hidden>{{ _('Select Salary Type') }}</option>
                                                <option value="Per Month">{{ _('Per Month') }}</option>
                                                <option value="Per Year">{{ _('Per Year') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    @include('alerts.feedback', ['field' => 'salary'])
                                    @include('alerts.feedback', ['field' => 'salary.*'])
                                    @include('alerts.feedback', ['field' => 'salary_type'])
                                </div>

                                <div class="form-group mb-3">
                                    <label for="ob">Other Benefits</label>
                                    <textarea name="other_benefits" id="ob" cols="30" rows="5" class="form-control py-3 px-3" placeholder="Enter Other Benefits"></textarea>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="si">Special Instructions</label>
                                    <textarea name="special_instractions" id="si" cols="30" rows="5" class="form-control py-3 px-3" placeholder="Enter Special Instructions"></textarea>
                                </div>
                                <div class="form-group mb-3 col-md-6">
                                    <label for="ad">Application Deadline</label>
                                    <input type="date" name="application_deadline" id="ad" class="form-control py-3 px-3">
                                </div>
                                <div class="form-group mb-3 col-md-6">
                                    <label for="email">Email Address</label>
                                    <input type="email" name="email" id="email" class="form-control py-3 px-3" placeholder="Enter Company Email Address">
                                </div>
                                <div class="form-group mb-3 col-md-6">
                                    <label for="url">Application URL</label>
                                    <input type="url" name="application_url" id="url" class="form-control py-3 px-3" placeholder="Enter Application URL">
                                </div>
                                <div class="form-group mb-3 col-md-6">
                                    <label for="curl">Company Website</label>
                                    <input type="url" name="company_url" id="curl" class="form-control py-3 px-3" placeholder="Enter Company URL">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="ca">Company Address</label>
                                    <textarea name="company_address" id="ca" cols="30" rows="5" class="form-control py-3 px-3" placeholder="Enter Company Address"></textarea>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="cpnd">Contact Person Name & Designation</label>
                                    <textarea name="contact_details" id="cpnd" cols="30" rows="5" class="form-control py-3 px-3" placeholder="ICSB Official will communicate with the person to authenticate the job posting. Being authentication, ICSB Official will go accept this job circular for live posting and email to the members of the institute."></textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
  </div>
@endsection
@push('js_link')
<script src="{{ asset('backend/ckeditor/build/ckeditor.js') }}"></script>
<script src="{{ asset('backend/js/ckeditor.js') }}"></script>
@endpush
