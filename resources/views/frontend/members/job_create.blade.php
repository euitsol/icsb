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
                    @include('alerts.success')
                    <div class="job_create_form p-4">
                        <form action="{{route('member_view.fjob_store')}}" method="POST" class="p-4" enctype="multipart/form-data">
                            @csrf
                            <h2>CREATE A JOB POSTING</h2>
                            <div class="row align-items-center">
                                <div class="form-group mb-3 col-md-6 {{ $errors->has('title') ? ' has-danger' : '' }}">
                                    <label for="title">Position Name <span class="text-danger">*</span></label>
                                    <input type="text" name="title" value="{{ old('title') }}" id="title" placeholder="Job Position" class="form-control py-3 px-3 {{ $errors->has('title') ? ' is-invalid' : '' }}">
                                    @include('alerts.feedback', ['field' => 'title'])
                                </div>
                                <div class="form-group mb-3 col-md-6 {{ $errors->has('company_name') ? ' has-danger' : '' }}">
                                    <label for="company_name">Company Name <span class="text-danger">*</span></label>
                                    <input type="text" name="company_name" placeholder="Company Name" value="{{ old('company_name') }}" class="form-control py-3 px-3 {{ $errors->has('company_name') ? ' is-invalid' : '' }}">
                                    @include('alerts.feedback', ['field' => 'company_name'])
                                </div>
                                <div class="form-group mb-3 col-md-6 {{ $errors->has('vacancy') ? ' has-danger' : '' }}">
                                    <label for="vacancy">Number of Vacancy <span class="text-danger">*</span></label>
                                    <input type="number" name="vacancy" id="vacancy" value="{{ old('vacancy') }}" placeholder="Number of Vacancies" class="form-control py-3 px-3 {{ $errors->has('vacancy') ? ' is-invalid' : '' }}">
                                    @include('alerts.feedback', ['field' => 'vacancy'])
                                </div>
                                <div class="form-group mb-3 col-md-6 {{ $errors->has('job_type') ? ' has-danger' : '' }}">
                                    <div class="fieldset">
                                        <label for="job_type" class="legend">Nature of Job <span class="text-danger">*</span></label>
                                        <div class="form-check" id="job_type">
                                            <label class="form-check-label ms-5" for="job_type1">
                                                <input class="form-check-input" type="radio" name="job_type" id="job_type1" {{(old('job_type') == 'Full-Time') ? 'checked' : '' }} value="Full-Time">
                                                Full Time
                                            </label>
                                            <label class="form-check-label ms-5" for="job_type2">
                                                <input class="form-check-input" type="radio" name="job_type" id="job_type2" {{(old('job_type') == 'Part-Time') ? 'checked' : '' }}  value="Part-Time">
                                                Part Time
                                            </label>
                                            <label class="form-check-label ms-5" for="job_type3">
                                                <input class="form-check-input" type="radio" name="job_type" id="job_type3" {{(old('job_type') == 'Contractual') ? 'checked' : '' }} value="Contractual">
                                                Contractual
                                            </label>
                                        </div>
                                    </div>
                                    @include('alerts.feedback', ['field' => 'job_type'])
                                </div>
                                <div class="form-group mb-3 {{ $errors->has('job_responsibility') ? ' has-danger' : '' }}">
                                    <label for="jr">Job Responsibility <span class="text-danger">*</span></label>
                                    <textarea name="job_responsibility" id="jr" cols="30" rows="5" class="form-control py-3 px-3 {{ $errors->has('job_responsibility') ? ' is-invalid' : '' }}" placeholder="Enter Job Responsibility">{{ old('job_responsibility') }}</textarea>
                                    @include('alerts.feedback', ['field' => 'job_responsibility'])
                                </div>
                                <div class="form-group mb-3 col-md-6 {{ $errors->has('educational_requirement') ? ' has-danger' : '' }}">
                                    <label for="er">Educational Requirements</label>
                                    <input type="text" name="educational_requirement" value="{{ old('educational_requirement') }}" id="er" class="form-control py-3 px-3 {{ $errors->has('educational_requirement') ? ' is-invalid' : '' }}" placeholder="MBA/ M.Sc/ BBA/ Masters">
                                    @include('alerts.feedback', ['field' => 'educational_requirement'])
                                </div>
                                <div class="form-group mb-3 col-md-6 {{ $errors->has('professional_requirement') ? ' has-danger' : '' }}">
                                    <label for="pr">Professional Requirements</label>
                                    <input type="text" name="professional_requirement" value="{{ old('professional_requirement') }}" id="pr" class="form-control py-3 px-3 {{ $errors->has('professional_requirement') ? ' is-invalid' : '' }}" placeholder="FCS/ ACS/ QCS/ Certificate Level Passed">
                                    @include('alerts.feedback', ['field' => 'professional_requirement'])
                                </div>
                                <div class="form-group mb-3 col-md-6 {{ $errors->has('experience_requirement') ? ' has-danger' : '' }}">
                                    <label for="er">Experience Requirements</label>
                                    <div class="input-group">
                                        <input type="text" name="experience_requirement" value="{{ old('experience_requirement') }}" id="er" class="form-control py-3 px-3 w-75 {{ $errors->has('experience_requirement') ? ' is-invalid' : '' }}" placeholder="Enter Experience Requirements">
                                        <input type="text" value="in Years" class="form-control py-3 px-3 bold text-center w-25" disabled>
                                    </div>
                                    @include('alerts.feedback', ['field' => 'experience_requirement'])
                                </div>
                                <div class="form-group mb-3 col-md-6 {{ $errors->has('age_requirement') ? ' has-danger' : '' }}">
                                    <label for="ar">Age Requirements</label>
                                    <div class="input-group">
                                        <input type="text" name="age_requirement" value="{{ old('age_requirement') }}" id="er" class="form-control py-3 px-3 w-75 {{ $errors->has('age_requirement') ? ' is-invalid' : '' }}" placeholder="Age at most in years">
                                        <input type="text" value="in Years" class="form-control py-3 px-3 bold text-center w-25" disabled>
                                    </div>
                                    @include('alerts.feedback', ['field' => 'age_requirement'])
                                </div>
                                <div class="form-group mb-3 {{ $errors->has('additional_requirement') ? ' has-danger' : '' }}">
                                    <label for="adr">Additional Requirements</label>
                                    <textarea name="additional_requirement" id="adr" cols="30" rows="5" class="form-control py-3 px-3 {{ $errors->has('additional_requirement') ? ' is-invalid' : '' }}" placeholder="Enter Additional Requirements">{{ old('additional_requirement') }}</textarea>
                                    @include('alerts.feedback', ['field' => 'additional_requirement'])
                                </div>
                                <div class="form-group mb-3 {{ $errors->has('job_location') ? ' has-danger' : '' }}">
                                    <label for="jl">Job Location <span class="text-danger">*</span></label>
                                    <textarea name="job_location" id="jl" cols="30" rows="5" class="form-control py-3 px-3 {{ $errors->has('job_location') ? ' is-invalid' : '' }}" placeholder="Enter Job Location"> {{ old('job_location') }}</textarea>
                                    @include('alerts.feedback', ['field' => 'job_location'])
                                </div>
                                <div class="form-group mb-3 {{ $errors->has('salary') ? ' has-danger' : '' }} {{ $errors->has('salary.*') ? ' has-danger' : '' }} {{ $errors->has('salary_type') ? ' has-danger' : '' }}">
                                    <label class="col-md-12">Salary <span class="text-danger salary_required">*</span></label>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <input type="number" class="form-control salary_input" name="salary[from]" value="{{ old('salary.from') }}">
                                            <div class="input-group-append salary_input">
                                                <div class="input-group-text">{{ _('to') }}</div>
                                            </div>
                                            <input type="number" class="form-control salary_input" name="salary[to]" value="{{ old('salary.to') }}">
                                            <select name="salary_type" class="form-control no-select salary_type">
                                                <option selected hidden>{{ _('Select Salary Type') }}</option>
                                                <option {{ (old('salary_type') == 'Per Month') ? 'selected' : '' }} value="Per Month">{{ _('Per Month') }}</option>
                                                <option  {{ (old('salary_type') == 'Per Year') ? 'selected' : '' }} value="Per Year">{{ _('Per Year') }}</option>
                                                <option  {{ (old('salary_type') == 'Negotiable') ? 'selected' : '' }} value="Negotiable">{{ _('Negotiable') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    @include('alerts.feedback', ['field' => 'salary'])
                                    @include('alerts.feedback', ['field' => 'salary.*'])
                                    @include('alerts.feedback', ['field' => 'salary_type'])
                                </div>

                                <div class="form-group mb-3 {{ $errors->has('other_benefits') ? ' has-danger' : '' }}">
                                    <label for="ob">Other Benefits</label>
                                    <textarea name="other_benefits" id="ob" cols="30" rows="5" class="form-control py-3 px-3 {{ $errors->has('other_benefits') ? ' is-invalid' : '' }}" placeholder="Enter Other Benefits">{{ old('other_benefits') }}</textarea>
                                    @include('alerts.feedback', ['field' => 'other_benefits'])
                                </div>
                                <div class="form-group mb-3 {{ $errors->has('special_instractions') ? ' has-danger' : '' }}">
                                    <label for="si">Special Instructions</label>
                                    <textarea name="special_instractions" id="si" cols="30" rows="5" class="form-control py-3 px-3 {{ $errors->has('special_instractions') ? ' is-invalid' : '' }}" placeholder="Enter Special Instructions">{{ old('special_instractions') }}</textarea>
                                    @include('alerts.feedback', ['field' => 'special_instractions'])
                                </div>
                                <div class="form-group mb-3 col-md-6 {{ $errors->has('deadline') ? ' has-danger' : '' }}">
                                    <label for="ad">Application Deadline <span class="text-danger">*</span></label>
                                    <input type="date" name="deadline" value="{{ old('deadline') }}" id="ad" class="form-control py-3 px-3 {{ $errors->has('deadline') ? ' is-invalid' : '' }}">
                                    @include('alerts.feedback', ['field' => 'deadline'])
                                </div>
                                <div class="form-group mb-3 col-md-6 {{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label for="email">Email Address <span class="text-danger">*</span></label>
                                    <input type="email" name="email" value="{{ old('email') }}" id="email" class="form-control py-3 px-3 {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Enter Company Email Address">
                                    @include('alerts.feedback', ['field' => 'email'])
                                </div>
                                <div class="form-group mb-3 col-md-6 {{ $errors->has('application_url') ? ' has-danger' : '' }}">
                                    <label for="url">Application URL</label>
                                    <input type="url" name="application_url" value="{{ old('application_url') }}" id="url" class="form-control py-3 px-3 {{ $errors->has('application_url') ? ' is-invalid' : '' }}" placeholder="Enter Application URL">
                                    @include('alerts.feedback', ['field' => 'application_url'])
                                </div>
                                <div class="form-group mb-3 col-md-6 {{ $errors->has('company_url') ? ' has-danger' : '' }}">
                                    <label for="curl">Company Website</label>
                                    <input type="url" name="company_url" value="{{ old('company_url') }}" id="curl" class="form-control py-3 px-3 {{ $errors->has('company_url') ? ' is-invalid' : '' }}" placeholder="Enter Company URL">
                                    @include('alerts.feedback', ['field' => 'company_url'])
                                </div>
                                <div class="form-group mb-3 {{ $errors->has('company_address') ? ' has-danger' : '' }}">
                                    <label for="ca">Company Address <span class="text-danger">*</span></label>
                                    <textarea name="company_address" id="ca" cols="30" rows="5" class="form-control py-3 px-3 {{ $errors->has('company_address') ? ' is-invalid' : '' }}" placeholder="Enter Company Address">{{ old('company_address') }}</textarea>
                                    @include('alerts.feedback', ['field' => 'company_address'])
                                </div>
                                <div class="form-group mb-3 {{ $errors->has('contact_details') ? ' has-danger' : '' }}">
                                    <label for="cpnd">Contact Person Name & Designation <span class="text-danger">*</span></label>
                                    <textarea name="contact_details" id="cpnd" cols="30" rows="5" class="form-control py-3 px-3 {{ $errors->has('contact_details') ? ' is-invalid' : '' }}" placeholder="ICSB Official will communicate with the person to authenticate the job posting. Being authentication, ICSB Official will go accept this job circular for live posting and email to the members of the institute.">{{ old('contact_details') }}</textarea>
                                    @include('alerts.feedback', ['field' => 'contact_details'])
                                </div>
                                <div class="form-group mb-3">
                                    <input type="submit" class="btn btn-primary w-100" value="POST">
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
@push('js')
    <script>
        $(document).ready(function(){
            $('.salary_type').on('change', function(){
                if($(this).val() == "Negotiable"){
                    $('.salary_input').prop('disabled', true);
                    $('.salary_required').hide();
                } else {
                    $('.salary_input').prop('disabled', false);
                    $('.salary_required').show();
                }
            });
        });
    </script>
    <script>
        if('{{ (old("salary_type"))}}' == 'Negotiable'){
            $('.salary_input').prop('disabled', true);
        }
    </script>
@endpush
