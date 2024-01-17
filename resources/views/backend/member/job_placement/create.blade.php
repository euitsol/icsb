@extends('backend.layouts.master', ['pageSlug' => 'job_placement'])

@section('title', 'Add Job Placement')
@push('css')
<style>
    .ck-rounded-corners .ck.ck-editor__main>.ck-editor__editable,
    .ck.ck-editor__main>.ck-editor__editable.ck-rounded-corners {
    height: 20vh !important;
    }
    .input-group-append .input-group-text {
        border-left: none;
        padding: 0 !important;
        border: 0;
        color: #ddd;
        justify-content: center;
    }
    .input-group-append{
        border-radius: 0 !important;
        border-color: rgba(29, 37, 59, 0.5);
    }
    .input-group .form-control:not(:first-child):not(:last-child){
        border-radius: 0 !important;
    }
    .form-control:focus+.input-group-append .input-group-text, .form-control:focus~.input-group-append .input-group-text{
        border-color: transparent;
    }
</style>

@endpush
@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ _('Add Job Placement') }}</h5>
                </div>
                <form method="POST" action="{{ route('job_placement.jp_create') }}" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                            <div class="form-group {{ $errors->has('title') ? ' has-danger' : '' }}">
                                <label>{{ _('Job Title') }} <span class="text-danger">*</span></label>
                                <input type="text" name="title" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="{{ _('Enter job title') }}" value="{{ old('title') }}">
                                @include('alerts.feedback', ['field' => 'title'])
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 {{ $errors->has('company_name') ? ' has-danger' : '' }}">
                                    <label>{{ _('Company Name') }} <span class="text-danger">*</span></label>
                                    <input type="text" name="company_name" class="form-control {{ $errors->has('company_name') ? ' is-inlid' : '' }}" placeholder="{{ _('Enter job company_name') }}" value="{{ old('company_name') }}">
                                    @include('alerts.feedback', ['field' => 'company_name'])
                                </div>
                                <div class="form-group col-md-6 {{ $errors->has('company_url') ? ' has-danger' : '' }}">
                                    <label>{{ _('Company URL') }}</label>
                                    <input type="url" name="company_url" class="form-control {{ $errors->has('company_url') ? ' is-invalid' : '' }}" placeholder="{{ _('Enter job company_url') }}" value="{{ old('company_url') }}">
                                    @include('alerts.feedback', ['field' => 'company_url'])
                                </div>
                                <div class="form-group col-md-6 {{ $errors->has('application_url') ? ' has-danger' : '' }}">
                                    <label>{{ _('Application URL') }}</label>
                                    <input type="url" name="application_url" class="form-control {{ $errors->has('application_url') ? ' is-invalid' : '' }}" placeholder="{{ _('Enter job application url') }}" value="{{ old('application_url') }}">
                                    @include('alerts.feedback', ['field' => 'application_url'])
                                </div>
                                <div class="form-group col-md-6 {{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label>{{ _('Email') }} <span class="text-danger">*</span></label>
                                    <input type="email" name="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ _('Enter job email') }}" value="{{ old('email') }}">
                                    @include('alerts.feedback', ['field' => 'email'])
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('job_type') ? ' has-danger' : '' }}">
                                <label>{{_('Job Type')}} <span class="text-danger">*</span></label>
                                <div class="form-radio">
                                    <input class="form-check-input ml-2" {{(old('job_type') == 'Full-Time') ? 'checked' : ''}}  name='job_type' type="radio" value="Full-Time">
                                    <label class="form-check-label mr-3 ml-4">{{_('Full-Time')}}</label>
                                    <input class="form-check-input ml-2" {{(old('job_type') == 'Part-Time') ? 'checked' : ''}} name='job_type' type="radio" value="Part-Time">
                                    <label class="form-check-label mr-3 ml-4">{{_('Part-Time')}}</label>
                                    <input class="form-check-input ml-2" {{(old('job_type') == 'Work From Home') ? 'checked' : ''}} name='job_type' type="radio" value="Work From Home">
                                    <label class="form-check-label mr-3 ml-4">{{_('Work From Home')}}</label>
                                    <input class="form-check-input ml-2" {{(old('job_type') == 'Contractual') ? 'checked' : ''}} name='job_type' type="radio" value="Contractual">
                                    <label class="form-check-label mr-3 ml-4">{{_('Contractual')}}</label>
                                    <input class="form-check-input ml-2" {{(old('job_type') == 'Intern') ? 'checked' : ''}} name='job_type' type="radio" value="Intern">
                                    <label class="form-check-label mr-3 ml-4">{{_('Intern')}}</label>
                                </div>
                                @include('alerts.feedback', ['field' => 'job_type'])
                            </div>

                            <div class="form-group row {{ $errors->has('salary') ? ' has-danger' : '' }} {{ $errors->has('salary.*') ? ' has-danger' : '' }} {{ $errors->has('salary_type') ? ' has-danger' : '' }}">
                                <label class="col-md-12">{{_('Salary ')}} <span class="text-danger required">*</span></label>
                                <div class="col-md-12">
                                    <div class="input-group">
                                            <input type="number" class="form-control salary_input" name="salary[from]" value="{{ old('salary.from') }}">
                                            <div class="input-group-append salary_input">
                                                <div class="input-group-text">{{ _('to') }}</div>
                                            </div>
                                            <input type="number" class="form-control salary_input" name="salary[to]" value="{{ old('salary.to') }}">
                                        <select name="salary_type" class="form-control no-select salary_type">
                                            <option selected hidden>{{ _('Select Salary Type') }}</option>
                                            <option {{(old('salary_type') == 'Per Month') ? 'selected' : ''}} value="Per Month">{{ _('Per Month') }}</option>
                                            <option {{(old('salary_type') == 'Per Year') ? 'selected' : ''}} value="Per Year">{{ _('Per Year') }}</option>
                                            <option {{(old('salary_type') == 'Negotiable') ? 'selected' : ''}} value="Negotiable">{{ _('Negotiable') }}</option>
                                        </select>
                                    </div> 
                                    @include('alerts.feedback', ['field' => 'salary'])
                                    @include('alerts.feedback', ['field' => 'salary.*'])
                                    @include('alerts.feedback', ['field' => 'salary_type'])
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 {{ $errors->has('deadline') ? ' has-danger' : '' }}">
                                    <label>{{ _('Deadline') }} <span class="text-danger">*</span></label>
                                    <input type="date" name="deadline" class="form-control {{ $errors->has('deadline') ? ' is-invalid' : '' }}" placeholder="{{ _('Enter deadline') }}" value="{{ old('deadline') }}">
                                    @include('alerts.feedback', ['field' => 'deadline'])
                                </div>
                                <div class="form-group col-md-6 {{ $errors->has('vacancy') ? ' has-danger' : '' }}">
                                    <label>{{ _('Number of Vacancy') }} <span class="text-danger">*</span></label>
                                    <input type="number" name="vacancy" class="form-control {{ $errors->has('vacancy') ? ' is-invalid' : '' }}" placeholder="{{ _('Enter number of vacancy') }}" value="{{ old('vacancy') }}">
                                    @include('alerts.feedback', ['field' => 'vacancy'])
                                </div>
                                <div class="form-group col-md-6 {{ $errors->has('educational_requirement') ? ' has-danger' : '' }}">
                                    <label>{{ _('Educational Requirement') }}</label>
                                    <input type="text" name="educational_requirement" class="form-control {{ $errors->has('educational_requirement') ? ' is-invalid' : '' }}" placeholder="{{ _('MBA/ M.Sc/ BBA/ Masters') }}" value="{{ old('educational_requirement') }}">
                                    @include('alerts.feedback', ['field' => 'educational_requirement'])
                                </div>
                                <div class="form-group col-md-6 {{ $errors->has('professional_requirement') ? ' has-danger' : '' }}">
                                    <label>{{ _('Professional Requirement') }}</label>
                                    <input type="text" name="professional_requirement" class="form-control {{ $errors->has('professional_requirement') ? ' is-invalid' : '' }}" placeholder="{{ _('FCS/ ACS/ QCS/ Certificate Level Passed') }}" value="{{ old('professional_requirement') }}">
                                    @include('alerts.feedback', ['field' => 'professional_requirement'])
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 {{ $errors->has('experience_requirement') ? ' has-danger' : '' }}">
                                    <label>{{ _('Experience Requirement') }}</label>
                                    <div class="input-group">
                                        <input type="text" name="experience_requirement" class="form-control w-75" value="{{ old('experience_requirement') }}" placeholder="Enter Experience Requirements">
                                        <input type="text" value="in Years" class="form-control text-center w-25" disabled>
                                    </div>
                                    @include('alerts.feedback', ['field' => 'experience_requirement'])
                                </div>
                                <div class="form-group col-md-6 {{ $errors->has('age_requirement') ? ' has-danger' : '' }}">
                                    <label>{{ _('Age Requirement') }}</label>
                                    <div class="input-group">
                                        <input type="text" value="{{ old('age_requirement') }}" name="age_requirement" class="form-control w-75" placeholder="Enter Age Requirements">
                                        <input type="text" value="in Years" class="form-control text-center w-25" disabled>
                                    </div>
                                    @include('alerts.feedback', ['field' => 'age_requirement'])
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('company_address') ? 'has-danger' : '' }}">
                                <label>{{ _('Company Address') }} <span class="text-danger">*</span></label>
                                <textarea name="company_address" class="form-control {{ $errors->has('company_address') ? ' is-invalid' : '' }}" placeholder="Enter company address">{{ old('company_address') }}</textarea>
                                @include('alerts.feedback', ['field' => 'company_address'])
                            </div>
                            <div class="form-group {{ $errors->has('job_responsibility') ? 'has-danger' : '' }}">
                                <label>{{ _('Job Responsibility') }} <span class="text-danger">*</span></label>
                                <textarea name="job_responsibility" class="form-control {{ $errors->has('job_responsibility') ? ' is-invalid' : '' }}" placeholder="Enter job responsibility">{{ old('job_responsibility') }}</textarea>
                                @include('alerts.feedback', ['field' => 'job_responsibility'])
                            </div>
                            <div class="form-group {{ $errors->has('additional_requirement') ? 'has-danger' : '' }}">
                                <label>{{ _('Additional Requirement') }}</label>
                                <textarea name="additional_requirement" class="form-control {{ $errors->has('additional_requirement') ? ' is-invalid' : '' }}" placeholder="Enter additional requirement">{{ old('additional_requirement') }}</textarea>
                                @include('alerts.feedback', ['field' => 'additional_requirement'])
                            </div>
                            <div class="form-group {{ $errors->has('job_location') ? 'has-danger' : '' }}">
                                <label>{{ _('Job Location') }} <span class="text-danger">*</span></label>
                                <textarea name="job_location" class="form-control {{ $errors->has('job_location') ? ' is-invalid' : '' }}" placeholder="Enter job location">{{ old('job_location') }}</textarea>
                                @include('alerts.feedback', ['field' => 'job_location'])
                            </div>
                            <div class="form-group {{ $errors->has('other_benefits') ? 'has-danger' : '' }}">
                                <label>{{ _('Other Benefits') }}</label>
                                <textarea name="other_benefits" class="form-control {{ $errors->has('other_benefits') ? ' is-invalid' : '' }}" placeholder="Enter ohter benefits">{{ old('other_benefits') }}</textarea>
                                @include('alerts.feedback', ['field' => 'other_benefits'])
                            </div>
                            <div class="form-group {{ $errors->has('special_instractions') ? 'has-danger' : '' }}">
                                <label>{{ _('Special Instructions') }}</label>
                                <textarea name="special_instractions" class="form-control {{ $errors->has('special_instractions') ? ' is-invalid' : '' }}" placeholder="Enter special instractions">{{ old('special_instractions') }}</textarea>
                                @include('alerts.feedback', ['field' => 'special_instractions'])
                            </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-fill btn-primary">{{ _('Save') }}</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-user">
                <div class="card-body">
                    <p class="card-text">
                        <b>{{ _('Job Placement') }}</b>
                    </p>
                    <div class="card-description">
                        <p><b>Job Title:</b> This field is required. It is a text field with character limit of 255 characters.</p>
                        <p><b>Company Name:</b> This field is required. It is a text field with character limit of 255 characters. It represents the employer company name.</p>
                        <p><b>Company URL:</b> This field is nullable. It is a URL field that represents the employer company website URL.</p>
                        <p><b>Application URL:</b> This field is nullable. It is a URL field that represents the application-specific URL related to the employer.</p>
                        <p><b>Email:</b> This field is required. It is a email field with a maximum character limit of 255. The entered value must follow the standard email format (e.g., user@example.com) and represents the employer's email.</p>
                        <p><b>Job Type:</b> This field is required. It is a set of radio buttons. It is used to specify the job type for this job.</p>
                        <p><b>Salary:</b> This field is required when the salary type is not negotiable. Here, the number fields should represent the salary range, and the option field should represent the salary type.</p>
                        <p><b>Deadline:</b> This field is required. It is a date field that represents the deadline for this job.</p>
                        <p><b>Number of Vacancy:</b> This field is required. It is a number field representing the vacancy for this job.</p>
                        <p><b>Educational Requirement:</b> This field is nullable. It is a text field with character limit of 255 characters. It represents the educational requirements for this job.</p>
                        <p><b>Professional Requirement:</b> This field is nullable. It is a text field with character limit of 255 characters. It represents the professional requirements for this job.</p>
                        <p><b>Experience Requirement:</b> This field is nullable. It is a number field. It represents the experience requirements in years for this job.</p>
                        <p><b>Age Requirement:</b> This field is nullable. It is a number field. It represents the age requirements in years for this job.</p>
                        <p><b>Company Address:</b> This field is required. It is a textarea field with character limit of 300 characters. It represents the address of the employer company.</p>
                        <p><b>Job Responsibility:</b> This field is required. It is a textarea field. It represents the job responsibilities for this job.</p>
                        <p><b>Additional Requirement:</b> This field is nullable. It is a textarea field. It represents the additional requirements for this job.</p>
                        <p><b>Job Location:</b> This field is required. It is a textarea field with character limit of 300 characters. It represents the job location for this job.</p>
                        <p><b>Other Benefits:</b> This field is nullable. It is a textarea field. It represents the other benefits for this job.</p>
                        <p><b>Special Instructions:</b> This field is nullable. It is a textarea field. It represents the special instructions for this job.</p>
                        <p><b>Notify All Members:</b> This is a checkbox. This checkbox determines whether to receive email notifications for this Job Opportunity.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function(){
            $('.salary_type').on('change', function(){
                if($(this).val() == "Negotiable"){
                    $('.salary_input').prop('disabled', true);
                    $('.required').hide();
                } else {
                    $('.salary_input').prop('disabled', false);
                    $('.required').show();
                }
            });
        });
    </script>
@endpush
